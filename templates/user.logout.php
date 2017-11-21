<?php
$user->session_kill();
$user->session_begin();
?>
<!-- Form -->
<div class="row justify-content-center">
  <div class="col-md-6">
    <h2 class="h2 g-color-primary">You have been successfully logged out!</h2>
  </div>
</div>
<!-- End Form -->
<script>
$(document).ready(function () {
    // Handler for .ready() called.
    window.setTimeout(function () {
        location.href = "index.php";
    }, 1000);
});
</script>
