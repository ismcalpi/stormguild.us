<?php

  include '../library/class.database.php';

  $db = new database();

  $json = json_decode(file_get_contents('https://us.api.battle.net/wow/guild/Stormrage/Storm?fields=members&locale=en_US&apikey=mqa6xqp4dmuvbh4v6s3vu6xjgg75sryb'));

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

    echo 'Handling '.$playerName.' now. Class: '.$playerClass.' Spec: '.$playerSpec.' Rank: '.$playerRank.' Thumbnail: '.$playerThumb.' <br />';
  }
?>
