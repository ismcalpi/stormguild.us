<?php

  include_once $_SERVER['DOCUMENT_ROOT'].'/assets/php/class/database.php';
  $db = new database();

  $json = json_decode(file_get_contents('https://www.wowprogress.com/guild/us/stormrage/storm/json_rank'));
  $world_rank = $json->world_rank;
  $area_rank = $json->area_rank;
  $realm_rank = $json->realm_rank;

  $current = $db -> read_row('SELECT * FROM stormguild.guild_rank');
  if(!$current) {
    echo "Creating New Row";
    $sql = $db -> write_query('INSERT INTO stormguild.guild_rank VALUES(NULL,'.$world_rank.','.$area_rank.','.$realm_rank.',now(),now())');
  } else if ($current['world_rank'] != $world_rank || $current['area_rank'] != $area_rank || $current['realm_rank'] != $realm_rank) {
    echo "Updating Existing Row";
    $sql = $db -> write_query('UPDATE stormguild.guild_rank set world_rank = '.$world_rank.', area_rank = '.$area_rank.', realm_rank = '.$realm_rank.', update_datetime = now()');
  } else {
    echo "No Updates Required";
  }

  $tierlist = $db -> readResults("select raid_id, tier_number from stormguild.raid where tier_number > 0 and is_active = 1");
  foreach ($tierlist as $tier) {
    $json = json_decode(file_get_contents('https://www.wowprogress.com/guild/us/stormrage/Storm/rating'.$tier['tier_number'].'/json_rank'));
    $realm_rank = $json->realm_rank;
    $us_rank = $json->area_rank;
    $update = $db -> writeQuery("update stormguild.raid set realm_rank = ".$realm_rank.", us_rank = ".$us_rank." where raid_id = ".$tier['raid_id']);
  }

?>
