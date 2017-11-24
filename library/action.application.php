<?php
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : $_SERVER['DOCUMENT_ROOT'].'/forums/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);

print 'Starting work...';

print 'Loading includes...';
include_once 'class.database.php';
include($phpbb_root_path . '/includes/functions_messenger.' . $phpEx);

$accessid = uniqid();
print "Using AccessID = ".$accessid;

#App Application to database
app_add();

#notify via email and phpBB
notify_phpbb();

#Do Discord Things
#$discord_msg = "New ".$_POST['charSpec']." ".$_POST['charClass']." Application from ".$_POST['charName'].": https://www.stormguild.us/admin?mode=application&accessid=".$accessid;
#notify_discord($discord_msg);
$redirect = $_SERVER['DOCUMENT_ROOT']."/recruit.php?status=success&accessid=".$accessid;
header("Location: $redirect");

function app_add() {
  $database = new database();
  global $accessid;

  $destfile = upload_ui();
  $destfile_db = $database ->quote($destfile);
  $accessid_db = $database -> quote($accessid);

  #Clean up and declare all variables
  foreach($_POST as $key => $value){
    $$key = $database -> quote($value);
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

  #print "-----------------------------------";
  #print $app_sql;
  #print "-----------------------------------";

  if ($database -> write_query($app_sql)) {
    print 'Succeeded on Database Insert';
    return true;
  } else {
    print 'Failed on Database Insert';
    $error_db = $database -> error();
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

function notify_phpbb() {
  $messenger = new messenger(false);
  $result = "SELECT username, user_lang, user_email, user_allow_massemail FROM stormforums.bb_users where group_id in (select group_id from stormforums.bb_groups where lower(group_name) in ('officer','raider'))";
  while($row = $db->sql_fetchrow($result))
  {
    $messenger->template('new_app', '', '../email');
    $messenger->to($row['user_email'], $row['username']);
    $messenger->im($row['user_jabber'], $row['username']);
    $messenger->from('applications@stormguild.us', 'Storm Raider Applications');
    $messenger->assign_vars(array(
        'APP_LINK'  => 'https://stormguild.us/admin?mode=application&access_id='.$accessID,
        'APP_CLASS' => $_POST['$charSpec'].' '.$_POST['$charClass']
    ));
    $messenger->send($row['user_notify_type']);
  }
}

function upload_ui() {
  global $accessid;
  #Set and make our Destination Path
  $destPath = $_SERVER['DOCUMENT_ROOT'].'/assets/img/uploads/applications/'.$accessid.'/';
  print_r ($destPath);
  mkdir($destPath);
  #Find and move our file
  $destFile = $destPath.basename($_FILES['imgUI']['name']);
  $tmpFile = $_FILES['imgUI']['tmp_name'];
  if (move_uploaded_file($tmpFile, $destFile)){
    return $destFile;
  }
}

?>
