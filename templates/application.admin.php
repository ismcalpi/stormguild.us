<?php if (!empty($appid)) { ?>
<div class="row g-brd-around g-brd-black g-brd-1 g-pa-10">
  <?php
    $result = $db -> sql_fetchrow("SELECT * FROM stormguild.application WHERE application_id = ".$appid);
  ?>
  <h3 class="h3 g-mr-10">Admin Control:</h3>
  <form method="post" action="library/action.application.decision.php">
      <div class="form-group g-mr-10">
          <input type="hidden" name="redirecturi" value="<?php echo $_SERVER['REQUEST_URI'] ?>" />
          <input type="hidden" name="appid" value="<?php echo $appid ?>" />
          <input type="hidden" name="appname" value="<?php echo $result['charName'] ?>" />
          <input type="hidden" name="status" value="accepted" />
          <button type="submit" class="btn btn-md u-btn-outline-primary g-mr-10 g-my-15">
              Accept Application
          </button>
      </div>
  </form>
  <form method="post" action="library/action.application.decision.php">
      <div class="form-group g-mr-10">
          <input type="hidden" name="redirecturi" value="<?php echo $_SERVER['REQUEST_URI'] ?>" />
          <input type="hidden" name="appid" value="<?php echo $appid ?>" />
          <input type="hidden" name="appname" value="<?php echo $result['charName'] ?>" />
          <input type="hidden" name="status" value="declined" />
          <button type="submit" class="btn btn-md u-btn-outline-red g-mr-10 g-my-15">
              Decline Application
          </button>
      </div>
  </form>
</div>
<?php } ?>
