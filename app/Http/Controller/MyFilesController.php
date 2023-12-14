<?php

declare(strict_types=1);

namespace App\Http\Controller;

use App\Model\{Users, Files};
use FastVolt\Helper\Session;

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
            <li><a class="dropdown-item" href="#"><i class="fad fa-eye"></i> Preview </a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#editFileName"><i class="fad fa-edit"></i> Rename</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#"><i class="fad fa-key"></i> Secure File</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#"><i class="fad fa-trash-alt"></i> Delete</a></li>';
        }
    }


    public function renameFile()
    {
        if (request()->is_post_request()) {
            $filename = request()->input('filename');
        }
    }


}