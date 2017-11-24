<div id="app-accordion" class="u-accordion u-accordion-color-primary" role="tablist" aria-multiselectable="true">
    <?php
    include_once 'library/class.database.php';
    $db = new database();
    $result = $db -> sql_fetchrow("SELECT max(application_id) as application_id FROM stormguild.application where status = 'applied'");
    if(!empty($result)) {
        if (!empty($_GET['appid'])) {
            $app_id = $_GET['appid'];
        } else {
            $app_id = $result['application_id'];
        }

        if (!empty($_GET['status'])) {
            $getStatus = $_GET['status'];
        } else {
            $getStatus = 'applied';
        }
    }

    $statuses = $db -> sql_select("SELECT distinct status FROM stormguild.application");
    if (!empty($statuses)) {
        foreach ($statuses as $status) {

    ?>
    <div class="card rounded-0 g-brd-none">
        <div id="<?php echo $status['status'].'-heading'; ?>" class="u-accordion__header g-pa-0" role="tab">
            <h5 class="mb-0 text-uppercase g-font-size-default g-font-weight-700 g-pa-20a mb-0">
                <a class="<?php
            if ($status['status'] != $getStatus) {
                echo 'collapsed';
            }
                          ?> d-block g-color-main g-text-underline--none--hover"
                   href="#<?php echo $status['status'].'-body'; ?>"
                   data-toggle="collapse" data-parent="#app-accordion"
                   aria-expanded="true" aria-controls="<?php echo $status['status'].'-body'; ?>">
                    <span class="u-accordion__control-icon d-inline-block g-brd-right g-brd-gray-light-v4 g-color-blue text-center g-pa-20">
                        <i class="fa fa-plus"></i>
                        <i class="fa fa-minus"></i>
                    </span>
                    <span class="d-inline-block g-pa-15 g-color-blue">
                        <?php echo $status['status']; ?>
                    </span>
                </a>
            </h5>
        </div>
        <div id="<?php echo $status['status'].'-body'; ?>" class="collapse <?php
            if ($status['status'] == $getStatus) {
                echo 'show';
            }
                                                                  ?>" role="tabpanel" aria-labelledby="<?php echo $status['status'].'-heading'; ?>">
            <div class="u-accordion__body g-bg-gray-light-v5 g-px-5 g-py-5">
                <ul class="nav flex-column u-nav-v3-1" role="tablist" data-target="nav-3-1-default-ver-default-icons" data-tabs-mobile-type="slide-up-down" data-btn-classes="btn btn-md btn-block rounded-0 u-btn-outline-lightgray">

                    <?php

            $applicants = $db -> sql_select("SELECT application_id, charName, charClass, charSpec, status FROM stormguild.application WHERE create_datetime > date_sub(now(), interval 3 month) and status = '".$status['status']."' order by application_id desc");

            foreach ($applicants as $applicant) {

                if ($applicant['application_id'] == $app_id) {
                    $active = " active g-color-blue";
                } else {
                    $active = "";
                }

                $character = $applicant['charName'].' - '.$applicant['charSpec'].' '.$applicant['charClass']
                    ?>

                    <li class="nav-item">
                        <a
                           class="nav-link <?php echo $active; ?>"
                           href="admin.php?mode=application&appid=<?php echo $applicant['application_id']; ?>&status=<?php echo $status['status']; ?>">
                            <?php echo $character; ?>
                        </a>
                    </li>

                    <?php

            }

                    ?>
                </ul>
            </div>
        </div>
    </div>
    <?php
        }
    }
    ?>



</div>
