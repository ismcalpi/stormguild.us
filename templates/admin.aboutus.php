
<h1 class="h1">Work in Progress</h1>

  <?php
  include_once 'library/class.database.php';
  $db = new database();
  $sections = $db -> read_select("SELECT * FROM stormguild.about_us ORDER BY a_order ASC");
  foreach($sections as $section) {
  ?>

  <form class="g-mx-50" enctype="multipart/form-data" method="post" action="library/action.admin.aboutus.php">
    <div class="row g-ma-10">

      <div class="col-md-4 col-12">



      </div>

      <div class="col-md-8 col-12">
        <label for="title">Section Title</label>
        <input id="name" class="form-control form-control-md rounded-0 g-ma-10"
          type="text" name="title" value="<?php echo $section['title']; ?>"></input>

        <label for="content">Section Content (Accepts HTML)</label>
        <textarea id="content" class="form-control form-control-md rounded-0 g-ma-10"
          name="content"><?php echo $section['content']; ?></textarea>
      </div>

    </div>
  </form>
  <?php
    }
  ?>
