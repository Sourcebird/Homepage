<?php

define('TITLE', "Login");
require realpath($_SERVER['DOCUMENT_ROOT']).'/components/header.php';
check_logged_out();

?>

<!--
<link rel="stylesheet" href="../assets/vendor/bootstrap-4.3.1/css/bootstrap.css">
<link rel="stylesheet" href="../assets/vendor/fontawesome-5.12.0/css/all.min.css">
!-->

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../assets/css/login.css">
		<link rel="stylesheet" href="../assets/css/app.css">
	</head>
	
<div class="container">
    <div class="content-wrapper">

        <div class="inner-content-wrapper">
            <form class="form-auth" action="includes/login.inc.php" method="post">

                <?php insert_csrf_token(); ?>

                <div class="text-center">
                <img class="logo" src="https://via.placeholder.com/130x130.png?text=Page+under+Development" alt="" width="130" height="130">
                </div>

                <h6 class="header-description">Login to your Account</h6>

                <div class="div-infotext">
                    <small class="header-infotext">
                        <?php
                            if (isset($_SESSION['STATUS']['loginstatus']))
                                echo $_SESSION['STATUS']['loginstatus'];
						?>
					</small>
					<a class="header-warningtext">
						<?php
							if (isset($_SESSION['ERRORS']['nouser']) ||
								isset($_SESSION['ERRORS']['wrongpassword'])){
								echo "Wrong Username or Password!";
							}

                        ?>
                    </a>
                </div>

                <div class="form-group">
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" id="username" name="username" class="form-input" placeholder="Username" required autofocus>
                    <sub class="text-danger">
                    </sub>
                </div>

                <div class="form-group">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" id="password" name="password" class="form-input" placeholder="Password" required>
                    </sub>
                </div>

                <div class="rememberme-group">
                    <div class="rememberme-group-inner">
                        <input type="checkbox" class="checkbox-rememberme" id="rememberme" name="rememberme">
                        <label class="label-rememberme" for="rememberme">Remember me</label>
                    </div>
                </div>

                <button class="btn-submit-form" type="submit" value="loginsubmit" name="loginsubmit">Login</button>

                <p class="mt-3 text-muted text-center"><a href="../reset-password/">forgot password?</a></p>

            </form>
        </div>
        <div class="col-sm-4">

        </div>
    </div>
</div>


<?php

include '../assets/layouts/footer.php'

?>