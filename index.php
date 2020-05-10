<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="sourcebird, SourceBird, HTML, CSS, PHP, open, source, programming, free">
		<meta name="description" content="Open-Source Software made in Germany.">

		<link rel="stylesheet" type="text/css" href="css/anchors.css">
		<link rel="stylesheet" type="text/css" href="css/master.css">
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:500&display=swap">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
		<title>SourceBird | Home</title>
	</head>

	<!------------- BODY ------------->
	<body>
		<!------------- HEADER ------------->
		<?php require realpath($_SERVER['DOCUMENT_ROOT']).'/components/header.php';?>


		<!------------- HOME-SECTION ------------->

		<div class="div-wrapper home-div">
			<div class="fluid-div">
				<div class="influid-half">
					<div class="headline home-headline">
						<h1>Source<span class="signature-color">Bird</span></h1>
						<h2>Open-Source made in <span class="signature-color">Germany</span></h2>
					</div>
				</div>

				<div class="influid-half">
					<img>
				</div>
			</div>
		</div>


		<!------------- STATISTICS-PANEL ------------->

		<div id="statistics-panel">
			<div class="stat-item">
				<h3>2</h3>
				<h4>projects</h4>
			</div>
			<div class="stat-item">
				<h3>0</h3>
				<h4>downloads</h4>
			</div>
			<div class="stat-item">
				<h3><?php echo $_SESSION['stats']['code_lines'] ?></h3>
				<h4>lines of code</h4>
			</div>
			<div class="stat-item">
				<h3>0</h3>
				<h4>users</h4>
			</div>
		</div>


		<!------------- PROJECTS-PANEL ------------->

		<div class="div-wrapper section">
			<a class="anchor anchor-projects" id="Projects"></a>
			<div class="fluid-div">

				<div class="headline">
					<h2 class="headline-h2">Projects</h2>

					<a class="headline-link-wrapper" href="#">
						<span id="text" class="headline-link">Browse all projects</span>
						<span id="arrow" class="headline-link">&#187;</span>
					</a>

				</div>

				<div class="project-wrapper">

					<div class="project-item">
						<div class="project-item-container">
							<div class="project-title no-spacing">
								<h3>SourceBird Homepage</h3>
								<p class="item-date">
									04 March 2020  |   <a class="item-tag tag-plang plang-php" href="#" target="_blank">PHP</a>
								</p>
							</div>
							<div class="project-thumbnail">
								<img src="https://via.placeholder.com/444x320.png?text=Page+under+Development" alt="Project"
									width="300" height="340">
							</div>
							<div class="project-description no-spacing">
								<p>
									The source-repo for our homepage.
									Explore changes we make to our website before they go live or grab the sourcecode of the latest or older versions!
								</p>
							</div>
							<div class="project-link">
								<a class="fillbutton project-learnmore" href="pages/project/?project_id=1">LEARN MORE</a>
							</div>
						</div>
					</div>

					<div class="project-item">
						<div class="project-item-container">
							<div class="project-title no-spacing">
								<h3>E.M.M.A.</h3>
								<p class="item-date">
									01/01/2020  |   <a class="item-tag tag-plang plang-csharp" href="#" target="_blank">C#</a>
								</p>
							</div>
							<div class="project-thumbnail">
								<img src="https://via.placeholder.com/444x320.png?text=Page+under+Development" alt="Project"
									width="300" height="340">
							</div>
							<div class="project-description no-spacing">
								<p>EMMA (Elder Scrolls Online Multi Management Application or former called DesoLib) is a tool written by Dimitri back in his ESO days
									to keep track of Dungeon/Trial Achievements.
								</p>
							</div>
							<div class="project-link">
								<a class="fillbutton project-learnmore" href="pages/project/?project_id=2">LEARN MORE</a>
							</div>
						</div>
					</div>

					<div class="project-item">
						<div class="project-item-container">
							<div class="project-title no-spacing">
								<h3>Flicker</h3>
								<p class="item-date">
									08 May 2020  |   <a class="item-tag tag-plang plang-csharp" href="#" target="_blank">C#</a>
								</p>
							</div>
							<div class="project-thumbnail">
								<img src="https://via.placeholder.com/444x320.png?text=Page+under+Development" alt="Project"
									width="300" height="340">
							</div>
							<div class="project-description no-spacing">
								<p> Flicker is a text-based puzzle game written in C# with Unity Engine. Goal of the game is
									interacting with objects in order to find a solution for creative puzzles and reach the end of the game.
								</p>
							</div>
							<div class="project-link">
								<a class="fillbutton project-learnmore" href="pages/project/?project_id=1">LEARN MORE</a>
							</div>
						</div>
					</div>

					<div class="project-item">
						<div class="project-item-container">
							<div class="project-title no-spacing">
								<h3>Project Name</h3>
								<p class="item-date">
									01/01/2020  |   <a class="item-tag tag-plang plang-csharp" href="#" target="_blank">C#</a>
								</p>
							</div>
							<div class="project-thumbnail">
								<img src="https://via.placeholder.com/444x320.png?text=Page+under+Development" alt="Project"
									width="300" height="340">
							</div>
							<div class="project-description no-spacing">
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
									Dolorum vel reiciendis velit id iure atque assumenda aut esse eos tempore nulla,
								</p>
							</div>
							<div class="project-link">
								<a class="fillbutton project-learnmore" href="pages/project/?project_id=2">LEARN MORE</a>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>


		<!------------- ABOUT-PANEL ------------->

		<div class="div-wrapper section">
			<a class="anchor anchor-about" id="About"></a>
			<div class="fluid-div">
				<div class="headline">
					<h2 class="headline-h2">About</h2>

					<a class="headline-link-wrapper" href="#">
						<span id="text" class="headline-link">Read more</span>
						<span id="arrow" class="headline-link">&#187;</span>
					</a>

				</div>

				<div class="about-wrapper subwrapper">
					<h3><span class="signature-color">We</span> are SourceBird</h3>
					<p>Our goal with SourceBird and the projects we create under this name is to improve our Skills and share our experiences with
						<span class="signature-color">you</span> so everyone can benefit from our progress and learn how to programm without
						having to pay for tutorials or semi-free courses.</p>
					<br>
					<p>To shorten it we want to share Software and Source-Codes for <span class="signature-color">free</span></p>
					<br>
					<p><span class="signature-color">NOTICE</span> This text is still a work in progress. Feel free to leave suggestions in the form below!</p>
				</div>
			</div>
		</div>


		<!------------- CONTACT-US-PANEL ------------->

		<div class="div-wrapper section">
			<a class="anchor anchor-contactus" id="ContactUs"></a>
			<div class="fluid-div">
				<div class="headline">
					<h2 class="headline-h2">Contact us</h2>

					<a class="headline-link-wrapper" href="#">
						<span id="text" class="headline-link">Or contact support</span>
						<span id="arrow" class="headline-link">&#187;</span>
					</a>
				</div>

				<div class="contactus-wrapper subwrapper contactus-header">
					<div class="contactus-headline">
						<h3>Let us know what you think!</h3>
						<p>Especially during development we really care about your opinion and appreciate any honest feedback.</p>
					</div>
				</div>

				<div class="contactus-wrapper subwrapper">
					<form class="contact-form" method="post" action="">
						<input type="text" name="form_mail" tabindex="1" placeholder="Email" required>
						<input type="text" name="form_subject" tabindex="2" placeholder="Subject" required>
						<select class="" name="form_topic" tabindex="3" required>
							<option value="" disable selected hidden>Choose a category</option>
							<option value="">Suggestion</option>
							<option value="">Bug Report</option>
							<option value="">Question</option>
							<option value="">Complaint</option>
						</select>
						<textarea name="form_message" rows="8" cols="80" tabindex="4" placeholder="Message" required></textarea>
						<input type="submit" name="form_send" tabindex="5" value="SEND">
						<p class="agreement-text">by clicking send you agree to our
							<a href="legal.php#TermsOfUse" target="_blank">terms of use</a> and
							<a href="legal.php#PrivacyPolicy" target="_blank">privacy policy</a>
						</p>
					</form>
				</div>
			</div>
		</div>


		<!------------- FOOTER ------------->
		<?php include_once 'components/footer.php'; ?>
	</body>
	<!------------- /BODY ------------->
</html>
