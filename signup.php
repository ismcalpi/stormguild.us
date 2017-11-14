<!DOCTYPE html>
<html lang="en">

    <?php include 'include/head.php' ?>

    <body class="main-body">

        <?php include 'include/navbar.php' ?>

        <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $db = new db;

        if (empty($_POST['user_signup'])) {
            $usernameERR = 'This is a required field.';
        } else if (!ctype_alnum($_POST['user_signup'])) {
            $usernameERR = 'No special characters allowed.';
        } else {
            $userDupe = $db -> query("SELECT Username FROM stormguild.users WHERE username ='".$_POST['user_signup']."'");
            $userDupe = $userDupe -> num_rows;
            if ($userDupe > 0) {
                $usernameERR = 'Username already exists.';
            } else {
                $username = $_POST['user_signup'];
            }
        }

        if (empty($_POST['email_signup'])) {
            $emailERR = 'This is a required field.';
        } else if (!filter_var($_POST['email_signup'], FILTER_VALIDATE_EMAIL)) {
            $emailERR = 'Invalid E-Mail Address.';
        } else {
            $emailDupe = $db -> query("SELECT email FROM stormguild.users WHERE email ='".$_POST['email_signup']."'");
            $emailDupe = $emailDupe -> num_rows;
            if ($emailDupe > 0) {
                $emailERR = 'Email already exists.';
            } else {
                $email = $_POST['email_signup'];
            }
        }

        if (empty($_POST['email_check'])) {
            $email_checkERR = 'This is a required field.';
        } else if ($_POST['email_check'] != $_POST['email_signup']) {
            $email_checkERR = 'E-Mail addresses do not match.';
        } else {
            $email_check = TRUE;
        }

        if (empty($_POST['password_signup'])) {
            $passwordERR = 'This is a required field.';
        } else {
            $password = password_hash($_POST['password_signup'], PASSWORD_DEFAULT);
        }

        if (empty($_POST['password_check'])) {
            $password_checkERR = 'This is a required field.';
        } else if ($_POST['password_check'] != $_POST['password_signup']) {
            $password_checkERR = 'Passwords do not match.';
        } else {
            $password_check = TRUE;
        }

        if (ISSET($username) && ISSET($email) && ISSET($email_check) && ISSET($password) && ISSET($password_check)) {
            #Everything looks good, lets add the user to the DB and alert with success.

            $db -> query("INSERT INTO stormguild.users (user_id,username,password,email,remember_me,picture,user_rank) 
                                VALUES (NULL,'".$username."','".$password."','".$email."',NULL,NULL,'applicant')");
            $msgSuccess = 'Your account has been successfully created! Redirecting back to the home page.';
            
            header('Refresh: 2; URL = index.php');
        }

    }

        ?>

        <main>
            <!-- Signup -->
            <section class="g-min-height-100vh g-flex-centered">
                <div class="container g-py-50">

                    <div class="row justify-content-center">
                        <div class="col-sm-10 col-md-9 col-lg-6">

    <?php if (!empty($msgSuccess)) { 
    echo '<div class="alert alert-dismissible fade show g-bg-primary g-color-white rounded-0" role="alert">
                <button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>

                <div class="media">
                    <span class="d-flex g-mr-10 g-mt-5">
                        <i class="icon-check g-font-size-25"></i>
                    </span>

                    <span class="media-body align-self-center">
                        '.$msgSuccess.'
                    </span>
              </div>

            </div>'; } ?>

                            <div class="u-shadow-v24 g-bg-white rounded g-py-40 g-px-30">
                                <!-- Form -->
                                <form class="g-py-15" method="post">
                                    <div class="mb-4">
                                        <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Username</label>
                                        <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15" 
                                               <?php if (!empty($_POST['user_signup'])) {echo 'value="'.$_POST['user_signup'].'"'; } ?>
                                               name="user_signup" type="text" placeholder="Bearjo">
                                        <?php if (!EMPTY($usernameERR)) { echo '<small class="form-control-feedback g-color-red">'.$usernameERR.'</small>'; } ?>
                                    </div>

                                    <div class="mb-4">
                                        <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Email:</label>
                                        <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15" 
                                               <?php if (!empty($_POST['email_signup'])) {echo 'value="'.$_POST['email_signup'].'"';} ?>
                                               name="email_signup" type="email" placeholder="johndoe@gmail.com">
                                        <?php if (!EMPTY($emailERR)) { echo '<small class="form-control-feedback g-color-red">'.$emailERR.'</small>'; } ?>
                                    </div>

                                    <div class="mb-4">
                                        <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Confirm Email:</label>
                                        <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15"
                                               <?php if (!empty($_POST['email_check'])) {echo 'value="'.$_POST['email_check'].'"';} ?>
                                               name="email_check" type="email" placeholder="johndoe@gmail.com">
                                        <?php if (!EMPTY($email_checkERR)) { echo '<small class="form-control-feedback g-color-red">'.$email_checkERR.'</small>'; } ?>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 mb-4">
                                            <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Password:</label>
                                            <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15" 
                                                   <?php if (!empty($_POST['password_signup'])) {echo 'value="'.$_POST['password_signup'].'"';} ?>
                                                   name="password_signup" type="password" placeholder="Password">
                                            <?php if (!EMPTY($passwordERR)) { echo '<small class="form-control-feedback g-color-red">'.$passwordERR.'</small>'; } ?>
                                        </div>

                                        <div class="col-xs-12 col-sm-6 mb-4">
                                            <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Confirm Password:</label>
                                            <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15"
                                                   <?php if (!empty($_POST['password_check'])) {echo 'value="'.$_POST['password_check'].'"';} ?>
                                                   name="password_check" type="password" placeholder="Password">
                                            <?php if (!EMPTY($password_checkERR)) { echo '<small class="form-control-feedback g-color-red">'.$password_checkERR.'</small>'; } ?>
                                        </div>
                                    </div>

                                    <div class="row justify-content-between mb-5">
                                        <div class="col-8 align-self-center">

                                        </div>
                                        <div class="col-4 align-self-center text-right">
                                            <button class="btn btn-md u-btn-primary rounded g-py-13 g-px-25" type="submit" >Signup</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- End Form -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Signup -->
        </main>

        <div class="u-outer-spaces-helper"></div>

        <?php include 'include/scripts.php' ?>

    </body>

</html>
