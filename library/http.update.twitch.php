<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/library/class.database.php';
$db = new database();

$header = array('Accept: application/vnd.twitchtv.v5+json','Client-ID: dixpnolwj0yth0r3wpzxrp2edowugp');

$results = $db -> read_select("select * from stormguild.streamers where is_active = 1");
foreach($results as $result) {
  echo "<p>Processing Streamer: ".$result['username']."<br />";
  $online = getTwitchStatus($result['username']);
  $user = getUserJSON($result['username']);
  $channel = getChannelJSON($result['username']);

  $display_name = $db -> quote($user['users'][0]['display_name']);
  $stream_logo = $db -> quote($user['users'][0]['logo']);
  $stream_message = $db -> quote($channel['status']);
  $url = $db -> quote($channel['url']);

  $twitch_sql = "UPDATE stormguild.streamers SET online = ".$online.", displayname = ".$display_name.", logo = ".$stream_logo.", status = ".$stream_message.", url = ".$url." WHERE streamer_id = ".$result['streamer_id']
  $twitch_result = $db -> sql_query($twitch_sql);
  echo "Query: ".$twitch_sql."</p><br />";
}

function getChannelID($username) {
  $json = getUserJSON($username);
  $channelID = $json['users'][0]['_id'];
  return $channelID;
}

function getUserJSON($username) {
  $url = 'https://api.twitch.tv/kraken/users?login='.$username;
  $json = getJSON($url);
  return $json;
}

function getChannelJSON($username) {
  $channelID = getChannelID($username);
  $url = 'https://api.twitch.tv/kraken/channels/'.$channelID;
  $json = getJSON($url);
  return $json;
}

function getStreamJSON($username) {
  $channelID = getChannelID($username);
  $url = 'https://api.twitch.tv/kraken/streams/'.$channelID;
  $json = getJSON($url);
  return $json;
}

function getTwitchStatus($username) {
  $json = getStreamJSON($username);
  if ($json['stream']) {
    return true;
  } else {
    return false;
  }
}

function getJSON($url) {
  global $header;
  $curl = curl_init();
  curl_setopt_array($curl, array(
      CURLOPT_RETURNTRANSFER => 1,
      CURLOPT_URL => $url,
      CURLOPT_HTTPHEADER => $header
  ));
  $raw = curl_exec($curl);
  curl_close($curl);
  $json = json_decode($raw, true);
  return $json;
}
?>
