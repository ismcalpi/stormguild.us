<div id="archive" class="text-left g-max-width-600 g-bg-white g-overflow-y-auto g-pa-20" style="display: none;">

  <button type="button" class="close" onclick="Custombox.modal.close();">
    <i class="hs-icon hs-icon-close"></i>
  </button>

  <table class="table table-hover g-ma-0 col-12">
    <thead>
      <tr>
        <th><strong>Character Name</strong></th>
        <th><strong>Application Date</strong></th>
        <th><strong>Decision</strong></th>
        <th><strong>Link</strong></th>
      </tr>
    </thead>
    <tbody>

    <?php
      $apps = $db -> sql_select("SELECT * FROM stormguild.application WHERE create_datetime < date_sub(now(), INTERVAL 3 MONTH) ORDER BY application_id DESC");
      foreach ($apps as $app) {
    ?>

      <tr>
        <td><?php echo $app['charName']; ?></td>
        <td><?php echo $app['create_datetime']; ?></td>
        <td><?php echo $app['status']; ?></td>
        <td><a href='application.php?appid=<?php echo $app['aplication_id']; ?>'>Open App</a></td>
      </tr>

      <?php
        }
      ?>
    </tbody>
  </table>

</div>
