<?php
include_once 'library/class.database.php';
$db = new database();

if(!empty($_POST['prog_id']) && !empty($_POST['status'])) {
    if(empty($_POST['killDate']) || $_POST['status'] == 'alive') {
        $killArg = 'NULL';
    } elseif (!empty($_POST['killDate'])) {
        $killArg = 'str_to_date("'.$_POST['killDate'].'","%m/%d/%Y")';
    }
    $db-> sql_query('UPDATE stormguild.progression SET kill_date = '.$killArg.', status = "'.$_POST['status'].'"
                WHERE prog_id = '.$_POST['prog_id']);
}
?>
<div class="row">
  <div class="col-12">Need to add a section here to add a new expansions / raids / bosses.</div>
  <div class="col-12 g-pa-20">
    <div class="table-responsive">
      <table class="table text-center">
        <tbody>
          <?php
            $raids = $db -> sql_select("SELECT DISTINCT raid_name FROM stormguild.progression order by tier desc");
              foreach($raids as $raid) {
                echo "<tr><td colspan=2>".$raid['raid_name']."</td></tr>";
                $bosses = $db -> sql_select("SELECT boss_name, prog_id, status, date_format(kill_date,'%m/%d/%Y') as kill_date FROM stormguild.progression WHERE raid_name ='".$raid['raid_name']."' order by kill_order desc");
                foreach($bosses as $boss) {
                  if ($boss['status'] == 'dead') {
                    $inputStatus = '<input type="hidden" name="status" value="alive">';
                    $buttonStatus = '<button type="submit" href="#nav-prog" class="btn btn-sm u-btn-outline-red">Mark Alive</button>';
                  } else {
                    $inputStatus = '<input type="hidden" name="status" value="dead">';
                    $buttonStatus = '<button type="submit" href="#nav-prog" class="btn btn-sm u-btn-outline-primary">Mark Dead</button>';
                  }
                  if ($boss['kill_date'] == NULL) {
                    $dateValue = 'placeholder="MM/DD/YYYY"';
                  } else {
                    $dateValue = 'value="'.$boss['kill_date'].'"';
                  }
                  $progForm = '<form class="form-inline" method="post">
                              <div class="input-group g-brd-primary--focus g-mr-15">
                                  <input id="killDate" name="killDate" class="form-control form-control-md rounded-0" type="text" '.$dateValue.'>
                              </div>
                              '.$buttonStatus.'
                              <input type="hidden" name="prog_id" value="'.$boss['prog_id'].'">
                              '.$inputStatus.'
                             </form>
                              ';
                  echo "<tr><td>".$boss['boss_name']."</td><td>".$progForm."</td></tr>";
                }
              } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
