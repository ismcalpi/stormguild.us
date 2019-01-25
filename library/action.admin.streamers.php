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

      $result = $db -> sql_query("INSERT INTO stormguild.streamers VALUES (NULL,".$name.",2,null,null,null,null,".$active.")");

    } else if ($_POST['action'] == 'delete') {

      $streamerid = $db -> quote($_POST['streamerid']);
      $active = $_POST['isactive'];

      $result = $db -> sql_query("DELETE FROM stormguild.streamers WHERE streamer_id = ".$streamerid);

    }

    $header = "Location:".$_POST['redirect'];
    header($header);

  }

?>
