<?php
namespace Phppot;

use Phppot\DataSource;

require_once __DIR__ . '/lib/ImageModel.php';
$imageModel = new ImageModel();
?>
<html>
<head>
<title>Display all records from Database</title>
<link href="assets/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="image-datatable-container">
		<a href="insert.php" class="btn-link">Add Audio</a>
		<table class="image-datatable" width="100%">

			<tr>
				<th width="80%">Image</th>
				<th>Action</th>

			</tr>

        <?php
        $result = $imageModel->getAllImages();

?>

        <tr>
        <?php
if (! empty($result)) {
    foreach ($result as $row) {
        ?>
            <td>
				<video width="320" height="40" poster="../uploads/mp3.png" controls>
					<source src="<?php echo $row["image"]?>" type="audio/mp3">
					Your browser does not support the audio tag.
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