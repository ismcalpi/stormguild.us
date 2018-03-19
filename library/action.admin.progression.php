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

      $result = $db -> sql_query("INSERT INTO stormguild.boss VALUES (NULL,".$raidid.",".$name.",".$killorder.", NULL, NULL)");

    } else if ($_POST['action'] == 'add' && $_POST['type'] == 'raid') {

      $expansion = $db -> quote($_POST['expansion']);
      $name = $db -> quote($_POST['raidname']);
      $count = $_POST['bosscount'];
      $path = upload_banner();
      $path = $db -> quote($path);
      $release = "str_to_date('".$_POST['releasedate']."','%Y-%m-%d')";
      $active = $_POST['isactive'];

      $result = $db -> sql_query("INSERT INTO stormguild.raid VALUES (NULL,".$expansion.",".$name.",".$count.",".$release.", ".$path.", NULL, ".$active.")");

    } else if ($_POST['action'] == 'update' && $_POST['type'] == 'raid') {

      $raidid = $_POST['raidid'];
      $expansion = $db -> quote($_POST['expansion']);
      $name = $db -> quote($_POST['raidname']);
      $count = $_POST['bosscount'];
      $release = "str_to_date('".$_POST['releasedate']."','%Y-%m-%d')";
      $active = $_POST['isactive'];

      $result = $db -> sql_query("UPDATE stormguild.raid SET expansion = ".$expansion.", raid = ".$name.", boss_count = ".$count.", release_date = ".$release.", is_active = ".$active." WHERE raid_id =".$_POST['raidid']);

    }

    $header = "Location:".$_POST['redirect'];
    header($header);

  }

  function upload_banner() {
    #Set and make our Destination Path
    $destPath = 'assets/img/uploads/progression';
    #Find and move our file
    $destFile = $_SERVER['DOCUMENT_ROOT']."/".$destPath."/".basename($_FILES['img']['name']);
    $tmpFile = $_FILES['img']['tmp_name'];
    if (move_uploaded_file($tmpFile, $destFile)){
      return $destPath."/".basename($_FILES['img']['name']);
    } else {
      die("File Moving Failed.");
    }
  }

?>
