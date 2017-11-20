<?php

    include 'include/db.php';

    ob_start();
    session_start();

		if (!empty($_POST['username']) && !empty($_POST['password'])){

          $db = new db;

          $login = $db -> select_single("SELECT * FROM stormguild.users where (username='".$_POST['username']."' OR email='".$_POST['username']."')");

          #add a check to see if we get multiple rows, if so then throw error.
          if ($login == false) {
              $msg ="Error: Too many results returned. Contact Website Admin to Resolve.";
          } else {
            if (password_verify($_POST['password'],$login['password'])) {

              $_SESSION['valid'] = true;
              $_SESSION['timeout'] = time();
              $_SESSION['username'] = $login['username'];
              $_SESSION['user_rank'] = $login['user_rank'];

              $msg = 'Successfully Logged In as '.$login['username'];

							if(!empty($_POST['remember']) && $_POST['remember'] == 'yes') {
								setcookie('username', $login['username'], time() + (86400 * 30), "/");
								setcookie('user_rank', $login['user_rank'], time() + (86400 * 30), "/");
							}

             }else {
                  $msg = 'Incorrect Username or Password.';
             }
          }
      }

        echo $msg;
        header('Refresh: 1; URL = index.php');

	?>
