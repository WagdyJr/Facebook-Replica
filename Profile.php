<?php
    session_start();
    $db = new mysqli("localhost", "root", "", "facebook");
    $UID = $_SESSION['UID'];
    $sql = "SELECT fName,lName,Nickname,nationality FROM user WHERE UID= '$UID'";
    $result = $db->query($sql);
    while($row = $result->fetch_assoc()) {
        $fname = $row["fName"];
        $lname = $row["lName"];
        $Nickname = $row["Nickname"];
        $nationality = $row["nationality"];
    }
    if ($Nickname == Null) {
        $name = $fname." ".$lname;
    }
    else{
        $name = $Nickname;
    }

    $sql = "SELECT Email,joiningDate,aboutMe FROM account WHERE UID= '$UID'";
    $result = $db->query($sql);
    while($row = $result->fetch_assoc()) {
        $email = $row["Email"];
        $aboutMe = $row["aboutMe"];
        $joiningDate = $row["joiningDate"];
    }

    $sql1 = "SELECT * FROM friendlist WHERE user1 = '$UID'";
    $result1 = $db->query($sql1);
    $count = mysqli_num_rows($result1);


    $sql1 = "SELECT * FROM post WHERE UID= '$UID'";
    $result1 = $db->query($sql1);
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    
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
    <title>Profile</title>
     
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">

    <style type="text/css">
 
    	
        body{
    background-color: black;  
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color:black;
  
    
    }

.profile-page .profile-header {
    box-shadow: 0 0 10px 0 rgba(183, 192, 206, 0.2);
    border: 1px solid black;
}

.profile-page .profile-header .cover {
    position: relative;
    border-radius: .25rem .25rem 0 0;
}


.profile-page .profile-header .cover figure {
    margin-bottom: 0;
}

@media (max-width: 767px) {
    .profile-page .profile-header .cover figure {
        height: 110px;
        overflow: hidden;
    }
}

@media (min-width: 30px) {
    .profile-page .profile-header .cover figure {
        height: 280px;
        overflow: hidden;
    }
}

.profile-page .profile-header .cover figure img {
    border-radius: .25rem .25rem 0 0;
    width: 100%;
}

@media (max-width: 767px) {
    .profile-page .profile-header .cover figure img {
        -webkit-transform: scale(2);
        transform: scale(2);
        margin-top: 15px;
    }
}

@media (min-width: 2400px) {
    .profile-page .profile-header .cover figure img {
        margin-top: -55px;
    }
}

