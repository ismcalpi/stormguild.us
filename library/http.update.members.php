<?php

  include_once '../library/class.database.php';
  include_once '../config/config.php';

  $db = new database();

  $json = json_decode(file_get_contents($blizz_api_url));

  $sql = "SELECT count(*) as count FROM stormguild.guild_roster";
  $sqlCount = $db -> read_row($sql);

  if (count($json->members) != $sqlCount['count']) {
    $sql = "TRUNCATE TABLE stormguild.guild_roster";
    $result = $db -> write_query($sql);
    if (!$result) {
      echo 'Error Truncating the Table.';
    }
    echo 'Detected change in roster, truncating table and recreating.<br /><br />';
  }

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

    $sqlName = $db -> quote($playerName);
    $sqlClass = $db -> quote($playerClass);
    $sqlRank = $db -> quote($playerRank);
    $sqlThumb = $db -> quote($playerThumb);
    $sqlSpec = $db -> quote($playerSpec);

    $sql = "SELECT * FROM stormguild.guild_roster WHERE name = {$sqlName} AND class = {$sqlClass}";
    $player = $db -> read_row($sql);
    if (!$player) {
      $sql = "INSERT INTO stormguild.guild_roster VALUES (NULL,{$sqlName},{$sqlRank},{$sqlSpec},{$sqlClass},{$sqlThumb},now(),NULL)";
      $result = $db -> write_query($sql);
    } else if ($player['rank'] != $playerRank) {
      $sql = "UPDATE stormguild.guild_roster SET rank = {$sqlRank} WHERE member_id = {$player['member_id']}";
      $result = $db -> write_query($sql);
    } else if ($player['spec_icon'] != $playerSpec) {
      $sql = "UPDATE stormguild.guild_roster SET spec_icon = {$sqlSpec} WHERE member_id = {$player['member_id']}";
      $result = $db -> write_query($sql);
    } else if ($player['thumbnail'] != $playerThumb) {
      $sql = "UPDATE stormguild.guild_roster SET thumbnail = {$sqlThumb} WHERE member_id = {$player['member_id']}";
      $result = $db -> write_query($sql);
    } else {

    }

    echo 'Handling '.$playerName.' now. <br />Class: '.$playerClass.' Spec: '.$playerSpec.' <br />Rank: '.$playerRank.' <br />Thumbnail: '.$playerThumb.' <br /><br />';
  }
?>
