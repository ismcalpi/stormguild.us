<?php
	class roster {

    public function get_classInfo ($classNum) {
      switch ($classNum) {
        case 1:
          $className = 'Warrior';
          $classColor = '#C79C6E';
          $classIcon = 'http://wow.zamimg.com/images/classes/symbols/icon-warrior.png';
          break;
        case 2:
          $className = 'Paladin';
          $classColor = '#F58CBA';
          $classIcon = 'http://wow.zamimg.com/images/classes/symbols/icon-paladin.png';
          break;
        case 3:
          $className = 'Hunter';
          $classColor = '#ABD473';
          $classIcon = 'http://wow.zamimg.com/images/classes/symbols/icon-hunter.png';
          break;
        case 4:
          $className = 'Rogue';
          $classColor = '#FFF569';
          $classIcon = 'http://wow.zamimg.com/images/classes/symbols/icon-rogue.png';
          break;
        case 5:
          $className = 'Priest';
          $classColor = '#FFFFFF';
          $classIcon = 'http://wow.zamimg.com/images/classes/symbols/icon-priest.png';
          break;
        case 6:
          $className = 'Death Knight';
          $classColor = '#C41F3B';
          $classIcon = 'http://wow.zamimg.com/images/classes/symbols/icon-deathknight.png';
          break;
        case 7:
          $className = 'Shaman';
          $classColor = '#0070DE';
          $classIcon = 'http://wow.zamimg.com/images/classes/symbols/icon-shaman.png';
          break;
        case 8:
          $className = 'Mage';
          $classColor = '#69CCF0';
          $classIcon = 'http://wow.zamimg.com/images/classes/symbols/icon-mage.png';
          break;
        case 9:
          $className = 'Warlock';
          $classColor = '#9482C9';
          $classIcon = 'http://wow.zamimg.com/images/classes/symbols/icon-warlock.png';
          break;
        case 10:
          $className = 'Monk';
          $classColor = '#00FF96';
          $classIcon = 'http://wow.zamimg.com/images/classes/symbols/icon-monk.png';
          break;
        case 11:
          $className = 'Druid';
          $classColor = '#FF7D0A';
          $classIcon = 'http://wow.zamimg.com/images/classes/symbols/icon-druid.png';
          break;
        case 12:
          $className = 'Demon Hunter';
          $classColor = '#A330C9';
          $classIcon = 'http://wow.zamimg.com/images/classes/symbols/icon-demonhunter.png';
          break;
        default:
          break;
      }

      $classInfo = array($className, $classColor, $classIcon);
      return $classInfo;

    }

    public function get_guildRank ($rankNum) {
      switch ($rankNum) {
        case 0:
          $rankName = 'Guild Master';
          break;
        case 2:
          $rankName = 'Officer';
          break;
        case 4:
          $rankName = 'Veteran Raider';
          break;
        case 6:
          $rankName = 'Raider';
          break;
      }
      return $rankName;
    }

    #public function get_classResult ($classNum) {
    #  include_once 'library/class.database.php';
    #  $db = new Database();
    #
    #return $db -> read_select("SELECT * FROM stormguild.guild_roster WHERE rank in (0,2,4,6) AND class = $classNum order by class asc, rank asc, name asc";
    #}

    public function get_classList () {
      include_once 'library/class.database.php';
      $db = new Database();

      $results = $db -> read_select("SELECT DISTINCT class from stormguild.guild_roster WHERE rank in (0,2,4,6) order by class asc");
      $classList = array();
      foreach ($results as $result) {
        $classInfo = get_classInfo($result['class']);
        array_push($classList,$classinfo);
      }
      sort($classList);
      return $classList;
    }

	}

?>
