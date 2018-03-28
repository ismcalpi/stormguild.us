<div class="row justify-content-center g-mb-15">
  <div class="col-4">
    <a href="#modal-new_banner" data-modal-target="#modal-new_banner" data-modal-effect="fadein"
      class="btn u-btn-blue btn-lg btn-block g-mr-10 g-mb-15">
      Add New Banner
    </a>
  </div>
</div>

<!-- Create New Banner Modal -->
<div id="modal-new_banner" class="text-left g-max-width-600 g-bg-white g-overflow-y-auto g-pa-20" style="display: none;">

  <form enctype="multipart/form-data" method="post" action="library/action.admin.banners.php"
    class="g-brd-around g-brd-gray-light-v4 g-pa-30 g-mb-30">

    <input type="hidden" name="bannerid">
    <input type="hidden" name="redirect" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
    <input type="hidden" name="action" value="add">

    <div class="form-group g-mb-20">
      <label class="g-mb-10" for="img">Background Image</label>
      <input class="g-ml-20" type="file" name="img" id="img" class="form-control-file" aria-describedby="fileHelp" />
      <small id="fileHelp" class="form-text text-muted">
        Use this to select a new image, omit if image does not need to be updated.
      </small>
    </div>

    <div class="form-group g-mb-20">
      <label class="g-mb-10" for="title">Title Text</label>
      <input id="title" class="form-control form-control-md rounded-0" type="text" name="title">
    </div>

    <div class="form-group g-mb-20">
      <label class="g-mb-10" for="title_style">Title CSS</label>
      <textarea id="title_style" class="form-control form-control-md rounded-0" type="text" name="title_style"></textarea>
    </div>

    <div class="form-group g-mb-20">
      <label class="g-mb-10" for="body">Body Text</label>
      <textarea class="form-control form-control-md rounded-0" name="body" id="body"></textarea>
    </div>

    <div class="form-group g-mb-20">
      <label class="g-mb-10" for="body_css">Body CSS</label>
      <textarea class="form-control form-control-md rounded-0" type="text" name="body_style" id="body_css"></textarea>
    </div>

    <div class="form-group g-mb-20">
      <label class="g-mb-10" for="button_text">Button Text</label>
      <input type="text" class="form-control form-control-md rounded-0" name="button_text" id="button_text">
    </div>

    <div class="form-group g-mb-20">
      <label class="g-mb-10" for="button_color">Button Color</label>
      <select class="form-control rounded-0" name="button_color">
        <option value="primary">Green</option>
        <option value="red">Red</option>
        <option value="blue">Blue</option>
        <option value="purple">Purple</option>
        <option value="pink">Pink</option>
        <option value="orange">Orange</option>
        <option value="yellow">Yellow</option>
        <option value="teal">Teal</option>
        <option value="brown">Brown</option>
        <option value="black">Black</option>
        <option value="darkgray">Dark Gray</option>
      </select>
    </div>

    <div class="form-group g-mb-20">
      <label class="g-mb-10" for="button_url">Button URL</label>
      <input class="form-control form-control-md rounded-0" type="text" name="button_url" id="button_url">
    </div>

    <div class="form-group g-mb-20">
      <label class="g-mb-10" for="animation">Slide Animation</label>
      <select class="form-control rounded-0" name="animation" id="animation">
        <option value="fade()">Fade</option>
        <option value="left(200,true)">Left</option>
        <option value="right(200,true)">Right</option>
        <option value="top(200,true)">Top</option>
        <option value="bottom(200,true)">Bottom</option>
        <option value="rotate(300,br)">Rotate</option>
        <option value="rotateleft(180,long,bl,true)">Rotate Left</option>
        <option value="rotateright(180,long,br,true)">Rotate Right</option>
        <option value="rotatetop(45|180,long,br,true)">Rotate Top</option>
        <option value="rotatebottom(45|180,long,br,true)">Rotate Bottom</option>
        <option value="skewleft(18,35|100)">Skew Left</option>
        <option value="skewright(18,35|100)">Skew Right</option>
        <option value="skewtop(18,35|100,false)">Skew Top</option>
        <option value="skewbottom(18,35|100)">Skew Bottom</option>
      </select>
    </div>

    <div class="form-group g-mb-20">
      <label class="g-mb-10" for="priority">Slide Priority (Order Highest First)</label>
      <input type="number" class="form-control form-control-md rounded-0" name="priority" id="priority">
    </div>

    <div class="form-group g-mb-20">
      <input type="submit" class="btn btn-md u-btn-primary g-ma-5" value="Add"></input>
      <button type="button" class="btn btn-md u-btn-red" onclick="Custombox.modal.close();">Close</button>
    </div>
  </form>
