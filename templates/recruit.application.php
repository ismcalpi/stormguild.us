<?php

include_once 'forums/includes/functions_messenger.php';
include_once 'library/class.database.php';

$database = new database();
$messenger = new messenger();

#Error Checking for FORM
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $appSuccess = TRUE; #Set to true until it's decided to be false

    #Screen1 Question
    if (!empty($_POST['radScreen1'])) {
        $radScreen1 = $_POST['radScreen1'];
        if ($radScreen1 == 'yes') {
            $screen1YES = 'checked=""';
        } else if ($radScreen1 == 'no') {
            $screen1NO = 'checked=""';
        }
    } else {
        $appSuccess = FALSE;
        $screen1ERR = "* This is a required field";
    }

    #Screen2 Question
    if (!empty($_POST['radScreen2'])) {
        $radScreen2 = $_POST['radScreen2'];
        if ($radScreen2 == 'yes') {
            $screen2YES = 'checked=""';
        } else if ($radScreen2 == 'no') {
            $screen2NO = 'checked=""';
        }
    } else {
        $appSuccess = FALSE;
        $screen2ERR = "* This is a required field";
    }

    #perName Question
    if (!empty($_POST['perName'])) {
        $perName = $_POST['perName'];
    } else {
        $appSuccess = FALSE;
        $perNameERR = "This is a required field.";
    }

    #perAge Question
    if (!empty($_POST['perAge'])) {
        $perAge = $_POST['perAge'];
    } else {
        $appSuccess = FALSE;
        $perAgeERR = "This is a required field.";
    }

    #perEmail Question
    if (!empty($_POST['perEmail'])) {
        $perEmail = $_POST['perEmail'];
        if(!filter_var($perEmail, FILTER_VALIDATE_EMAIL)) {
            $appSuccess = FALSE;
            $perEmailERR = "This is not a valid E-Mail Address";
        }
    } else {
        $appSuccess = FALSE;
        $perEmailERR = "This is a required field.";
    }

    #perBnet Question
    if (!empty($_POST['perBnet'])) {
        $perBnet = $_POST['perBnet'];
    } else {
        $appSuccess = FALSE;
        $perBnetERR = "This is a required field.";
    }

    #charName Question
    if (!empty($_POST['charName'])) {
        $charName = $_POST['charName'];
    } else {
        $appSuccess = FALSE;
        $charNameERR = "This is a required field.";
    }

    #charRealm Question
    if (!empty($_POST['charRealm'])) {
        $charRealm = $_POST['charRealm'];
    } else {
        $appSuccess = FALSE;
        $charRealmERR = "This is a required field.";
    }

    #charClass Question
    if (!empty($_POST['charClass'])) {
        $charClass = $_POST['charClass'];
    } else {
        $appSuccess = FALSE;
        $charClassERR = "This is a required field.";
    }

    #charSpec Question
    if (!empty($_POST['charSpec'])) {
        $charSpec = $_POST['charSpec'];
    } else {
        $appSuccess = FALSE;
        $charSpecERR = "This is a required field.";
    }

    #charArt Question
    if (!empty($_POST['charArt'])) {
        $charArt = $_POST['charArt'];
    } else {
        $appSuccess = FALSE;
        $charArtERR = "This is a required field.";
    }

    #charArmory Question
    if (!empty($_POST['charArmory'])) {
        $charArmory = $_POST['charArmory'];
    } else if (empty($_POST['charArmory'])) {
        $appSuccess = FALSE;
        $charArmoryERR = "This is a required field.";
    } else if (!filter_var($charArmory, FILTER_VALIDATE_URL)) {
        $appSuccess = FALSE;
        $charArmoryERR = "Not a valid URL.";
    }

    #charLogs Question
    if (!empty($_POST['charLogs'])) {
        $charLogs = $_POST['charLogs'];
    } else if (empty($_POST['charLogs'])) {
        $appSuccess = FALSE;
        $charLogsERR = "This is a required field.";
    } else if (!filter_var($charLogs, FILTER_VALIDATE_URL)) {
        $appSuccess = FALSE;
        $charLogsERR = "Not a valid URL.";
    }

    #altName Question
    if (!empty($_POST['altName'])) {
        $altName = $_POST['altName'];
    }

    #altRealm Question
    if (!empty($_POST['altRealm'])) {
        $altRealm = $_POST['altRealm'];
    } else if (!empty($altName)) {
        $appSuccess = FALSE;
        $altRealmERR = "This is a required field.";
    }

    #altClass Question
    if (!empty($_POST['altClass'])) {
        $altClass = $_POST['altClass'];
    } else if (!empty($altName)) {
        $appSuccess = FALSE;
        $altClassERR = "This is a required field.";
    }

    #altSpec Question
    if (!empty($_POST['altSpec'])) {
        $altSpec = $_POST['altSpec'];
    } else if (!empty($altName)) {
        $appSuccess = FALSE;
        $altSpecERR = "This is a required field.";
    }

    #altArt Question
    if (!empty($_POST['altArt'])) {
        $altArt = $_POST['altArt'];
    } else if (!empty($altName)) {
        $appSuccess = FALSE;
        $altArtERR = "This is a required field.";
    }

    #altArmory Question
    if (!empty($_POST['altArmory'])) {
        $altArmory = $_POST['altArmory'];
    } else if (!empty($altName)) {
        $appSuccess = FALSE;
        $altArmoryERR = "This is a required field.";
    } else if (!empty($altName) && !filter_var($altArmory, FILTER_VALIDATE_URL)) {
        $appSuccess = FALSE;
        $altArmoryERR = "Not a valid URL.";
    }

    #altLogs Question
    if (!empty($_POST['altLogs'])) {
        $altLogs = $_POST['altLogs'];
    } else if (!empty($altName)) {
        $appSuccess = FALSE;
        $altLogsERR = "This is a required field.";
    } else if (!empty($altName) && !filter_var($altLogs, FILTER_VALIDATE_URL)) {
        $appSuccess = FALSE;
        $altLogsERR = "Not a valid URL.";
    }

    #quest01
    if (!empty($_POST['quest01'])) {
        $quest01 = $_POST['quest01'];
    } else {
        $appSuccess = FALSE;
        $quest01ERR = "This is a required field.";
    }

    #quest02
    if (!empty($_POST['quest02'])) {
        $quest02 = $_POST['quest02'];
    } else {
        $appSuccess = FALSE;
        $quest02ERR = "This is a required field.";
    }

    #quest03
    if (!empty($_POST['quest03'])) {
        $quest03 = $_POST['quest03'];
    } else {
        $appSuccess = FALSE;
        $quest03ERR = "This is a required field.";
    }

    #quest04
    if (!empty($_POST['quest04'])) {
        $quest04 = $_POST['quest04'];
    } else {
        $appSuccess = FALSE;
        $quest04ERR = "This is a required field.";
    }

    #quest05
    if (!empty($_POST['quest05'])) {
        $quest05 = $_POST['quest05'];
    } else {
        $appSuccess = FALSE;
        $quest05ERR = "This is a required field.";
    }

    #quest06
    if (!empty($_POST['quest06'])) {
        $quest06 = $_POST['quest06'];
    } else {
        $appSuccess = FALSE;
        $quest06ERR = "This is a required field.";
    }

    #fileUI
    if ($_FILES["imgUI"]["error"] != UPLOAD_ERR_OK) {
        $appSuccess = FALSE;
        $quest06ERR = "This is a required field.";
    }

    #quest07
    if (!empty($_POST['quest07'])) {
        $quest07 = $_POST['quest07'];
    } else {
        $appSuccess = FALSE;
        $quest07ERR = "This is a required field.";
    }

    #quest08
    if (!empty($_POST['quest08'])) {
        $quest08 = $_POST['quest08'];
    } else {
        $appSuccess = FALSE;
        $quest08ERR = "This is a required field.";
    }

    #If all is successful then add to Database and provide popup
    if ($appSuccess == TRUE) {

      $radScreen1 = $database -> quote($radScreen1);
      $radScreen2 = $database -> quote($radScreen2);

      $perName = $database -> quote($perName);
      $perAge = $database -> quote($perAge);
      $perEmail = $database -> quote($perEmail);
      $perBnet = $database -> quote($perBnet);

      $charName = $database -> quote($charName);
      $charRealm = $database -> quote($charRealm);
      $charClass = $database -> quote($charClass);
      $charSpec = $database -> quote($charSpec);
      $charArt = $database -> quote($charArt);
      $charArmory = $database -> quote($charArmory);
      $charLogs = $database -> quote($charLogs);

      if (empty($altName)) {
          $altName = 'NULL';
          $altRealm = 'NULL';
          $altClass = 'NULL';
          $altSpec = 'NULL';
          $altArt = 'NULL';
          $altArmory = 'NULL';
          $altLogs = 'NULL';
      } else {
          $altName = $database -> quote($altName);
          $altRealm = $database -> quote($altRealm);
          $altClass = $database -> quote($altClass);
          $altSpec = $database -> quote($altSpec);
          $altArt = $database -> quote($altArt);
          $altArmory = $database -> quote($altArmory);
          $altLogs = $database -> quote($altLogs);
      }

      $quest01 = $database -> quote($quest01);
      $quest02 = $database -> quote($quest02);
      $quest03 = $database -> quote($quest03);
      $quest04 = $database -> quote($quest04);
      $quest05 = $database -> quote($quest05);
      $quest06 = $database -> quote($quest06);
      $quest07 = $database -> quote($quest07);
      $quest08 = $database -> quote($quest08);

      $accessID = uniqid();
      $destPath = 'assets/img/uploads/applications/'.$accessID.'/';
      mkdir($destPath);
      $destFile = $destPath.basename($_FILES['imgUI']['name']);
      $tmpFile = $_FILES['imgUI']['tmp_name'];
      move_uploaded_file($tmpFile, $destFile);

      $destFile = $database -> quote($destFile);
      $accessIDClean = $database -> quote($accessID);

      mail_guild();
      add_to_db();

    }

    function mail_guild() {
      $result = "SELECT username, user_lang, user_email, user_allow_massemail FROM stormforums.bb_users where group_id in (select group_id from stormforums.bb_groups where lower(group_name) in ('officer','raider'))";
      while($row = $database->sql_fetchrow($result))
      {
        $messenger->template('new_app', $row['user_lang'], '../email');
        $messenger->to($row['user_email'], $row['username']);
        $messenger->from('applications@stormguild.us', 'Storm Raider Applications');
        $messenger->assign_vars(array(
            'APP_LINK'  => 'https://stormguild.us/admin?mode=application&access_id='.str_replace("'", "", $accessID),
            'APP_CLASS' => $charSpec.' '.$charClass
        ));
        $messenger->send($row['user_notify_type']);
      }
    }

    function add_to_db() {

      $sql = "INSERT INTO `application`
                      (`application_id`,`access_id`,`screen01`,
                      `screen02`,`perName`,
                      `perAge`,`perEmail`,
                      `perBnet`,`charName`,
                      `charRealm`,`charClass`,
                      `charSpec`,`charArt`,
                      `charArmory`,`charLogs`,
                      `altName`,`altRealm`,
                      `altClass`,`altSpec`,
                      `altArt`,`altArmory`,
                      `altLogs`,`quest01`,
                      `quest02`,`quest03`,
                      `quest04`,`quest05`,
                      `quest06`,`quest07`,
                      `quest08`,`imgUI`,
                      `status`,`create_datetime`)
                  VALUES
                      (NULL,".$accessID.",".$radScreen1.",
                      ".$radScreen2.",".$perName.",
                      ".$perAge.",".$perEmail.",
                      ".$perBnet.",".$charName.",
                      ".$charRealm.",".$charClass.",
                      ".$charSpec.",".$charArt.",
                      ".$charArmory.",".$charLogs.",
                      ".$altName.",".$altRealm.",
                      ".$altClass.",".$altSpec.",
                      ".$altArt.",".$altArmory.",
                      ".$altLogs.",".$quest01.",
                      ".$quest02.",".$quest03.",
                      ".$quest04.",".$quest05.",
                      ".$quest06.",".$quest07.",
                      ".$quest08.",".$destFile.",
                      'applied',now())";

      $database -> query($sql);
    }

}

