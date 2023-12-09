{extends file="layouts/auth.tpl"}


{*  Page Title  *}
{block name='title'} Register {/block}


{*  Page Body  *}
{block name='body'}

<div class="px-4 py-1 pt-5 my-3 text-center">
  <i class="fad fa-dragon fa-5x mb-4" style="color:#7A11F8"></i><br>
  <h1 class="container display-5 fw-bold" id="typing-effect">File Sharing App</h1><sup></sup>
  <div class="col-lg-6 mx-auto">
    <p class="lead mb-4">Share files effortlessly online for free!</p>
    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
    </div>
  </div>
</div>


<div class="col-lg-8 mx-auto p-4 py-md-5 mt-0">
  <center>
    <div class="mb-4 p-3 bg-dark color-light d-flex justify-content-between text-light">
      <div style="font-weight:900;" class="fs-1">Create New Account</div>
      <div style="font-weight:900;font-size:2px;">
        <a class="btn btn-warning" href="{route to='login'}"><i class="fad fa-sign-in-alt"></i></a>
      </div>
    </div><br>

    <div id="errors"></div>

    <form hx-post="" hx-trigger="submit" hx-target="#errors">
      {csrf_token}

      <div class="mb-3">
        <label for="first_name" class="form-label" style="float:left;">First Name: </label>
        <input type="text" class="form-control" id="first_name" name="first_name" aria-describedby="">
        <div id="usernameHelp" class="form-text"></div>
      </div>

      <div class="mb-3">
        <label for="last_name" class="form-label" style="float: left;">Last Name: </label>
        <input type="text" class="form-control" name="last_name" id="last_name" aria-describedby="">
        <div id="usernameHelp" class="form-text"></div>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label" style="float: left;">Email address: </label>
        <input type="email" class="form-control" name="email" id="email" aria-describedby="" 
            hx-post="{route to='register_validate_mail'}"
            hx-trigger="keyup"
            hx-target="#mail_msg"
            hx-swap="innerHTML"
          >
        <div id="mail_msg" class="form-text text-danger"></div>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label" style="float: left;">Password: </label>
        <input type="password" class="form-control" name="password" id="password" aria-describedby="">
        <div id="passwordHelp" class="form-text"></div>
      </div>

      <div class="col-auto">
        <button type="submit" 
              class="btn btn-dark btn-lg btn-block mb-3 alfa-font">Sign Up <i class="fa fa-arrow-circle-right"></i>
        </button>
      </div>
    </form>

  </center>
</div>


{/block}