<?php
namespace Phppot;

use Phppot\DataSource;

require_once __DIR__ . '/lib/VideoModel.php';
$videoModel = new VideoModel();
if (isset($_POST["submit"])) {
    $result = $videoModel->uploadVideo();
    $id = $videoModel->updateVideo($result, $_GET["id"]);
}
$result = $videoModel->selectVideoById($_GET["id"]);

?>
<html>
<head>
<link href="assets/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="form-container">
		<h1>View/Edit Video</h1>

		<form action="?id=<?php echo $result[0]['id']; ?>" method="post"
			name="frm-edit" enctype="multipart/form-data"
			onsubmit="return videoValidation()">
			<div class="preview-container">
				<video width="320" height="240" poster="../uploads/mp3.png" controls>
					<source src="<?php echo $result[0]["image"]?>" type="video/mp4">
					Your browser does not support the video tag.
				</video>
				<div>Name: <?php echo $result[0]["name"]?></div>
			</div>
			<div Class="input-row">
				<input type="file" name="video" id="input-file" class="input-file"
					accept=".mp4" value="">
			</div>
			<button type="submit" name="submit" class="btn-link">Save</button>
			<span id="message"></span>
	
	</div>
	</form>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"
		integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
		crossorigin="anonymous"></script>
	<script src="assets/validate.js"></script>
</body>
</html>