</div>


  <?php
  include_once 'library/class.database.php';
  $db = new database();
  $banners = $db -> read_select("SELECT * FROM stormguild.banner");
  foreach($banners as $banner) {
  ?>

<div class="row g-mb-15">
  <div class="ms-slide col-9" data-delay="10">
    <img style="max-width:100%;max-height:100%;" src="<?php echo $banner['img_path']; ?>" data-src="<?php echo $banner['img_path']; ?>" />
    <div class="ms-layer" style="bottom:50%;left:10px;right:10px;background-color:rgba(0,0,0,.6);">
          <section class="g-brd-around g-brd-gray-light-v4 g-pa-5">
           <div class="container">
             <div class="row justify-content-around">
               <div class="col-md-12 col-12 align-self-center">
                 <h3 class="text-uppercase g-color-white" style="font-size:calc(16px + 1vw);<?php echo $banner['title_style']; ?>">
                   <?php echo $banner['title']; ?>
                 </h3>
               </div>
               <div class="col-md-9 col-12 align-self-center">
                 <p class="lead g-mb-5 g-mb-0--md g-color-white" style="font-size:calc(10px + .5vw);<?php echo $banner['body_style']; ?>">
                   <?php echo $banner['body']; ?>
                 </p>
               </div>
               <div class="col-md-3 d-none d-sm-block align-self-left">
                 <a href="<?php echo $banner['button_url']; ?>"
                    class="btn btn-sm u-btn-skew u-btn-<?php echo $banner['button_color']; ?> g-font-weight-600 g-letter-spacing-0_5 text-uppercase g-brd-2 g-rounded-50 g-mt-5">
                    <span class="u-btn-skew__inner">
                      <i class="fa fa-check-circle g-mr-3"></i>
                      <?php echo $banner['button_text']; ?>
                    </span>
                  </a>
               </div>
             </div>
           </div>
          </section>
    </div>
  </div>
  <div class="col-3">
    <a href="#modal<?php echo $banner['banner_id']; ?>" data-modal-target="#modal<?php echo $banner['banner_id']; ?>" data-modal-effect="fadein"
      class="btn u-btn-orange btn-lg btn-block g-mr-10 g-mb-15">
      Edit
    </a>
    <form method="post" action="library/action.admin.banners.php">
      <input type="hidden" name="bannerid" value="<?php echo $banner['banner_id']; ?>">
      <input type="hidden" name="redirect" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
      <?php if($banner['is_active']==1) { ?>
        <input type="hidden" name="action" value="deactivate">
        <input type="submit" class="btn btn-lg btn-block g-mr-10 g-mb-15 u-btn-red" value="Deactivate"></input>
      <?php } else { ?>
        <input type="hidden" name="action" value="activate">
        <input type="submit" class="btn btn-lg btn-block g-mr-10 g-mb-15 u-btn-primary" value="Activate"></input>
      <?php } ?>
    </form>
    <form method="post" action="library/action.admin.banners.php">
      <input type="hidden" name="bannerid" value="<?php echo $banner['banner_id']; ?>">
      <input type="hidden" name="redirect" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
      <input type="hidden" name="action" value="delete">

      <input type="submit" class="btn u-btn-red btn-lg btn-block g-mr-10 g-mb-15" value="Delete"></input>
    </form>
  </div>

  <div id="modal<?php echo $banner['banner_id']; ?>" class="text-left g-max-width-600 g-bg-white g-overflow-y-auto g-pa-20" style="display: none;">

    <form enctype="multipart/form-data" method="post" action="library/action.admin.banners.php"
      class="g-brd-around g-brd-gray-light-v4 g-pa-30 g-mb-30">

      <input type="hidden" name="bannerid" value="<?php echo $banner['banner_id']; ?>">
      <input type="hidden" name="redirect" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
      <input type="hidden" name="action" value="update">

      <img width="500" height="150" class="g-mb-20 text-center" src="<?php echo $banner['img_path'] ?>">

      <div class="form-group g-mb-20">
        <label class="g-mb-10" for="img">Background Image</label>
        <input class="g-ml-20" type="file" name="img" id="img" class="form-control-file" aria-describedby="fileHelp" />
        <small id="fileHelp" class="form-text text-muted">
          Use this to select a new image, omit if image does not need to be updated.
        </small>
      </div>

      <div class="form-group g-mb-20">
        <label class="g-mb-10" for="title">Title Text</label>
        <input id="title" class="form-control form-control-md rounded-0" type="text" name="title"
        value="<?php echo $banner['title'] ?>">
      </div>

      <div class="form-group g-mb-20">
        <label class="g-mb-10" for="title_style">Title CSS</label>
        <textarea id="title_style" class="form-control form-control-md rounded-0" type="text" name="title_style"><?php echo $banner['title_style'] ?></textarea>
      </div>

      <div class="form-group g-mb-20">
        <label class="g-mb-10" for="body">Body Text</label>
        <textarea class="form-control form-control-md rounded-0" name="body" id="body"><?php echo $banner['body'] ?></textarea>
      </div>

      <div class="form-group g-mb-20">
        <label class="g-mb-10" for="body_css">Body CSS</label>
        <textarea class="form-control form-control-md rounded-0" type="text" name="body_style" id="body_css"><?php echo $banner['body_style'] ?></textarea>
      </div>

      <div class="form-group g-mb-20">
        <label class="g-mb-10" for="button_text">Button Text</label>
        <input type="text" class="form-control form-control-md rounded-0" name="button_text" id="button_text" value="<?php echo $banner['button_text'] ?>">
      </div>

      <div class="form-group g-mb-20">
        <label class="g-mb-10" for="button_color">Button Color</label>
        <select class="form-control rounded-0" name="button_color" id="button_color">
          <option selected="" value="<?php echo $banner['button_color']; ?>">
            <?php echo $banner['button_color']; ?>
          </option>
          <option value="primary">Green</option>
          <option value="red">Red</option>
          <option value="blue">Blue</option>
          <option value="purple">Purple</option>
          <option value="pink">Pink</option>
          <option value="orange">Orange</option>
          <option value="yellow">Yellow</option>
          <option value="teal">Teal</option>
          <option value="brown">Brown</option>
          <option value="black">Black</option>
          <option value="darkgray">Dark Gray</option>
        </select>
      </div>

      <div class="form-group g-mb-20">
        <label class="g-mb-10" for="button_url">Button URL</label>
        <input class="form-control form-control-md rounded-0" type="text" name="button_url" id="button_url" value="<?php echo $banner['button_url']; ?>">
      </div>

      <div class="form-group g-mb-20">
        <label class="g-mb-10" for="animation">Slide Animation</label>
        <select class="form-control rounded-0" name="animation" id="animation">
          <option selected="" value="<?php echo $banner['animation']; ?>">
            <?php echo $banner['animation']; ?>
          </option>
          <option value="fade()">Fade</option>
          <option value="left(200,true)">Left</option>
          <option value="right(200,true)">Right</option>
          <option value="top(200,true)">Top</option>
          <option value="bottom(200,true)">Bottom</option>
          <option value="rotate(300,br)">Rotate</option>
          <option value="rotateleft(180,long,bl,true)">Rotate Left</option>
          <option value="rotateright(180,long,br,true)">Rotate Right</option>
          <option value="rotatetop(45|180,long,br,true)">Rotate Top</option>
          <option value="rotatebottom(45|180,long,br,true)">Rotate Bottom</option>
          <option value="skewleft(18,35|100)">Skew Left</option>
          <option value="skewright(18,35|100)">Skew Right</option>
          <option value="skewtop(18,35|100,false)">Skew Top</option>
          <option value="skewbottom(18,35|100)">Skew Bottom</option>
        </select>
      </div>

      <div class="form-group g-mb-20">
        <label class="g-mb-10" for="priority">Slide Priority (Order Highest First)</label>
        <input type="number" class="form-control form-control-md rounded-0" name="priority" id="priority" value="<?php echo $banner['priority'] ?>">
      </div>

      <div class="form-group g-mb-20">
        <input type="submit" class="btn btn-md u-btn-primary g-ma-5" value="Update"></input>
        <button type="button" class="btn btn-md u-btn-red" onclick="Custombox.modal.close();">Close</button>
      </div>
    </form>
  </div>

</div>
  <?php
    }
  ?>
