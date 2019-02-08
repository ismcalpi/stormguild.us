<?php
	class notify {
    public function forum_email($user,$message,$channel) {
      $iniPath = $_SERVER['DOCUMENT_ROOT'].'/config/discord.ini';
      $config = parse_ini_file($iniPath);

      $data = array("content" => $message, "username" => $user);
      $hookurl = $config[$channel];
      $curl = curl_init($hookurl);
      curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      return curl_exec($curl);
    }
	}

?>
