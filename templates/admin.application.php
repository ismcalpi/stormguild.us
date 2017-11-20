<!DOCTYPE html>

<?php
    
    ob_start();
    session_start();
    
    if (!empty($_GET['access_id'])) {
        
    } else {

        if (EMPTY($_SESSION['user_rank'])) {
            #You shouldn't be seeing this page then!
            header('Refresh: 1; URL = index.php');
            echo "access denied";
            exit();
        } else if ($_SESSION['user_rank'] != 'admin' && $_SESSION['user_rank'] != 'raider') {
            #You shouldn't be seeing this page then!
            header('Refresh: 1; URL = index.php');
            echo "access denied";
            exit();
        }
    }

?>

<html lang="en">

    <?php include 'include/head.php' ?>

    <body class="main-body" >

        <main>

            <?php include 'include/navbar.php' ?>
            
            <?php $db = new db; ?>

            <!-- Main Page Container -->
            <div class="container main-container g-px-30 g-mt-50">
                <h1>Storm Raider Applications</h1>
                <hr />
                <div class="row">
                    <div class="col-sm-3 g-brd-right g-brd-black">
                        <?php if(empty($_GET['access_id'])) { 
                                include 'include/appNav.php';
                            } else {
                                $results = $db -> select("SELECT charName, application_id FROM stormguild.application WHERE access_id = '".$_GET['access_id']."' LIMIT 1");
                                if(!empty($results)) {
                                    foreach ($results as $result) {
                                        $app_id = $result['application_id'];
                                        $app_uid = $result['charName'];
                                    }
                                }
                            } ?>
                    </div>
                    <div class="col-sm-9 g-pa-30">
                        <?php include 'include/appBody.php' ?>
                        <?php include 'include/appComments.php' ?>
                    </div>
                </div>

            </div>    
        </main>

        <?php include 'include/scripts.php' ?>

        <!-- JS Unify -->
        <script  src="assets/js/components/hs.tabs.js"></script>

        <!-- JS Plugins Init. -->

        <script >

            $(document).on('ready', function () {

                // initialization of tabs
                $.HSCore.components.HSTabs.init('[role="tablist"]');
                
                // initialization of countdowns
			     $.HSCore.components.HSPopup.init('.js-fancybox');

            });

            $(window).on('resize', function () {

                setTimeout(function () {
                    $.HSCore.components.HSTabs.init('[role="tablist"]');
                }, 200);

            });

        </script>

    </body>



</html>