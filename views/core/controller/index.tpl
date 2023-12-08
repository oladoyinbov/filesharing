{include 'core/layout/header.tpl' pagetitle={$pagename}}
<div class="mb-1 p-1 bg-dark color-light d-flex justify-content-between text-light"><div style="font-weight:900;"><a class="btn btn-warning" href="#" onclick="history.back()"><i class="fa fa-arrow-left"></i> Back</a></div> <div style="font-weight:900;"><a class="btn btn-secondary" href="./"><i class="fa fa-house"></i> Home</a></div></div><br>

<div class="px-4 py-5 my-5 text-center">
    <i class="fad fa-fan fa-spin fa-5x mb-4" style="color:#7A11F8"></i><br>
    <h1 class="container display-5 fw-bold" id="typing-effect">Controller</h1><sup></sup>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Development section of FastVolt Framework</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        
      </div>
    </div>
    </div>



   <div class="container py-5">
    <div class="row align-items-md-stretch">



         <div class="col-md-6">
        <div class="h-90 p-5 text-bg-primary rounded-3 border border-white border-5">
          <h2><i class="fad fa-fan"></i> Default Controller</h2>
          <p>Create default controller with resources</p>
          <a href="controller/default"><button class="btn btn-dark" type="button"><i class="fad fa-code"></i> Generate</button></a>
        </div>
      </div>



      <div class="col-md-6">
        <div class="h-90 p-5 text-bg-primary rounded-3 border border-white border-5">
          <h2><i class="fad fa-database"></i> Resources Controller</h2>
          <p>Create resources controller with all already made functions</p>
          <a href="controller/resources"><button class="btn btn-info" type="button"><i class="fad fa-code"></i> Generate</button></a>
        </div>
      </div>



    </div>
    </div>
    
{include 'core/layout/footer.tpl'}