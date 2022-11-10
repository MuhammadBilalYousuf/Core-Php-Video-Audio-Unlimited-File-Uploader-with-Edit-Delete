<?php
namespace Phppot;

use Phppot\DataSource;

class VideoModel
{
    private $conn;

    public function __construct()
    {
        require_once 'DataSource.php';
        $this->conn = new DataSource();
    }

    public function getAllVideos()
    {
        $sqlSelect = "SELECT * FROM tbl_video";
        $result = $this->conn->select($sqlSelect);
        return $result;
    }

    public function uploadVideo()
    {
        $videoPath = "uploads/" . $_FILES["video"]["name"];
        $name = $_FILES["video"]["name"];
        $result = move_uploaded_file($_FILES["video"]["tmp_name"], $videoPath);
        $output = array(
            $name,
            $videoPath
        );
        return $output;
    }

    public function insertVideo($videoData)
    {
        print_r($videoData);
        $query = "INSERT INTO tbl_video(name,image) VALUES(?,?)";
        $paramType = 'ss';

        $paramValue = array(
            $videoData[0],
            $videoData[1]
        );
        $id = $this->conn->insert($query, $paramType, $paramValue);
        return $id;
    }

    public function selectVideoById($id)
    {
        $sql = "select * from tbl_video where id=? ";
        $paramType = 'i';
        $paramValue = array(
            $id
        );
        $result = $this->conn->select($sql, $paramType, $paramValue);
        return $result;
    }

    public function updateVideo($videoData, $id)
    {
        $query = "UPDATE tbl_video SET name=?, image=? WHERE id=?";
        $paramType = 'ssi';
        $paramValue = array(
            $videoData[0],
            $videoData[1],
            $_GET["id"]
        );
        $id = $this->conn->execute($query, $paramType, $paramValue);
        return $id;
    }

    /*
     * public function execute($query, $paramType = "", $paramArray = array())
     * {
     * $id = $this->conn->prepare($query);
     *
     * if (! empty($paramType) && ! empty($paramArray)) {
     * $this->bindQueryParams($id, $paramType, $paramArray);
     * }
     * $id->execute();
     * }
     */
    public function deleteVideoById($id)
    {
        $query = "DELETE FROM tbl_video WHERE id=$id";
        $result = $this->conn->select($query);
        return $result;
    }
}
