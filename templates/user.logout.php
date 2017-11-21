<?php

$user->session_kill();
$user->session_begin();

header( "refresh:3;url=index.php" );

?>

<!-- Red Alert -->
<div class="alert alert-dismissible fade show g-bg-red g-color-white rounded-0" role="alert">
  <div class="media">
    <span class="d-flex g-mr-10 g-mt-5">
      <i class="icon-ban g-font-size-25"></i>
    </span>
    <span class="media-body align-self-center">
      You have been successfully logged out. Redirecting home in 3 seconds...
    </span>
  </div>
</div>
<!-- End Red Alert -->
