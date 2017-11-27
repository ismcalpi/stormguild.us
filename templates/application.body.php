<?php
include_once 'library/class.database.php';
$db = new database();
$application = $db -> sql_fetchrow("SELECT * FROM stormguild.application WHERE application_id =".$appid);
if(!empty($application)) {
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
            <?php echo $application['perName']; ?>
        </p>
    </div>
    <div class="col-sm-2">
        <p>
            <strong>Age:</strong>
            <?php echo $application['perAge']; ?>
        </p>
    </div>
    <div class="col-sm-4">
        <p>
            <strong>E-Mail:</strong>
            <?php echo $application['perEmail']; ?>
        </p>
    </div>
    <div class="col-sm-4">
        <p>
            <strong>Battle ID:</strong>
            <?php echo $application['perBnet']; ?>
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
                    <?php echo $application['charName']; ?>
                    -
                    <?php echo $application['charRealm']; ?>
                    (<?php echo $application['charSpec'].' '.$application['charClass']; ?>)
                    <br/>
                    <small>
                        <?php echo $application['charArt']; ?>
                    </small>
                </h5>
            </div>
            <div class="col-sm-2 g-py-5">
                <a target="_blank" href="<?php echo $application['charArmory']; ?>" class="btn btn-md u-btn-skew u-btn-outline-blue g-mr-10 g-mb-15">
                    <span class="u-btn-skew__inner">Armory Link</span>
                </a>
            </div>
            <div class="col-sm-2 g-py-5">
                <a target="_blank" href="<?php echo $application['charLogs']; ?>" class="btn btn-md u-btn-skew u-btn-outline-purple g-mr-10 g-mb-15">
                    <span class="u-btn-skew__inner">Logs Link</span>
                </a>
            </div>
        </div>
    </div>
    <div class="col-sm-12 g-my-10">
        <!-- Alt Character -->
        <div class="row <?php if(empty($application['altName'])) {echo "g-hide"; } ?>">
            <div class="col-sm-8">
                <h5>
                    <?php echo $application['altName']; ?>
                    -
                    <?php echo $application['altRealm']; ?>
                    (<?php echo $application['altSpec'].' '.$application['altClass']; ?>)
                    <br/>
                    <small>
                        <?php echo $application['altArt']; ?>
                    </small>
                </h5>
            </div>
            <div class="col-sm-2 g-py-5">
                <a target="_blank" href="<?php echo $application['altArmory']; ?>" class="btn btn-md u-btn-skew u-btn-outline-blue g-mr-10 g-mb-15">
                    <span class="u-btn-skew__inner">Armory Link</span>
                </a>
            </div>
            <div class="col-sm-2 g-py-5">
                <a target="_blank" href="<?php echo $application['altLogs']; ?>" class="btn btn-md u-btn-skew u-btn-outline-purple g-mr-10 g-mb-15">
                    <span class="u-btn-skew__inner">Logs Link</span>
                </a>
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
        <p><strong>
            Are you comfortable playing your off-spec in a raid environment? Elaborate.
        </strong></p>
        <p>
            <?php echo nl2br($application['quest01']); ?>
        </p>
    </div>
    <div class="col-sm-12">
        <p><strong>
            What is your raiding experience? Both current and past progression.
        </strong></p>
        <p>
            <?php echo nl2br($application['quest02']); ?>
        </p>
    </div>
    <div class="col-sm-12">
        <p><strong>
            Previous guilds? Why did you leave them and if applicable why are you leaving them for us?
        </strong></p>
        <p>
            <?php echo nl2br($application['quest03']); ?>
        </p>
    </div>
    <div class="col-sm-12">
        <p><strong>
            How did you hear about us and why would you like to join? Why would you be an asset to our roster?
        </strong></p>
        <p>
            <?php echo nl2br($application['quest04']); ?>
        </p>
    </div>
    <div class="col-sm-12">
        <p><strong>
            How do you prepare for a new progression boss? Would you consider dps/healing output or mechanics more important?
        </strong></p>
        <p>
            <?php echo nl2br($application['quest05']); ?>
        </p>
    </div>
    <div class="col-sm-12">
        <p><strong>
            Please post a screenshot of your UI (in raid if possible) and explain any add-ons you consider essential for yourself.
        </strong></p>
        <p>
            <?php echo nl2br($application['quest06']); ?>
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
        <p><strong>
            Are you comfortable speaking on Discord? If you refuse to speak don't say yes. What kind of mic/headset do you use?
        </strong></p>
        <p>
            <?php echo nl2br($application['quest07']); ?>
        </p>
    </div>
    <div class="col-sm-12">
        <p><strong>
            Anything else you'd like us to know? Tell us a bit about yourself.
        </strong></p>
        <p>
            <?php echo nl2br($application['quest08']); ?>
        </p>
    </div>
</div>

<?php
}
?>
