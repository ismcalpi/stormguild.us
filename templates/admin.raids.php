<?php
include_once 'library/class.database.php';
$db = new database();

?>

<!-- Expansions Section -->
<div class="row">
  <div class="col-12">
    <p class="text-center">
      <button>Add New Expansion</button>
      <button>Add New Raid</button>
      <button>Add New Boss</button>
    </p>
  </div>
  <div class="col-12">
    <h2 class="h2 text-center text-upper">Raid Progression</h2>
  </div>
  <div class="table-responsive container col-12 g-pa-25">
    <table class="table table-hover">
      <tbody>
        <tr>
          <td colspan="6" class="g-color-blue text-center"><strong><a href="#">Test Expansion</a></strong></td>
        </tr>
        <tr>
          <td colspan="2" class="g-color-primary text-center"><a href="#">Test Raid</a></td>
          <td>Heroic</td>
          <td>Mythic</td>
          <td>Killshot</td>
          <td>Video</td>
        </tr>
        <tr>
          <td colspan="2" class="text-center"><a href="#">Test Boss 1</a></td>
          <td>Test Date</td>
          <td>Test Date</td>
          <td>Test Image</td>
          <td>Test URL</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
