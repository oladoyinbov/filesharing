<?php

declare(strict_types=1);

namespace App\Http\Controller;

use App\Model\{Users, Files};
use FastVolt\Helper\{UUID, Session, FileSystem};

class FileUploadController extends \FastVolt\Core\Controller
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

        return $this->render('upload_files');
    }




    /**
     * Upload File to Storage Disk
     */
    private function uploadToDisk(FileSystem $file)
    {
        if ($file->exists()) {

            $id = substr(bin2hex(Session::get('fs_user')), 0, 10);
            $user = preg_replace('/\@(\w+).(\w+)/', '', Session::get('fs_user')) . '_' . $id;
            $date = date('d-m-y');
            $file_name = strip_tags($file->getName());
            $file_size = $file->getSize();
            $upload_path = "uploads/{$user}/user_files/{$date}";
            $upload_dir = resources_path($upload_path);

            # save file to directory
            if ($file->save($upload_dir, $file_name)) {

                # insert file info to db
                return (new Files)->insert([
                    'id' => null,
                    'uuid' => UUID::generate(),
                    'user' => Session::get('fs_user'),
                    'name' => $file_name,
                    'size' => $file_size,
                    'path' => $upload_path,
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



    /**
     * Return Operation Result in HTML
     */
    private function result(bool $status, string $msg, string $custom_icon = null): string
    {
        $icon = ($status === true) ?
            $custom_icon ?? '<i class="fad fa-check-circle"></i> '
            : $custom_icon ?? '<i class="fas fa-exclamation-circle"></i> ';

        # redirect back to uploads
        response()->redirect(route('dash_upload_files'), timer: 4000);

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