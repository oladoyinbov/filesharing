<?php

declare(strict_types=1);

namespace App\Http\Controller;

class FilesController extends \FastVolt\Core\Controller
{

    public function myfiles()
    {
        return $this->render('myfiles');
    }


    public function uploadFiles()
    {
        if (request()->is_post_request()) {

            $files = request()->files('hc_file');
            
            if (is_array($files)) {
                # handle multiple uploaded files
                foreach ($files as $single) {
                    $msg[] = '<i class="fad fa-check-circle"></i> '. $single->getName() . ' Uploaded Sucessfully';
                }
                return $this->result(true, implode('<br>', $msg));
                
            } else {
                # handle single file uploads
                $result = $this->result(true, $files->getName() . ' Uploaded Successfully');
            }

            # return err
            return $result ?? $this->result(false, 'Something Went Wrong!');
        }

        return $this->render('upload_files');
    }


    /**
     * Return Operation Result in HTML
     */
    private function result(bool $status, string $msg): string
    {
        return match ($status) {

            true => '<div class="alert alert-success mb-4 fw-bold fs-5">
                        ' . $msg . ' Uploaded Successfully
                    </div>
                    <div class="mt-3 d-flex justify-content-center">
                        <a href="' . route('dash_upload_files') . '" class="btn btn-dark text-light p-2">
                            <i class="fad fa-caret-left"></i> Back to Upload
                        </a>
                    </div>
                    ',

            false => '<div class="alert alert-danger mb-4 fw-bold fs-5">
                            <i class="fas fa-exclamation-circle"> ' . $msg . '</i> 
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

}