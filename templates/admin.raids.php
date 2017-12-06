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
  <div id="raids" class="u-accordion container col-12 g-pa-25" role="tablist" aria-multiselectable="true">
    <table class="table table-hover">
      <tbody>
        <tr>
          <td colspan="5" class="text-upper text-left"><strong><a href="#">Legion</a></strong></td>
        </tr>
        <tr id="raid1-head" class="collapsed g-ml-15" href="#raid1-body" data-toggle="collapse" data-parent="#raids" aria-expanded="true" aria-controls="raid1-body">
          <td class="text-upper g-ml-10">
            <strong>
            <span class="u-accordion__control-icon g-mr-10">
              <i class="fa fa-plus"></i>
              <i class="fa fa-minus"></i>
            </span>
            <a href="#">Antorus the Burning Throne</a>
            </strong>
          </td>
          <td><strong>Heroic</strong></td>
          <td><strong>Mythic</strong></td>
          <td><strong>Killshot</strong></td>
          <td><strong>Video</strong></td>
        </tr>
        <tr id="raid1-body" aria-labelledby="raid1-head" class="collapse">
          <td class="g-ml-20"><a href="#">Garothi Worldbreaker</a></td>
          <td>12/5/2017</td>
          <td>12/5/2017</td>
          <td>/path/to/image.png</td>
          <td>https://twitch.com/</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
