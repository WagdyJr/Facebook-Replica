
<?php
  session_start();

  $UID = $_SESSION['UID'];


$con = new PDO("mysql:host=localhost;dbname=facebook",'root','');

if (isset($_POST["submit"])) {
    $str = $_POST["search"];
    $sth = $con->prepare("SELECT * FROM `user` WHERE fName = '$str' or Nickname = '$str' ");



    $sth->setFetchMode(PDO:: FETCH_OBJ);
    $sth -> execute();

    if($row = $sth->fetch())
    {
        ?>
        
        <!DOCTYPE html>
        <html>
        <head>
           <title>research</title>
     
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
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
    <style type="text/css">
        body{
    background:black;
    }
/* booking */

.bg-light-blue {
    background-color: #e9f7fe !important;
    color: #3184ae;
    padding: 7px 18px;
    border-radius: 4px;
}

.bg-light-green {
    background-color: rgba(40, 167, 69, 0.2) !important;
    padding: 7px 18px;
    border-radius: 4px;
    color: #28a745 !important;
}

.buttons-to-right {
    position: absolute;
    right: 0;
    top: 40%;
}

.btn-gray {
    color: #666;
    background-color: #eee;
    padding: 7px 18px;
    border-radius: 4px;
}
.btn-gray:hover {
    background-color: #36a3f5;
    color: #fff;
}

.booking {
    margin-bottom: 30px;
    border-bottom: 1px solid #eee;
    padding-bottom: 30px;
}

.booking:last-child {
    margin-bottom: 0px;
    border-bottom: none;
    padding-bottom: 0px;
}

@media screen and (max-width: 575px) {
    .buttons-to-right {
        top: 10%;
    }
    .buttons-to-right a {
        display: block;
        margin-bottom: 20px;
    }
    .buttons-to-right a:last-child {
        margin-bottom: 0px;
    }
    .bg-light-blue,
    .bg-light-green,
    .btn-gray {
        padding: 7px;
    }
}

.card {
    margin-bottom: 20px;
    background-color: #fff;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
    border-radius: 4px;
    box-shadow: none;
    border: none;
    padding: 25px;
}
.mb-5, .my-5 {
    margin-bottom: 3rem!important;
}
.msg-img {
    margin-right: 20px;
}
.msg-img img {
    width: 60px;
    border-radius: 50%;
}
img {
    max-width: 100%;
    height: auto;
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
                                        <li > <a href="Timeline.html">Home</a> </li>
                                        <li> <a href="Profile.html">Profile</a> </li>   
                                        <li > <a href="Friend_Request.html">FriendRequest</a> </li>
                                        <li> <a href="Notification.html">Notification</a> </li>
                                        <li> <a href="Login/login.php">Logout</a> </li>
                                     
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
<div class="row">
    <div class="col-md-12">
        <div class="card card-white mb-5">
            <div class="card-heading clearfix border-bottom mb-4">
                <h4 class="card-title">Users</h4>
            </div>
            <div class="card-body">
                <ul class="list-unstyled">
                    <li class="position-relative booking">
                        <div class="media">
                            <div class="msg-img">
                                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="">
                            </div>
                            <div class="media-body">
                                <a href="Friend_Profile.php"   class="mb-4">                <td><?php echo $row->fName; ?></td><td><?php echo $row->lName; ?></td>
                                <span class="badge badge-primary mx-3"></h5></a>
                               
                               
                                <div class="mb-5 >
                                    <span class="mr-2 d-block d-sm-inline-block mb-1 mb-sm-0">Email:</span>
                                    <span class="border-right pr-2 mr-2"><?php echo $row->email;    ?> </span>
                                    
                                </div>
                                <form action="Profile.php" >
                                <input type="submit" name="submit" value="follow me"  >
                                </form>

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

<?php 
    }
        
        
        else{
            echo "Name Does not exist";
        }


}

?>