<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/templates/all.user.php';
include($phpbb_root_path . 'includes/functions_messenger.' . $phpEx);
include($phpbb_root_path . 'config.' . $phpEx);
include_once $_SERVER['DOCUMENT_ROOT'].'/library/class.database.php';

notify_admins($_POST['contact'],$_POST['contact_type'],$_POST['message']);
// notify_discord($discord_msg);

$link = 'https://www.stormguild.us/'.$_POST['redirect'];
header("Location: $link");

function notify_discord($message) {
  $data = array("content" => $message, "username" => "Application Robot");
  $curl = curl_init("https://discordapp.com/api/webhooks/383667737525878798/-OZH5-jbnsIpngVOgzcsTuLqTpkDbx7OULmmBOd0zaPUAcYIiLdMczsU9m65iHzNF3vQ");
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  return curl_exec($curl);
}

function notify_admins($contact, $contact_type, $message) {
  $msg = new messenger(false);
  global $dbhost, $dbuser, $dbpasswd, $dbname, $accessid;
  $mysqli = new mysqli($dbhost, $dbuser, $dbpasswd, $dbname);
  $result = $mysqli -> query("SELECT username, user_lang, user_email, user_allow_viewemail FROM stormforums.bb_users where group_id in (select group_id from stormforums.bb_groups where lower(group_name) in ('officer'))");
  while($row = $result -> fetch_assoc()) {
    $msg->template('sales_template', '', $_SERVER['DOCUMENT_ROOT'].'/email');
    $msg->to($row['user_email'], $row['username']);
    $msg->im($row['user_jabber'], $row['username']);
    $msg->from('applications@stormguild.us', 'Storm Raider Applications');
    $msg->assign_vars(array(
        'CONTACT'  => $contact,
        'CONTACT_TYPE' => $contact_type,
        'MESSAGE' => $message
    ));
    $msg->send();
  }
}

?>
