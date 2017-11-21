<?php
define('IN_PHPBB', true);
define('ROOT_PATH', "forums");

if (!defined('IN_PHPBB') || !defined('ROOT_PATH')) {
    exit();
}

if (is_dir('forums')) {
  $phpEx = "php";
  $phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : ROOT_PATH . '/';
  include($phpbb_root_path . 'common.' . $phpEx);

  $request->enable_super_globals();
  
  $user->session_begin();
  $auth->acl($user->data);
  $user->setup();

} else {
  echo 'ERROR: No Forums installed';
}

?>