?>

<!-- Success Alert -->
<div class="alert alert-dismissible fade show g-bg-primary g-color-white rounded-0
            <?php
            if (EMPTY($_GET['success'])) {
                echo "g-hide";
            }
            ?>" role="alert">
    <button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>

    <div class="media">
        <span class="d-flex g-mr-10 g-mt-5">
            <i class="icon-check g-font-size-25"></i>
        </span>
        <span class="media-body align-self-center">
            <strong>Congratulations!</strong> <br /> You have successfully applied to Storm - Stormrage. You have been sent an E-Mail with more information on how to access your application.<br /> If there are any issues please contact us through the form found at the bottom of the website.
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
                    <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radScreen1" type="radio" value="yes" <?php if (ISSET($screen1YES)) {echo $screen1YES;} ?> >
                    <div class="u-check-icon-radio-v4 g-absolute-centered--y g-left-0 g-width-18 g-height-18">
                        <i class="g-absolute-centered d-block g-width-10 g-height-10 g-bg-primary--checked"></i>
                    </div>
                    Yes
                </label>

                <label class="form-check-inline u-check g-pl-25 g-ml-25 g-mr-25">
                    <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radScreen1" type="radio" value="no" <?php if(ISSET($screen1NO)) {echo $screen1NO;} ?> >
                    <div class="u-check-icon-radio-v4 g-absolute-centered--y g-left-0 g-width-18 g-height-18">
                        <i class="g-absolute-centered d-block g-width-10 g-height-10 g-bg-primary--checked"></i>
                    </div>
                    No
                </label>

                <?php if(!empty($screen1ERR)) {
    echo '<small class="form-control-feedback g-color-red">'.$screen1ERR.'</small>';
} ?>

            </div>

            <div class="col-lg-12">

                <h4 class="h6 g-font-weight-700 g-mb-20">Can you make all of our scheduled raids? Including the extra extended raid the week new Mythic content releases?</h4>

                <label class="form-check-inline u-check g-pl-25 g-ml-25 g-mr-25">
                    <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radScreen2" type="radio" value="yes" <?php if (ISSET($screen2YES)) {echo $screen2YES;} ?> >
                    <div class="u-check-icon-radio-v4 g-absolute-centered--y g-left-0 g-width-18 g-height-18">
                        <i class="g-absolute-centered d-block g-width-10 g-height-10 g-bg-primary--checked"></i>
                    </div>
                    Yes
                </label>

                <label class="form-check-inline u-check g-pl-25 g-ml-25 g-mr-25">
                    <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radScreen2" type="radio" value="no" <?php if(ISSET($screen2NO)) {echo $screen2NO;} ?> >
                    <div class="u-check-icon-radio-v4 g-absolute-centered--y g-left-0 g-width-18 g-height-18">
                        <i class="g-absolute-centered d-block g-width-10 g-height-10 g-bg-primary--checked"></i>
                    </div>
                    No
                </label>

                <?php if(!empty($screen2ERR)) {
    echo '<small class="form-control-feedback g-color-red">'.$screen2ERR.'</small>';
} ?>

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
                    <?php if(!empty($perNameERR)) {
    echo '<small class="form-control-feedback g-color-red">'.$perNameERR.'</small>';
} ?>
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
