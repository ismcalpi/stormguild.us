<?php

  include '../library/class.database.php';

  $db = new database();

  $json = json_decode(file_get_contents('https://us.api.battle.net/wow/guild/Stormrage/Storm?fields=members&locale=en_US&apikey=mqa6xqp4dmuvbh4v6s3vu6xjgg75sryb'));
  foreach($json->members as $obj) {
    $playerName = $obj->character->name;
    $playerSpec = $obj->character->spec->icon;
    $playerClass = $obj->character->class;
    $playerThumb = $obj->character->thumbnail;
    $playerRank = $obj->rank;



  }

  https://wow.zamimg.com/images/wow/icons/large/$spec_img.jpg
  http://render-api-us.worldofwarcraft.com/static-render/us/$char_url
?>
