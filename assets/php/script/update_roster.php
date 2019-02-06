<?php

  include_once $_SERVER['DOCUMENT_ROOT'].'/assets/php/class/database.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/config/config.php';

  $db = new database();
  $json = json_decode(file_get_contents($blizz_api_url));

  truncate_table($db);
  populate_table($json,$db);

  function truncate_table($db) {
      $sql = "TRUNCATE TABLE stormguild.guild_roster";
      $result = $db -> writeQuery($sql);
      if (!$result) {
          echo "Error Truncating the Table.<br />";
      }
      echo "Roster Table has been Truncated.<br />";
  }

  function populate_table($json, $db) {
      foreach ($json->members as $member) {
          $playerName = $member->character->name;
          $playerClass = $member->character->class;
          $playerRank = $member->rank;
          $playerThumb = $member->character->thumbnail;

          if(isset($member->character->spec)) {
              $playerSpec = $member->character->spec->icon;
          } else {
              $playerSpec = "NULL";
          }

          if ($playerRank == 0 OR $playerRank == 2 OR $playerRank == 4 OR $playerRank == 6) {
            $sql = "INSERT INTO stormguild.guild_roster VALUES (NULL,{$db -> quote($playerName)},{$db -> quote($playerRank)},{$db -> quote($playerSpec)},{$db -> quote($playerClass)},{$db -> quote($playerThumb)},now(),NULL)";
            $db -> writeQuery($sql);
            echo "Inserted {$playerName} into the guild_roster table.<br />";
          } else {
            #echo "Skipping {$playerName} due to insufficient rank.<br />";
          }
      }
  }
?>
