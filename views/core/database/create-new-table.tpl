{include 'core/layout/header.tpl' pagetitle={$pagename}}

<div class="mb-4 p-1 bg-dark color-light d-flex justify-content-between text-light"><div style="font-weight:900;"><a class="btn btn-warning" href="#" onclick="history.back()"><i class="fa fa-arrow-left"></i> Back</a></div> <div style="font-weight:900;"><a class="btn btn-secondary" href="../"><i class="fa fa-house"></i> Home</a></div></div><br>

<div class="px-4 py-5 my-3 text-center">
  <i class="fad fa-table fa-5x" style="color:#FFC107"></i><br>
  <h1 class="container display-5 fw-bold" id="typing-effect">New Table</h1><sup></sup>
  <div class="col-lg-6 mx-auto">
    <p class="lead mb-4">Generate new database table with model generation.</p>
    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
    </div>
  </div>
</div>



<div class="col-lg-8 mx-auto p-4 py-md-5 mt-0">
  <center>
    <div class="mb-4 p-3 bg-dark color-light d-flex justify-content-between text-light">
      <div style="font-weight:900;" class="fs-1">Create New Table</div>
      <div style="font-weight:900;"><a class="btn btn-warning" href="{route to='devtool/database/tables'}">See Existing Tables</a></div>
    </div><br>

    <form id="defaultModel" method="POST">
      {csrf_token}
      <div class="mb-3">
        <label class="visually-hidden" for="table_name">Table Name</label>
        <div class="input-group">
          <div class="input-group-text bg-dark text-light fw-bolder">Table Name:</div>
          <input type="text" class="form-control form-control-lg" id="m_name" name="table_name" placeholder="e.g User" required>
        </div>
      </div>

      <div class="mb-3">
      <div class="form-check form-switch">
         <p><i class="fad fa-database"></i> Create A Model For This Database Table? 

              <input type="radio" class="btn-check" name="options[]"  id="option1" value="yes" autocomplete="off" checked>
              <label class="btn btn-light border border-dark" for="option1">Yes</label>

              <input type="radio" class="btn-check" name="options[]" id="option2" value="no" autocomplete="off">
              <label class="btn btn-light border border-dark" for="option2">No</label>
              </select>
          </p>

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

    $('#defaultModel').on('submit', function (e) {
      e.preventDefault();

      $.ajax({
        type: "POST",
        url: "",
        data: $('#defaultModel').serialize(),
        success: function (res) {

          if (res.result.status == 200) {

            Swal.fire({
              title: res.result.msg,
              text: 'You will be redirected in a sec...',
              icon: 'success',
              timer: 3000,
            });

            $('#m_name').removeClass('is-invalid');
            $('#m_name').val(null);
            return;

          } else if (res.result.status == 201) {

            Swal.fire({
              title: res.result.msg,
              text: 'You will be redirected in a sec...',
              icon: 'success',
              timer: 3000,
            });

            $('#m_name').removeClass('is-invalid');
            $('#m_name').val(null);
            return;

          } else {

            $('#m_name').addClass('is-invalid');
            Swal.fire({
              title: 'Operation Failed!',
              text: res.result.msg,
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