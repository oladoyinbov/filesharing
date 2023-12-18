{extends file="layouts/dashboard.tpl"}


{* Custom Styles *}
{block name='style'}
<style>
  a {
    text-decoration: none;
  }

  .sxa {
    transition: all 2s ease-in;
  }
</style>
{/block}


{* Page Title *}
{block name='title'} MyFiles {/block}


{block name='panel-1'}
<form class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto" role="search">
  <input type="search" class="form-control w-100" placeholder="Search Files..." aria-label="Search">
</form>
{/block}

{* Header Panel *}
{block name='panel-2'}
<div class="">
    <a href="{route to='dash_upload_files'}" 
      class="btn btn-info" 
      data-bs-target="#createFolder" 
      data-bs-toggle="modal"
      hx-get="{route to='dash_create_folder' params=['show' => 'form']}"
      hx-trigger="click"
      hx-target="#newfolderspace"
    >
      <i class="fad fa-folder-plus"></i> New Folder</a>
    <a href="{route to='dash_upload_files'}" class="btn btn-warning"><i class="fad fa-file-upload"></i> Upload File</a>
</div>
{/block}


{* Page Body *}
{block name='body'}

{*  Flash Messages  *}
{if {flash_message} != null}
  <div class="container mb-5">
    <div class="container alert alert-warning p-2">Hello People{flash_message}</div>
  </div>
{/if}


<div class="col-10 mx-auto p-2 mb-2 py-md-2 mt-0">
  <div class="float-left fs-1 fw-bolder">Folders <i class="fad fa-caret-right"></i></div>
</div>


<div class="container mb-5">
  <div class="row gap-2">

    <div class="col-lg-2 col-md-3 col-sm-5 col-xs-4" style="background-color:transparent;">
      <div class="card border-dark">
        <div class="card-body bg-warning text-white">
          <div class="row">
            <i class="col-12 fad fa-folder fa-3x d-flex justify-content-center"></i>
          </div>
        </div>
        <a href="">
          <div class="card-footer bg-light text-dark fw-bolder">
            <span class="text-center">Documents <i class="fa fa-arrow-circle-right"></i></span>
          </div>
        </a>
      </div>
    </div>


    <div class="col-lg-2 col-md-3 col-sm-5 col-xs-4">
      <div class="card border-dark">
        <div class="card-body bg-warning text-white">
          <div class="row">
            <i class="col-12 fad fa-folder fa-3x d-flex justify-content-center"></i>
          </div>
        </div>
        <a href="">
          <div class="card-footer bg-light text-dark fw-bolder">
            <span class="text-center">Music <i class="fa fa-arrow-circle-right"></i></span>
          </div>
        </a>
      </div>
    </div>


      <div class="col-lg-2 col-md-3 col-sm-5 col-xs-4">
      <div class="card border-dark">
        <div class="card-body bg-warning text-white">
          <div class="row">
            <i class="col-12 fad fa-folder fa-3x d-flex justify-content-center"></i>
          </div>
        </div>
        <a href="">
          <div class="card-footer bg-light text-dark fw-bolder">
            <span class="text-center">Pictures <i class="fa fa-arrow-circle-right"></i></span>
          </div>
        </a>
      </div>
    </div>


    <div class="col-lg-2 col-md-3 col-sm-5 col-xs-4">
      <div class="card border-dark">
        <div class="card-body bg-warning text-white">
          <div class="row">
            <i class="col-12 fad fa-folder fa-3x d-flex justify-content-center"></i>
          </div>
        </div>
        <a href="">
          <div class="card-footer bg-light text-dark fw-bolder">
            <span class="text-center">Videos <i class="fa fa-arrow-circle-right"></i></span>
          </div>
        </a>
      </div>
    </div>


    <div class="col-lg-2 col-md-3 col-sm-5 col-xs-4">
      <div class="card border-dark">
        <div class="card-body bg-warning text-white">
          <div class="row">
            <i class="col-12 fad fa-folder fa-3x d-flex justify-content-center"></i>
          </div>
        </div>
        <a href="">
          <div class="card-footer bg-light text-dark fw-bolder">
            <span class="text-center">Pictures <i class="fa fa-arrow-circle-right"></i></span>
          </div>
        </a>
      </div>
    </div>


    <div class="col-lg-2 col-md-3 col-sm-5 col-xs-4">
      <div class="card border-dark">
        <div class="card-body bg-warning text-white">
          <div class="row">
            <i class="col-12 fad fa-folder fa-3x d-flex justify-content-center"></i>
          </div>
        </div>
        <a href="#">
          <div class="card-footer bg-light text-dark fw-bolder">
            <span class="text-center">Pictures <i class="fa fa-arrow-circle-right"></i></span>
          </div>
        </a>
      </div>
    </div>

    <div hx-get="{route to='dash_list_all_folders'}"
      hx-trigger="load"
      hx-swap="outerHTML"
    ></div>

  </div>
