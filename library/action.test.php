
<?php
$message = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);
echo $message;
?>
