<?php

  include_once $_SERVER['DOCUMENT_ROOT'].'/assets/php/class/database.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/assets/php/class/discord.php';

  $db = new database();

  $sql = "select application_id, datediff(now(),create_datetime) as age
          from stormguild.application
          where status = 'open'";

  $applications = $db -> readResults($sql);

  foreach ($applications as $application) {

    $age = $application['age'];

    if ($age == 6) {
      //application will autodecline soon, warn
      warn($application);
    } else if ($age >= 7) {
      //application is old enough to autodecline
      decline($application);
    } else {
      echo 'ERROR WILL ROBINSON';
    }
  }


  function warn($app) {

    $discord = new discord();

    $user = ':smiling_imp: Auto-Decline Bot';
    $member_link = "https://www.stormguild.us/application.php?appid=".$app['application_id'];
    $discord_msg = "Warning: ".$app['charName']." is ".$app['age']." days old and will be declined soon. \n Link: ".$member_link;
    $discord -> discord_message($user,$message,'recruit');

  }

  function decline($app) {

    // set post fields
    $post = [
        'appid' => $app['application_id'],
        'appname' => $app['charName'],
        'status'   => 'declined',
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://www.stormguild.us/library/action.application.decision.php");
    curl_setopt($ch, CURLOPT_POST, true);
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
