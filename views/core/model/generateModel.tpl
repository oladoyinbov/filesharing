{include 'core/layout/header.tpl' pagetitle={$pagename}}
<div class="mb-4 p-1 bg-dark color-light d-flex justify-content-between text-light"><div style="font-weight:900;"><a class="btn btn-warning" href="#" onclick="history.back()"><i class="fa fa-arrow-left"></i> Back</a></div> <div style="font-weight:900;"><a class="btn btn-secondary" href="./"><i class="fa fa-house"></i> Home</a></div></div><br>

<div class="px-4 py-5 my-3 text-center">
    <i class="fab fa-buromobelexperte fa-5x fa-rotate-90" style="color:#FFC107"></i><br>
    <h1 class="container display-5 fw-bold" id="typing-effect">Model</h1><sup></sup>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Generate model to control the data and business logic of this application.</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
      </div>
    </div>
    </div>



<div class="col-lg-8 mx-auto p-4 py-md-5 mt-0">
   <center>
   <div class="mb-4 p-3 bg-dark color-light d-flex justify-content-between text-light">
   <div style="font-weight:900;" class="fs-1">Create New Model</div> 
   <div style="font-weight:900;"><a class="btn btn-warning" href="{route to='model/'}">See Existing Model ></a></div></div><br>

   <form id="defaultModel" method="POST">
     {csrf_token}
     <div class="mb-3">
    <label class="visually-hidden" for="inlineFormInputGroupUsername">Username</label>
    <div class="input-group">
      <div class="input-group-text bg-dark text-light fw-bolder">Model Name:</div>
      <input type="text" class="form-control form-control-lg" id="m_name" name="modelname" placeholder="e.g User" required>
    </div>
     </div>
     <div class="col-auto">
     <button type="submit" class="btn btn-primary mb-3 alfa-font"><i class="fa fa-code"></i> Generate</button>
     </div>
     </form>
  </center>
    </div>





    <script>
   $(document).ready(function(){
      
      alert('hello');

      $('#defaultModel').on('submit', function(e){
          e.preventDefault();

          $.ajax({
            type: "POST",
            url: "generate/model",
            data: $('#defaultModel').serialize(),
            success: function(res){
                if(res = "success"){
                    Swal.fire({
                        title: 'Model Created Successfully',
                        text: 'You will be redirected in a sec...',
                        icon: 'success',
                        timer: 3000,
                    });

                    $('#m_name').removeClass('is-invalid');
                   $('#m_name').val(null);
                    return;

                }else{

                  $('#m_name').addClass('is-invalid');
                   Swal.fire({
                        title: 'Operation Failed!',
                        text: res,
                        icon: 'error',
                        timer: 3000,
                    });
                }
                
            },
          });
      });
   });
    </script>
    
{include 'core/layout/footer.tpl'}