.profile-page .profile-header .cover .gray-shade {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
    background: linear-gradient(rgba(255, 255, 255, 0.1), #fff 99%);
}

.profile-page .profile-header .cover .cover-body {
    position: absolute;
    bottom: -20px;
    left: 0;
    z-index: 2;
    width: 100%;
    padding: 0 20px;
}

.profile-page .profile-header .cover .cover-body .profile-pic {
    border-radius: 50%;
    width: 100px;
}

@media (max-width: 767px) {
    .profile-page .profile-header .cover .cover-body .profile-pic {
        width: 70px;
    }
}

.profile-page .profile-header .cover .cover-body .profile-name {
    font-size: 20px;
    font-weight: 600;
    margin-left: 17px;
}

.profile-page .profile-header .header-links {
    padding: 15px;
    display: -webkit-flex;
    display: flex;
    -webkit-justify-content: center;
    justify-content: center;
    background: #fff;
    border-radius: 0 0 .25rem .25rem;
}

.profile-page .profile-header .header-links ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

.profile-page .profile-header .header-links ul li a {
    color: #000;
    -webkit-transition: all .2s ease;
    transition: all .2s ease;
}

.profile-page .profile-header .header-links ul li:hover,
.profile-page .profile-header .header-links ul li.active {
    color: #727cf5;
}

.profile-page .profile-header .header-links ul li:hover a,
.profile-page .profile-header .header-links ul li.active a {
    color: #727cf5;
}

.profile-page .profile-body .left-wrapper .social-links a {
    width: 30px;
    height: 30px;
}

.profile-page .profile-body .right-wrapper .latest-photos > .row {
    margin-right: 0;
    margin-left: 0;
}

.profile-page .profile-body .right-wrapper .latest-photos > .row > div {
    padding-left: 3px;
    padding-right: 3px;
}

.profile-page .profile-body .right-wrapper .latest-photos > .row > div figure {
    -webkit-transition: all .3s ease-in-out;
    transition: all .3s ease-in-out;
    margin-bottom: 6px;
}

.profile-page .profile-body .right-wrapper .latest-photos > .row > div figure:hover {
    -webkit-transform: scale(1.06);
    transform: scale(1.06);
}

.profile-page .profile-body .right-wrapper .latest-photos > .row > div figure img {
    border-radius: .25rem;
}

.rtl .profile-page .profile-header .cover .cover-body .profile-name {
    margin-left: 0;
    margin-right: 17px;
}
.img-xs {
    width: 37px;
    height: 37px;
}
.rounded-circle {
    border-radius: 50% !important;
}
img {
    vertical-align: middle;
    border-style: none;
}

.card-header:first-child {
    border-radius: 0 0 0 0;
}
.card-header {
    padding: 0.875rem 1.5rem;
    margin-bottom: 0;
    background-color: rgba(0, 0, 0, 0);
    border-bottom: 1px solid #f2f4f9;
}

.card-footer:last-child {
    border-radius: 0 0 0 0;
}
.card-footer {
    padding: 0.875rem 1.5rem;
    background-color: rgba(0, 0, 0, 0);
    border-top: 1px solid #f2f4f9;
}

.grid-margin {
    margin-bottom: 1rem;
}

.card {
    box-shadow: 0 0 10px 0 rgba(183, 192, 206, 0.2);
    -webkit-box-shadow: 0 0 10px 0 rgba(183, 192, 206, 0.2);
    -moz-box-shadow: 0 0 10px 0 rgba(183, 192, 206, 0.2);
    -ms-box-shadow: 0 0 10px 0 rgba(183, 192, 206, 0.2);
}
.rounded {
    border-radius: 0.25rem !important;
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid #f2f4f9;
    border-radius: 0.25rem;
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
                                        <li class="active"> <a href="Profile.php">Profile</a> </li>   
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
<div class="container">
<div class="profile-page tx-13">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="profile-header">
                <div class="cover">
                    <div class="gray-shade"></div>
                    <figure>
                        <img src="https://bootdey.com/img/Content/bg1.jpg" class="img-fluid" alt="profile cover">
                    </figure>
                    <div class="cover-body d-flex justify-content-between align-items-center">
                        <div>
                            <img class="profile-pic" src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="profile">
                            <span class="profile-name"><?php echo $name ?></span>
                        </div>
                        <div class="d-none d-md-block">
                            <button class="btn btn-primary btn-icon-text btn-edit-profile">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit btn-icon-prepend">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg> <a href="Edit_Profile.php" style="color: white;">Edit profile</a>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="header-links">
                    <ul class="links d-flex align-items-center mt-3 mt-md-0">
                        <li class="header-link-item d-flex align-items-center active">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns mr-1 icon-md">
                                <path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path>
                            </svg>
                            <a class="pt-1px d-none d-md-block" href="Timeline.php">Timeline</a>
                        </li>
                        
                        <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users mr-1 icon-md">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <a class="pt-1px d-none d-md-block" href="Friend_List.php">Friends <span class="text-muted tx-12"><?php echo $count ?></span></a>
                        </li>
                        <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image mr-1 icon-md">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                <polyline points="21 15 16 10 5 21"></polyline>
                            </svg>
                            <a class="pt-1px d-none d-md-block" href="#">Photos</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row profile-body">
        <!-- left wrapper start -->
        <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
            <div class="card rounded">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6 class="card-title mb-0">About <meta charset="utf-8"></h6>
                        
                    </div>
                    <p ><?php echo $aboutMe ?></p>
                    <div class="mt-3">
                        <label class="tx-11 font-weight-bold mb-0 text-uppercase">Joined:</label>
                        <p class="text-muted"><?php echo $joiningDate ?></p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 font-weight-bold mb-0 text-uppercase">Lives:</label>
                        <p class="text-muted"><?php echo $nationality ?></p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 font-weight-bold mb-0 text-uppercase">Email:</label>
                        <p class="text-muted"><?php echo $email ?></p>
                    </div>
                    
                  
                </div>
            </div>
        </div>
        <!-- left wrapper end -->
        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-6 middle-wrapper">
            <div class="row">
                <?php while($row = $result1->fetch_assoc()){ ?>
                <div class="col-md-12 grid-margin">
                    <div class="card rounded">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img class="img-xs rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="">
                                    
                                    <div class="ml-2">
                                       
                                        <p style="color:black; font-weight: bold;"><?php echo $name;?></p>
                                    </div>

                                </div>
                               <p class="tx-11 text-muted" ><?php echo $row["uploaded_on"];?></p>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="mb-3 tx-14"><?php echo $row["caption"];?></p>
                            <?php if (!empty($row["image"])){ $imageURL = 'uploads/'.$row["image"];  ?>
                            <img class="img-fluid" src="<?php echo $imageURL; ?>" alt="">
                        <?php }?>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex post-actions">
                                <a href="javascript:;" class="d-flex align-items-center text-muted mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart icon-md">
                                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                    </svg>
                                    <p class="d-none d-md-block ml-2">Like</p>
                                </a>
                                <a href="javascript:;" class="d-flex align-items-center text-muted mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square icon-md">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                    </svg>
                                    <p class="d-none d-md-block ml-2">Comment</p>
                                </a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
                
            </div>
        </div>
        <!-- middle wrapper end -->
        <!-- right wrapper start -->
       
        <!-- right wrapper end -->
    </div>
</div>
</div>

<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
<script src="js/jquery.min.js"></script>
    
    
   
    <script src="js/custom.js"></script>

</body>
</html>