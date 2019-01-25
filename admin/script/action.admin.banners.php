<?php

  include_once 'class.database.php';
  $db = new database();

  if ($_POST) {

    if($_FILES['img']['name']) {
      $img = $db -> quote(upload_banner());
    }
    $banner_id = $_POST['bannerid'];
    $title = $db -> quote($_POST['title']);
    $title_style = $db -> quote($_POST['title_style']);
    $body = $db -> quote($_POST['body']);
    $body_style = $db -> quote($_POST['body_style']);
    $button_text = $db -> quote($_POST['button_text']);
    $button_color = $db -> quote($_POST['button_color']);
    $button_url = $db -> quote($_POST['button_url']);
    $animation = $db -> quote($_POST['animation']);
    $priority = $_POST['priority'];

    if ($_POST['action'] == 'update') {
      if($img) {
        $imgSQL = "img_path = {$img}, ";
      } else {
        $imgSQL = " ";
      }
      $sql = "UPDATE stormguild.banner SET {$imgSQL}title = {$title}, title_style = {$title_style}, body = {$body}, body_style = {$body_style},
              button_text = {$button_text}, button_color = {$button_color}, button_url = {$button_url}, animation = {$animation},
              priority = {$priority} WHERE banner_id = {$_POST['bannerid']}";
      $result = $db -> sql_query($sql);
    } else if ($_POST['action'] == 'add') {
      $sql = "INSERT INTO stormguild.banner VALUES(NULL,{$img},{$title},{$title_style},{$body},{$body_style},{$button_text},{$button_color},{$button_url},{$animation},{$priority},1,now())";
      $result = $db -> sql_query($sql);
    } else if ($_POST['action'] == 'delete') {
      $sql = "DELETE FROM stormguild.banner WHERE banner_id = {$banner_id}";
      $result = $db -> sql_query($sql);
    } else if ($_POST['action'] == 'activate') {
      $sql = "UPDATE stormguild.banner SET is_active = 1 WHERE banner_id = {$banner_id}";
      $result = $db -> sql_query($sql);
    } else if ($_POST['action'] == 'deactivate') {
      $sql = "UPDATE stormguild.banner SET is_active = 0 WHERE banner_id = {$banner_id}";
      $result = $db -> sql_query($sql);
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
      return $destPath."/".basename($_FILES['img']['name']);
    } else {
      die("File Moving Failed: ".$_FILES["img"]["error"]);
    }
  }

?>
