
<?php if (!empty($_GET['status']) && !empty($_GET['accessid']) && $_GET['status'] == 'success') { ?>
<!-- Success Alert -->
<div class="alert alert-dismissible fade show g-bg-primary g-color-white rounded-0" role="alert">
  <button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
  <div class="media">
    <span class="d-flex g-mr-10 g-mt-5"><i class="icon-check g-font-size-25"></i></span>
    <span class="media-body align-self-center">
        <strong>Congratulations!</strong> <br />
        You have successfully applied to Storm - Stormrage. You have been sent an E-Mail with more information on how to access your application.
        <a href="application.php?accessid=<?php $_GET['accessid'] ?>" target="_blank">Application Link</a>
    </span>
  </div>
</div>
<!-- End Success Alert -->
<?php } else if (!empty($_GET['status']) && !empty($_GET['error']) && $_GET['status'] == 'failure') { ?>
<!-- Success Alert -->
<div class="alert alert-dismissible fade show g-bg-red g-color-white rounded-0" role="alert">
  <button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
  <div class="media">
    <span class="d-flex g-mr-10 g-mt-5"><i class="icon-check g-font-size-25"></i></span>
    <span class="media-body align-self-center">
        <strong>Application Submit Error</strong> <br />
        Error Message: <?php $_GET['error']; ?> <br />
        Please contact the site administrator if you see this message.
    </span>
  </div>
</div>
<!-- End Success Alert -->
<?php } ?>

