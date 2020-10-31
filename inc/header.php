<?php include"config.php"; ?>
<?php 
if(empty($_SESSION['admin_id']))
{
	header('location:'.$site_url.'/domaindisposable_panel/login.html');
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Domain Disposable Admin Dashboard</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<script src="assets/js/jquery-1.7.2.min.js"></script>

</head>
<body>
     
           
          
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">
                        <img src="assets/img/logo.png" />

                    </a>
                    
                </div>
              
                <span class="logout-spn" >
                 <a href="#" style="color:#fff;">Setting</a>  |  <a href="logout.php" style="color:#fff;">Logout</a>  

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 


                    <li class="active-link">
                        <a href="index.html" ><i class="fa fa-desktop "></i>Dashboard </a>
                    </li>
                   

                    <li>
                        <a href="theme_option.php"><i class="fa fa-gear "></i>Theme Option  </a>
                    </li>
                    <li>
                        <a href="pages.php"><i class="fa fa-files-o "></i>Pages  </a>
                    </li>

                      <li>
                        <a href="sell_domain.php"><i class="fa fa-edit  "></i>Sell Domain page </a>
                    </li>

                       <li>
                        <a href="how_it_work.php"><i class="fa fa-edit  "></i>How it work page </a>
                    </li>



                    <li>
                        <a href="domain_sellers.php"><i class="fa fa-qrcode "></i>Domain Sellers</a>
                    </li>
                    <li>
                        <a href="domain_buyers.php"><i class="fa fa-users"></i>Domain Buyers</a>
                    </li>
					
					<li>
                        <a href="domain_industries.php"><i class="fa fa-building "></i>Domains Industries </a>
                    </li>
					
                    <li>
                        <a href="add_domains.php"><i class="fa fa-cubes "></i> Domains</a>
                    </li>
                    <li>
                        <a href="orders.php"><i class="fa fa-shopping-cart "></i>Orders</a>
                    </li>
					
					<li>
                        <a href="footer_logo.php"><i class="fa fa-picture-o "></i>footer logo</a>
                    </li>
					
					<li>
                        <a href="faq.php"><i class="fa fa-question "></i>FAQ</a>
                    </li>
                     
                    
                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->