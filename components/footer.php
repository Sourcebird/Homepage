<?php
  $realPath = substr(str_replace('\\', '/', realpath(dirname(dirname(__FILE__)))), strlen(str_replace('\\', '/', realpath($_SERVER['DOCUMENT_ROOT']))));
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">

		<link rel="stylesheet" type="text/css" href="<?php echo $realPath ?>/css/master.css">
		<link rel="stylesheet" type="text/css" href="<?php echo $realPath ?>/css/footer.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:500&display=swap">
	</head>

	<!-- -- BODY -- -->
	<body>
    	<footer>
			<div class="fluid-div footer-legal-wrapper">
				<div class="footer-content-wrapper">
					<ul>
						<li><a href="index.php#ContactUs">Contact</a></li>
						<li><a href="legal.php#LegalNotice">Legal Notice</a></li>
						<li><a href="legal.php#TermsOfUse">Terms of Use</a></li>
						<li><a href="legal.php#PrivacyPolicy">Privacy Policy</a></li>
						<li><a href="legal.php#CookieSettings">Cookie Settings</a></li>
					</ul>
				</div>
			</div>
		</footer>
	</body>
</html>
