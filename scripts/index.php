<?php
error_reporting(0);
session_start();
date_default_timezone_set('Africa/Harare');
$date = date('m/d/Y h:i:s', time());
include 'functions.php';


if($_SESSION['username']==""){
	
	?>
	<script language="javascript">
		alert("Please login first!")
		location="../login-form/index.php"
	</script>
	<?php
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="fav/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="fav/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="fav/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="fav/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="fav/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="fav/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="fav/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="fav/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="fav/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="fav/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="fav/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="fav/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="fav/favicon-16x16.png">
<link rel="manifest" href="fav/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Nkonki</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="../assets/css/my_styles.css" rel="stylesheet" />
	
	
    <!--  Material Dashboard CSS    -->
    <link href="../assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
	
	
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-image="../assets/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo" >
                <a href="index.php" class="simple-text">
                    <img style="border-radius :50px;" src="logo.jpg" />
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    
					<li>
                        <a href="index.php">
                            <i class="material-icons">home</i>
                            <p>Home</p>
                        </a>
                    </li>
					<li>
                        <a href="index.php?page=new_user.php">
                            <i class="material-icons">person_add</i>
                            <p>Add Partner</p>
                        </a>
                    </li>
					<li>
                        <a href="index.php?page=new_client.php">
                            <i class="material-icons">computer</i>
                            <p>New Client</p>
                        </a>
                    </li>
					<li>
                        <a href="index.php?page=client_engagement.php">
                            <i class="material-icons">done</i>
                            <p>New Engagement</p>
                        </a>
                    </li>
					<li>
                        <a href="index.php?page=engaged_clients.php">
                            <i class="material-icons">done_all</i>
                            <p>Engaged Clients</p>
                        </a>
                    </li>
					<li>
                        <a href="./Reporting" target="_blank">
                            <i class="material-icons">folder_open</i>
                            <p>Engagement Reports</p>
                        </a>
                    </li>
					
					<?php /* 
						
					<li>
                        <a href="index.php?page=report.php">
                            <i class="material-icons">home</i>
                            <p>All Clients</p>
                        </a>
                    </li>
					
                     <li>                                                                                                                  
                         <a href="index.php?page=profile.php">                                                                             
                             <i class="material-icons">person</i>                                                                          
                             <p>Your Profile</p>                                                                                           
                         </a>                                                                                                              
                     </li>                                                                                                                 
					 	                                                                                                                   
					 		                                                                                                               
                     <li class="dropdown">                                                                                                 
                         <a href="" class="dropdown-toggle" data-toggle="dropdown">                                                        
                             <i class="material-icons">group</i>                                                                           
                             <p>System Users</p>                                                                                           
                         </a>                                                                                                              
					 	<ul class="dropdown-menu">                                                                                         
                                     <li>                                                                                                  
                                         <a href="index.php?page=new_user.php" class="fa fa-user-plus"> New User</a>                       
					 					<a href="index.php?page=manage_users.php" class="fa fa-list-alt">  Manage Users</a>                
                                     </li>                                                                                                 
					 				                                                                                                       
					 			</ul>                                                                                                      
                     </li>                                                                                                                 
					                                                                                                                      */ ?>
					
					<li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="material-icons">settings</i>
                            <p>Configurations</p>
                        </a>
						<ul class="dropdown-menu">
                                    <li>
										
                                        <a href="#" class="fa fa-hdd-o"> Database Backup</a>
										<a href="#" class="fa fa-key"> Change Password</a>
                                    </li>
									
								</ul>
                    </li>
                    <li class="active-pro">
                        <a href="">
                            <i class="material-icons">unarchive</i>
                            <p>Upgrade to PRO</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> Welcome <?php echo $_SESSION['username']; ?>! </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            
                            <li class="dropdown">
                                <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-sign-out">sign-out</i>
                                    <p class="hidden-lg hidden-md">Profile</p>
                                </a>
								<ul class="dropdown-menu">
                                    <li>
                                        <a href="../login-form/logout.php">Sign Out</a>
                                    </li>
									
								</ul>
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
					
					<?php
$pg = @$_REQUEST['page'];
if($pg != "" && file_exists(dirname(__FILE__)."/".$pg)){
require(dirname(__FILE__)."/".$pg);
}elseif(!file_exists(dirname(__FILE__)."/".$pg))
include_once(dirname(__FILE__)."/pages/404.php");
else{
include_once("home.php");
}
?>

                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="index.php">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="index.php?page=profile.php">
                                    Profile
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="cpstechnologies.co.za">CPS Technologies</a>, made with love for a better processes
                    </p>
                </div>
            </footer>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="../assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="../assets/js/chartist.min.js"></script>
<!--  Dynamic Elements plugin -->
<script src="../assets/js/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="../assets/js/perfect-scrollbar.jquery.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Material Dashboard javascript methods -->
<script src="../assets/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>



</html>