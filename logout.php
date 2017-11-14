<?php

   ob_start();
   session_start();

   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   unset($_SESSION['user_rank']);
   $_SESSION['valid'] = false;

   setcookie('username', "", time() + (86400 * 30), "/");
   setcookie('user_rank', "", time() + (86400 * 30), "/");

   unset($_COOKIE["username"]);
   unset($_COOKIE["user_rank"]);

   echo 'You have been logged out.';
   header('Refresh: 1; URL = index.php');

?>
