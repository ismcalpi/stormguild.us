<?php

  include_once 'class.database.php';
  $db = new database();

  if ($_POST) {

    if ($_POST['action'] == 'update') {

      $name = $db -> quote($_POST['name']);
      $active = $_POST['isactive'];

      $result = $db -> sql_query("UPDATE stormguild.streamers SET username = ".$name.", is_active = ".$active." WHERE streamer_id =".$_POST['streamerid']);

    } else if ($_POST['action'] == 'add') {

      $name = $db -> quote($_POST['name']);
      $active = $_POST['isactive'];

      $result = $db -> sql_query("INSERT INTO stormguild.boss VALUES (NULL,".$name.",".$active.")");
    }

    $header = "Location:".$_POST['redirect'];
    header($header);

  }

?>
