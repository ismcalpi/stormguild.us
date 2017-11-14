<?php

        include 'include/db.php';

		if (!empty($_POST['username']) && !empty($_POST['password'])){

          $db = new db;

          $login = $db -> query("SELECT * FROM stormguild.users where (username='".$_POST['username']."' OR email='".$_POST['username']."')");

          $intRows = $login -> num_rows;

          #add a check to see if we get multiple rows, if so then throw error.
          if ($intRows > 1) {
              $msg ="Error: Too many results returned. Contact Website Admin to Resolve.";
          } else {
              foreach ($login as $password) {
               if (password_verify($_POST['password'],$password['password'])) {

                $_SESSION['valid'] = true;
                $_SESSION['timeout'] = time();
                $_SESSION['username'] = $password['username'];
                $_SESSION['user_rank'] = $password['user_rank'];
                $msg = 'Successfully Logged In!';

								if(!empty($_POST['remember']) && $_POST['remember'] == 'yes') {
									setcookie('username', $password['username'], time() + (86400 * 30), "/");
									setcookie('user_rank', $password['user_rank'], time() + (86400 * 30), "/");
								}

               }else {
                    $msg = 'Incorrect Username or Password.';
               }
              }
          }
        }

        echo $msg;
        header('Refresh: 1; URL = index.php');

	?>
