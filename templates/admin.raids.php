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

  <div class="container col-12 g-pa-40">

    <h3 class="h3 text-upper text-left g-my-20">Expansion: Legion</h3>

    <div id="legion" class="card rounded-0">

      <h3 class="card-header h5 rounded-0">
        <span id="raid1-head" class="collapsed g-ml-15" href="#raid1-body" data-toggle="collapse" data-parent="#legion" aria-expanded="true" aria-controls="raid1-body">
          <span class="u-accordion__control-icon g-mr-10">
            <i class="fa fa-plus"></i>
            <i class="fa fa-minus"></i>
          </span>
          Raid: Antorus, the Burning Throne
        </span>
        <button type="button" class="btn btn-sm btn-primary g-ml-10">Edit</button>
      </h3>

      <div class="card-block">
        <table class="table table-hover">
          <thead>
            <tr>
              <th><strong>Boss Name</strong></th>
              <th><strong>Heroic</strong></th>
              <th><strong>Mythic</strong></th>
              <th><strong>Killshot</strong></th>
              <th><strong>Video</strong></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><a href="#">Garothi Worldbreaker</a></td>
              <td>12/5/2017</td>
              <td>12/5/2017</td>
              <td>/path/to/image.png</td>
              <td>https://twitch.com/</td>
            </tr>
            <tr>
              <td><a href="#">Garothi Worldbreaker</a></td>
              <td>12/5/2017</td>
              <td>12/5/2017</td>
              <td>/path/to/image.png</td>
              <td>https://twitch.com/</td>
            </tr>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>
