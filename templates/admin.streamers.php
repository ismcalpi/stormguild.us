<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/assets/php/class/database.php';
$db = new database();
?>
<div class="row g-pa-30">
  <table class="table table-hover g-ma-0 col-12">
    <thead>
      <tr>
        <th><strong>Twitch Name</strong></th>
        <th><strong>Active?</strong></th>
        <th colspan="2"><strong>Actions</strong></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <form method="post" action="library/action.admin.streamers.php">
          <input type="hidden" name="action" value="add">
          <input type="hidden" name="streamerid">
          <input type="hidden" name="redirect" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
          <td><input type="text" name="name"></td>
          <td><input type="number" name="isactive" value="1"></td>
          <td><input type="submit" class="btn btn-sm u-btn-primary" value="Add"></input></td>
          <td></td>
        </form>
      </tr>
      <?php
        $streamers = $db -> readResults("SELECT * FROM stormguild.streamers ORDER BY streamer_id DESC");
        foreach ($streamers as $streamer) {
      ?>
      <tr>
        <form method="post" action="library/action.admin.streamers.php">
          <input type="hidden" name="action" value="update">
          <input type="hidden" name="streamerid" value="<?php echo $streamer['streamer_id'] ?>">
          <input type="hidden" name="redirect" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
          <td><input type="text" name="name" value="<?php echo $streamer['username'] ?>"></td>
          <td><input type="number" name="isactive" value="<?php echo $streamer['is_active'] ?>"></td>
          <td><input type="submit" class="btn btn-sm u-btn-primary" value="Update"></input></td>
        </form>
        <form method="post" action="library/action.admin.streamers.php">
          <input type="hidden" name="action" value="delete">
          <input type="hidden" name="streamerid" value="<?php echo $streamer['streamer_id'] ?>">
          <input type="hidden" name="redirect" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
          <td><input type="submit" class="btn btn-sm u-btn-red" value="Delete"></input></td>
        </form>
      </tr>
      <?php
        }
      ?>
    </tbody>
  </table>
</div>
