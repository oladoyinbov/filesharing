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
{block name='title'} Folder {/block}


{block name='panel-1'}
<div class="col-12 col-lg-auto mb-1 mb-lg-0 me-lg-auto" role="search">
  <h5 class="fw-bold"><a href="{route to='dash_myfiles'}" class="btn btn-dark"><i class="fad fa-arrow-circle-left"></i></a> {$folder_info.name}</h5>
</div>
{/block}

{* Header Panel *}
{block name='panel-2'}
<div class="">
    <a href="{route to='dash_upload_files'}" 
      class="btn btn-dark" 
      data-bs-target="#createFolder" 
      data-bs-toggle="modal"
      hx-get="{route to='dash_create_folder' params=['show' => 'form']}"
      hx-trigger="click"
      hx-target="#newfolderspace"
    >
      <i class="fad fa-edit"></i> Edit Name</a>
    <a href="{route to='dash_upload_files'}" class="btn btn-dark"><i class="fad fa-trash-alt"></i> Delete</a>
</div>
{/block}


{* Page Body *}
{block name='body'}

<div class="container mb-5">
    <div class="row gap-2">
        <div class="container col-12 d-flex bg-dark text-light p-3 rounded">
            <div><i class="fad fa-file"></i> Hello</div>
        </div>

        <div class="container col-12 d-flex bg-dark text-light p-3 rounded">
            <div><i class="fad fa-file"></i> Hello</div>
        </div>
    </div>
</div>

{/block}