<?php
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : $_SERVER['DOCUMENT_ROOT'].'/forums/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);

include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/functions_user.' . $phpEx);

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup();

$user_group = strtolower(get_group_name($user->data['group_id']));
if ($user_group == 'officer') {
  $user_rank = 3;
} else if ($user_group == 'raider') {
  $user_rank = 2;
} else if ($user_group == 'recruit') {
  $user_rank = 1;
} else {
  $user_rank = 0;
}

if($user->data['is_registered']) {
  $user_register = 1;
} else {
  $user_register = 0;
}

$request->enable_super_globals();
?>
