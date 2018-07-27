
<h1 class="h1">Work in Progress</h1>

<form class="g-mx-40" enctype="multipart/form-data" method="post" action="library/action.admin.aboutus.php">
  <div class="row g-ma-10 g-brd-around g-brd-1 g-brd-black">
    <div class="col-md-3 col-12">
      <label for="order">Order</label>
      <input id="order" class="form-control form-control-md rounded-0"
        type="number" name="order" placeholder="99"></input>
      <label for="size">Size</label>
      <input id="size" class="form-control form-control-md rounded-0"
        type="number" name="size" placeholder="12"></input>
      <label for="active">Is Active</label>
      <input id="active" class="form-control form-control-md rounded-0"
        type="number" name="active" placeholder="1"></input>
    </div>
    <div class="col-md-9 col-12">
      <label for="title">Section Title</label>
      <input id="name" class="form-control form-control-md rounded-0"
        type="text" name="title" placeholder="Add Title Here..."></input>
      <label for="content">Section Content (Accepts HTML)</label>
      <textarea id="content" class="form-control form-control-md rounded-0"
        name="content" rows="6">Add Content Here...</textarea>
    </div>
    <div class="col-12">
      <input type="hidden" name="redirect" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
      <input type="submit" class="btn btn-md u-btn-primary g-ma-10" name="action" value="add"></input>
    </div>
  </div>
</form>

  <?php
  include_once 'library/class.database.php';
  $db = new database();
  $sections = $db -> read_select("SELECT * FROM stormguild.about_us ORDER BY a_order ASC");
  foreach($sections as $section) {
  ?>
  <form class="g-mx-40" enctype="multipart/form-data" method="post" action="library/action.admin.aboutus.php">
    <div class="row g-ma-10 g-brd-around g-brd-1 g-brd-black">
      <div class="col-md-3 col-12">
        <label for="order">Order</label>
        <input id="order" class="form-control form-control-md rounded-0"
          type="number" name="order" value="<?php echo $section['a_order']; ?>"></input>
        <label for="size">Size</label>
        <input id="size" class="form-control form-control-md rounded-0"
          type="number" name="size" value="<?php echo $section['size']; ?>"></input>
        <label for="active">Is Active</label>
        <input id="active" class="form-control form-control-md rounded-0"
          type="number" name="active" value="<?php echo $section['is_active']; ?>"></input>
      </div>
      <div class="col-md-9 col-12">
        <label for="title">Section Title</label>
        <input id="name" class="form-control form-control-md rounded-0"
          type="text" name="title" value="<?php echo $section['title']; ?>"></input>
        <label for="content">Section Content (Accepts HTML)</label>
        <textarea id="content" class="form-control form-control-md rounded-0"
          name="content" rows="6"><?php echo $section['content']; ?></textarea>
      </div>
      <div class="col-12">
        <input type="hidden" name="aboutus_id" value="<?php echo $section['aboutus_id']; ?>">
        <input type="hidden" name="redirect" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
        <input type="submit" class="btn btn-md u-btn-primary g-ma-10" name="action" value="update"></input>
        <input type="submit" class="btn btn-md u-btn-red g-ma-10" name="action" value="delete"></input>
      </div>
    </div>
  </form>
  <?php
    }
  ?>
