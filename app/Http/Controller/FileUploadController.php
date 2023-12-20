<?php

declare(strict_types=1);

namespace App\Http\Controller;

use App\Enums\File;
use App\Model\{Users, Files, Folders};
use Fastvolt\Helper\{UUID, Session, FileSystem};

class FileUploadController extends \Fastvolt\Core\Controller
{
    private FileSystem $f;

    public function uploadFilesInterface()
    {
        if (request()->is_post_request()) {

            # get file data
            $files = request()->files('hc_file');

            if (is_array($files)) {

                # handle multiple uploaded files
                foreach ($files as $f) {

                    # validate uploads
                    if ($this->checkUploads($f) != null) {
                        return $this->checkUploads($f);
                    }

                    # upload file to db and disk
                    if ($this->uploadToDisk($f)) {
                        $msg[] = $this->result(true, $f->getName() . ' Uploaded Sucessfully');
                        continue;
                    }

                    $msg[] = $this->result(false, $f->getName() . ' Upload Failed!');
                }

                response()->redirect(route('dash_upload_files'), timer: 3000);

                return implode('<br>', $msg) . $this->backToHomeButton();

            } else {

                # validate uploads
                if ($this->checkUploads($files) != null) {
                    return $this->checkUploads($files) . $this->backToHomeButton();
                }

                # handle single file uploads
                if ($this->uploadToDisk($files)) {
                    return $this->result(true, $files->getName() . ' Uploaded Successfully') . $this->backToHomeButton();
                }
            }

            # return err
            $this->result(false, 'Something Went Wrong!') . $this->backToHomeButton();
        }

        # store folder id value
        $this->storeFolderId(request()->get('f'));
        $getFolderId = $this->folderExist(request()->get('f')) ? request()->get('f') : null;


        return $this->render('upload_files', [
            'folder_name' => $this->getFolderName($getFolderId ?? null) ?? null,
            'folder_url' => route('dash_folder', ['id' => $getFolderId ?? ''])
        ]);
    }




    /**
     * Upload File to Storage Disk
     */
    private function uploadToDisk(FileSystem $file)
    {
        if ($file->exists()) {

            $id = substr(bin2hex(Session::get('fs_user')), 0, 10);
            $user = preg_replace('/\@(\w+).(\w+)/', '', Session::get('fs_user')) . '_' . $id;
            [$year, $month] = [date('Y'), date('m')];
            $file_name = strip_tags($file->getName());
            $file_size = $file->getSize();
            $upload_path = "uploads/u/{$user}/{$year}/{$month}";
            $upload_dir = resources_path($upload_path);
            $file_type = $this->getFileType($file);
            $folder = $this->folderExist(request()->get('f')) ? request()->get('f') : '';

            # save file to directory
            if ($file->save($upload_dir, $file_name)) {

                # insert file info to db
                return (new Files)->insert([
                    'id' => null,
                    'uuid' => UUID::generate(),
                    'user' => Session::get('fs_user'),
                    'name' => $file_name,
                    'type' => $file_type,
                    'description' => '',
                    'size' => $file_size,
                    'path' => $upload_path,
                    'folder' => $folder,
                    'last_modified' => get_timestamp(),
                    'created_at' => get_timestamp()
                ]);
            }
        }

        return false;
    }



    /**
     * Check File Validity
     * 
     * @return ?string
     */
    private function checkUploads(FileSystem $file): ?string
    {
        if (!$file->exists()) {
            return $this->result(false, sprintf('File doesn\'t Exist!'));
        }
        # return err, if file is greater than 20 Mb
        if ($file->getSize() > 20971520) {
            return $this->result(false, sprintf('File: %s exceeds minimum upload limit of 20MB!', $file->getName()));
        }

        if (
            !(
                $file->is_image_file() ||
                $file->is_audio_file() ||
                $file->is_video_file() ||
                $file->is_document_file() ||
                $file->is_archive_file()
            )
        ) {
            return $this->result(false, sprintf('Only images, video, documents and archive files are allowed!'));
        }

        return null;
    }


    private function getFileType(FileSystem $file)
    {
        if ($file->is_image_file()) {
            return File::IMAGE->get();
        }

        if ($file->is_audio_file()) {
            return File::AUDIO->get();
        }

        if ($file->is_video_file()) {
            return File::VIDEO->get();
        }

        if ($file->is_archive_file()) {
            return File::ARCHIVE->get();
        }

        if ($file->is_document_file()) {
            return File::DOCUMENT->get();
        }

        return 'file';
    }



    /**
     * Check if Folder Exist
     */
    private function folderExist(string|null $folder_id): bool
    {
        if ($folder_id == null || $folder_id == '' || !is_uuid($folder_id)) {
            return false;
        }

        $folder_id = escape($folder_id, true);

        $db = (new Folders)
            ->where([
                'user' => Session::get('fs_user'),
                'uuid' => $folder_id
            ]);

        if ($db->num_rows() > 0) {
            return true;
        }

        return false;
    }



    private function getFolderName(string|null $pid): ?string
    {
        if ($this->folderExist($pid)) {

            $db = (new Folders)
                ->where([
                    'user' => Session::get('fs_user'),
                    'uuid' => $pid
                ]);

            if ($db->num_rows() > 0) {
                $folder_name = $db->fetch_one()['name'];
                return $folder_name;
            }
        }

        return null;
    }



    private function storeFolderId(string|null $folder_id)
    {
        if ($folder_id !== null || $folder_id !== '') {
            # store session, if get request exist
            if (Session::has('f_to')) {
                Session::unset('f_to');
            }

            if ($this->folderExist($folder_id)) {
                Session::store('f_to', $folder_id);
            }
        }
    }


    private function redirectTo(): ?string
    {
        $query = Session::has('f_to') ? Session::get('f_to') : null;

        return ($query != null || $query != '')
            ? route('dash_upload_files', ['f' => $query])
            : route('dash_upload_files');
    }



    /**
     * Return Operation Result in HTML
     */
    private function result(bool $status, string $msg, string $custom_icon = null): string
    {
        $icon = ($status === true) ?
            $custom_icon ?? '<i class="fad fa-check-circle"></i> '
            : $custom_icon ?? '<i class="fas fa-exclamation-circle"></i> ';

        # redirect back to uploads
        response()->redirect($this->redirectTo(), timer: 4000);

        return match ($status) {

            true => '<div class="alert alert-success mb-4 fw-bold">
                        ' . $icon . $msg . ' 
                    </div>',

            false => '<div class="alert alert-danger mb-4 fw-bold">
                        ' . $icon . $msg . ' 
                    </div>'

        };
    }

    private function backToHomeButton()
    {
        return '<div class="mt-3 d-flex justify-content-center">
                    <a href="' . route('dash_upload_files') . '" class="btn btn-dark text-light p-2">
                        <i class="fad fa-caret-left"></i> Back to Upload
                    </a>
                </div>';
    }

}