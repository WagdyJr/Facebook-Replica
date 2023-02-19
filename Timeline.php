<?php
  session_start();
  $db = new mysqli("localhost", "root", "", "facebook");
  // Check connection
  if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
  }
  $UID = $_SESSION['UID'];
  $_SESSION['user2ID'] = [];

  $sql = "SELECT fName,lName,Nickname FROM user WHERE UID= '$UID'";
  $result = $db->query($sql);
  while($row = $result->fetch_assoc()) {
        $fname = $row["fName"];
        $lname = $row["lName"];
        $Nickname = $row["Nickname"];
    }
    if ($Nickname == Null) {
        $name = $fname." ".$lname;
    }
    else{
        $name = $Nickname;
    }

    //post without image
    if(isset($_POST['captionpost'])){
        $postCaption = $_POST['postCaption'];

        if(isset($_POST['publicCheck']))
            $publicCheck = 1;
        else
            $publicCheck = 0;

        $sql = "INSERT INTO post (caption,isPublic,UID) VALUES ('$postCaption','$publicCheck','$UID')";
        $result = $db->query($sql);
    }

    
    //view posts
    $sql1 = "SELECT * FROM post WHERE UID= '$UID'";
    $result1 = $db->query($sql1);

    $sql2 = "SELECT user2 FROM friendlist WHERE user1 = '$UID'";
    $result2 = $db->query($sql2);

  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Timeline</title>
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
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Timeline</title>
   
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
    background-color: black;
    color: #28384d;

}
/*social */
.card-one {
    position: relative;
    width: 300px;
    background: #fff;
    box-shadow: 0 10px 7px -5px rgba(0, 0, 0, 0.4);
}
.card {
    margin-bottom: 35px;
    box-shadow: 0 10px 20px 0 rgba(26, 44, 57, 0.14);
    border: none;
}

.follower-wrapper li {
    list-style-type: none;
    color: #fff;
    display: inline-block;
    float: left;
    margin-right: 20px;
}

.social-profile {
    color: #fff;
}

.social-profile a {
    color: #fff;
}

.social-profile {
    position: relative;
    margin-bottom: 150px;
}

.social-profile .user-profile {
    position: absolute;
    bottom: -75px;
    width: 150px;
    height: 150px;
    border-radius: 50%;
    left: 50px;
}

.social-nav {
    position: absolute;
    bottom: 0;
}

.social-prof {
    color: #333;
    text-align: center;
}

.social-prof .wrapper {
    width: 70%;
    margin: auto;
    margin-top: -100px;
}

.social-prof img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    margin-bottom: 20px;
    border: 5px solid #fff;
    /*border: 10px solid #70b5e6ee;*/
}

.social-prof h3 {
    font-size: 36px;
    font-weight: 700;
    margin-bottom: 0;
}

.social-prof p {
    font-size: 18px;
}

.social-prof .nav-tabs {
    border: none;
}

.card .nav>li {
    position: relative;
    display: block;
}

.card .nav>li>a {
    position: relative;
    display: block;
    padding: 10px 15px;
    font-weight: 300;
    border-radius: 4px;
}

.card .nav>li>a:focus,
.card .nav>li>a:hover {
    text-decoration: none;
    background-color: #eee;
}

.card .s-nav>li>a.active {
    text-decoration: none;
    background-color: #3afe;
    color: #fff;
}

.text-blue {
    color: #3afe;
}

ul.friend-list {
    margin: 0;
    padding: 0;
}

ul.friend-list li {
    list-style-type: none;
    display: flex;
    align-items: center;
}

ul.friend-list li:hover {
    background: rgba(0, 0, 0, .1);
    cursor: pointer;
}

ul.friend-list .left img {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    margin-right: 20px;
}

ul.friend-list li {
    padding: 10px;
}

ul.friend-list .right h3 {
    font-size: 16px;
    font-weight: 700;
    margin-bottom: 0;
}

ul.friend-list .right p {
    font-size: 11px;
    color: #6c757d;
    margin: 0;
}

.social-timeline-card .dropdown-toggle::after {
    display: none;
}

.info-card h4 {
    font-size: 15px;
}

.info-card h2 {
    font-size: 18px;
    margin-bottom: 20px;
}

.social-about .social-info {
    font-size: 16px;
    margin-bottom: 20px;
}

.social-about p {
    margin-bottom: 20px;
}

.info-card i {
    color: #3afe;
}

