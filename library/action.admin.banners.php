<?php

  include_once 'class.database.php';
  $db = new database();

  if ($_POST) {

    if ($_POST['action'] == 'update') {

      $name = $db -> quote($_POST['name']);
      $active = $_POST['isactive'];
      $path = $db -> quote($_POST['path']);
      $url = $db -> quote($_POST['url']);

      $result = $db -> sql_query("UPDATE stormguild.banners SET name = ".$name.", url = ".$url.", path = ".$path.", is_active = ".$active." WHERE banner_id =".$_POST['bannerid']);

    } else if ($_POST['action'] == 'add') {

      $name = $db -> quote($_POST['name']);
      $active = $_POST['isactive'];
      $destfile = upload_banner();
      $path = $db -> quote($destfile);
      $url = $db -> quote($_POST['url']);

      $result = $db -> sql_query("INSERT INTO stormguild.banners VALUES (NULL,".$name.",".$path.",".$url.",".$active.",now())");
    }

    $header = "Location:".$_POST['redirect'];
    header($header);

  }

  function upload_banner() {
    #Set and make our Destination Path
    $destPath = 'assets/img/uploads/banner';
    #Find and move our file
    $destFile = $_SERVER['DOCUMENT_ROOT']."/".$destPath."/".basename($_FILES['img']['name']);
    $tmpFile = $_FILES['img']['tmp_name'];
    if (move_uploaded_file($tmpFile, $destFile)){
      return $destPath.basename($_FILES['img']['name']);
    }
  }

?>
