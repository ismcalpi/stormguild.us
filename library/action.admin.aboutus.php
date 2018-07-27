<?php

  include_once 'class.database.php';
  $db = new database();

  if ($_POST) {

    if ($_POST['action'] == 'update') {

      $id = $_POST['aboutus_id'];

      $order = $_POST['order'];
      $size = $_POST['size'];
      $active = $_POST['active'];

      $title = $db -> quote($_POST['title']);
      $content = $db -> quote($_POST['content']);

      $sql = "UPDATE stormguild.about_us SET a_order = ".$order." AND size = ".$size." AND title = ".$title." AND content = ".$content." AND is_active = ".$active." AND update_datetime = now() AND update_user = user() WHERE aboutus_id = ".$id;
      $result = $db -> sql_query($sql);
      echo 'Attempting to Update Entry';
      echo '<br />';
      echo $db -> error();

    } else if ($_POST['action'] == 'add') {

      $order = $_POST['order'];
      $size = $_POST['size'];
      $active = $_POST['active'];

      $title = $db -> quote($_POST['title']);
      $content = $db -> quote($_POST['content']);

      $sql = "INSERT INTO stormguild.about_us VALUES (null,".$order.",".$size.",".$title.", ".$content.", ".$active.", now(), user(), null, null)";
      $result = $db -> sql_query($sql);
      echo 'Attempting to Add Entry';
      echo '<br />';
      echo $db -> error();

    } else if ($_POST['action'] == 'delete') {

      $id = $_POST['aboutus_id'];

      $sql = "DELETE FROM stormguild.about_us WHERE aboutus_id = ".$id;
      $result = $db -> sql_query($sql);

    }

    $header = "Location:".$_POST['redirect'];
    header($header);

  }

?>