<form enctype="multipart/form-data" id="appForm" method="post" action="library/action.application.php" class="g-brd-around bg-white g-brd-gray-light-v4 g-pa-20">

  <!-- Screening Questions -->
  <div class="form-group g-mb-20">
    <div class="u-heading-v1-1 g-bg-main g-brd-gray-light-v2 g-mb-20"><h2 class="h3 u-heading-v1__title">Screening Questions</h2></div>
    <div class="form-group row g-ma-10">
      <select class="form-control col-2 rounded-0" id="scrn1" name="radScreen1" required>
        <option>No</option>
        <option>Yes</option>
      </select>
      <label class="col-10" for="scrn1"><strong>You understand that you should put some thought and time into your application?</strong></label>
    </div>
    <div class="form-group row g-ma-10">
      <select class="form-control col-2 rounded-0" id="scrn2" name="radScreen2" required>
        <option>No</option>
        <option>Yes</option>
      </select>
      <label class="col-10" for="scrn2"><strong>Can you make all of our scheduled raids? Including the extra extended raid the week new Mythic content releases?</strong></label>
    </div>
  </div>

  <!-- Personal Information -->
  <div class="form-group g-mb-20">
    <div class="u-heading-v1-1 g-bg-main g-brd-gray-light-v2 g-mb-20"><h2 class="h3 u-heading-v1__title">Personal Information</h2></div>
    <div class="row">
      <div class="form-group col-md-3 g-mb-20">
        <input class="form-control rounded-0 u-form-control" type="text" name="perName" placeholder="Name" required>
      </div>
      <div class="form-group col-md-2 g-mb-20">
        <input class="form-control rounded-0 u-form-control" type="number" name="perAge" placeholder="Age" required>
      </div>
      <div class="form-group col-md-4 g-mb-20">
        <input class="form-control rounded-0 u-form-control" type="email" name="perEmail" placeholder="Email Address" required>
      </div>
      <div class="form-group col-md-3 g-mb-20">
        <input class="form-control rounded-0 u-form-control" type="text" name="perBnet" placeholder="Battle Tag ID" required>
      </div>
    </div>
  </div>

  <!-- Character Information -->
  <div class="form-group g-mb-20">
      <div class="u-heading-v1-1 g-bg-main g-brd-gray-light-v2 g-mb-20">
          <h2 class="h3 u-heading-v1__title">Character(s)</h2>
      </div>
      <div class="row">
        <label class="col-12"><strong>Main Character (Required)</strong></label>
        <div class="form-group col-md-3 g-mb-20">
          <input class="form-control rounded-0 u-form-control" name="charName" placeholder="Character Name" type="text" required>
        </div>
        <div class="form-group col-md-3 g-mb-20">
          <input class="form-control rounded-0 u-form-control" name="charRealm" placeholder="Realm Name" type="text" required>
        </div>
        <div class="form-group col-md-3 g-mb-20">
          <input class="form-control rounded-0 u-form-control" name="charClass" placeholder="Class" type="text" required>
        </div>
        <div class="form-group col-md-3 g-mb-20">
          <input class="form-control rounded-0 u-form-control" name="charSpec" placeholder="Main Spec" type="text" required>
        </div>
        <div class="form-group col-md-12 g-mb-20">
          <input class="form-control rounded-0 u-form-control" name="charArt" placeholder="Character Artifact Progression (Ex. Havoc 75, Vengeance 70)" type="text" required>
        </div>
        <div class="form-group col-md-6 g-mb-20">
          <input class="form-control rounded-0 u-form-control" name="charArmory" placeholder="WoW Armory Link" type="url" required>
        </div>
        <div class="form-group col-md-6 g-mb-20">
          <input class="form-control rounded-0 u-form-control" name="charLogs" placeholder="Warcraft Logs Link" type="url" required>
        </div>
    </div>
    <div class="row">
      <label class="col-12"><strong>Secondary Character (Optional)</strong></label>
      <div class="form-group col-md-3 g-mb-20">
        <input class="form-control rounded-0 u-form-control" name="altName" placeholder="Alt Name" type="text" optional>
      </div>
      <div class="form-group col-md-3 g-mb-20">
        <input class="form-control rounded-0 u-form-control" name="altRealm" placeholder="Realm Name" type="text" optional>
      </div>
      <div class="form-group col-md-3 g-mb-20">
        <input class="form-control rounded-0 u-form-control" name="altClass" placeholder="Class" type="text" optional>
      </div>
      <div class="form-group col-md-3 g-mb-20">
        <input class="form-control rounded-0 u-form-control" name="altSpec" placeholder="Main Spec" type="text" optional>
      </div>
      <div class="form-group col-md-12 g-mb-20">
        <input class="form-control rounded-0 u-form-control" name="altArt" placeholder="Character Artifact Progression (Ex. Havoc 75, Vengeance 70)" type="text" optional>
      </div>
      <div class="form-group col-md-6 g-mb-20">
        <input class="form-control rounded-0 u-form-control" name="altArmory" placeholder="WoW Armory Link" type="url" optional>
      </div>
      <div class="form-group col-md-6 g-mb-20">
        <input class="form-control rounded-0 u-form-control" name="altLogs" placeholder="Warcraft Logs Link" type="url" optional>
      </div>
    </div>
  </div>

  <!-- Raiding Questions -->
  <div class="form-group g-mb-20">
    <div class="u-heading-v1-1 g-bg-main g-brd-gray-light-v2 g-mb-20">
        <h2 class="h3 u-heading-v1__title">Raiding Information</h2>
    </div>
    <div class="row">
      <div class="form-group col-md-12 g-mb-20">
        <label for="raidQ1">Are you comfortable playing your off-spec in a raid environment? Elaborate.</label>
        <textarea id="raidQ1" class="form-control form-control-md rounded-0" rows="3" placeholder="" name="quest01" required></textarea>
      </div>
      <div class="form-group col-md-12 g-mb-20">
        <label for="raidQ2">What is your raiding experience? Both current and past progression.</label>
        <textarea id="raidQ2" class="form-control form-control-md rounded-0" rows="3" placeholder="" name="quest02" required></textarea>
      </div>
      <div class="form-group col-md-12 g-mb-20">
        <label for="raidQ3">Previous guilds? Why did you leave them and if applicable why are you leaving them for us?</label>
        <textarea id="raidQ3" class="form-control form-control-md rounded-0" rows="3" placeholder="" name="quest03" required></textarea>
      </div>
      <div class="form-group col-md-12 g-mb-20">
        <label for="raidQ4">How did you hear about us and why would you like to join? Why would you be an asset to our roster?</label>
        <textarea id="raidQ4" class="form-control form-control-md rounded-0" rows="3" placeholder="" name="quest04" required></textarea>
      </div>
      <div class="form-group col-md-12 g-mb-20">
        <label for="raidQ5">How do you prepare for a new progression boss? Would you consider dps/healing output or mechanics more important?</label>
        <textarea id="raidQ5" class="form-control form-control-md rounded-0" rows="3" placeholder="" name="quest05" required></textarea>
      </div>
      <div class="form-group col-md-12 g-mb-20">
        <label for="raidQ6">Please post a screenshot of your UI (in raid if possible) and explain any add-ons you consider essential for yourself.</label>
        <textarea id="raidQ6" class="form-control form-control-md rounded-0" rows="3" placeholder="" name="quest06" required></textarea>
        <input class="g-ma-20" type="file" name="imgUI" class="form-control-file" aria-describedby="fileHelp" required />
      </div>
      <div class="form-group col-md-12 g-mb-20">
        <label for="raidQ7">Are you comfortable speaking on Discord? If you refuse to speak don't say yes. What kind of mic/headset do you use?</label>
        <textarea id="raidQ7" class="form-control form-control-md rounded-0" rows="3" placeholder="" name="quest07" required></textarea>
      </div>
      <div class="form-group col-md-12 g-mb-20">
        <label for="raidQ8">Anything else you'd like us to know? Tell us a bit about yourself.</label>
        <textarea id="raidQ8" class="form-control form-control-md rounded-0" rows="3" placeholder="" name="quest08" required></textarea>
      </div>
    </div>
  </div>

  <input type="hidden" name="redirect" value="recruit.php?status=success">

  <div class="form-group g-mb-20">
    <button type="submit" class="btn btn-lg bg-blue">Send Application</button>
  </div>
</form>
