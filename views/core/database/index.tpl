{include 'core/layout/header.tpl' pagetitle={$pagename}}
<div class="mb-4 p-1 bg-dark color-light d-flex justify-content-between text-light"><div style="font-weight:900;"><a class="btn btn-warning" href="#" onclick="history.back()"><i class="fa fa-arrow-left"></i> Back</a></div> <div style="font-weight:900;"><a class="btn btn-secondary" href="./"><i class="fa fa-house"></i> Home</a></div></div><br>

<div class="px-3 py-4 my-2 text-center">
    <i class="fad fa-database fa-5x mb-4" style="color:#7A11F8"></i><br>
    <h1 class="container display-5 fw-bold" id="typing-effect">Database</h1><sup></sup>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Generate model to control the data and business logic of this application.</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
      </div>
    </div>
    </div>


<div class="col-lg-8 mx-auto p-4 py-md-5 mt-0">
   <center>
   <div class="mb-4 p-3 bg-dark color-light d-flex justify-content-between text-light"><div style="font-weight:900;" class="fs-1">DB Functions</div> <div style="font-weight:900;"><a class="btn btn-warning" href="js:void" onclick="location.reload();"><i class="fad fa-sync"></i> Sync</a></div></div><br>
        {if $db_connection eq true}
        {if $db_name eq 'mysql'}
        <div class="p-4 mb-3 shadow shadow-md d-flex justify-content-between" style="background-color:#F5F5F5;">
            <div class="fw-bold fs-5"><i class="fad fa-ufo-beam"></i> Migration</div>
            <div><a class="btn btn-primary" href="database/tables">Run Migration</a></div>
        </div>

        <div class="p-4 mb-3 shadow shadow-md d-flex justify-content-between" style="background-color:#F5F5F5;">
            <div class="fw-bold fs-5"><i class="fad fa-table"></i> Tables</div>
            <div><a class="btn btn-secondary" href="">{$db_rows} Tables</a></div></div>
        </div>
        {else}
        <div class="alert alert-warning">{$db_name} Driver Is Not Supported Yet.</div>
         {/if}
         {else}
         <div class="alert alert-danger">Database Connection Failed, Please Try Checking Your Env Config or Error Log.</div>
         {/if}
   
  </center>
    </div>



    
{include 'core/layout/footer.tpl'}