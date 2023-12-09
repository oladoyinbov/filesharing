<header>
    <div class="px-3 py-2 text-bg-dark border-bottom">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
            <i class="fad fa-dragon fa-4x mb-1 mt-2 me-2" role="img" style="color:white;"></i
          </a>

          <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
            
              <a href="{route to='dash_myfiles'}" class="nav-link text-white">
                <i class="fad fa-folder-open fa-2x d-block mx-auto mb-1"></i>
                MyFiles
              </a>
            </li>
            <li>
              <a href="{route to='dash_transfer'}" class="nav-link text-white">
                <i class="fad fa-exchange-alt fa-2x d-block mx-auto mb-1"></i>
                Transfer
              </a>
            </li>
            <li>
              <a href="{route to='dash_logout'}" class="nav-link text-white">
                <i class="fad fa-sign-out-alt fa-2x d-block mx-auto mb-1"></i>
                Logout
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="px-3 py-2 border-bottom mb-3">
      <div class="container d-flex flex-wrap justify-content-center">
        <form class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto" role="search">
          <input type="search" class="form-control" placeholder="Search Users..." aria-label="Search">
        </form>

        <div class="text-end">
          <a href="{route to='dash_account'}" class="btn btn-dark text-light me-2"><i class="fad fa-user-circle"></i> Account</a>
          <a href="{route to='dashb_upload_file'}" class="btn btn-dark"><i class="fad fa-file-upload"></i> Upload File</a>
        </div>
      </div>
    </div>
  </header>