</div>


{if count($files) > 0}
<div class="col-10 mx-auto p-2 py-md-2 mt-0">
  <div class="float-left fs-1 fw-bolder">Recent Files <i class="fad fa-caret-right"></i></div>
</div>

<div class="container mb-5">

  <div class="m-3">
    <div class="row gap-2">

      {foreach $files as $file}
      <div
        class="col-lg-5 col-md-5 col-sm-12 border border-dark border-1 shadow shadow-dark shadow-1 p-3 position-relative">
        <div class="d-flex gap-2 justify-centent-around">
          <div class="d-flex-10" style="">
            {if {$file.type} == 'image'}
            <i class="fad fa-image fa-2x text-primary"></i>
            {elseif {$file.type} == 'video'}
            <i class="fad fa-file-video fa-2x text-warning"></i>
            {elseif {$file.type} == 'document'}
            <i class="fad fa-file-word fa-2x text-info"></i>
            {elseif {$file.type} == 'audio'}
            <i class="fad fa-file-audio fa-2x text-danger"></i>
            {elseif {$file.type} == 'archive'}
            <i class="fad fa-file-archive fa-2x text-success"></i>
            {else}
            <i class="fa fa-file"></i>
            {/if}
          </div>
          <div class="d-flex-50 overflow-y-hidden text-truncate w-100" style="overflow:hidden;">{$file.name}</div>
          <div class="d-flex-40 position-relative w-10">
            <span class="position-absolute top-50 start-100 translate-middle">
              <div class="dropup-center dropup z-3">
                <a class="" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                  hx-get="{route to='dash_myfiles_load_opt' params=['filexl'=> $file.uuid]}" hx-trigger='click'
                  hx-target='#fileopts-{$file.uuid}'> <i class="fad fa-ellipsis-v fs-5"></i>
                </a>
                <ul class="dropdown-menu">
                  <div id="fileopts-{$file.uuid}"></div>
                </ul>
              </div>
              </a>
          </div>
        </div>
      </div>

      {* Rename Popup *}
      <div class="modal fade" id="editFileName-{$file.uuid}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content rounded-4 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
              <h1 class="fw-bold mb-0 fs-2">Rename File</h1>
            </div>

            <div class="modal-body p-5 pt-0">
              <form hx-post="{route to='dash_update_file_name'}" hx-target='#msg-{$file.id}' hx-trigger='submit'>
                {csrf_token}
                <div id='msg-{$file.id}' hx-swap='innerHTML'></div>

                <input type='hidden' name='file_id' value='{$file.uuid}'>

                <div class="form-floating mb-3">
                  <input type="text" name="filename" class="form-control rounded-3" id="floatingInput"
                    value="{$file.name}">
                  <label for="floatingInput">File Name</label>
                </div>

                <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">
                  Update
                </button>
                <button type="button" class="w-100 mb-2 btn btn-lg rounded-3 btn-secondary" data-bs-dismiss="modal"
                  aria-label="Close">Cancel</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      {* Preview Popup *}
      <div class="modal fade" id="previewFile-{$file.uuid}" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-body" id="#displayprevfile-{$file.uuid}">
              <div hx-get="{route to='dash_myfiles_preview_file' params=['id' => {$file.uuid}]}" hx-trigger='revealed'
                hx-swap="innerHTML">
              </div>
            </div>
          </div>
        </div>
      </div>
      {/foreach}


    </div>
  </div>
</div>

{/if}

<div class="modal fade" id="createFolder" aria-hidden="true" data-bs-backdrop="static"
  aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
   <div id="newfolderspace"><div>
  </div>
</div>

{/block}