<?php
namespace Phppot;

use Phppot\DataSource;

require_once __DIR__ . '/lib/VideoModel.php';
$videoModel = new VideoModel();
$id=$_REQUEST['id'];
$result = $videoModel->deleteVideoById($id);
header("Location: index.php");
