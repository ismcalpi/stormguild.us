<?php

  include '../library/class.database.php';
  $db = new database();

  $sql = "select * from stormguild.application where create_datetime < date_sub(now(),interval 7 day) and status = 'open'";
  $applications = $db -> sql_select($sql);

  foreach ($applications as $application) {

    echo '<p>Application ID: '.$application['application_id'].' | Char Name: '.$application['charName']. ' | Has been auto-declined due to application being over 7 days open.</p>';

    // set post fields
    $post = [
        'appid' => $application['application_id'],
        'appname' => $application['charName'],
        'status'   => 'declined',
    ];

    $ch = curl_init('http://www.stormguild.us/library/action.application.decision.php');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

    // execute!
    $response = curl_exec($ch);
    if (curl_error($ch)) {
        $error_msg = curl_error($ch);
        echo 'Error: '.$error_msg;
    }

    // close the connection, release resources used
    curl_close($ch);

  }
?>
