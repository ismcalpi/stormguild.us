<!-- Form -->
<div class="row justify-content-center">
  <div class="col-md-6">
    <form class="g-py-15" method="POST" action="forums/ucp.php?mode=login">
      <div class="mb-4">
        <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15"
          type="text" placeholder="Username" name="username">
      </div>
      <div class="g-mb-35">
        <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15 mb-3"
          type="password" placeholder="Password" name="password">
        <div class="row justify-content-between">
          <div class="col align-self-center">
            <label class="form-check-inline u-check g-color-gray-dark-v5 g-font-size-12 g-pl-25 mb-0">
              <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name="autologin">
              <div class="u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0">
                <i class="fa" data-check-icon="&#10003;"></i>
              </div>
              Keep signed in
            </label>
          </div>
          <div class="col align-self-center text-right">
            <a class="g-font-size-12" href="forums/ucp.php?mode=sendpassword">Forgot password?</a>
          </div>
        </div>
      </div>
      <input type="hidden" name="redirect" value="../index.php">
      <div class="mb-4">
        <button class="btn btn-md btn-block u-btn-blue rounded g-py-13" type="submit" name="login" value="login">Login</button>
      </div>
    </form>
    <div class="row">
      <div class="col align-self-center text-right">
        <a class="btn btn-md btn-block u-btn-primary rounded g-py-13" href="forums/ucp.php?mode=register">Create Account</a>
      </div>
    </div>
  </div>
</div>
<!-- End Form -->
