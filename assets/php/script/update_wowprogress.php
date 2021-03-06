<?php

  include_once $_SERVER['DOCUMENT_ROOT'].'/assets/php/class/database.php';
  $db = new database();

  $json = json_decode(file_get_contents('https://www.wowprogress.com/guild/us/stormrage/storm/json_rank'));
  $area_rank = $json->area_rank;
  $realm_rank = $json->realm_rank;

  $current = $db -> readResults('SELECT * FROM stormguild.guild_rank');
  if(!$current) {
    echo "Creating New Row <br />";
    $sql = $db -> writeQuery('INSERT INTO stormguild.guild_rank VALUES(NULL,NULL,'.$area_rank.','.$realm_rank.',now(),now())');
  } else if ($current['area_rank'] != $area_rank || $current['realm_rank'] != $realm_rank) {
    echo "Updating Existing Row <br />";
    $sql = $db -> writeQuery('UPDATE stormguild.guild_rank set area_rank = '.$area_rank.', realm_rank = '.$realm_rank.', update_datetime = now()');
  } else {
    echo "No Updates Required <br />";
  }

  $tierlist = $db -> readResults("select raid_id, tier_number from stormguild.raid where tier_number > 0 and is_active = 1");
  foreach ($tierlist as $tier) {
    echo "Dealing with Tier ".$tier['tier_number']. " <br />";
    $link = 'https://www.wowprogress.com/guild/us/stormrage/Storm/rating.tier'.$tier['tier_number'].'/json_rank';
    echo $link." <br />";
    $json = json_decode(file_get_contents($link));
    $realm_rank = $json->realm_rank;
    $us_rank = $json->area_rank;
    $sql = "update stormguild.raid set realm_rank = ".$realm_rank.", us_rank = ".$us_rank." where raid_id = ".$tier['raid_id'];
    echo $sql." <br />";
    $update = $db -> writeQuery($sql);
    echo $update." <br />";
  }

?>
