<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/templates/all.user.php';
include($phpbb_root_path . 'includes/functions_messenger.' . $phpEx);
include($phpbb_root_path . 'config.' . $phpEx);
include_once $_SERVER['DOCUMENT_ROOT'].'/library/class.database.php';

$accessid = uniqid();
$discord_msg = "New ".$_POST['charSpec']." ".$_POST['charClass']." Application from ".$_POST['charName'].": https://www.stormguild.us/admin?mode=application&accessid=".$accessid;
#App Application to database
app_add();
#notify via email and phpBB
notify_guild();
notify_applicant();
#notify_discord($discord_msg);

$redirect = $_SERVER['DOCUMENT_ROOT']."/recruit.php?status=success&accessid=".$accessid;
header("Location: $redirect");

function app_add() {
  $db = new database();
  global $accessid;

  $destfile = upload_ui();
  $destfile_db = $db ->quote($destfile);
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
      ".$perBnet.",".$charName.",
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
      'applied',now())";

  $result = $db -> sql_query($app_sql);
  if (!$result) {
    return true;
  } else {
    $error_db = $db -> error();
    print $error_db;
    return false;
  }

}

function notify_discord($message) {
  $data = array("content" => $message, "username" => "Captain Hook");
  $curl = curl_init("https://discordapp.com/api/webhooks/YOUR-WEBHOOK-URL-HERE");
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  return curl_exec($curl);
}

function notify_guild() {
  $msg = new messenger(false);
  $db = new mysqli($dbhost, $dbuser, $dbpasswd, $dbname);
  unset($dbpasswd);
  global $accessid;
  $result = $db -> querty("SELECT username, user_lang, user_email, user_allow_massemail FROM stormforums.bb_users where group_id in (select group_id from stormforums.bb_groups where lower(group_name) in ('officer','raider'))");
  while($row = $db -> fetch_assoc()) {
    $msg->template('new_app', '', $_SERVER['DOCUMENT_ROOT'].'/email');
    $msg->to($row['user_email'], $row['username']);
    $msg->im($row['user_jabber'], $row['username']);
    $msg->from('applications@stormguild.us', 'Storm Raider Applications');
    $msg->assign_vars(array(
        'APP_LINK'  => 'https://stormguild.us/admin?mode=application&access_id='.$accessid,
        'APP_CLASS' => $_POST['$charSpec'].' '.$_POST['$charClass']
    ));
    $msg->send($row['user_notify_type']);
  }
}

function notify_applicant(){
  return true;
}

function upload_ui() {
  global $accessid;
  #Set and make our Destination Path
  $destPath = $_SERVER['DOCUMENT_ROOT'].'/assets/img/uploads/applications/'.$accessid.'/';
  mkdir($destPath);
  #Find and move our file
  $destFile = $destPath.basename($_FILES['imgUI']['name']);
  $tmpFile = $_FILES['imgUI']['tmp_name'];
  if (move_uploaded_file($tmpFile, $destFile)){
    return $destFile;
  }
}

?>
