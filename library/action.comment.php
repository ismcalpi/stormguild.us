<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/templates/all.user.php';
include($phpbb_root_path . 'includes/functions_messenger.' . $phpEx);
include($phpbb_root_path . 'config.' . $phpEx);
include_once $_SERVER['DOCUMENT_ROOT'].'/library/class.database.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/library/class.discord.php';

$discord = new discord();

comment_add();

$app_link = "https://www.stormguild.us/application.php?accessid=".$_POST['accessid'];
$member_link = "https://www.stormguild.us/application.php?appid=".$_POST['appid'];
$discord_msg = "New Comment from ".$_POST['username']." on ".$_POST['appname']."'s Application! \n Link: ".$member_link;

notify_guild($member_link,$_POST['appname'],$_POST['username']);
notify_applicant($app_link,$_POST['username']);
$discord -> discord_message('App Bot', $discord_msg, 'recruit');

$link = 'https://www.stormguild.us'.$_POST['redirecturi'];
header("Location: $link");

function comment_add() {
  $db = new database();

  #Clean up and declare all variables
  foreach($_POST as $key => $value){
    $$key = $db -> quote($value);
  }

  if (EMPTY($_POST['replyid'])) {
    $replyid = 'NULL';
  }

  $com_sql = "INSERT INTO stormguild.app_comment VALUE (NULL,".$replyid.",".$appid.",".$username.",".$message.",now())";

  $result = $db -> sql_query($com_sql);
  if ($result) {
    return true;
  } else {
    $error_db = $db -> error();
    print $error_db;
    return false;
  }

}

function notify_guild($link, $appname, $username) {
  $msg = new messenger(false);
  global $dbhost, $dbuser, $dbpasswd, $dbname, $accessid;
  $mysqli = new mysqli($dbhost, $dbuser, $dbpasswd, $dbname);
  $result = $mysqli -> query("SELECT username, user_lang, user_email, user_allow_viewemail FROM stormforums.bb_users where user_allow_viewemail = 1 and group_id in (select group_id from stormforums.bb_groups where lower(group_name) in ('officer','%raider%'))");
  while($row = $result -> fetch_assoc()) {
    $msg->template('comment_notify_member', '', $_SERVER['DOCUMENT_ROOT'].'/email');
    $msg->to($row['user_email'], $row['username']);
    $msg->im($row['user_jabber'], $row['username']);
    $msg->from('applications@stormguild.us', 'Storm Raider Applications');
    $msg->assign_vars(array(
        'APP_LINK'  => $link,
        'APP_NAME' => $appname,
        'USERNAME' => $username
    ));
    $msg->send();
  }
}

function notify_applicant($link, $username) {
  $db = new database();
  $msg = new messenger(false);

  $result = $db -> sql_fetchrow("SELECT * FROM stormguild.application WHERE application_id = ".$_POST['appid']);

  $msg->template('comment_notify_applicant', '', $_SERVER['DOCUMENT_ROOT'].'/email');
  $msg->to($result['perEmail'], $result['perName']);
  $msg->from('applications@stormguild.us', 'Storm Raider Applications');
  $msg->assign_vars(array(
      'APP_LINK'  => $link,
      'USERNAME' => $username
  ));
  $msg->send();
}
?>
