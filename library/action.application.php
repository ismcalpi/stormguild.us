<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/templates/all.user.php';
include($phpbb_root_path . 'includes/functions_messenger.' . $phpEx);
include($phpbb_root_path . 'config.' . $phpEx);
include_once $_SERVER['DOCUMENT_ROOT'].'/library/class.database.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/library/class.discord.php';

if (count_post() && resub_check()) {

  if (strtolower($_POST['perName']) == 'testing') {
      test_app();
  } else {
      submit_app();
  }

} else {
  $redirect = "../recruit.php?status=failure&error=Invalid_OR_Duplicate_Submission#application";
  header("Location: $redirect");
}

function count_post() {

  $count = count($_POST);

  if ($count >= 20) {
    return true;
  } else {
    return false;
  }

}

function test_app() {

  $accessid = uniqid();

  $appid = getAPPID();
  $member_link = 'https://www.stormguild.us/application.php?appid='.$appid;
  echo $member_link."<br/>";

  $app_link = 'https://www.stormguild.us/application.php?accessid='.$accessid;
  echo $app_link."<br/>";

  $discord_msg = "New ".$_POST['charSpec']." ".$_POST['charClass']." Application from ".$_POST['charName']."\n".$member_link;
  echo $discord_msg."<br/>";

}

function submit_app() {

  $accessid = uniqid();
  #App Application to database
  $discord = new discord();

  app_add();
  #notify via email and phpBB
  $appid = getAPPID();
  $member_link = 'https://www.stormguild.us/application.php?appid='.$appid;
  $app_link = 'https://www.stormguild.us/application.php?accessid='.$accessid;

  $discord_msg = "New ".$_POST['charSpec']." ".$_POST['charClass']." Application from ".$_POST['charName']."\n".$member_link;
  notify_guild($member_link);
  notify_applicant($app_link);
  $discord -> discord_message('Application Discord Bot', $discord_msg, 'recruit');

  $redirect = "../recruit.php?status=success&accessid=".$accessid."#application";
  header("Location: $redirect");

}

function getAPPID() {
  $db = new database();
  global $accessid;

  $sql = "SELECT application_id FROM stormguild.application WHERE access_id = '".$accessid."'";
  $appid = $db -> sql_fetchrow($sql);
  return $appid['application_id'];
}

function resub_check() {

  $db = new database();
  $name = $db -> quote(strtolower($_POST['charName']));

  $sql = "SELECT COUNT(*) as appCount FROM stormguild.application WHERE lower(charName) = ".$name." AND create_datetime BETWEEN date_sub(now(), INTERVAL 7 DAY) AND now()";

  $result = $db -> sql_fetchrow($sql);
  print($result);

  if ($result['appCount'] >= '1') {
    return false;
  } else {
    return true;
  }

}

function app_add() {
  $db = new database();
  global $accessid;

  $destfile = upload_ui();
  $destfile_db = $db -> quote($destfile);
  $accessid_db = $db -> quote($accessid);

  #Clean up and declare all variables
  foreach($_POST as $key => $value){
    $$key = $db -> quote($value);
  }

  if (EMPTY($_POST['altName'])) {
    $altName = $altRealm = $altClass = $altSpec = $altArt = $altArmory = $altLogs = "NULL";
  }

  $app_sql = "INSERT INTO stormguild.application
      VALUES
      (NULL,".$accessid_db.",".$radScreen1.",
      ".$radScreen2.",".$perName.",
      ".$perAge.",".$perEmail.",
      ".$perBnet.",".$perDisc.",".$charName.",
      ".$charRealm.",".$charClass.",
      ".$charSpec.",".$charArt.",
      ".$charArmory.",".$charLogs.",
      ".$altName.",".$altRealm.",
      ".$altClass.",".$altSpec.",
      ".$altArt.",".$altArmory.",
      ".$altLogs.",".$quest01.",
      ".$quest02.",".$quest03.",
      ".$quest04.",".$quest05.",
      ".$quest06.",".$quest07.",
      ".$quest08.",".$destfile_db.",
      'open',now())";

  $result = $db -> sql_query($app_sql);
  if ($result) {
    return true;
  } else {
    $error_db = $db -> error();
    print $error_db;
    return false;
  }

}

function notify_guild($applink) {
  $msg = new messenger(false);
  global $dbhost, $dbuser, $dbpasswd, $dbname, $accessid;
  $mysqli = new mysqli($dbhost, $dbuser, $dbpasswd, $dbname);
  $result = $mysqli -> query("SELECT username, user_lang, user_email, user_allow_viewemail FROM stormforums.bb_users where user_allow_viewemail = 1 and group_id in (select group_id from stormforums.bb_groups where lower(group_name) in ('officer','%raider%'))");
  while($row = $result -> fetch_assoc()) {
    $msg->template('new_app', '', $_SERVER['DOCUMENT_ROOT'].'/email');
    $msg->to($row['user_email'], $row['username']);
    $msg->im($row['user_jabber'], $row['username']);
    $msg->from('applications@stormguild.us', 'Storm Raider Applications');
    $msg->assign_vars(array(
        'APP_LINK'  => $applink,
        'APP_CLASS' => $_POST['charSpec'].' '.$_POST['charClass']
    ));
    $msg->send();
  }
}

function notify_applicant($applink) {
  $msg = new messenger(false);
  $msg->template('notify_applicant', '', $_SERVER['DOCUMENT_ROOT'].'/email');
  $msg->to($_POST['perEmail'], $_POST['perName']);
  $msg->from('applications@stormguild.us', 'Storm Raider Applications');
  $msg->assign_vars(array(
      'APP_LINK'  => $applink
  ));
  $msg->send();
}

function upload_ui() {
  global $accessid;
  #Set and make our Destination Path
  $destPath = 'assets/img/uploads/applications/'.$accessid.'/';
  mkdir($_SERVER['DOCUMENT_ROOT']."/".$destPath);
  #Find and move our file
  $destFile = $_SERVER['DOCUMENT_ROOT']."/".$destPath.basename($_FILES['imgUI']['name']);
  $tmpFile = $_FILES['imgUI']['tmp_name'];
  if (move_uploaded_file($tmpFile, $destFile)){
    return $destPath.basename($_FILES['imgUI']['name']);
  }
}

?>
