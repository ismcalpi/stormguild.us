<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/templates/all.user.php';
include($phpbb_root_path . 'includes/functions_messenger.' . $phpEx);
include($phpbb_root_path . 'config.' . $phpEx);
include_once $_SERVER['DOCUMENT_ROOT'].'/library/class.database.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/assets/php/class/discord.php';

$discord = new discord();

$message = $_POST['message'];
$contact = $_POST['contact'];
$type = $_POST['contact_type'];

$HasLink = strpos($message, 'http') !== false || strpos($message, 'www.') !== false || strpos($message, '[/url]') !== false || strpos($message, '</a>') !== false;

if (empty($contact) || empty($type) || empty($message)) {
  $HasBlank = True;
} else {
  $HasBlank = False;
}

if (!$HasLink && !$HasBlank) {
  notify_admins($contact,$type,$message);
  $discord_msg = $contact . " (" . $type . ") - " . $message;
  $discord -> discord_message('Sales Discord Bot', $discord_msg, 'sales');
}

$link = 'https://www.stormguild.us/'.$_POST['redirect'];
header("Location: $link");

function notify_admins($contact, $contact_type, $message) {
  $msg = new messenger(false);
  global $dbhost, $dbuser, $dbpasswd, $dbname, $accessid;
  $mysqli = new mysqli($dbhost, $dbuser, $dbpasswd, $dbname);
  $result = $mysqli -> query("SELECT username, user_lang, user_email, user_allow_viewemail FROM stormforums.bb_users where group_id in (select group_id from stormforums.bb_groups where lower(group_name) in ('officer'))");
  while($row = $result -> fetch_assoc()) {
    $msg->template('sales_template', '', $_SERVER['DOCUMENT_ROOT'].'/email');
    $msg->to($row['user_email'], $row['username']);
    $msg->im($row['user_jabber'], $row['username']);
    $msg->from('storm.sales@stormguild.us', 'Storm Sales');
    $msg->assign_vars(array(
        'CONTACT'  => $contact,
        'CONTACT_TYPE' => $contact_type,
        'MESSAGE' => $message
    ));
    $msg->send();
  }
}

?>
