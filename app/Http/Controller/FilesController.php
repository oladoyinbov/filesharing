<?php

declare(strict_types=1);

namespace App\Http\Controller;

use App\Model\Files;
use FastVolt\Helper\{UUID, Session};

class FilesController extends \FastVolt\Core\Controller
{
    private \FastVolt\Helper\FileSystem $f;

    public function myfiles()
    {
        return $this->render('myfiles');
    }


    public function uploadFilesInterface()
    {
        if (request()->is_post_request()) {

            # validate request form field
            if ($this->vlr()->has_errors()) 
                return $this->result(false, $this->vlr()->errors());

            # get file data
            $files = request()->files('hc_file');

            if (is_array($files)) {
                # handle multiple uploaded files
                foreach ($files as $f) {
                    $this->f = $f;
                    # upload file to db and disk
                    if ($this->uploadToDisk($f)) {
                        $msg[] = $this->result(true, $this->f->getName() . ' Uploaded Sucessfully');
                        continue;
                    }
                    $msg[] = $this->result(false, $this->f->getName() . ' Upload Failed!');
                }

                response()->redirect(route('dash_upload_files'), timer: 3000);
                return implode('<br>', $msg);

            } else {
                # handle single file uploads
                if ($this->uploadToDisk($files)) {
                    return $this->result(
                        true,
                        $files->getUniqueFileName() . ' Uploaded Successfully'
                    );
                }
            }

            # return err
            $this->result(false, 'Something Went Wrong!');
        }

        return $this->render('upload_files');
    }


    private function uploadToDisk(\FastVolt\Helper\FileSystem $file)
    {
        if ($file->exists()) {
            $date = date('d-m-y');
            $file_name = $file->getUniqueFileName();
            $file_size = $file->getSize();
            $upload_path = "uploads/user_files/{$date}/";
            $upload_dir = resources_path($upload_path);

            # insert file info to db
            $db = (new Files)->insert([
                'id' => null,
                'uuid' => UUID::generate(),
                'user' => Session::get('fs_user'),
                'name' => $file_name,
                'size' => $file_size,
                'path' => $upload_path,
                'created_at' => get_timestamp()
            ]);

            if ($db) {
                return $file->save($upload_dir, $file_name);
            }
        }

        return false;
    }


    /**
     * Return Operation Result in HTML
     */
    private function result(bool $status, string $msg, string $custom_icon = null): string
    {
        $icon = ($status === true) ?
            $custom_icon ?? '<i class="fad fa-check-circle"></i> '
            : $custom_icon ?? '<i class="fas fa-exclamation-circle"></i> ';

        return match ($status) {

            true => '<div class="alert alert-success mb-4 fw-bold">
                        ' . $icon . $msg . ' 
                    </div>
                    <div class="mt-3 d-flex justify-content-center">
                        <a href="' . route('dash_upload_files') . '" class="btn btn-dark text-light p-2">
                            <i class="fad fa-caret-left"></i> Back to Upload
                        </a>
                    </div>
                    ',

            false => '<div class="alert alert-danger mb-4 fw-bold">
                        ' . $icon . $msg . ' 
                    </div>
                    <div class="mt-3 d-flex justify-content-center">
                        <a href="' . route('dash_upload_files') . '" class="btn btn-dark text-light p-2">
                            <i class="fad fa-caret-left"></i> Back to Upload
                        </a>
                    </div>
                    ',

            default => ''
        };
    }


    private function vlr()
    {
        return request()->validate([
            'hc_file' => 'required'
        ]);
    }

}