.card-one {
    position: relative;
    width: 300px;
    background: #fff;
    box-shadow: 0 10px 7px -5px rgba(0, 0, 0, 0.4);
}

.card-one .header {
    position: relative;
    width: 100%;
    height: 60px;
    background-color: #3afe;
}

.card-one .header::before,
.card-one .header::after {
    content: '';
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background: inherit;
}

.card-one .header::before {
    -webkit-transform: skewY(-8deg);
    transform: skewY(-8deg);
    -webkit-transform-origin: 100% 100%;
    transform-origin: 100% 100%;
}

.card-one .header::after {
    -webkit-transform: skewY(8deg);
    transform: skewY(8deg);
    -webkit-transform-origin: 0 100%;
    transform-origin: 0 100%;
}

.card-one .header .avatar {
    position: absolute;
    left: 50%;
    top: 30px;
    margin-left: -50px;
    z-index: 5;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    overflow: hidden;
    background: #ccc;
    border: 3px solid #fff;
}

.card-one .header .avatar img {
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    width: 100px;
    height: auto;
}

.card-one h3 {
    position: relative;
    margin: 80px 0 30px;
    text-align: center;
}

.card-one h3::after {
    content: '';
    position: absolute;
    bottom: -15px;
    left: 50%;
    margin-left: -15px;
    width: 30px;
    height: 1px;
    background: #000;
}

.card-one .desc {
    padding: 0 1rem 2rem;
    text-align: center;
    line-height: 1.5;
    color: #777;
}

.card-one .contacts {
    width: 200px;
    max-width: 100%;
    margin: 0 auto 3rem;
}

.card-one .contacts a {
    display: block;
    width: 33.333333%;
    float: left;
    text-align: center;
    color: #c8c;
}

.card-one .contacts a:hover {
    color: #333;
}

.card-one .contacts a:hover .fa::before {
    color: #fff;
}

.card-one .contacts a:hover .fa::after {
    width: 100%;
    height: 100%;
}

.card-one .contacts a .fa {
    position: relative;
    width: 40px;
    height: 40px;
    line-height: 39px;
    overflow: hidden;
    text-align: center;
    font-size: 1.3em;
}

.card-one .contacts a .fa:before {
    position: relative;
    z-index: 1;
}

.card-one .contacts a .fa::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    background: #c8c;
    transition: width .3s, height .3s;
}

.card-one .contacts a:last-of-type .fa {
    line-height: 36px;
}

.card-one .footer {
    position: relative;
    padding: 1rem;
    background-color: #3afe;
    text-align: center;
}

.card-one .footer a {
    padding: 0 1rem;
    color: #e2e2e2;
    transition: color .4s;
}

.card-one .footer a:hover {
    color: #c8c;
}

.card-one .footer::before {
    content: '';
    position: absolute;
    top: -27px;
    left: 50%;
    margin-left: -15px;
    border: 15px solid transparent;
    border-bottom-color: #3afe;
}

.card-title, .card .card-title, .card-2 .card-title {
    font-size: 16px;
    font-weight: 700;
    margin-bottom: 20px;
}
a {
    color: #333;
}
.badge {
    font-size: 12px;
    line-height: 1;
    padding: .375rem .5625rem;
    font-weight: normal;
}

.badge-primary {
    color: #447de8;
    background-color: #e6edff;
}
.badge {
    display: inline-block;
    padding: .4em .5em;
    font-size: 75%;
    font-weight: 700;
    line-height: 1;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}


