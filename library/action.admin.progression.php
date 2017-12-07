<?php

  include_once 'class.database.php';
  $db = new database();

  if ($_POST) {

    if ($_POST['action'] == 'update' && $_POST['type'] == 'boss') {

      $name = $db -> quote($_POST['bossname']);
      $killorder = $_POST['killorder'];
      $heroic = "str_to_date('".$_POST['heroickill']."','%Y-%m-%d')";
      $mythic = "str_to_date('".$_POST['mythickill']."','%Y-%m-%d')";

      $result = $db -> sql_query("UPDATE stormguild.boss SET kill_order = ".$killorder.", name = ".$name.", heroic_kill = ".$heroic.", mythic_kill = ".$mythic." WHERE boss_id =".$_POST['bossid']);

    } else if ($_POST['action'] == 'add' && $_POST['type'] == 'boss') {

      $name = $db -> quote($_POST['bossname']);
      $raidid = $_POST['raidid'];
      $killorder = $_POST['killorder'];

      $result = $db -> sql_query("INSERT INTO stormguild.boss VALUES (NULL,".$raidid.",".$name.",".$killorder.", NULL, NULL);

    }
    $header = "Location:".$_POST['redirect'];
    header($header);

  }

?>
