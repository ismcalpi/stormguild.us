<?php
class application {

  include 'library/class.database.php';
  include 'forums/includes/functions_messenger.php';

  protected $messenger = new messenger();
  protected $database = new database();

  public $radScreen1;
  public $radScreen2;

  public $perName;
  public $perAge;
  public $perEmail;
  public $perBnet;

  public $charName;
  public $charRealm;
  public $charClass;
  public $charSpec;
  public $charArt;
  public $charArmory;
  public $charLogs;

  public $altName;
  public $altRealm;
  public $altClass;
  public $altSpec;
  public $altArt;
  public $altArmory;
  public $altLogs;

  public $quest01;
  public $quest02;
  public $quest03;
  public $quest04;
  public $quest05;
  public $quest06;
  public $quest07;
  public $quest08;

  public $destFile;
  public $accessID;

  public function send_app() {
    $this -> add_to_db();
    $this -> mail_guild();
  }

  private function add_to_db() {

    $sql = "INSERT INTO `application`
                    (`application_id`,`access_id`,`screen01`,
                    `screen02`,`perName`,
                    `perAge`,`perEmail`,
                    `perBnet`,`charName`,
                    `charRealm`,`charClass`,
                    `charSpec`,`charArt`,
                    `charArmory`,`charLogs`,
                    `altName`,`altRealm`,
                    `altClass`,`altSpec`,
                    `altArt`,`altArmory`,
                    `altLogs`,`quest01`,
                    `quest02`,`quest03`,
                    `quest04`,`quest05`,
                    `quest06`,`quest07`,
                    `quest08`,`imgUI`,
                    `status`,`create_datetime`)
                VALUES
                    (NULL,".$accessID.",".$radScreen1.",
                    ".$radScreen2.",".$perName.",
                    ".$perAge.",".$perEmail.",
                    ".$perBnet.",".$charName.",
                    ".$charRealm.",".$charClass.",
                    ".$charSpec.",".$charArt.",
                    ".$charArmory.",".$charLogs.",
                    ".$altName.",".$altRealm.",
                    ".$altClass.",".$altSpec.",
                    ".$altArt.",".$altArmory.",
                    ".$altLogs.",".$quest01.",
                    ".$quest02.",".$quest03.",
                    ".$quest04.",".$quest05.",
                    ".$quest06.",".$quest07.",
                    ".$quest08.",".$destFile.",
                    'applied',now())";

    $database -> query($sql);
  }

  private function mail_guild() {

    $result = "SELECT username, user_lang, user_email, user_allow_massemail FROM stormforums.bb_users where group_id in (select group_id from stormforums.bb_groups where lower(group_name) in ('officer','raider'))"
    while ($row = $db->sql_fetchrow($result))
    {
      $messenger->template('new_app', $row['user_lang'], '../email');
      $messenger->to($row['user_email'], $row['username']);
      $messenger->from('applications@stormguild.us', 'Storm Raider Applications');
      $messenger->assign_vars(array(
          'APP_LINK'  => 'https://stormguild.us/admin?mode=application&access_id='.str_replace("'", "", $accessID),
          'APP_CLASS' => $charSpec.' '.$charClass
      ));

      $messenger->send($row['user_notify_type']);
    }

  }

  private function notify_discord() {

  }
}
?>
