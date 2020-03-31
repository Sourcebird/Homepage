
<!------------- HEADER ------------->
<?php 

include_once '../../components/header.php';


if (isset($_GET['project_id'])) {

	/* -------------------------------------------------------------------------------
	*   Securing against Header Injection
	*/
	foreach($_GET as $key => $value){

		$_GET[$key] = _cleaninjections(trim($value));
	} 

	/* -------------------------------------------------------------------------------
	*   Verifying CSRF token

	if (!verify_csrf_token()){

		$_SESSION['STATUS']['signupstatus'] = 'Request could not be validated';
		header("Location: ../");
		exit();
	}*/

	$project_id = intval($_GET['project_id']);

	$sql = "SELECT * FROM projects WHERE id=?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		$_SESSION['ERRORS']['sqlerror'] = 'SQL ERROR';
		header("Location: ../error/404/");
		exit();
	}
	else {

		mysqli_stmt_bind_param($stmt, "s", $project_id);
		mysqli_stmt_execute($stmt);

		$result = mysqli_stmt_get_result($stmt);

		if ($row = mysqli_fetch_assoc($result)) {
			$project = array(
				"id" => $row['id'],
				"name" => $row['name'],
				"creator" => $row['creator'],
				"creator_profile_url" => $row['creator_profile_url'],
				"img" => $row['img'],
				"short_description" => $row['short_description'],
				"title" => $row['title'],
				"long_description" => $row['long_description'],
				"project_title" => $row['project_title'],
				"updated_at" => $row['updated_at'],
				"created_at" => $row['created_at'],
			);


		

?>
<!--
<div style="background-color: red; width: 100%; height: 100px"></div>-->

<?php
// FOR DEBUGGING ONLY!

?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $project['name'] ?> | SourceBird </title>
		
		<link rel="stylesheet" type="text/css" href="../../css/master.css">
		<link rel="stylesheet" type="text/css" href="../../css/project.css">
	</head>

	<!------------- BODY ------------->
	<body">
		
		<main class="project-page">
			<div class="div-wrapper" style="padding-top: 90px; background: white;">
				<div class="fluid-div padding10">
					<div class="project-head">
						<div class="project-logo">
							<img src="<?php echo $project['img'] ?>" alt="img" style="display: inline-block; width: 120px; height: 120px">
						</div>
						<div class="project-data" style="display: inline-block; height: 120px; vertical-align: baseline;">
							<h2><?php echo $project['name'] ?></h2>
							<p>By <a href="<?php echo $project['creator_profile_url'] ?>" target="_blank" class="signature-color"><?php echo $project['creator'] ?></a> | last updated <?php echo $project['updated_at'] ?></p>
							<p><?php echo $project['short_description'] ?></p>
						</div>
					</div>
					
				</div>
			</div>

			<div class="div-wrapper">
				<div class="fluid-div padding10">
					<div class="project-wrapper">
						<div class="content wrapper-item tab-wrapper">
							<div class="tab">
								<button class="tablinks" onclick="openTab(event, 'Overview')" id="defaultOpen">Overview</button>
								<button class="tablinks" onclick="openTab(event, 'Changes')">Changes</button>
								<button class="tablinks" onclick="openTab(event, 'Bugs')">Bugs</button>
								<button class="tablinks" onclick="openTab(event, 'Downloads')">Downloads</button>
								<button class="tablinks" onclick="openTab(event, 'Comments')">Comments</button>
							</div>

							<div id="Overview" class="tabcontent">
								<h2><?php echo $project['title'] ?></h2>
								<p><?php echo $project['long_description'] ?></p>
								<h2>License</h2>
								<p>text</p>
							</div>

							<div id="Changes" class="tabcontent scrollview">
								<div class="changelog-item">

								</div>
							</div>

							<div id="Bugs" class="tabcontent scrollview">
								
							</div>

							<div id="Downloads" class="tabcontent scrollview">
								
							</div>

							<div id="Comments" class="tabcontent scrollview">
								
							</div>

							<div id="Template" class="tabcontent">

							</div>
						</div>
						
						<div class="sidebar wrapper-item">
							<div class="sidebar-item">
								<h3>Download Latest</h3>
								<div class="download-wrapper">
									<a class="download-item fillbutton" href="" target="_BLANK">DIRECT</a>
									<a class="download-item fillbutton" href="" target="_BLANK">ALL</a>
								</div>
							</div>
								
							<div class="sidebar-item">
								<div class="sourcerepo-wrapper">
									<h3>Source Repository</h3>
									<p>Github</p>
									<a href="https://github.com/Sourcebird/Homepage">/Sourcebird/Homepage</a>
								</div>
							</div>
								
							<div class="sidebar-item">
								<h3>Involved People</h3>
								<div class="team-wrapper">

									<div class="team-item">
										<a class="team-link" href="https://github.com/sourcebird-dimitri" target="_BLANK">
											<img src="https://placehold.it/125x125" alt="">
											<p><span class="signature-color">[SB]</span>Dimitri</p>
										</a>
									</div>

									<div class="team-item">
										<a class="team-link" href="https://github.com/sourcebird-marvin" target="_BLANK">
											<img src="https://placehold.it/125x125" alt="">
											<p><span class="signature-color">[SB]</span>Marvin</p>
										</a>
									</div>

								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
			<script src="tabcontroller.js"></script>
			<script>
				document.getElementById("defaultOpen").click();
			</script>
		</main>
		
		<!------------- FOOTER ------------->
		<?php include_once '../../components/footer.php'; ?>
	</body>
	<!------------- /BODY ------------->
</html>

<?php
		} else {
			$_SESSION['ERRORS']['sqlerror'] = 'The requested ID is not in Database or something else...';
			header("Location: ../error/404/");
			exit();
		}
	}
} else {
	$_SESSION['ERRORS']['sqlerror'] = 'Projectid not defined or empty';
	header("Location: ../error/404/");
	exit();
}

?>