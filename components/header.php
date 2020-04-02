<?php
  $realPath = substr(str_replace('\\', '/', realpath(dirname(dirname(__FILE__)))), strlen(str_replace('\\', '/', realpath($_SERVER['DOCUMENT_ROOT']))));

  session_start();

  require realpath($_SERVER['DOCUMENT_ROOT']).'/user/assets/setup/env.php';
  require realpath($_SERVER['DOCUMENT_ROOT']).'/user/assets/setup/db.inc.php';
  require realpath($_SERVER['DOCUMENT_ROOT']).'/user/assets/includes/auth_functions.php';
  require realpath($_SERVER['DOCUMENT_ROOT']).'/user/assets/includes/security_functions.php';

  if (isset($_SESSION['auth']))
    $_SESSION['expire'] = ALLOWED_INACTIVITY_TIME;

  generate_csrf_token();
  check_remember_me();


  $sql = "SELECT SUM(`code_lines`) FROM `projects`";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		$_SESSION['ERRORS']['sqlerror'] = 'SQL ERROR';
		header("Location: ../error/404/");
		exit();
	}
	else {

		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		if ($row = mysqli_fetch_assoc($result)) {
       $_SESSION['stats']['code_lines'] = $row['SUM(`code_lines`)'];
    }
  }
 ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="<?php echo $realPath ?>/user/assets/vendor/fontawesome-5.12.0/css/all.min.css">

		<link rel="stylesheet" type="text/css" href="<?php echo $realPath ?>/css/master.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $realPath ?>/css/header.css">

		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:500&display=swap">
	</head>


	<body>
        <header id="header">
        	<nav>
        		<ul class="mobile-hide" id="navbar">
        			<li><a id="header-a" href="<?php echo $realPath?>/#">Home</a></li>
        			<li><a id="header-a" href="<?php echo $realPath?>/#Projects">Projects</a></li>
					<li><a id="header-a" href="<?php echo $realPath?>/#About">About</a></li>
					<li><a id="header-a" href="<?php echo $realPath?>/#ContactUs">Contact Us</a></li>
        		</ul>
        		<ul id="user">
				<?php if (!check_logged_in_boolean()) { ?>
						<li id='signup'><a id="header-a" class="signup" href='<?php echo $realPath ?>/user/register/'>Signup</a></li>
						<li id='login'><a id="header-a" href='<?php echo $realPath ?>/user/login/'>Login</a></li>
				<?php } else { ?>
						<li class="profile-header-dropdown">

							<button class="profile-header-dropbtn transition200ms" id="profile-header-dropdown-button" onclick="openProfileTab()">
                <div class="profile-header-img" style="background-image: url('<?php echo $realPath ?>/user/assets/uploads/users/<?php echo $_SESSION['profile_image'] ?>')">
              </button>

              <div id="profile-header-dropdown-content-id" class="profile-header-dropdown-content">
                <a href="<?php echo $realPath ?>/user/profile"><i class="fa fa-user pr-2"></i> Profile</a>
                <a href="<?php echo $realPath ?>/user/profile-edit"><i class="fa fa-pencil-alt pr-2"></i> Edit Profile</a>
                <a href="<?php echo $realPath ?>/user/logout"><i class="fa fa-running pr-2"></i> Logout</a>
              </div>

            </li>
				<?php } ?>
        		</ul>

				<ul class="mobile-unhide" id="threelines">
        			<li class="threelines-header-dropdown">

                <button class="threelines-header-dropbtn transition200ms" id="threelines-header-dropdown-button" onclick="openMobileMenu()">
                  <div class="threelines-header-img transition200ms" style="background-image: url('<?php echo $realPath ?>/img/header/threelines.png')"></div>
                </button>

                <div id="threelines-header-dropdown-content-id" class="threelines-header-dropdown-content">
                  <a href="<?php echo $realPath ?>/#"><i class="fa fa-user pr-2"></i>   Home</a>
                  <a href="<?php echo $realPath ?>/#Projects"><i class="fa fa-pencil-alt pr-2"></i>   Projects</a>
				          <a href="<?php echo $realPath ?>/#About"><i class="fa fa-user pr-2"></i>   About</a>
                </div>
					    </li>
        		</ul>

        	</nav>
        </header>
	</body>
</html>

<script>
function openProfileTab() {
  document.getElementById("profile-header-dropdown-content-id").classList.toggle("show");
}
function openMobileMenu(){
  document.getElementById("threelines-header-dropdown-content-id").classList.toggle("show");
}

window.onclick = function(event) {
  matches = event.target.matches ? event.target.matches('.profile-header-img') : event.target.msMatchesSelector('.profile-header-img');

  if (!matches) {
    var dropdowns = document.getElementsByClassName("profile-header-dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }

  matches = event.target.matches ? event.target.matches('.threelines-header-img') : event.target.msMatchesSelector('.threelines-header-img');
  if (!matches) {
    var dropdowns = document.getElementsByClassName("threelines-header-dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>