{extends file="layouts/auth.tpl"}


{*  Page Title  *}
{block name='title'} Login {/block}


{*  Page Body  *}
{block name='body'}

<div class="col-lg-8 mx-auto p-4 py-md-5 mt-0">
  <center>
    <div class="mb-4 p-3 bg-dark color-light d-flex justify-content-between text-light">
      <div style="font-weight:900;" class="fs-1">Login</div>
      <div style="font-weight:900;font-size:2px;">
        <a class="btn btn-warning" href="{route to='register'}"><i class="fad fa-user-plus"></i></a>
      </div>
    </div><br>

    <div id="errors"></div>

    <form hx-post="" hx-trigger="submit" hx-target="#errors">
      {csrf_token}

      <div class="mb-3">
        <label for="email" class="form-label" style="float: left;">Email address: </label>
        <input type="email" class="form-control" name="email" id="email" aria-describedby="">
      </div>

      <div class="mb-3">
        <label for="password" class="form-label" style="float: left;">Password: </label>
        <input type="password" class="form-control" name="password" id="password" aria-describedby="">
      </div>

      <div class="col-auto">
        <button type="submit" 
              class="btn btn-dark btn-lg btn-block mb-3 alfa-font">Login <i class="fa fa-arrow-circle-right"></i>
        </button>
      </div>
    </form>

  </center>
</div>


{/block}