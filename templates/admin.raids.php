<?php
include_once 'library/class.database.php';
$db = new database();

?>

<!-- Expansions Section -->
<div class="row">
  <div class="col-12">
    <p>
      <button>Add New Expansion</button>
      <button>Add New Raid</button>
      <button>Add New Boss</button>
    </p>
  </div>
  <div class="col-12">
    <h2 class="h2 text-center text-upper">Raid Progression</h2>
  </div>
  <div class="table-responsive">
    <table class="table table-hover">
      <tbody>
        <tr><td colspan="5">Test Expansion</td></tr>
          <tr><td></td><td>Test Raid</td><td>Heroic</td><td>Mythic</td></tr>
            <tr><td colspan="2"></td><td>Test Boss 1</td><td>Test Date</td><td>Test Date</td><td>
      </tbody>
    </table>
  </div>
</div>
