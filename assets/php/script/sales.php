<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/templates/all.user.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/assets/php/class/discord.php';

$discord = new discord();

$message = $_POST['message'];
$contact = $_POST['contact'];
$contact_type = $_POST['contact_type'];
$valid = validate($message,$contact,$contact_type);

if ($valid) {
  $discord -> discord_message('Sales Discord Bot', $contact . " (" . $contact_type . ") - " . $message, 'sales');
  $link = 'https://www.stormguild.us/'.$_POST['redirect'].'?status=success';
} else {
  $link = 'https://www.stormguild.us/'.$_POST['redirect'].'?status=failure&error='.urlencode($error_message);
}

header("Location: $link");

  function validate($message,$contact,$contact_type) {
    if (check_for_link($message) && check_for_blank(array($message,$contact,$contact_type)) {
      return true;
    } else {
      return false;
    }
  }

  function check_for_link($string) {
    $valid = strpos($string, 'http') === false || strpos($string, 'www.') === false || strpos($string, '[/url]') === false || strpos($string, '</a>') === false;
    if ($valid == false) {
      global $error_message = $error_message . "Message contains URL.";
    }
    return $valid;
  }

  function check_for_empty($array) {
    $valid = true;
    foreach $array as $arr {
      if (empty($arr)) {
        $valid = false;
        global $error_message = $error_message . "Form Contains Empty Field.";
      }
    }
    return $valid;
  }

?>
