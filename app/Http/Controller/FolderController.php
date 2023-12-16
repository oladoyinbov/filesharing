<?php

declare(strict_types=1);

namespace App\Http\Controller;

use App\Model\Folders;
use FastVolt\Helper\{Session, CsrfToken, UUID};

class FolderController extends \FastVolt\Core\Controller
{
    public function createNew()
    {
        if (request()->is_post_request()) {

            $validate = request()->validate([
                'csrf_token' => 'required',
                'folder_name' => 'required|min:3|max:15',
            ], [
                'csrf_token' => 'Auth Token not verified',
                'folder_name' => 'Folder name field is required',
                'folder_name.min' => 'Folder name input must be greater than 3 characters',
                'folder_name.max' => 'Folder name input must be lesser than 15 characters',
            ]);

            if ($validate->has_errors()) {
                return '<div class="alert alert-danger"><i class="fad fa-cancel"></i> ' . $validate->errors() . '</div>';
            }

            $form = request()->input();

            if ($this->createFolder($form->folder_name, $form->icon_name)) {
                return '<div class="alert alert-success"><i class="fad fa-check-circle"></i> Folder Created Successfully</div>';
            }

            return '<div class="alert alert-danger">Something went wrong!, Please kindly refresh this page</div>';

        }

        if (request()->is_get_request() && request()->hasQuery(['show']) == 'form') {
            $csrf_form = CsrfToken::csrf_token_input_form();
            return ' 
                <div class="modal-content rounded-4 shadow">
                    <div class="modal-header p-5 pb-4 border-bottom-0">
                      <h1 class="fw-bold mb-0 fs-2">Create New Folder</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
          
                <div class="modal-body p-5 pt-0">
                   <div id="#folderalert"></div>
                  <form hx-post="' . route('dash_create_folder') . '" hx-trigger="submit">
                  ' . $csrf_form . '
                    <div class="form-floating mb-3">
                      <input type="name" name="folder_name" class="form-control rounded-3" id="floatingInput" placeholder="e.g My Collection" required>
                      <label for="floatingInput">Folder Name</label>
                      </div>

                      <div class="form-floating mb-3">
                      <input type="name" name="icon_name" class="form-control rounded-3" id="floatingInput" value="fa-folder" required>
                      <label for="floatingInput">Icon (Font Awesome)</label>
                      </div>

                      <button type="submit" class="w-100 mb-2 btn btn-lg rounded-3 btn-primary">OK</button>
                    </form>
                  </div>
                </div>';
        }
    }


    private function createFolder(string $folder_name, string $icon)
    {
        $folder_name = escape($folder_name, true);
        $icon = preg_match('/^fa-\w+$/', $icon)
            ? '<i class="col-12 fad ' . $icon . ' fa-3x d-flex justify-content-center"></i>'
            : '<i class="col-12 fad fa-folder fa-3x d-flex justify-content-center"></i>';
        $icon = bin2hex($icon);

        $db = (new Folders)
            ->insert([
                'uuid' => UUID::generate(),
                'name' => $folder_name,
                'user' => Session::get('fs_user'),
                'icon' => $icon
            ]);

        if ($db) {
            return true;
        }

        return false;
    }



    public function listAllFolders()
    {
        $folders = (new Folders)
            ->where(['user' => Session::get('fs_user')])
            ->fetch_all_assoc();

        if (count($folders) > 0) {

            foreach ($folders as $folder) {

                $f_icon = hex2bin($folder['icon']);
                $url = '/' . $folder['uuid'];

                return ' 
                <div class="col-lg-2 col-md-3 col-sm-5 col-xs-4">
                   <div class="card border-dark">
                    <div class="card-body bg-danger text-white">
                      <div class="row">
                        ' . $f_icon . '
                      </div>
                    </div>
                    <a href="' . $url . '">
                      <div class="card-footer bg-light text-danger">
                        <span class="text-center">' . $folder['name'] . ' <i class="fa fa-arrow-circle-right"></i></span>
                      </div>
                    </a>
                  </div>
                </div>';
            }
        }
    }

}