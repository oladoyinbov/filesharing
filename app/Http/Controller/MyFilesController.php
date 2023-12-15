<?php

declare(strict_types=1);

namespace App\Http\Controller;

use App\Model\{Users, Files};
use FastVolt\Helper\{Session, Image};

class MyFilesController extends \FastVolt\Core\Controller
{
    /**
     * File Listing Function
     *
     * @return 
     */
    public function index()
    {
        $all_files = (new Files)
            ->where(['user' => Session::get('fs_user')])
            ->fetch_all_assoc();


        return $this->render('myfiles', [
            'files' => $all_files ?? []
        ]);
    }


    public function loadOptions()
    {
        if (request()->hasQuery('filexl') && Session::has('fs_user')) {
            return '
        <li><h6 class="dropdown-header">Choose Options</h6></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" 
                type="button" 
                data-bs-toggle="modal" 
                data-bs-target="#previewFile-'.request()->get('filexl').'"
            ><i class="fad fa-eye"></i> Preview </a>
        </li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#editFileName-'.request()->get('filexl').'"><i class="fad fa-edit"></i> Rename</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#"><i class="fad fa-key"></i> Secure File</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#"><i class="fad fa-trash-alt"></i> Delete</a></li>';
        }
    }


    public function renameFile()
    {
        if (request()->is_post_request()) {

            $file_info = request()->input(['filename', 'file_id']);
            
            $db = (new Files)
                ->where([
                    'user' => Session::get('fs_user'),
                    'uuid' => $file_info->file_id
                ]);

            $fetch_info = $db->fetch_only(['path', 'name']);
            $get_old_file = resources_path($fetch_info->path . '/' . $fetch_info->name);
            $new_file_name = resources_path($fetch_info->path . '/' . $file_info->filename);
            $rename_file = rename($get_old_file, $new_file_name);

            if ($rename_file) {
                $ops = $db->update(['name' => $file_info->filename]);
                if ($ops) {
                    return '<div class="alert alert-success">File Renamed Successfully</div>';
                }
            }

            return '<div class="alert alert-danger">Operation Failed!</div>';
        }
    }



    public function previewFile(string $uuid)
    {
        if (is_uuid($uuid) && Session::get('fs_user')) {

            $db = (new Files)
                ->where([
                    'user' => Session::get('fs_user'),
                    'uuid' => $uuid
                ])->fetch_one();

            if ($db) {

                $file_dir = resources_path($db['path'] . '/' .$db['name'], true);
                $file_name = escape($db['name'], true);
                $file_size = Image::formatSize($db['size']);
                $file_uuid = $db['uuid'];
                $file_type = basename($file_name) ?? 'binary';
                $file_meme_type = mime_content_type(resources_path($db['path'] . '/' .$db['name']));

                return '
                <div class="d-flex justify-content-between flex-nowrap mb-2">
                    <span class="w-75"><h4 class="mb-3">Preview File</h4></span>
                    <span class="d-flex w-25 flex-nowrap gap-2">
                        <button type="button" class="w-50 btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="fad fa-file-download"></i></button>
                        <button type="button" class="w-50 btn btn-warning btn-sm" data-bs-dismiss="modal"><i class="fad fa-times-circle" style="color:white;"></i></button>
                    </span>
                </div>
                <div class="d-flex justify-content-between w-100 flex-wrap flex-sm-wrap flex-lg-nowrap gap-1 flex-xl-nowrap flex-xxl-nowrap flex-md-nowrap">
  
                  <div class="w-100">
                    <img src='.$file_dir.' class="img-fluid rounded" width="100%" height="100%">
                  </div>
  
                  <div class="w-100">
                    <div class="mx-3">
                      <div class="modal-header border-bottom-0">
                        <span class=""><h1 class="fw-bold fs-2">File Info</h1></span>
                      </div>
  
                      <div class="">
                         <ul class="list-group fs-5">
                            <li class="list-group-item"><strong class="fw-bold">File Name:</strong> '.$file_name.' 
                                <a>
                                    <i class="fad fa-pen-square" type="button" data-bs-toggle="modal" data-bs-target="#editFileName-'.$file_uuid.'"></i>
                                </a>
                            </li>
                            <li class="list-group-item"><strong class="fw-bold">File Size:</strong> '.$file_size.'</li>
                            <li class="list-group-item"><strong class="fw-bold">File Type:</strong> '.$file_type.'</strong> </li>
                            <li class="list-group-item"><strong class="fw-bold">File Meme:</strong> '.$file_meme_type.'</strong> </li>
                            <li class="list-group-item"><strong class="fw-bold">File Description:</strong> </li>
                         </ul>
                      </div>
                    </div>
                  </div>
                </div>
  
               ';
            } 
        }
    }


}