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

    <a class="h4 text-center text-left g-my-20" href="#">Expansion: Legion</a>

    <table id="legion" class="table table-hover">

      <thead>
        <tr>
          <th colspan="5">
          <div id="raid1-head" class="collapsed g-ml-15" href="#raid1-body" data-toggle="collapse" data-parent="#raids" aria-expanded="true" aria-controls="raid1-body">
            <span class="u-accordion__control-icon g-mr-10">
              <i class="fa fa-plus"></i>
              <i class="fa fa-minus"></i>
            </span>
            Raid: Antorus, the Burning Throne
          </div>
          <button type="button" class="btn btn-primary g-ml-10">Edit</button>
          </th>
        </tr>
      </thead>

      <tbody id="raid1-body" aria-labelledby="raid1-head" class="collapse">
        <tr >
          <td><strong>Boss Name</strong></td>
          <td><strong>Heroic</strong></td>
          <td><strong>Mythic</strong></td>
          <td><strong>Killshot</strong></td>
          <td><strong>Video</strong></td>
        </tr>
        <tr >
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
