<?php
include_once 'library/class.database.php';
if(!isset($database)) { $database = new database(); }

include_once($phpbb_root_path . 'includes/functions_messenger.' . $phpEx);
if(!isset($messenger)) { $messenger = new messenger(); }



public function app_notify() {

  return true;
}

public function app_add() {

  return true;
}

private function notify_discord() {

}

private function notify_phpbb() {

}

#We can do better than this with jquery validate!
public function app_validate($array) {

  if (!empty($_POST['radScreen1'])) {
      $radScreen1 = $_POST['radScreen1'];
      if ($radScreen1 == 'yes') {
          $screen1YES = 'checked=""';
      } else if ($radScreen1 == 'no') {
          $screen1NO = 'checked=""';
      }
  } else {
      $appSuccess = FALSE;
      $screen1ERR = "* This is a required field";
  }
  #Screen2 Question
  if (!empty($_POST['radScreen2'])) {
      $radScreen2 = $_POST['radScreen2'];
      if ($radScreen2 == 'yes') {
          $screen2YES = 'checked=""';
      } else if ($radScreen2 == 'no') {
          $screen2NO = 'checked=""';
      }
  } else {
      $appSuccess = FALSE;
      $screen2ERR = "* This is a required field";
  }
  #perName Question
  if (!empty($_POST['perName'])) {
      $perName = $_POST['perName'];
  } else {
      $appSuccess = FALSE;
      $perNameERR = "This is a required field.";
  }
  #perAge Question
  if (!empty($_POST['perAge'])) {
      $perAge = $_POST['perAge'];
  } else {
      $appSuccess = FALSE;
      $perAgeERR = "This is a required field.";
  }
  #perEmail Question
  if (!empty($_POST['perEmail'])) {
      $perEmail = $_POST['perEmail'];
      if(!filter_var($perEmail, FILTER_VALIDATE_EMAIL)) {
          $appSuccess = FALSE;
          $perEmailERR = "This is not a valid E-Mail Address";
      }
  } else {
      $appSuccess = FALSE;
      $perEmailERR = "This is a required field.";
  }
  #perBnet Question
  if (!empty($_POST['perBnet'])) {
      $perBnet = $_POST['perBnet'];
  } else {
      $appSuccess = FALSE;
      $perBnetERR = "This is a required field.";
  }
  #charName Question
  if (!empty($_POST['charName'])) {
      $charName = $_POST['charName'];
  } else {
      $appSuccess = FALSE;
      $charNameERR = "This is a required field.";
  }
  #charRealm Question
  if (!empty($_POST['charRealm'])) {
      $charRealm = $_POST['charRealm'];
  } else {
      $appSuccess = FALSE;
      $charRealmERR = "This is a required field.";
  }
  #charClass Question
  if (!empty($_POST['charClass'])) {
      $charClass = $_POST['charClass'];
  } else {
      $appSuccess = FALSE;
      $charClassERR = "This is a required field.";
  }
  #charSpec Question
  if (!empty($_POST['charSpec'])) {
      $charSpec = $_POST['charSpec'];
  } else {
      $appSuccess = FALSE;
      $charSpecERR = "This is a required field.";
  }
  #charArt Question
  if (!empty($_POST['charArt'])) {
      $charArt = $_POST['charArt'];
  } else {
      $appSuccess = FALSE;
      $charArtERR = "This is a required field.";
  }
  #charArmory Question
  if (!empty($_POST['charArmory'])) {
      $charArmory = $_POST['charArmory'];
  } else if (empty($_POST['charArmory'])) {
      $appSuccess = FALSE;
      $charArmoryERR = "This is a required field.";
  } else if (!filter_var($charArmory, FILTER_VALIDATE_URL)) {
      $appSuccess = FALSE;
      $charArmoryERR = "Not a valid URL.";
  }
  #charLogs Question
  if (!empty($_POST['charLogs'])) {
      $charLogs = $_POST['charLogs'];
  } else if (empty($_POST['charLogs'])) {
      $appSuccess = FALSE;
      $charLogsERR = "This is a required field.";
  } else if (!filter_var($charLogs, FILTER_VALIDATE_URL)) {
      $appSuccess = FALSE;
      $charLogsERR = "Not a valid URL.";
  }
  #altName Question
  if (!empty($_POST['altName'])) {
      $altName = $_POST['altName'];
  }
  #altRealm Question
  if (!empty($_POST['altRealm'])) {
      $altRealm = $_POST['altRealm'];
  } else if (!empty($altName)) {
      $appSuccess = FALSE;
      $altRealmERR = "This is a required field.";
  }
  #altClass Question
  if (!empty($_POST['altClass'])) {
      $altClass = $_POST['altClass'];
  } else if (!empty($altName)) {
      $appSuccess = FALSE;
      $altClassERR = "This is a required field.";
  }
  #altSpec Question
  if (!empty($_POST['altSpec'])) {
      $altSpec = $_POST['altSpec'];
  } else if (!empty($altName)) {
      $appSuccess = FALSE;
      $altSpecERR = "This is a required field.";
  }
  #altArt Question
  if (!empty($_POST['altArt'])) {
      $altArt = $_POST['altArt'];
  } else if (!empty($altName)) {
      $appSuccess = FALSE;
      $altArtERR = "This is a required field.";
  }
  #altArmory Question
  if (!empty($_POST['altArmory'])) {
      $altArmory = $_POST['altArmory'];
  } else if (!empty($altName)) {
      $appSuccess = FALSE;
      $altArmoryERR = "This is a required field.";
  } else if (!empty($altName) && !filter_var($altArmory, FILTER_VALIDATE_URL)) {
      $appSuccess = FALSE;
      $altArmoryERR = "Not a valid URL.";
  }
  #altLogs Question
  if (!empty($_POST['altLogs'])) {
      $altLogs = $_POST['altLogs'];
  } else if (!empty($altName)) {
      $appSuccess = FALSE;
      $altLogsERR = "This is a required field.";
  } else if (!empty($altName) && !filter_var($altLogs, FILTER_VALIDATE_URL)) {
      $appSuccess = FALSE;
      $altLogsERR = "Not a valid URL.";
  }
  #quest01
  if (!empty($_POST['quest01'])) {
      $quest01 = $_POST['quest01'];
  } else {
      $appSuccess = FALSE;
      $quest01ERR = "This is a required field.";
  }
  #quest02
  if (!empty($_POST['quest02'])) {
      $quest02 = $_POST['quest02'];
  } else {
      $appSuccess = FALSE;
      $quest02ERR = "This is a required field.";
  }
  #quest03
  if (!empty($_POST['quest03'])) {
      $quest03 = $_POST['quest03'];
  } else {
      $appSuccess = FALSE;
      $quest03ERR = "This is a required field.";
  }
  #quest04
  if (!empty($_POST['quest04'])) {
      $quest04 = $_POST['quest04'];
  } else {
      $appSuccess = FALSE;
      $quest04ERR = "This is a required field.";
  }
  #quest05
  if (!empty($_POST['quest05'])) {
      $quest05 = $_POST['quest05'];
  } else {
      $appSuccess = FALSE;
      $quest05ERR = "This is a required field.";
  }
  #quest06
  if (!empty($_POST['quest06'])) {
      $quest06 = $_POST['quest06'];
  } else {
      $appSuccess = FALSE;
      $quest06ERR = "This is a required field.";
  }
  #fileUI
  if ($_FILES["imgUI"]["error"] != UPLOAD_ERR_OK) {
      $appSuccess = FALSE;
      $quest06ERR = "This is a required field.";
  }
  #quest07
  if (!empty($_POST['quest07'])) {
      $quest07 = $_POST['quest07'];
  } else {
      $appSuccess = FALSE;
      $quest07ERR = "This is a required field.";
  }
  #quest08
  if (!empty($_POST['quest08'])) {
      $quest08 = $_POST['quest08'];
  } else {
      $appSuccess = FALSE;
      $quest08ERR = "This is a required field.";
  }
  return true;
}

?>
