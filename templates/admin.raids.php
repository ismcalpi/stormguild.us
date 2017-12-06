<?php
include_once 'library/class.database.php';
$db = new database();
?>

<!-- Start Expansion Modal -->
<div id="expansion" class="js-autonomous-popup text-left g-max-width-600 g-bg-white g-overflow-y-auto g-pa-20" style="display: none;" data-modal-type="hashlink"
    data-open-effect="flipInY" data-close-effect="flipOutY" data-speed="500">
  <button type="button" class="close" onclick="Custombox.modal.close();">
    <i class="hs-icon hs-icon-close"></i>
  </button>
  <h4 class="h4 g-mb-20">Expansion</h4>
  <form enctype="multipart/form-data" method="post" action="library/action.admin.raids.php">
    <label for="name">Expansion Name</label>
    <input id="name" class="form-control form-control-md rounded-0 g-ma-10" type="text" name="name" placeholder="Expansion Name"></input>
    <label for="release">Release Date</label>
    <input id="release" class="form-control form-control-md rounded-0 g-ma-10" type="date" name="release"></input>
    <input type="hidden" name="id" value="<?php if(!empty($_GET['id'])) { echo $_GET['id']; } else { echo 0; } ?>" />
    <input type="hidden" name="type" value="expansion" />
    <button type="submit" class="btn btn-md u-btn-primary rounded-0 g-ma-10">Submit</button>
  </form>
</div>
<!-- End Expansion Modal -->

<!-- Expansions Section -->
<div class="row">

  <div class="col-12">
    <h2 class="h2 text-center text-upper">Raid Progression</h2>
  </div>

  <div class="col-12">
    <p class="text-center">
      <a href="admin.php?mode=raids&id=0#expansion" type="button" class="btn btn-sm btn-primary g-ml-10">Add New Expansion</a>
      <a type="button" class="btn btn-sm btn-primary g-ml-10">Add New Raid</a>
      <a type="button" class="btn btn-sm btn-primary g-ml-10">Add New Boss</a>
    </p>
  </div>

  <div class="container col-12 g-pa-40">

    <h3 class="h3 text-upper text-left g-my-20">Expansion: Legion</h3>

    <div id="antorus" class="card rounded-0">
      <h3 class="card-header h5 rounded-0">
        <span id="raid1-head" class="collapsed g-ml-15" href="#raid1-body" data-toggle="collapse" data-parent="#antorus" aria-expanded="true" aria-controls="raid1-body">
          <span class="u-accordion__control-icon g-mr-10">
            <i class="fa fa-plus"></i>
            <i class="fa fa-minus"></i>
          </span>
          Raid: Antorus, the Burning Throne
        </span>
        <button type="button" class="btn btn-sm btn-primary g-ml-10">Edit</button>
      </h3>
      <div id="raid1-body" aria-labelledby="raid1-head" class="card-block collapse g-pa-0">
        <table class="table table-hover g-ma-0">
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
