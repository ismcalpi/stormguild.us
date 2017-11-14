<?php

   session_start();

   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   unset($_SESSION['user_rank']);
   $_SESSION['valid'] = false;

   echo 'You have been logged out.';
   header('Refresh: 1; URL = index.php');

?>