<?php
include_once 'library/class.database.php';
$db = new database();
?>
<div class="row">

  <div class="col-12 g-pa-20">
    <h2 class="h2 text-upper">Raid Progression</h2>
    <a type="button" class="btn btn-sm u-btn-primary g-ma-10">Add Expansion</a>
    <?php
      $raids = $db -> sql_select("SELECT * FROM stormguild.raid WHERE is_active = TRUE ORDER BY release_date DESC");
      foreach ($raids as $raid) {
        $raidname = strtolower(preg_replace('/\s*/', '', $raid['raid']));
    ?>
    <div id="<?php echo $raidname ?>" class="card rounded-0">
      <!-- Raid Header -->
      <h3 class="card-header h5 rounded-0">
        <span id="<?php echo $raidname ?>-head" class="collapsed g-ml-15"
          href="#<?php echo $raidname ?>-body" data-toggle="collapse" data-parent="#<?php echo $raidname ?>" aria-expanded="true" aria-controls="<?php echo $raidname ?>-body">
          <span class="u-accordion__control-icon g-mr-10">
            <i class="fa fa-plus"></i>
            <i class="fa fa-minus"></i>
          </span>
          <?php echo $raid['expansion'].' - '.$raid['raid'] ?>
        </span>
        <a type="button" class="btn btn-sm u-btn-primary g-ml-10">Edit</a>
        <a type="button" class="btn btn-sm u-btn-primary g-ml-10">Add Boss</a>
      </h3>

      <!-- Raid Body -->
      <div id="<?php echo $raidname ?>-body" aria-labelledby="<?php echo $raidname ?>-head" class="card-block collapse g-pa-0">
        <table class="table table-hover g-ma-0">
          <thead>
            <tr>
              <th><strong>Boss Name</strong></th>
              <th><strong>Heroic Kill Date</strong></th>
              <th><strong>Mythic Kill Date</strong></th>
              <th><strong>Action</strong></th>
            </tr>
          </thead>
          <tbody>
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
