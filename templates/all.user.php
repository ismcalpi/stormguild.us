<?php
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : 'forums/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . '/includes/functions_user.php.' . $phpEx);

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup();

if($auth->acl_get('a_')) {
  $rank = 2;
} else if ($auth->acl_get('u_')) {
  $rank = 1;
} else {
  $rank = 0;
}

$request->enable_super_globals();
?>
