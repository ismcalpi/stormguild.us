
<?php
  $my_referer = isset($_POST['referer']) ? trim($_POST['referer']) : (isset($_SERVER['HTTP_REFERER']) ? base64_encode($_SERVER['HTTP_REFERER']) : false);;
  echo $my_referer;
?>
