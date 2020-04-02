
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
				"updated_at" => $row['updated_at'],
				"created_at" => $row['created_at'],
			);


		

?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php echo $project['name'] ?> | SourceBird </title>
		
		<link rel="stylesheet" type="text/css" href="../../css/master.css">
		<link rel="stylesheet" type="text/css" href="../../css/project.css">
	</head>

	<!------------- BODY ------------->
	<body>
		
		<main class="project-page">
			<div class="div-wrapper head-div">
				<div class="fluid-div project-head" style="background: black;">
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

			<div id="quicknav-panel">
				<div class="quicknav-item">
					<h3>Github</h3>
					<a href="https://github.com/Sourcebird/Homepage">SourceBird/Homepage</a>
				</div>
				<div class="quicknav-item">
					<h3>Direct Download</h3>
					<a href="https://github.com/Sourcebird/Homepage">Download v.X.x</a>
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
								<button class="tablinks" onclick="openTab(event, 'Team')">Team</button>
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

							<div id="Team" class="tabcontent">

							</div>

							<div id="Template" class="tabcontent">

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