<?php
include_once 'library/class.database.php';
$db = new database();
?>

<div class="row">

  <div class="col-12 g-pa-20">
    <h2 class="h2 text-upper g-ma-30">Raid Progression</h2>

    <div id="raids" class="card rounded-0">
      <!-- Raid Header -->
      <h3 class="card-header h5 rounded-0">
        <span id="raids-head" class="collapsed g-ml-15"
          href="#raids-body" data-toggle="collapse" data-parent="#raids" aria-expanded="true" aria-controls="raids-body">
          <span class="u-accordion__control-icon g-mr-10">
            <i class="fa fa-plus"></i>
            <i class="fa fa-minus"></i>
          </span>
          Raids
        </span>
      </h3>

      <div id="raids-body" aria-labelledby="raids-head" class="card-block collapse g-pa-0">
        <table class="table table-hover g-ma-0">
          <thead>
            <tr>
              <th><strong>Expansion</strong></th>
              <th><strong>Raid Name</strong></th>
              <th><strong>Boss Count</strong></th>
              <th><strong>US Rank</strong></th>
              <th><strong>Realm Rank</strong></th>
              <th><strong>Release Date</strong></th>
              <th><strong>Image</strong></th>
              <th><strong>Active?</strong></th>
              <th><strong>Action</strong></th>
            </tr>
          </thead>
          <tbody>
            <!-- Add Boss -->
            <tr>
              <form enctype="multipart/form-data"  method="post" action="library/action.admin.progression.php">
                <input type="hidden" name="action" value="add">
                <input type="hidden" name="type" value="raid">
                <input type="hidden" name="redirect" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
                <td><input type="text" name="expansion"></td>
                <td><input type="text" name="raidname"></td>
                <td><input type="number" name="bosscount"></td>
                <td><input type="number" name="us_rank"></td>
                <td><input type="number" name="realm_rank"></td>
                <td><input type="date" name="releasedate"></td>
                <td><input class="g-ma-0" type="file" name="img" class="form-control-file" aria-describedby="fileHelp" /></td>
                <td><input type="number" name="isactive"></td>
                <td><input type="submit" class="btn btn-sm u-btn-primary g-ml-10" value="Add Raid"></input></td>
              </form>
            </tr>
            <!-- Boss Rows -->
            <?php
              $raids = $db -> sql_select("SELECT * FROM stormguild.raid ORDER BY release_date DESC");
              foreach ($raids as $raid) {
            ?>
            <tr>
              <form method="post" action="library/action.admin.progression.php">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="type" value="raid">
                <input type="hidden" name="raidid" value="<?php echo $raid['raid_id'] ?>">
                <input type="hidden" name="redirect" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
                <td><input type="text" name="expansion" value="<?php echo $raid['expansion'] ?>"></td>
                <td><input type="text" name="raidname" value="<?php echo $raid['raid'] ?>"></td>
                <td><input type="number" name="bosscount" value="<?php echo $raid['boss_count'] ?>"></td>
                <td><input type="number" name="us_rank" value="<?php echo $raid['us_rank'] ?>"></td>
                <td><input type="number" name="realm_rank" value="<?php echo $raid['realm_rank'] ?>"></td>
                <td><input type="date" name="releasedate" value="<?php echo $raid['release_date'] ?>"></td>
                <td><a target="_blank" href="<?php echo $raid['icon_img'] ?>"><img class="img-fluid w-50 g-mb-25" src="<?php echo $raid['icon_img'] ?>"></a></td>
                <td><input type="number" name="isactive" value="<?php echo $raid['is_active'] ?>"></td>
                <td><input type="submit" class="btn btn-sm u-btn-primary g-ml-10" value="Update"></input></td>
              </form>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>

    </div>

    <?php
      $raids = $db -> sql_select("SELECT * FROM stormguild.raid WHERE is_active = TRUE ORDER BY release_date DESC");
      $maxid = $db -> sql_fetchrow("SELECT raid_id FROM stormguild.raid WHERE is_active = TRUE ORDER BY release_date DESC LIMIT 1");
      foreach ($raids as $raid) {
        $raidname = strtolower(preg_replace('/\s*/', '', $raid['raid']));
        if ($maxid['raid_id'] == $raid['raid_id']) {
          $col = array('collapse show','');
        } else {
          $col = array('collapse','collapsed');
        }
    ?>
    <div id="<?php echo $raidname ?>" class="card rounded-0">
      <!-- Raid Header -->
      <h3 class="card-header h5 rounded-0">
        <span id="<?php echo $raidname ?>-head" class="<?php echo $col[1] ?> g-ml-15"
          href="#<?php echo $raidname ?>-body" data-toggle="collapse" data-parent="#<?php echo $raidname ?>" aria-expanded="true" aria-controls="<?php echo $raidname ?>-body">
          <span class="u-accordion__control-icon g-mr-10">
            <i class="fa fa-plus"></i>
            <i class="fa fa-minus"></i>
          </span>
          <?php echo $raid['expansion'].' - '.$raid['raid'] ?>
        </span>
      </h3>

      <!-- Raid Body -->
      <div id="<?php echo $raidname ?>-body" aria-labelledby="<?php echo $raidname ?>-head" class="card-block <?php echo $col[0] ?> g-pa-0">
        <table class="table table-hover g-ma-0">
          <thead>
            <tr>
              <th><strong>Boss Name</strong></th>
              <th><strong>Kill Order</strong></th>
              <th><strong>Heroic Kill Date</strong></th>
              <th><strong>Mythic Kill Date</strong></th>
              <th><strong>Action</strong></th>
            </tr>
          </thead>
          <tbody>
            <!-- Add Boss -->
            <tr>
              <form method="post" action="library/action.admin.progression.php">
                <input type="hidden" name="raidid" value="<?php echo $raid['raid_id'] ?>">
                <input type="hidden" name="action" value="add">
                <input type="hidden" name="type" value="boss">
                <input type="hidden" name="redirect" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
                <td><input type="text" name="bossname"></td>
                <td><input type="number" name="killorder"></td>
                <td></td>
                <td></td>
                <td><input type="submit" class="btn btn-sm u-btn-primary g-ml-10" value="Add Boss"></input></td>
              </form>
            </tr>
            <!-- Boss Rows -->
            <?php
              $bosses = $db -> sql_select("SELECT * FROM stormguild.boss WHERE raid_id = ".$raid['raid_id']." ORDER BY kill_order asc");
              foreach ($bosses as $boss) {
            ?>
            <tr>
              <form method="post" action="library/action.admin.progression.php">
                <input type="hidden" name="bossid" value="<?php echo $boss['boss_id'] ?>">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="type" value="boss">
                <input type="hidden" name="redirect" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
                <td><input type="text" name="bossname" value="<?php echo $boss['name'] ?>"></td>
                <td><input type="number" name="killorder" value="<?php echo $boss['kill_order'] ?>"></td>
                <td><input type="date" name="heroickill" value="<?php echo $boss['heroic_kill'] ?>"></td>
                <td><input type="date" name="mythickill" value="<?php echo $boss['mythic_kill'] ?>"></td>
                <td><input type="submit" class="btn btn-sm u-btn-primary g-ml-10" value="Update"></input></td>
              </form>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <?php
      }
    ?>
  </div>

</div>
