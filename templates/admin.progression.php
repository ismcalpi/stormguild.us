<?php
include_once 'library/class.database.php';
$db = new database();
?>
<div class="row">

  <div class="col-12 g-pa-20">
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
        <button type="button" class="btn btn-sm btn-primary g-ml-10">Edit</button>
      </h3>

      <!-- Raid Body -->
      <div id="<?php echo $raidname ?>-body" aria-labelledby="<?php echo $raidname ?>-head" class="card-block collapse g-pa-0">
        <table class="table table-hover g-ma-0">
          <thead>
            <tr>
              <th><strong>Boss Name</strong></th>
              <th><strong>Heroic Kill Date</strong></th>
              <th><strong>Mythic Kill Date</strong></th>
            </tr>
          </thead>
          <tbody>
            <!-- Boss Rows -->
            <?php
              $bosses = $db -> sql_select("SELECT * FROM stormguild.boss WHERE raid_id = ".$raid['raid_id']." ORDER BY kill_order asc");
              foreach ($bosses as $boss) {
            ?>
            <tr>
              <td><?php echo $boss['name'] ?></td>
              <td><?php echo $boss['heroic_kill'] ?></td>
              <td><?php echo $boss['mythic_kill'] ?></td>
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
