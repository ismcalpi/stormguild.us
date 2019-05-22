<?php
	class discord {

    public function discord_message($user,$message,$channel) {

      $data = array("content" => $message, "username" => $user);
      $hookurl = get_hook_url($channel);

      $curl = curl_init($hookurl);
      curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      return curl_exec($curl);

    }

		function get_hook_url($channel) {

      $iniPath = $_SERVER['DOCUMENT_ROOT'].'/config/discord.ini';
      $config = parse_ini_file($iniPath);

      return $config[$channel];

      #TODO Error Checking for if the channel is not found or just general error.

    }

	}

?>
