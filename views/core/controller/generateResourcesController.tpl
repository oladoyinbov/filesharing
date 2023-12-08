{include 'core/layout/header.tpl' pagetitle={$pagename}}
<div class="mb-1 p-1 bg-dark color-light d-flex justify-content-between text-light">
  <div style="font-weight:900;"><a class="btn btn-warning" href="#" onclick="history.back()"><i
        class="fa fa-arrow-left"></i> Back</a></div>
  <div style="font-weight:900;"><a class="btn btn-secondary" href="../"><i class="fa fa-house"></i> Home</a></div>
</div><br>

<div class="px-4 py-5 my-5 text-center">
  <i class="fad fa-fan fa-spin fa-5x mb-4" style="color:#7A11F8"></i><br>
  <h1 class="container display-5 fw-bold" id="typing-effect">Resources Controller</h1><sup></sup>
  <div class="col-lg-6 mx-auto">
    <p class="lead mb-4">Generate controller with already made functions for easy access and usage</p>
    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
    </div>
  </div>
</div>



<div class="col-lg-8 mx-auto p-4 py-md-5 mt-0">
  <center>

    <div class="mb-4 p-3 bg-dark color-light d-flex justify-content-between text-light">
      <div style="font-weight:900;" class="fs-1">Create New Controller</div>
      <div style="font-weight:900;font-size:2px;"><a class="btn btn-warning">See Existing Controller ></a></div>
    </div><br>


    <form id="rsController">
       {csrf_token}
      <div class="mb-3">
        <label class="visually-hidden" for="inlineFormInputGroupUsername">Controller</label>
        <div class="input-group">
          <div class="input-group-text bg-dark text-light fw-bolder">Controller Name:</div>
          <input type="text" class="form-control form-control-lg" id="rs_name" name="rscontroller"
            placeholder="e.g User" required>
        </div>
      </div>
      <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3 alfa-font"><i class="fa fa-code"></i> Generate</button>
      </div>
    </form>
  </center>
</div>



<script>
  $(document).ready(function () {
    $('#rsController').on('submit', function (e) {
      e.preventDefault();

      $.post("../generate/rscontroller", $('#rsController').serialize(), function (data, status) {
        if (data == 'success') {
          Swal.fire({
            title: 'Controller Created Successfully',
            text: 'You will be redirected in a sec...',
            icon: 'success',
            timer: 3000,
          });

          $('#rs_name').removeClass('is-invalid');
          $('#rs_name').val(null);
        } else {
          Swal.fire({
            title: 'Operation Failed!',
            text: data,
            icon: 'error',
            timer: 3000,
          });

          $('#rs_name').addClass('is-invalid');
        }
      });


    });
  });
</script>

{include 'core/layout/footer.tpl'}