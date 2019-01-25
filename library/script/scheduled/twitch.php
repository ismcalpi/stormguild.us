<?php

$header = array('Accept: application/vnd.twitchtv.v5+json','Client-ID: dixpnolwj0yth0r3wpzxrp2edowugp');

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
