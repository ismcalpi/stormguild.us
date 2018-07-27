

  <?php
  include_once 'library/class.database.php';
  $db = new database();
  $sections = $db -> read_select("SELECT * FROM stormguild.about_us ORDER BY a_order ASC");
  foreach($sections as $section) {
  ?>
  <h1 class="h1">Work in Progress</h1>
  <form enctype="multipart/form-data" method="post" action="library/action.admin.aboutus.php">
    <div class="row g-brd-around g-brd-2 g-brd-blue">

      <div class="col-md-4 col-12">

      </div>

      <div class="col-md-8 col-12">

      </div>

    </div>
  </form>
  <?php
    }
  ?>
