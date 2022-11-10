<?php
namespace Phppot;

use Phppot\DataSource;

require_once __DIR__ . '/lib/VideoModel.php';
$videoModel = new VideoModel();
if (isset($_POST['send'])) {
    $result = $videoModel->uploadVideo();
    $id = $videoModel->insertVideo($result);
    if (! empty($id)) {
        $_SESSION['message'] = "Video added to the server and database.";
    } else {
        $_SESSION['message'] = "Video upload incomplete.";
    }
    header('Location: index.php');
}

?>
<html>
<head>
<link href="assets/style.css" rel="stylesheet" type="text/css" />
</head>
<body>

	<div class="form-container">
		<h1>Add new Video</h1>
		<form action="" method="post" name="frm-add"
			enctype="multipart/form-data" onsubmit="return videoValidation()">
			<div Class="input-row">
				<input type="file" name="video" id="input-file" class="input-file"
					accept=".mp4">
			</div>
			<input type="submit" name="send" value="Submit" class="btn-link"> <span
				id="message"></span>
	
	</div>

	</form>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"
		integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
		crossorigin="anonymous"></script>
	<script src="assets/validate.js"></script>
</body>
</html>
