
<!-- Success Alert -->
<div class="alert alert-dismissible fade show g-bg-primary g-color-white rounded-0" role="alert">
  <button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
  <div class="media">
    <span class="d-flex g-mr-10 g-mt-5"><i class="icon-check g-font-size-25"></i></span>
    <span class="media-body align-self-center">
        <strong>Congratulations!</strong> <br />
        You have successfully applied to Storm - Stormrage. You have been sent an E-Mail with more information on how to access your application.
    </span>
  </div>
</div>
<!-- End Success Alert -->
<form enctype="multipart/form-data" id="appForm" method="post" action="#application" class="g-brd-around bg-white g-brd-gray-light-v4 g-pa-20">
    <!-- Screening Questions -->
    <div class="form-group g-mb-20">
        <div class="u-heading-v1-1 g-bg-main g-brd-gray-light-v2 g-mb-20">
            <h2 class="h3 u-heading-v1__title">Screening Questions</h2>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h4 class="h6 g-font-weight-700 g-mb-20">You understand that you should put some thought and time into your application?</h4>
                <label class="form-check-inline u-check g-pl-25 g-ml-25 g-mr-25">
                    <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radScreen1" type="radio" value="yes" required>
                    <div class="u-check-icon-radio-v4 g-absolute-centered--y g-left-0 g-width-18 g-height-18">
                        <i class="g-absolute-centered d-block g-width-10 g-height-10 g-bg-primary--checked"></i>
                    </div>
                    Yes
                </label>
                <label class="form-check-inline u-check g-pl-25 g-ml-25 g-mr-25">
                    <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radScreen1" type="radio" value="no">
                    <div class="u-check-icon-radio-v4 g-absolute-centered--y g-left-0 g-width-18 g-height-18">
                        <i class="g-absolute-centered d-block g-width-10 g-height-10 g-bg-primary--checked"></i>
                    </div>
                    No
                </label>
            </div>
            <div class="col-lg-12">
                <h4 class="h6 g-font-weight-700 g-mb-20">Can you make all of our scheduled raids? Including the extra extended raid the week new Mythic content releases?</h4>
                <label class="form-check-inline u-check g-pl-25 g-ml-25 g-mr-25">
                    <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radScreen2" type="radio" value="yes" required>
                    <div class="u-check-icon-radio-v4 g-absolute-centered--y g-left-0 g-width-18 g-height-18">
                        <i class="g-absolute-centered d-block g-width-10 g-height-10 g-bg-primary--checked"></i>
                    </div>
                    Yes
                </label>
                <label class="form-check-inline u-check g-pl-25 g-ml-25 g-mr-25">
                    <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radScreen2" type="radio" value="no">
                    <div class="u-check-icon-radio-v4 g-absolute-centered--y g-left-0 g-width-18 g-height-18">
                        <i class="g-absolute-centered d-block g-width-10 g-height-10 g-bg-primary--checked"></i>
                    </div>
                    No
                </label>
            </div>
        </div>
    </div>
    <!-- Personal Information -->
    <div class="form-group g-mb-20">
        <div class="u-heading-v1-1 g-bg-main g-brd-gray-light-v2 g-mb-20">
            <h2 class="h3 u-heading-v1__title">Personal Information</h2>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group <?php if(ISSET($perNameERR)) {echo "u-has-error-v1";} else { echo "bg-white"; } ?> g-mb-20">
                    <div class="input-group g-brd-primary--focus">
                        <div class="input-group-addon d-flex align-items-center g-color-gray-light-v1 rounded-0">
                            <i class="fa fa-user-circle-o"></i>
                        </div>
                        <input class="form-control form-control-md border-left-0 rounded-0 pl-0" type="text" name="perName"
                               placeholder="Name" <?php if(ISSET($_POST['perName'])) {echo 'value="'.$_POST['perName'].'"'; } ?>>
                    </div>
                    <?php if(!empty($perNameERR)) { echo '<small class="form-control-feedback g-color-red">'.$perNameERR.'</small>'; } ?>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group <?php if(ISSET($perAgeERR)) {echo "u-has-error-v1";} else { echo "bg-white"; } ?> g-mb-20">
                    <div class="input-group g-brd-primary--focus">
                        <div class="input-group-addon d-flex align-items-center g-color-gray-light-v1 rounded-0">
                            <i class="fa fa-drivers-license-o"></i>
                        </div>
                        <input class="form-control form-control-md border-left-0 rounded-0 pl-0" type="number" name="perAge"
                               placeholder="Age" <?php if(ISSET($_POST['perAge'])) {echo 'value="'.$_POST['perAge'].'"'; } ?>>
                    </div>
                    <?php if(!empty($perAgeERR)) {
    echo '<small class="form-control-feedback g-color-red">'.$perAgeERR.'</small>';
} ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group g-mb-20 <?php if(ISSET($perEmailERR)) {echo "u-has-error-v1";} else { echo "bg-white"; } ?>">
                    <div class="input-group g-brd-primary--focus">
                        <div class="input-group-addon d-flex align-items-center g-color-gray-light-v1 rounded-0">
                            <i class="fa fa-envelope-o"></i>
                        </div>
                        <input class="form-control form-control-md border-left-0 rounded-0 pl-0" type="email" placeholder="Email Address" name="perEmail"
                               <?php if(ISSET($_POST['perEmail'])) {echo 'value="'.$_POST['perEmail'].'"'; } ?>>
                    </div>
                    <?php if(!empty($perEmailERR)) {
    echo '<small class="form-control-feedback g-color-red">'.$perEmailERR.'</small>';
} ?>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group g-mb-20 <?php if(ISSET($perBnetERR)) {echo "u-has-error-v1";} else { echo "bg-white"; } ?>">
                    <div class="input-group g-brd-primary--focus">
                        <div class="input-group-addon d-flex align-items-center g-color-gray-light-v1 rounded-0">
                            <i class="fa fa-group"></i>
                        </div>
                        <input class="form-control form-control-md border-left-0 rounded-0 pl-0" type="text" placeholder="Battle Tag ID" name="perBnet"
                               <?php if(ISSET($_POST['perBnet'])) {echo 'value="'.$_POST['perBnet'].'"'; } ?>>
                    </div>
                    <?php if(!empty($perBnetERR)) {
    echo '<small class="form-control-feedback g-color-red">'.$perBnetERR.'</small>';
} ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Character Information -->
    <div class="form-group g-mb-20">
        <div class="u-heading-v1-1 g-bg-main g-brd-gray-light-v2 g-mb-20">
            <h2 class="h3 u-heading-v1__title">Character(s)</h2>
        </div>

        <!-- Primary Character -->
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group g-mb-20">
                    <div class="input-group g-brd-primary--focus
                                <?php if(ISSET($charNameERR)) {echo "u-has-error-v1";} else { echo "bg-white"; } ?>">
                        <div class="input-group-addon d-flex align-items-center g-color-gray-light-v1 rounded-0">
                            <i class="fa fa-user-circle-o"></i>
                        </div>
                        <input class="form-control form-control-md border-left-0 rounded-0 pl-0" type="text"
                               <?php if(ISSET($_POST['charName'])) {echo 'value="'.$_POST['charName'].'"'; } ?>  name="charName" placeholder="Character Name">
                    </div>
                    <?php if(!empty($charNameERR)) {
    echo '<small class="form-control-feedback g-color-red">'.$charNameERR.'</small>';
} ?>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group g-mb-20">
                    <div class="input-group g-brd-primary--focus
                                <?php if(ISSET($charRealmERR)) {echo "u-has-error-v1";} else { echo "bg-white"; } ?>">
                        <div class="input-group-addon d-flex align-items-center g-color-gray-light-v1 rounded-0">
                            <i class="fa fa-superpowers"></i>
                        </div>
                        <input class="form-control form-control-md border-left-0 rounded-0 pl-0" type="text"
                               <?php if(ISSET($_POST['charRealm'])) {echo 'value="'.$_POST['charRealm'].'"'; } ?>
                               placeholder="Realm Name" name="charRealm">
                    </div>
                    <?php if(!empty($charRealmERR)) {
    echo '<small class="form-control-feedback g-color-red">'.$charRealmERR.'</small>';
} ?>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group g-mb-20">
                    <div class="input-group g-brd-primary--focus
                                <?php if(ISSET($charClassERR)) {echo "u-has-error-v1";} else { echo "bg-white"; } ?>">
                        <div class="input-group-addon d-flex align-items-center g-color-gray-light-v1 rounded-0">
                            <i class="fa fa-drivers-license-o"></i>
                        </div>
                        <input class="form-control form-control-md border-left-0 rounded-0 pl-0" type="text"
                               <?php if(ISSET($_POST['charClass'])) {echo 'value="'.$_POST['charClass'].'"'; } ?>
                               placeholder="Class" name="charClass">
                    </div>
                    <?php if(!empty($charClassERR)) {
    echo '<small class="form-control-feedback g-color-red">'.$charClassERR.'</small>';
} ?>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group g-mb-20">
                    <div class="input-group g-brd-primary--focus
                                <?php if(ISSET($charSpecERR)) {echo "u-has-error-v1";} else { echo "bg-white"; } ?>">
                        <div class="input-group-addon d-flex align-items-center g-color-gray-light-v1 rounded-0">
                            <i class="fa fa-eye"></i>
                        </div>
                        <input class="form-control form-control-md border-left-0 rounded-0 pl-0" type="text"
                               <?php if(ISSET($_POST['charSpec'])) {echo 'value="'.$_POST['charSpec'].'"'; } ?>
                               placeholder="Specialization" name="charSpec">
                    </div>
                    <?php if(!empty($charSpecERR)) {
    echo '<small class="form-control-feedback g-color-red">'.$charSpecERR.'</small>';
} ?>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group g-mb-20">
                    <div class="input-group g-brd-primary--focus
                                <?php if(ISSET($charArtERR)) {echo "u-has-error-v1";} else { echo "bg-white"; } ?>">
                        <input class="form-control form-control-md rounded-0" type="text"
                               <?php if(ISSET($_POST['charArt'])) {echo 'value="'.$_POST['charArt'].'"'; } ?>
                               placeholder="Artifact Progress (Ex: Enhance 70 / Elemental 2 / Restoration 52)"
                               name="charArt">
                    </div>
                    <?php if(!empty($charArtERR)) {
    echo '<small class="form-control-feedback g-color-red">'.$charArtERR.'</small>';
} ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group g-mb-20">
                    <div class="input-group g-brd-primary--focus
                                <?php if(ISSET($charArmoryERR)) {echo "u-has-error-v1";} else { echo "bg-white"; } ?>">
                        <input class="form-control form-control-md rounded-0" type="url"
                               <?php if(ISSET($_POST['charArmory'])) {echo 'value="'.$_POST['charArmory'].'"'; } ?>
                               placeholder="Armory Link" name="charArmory">
                    </div>
                    <?php if(!empty($charArmoryERR)) {
    echo '<small class="form-control-feedback g-color-red">'.$charArmoryERR.'</small>';
} ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group g-mb-20">
                    <div class="input-group g-brd-primary--focus
                                <?php if(ISSET($charLogsERR)) {echo "u-has-error-v1";} else { echo "bg-white"; } ?>">
                        <input class="form-control form-control-md rounded-0" type="url"
                               <?php if(ISSET($_POST['charLogs'])) {echo 'value="'.$_POST['charLogs'].'"'; } ?>
                               placeholder="Warcraft Logs Link" name="charLogs">
                    </div>
                    <?php if(!empty($charLogsERR)) {
    echo '<small class="form-control-feedback g-color-red">'.$charLogsERR.'</small>';
} ?>
                </div>
            </div>
        </div>

        <!-- Alt Character -->
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group g-mb-20">
                    <div class="input-group g-brd-primary--focus
                                <?php if(ISSET($altNameERR)) {echo "u-has-error-v1";} else { echo "bg-white"; } ?>">
                        <div class="input-group-addon d-flex align-items-center g-color-gray-light-v1 rounded-0">
                            <i class="fa fa-user-circle-o"></i>
                        </div>
                        <input class="form-control form-control-md border-left-0 rounded-0 pl-0" type="text"
                               <?php if(ISSET($_POST['altName'])) {echo 'value="'.$_POST['altName'].'"'; } ?>  name="altName" placeholder="Alt Name (Optional)">
                    </div>
                    <?php if(!empty($altNameERR)) {
    echo '<small class="form-control-feedback g-color-red">'.$altNameERR.'</small>';
} ?>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group g-mb-20">
                    <div class="input-group g-brd-primary--focus
                                <?php if(ISSET($altRealmERR)) {echo "u-has-error-v1";} else { echo "bg-white"; } ?>">
                        <div class="input-group-addon d-flex align-items-center g-color-gray-light-v1 rounded-0">
                            <i class="fa fa-superpowers"></i>
                        </div>
                        <input class="form-control form-control-md border-left-0 rounded-0 pl-0" type="text"
                               <?php if(ISSET($_POST['altRealm'])) {echo 'value="'.$_POST['altRealm'].'"'; } ?>
                               placeholder="Realm Name" name="altRealm">
                    </div>
                    <?php if(!empty($altRealmERR)) {
    echo '<small class="form-control-feedback g-color-red">'.$altRealmERR.'</small>';
} ?>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group g-mb-20">
                    <div class="input-group g-brd-primary--focus
                                <?php if(ISSET($altClassERR)) {echo "u-has-error-v1";} else { echo "bg-white"; } ?>">
                        <div class="input-group-addon d-flex align-items-center g-color-gray-light-v1 rounded-0">
                            <i class="fa fa-drivers-license-o"></i>
                        </div>
                        <input class="form-control form-control-md border-left-0 rounded-0 pl-0" type="text"
                               <?php if(ISSET($_POST['altClass'])) {echo 'value="'.$_POST['altClass'].'"'; } ?>
                               placeholder="Class" name="altClass">
                    </div>
                    <?php if(!empty($altClassERR)) {
    echo '<small class="form-control-feedback g-color-red">'.$altClassERR.'</small>';
} ?>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group g-mb-20">
                    <div class="input-group g-brd-primary--focus
                                <?php if(ISSET($altSpecERR)) {echo "u-has-error-v1";} else { echo "bg-white"; } ?>">
                        <div class="input-group-addon d-flex align-items-center g-color-gray-light-v1 rounded-0">
                            <i class="fa fa-eye"></i>
                        </div>
                        <input class="form-control form-control-md border-left-0 rounded-0 pl-0" type="text"
                               <?php if(ISSET($_POST['altSpec'])) {echo 'value="'.$_POST['altSpec'].'"'; } ?>
                               placeholder="Specialization" name="altSpec">
                    </div>
                    <?php if(!empty($altSpecERR)) {
    echo '<small class="form-control-feedback g-color-red">'.$altSpecERR.'</small>';
} ?>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group g-mb-20">
                    <div class="input-group g-brd-primary--focus
                                <?php if(ISSET($altArtERR)) {echo "u-has-error-v1";} else { echo "bg-white"; } ?>">
                        <input class="form-control form-control-md rounded-0" type="text"
                               <?php if(ISSET($_POST['altArt'])) {echo 'value="'.$_POST['altArt'].'"'; } ?>
                               placeholder="Artifact Progress (Ex: Enhance 70 / Elemental 2 / Restoration 52)"
                               name="altArt">
                    </div>
                    <?php if(!empty($altArtERR)) {
    echo '<small class="form-control-feedback g-color-red">'.$altArtERR.'</small>';
} ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group g-mb-20">
                    <div class="input-group g-brd-primary--focus
                                <?php if(ISSET($altArmoryERR)) {echo "u-has-error-v1";} else { echo "bg-white"; } ?>">
                        <input class="form-control form-control-md rounded-0" type="url"
                               <?php if(ISSET($_POST['altArmory'])) {echo 'value="'.$_POST['altArmory'].'"'; } ?>
                               placeholder="Armory Link" name="altArmory">
                    </div>
                    <?php if(!empty($altArmoryERR)) {
    echo '<small class="form-control-feedback g-color-red">'.$altArmoryERR.'</small>';
} ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group g-mb-20">
                    <div class="input-group g-brd-primary--focus
                                <?php if(ISSET($altLogsERR)) {echo "u-has-error-v1";} else { echo "bg-white"; } ?>">
                        <input class="form-control form-control-md rounded-0" type="url"
                               <?php if(ISSET($_POST['altLogs'])) {echo 'value="'.$_POST['altLogs'].'"'; } ?>
                               placeholder="Warcraft Logs Link" name="altLogs">
                    </div>
                    <?php if(!empty($altLogsERR)) {
    echo '<small class="form-control-feedback g-color-red">'.$altLogsERR.'</small>';
} ?>
                </div>
            </div>
        </div>

    </div>

    <!-- Raiding Questions -->
    <div class="form-group g-mb-20">
        <div class="u-heading-v1-1 g-bg-main g-brd-gray-light-v2 g-mb-20">
            <h2 class="h3 u-heading-v1__title">Raiding Information</h2>
        </div>

        <div class="form-group g-mb-20
                    <?php if(ISSET($quest01ERR)) {echo "u-has-error-v1";} else { echo "bg-white"; } ?>">
            <label class="g-mb-10" for="raidQ1">Are you comfortable playing your off-spec in a raid environment? Elaborate.</label>
            <textarea id="raidQ1" class="form-control form-control-md rounded-0" rows="3" placeholder="" name="quest01"><?php if(ISSET($_POST['quest01'])) {echo $_POST['quest01']; } ?></textarea>
            <?php if(!empty($quest01ERR)) {
    echo '<small class="form-control-feedback g-color-red">'.$quest01ERR.'</small>';
} ?>
        </div>

        <div class="form-group g-mb-20
                    <?php if(ISSET($quest02ERR)) {echo "u-has-error-v1";} else { echo "bg-white"; } ?>">
            <label class="g-mb-10" for="raidQ2">What is your raiding experience? Both current and past progression.</label>
            <textarea id="raidQ2" class="form-control form-control-md rounded-0" rows="3" placeholder="" name="quest02"><?php if(ISSET($_POST['quest02'])) {echo $_POST['quest02']; } ?></textarea>
            <?php if(!empty($quest02ERR)) {
    echo '<small class="form-control-feedback g-color-red">'.$quest02ERR.'</small>';
} ?>
        </div>

        <div class="form-group g-mb-20
                    <?php if(ISSET($quest03ERR)) {echo "u-has-error-v1";} else { echo "bg-white"; } ?>">
            <label class="g-mb-10" for="raidQ3">Previous guilds? Why did you leave them and if applicable why are you leaving them for us?</label>
            <textarea id="raidQ3" class="form-control form-control-md rounded-0" rows="3" placeholder="" name="quest03"><?php if(ISSET($_POST['quest03'])) {echo $_POST['quest03']; } ?></textarea>
            <?php if(!empty($quest03ERR)) {
    echo '<small class="form-control-feedback g-color-red">'.$quest03ERR.'</small>';
} ?>
        </div>

        <div class="form-group g-mb-20
                    <?php if(ISSET($quest04ERR)) {echo "u-has-error-v1";} else { echo "bg-white"; } ?>">
            <label class="g-mb-10" for="raidQ4">How did you hear about us and why would you like to join? Why would you be an asset to our roster?</label>
            <textarea id="raidQ4" class="form-control form-control-md rounded-0" rows="3" placeholder="" name="quest04"><?php if(ISSET($_POST['quest04'])) {echo $_POST['quest04']; } ?></textarea>
            <?php if(!empty($quest04ERR)) {
    echo '<small class="form-control-feedback g-color-red">'.$quest04ERR.'</small>';
} ?>
        </div>

        <div class="form-group g-mb-20
                    <?php if(ISSET($quest05ERR)) {echo "u-has-error-v1";} else { echo "bg-white"; } ?>">
            <label class="g-mb-10" for="raidQ5">How do you prepare for a new progression boss? Would you consider dps/healing output or mechanics more important?</label>
            <textarea id="raidQ5" class="form-control form-control-md rounded-0" rows="3" placeholder="" name="quest05"><?php if(ISSET($_POST['quest05'])) {echo $_POST['quest05']; } ?></textarea>
            <?php if(!empty($quest05ERR)) {
    echo '<small class="form-control-feedback g-color-red">'.$quest05ERR.'</small>';
} ?>
        </div>

        <div class="form-group g-mb-20
                    <?php if(ISSET($quest06ERR)) {echo "u-has-error-v1";} else { echo "bg-white"; } ?>">
            <label class="g-mb-10" for="raidQ6">Please post a screenshot of your UI (in raid if possible) and explain any add-ons you consider essential for yourself.</label>
            <textarea id="raidQ6" class="form-control form-control-md rounded-0" rows="3" placeholder="" name="quest06"><?php if(ISSET($_POST['quest06'])) {echo $_POST['quest06']; } ?></textarea>
            <input type="file" name="imgUI" class="form-control-file" aria-describedby="fileHelp" />
            <?php if(!empty($quest06ERR)) {
    echo '<small class="form-control-feedback g-color-red">'.$quest06ERR.'</small>';
} ?>
        </div>

        <div class="form-group g-mb-20
                    <?php if(ISSET($quest07ERR)) {echo "u-has-error-v1";} else { echo "bg-white"; } ?>">
            <label class="g-mb-10" for="raidQ7">Are you comfortable speaking on Discord? If you refuse to speak don't say yes. What kind of mic/headset do you use?</label>
            <textarea id="raidQ7" class="form-control form-control-md rounded-0" rows="3" placeholder="" name="quest07"><?php if(ISSET($_POST['quest07'])) {echo $_POST['quest07']; } ?></textarea>
            <?php if(!empty($quest07ERR)) {
    echo '<small class="form-control-feedback g-color-red">'.$quest07ERR.'</small>';
} ?>
        </div>

        <div class="form-group g-mb-20
                    <?php if(ISSET($quest08ERR)) {echo "u-has-error-v1";} else { echo "bg-white"; } ?>">
            <label class="g-mb-10" for="raidQ8">Anything else you'd like us to know? Tell us a bit about yourself.</label>
            <textarea id="raidQ8" class="form-control form-control-md rounded-0" rows="3" placeholder="" name="quest08"><?php if(ISSET($_POST['quest08'])) {echo $_POST['quest08']; } ?></textarea>
            <?php if(!empty($quest08ERR)) {
    echo '<small class="form-control-feedback g-color-red">'.$quest08ERR.'</small>';
} ?>
        </div>


    </div>
    <div class="form-group g-mb-20">
        <button type="submit" class="btn btn-lg bg-blue">Send Application</button>
    </div>

</form>
