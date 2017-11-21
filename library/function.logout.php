<?php

include_once 'templates/all.user.php';

$user->session_kill();
$user->session_begin();

header( "refresh:0;url=index.php" );

?>
