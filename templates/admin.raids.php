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
  <div id="raids" role="tablist" aria-multiselectable="true" class="u-accordion container col-12 g-pa-25">
    <table class="table table-hover">
      <thead>
        <tr><th colspan="5"><a class="h4 text-upper text-center" href="#">Legion</a></th></tr>
      </thead>

      <tbody>

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

        <tr id="raid2-head" class="collapsed g-ml-15" href="#raid2-body" data-toggle="collapse" data-parent="#raids" aria-expanded="true" aria-controls="raid2-body">
          <td class="text-upper g-pl-20">
            <strong>
            <span class="u-accordion__control-icon g-mr-10">
              <i class="fa fa-plus"></i>
              <i class="fa fa-minus"></i>
            </span>
            <a href="#">Tomb of Sargeras</a>
            </strong>
          </td>
          <td><strong>Heroic</strong></td>
          <td><strong>Mythic</strong></td>
          <td><strong>Killshot</strong></td>
          <td><strong>Video</strong></td>
        </tr>
        <div id="raid2-body" class="collapse" aria-labelledby="raid2-head">
          <tr>
            <td class="g-pl-40"><a href="#">Goroth</a></td>
            <td>12/5/2017</td>
            <td>12/5/2017</td>
            <td>/path/to/image.png</td>
            <td>https://twitch.com/</td>
          </tr>
          <tr>
            <td class="g-pl-40"><a href="#">Demonic Inquisition</a></td>
            <td>12/5/2017</td>
            <td>12/5/2017</td>
            <td>/path/to/image.png</td>
            <td>https://twitch.com/</td>
          </tr>
        </div>
      </tbody>
    </table>
  </div>
</div>
