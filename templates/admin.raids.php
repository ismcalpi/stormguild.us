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
  <div class="container col-12 g-pa-25">
    <table class="table table-hover">
      <thead>
        <tr><th><strong><a class="h4 text-upper" href="#">Legion</a></strong></th></tr>
      </thead>
      <tbody id="raids" class="u-accordion" role="tablist" aria-multiselectable="true">
        <tr id="raid1-head" class="collapsed g-ml-15" href="#raid1-body" data-toggle="collapse" data-parent="#raids" aria-expanded="true" aria-controls="raid1-body">
          <td class="text-upper g-pl-20">
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
          <td class="g-pl-40"><a href="#">Garothi Worldbreaker</a></td>
          <td>12/5/2017</td>
          <td>12/5/2017</td>
          <td>/path/to/image.png</td>
          <td>https://twitch.com/</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
