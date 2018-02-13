<?php

  include_once 'class.database.php';
  $db = new database();

  if ($_POST) {

    if ($_POST['action'] == 'update') {

      $name = $db -> quote($_POST['name']);
      $active = $_POST['isactive'];
      $path = $_POST['path'];
      $url = $_POST['url'];

      $result = $db -> sql_query("UPDATE stormguild.banners SET name = ".$name.", url = ".$url.", path = ".$path."is_active = ".$active." WHERE banner_id =".$_POST['bannerid']);

    } else if ($_POST['action'] == 'add') {

      $name = $db -> quote($_POST['name']);
      $active = $_POST['isactive'];
      $path = $_POST['path'];
      $url = $_POST['url'];

      $result = $db -> sql_query("INSERT INTO stormguild.banners VALUES (NULL,".$name.",".$path.",".$url.",".$active.",now())");
    }

    $header = "Location:".$_POST['redirect'];
    header($header);

  }

?>
