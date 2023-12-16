<?php

declare(strict_types=1);

namespace App\Http\Controller;

class FolderController extends \FastVolt\Core\Controller
{

    /**
     * Folder Name Function
     *
     * @return string
     */
    public function index(): string
    {
        return $this->response->out('Hello World!');
    }


    public function getCreateForm()
    {
        if (request()->hasQuery(['show']) == 'form') {
            return ' 
                <div class="modal-content rounded-4 shadow">
                    <div class="modal-header p-5 pb-4 border-bottom-0">
                      <h1 class="fw-bold mb-0 fs-2">Create New Folder</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
          
                <div class="modal-body p-5 pt-0">
                  <form hx-post=\'' . route('dash_create_folder') . '\' hx-trigger=\'submit\'>
                    <div class="form-floating mb-3">
                      <input type="name" name="folder_name" class="form-control rounded-3" id="floatingInput" placeholder="e.g My Collection">
                      <label for="floatingInput">Folder Name</label>
                      </div>
                      <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">OK</button>
                    </form>
                  </div>
                </div>';
        }
    }


}