<?php

define('TITLE', "Login");
include dirname(__FILE__).'\../../components/header.php';
check_logged_out();

?>

    <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../assets/css/login.css">
		<link rel="stylesheet" href="../assets/css/app.css">
	</head>

<div class="container">
    <div class="content-wrapper">
        <div class="inner-content-wrapper">

                <?php if (isset($_GET['selector']) && isset($_GET['validator'])) { ?>

                    <form class="form-auth" action="includes/reset.inc.php" method="post">

                        <?php
                            insert_csrf_token();

                            $selector = $_GET['selector'];
                            $validator = $_GET['validator'];
                        ?>

                        <input type="hidden" name="selector" value="<?php echo $selector; ?>">
                        <input type="hidden" name="validator" value="<?php echo $validator; ?>">

                        <div class="text-center">
                            <img class="logo" src="https://via.placeholder.com/130x130.png?text=Page+under+Development" alt="" width="130" height="130">
                        </div>

                        <h6 class="header-description">Reset password</h6>


                        <div class="div-infotext">
                            <small class="header-infotext">
                                <?php
                                    if (isset($_SESSION['STATUS']['resetsubmit']))
                                        echo $_SESSION['STATUS']['resetsubmit'];

                                ?>
                            </small>
                            <a class="header-warningtext">
                                <?php
                                    if (isset($_SESSION['ERRORS']['passworderror']))
                                        echo $_SESSION['ERRORS']['passworderror'];
                                ?>
                            </a>
                        </div>


                        <div class="form-group">
                            <input type="password" id="newpassword" name="newpassword" class="form-input" placeholder="New Password" autocomplete="new-password">
                        </div>

                        <div class="form-group">
                            <input type="password" id="confirmpassword" name="confirmpassword" class="form-input" placeholder="Confirm Password" autocomplete="new-password">
                        </div>

                        <button class="btn-submit-form" type="submit" value="resetsubmit" name="resetsubmit">
                            Reset Password
                        </button>

                        <p class="mt-4 mb-3 text-muted text-center">
                            <a href="https://github.com/msaad1999/PHP-Login-System" target="_blank">
                                Login System
                            </a> | 
                            <a href="https://github.com/msaad1999/PHP-Login-System/blob/master/LICENSE" target="_blank">
                                MIT License
                            </a>
                        </p>

                    </form>

                <?php } else { ?>

                    <form class="form-auth" action="includes/sendtoken.inc.php" method="post">

                        <?php insert_csrf_token(); ?>

                        <div class="text-center">
                        <img class="logo" src="https://via.placeholder.com/130x130.png?text=Page+under+Development" alt="" width="130" height="130">
                        </div>

                        <h6 class="header-description">Reset password</h6>

                        <div class="text-center mb-3">
                            <small class="header-infotext">
                                <?php
                                    if (isset($_SESSION['STATUS']['resentsend']))
                                        echo $_SESSION['STATUS']['resentsend'];

                                ?>
                            </small>
                        </div>

                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" id="email" name="email" class="form-input" placeholder="Email" required autofocus>
                            <sub class="text-danger">
                                <?php
                                    if (isset($_SESSION['ERRORS']['emailerror']))
                                        echo $_SESSION['ERRORS']['emailerror'];
                                ?>
                            </sub>
                        </div>

                        <button class="btn-submit-form" type="submit" value="resentsend" name="resentsend">
                            Send Password Reset Link
                        </button>

                        <p class="mt-4 mb-3 text-muted text-center">
                            <a href="../login">
                                back to login
                            </a>
                        </p>

                    </form>

                <?php } ?>
                    
                    
            
        </div>
        <div class="col-sm-4">

        </div>
    </div>
</div>


<?php

include '../assets/layouts/footer.php'

?>