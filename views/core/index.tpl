{include 'core/layout/header.tpl' pagetitle='Dev Tool'}

<div class="px-4 py-5 my-5 text-center">
    <i class="fa fa-tools fa-duotone fa-5x mb-4" style="color:#7A11F8"></i><br>
    <h1 class="container display-5 fw-bold" id="typing-effect">FastVolt</h1><sup>(php v{$phpversion})</sup>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Development section of FastVolt Framework</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Explore</button>
        <button type="button" class="btn btn-outline-secondary btn-lg px-4">v{$appversion}</button>
      </div>
    </div>
    </div>



   <div class="container py-5">
    <div class="row align-items-md-stretch">

      <div class="col-md-6">
        <div class="h-90 p-5 text-bg-primary rounded-3 border border-white border-5">
          <h2><i class="fad fa-fan"></i> Controller</h2>
          <p>This is responsible for handling the logic and flow of an application. It receives requests, processes them, interacts with models and views, and returns responses to the client.</p>
          <a href="devtool/controller"><button class="btn btn-warning" type="button"><i class="fad fa-code"></i> Generate</button></a>
        </div>
      </div>



      <div class="col-md-6">
        <div class="h-90 p-5 text-bg-primary rounded-3 border border-white border-5">
          <h2><i class="fab fa-buromobelexperte fa-rotate-90"></i> Model</h2>
          <p>The data and business logic of an application. It typically interacts with a database, performs data validation, and contains methods to manipulate and retrieve data.</p>
          <a href="devtool/model"><button class="btn btn-light" type="button"><i class="fad fa-code"></i> Generate</button></a>
        </div>
      </div>




      <div class="col-md-6">
        <div class="h-90 p-5 text-bg-primary rounded-3 border border-white border-5">
          <h2><i class="fad fa-share"></i> Migration</h2>
          <p>The data and business logic of an application. It typically interacts with a database, performs data validation, and contains methods to manipulate and retrieve data.</p>
          <a href="devtool/database/tables"><button class="btn btn-dark" type="button"><i class="fad fa-code"></i> Migrate Now!</button></a>
        </div>
      </div>


            <div class="col-md-6">
        <div class="h-90 p-5 text-bg-primary rounded-3 border border-white border-5">
          <h2><i class="fad fa-database"></i> Database</h2>
          <p>Interact with your database, performs connection validation, and check database structure.</p><br>
          <a href="devtool/database"><button class="btn btn-info" type="button"><i class="fad fa-code"></i> Generate</button></a>
        </div>
      </div>


    </div>
    </div>
    
{include 'core/layout/footer.tpl'}