/*end social*/
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
                                        <li class="active"> <a href="Timeline.php">Home</a> </li>
                                        <li> <a href="Profile.php">Profile</a> </li>   
                                        <li> <a href="Friend_Request.php">FriendRequest</a> </li>
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
    
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
    
            </div>
        </div>
        <div class="img" style="    background-image: linear-gradient(150deg, rgba(63, 174, 255, .3)15%, rgba(63, 174, 255, .3)70%, rgba(63, 174, 255, .3)94%), ;height: 100px;background-size: cover;"></div>
        <div class="card social-prof">
            <div class="card-body">
                <div class="wrapper">
                    <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="" class="user-profile">
                    <h3><?php echo $name ?></h3>
                   
                </div>
                <div class="row ">
                    <div class="col-lg-12">
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
            
                <div class="card">
                   
                </div>
            </div>
            <div class="col-lg-6 gedf-main">
                <!--- \\\\\\\Post-->
                <div class="card social-timeline-card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Share your insights</a>
                            </li>
 
                            <li class="nav-item">
                                <a class="nav-link" id="images-tab" data-toggle="tab" role="tab" aria-controls="images" aria-selected="false" href="#images">Share Images</a>

                            </li>
                        </ul>
                    </div>                  
                      <div class="card-body">
                        <div class="tab-content" id="myTabContent">        
                            <div class="tab-pane fade active show" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                                <div class="form-group">

                                    <form method="post">
                                    <label class="sr-only" for="message">post</label>
                                    <textarea class="form-control" id="message" rows="3" placeholder="What are you thinking?" name="postCaption"></textarea>

                                    <div class="btn-toolbar justify-content-between">
                                    <div class="btn-group">
                                        <button type="submit" class="btn btn-theme-primary" name="captionpost">Post</button>
                                    </div>
                                <label  style="padding-top: 8px; color:black; ">PUBLIC
                                  <input type="checkbox" checked="checked" name="publicCheck">
                                  <span class="checkmark"></span>
                                </label> 
                        </div>
                                </form>
                                </div>
                            </div>
                            
                            
                            <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
                                <div class="form-group">
                                    
                                    <div class="custom-file">
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                               <div class="form-group">
                                    <label class="sr-only" for="message">post</label>
                                    <textarea name="imageCaption" class="form-control" id="message" rows="3" placeholder="What are you thinking?"></textarea>
                                </div>
                         <input type="file" name="file">
                            <input type="submit" name="submit" value="Upload">
                                            <div class="btn-toolbar justify-content-between">
                                                <label  style=" color:black; ">PUBLIC
                                                  <input type="checkbox" checked="checked" name="publicCheck">
                                                  <span class="checkmark"></span>
                                                </label> 
  
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- Post /////-->
                <!--- \\\\\\\Post-->
                 <div class="card social-timeline-card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-2">
                                    <img class="rounded-circle" width="45" src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="">
                                </div>
                                <div class="ml-2">
                                    <div class="h5 m-0 text-blue">Ahmed Mohamed</div>
                                   <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i> 10 min</div>
                                </div>
                            </div>
                            <div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                       
                        <h5 class="card-title">post</h5>
                        
                    </div>
                    
                  <div class="card-footer">
                       <button type="submit" class="btn btn-theme-primary card-link fa">Like</button>
                        <button type="submit" class="fa btn btn-theme-primary card-link  fa-comment"> Comment</button>
                        <input class="form-control " style="background-color:#e9ebeb; " type="placeholder" name="textarea" >

<button type="button" class="collapsible " style=" border: none; outline: none;margin-top: 10px; font-weight: bold;">see comments..</button>

<div class="content" style="display:none; ">
    <hr>
  <h10 style="font-weight: bold;">user name</h10>
  <h10>lor sit amet</h10> 
  <hr>
   <h10 style="font-weight: bold;">user name</h10>
  <h10>lor sit adewdewdewdwmet</h10> 

                    </div>

                </div>
                </div>

                        
                <!-- Post /////-->
                <!--- \\\\\\\Post-->
                
                <!-- Post /////-->
                
            </div>

            <div class="col-lg-3">
                <div class="card social-timeline-card">
                    <div class="card-body">
                      <h5>  <a class="card-title" href="Friend_List.php">Friends</a></h5>
                        <ul class="friend-list">
                            <?php
                                //view friends
                                $sql3 = "SELECT user2 FROM friendlist WHERE user1 = '$UID'";
                                $result3 = $db->query($sql3);
                                while($row3 = $result3->fetch_assoc()) {
                                    $friendID = $row3["user2"];
                                    $sql4 = "SELECT fName,lName,Nickname FROM user WHERE UID= '$friendID'";
                                    $result4 = $db->query($sql4);
                                    while($row4 = $result4->fetch_assoc()) {
                                        $fname = $row4["fName"];
                                        $lname = $row4["lName"];
                                        $Nickname = $row4["Nickname"];
                                    }
                                    if ($Nickname == Null) {
                                        $friendname = $fname." ".$lname;
                                    }
                                    else{
                                        $friendname = $Nickname;
                                    }
                            ?>
                            <li><a href="Friend_Profile.php">
                                <div class="left">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                                </div>
                                <div class="right">
                                    <h3><?php $_SESSION['user2ID'] = $friendID; echo $friendname ?></h3>
                                  
                                </div>
                            </li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="js/jquery.min.js"></script>
    
    
   
    <script src="js/custom.js"></script>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
    var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>

</body>
</html>