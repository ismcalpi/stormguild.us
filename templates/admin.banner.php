<?php
include_once 'library/class.database.php';
$db = new database();
?>
<div class="row g-pa-30">
  <table class="table table-hover g-ma-0 col-12">
    <thead>
      <tr>
        <th><strong>Name</strong></th>
        <th><strong>URL</strong></th>
        <th><strong>Image</strong></th>
        <th><strong>Active?</strong></th>
        <th><strong>Actions</strong></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <form enctype="multipart/form-data" method="post" action="library/action.admin.streamers.php">
          <input type="hidden" name="action" value="add">
          <input type="hidden" name="bannerid">
          <input type="hidden" name="redirect" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
          <td><input type="text" name="name"></td>
          <td><input type="text" name="url"></td>
          <td><input class="g-ma-0" type="file" name="img" class="form-control-file" aria-describedby="fileHelp" /></td>
          <td><input type="number" name="isactive" value="1"></td>
          <td><input type="submit" class="btn btn-sm u-btn-primary g-ml-10" value="Add"></input></td>
        </form>
      </tr>
      <?php
        $banners = $db -> sql_select("SELECT * FROM stormguild.banners ORDER BY banner_id DESC");
        foreach ($banners as $banner) {
      ?>
      <tr>
        <form enctype="multipart/form-data" method="post" action="library/action.admin.banners.php">
          <input type="hidden" name="action" value="update">
          <input type="hidden" name="bannerid" value="<?php echo $banner['banner_id'] ?>">
          <input type="hidden" name="redirect" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
          <td><input type="text" name="name" value="<?php echo $banner['name'] ?>"></td>
          <td><input type="text" name="url" value="<?php echo $banner['url'] ?>">
          <td><a target="_blank" href="<?php echo $banner['path'] ?>"><img class="img-fluid w-100 g-mb-25" src="<?php echo $banner['path'] ?>"></a></td>
          <td><input type="number" name="isactive" value="<?php echo $banner['is_active'] ?>"></td>
          <td><input type="submit" class="btn btn-sm u-btn-primary g-ml-10" value="Update"></input></td>
        </form>
      </tr>
      <?php
        }
      ?>
    </tbody>
  </table>
</div>
