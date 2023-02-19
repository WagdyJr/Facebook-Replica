<?php
  session_start();
  $db = new mysqli("localhost", "root", "", "facebook");
  $UID = $_SESSION['UID'];

  $sql = "SELECT * FROM user WHERE UID = '$UID'";
  $result = $db->query($sql);
  while($row = $result->fetch_assoc()) {
    $fname = $row["fName"];
    $lname = $row["lName"];
    $Nickname = $row["Nickname"];
    if ($Nickname == Null) {
        $name = $fname." ".$lname;
    }
    else{
        $name = $Nickname;
    }

    if (!empty($row["dateOfBirth"]))
      $dateOfBirth = $row["dateOfBirth"];
    else
      $dateOfBirth="Date of Birth";
    if (!empty($row["gender"])) 
      $gender = $row["gender"];
    if (!empty($row["phoneNumber"])) 
      $phoneNumber = $row["phoneNumber"];
    else
      $phoneNumber="Phone number";
    if (!empty($row["maritalStatus"])) 
      $maritalStatus = $row["maritalStatus"];
    if (!empty($row["college"])) 
      $college = $row["college"];
    else
      $college="college";
    if (!empty($row["school"])) 
      $school = $row["school"];
    else
      $school="school";
    if (!empty($row["nationality"])) 
      $nationality = $row["nationality"];
    else
      $nationality="Hometown";
  }
  
  $sql = "SELECT * FROM account WHERE UID= '$UID'";
  $result = $db->query($sql);
  while($row = $result->fetch_assoc()) {
    $email = $row["Email"];
    $password = $row["password"];
    if (!empty($row["aboutMe"])) 
      $aboutMe = $row["aboutMe"];
    else
      $aboutMe = "about me";
  }

  if(isset($_POST['update'])) {
    $first=$_POST['firstname'];
    $second=$_POST['lastname'];
    $nickname=$_POST['nickName'];
    $newpass = $_POST['newPassword'];
    $currentpass = $_POST['currentPassword'];
    $number=$_POST['phoneNumber'];
    $birthdate=$_POST['dateOfBirth'];
    $hometown=$_POST['homeTown'];
    $about=$_POST['aboutMe'];
    if(!empty($_POST['gender']))
      $gend=$_POST['gender'];
    if(!empty($_POST['maritalStatus']))
      $status=$_POST['maritalStatus'];

    if (!empty($first)) {
      $sql = "UPDATE user SET fName = '$first' WHERE UID = '$UID'";
      $result = $db->query($sql);
    }
    
    if (!empty($second)) {
      $sql = "UPDATE user SET lName='$second' WHERE UID = '$UID'";
      $result = $db->query($sql);
    }
    if (!empty($nickname)) {
      $sql = "UPDATE user SET Nickname='$nickname' WHERE UID = '$UID'";
      $result = $db->query($sql);
    }
    if (!empty($currentpass) AND !empty($newpass)) {
      if ($currentpass == $password) {
        $sql = "UPDATE account SET password='$newpass' WHERE UID = '$UID'";
        $result = $db->query($sql);
      }
    }
    if (!empty($number)) {
      $sql = "UPDATE user SET phoneNumber='$number' WHERE UID = '$UID'";
      $result = $db->query($sql);
    }
    if (!empty($birthdate)) {
      $sql = "UPDATE user SET dateOfBirth='$birthdate' WHERE UID = '$UID'";
      $result = $db->query($sql);
    }
    if (!empty($hometown)) {
      $sql = "UPDATE user SET nationality='$hometown' WHERE UID = '$UID'";
      $result = $db->query($sql);
    }
    if (!empty($about)) {
      $sql = "UPDATE account SET aboutMe='$about' WHERE UID = '$UID'";
      $result = $db->query($sql);
    }
    if (!empty($gend)) {
      $sql = "UPDATE user SET gender='$gend' WHERE UID = '$UID'";
      $result = $db->query($sql);
    }
    if (!empty($status)) {
      $sql = "UPDATE user SET maritalStatus='$status' WHERE UID = '$UID'";
      $result = $db->query($sql);
    }
  }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Edit_Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
      body{
    
    color: #1a202c;
    text-align: left;
    background-color:black;    
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
    </style>
</head>
<body class="main-layout">
<div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                    <a href="index.html"><img src="images/logo.jpg" alt="logo" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-10 col-sm-10">
                        <div class="menu-area">
                            <div class="limit-box">
                                <nav class="main-menu">
                                    <ul class="menu-area-main">
                                        <li > <a href="Timeline.php">Home</a> </li>
                                        <li> <a href="Profile.php">Profile</a> </li>   
                                        <li > <a href="Friend_Request.php">FriendRequest</a> </li>
                                        <li> <a href="Notification.php">Notification</a> </li>
                                        <li> <a href="logout.php">Logout</a> </li>
                                     
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
                        <form class="search" action="research.php" method="post">
                    <input class="form-control" type="text" name="search"> 
                    <input class="fa btn btn-theme-primary" style="color: white "  type="submit" name="submit" value="search">

                    </form>

                    </div>

                </div>

            </div>
            <!-- end header inner -->
    </header>
<div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
         
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-12 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?php echo $name ?></h4>
                  
                      <form action="upload2.php" method="post" enctype="multipart/form-data">
                        <input   type="file" name="file" id="fileToUpload">
                        <input class="btn btn-primary btn-icon-text btn-edit-profile" type="submit"  value="Edit Image" name="image_post">
     
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="col-md-9">
              <div class="card mb-3">
                <div class="card-body">
                   <form action="#" method="post" style="padding-left:50px;padding: 12px 20px; font-weight: bold;  width: 70%;">
                  <div class="row">
                   
      <label  for="fname">First Name</label>
      <input type="text" id="fname" name="firstname" placeholder="<?php echo $fname ?>">
    
                  </div>
                  <hr>
                <div class="row">
                 
      <label  for="fname">Last Name</label>
      <input type="text" id="fname" name="lastname" placeholder="<?php echo $lname ?>">
    
                  </div>
                  <hr>
                   <div class="row">
                    
      <label  for="fname">Nick Name</label>
      <input type="text" id="fname" name="nickName" placeholder="<?php echo $Nickname ?>">
    
                  </div>
                  <hr>
                  <div class="row">
                   
      <label  for="fname">Current password</label>
      <input type="text" id="fname" name="currentPassword" placeholder="Current password">
    
                  </div>
                  <hr>
                  <div class="row">
                   
      <label  for="fname">New password</label>
      <input type="text" id="fname" name="newPassword" placeholder="New password">
    
                  </div>
                  <hr>
                  <div class="row">
                  
      <label  for="fname">Phone Number</label>
      <input type="text" id="fname" name="phoneNumber" placeholder="<?php echo $phoneNumber ?>">
    
                  </div>
                  <hr>
                  <div class="row">
                    
      <label  for="fname">Gender</label>

      <select name="gender" id="id_parent" data-child-id='id_child' class='dependent-selects__parent'>
        <option value="" disabled selected>----</option>
        <option value="Male" data-child-options="11|#twelve|#13">Male</option>
        <option value="Female" data-child-options="11|#14|#15">Female</option>
      </select>
    
                  </div>
                  <hr>
                  <div class="row">
                    
      <label  for="fname">Birthdate</label>
      <input type="text" id="fname" name="dateOfBirth" placeholder="<?php echo $dateOfBirth ?>">
    
                  </div>
                  <hr>

                  <div class="row">
                   
      <label  for="fname">Hometown</label>
      <input type="text" id="fname" name="homeTown" placeholder="<?php echo $nationality ?>">
    
                  </div>
                  <hr>
                  <div class="row">
                  
      <label  for="maritalStatus">Marital status</label>

     <select name="maritalStatus" id="id_parent" data-child-id='id_child' class='dependent-selects__parent'>
        <option value="" disabled selected>----</option>
        <option value="Single" data-child-options="11|#twelve|#13">Single</option>
        <option value="Married" data-child-options="11|#14|#15">Married</option>
        <option value="In relationship" data-child-options="11|#14|#15">In relationship</option>
      </select>
    
                  </div>
                  <hr>
                  <div class="row">
                   
      <label  for="fname">About me</label>
      <input type="text" id="fname" name="aboutMe" placeholder="<?php echo $aboutMe ?>">
    
                  </div>
                  <button name="update" class="btn btn-primary btn-icon-text btn-edit-profile">
                                 Update
                            </button>
                </div>
                </form>
              </div>
              
            </div>
          </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script> 
    <script src="js/custom.js"></script>
    
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
  
</script>

</body>
</html>