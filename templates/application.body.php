<?php
include_once 'library/class.database.php';
$db = new database();
$application = $db -> sql_fetchrow("SELECT * FROM stormguild.application WHERE application_id =".$appid);
if(!empty($application)) {

  foreach($application as $key => $value){
    $$key = htmlspecialchars($value);
  }

?>
<!-- Screening Questions -->
<div class="row">
    <div class="col-12">
        <div class="u-heading-v3-1 g-my-20">
            <h2 class="h3 u-heading-v3__title">Screening Questions</h2>
        </div>
    </div>
    <div class="col-12">
        <p>
            <strong>You understand that you should put some thought and time into your application?</strong>
            <?php echo $application['screen01']; ?>
        </p>

        <p>
            <strong>Can you make all of our scheduled raids? Including the extra extended raid the week new Mythic content releases?</strong>
            <?php echo $application['screen02']; ?>
        </p>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="u-heading-v3-1 g-my-20">
            <h2 class="h3 u-heading-v3__title">Personal Information</h2>
        </div>
    </div>
    <div class="col-sm-2">
        <p>
            <strong>Name:</strong>
            <?php echo $perName; ?>
        </p>
    </div>
    <div class="col-sm-2">
        <p>
            <strong>Age:</strong>
            <?php echo $perAge; ?>
        </p>
    </div>
    <div class="col-sm-4">
        <p>
            <strong>E-Mail:</strong>
            <?php echo $perEmail; ?>
        </p>
    </div>
    <div class="col-sm-4">
        <p>
            <strong>Battle ID:</strong>
            <?php echo $perBnet; ?>
        </p>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="u-heading-v3-1 g-my-20">
            <h2 class="h3 u-heading-v3__title">Character Information</h2>
        </div>
    </div>
    <div class="col-sm-12 g-my-10">
        <!-- Main Character -->
        <div class="row">
            <div class="col-sm-8">
                <h5>
                    <?php echo $charName; ?>
                    -
                    <?php echo $charRealm; ?>
                    (<?php echo $charSpec.' '.$charClass; ?>)
                    <br/>
                    <small>
                        <?php echo $charArt; ?>
                    </small>
                </h5>
            </div>
            <div class="col-sm-2 g-py-5">
                <a target="_blank" href="<?php echo $charArmory; ?>" class="btn btn-block u-btn-outline-blue g-mb-10">Armory</a>
            </div>
            <div class="col-sm-2 g-py-5">
                <a target="_blank" href="<?php echo $charLogs; ?>" class="btn btn-block u-btn-outline-purple g-mb-10">Logs</a>
            </div>
        </div>
    </div>
    <div class="col-sm-12 g-my-10">
        <!-- Alt Character -->
        <div class="row <?php if(empty($altName)) {echo "g-hide"; } ?>">
            <div class="col-8">
                <h5>
                    <?php echo $altName; ?>
                    -
                    <?php echo $altRealm; ?>
                    (<?php echo $altSpec.' '.$altClass; ?>)
                    <br/>
                    <small>
                        <?php echo $altArt; ?>
                    </small>
                </h5>
            </div>
            <div class="col-2 g-py-5">
                <a target="_blank" href="<?php echo $altArmory; ?>" class="btn btn-block u-btn-outline-blue g-mb-10">Armory</a>
            </div>
            <div class="col-2 g-py-5">
                <a target="_blank" href="<?php echo $altLogs; ?>" class="btn btn-block u-btn-outline-purple g-mb-10">Logs</a>
            </div>
        </div>
    </div>
</div>
<!-- Raid Questions -->
<div class="row">
    <div class="col-sm-12">
        <div class="u-heading-v3-1 g-my-20">
            <h2 class="h3 u-heading-v3__title">Application Questions</h2>
        </div>
    </div>
    <div class="col-sm-12">
        <p class="g-mb-20"><strong>
            Are you comfortable playing your off-spec in a raid environment? Elaborate.
        </strong><br />
            <?php echo nl2br($quest01); ?>
        </p>
    </div>
    <div class="col-sm-12">
        <p class="g-mb-20"><strong>
            What is your raiding experience? Both current and past progression.
        </strong><br />
            <?php echo nl2br($quest02); ?>
        </p>
    </div>
    <div class="col-sm-12">
        <p class="g-mb-20"><strong>
            Previous guilds? Why did you leave them and if applicable why are you leaving them for us?
        </strong><br />
            <?php echo nl2br($quest03); ?>
        </p>
    </div>
    <div class="col-sm-12">
        <p class="g-mb-20"><strong>
            How did you hear about us and why would you like to join? Why would you be an asset to our roster?
        </strong><br />
            <?php echo nl2br($quest04); ?>
        </p>
    </div>
    <div class="col-sm-12">
        <p class="g-mb-20"><strong>
            How do you prepare for a new progression boss? Would you consider dps/healing output or mechanics more important?
        </strong><br />
            <?php echo nl2br($quest05); ?>
        </p>
    </div>
    <div class="col-sm-12">
        <p class="g-mb-20"><strong>
            Please post a screenshot of your UI (in raid if possible) and explain any add-ons you consider essential for yourself.
        </strong><br />
            <?php echo nl2br($quest06); ?>
        </p>
        <a style="max-height:200px;max-width:300px;"
           class="js-fancybox d-block u-block-hover g-my-20"
           href="<?php echo $application['imgUI']; ?>"
           data-fancybox-animate-in="zoomIn" data-fancybox-animate-out="zoomOut"
           data-fancybox-speed="500" data-fancybox-bg="rgba(0,0,0, 1)">
            <img class="img-fluid" src="<?php echo $application['imgUI']; ?>" alt="Missing UI Image">
            <span class="u-block-hover__additional--fade g-bg-black-opacity-0_8 g-color-white">
                <i class="hs-icon hs-icon-plus g-absolute-centered g-font-size-25"></i>
            </span>
        </a>
    </div>
    <div class="col-sm-12">
        <p class="g-mb-20"><strong>
            Are you comfortable speaking on Discord? If you refuse to speak don't say yes. What kind of mic/headset do you use?
        </strong><br />
            <?php echo nl2br($quest07); ?>
        </p>
    </div>
    <div class="col-sm-12">
        <p class="g-mb-20"><strong>
            Anything else you'd like us to know? Tell us a bit about yourself.
        </strong><br />
            <?php echo nl2br($quest08); ?>
        </p>
    </div>
</div>

<?php
}
?>
