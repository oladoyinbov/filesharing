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
{block name='title'} {$folder_info.name} {/block}


{block name='panel-1'}
<div class="col-12 col-lg-auto mb-1 mb-lg-0 me-lg-auto" role="search">
  <h5 class="fw-bold"><a href="{route to='dash_myfiles'}" class="btn btn-secondary"><i class="fad fa-arrow-circle-left"></i></a> {$folder_info.name}</h5>
</div>
{/block}

{* Header Panel *}
{block name='panel-2'}
<div class="d-flex gap-2">
    <a href="{route to='dash_upload_files'}?f={$folder_info.uuid}" class="btn btn-warning">
      <i class="fad fa-upload"></i> Upload Files
    </a>
        <div class="dropdown">
            <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="10,5">
              Options 
            </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#"><i class="fad fa-edit"></i> Folder Name</a></li>
            <li><a class="dropdown-item" href="#"><i class="fas fa-share"></i> Share</a></li>
            <form action="{route to='dash_folder_delete'}" method="post">
            {csrf_token}
              <input type="hidden" name="f_id" value="{$folder_info.uuid}">
              <li><button type="submit" class="dropdown-item" href="#"><i class="fas fa-trash-alt"></i> Delete</button></li>
            </form>
        </ul>
</div>
{/block}


{* Page Body *}
{block name='body'}

{if count($files_items) > 0 }
<div class="container mb-5">
    <div class="row gap-2">

      {foreach $files_items as $file}
        <div class="container col-12 d-flex bg-light justify-content-between flex-nowrap text-dark shadow shadow-dark p-3 rounded">
            <div class="fs-5 text-truncate"><i class="fad fa-file"></i> {$file.name}</div>
            <div class="">
                <a href="#" class="btn btn-warning text-dark"><i class="fas fa-edit"></i></a>
                <a href="#" class="btn btn-danger text-light"><i class="fad fa-trash-alt"></i></a>
            </div>
        </div>
      {/foreach}

    </div>
</div>

{else}
<div class="container mb-5">
<div class="container alert alert-warning p-2">No Files Yet, Try Uploading One.</div>
</div>

{/if}

{/block}