<?php

  include_once $_SERVER['DOCUMENT_ROOT'].'/assets/php/class/database.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/config/config.php';

  $db = new database();
  $json = json_decode(file_get_contents($blizz_api_url));

  $this -> truncate_table();
  $this ->  populate_table($json);

  function truncate_table() {
      $sql = "TRUNCATE TABLE stormguild.guild_roster";
      $result = $db -> writeQuery($sql);
      if (!$result) {
          echo "Error Truncating the Table.";
      }
      echo "Roster Table has been Truncated.";
  }

  function populate_table($json) {
      foreach ($json->members as $member) {
          $playerName = $member->character->name;
          $playerClass = $member->character->class;
          $playerRank = $member->rank;
          $playerThumb = $member->character->thumbnail;

          if(!$member->character->spec) {
            $playerSpec = "NULL";
          } else {
            $playerSpec = $member->character->spec->icon;
          }

          if ($playerRank == 0 OR $playerRank == 2 OR $playerRank == 4 OR $playerRank == 6) {
            $sql = "INSERT INTO stormguild.guild_roster VALUES (NULL,{$db -> quote($playerName)},{$db -> quote($playerClass)},{$db -> quote($playerSpec)},{$db -> quote($playerClass)},{$db -> quote($playerThumb)},now(),NULL)";
            $db -> write_query($sql);
            echo "Inserted {$playerName} into the guild_roster table.";
          } else {
            echo "Skipping {$playerName} due to insufficient rank.";
          }
      }
  }
?>
