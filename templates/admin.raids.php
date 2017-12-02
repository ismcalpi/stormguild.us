<?php
include_once 'library/class.database.php';
$db = new database();

?>

<!-- Expansions Section -->
<div class="row">
  <div class="col-12">
    <h2 class="h2 text-upper text-center">Expansions</h2>
  </div>
  <div class="col-12 g-pa-20">
    <div class="table-responsive">
      <table class="table text-center">
        <thead>
          <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Release Date</th>
            <th>Active?</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
              <input type="hidden" name="newID" value="NULL">
              <input type="hidden" name="action" value="insert">
              <td><input name="newName" type="text" class="form-control form-control-md rounded-0"></td>
              <td><textarea name="newDescription" class="form-control form-control-md rounded-0" rows="1"></textarea></td>
              <td><input name="newRelease" type="date" class="form-control form-control-md rounded-0"></td>
              <td><input name="newActive" class="form-control form-control-md rounded-0" type="number" value="1" readonly=""></td>
              <td><button type="submit" class="btn btn-md u-btn-blue rounded-0">Add</button></td>
            </form>
          </tr>
        <?php
          $expansions = $db -> sql_select("SELECT * FROM stormguild.expansion ORDER BY release_date DESC");
          foreach ($expansions as $expansion) {
        ?>
          <tr>
            <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
              <input type="hidden" name="editID" value="<?php echo $expansion['expansion_id'] ?>">
              <input type="hidden" name="action" value="update">
              <td><input name="editName" type="text" class="form-control form-control-md rounded-0" value="<?php echo $expansion['name'] ?>"></td>
              <td><textarea name="editDescription" class="form-control form-control-md rounded-0" rows="1"><?php echo $expansion['description'] ?></textarea></td>
              <td><input name="editRelease" type="date" class="form-control form-control-md rounded-0" value="<?php echo $expansion['release_date'] ?>"></td>
              <td><input name="editActive" class="form-control form-control-md rounded-0" type="number" value="<?php echo $expansion['is_active'] ?>"></td>
              <td><button type="submit" class="btn btn-md u-btn-blue rounded-0">Add</button></td>
            </form>
          </tr>
        <?php
          }
        ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Expansions Section -->
<div class="row">
  <div class="col-12"><h2 class="h2 text-upper text-center">Raids</h2></div>
  <div class="col-12 g-pa-20">
    <div class="table-responsive">
      <table class="table text-center">
        <thead>

        </thead>
        <tbody>

        </tbody>
      </table>
    </div>
  </div>
</div>
