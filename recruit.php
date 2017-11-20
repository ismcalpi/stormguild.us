<!DOCTYPE html>
<html lang="en">

    <?php include 'include/head.php' ?>

    <body class="main-body mt-body-sm">
        <main>

            <?php include 'include/navbar.php' ?>
            <section class="dzsparallaxer auto-init height-is-based-on-content use-loading mode-scroll" data-options="{direction: 'reverse', settings_mode_oneelement_max_offset: '150'}">
                <div class="divimage dzsparallaxer--target w-100 g-bg-size-cover u-bg-overlay g-bg-black-opacity-0_5--after" style="height: 110%; background: url(img/1920x800/wow02.jpg)"></div>

                <div class="container text-center g-color-white g-py-200--md g-py-80">

                    <h2 class="text-uppercase g-font-weight-700 g-mb-20">Storm is Recruiting!</h2>

                    <p class="lead g-px-100--md g-mb-20">Seeking the classes and specs outlined below but always interested in exceptional applicants.</p>

                    <div class="container bg-black-0-70 g-pa-15">
                        <div class="row">

                            <?php include 'include/classRecruit.php' ?>

                        </div>
                    </div>

                    <div class="g-hidden-md-up"></div>
                    <a href="#application" class="btn btn-xl u-btn-primary text-uppercase g-font-weight-600 g-font-size-12 g-rounded-50 g-my-30">Apply Now!</a>
                    <!-- <div style="margin:100px;"></div> -->

                </div>
            </section>

            <div id="application" class="g-mb-40"></div>

            <div class="container g-pa-0 g-my-20 u-shadow-v1-5 g-line-height-2">
                <div class="row">
                    <div class="col-lg-12">
                        <?php include 'include/recruitApp.php' ?>
                    </div>
                </div>
            </div>

        </main>

        <?php include 'include/scripts.php' ?>

        <!-- JS Implementing Plugins -->
        <script  src="assets/vendor/jquery.filer/js/jquery.filer.min.js"></script>

        <!-- JS Unify -->
        <script  src="assets/js/helpers/hs.focus-state.js"></script>
        <script  src="assets/js/components/hs.file-attachement.js"></script>

        <!-- JS Plugins Init. -->
        <script >
            $(document).on('ready', function () {

                // initialization of forms
                $.HSCore.components.HSFileAttachment.init('.js-file-attachment');
                $.HSCore.helpers.HSFocusState.init();

            });
        </script>


    </body>

</html>