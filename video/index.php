<?php
namespace Phppot;

use Phppot\DataSource;

require_once __DIR__ . '/lib/VideoModel.php';
$videoModel = new VideoModel();
?>
<html>
<head>
<title>Display all records from Database</title>
<link href="assets/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="video-datatable-container">
		<a href="insert.php" class="btn-link">Add Video</a>
		<table class="video-datatable" width="100%">

			<tr>
				<th width="80%">Video</th>
				<th>Action</th>

			</tr>

        <?php
        $result = $videoModel->getAllVideos();

?>

        <tr>
        <?php
if (! empty($result)) {
    foreach ($result as $row) {
        ?>
            <td>
				<video width="320" height="240" poster="../uploads/mp3.png" controls>
					<source src="<?php echo $row["image"]?>" type="video/mp4">
					Your browser does not support the video tag.
				</video>
				<?php echo $row["name"]?>
            </td>
				<td><a href="update.php?id=<?php echo $row['id']; ?>"
					class="btn-action">Edit</a> <a
					onclick="confirmDelete(<?php echo $row['id']; ?>)"
					class="btn-action">Delete</a></td>
			</tr>
            <?php
    }
}
?>
    </table>
	</div>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"
		integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
		crossorigin="anonymous"></script>
	<script type="text/javascript" src="assets/validate.js"></script>
</body>

</html>