<!DOCTYPE html>
<?php
// Include the database configuration file
session_start();
$db = new mysqli("localhost", "root", "", "facebook");
$UID = $_SESSION['UID'];


$statusMsg = '';

// File upload path
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    $imageCaption = $_POST['imageCaption'];

        if(isset($_POST['publicCheck']))
            $publicCheck = 1;
        else
            $publicCheck = 0;
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
             $sql = "INSERT INTO post (caption,image,isPublic,UID) VALUES ('Updated Profile Picture','".$fileName."','$publicCheck','$UID')";
            $result = $db->query($sql);

            $sql = "UPDATE account SET profilePic = '".$fileName."' WHERE UID = '$UID'";
            $result = $db->query($sql);


            if($insert){
                header("location:Edit_Profile.php");
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;
?>// Display status message
echo $statusMsg;
?>
