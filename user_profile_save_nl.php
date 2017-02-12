<?php
$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

session_start();
include "db_head.php";
$user = $_SESSION['id'];


    $newname = $_POST["user_name"];
    $newlname = $_POST["user_lname"];
    $filename = $_FILES["fileToUpload"]["name"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "homevisit";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "UPDATE tbuser SET  f_user = '$newname' , l_user = '$newlname' , photo = '$filename' WHERE user = '$user';";
    $conn->set_charset("utf8");   
    if ($conn->query($sql) === TRUE) {
        header("location:user_profile.php");;
    } else {
        echo "Error updating record: " . $conn->error;
    }
      

?>