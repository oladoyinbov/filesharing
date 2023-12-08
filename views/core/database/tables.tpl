{include 'core/layout/header.tpl' pagetitle={$pagename}}
<div class="mb-2 p-1 bg-dark color-light d-flex justify-content-between text-light">
  <div style="font-weight:900;"><a class="btn btn-warning" href="#" onclick="history.back()"><i
        class="fa fa-arrow-left"></i> Back</a></div>
  <div style="font-weight:900;"><a class="btn btn-secondary" href="../"><i class="fa fa-house"></i> Home</a></div>
</div><br>

<div class="px-3 py-4 my-2 text-center">
  <i class="fad fa-table fa-5x mb-4" style="color:#7A11F8"></i><br>
  <h1 class="container display-5 fw-bold" id="typing-effect">Database Tables</h1><sup></sup>
  <div class="col-lg-6 mx-auto">
    <p class="lead mb-4">Manage your database tables and colomns easily.</p>
    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
    </div>
  </div>
</div>


<div class="col-lg-8 mx-auto p-4 py-md-5 mt-0">
  <center>
    <div class="mb-2 p-3 bg-dark color-light d-flex justify-content-between text-light">
      <div style="font-weight:900;" class="fs-1">Table Models</div>
      <div style="font-weight:900;">
        <a class="btn btn-warning" href="create-new-table">
          <i class="fad fa-plus"></i> Create New</a>
        <a class="btn btn-warning" href="js:void" onclick="location.reload();">
          <i class="fad fa-ufo-beam"></i> Migrate All</a>

      </div>

    </div><br>

    {if $db_connection eq true}
    {if $db_name eq 'mysql'}

    {if {$flash_message} != null}
    <div class="p-4 mb-3 shadow shadow-md d-flex alert alert-warning" style="">
      {$flash_message|upper}
    </div>
    {/if}

    {foreach $files as $file}
    <div class="p-4 mb-4 shadow shadow-md d-flex justify-content-between" style="background-color:#F5F5F5;">
      <div class="fw-bold fs-5"><i class="fad fa-database"></i> {$file|escape}</div>
      <div class="d-flex gap-2">
        <form method="POST">
        {csrf_token}
          <input type="hidden" value="{$file|escape}" name="file_name" />
          <button class="btn btn-primary" type="submit" href="">Run Migration</button>
        </form>

        <form method="POST">{csrf_token}
          <input type="hidden" value="{$file|escape}" name="delete_file_name" />
          <button class="btn btn-primary" type="submit" href="">Delete</button>
        </form>
      </div>
    </div>
    {/foreach}


    {else}
    <div class="alert alert-warning">{$db_name} Driver Is Not Supported Yet.</div>
    {/if}
    {else}
    <div class="alert alert-danger">Database Connection Failed, Please Try Checking Your Env Config or Error Log.</div>
    {/if}

  </center>
</div>




{include 'core/layout/footer.tpl'}