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
  <input type="search" class="form-control" placeholder="Search Files..." aria-label="Search">
</form>
{/block}

{* Header Panel *}
{block name='panel-2'}
<a href="{route to='dash_upload_files'}" class="btn btn-dark"><i class="fad fa-folder-plus"></i> New Folder</a>
<a href="{route to='dash_account'}" class="btn btn-dark text-light me-2"><i class="fad fa-user-circle"></i> Account</a>
<a href="{route to='dash_upload_files'}" class="btn btn-dark"><i class="fad fa-file-upload"></i> Upload File</a>
{/block}


{* Page Body *}
{block name='body'}

<div class="col-10 mx-auto p-2 py-md-2 mt-0">
  <div class="float-left fs-1 fw-bolder">Folders <i class="fad fa-caret-right"></i></div>
</div>


<div class="container mb-4">
  <div class="row gap-2">

    <div class="col-lg-2 col-md-3 col-xs-4 col-sm-5" style="background-color:transparent;">
      <div class="card border-dark">
        <div class="card-body bg-danger text-white">
          <div class="row">
            <i class="col-12 fad fa-folder fa-3x d-flex justify-content-center"></i>
          </div>
        </div>
        <a href="">
          <div class="card-footer bg-light text-danger">
            <span class="text-center">Musics <i class="fa fa-arrow-circle-right"></i></span>
          </div>
        </a>
      </div>
    </div>


    <div class="col-lg-2 col-md-3 col-sm-5 col-xs-4">
      <div class="card border-dark">
        <div class="card-body bg-danger text-white">
          <div class="row">
            <i class="col-12 fad fa-folder fa-3x d-flex justify-content-center"></i>
          </div>
        </div>
        <a href="">
          <div class="card-footer bg-light text-danger">
            <span class="text-center">Videos <i class="fa fa-arrow-circle-right"></i></span>
          </div>
        </a>
      </div>
    </div>


  </div>
</div>


{if count($files) > 0}
<div class="col-10 mx-auto p-2 py-md-2 mt-0">
  <div class="float-left fs-1 fw-bolder">Recent Files <i class="fad fa-caret-right"></i></div>
</div>

<div class="container mb-5">

  <div class="m-3">
    <div class="row gap-2">

      {* <div class="col-lg-5 col-md-5 col-sm-12 border border-dark p-3 position-relative">
        <div class="d-flex gap-2 justify-centent-around">
          <div class="d-flex-10" style=""><i class="fad fa-music"></i></div>
          <div class="d-flex-50 overflow-y-hidden" style="width:100%;overflow:hidden;">
            Audio_12i8388374643884784784784784747747474747847874.mp3</div>
          <div class="d-flex-40 position-relative" style="width:10%;">
            <a href='#' class="position-absolute top-50 start-100 translate-middle"><i
                class="fad fa-ellipsis-v fs-5"></i></a>
          </div>
        </div>
      </div> *}

      {foreach $files as $file}
      <div class="col-lg-5 col-md-5 col-sm-12 border border-dark p-3 position-relative">
        <div class="d-flex gap-2 justify-centent-around">
          <div class="d-flex-10" style=""><i class="fad fa-music"></i></div>
          <div class="d-flex-50 overflow-y-hidden" style="width:100%;overflow:hidden;">{$file.name}</div>
          <div class="d-flex-40 position-relative" style="width:10%;">
            <span class="position-absolute top-50 start-100 translate-middle">
              <div class="dropend">
                <a class="" type="button" data-bs-toggle="dropdown" aria-expanded="false" 
                hx-get="{route to='dash_myfiles_load_opt' params=['filexl'=> $file.uuid]}"
                  hx-trigger='click once'
                  hx-target='#fileopts'
                  > <i class="fad fa-ellipsis-v fs-5"></i>
                </a>
                <ul class="dropdown-menu">
                  <div id="fileopts"></div>
                </ul>
              </div>
              </a>
          </div>
        </div>
      </div>

      {* Rename Popup *}
      <div class="modal fade" id="editFileName" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
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
                  <input type="text" name="filename" class="form-control rounded-3" id="floatingInput" value="{$file.name}">
                  <label for="floatingInput">File Name</label>
                </div>

                <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">
                  Update 
                </button>
                <button type="close" class="w-100 mb-2 btn btn-lg rounded-3 btn-secondary" data-bs-dismiss="modal"
                  aria-label="Close">Cancel</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      {* *}
      <div class="modal fade" 
          id="previewFile" data-bs-backdrop="static" 
          data-bs-keyboard="false" tabindex="-1"
          aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
        <h3>Hello world</h3>
      </div>
      {/foreach}


    </div>
  </div>
</div>

{/if}

{/block}