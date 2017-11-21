<!-- Form -->
<div class="row justify-content-center">
  <div class="col-md-6">
    <form class="g-py-15" method="POST" action="forums/ucp.php?mode=login">
      <div class="g-mb-10">
        <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15"
          type="text" placeholder="Username" name="username">
      </div>
      <div class="g-mb-10">
        <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15 mb-3"
          type="password" placeholder="Password" name="password">
      </div>
      <div class="g-mb-10">
        <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15 mb-3"
          type="email" placeholder="Email Address" name="email">
      </div>
      <input type="hidden" name="redirect" value="../index.php">
      <div class="mb-4">
        <button class="btn btn-md btn-block u-btn-blue rounded g-py-13" type="submit" name="login" value="login">Login</button>
      </div>
    </form>
  </div>
</div>
<!-- End Form -->
