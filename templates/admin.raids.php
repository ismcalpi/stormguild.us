<?php
include_once 'library/class.database.php';
$db = new database();

  if ($_POST) {
    if ($_POST['table'] == 'expansion') {

      $name = $db -> quote($_POST['name']);
      $description = $db -> quote($_POST['description']);
      $release_date = "str_to_date('".$_POST['release_date']."','%Y-%m-%d')";
      echo $_POST['release_date'];

      if ($_POST['action'] == 'insert') {
        $sql = "INSERT INTO stormguild.expansion VALUES (NULL,".$name.",".$description.",".$release_date.",1)";
      } else if ($_POST['action'] == 'update') {
        $sql = "UPDATE stormguild.expansion SET name = ".$name.", description = ".$description.", release_date = ".$release_date.", is_active = ".$_POST['active']." WHERE expansion_id = ".$_POST['id'];
      } else {
        echo 'No Task Queued';
      }

    } else {

      echo 'No Task Queued';

    }

    $result = $db -> sql_query($sql);
    if (!$result) {
      $error = $db -> error();
      echo $error;
    }
  }

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
            <th width="20%">Name</th>
            <th width="40%">Description</th>
            <th width="15%">Release Date</th>
            <th width="5%">Active?</th>
            <th width="20%">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" >
              <input type="hidden" name="action" value="insert">
              <input type="hidden" name="table" value="expansion">
              <td><input name="name" type="text" class="form-control form-control-md rounded-0"></td>
              <td><textarea name="decription" class="form-control form-control-md rounded-0" rows="1"></textarea></td>
              <td><input name="release_date" type="date" class="form-control form-control-md rounded-0"></td>
              <td><input name="active" class="form-control form-control-md rounded-0" type="number" value="1" readonly=""></td>
              <td><button type="submit" class="btn btn-md u-btn-blue rounded-0">Add</button></td>
            </form>
          </tr>
        <?php
          $expansions = $db -> sql_select("SELECT * FROM stormguild.expansion ORDER BY release_date DESC");
          foreach ($expansions as $expansion) {
        ?>
          <tr>
            <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" >
              <input type="hidden" name="id" value="<?php echo $expansion['expansion_id'] ?>">
              <input type="hidden" name="action" value="update">
              <input type="hidden" name="table" value="expansion">
              <td><input name="name" type="text" class="form-control form-control-md rounded-0" value="<?php echo $expansion['name'] ?>"></td>
              <td><textarea name="description" class="form-control form-control-md rounded-0" rows="1"><?php echo $expansion['description'] ?></textarea></td>
              <td><input name="release_date" type="date" class="form-control form-control-md rounded-0" value="<?php echo $expansion['release_date'] ?>"></td>
              <td><input name="active" class="form-control form-control-md rounded-0" type="number" value="<?php echo $expansion['is_active'] ?>"></td>
              <td><button type="submit" class="btn btn-md u-btn-blue rounded-0">Update</button></td>
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
