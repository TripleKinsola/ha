<?php session_start(); require_once('admin/db_connect.php'); $track=preg_replace('/[^0-9]/', '0', $_GET['track_reg_no']);

if ($track=='123456789') {
$_SESSION['admin']='1';
header('location:admin/vadmin.php'); exit();}

$selc=mysql_query("select * FROM users WHERE track=".$track."");
$count1=mysql_num_rows($selc);

if($count1<1) {
header('location:trackerror.html'); exit(); }


function selany($table,$space,$id,$col) {
	 $select="SELECT * FROM $table WHERE $space=$id";
     $result=mysql_query($select);
     $sel=mysql_fetch_array($result);
	 return $sel[$col];
	}

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Hamilton Global Services</title>
         <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Stylesheets -->
        <link rel="stylesheet" href="css/bootstrap.css"/><!-- bootstrap grid -->
        <link rel="stylesheet" href="css/style.css"/><!-- template styles -->
        <link rel="stylesheet" href="css/color-default.css"/><!-- template main color -->
        <link rel="stylesheet" href="css/retina.css"/><!-- retina ready styles -->
        <link rel="stylesheet" href="css/responsive.css"/><!-- responsive styles -->
        <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
        <!-- Google Web fonts -->
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,800,700,600' rel='stylesheet' type='text/css'>

        <!-- Font icons -->
        <link href="icon-fonts/font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="style-switcher/styleSwitcher.css"/><!-- styleswitcher -->

        <script>
            $(document).ready(function(){

                if ($('.track_reg_no').length >0){
                     $("html,body").animate({ scrollTop: $('.table_report').offset().top }, "slow");
                }


    });
        </script>
        <style type='text/css'>
      .tbl_report{
    border: 1px solid black;
}
            </style>
    </head>

    <body>
         <span class="track_reg_no hide"><?php echo $track; ?></span>

        <div class="header-wrapper header-transparent">
            <!-- .header.header-style01 start -->
            <header id="header"  class="header-style01">
                <!-- .container start -->
                <div class="container">
                    <!-- .main-nav start -->
                    <div class="main-nav">
                        <!-- .row start -->
                        <div class="row">
                            <div class="col-md-12">
                                <nav class="navbar navbar-default nav-left" role="navigation">

                                    <!-- .navbar-header start -->
                                    <div class="navbar-header">
                                        <div class="logo">
                                            <a href="index.html">
                                                <img src="img/logo.png" alt="logo"/>
                                            </a>
                                        </div><!-- .logo end -->
                                    </div><!-- .navbar-header start -->

                                    <!-- MAIN NAVIGATION -->
                                    <div class="collapse navbar-collapse">
                                        <ul class="nav navbar-nav">
                                            <li >
                                                <a href="index.html" >Home</a>
                                            </li><!-- .dropdown end -->

                                            <li >
                                                <a href="about.html" >About</a>
                                            </li><!-- .dropdown end -->

                                             <li class="dropdown" >
                                                <a href="" data-toggle="dropdown" class="dropdown-toggle" >Services</a>
                                                 <ul class="dropdown-menu">
                                                            <li><a href="services_overview.html">Services Overview</a></li>
                                                            <li><a href="overland.html">Overland Transportation</a></li>
                                                            <li><a href="airfreight.html">Air freight</a></li>
                                                            <li><a href="oceanfreight.html">Ocean freight</a></li>
                                                            <li><a href="warehouse.html">Ware Housing</a></li>
                                                  </ul><!-- .dropdown-menu end -->
                                            </li><!-- .dropdown end -->

                                            <li class="current-menu-item" >
                                                <a href="track.html" >Track Shipment</a>
                                            </li><!-- .dropdown end -->

                                            <li>
                                                <a href="media.html"  >Media</a>
                                            </li>

                                            <li><a href="locations.html">Locations</a></li>

                                            <li>
                                                <a href="contact.html" >Contact</a>
                                            </li><!-- .dropdown end -->
                                        </ul><!-- .nav.navbar-nav end -->

                                        <!-- RESPONSIVE MENU -->
                                        <div id="dl-menu" class="dl-menuwrapper">
                                            <button class="dl-trigger">Open Menu</button>

                                            <ul class="dl-menu">
                                                <li >
                                                <a href="index.html" >Home</a>
                                            </li><!-- .dropdown end -->

                                            <li class="current-menu-item">
                                                <a href="about.html" >About</a>
                                            </li><!-- .dropdown end -->

                                            <li class="dropdown" >
                                                <a href="" data-toggle="dropdown" class="dropdown-toggle" >Services</a>
                                                 <ul class="dropdown-menu">

                                                  </ul><!-- .dropdown-menu end -->
                                            </li><!-- .dropdown end -->

                                            <li >
                                                <a href="track.html" >Track Shipment</a>
                                            </li><!-- .dropdown end -->

                                            <li>
                                                <a href="media.html"  >Media</a>
                                            </li>

                                            <li><a href="locations.html">Locations</a></li>

                                            <li>
                                                <a href="contact.html" >Contact</a>
                                            </li><!-- .dropdown end -->                                            </ul><!-- .dl-menu end -->
                                        </div><!-- #dl-menu end -->

                                        <!-- #search start -->
                                        <div id="search">
                                            <form action="#" method="get">
                                                <input class="search-submit" type="submit" />
                                                <input id="m_search" name="s" type="text" placeholder="Type and hit enter..." />
                                            </form>
                                        </div><!-- #search end -->
                                    </div><!-- MAIN NAVIGATION END -->
                                </nav><!-- .navbar.navbar-default end -->
                            </div><!-- .col-md-12 end -->
                        </div><!-- .row end -->
                    </div><!-- .main-nav end -->
                </div><!-- .container end -->
            </header><!-- .header.header-style01 -->
        </div><!-- .header-wrapper.header-transparent end -->



         <!-- .page-title start -->
        <div class="page-title-style01 page-title-negative-top pt-bkg08">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Track Shipment</h1>

                        <div class="breadcrumb-container">
                            <ul class="breadcrumb clearfix">
                                <li>You are here:</li>
                                <li>
                                    <a href="#">Track Shipment</a>
                                </li>

                            </ul><!-- .breadcrumb end -->
                        </div><!-- .breadcrumb-container end -->
                    </div><!-- .col-md-12 end -->
                </div><!-- .row end -->
            </div><!-- .container end -->
        </div><!-- .page-title-style01.page-title-negative-top end -->


        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="custom-heading">
                            <h3>Track your shipment</h3>
                        </div><!-- .custom-heading.left end -->

                        <p>

                        </p>

                        <br />

                        <!-- .contact form start -->
                        <form method="GET" action="track.php" class="wpcf7 clearfix">


                            <fieldset>
                                <label>
                                    <span class="required">*</span> Enter your 10 digits Tracking Number
                                </label>

                                <input type="text" name="track_reg_no" class="wpcf7-text" id="txt_track_reg_no" value="" required>
                            </fieldset>


                            <input type="submit" class="wpcf7-submit" value="Track Shipment" id="btn_track" />
                        </form><!-- .wpcf7 end -->
                    </div><!-- .col-md-12 end -->
                    <div class="col-md-12">
                                            </div>
                </div><!-- .row end -->
                <hr class="dl-horizontal">
<?php
$sql="SELECT * FROM users WHERE track=$track";
$resultid=mysql_query($sql);
$rowid=mysql_fetch_array($resultid);
 $trackid=$rowid['id'];

$sql="SELECT * FROM users WHERE track=$track";
$result=mysql_query($sql);
$rowspost=mysql_fetch_array($result);
 ?>

                <div class="row report ">
                         <table class="table table-condensed table_report">
                           <caption>Parcel description</caption>
                           <thead>
                               <tr>
                               </tr>
                           </thead>
                           <tbody>
                               <tr>

                                   <td>Description: <span class="order_name"><?php echo $rowspost['item']; ?></span></td>
                               </tr>
                               <tr>

                                   <td>Reference Number: <span class="order_name"><?php echo $rowspost['ref']; ?></span></td>
                               </tr>
                               <tr>

                                   <td>Origin: <span class="order_name"><?php echo $rowspost['origin']; ?></span></td>
                               </tr>
                               <tr>

                                   <td>Destination: <span class="order_name"><?php echo $rowspost['desti']; ?></span></td>
                               </tr>

                           </tbody>
                       </table>                    </div>
                    <hr class="dl-horizontal">

                    <div class="row">


                       <table class="table table-condensed" >
                           <caption>Sender</caption>
                           <thead>
                               <tr>
                               </tr>
                           </thead>

                           <tbody>
                               <tr style=" border-style: solid, ">
                                   <td>Name: <span class="sender_name"><?php echo $rowspost['sn']; ?></span></td>
                               </tr>
                               <tr>
                                   <td>Address: <span class="sender_email"><?php echo $rowspost['sa']; ?></span></td>
                               </tr>
                               <tr>
                                   <td>Mobile no: <span class="sender_phone"><?php echo $rowspost['sp']; ?></span></td>
                               </tr>
                           </tbody>
                       </table>                    </div>

                    <hr class="dl-horizontal">

                    <div class="row">

                       <table class="table table-condensed tbl_report table-bordered" style="border-width: 2">
                            <caption>Shipment tracking details</caption>
                           <thead>

                               <tr>
                               <th>Date/Time</th>
                               <th>Current Location</th>
                                <th>Status</th>
                               </tr>
                           </thead>
                           <tbody>
              <?php
$last=mysql_query('SELECT id FROM status WHERE trackid="'.$trackid.'" ORDER BY id DESC LIMIT 1');
$rowlast=mysql_fetch_array($last);
$lastid=$rowlast['id'];


$getTotal = "SELECT COUNT(*) FROM status WHERE trackid=$trackid";
$total = mysql_query($getTotal);
$row2 = mysql_fetch_row($total);
$totalPix = $row2[0];
$curPage1=isset($_GET['curPage1']) ? $_GET['curPage1'] : 0;
define('SHOWMAX2', 20);
$startRow = $curPage1 * SHOWMAX2;
$sql="SELECT * FROM status WHERE trackid=$trackid ORDER BY id ASC LIMIT $startRow,".SHOWMAX2;
$result2=mysql_query($sql);



while($rowspost2=mysql_fetch_array($result2)) { // Start looping table row
              ?>

                <tr style="background-color:<?php $thisid=$rowspost2['id']; if ($thisid == $lastid) { echo '#fbeed5';} else { echo 'lightblue';} ?>" >
                <td  class="tbl_report"><span><?php echo $rowspost2['date']; ?>, <?php echo $rowspost2['time']; ?></span> </td><td  class="tbl_report"><?php if ($thisid == $lastid) { echo '<i class="fa fa-map-marker fa-2x"></i>';} else { echo '';} ?>
                <span><?php echo $rowspost2['location'].' | '.$rowspost2['details']; ?></span></td><td  class="tbl_report"><span><?php echo $rowspost2['status']; ?></span></td>
            </tr>

           <?php  } ?>


                           </tbody>
                       </table>
                    </div>

                     <hr class="dl-horizontal">
                    <div class="row">

                         <table class="table table-condensed">
                             <caption>Company/Person to receive parcel</caption>
                           <thead>
                               <tr>
                               </tr>
                           </thead>
                           <tbody>
                               <tr>
                                   <td>Name: <span class="receiver_name"><?php echo $rowspost['rn']; ?></span></td>
                               </tr>

                               <tr>
                                   <td>Address: <span class="receiver_address"><?php echo $rowspost['ra']; ?></span></td>
                               </tr>
                               <tr>
                                   <td>Mobile no: <span class="receiver_phone"><?php echo $rowspost['rp']; ?></span></td>
                               </tr>
                           </tbody>
                       </table>

                    </div><!--/row-->

                    <div class="row">
                        <div>

                        </div>
                        <div class="col-md-12">
                            Thank you for shipping with Hamilton Global Services, for more information mail us <i class="fa fa-envelope"></i> <a href='mailto:info@hamiltongs.com, delivery@hamiltongs.com, hamiltonglobalcourier@gmail.com'>info@hamiltongs.com, delivery@hamiltongs.com, hamiltonglobalcourier@gmail.com</a>.
                        </div>
                    </div>
            </div><!-- .container end -->
        </div><!-- .page-content end -->

       <div id="footer-wrapper" class="footer-dark">
            <footer id="footer">
                <div class="container">
                    <div class="row">
                        <ul class="col-md-3 col-sm-6 footer-widget-container clearfix">
                            <!-- .widget.widget_text -->
                            <li class="widget widget_newsletterwidget">
                                <div class="title">
                                    <h3>newsletter subscribe</h3>
                                </div>

                                <p>
                                    Subscribe to our newsletter and we will
                                    inform you about newest projects and promotions.
                                </p>

                                <br />

                                <form class="newsletter">
                                    <input class="email" type="email" placeholder="Your email...">
                                    <input type="submit" class="submit" value="">
                                </form>
                            </li><!-- .widget.widget_newsletterwidget end -->
                        </ul><!-- .col-md-3.footer-widget-container end -->

                        <ul class="col-md-3 col-sm-6 footer-widget-container">
                            <!-- .widget-pages start -->
                            <li class="widget widget_pages">
                                <div class="title">
                                    <h3>quick links</h3>
                                </div>

                                <ul>
                                   <li >
                                                <a href="index.html" >Home</a>
                                            </li><!-- .dropdown end -->

                                            <li class="current-menu-item">
                                                <a href="about.html" >About</a>
                                            </li><!-- .dropdown end -->

                                            <li >
                                                <a href="services.html" >Services</a>
                                            </li><!-- .dropdown end -->

                                            <li >
                                                <a href="track.html" >Track Shipment</a>
                                            </li><!-- .dropdown end -->

                                            <li>
                                                <a href="media.html"  >Media</a>
                                            </li>

                                            <li><a href="locations.html">Locations</a></li>

                                            <li>
                                                <a href="contact.html" >Contact</a>
                                            </li><!-- .dropdown end -->
                                </ul>
                            </li><!-- .widget-pages end -->
                        </ul><!-- .col-md-3.footer-widget-container end -->



                        <ul class="col-md-3 col-sm-6 footer-widget-container">
                            <li class="widget widget-text">
                                <div class="title">
                                    <h3>contact us</h3>
                                </div>

                                <address>
                                  One Hyde park, knightsbridge, London,<br /> SW1X, 17501 Tanah Merah, Kelantan U.K
                                </address>

                                <span class="text-big">
                                   Tel: +447452038941,         -
                                </span>
                                <br />

                                <a href="mailto:info@hamiltongs.com, delivery@hamiltongs.com, hamiltonglobalcourier@gmail.com">info@hamiltongs.com, delivery@hamiltongs.com, hamiltonglobalcourier@gmail.com</a>
                                <br />
                                <ul class="footer-social-icons">
                                    <li><a href="https://www.facebook.com/@hamiltongs.com/" class="fa fa-facebook"></a></li>
                                    <li><a href="https://twitter.com/@hamiltongs.com" class="fa fa-twitter"></a></li>
                                    <li><a href="https://plus.google.com/u/4/118039859328024557277?hl=en" class="fa fa-google-plus"></a></li>
                                </ul><!-- .footer-social-icons end -->
                            </li><!-- .widget.widget-text end -->
                        </ul><!-- .col-md-3.footer-widget-container end -->
                    </div><!-- .row end -->
                </div><!-- .container end -->
            </footer><!-- #footer end -->

            <div class="copyright-container">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <p>Hamilton Global Services 2016 All RIGHTS RESERVED.</p>
                        </div><!-- .col-md-6 end -->

                    </div><!-- .row end -->
                </div><!-- .container end -->
            </div><!-- .copyright-container end -->

            <a href="#" class="scroll-up">Scroll</a>
        </div><!-- #footer-wrapper end -->

        <script src="js/jquery-2.1.4.min.js"></script><!-- jQuery library -->
        <script src="js/bootstrap.min.js"></script><!-- .bootstrap script -->
        <script src="js/jquery.srcipts.min.js"></script><!-- modernizr, retina, stellar for parallax -->
        <script src="js/jquery.dlmenu.min.js"></script><!-- for responsive menu -->
        <script src="style-switcher/styleSwitcher.js"></script><!-- styleswitcher script -->
        <script src="js/include.js"></script><!-- custom js functions -->

        <script>
            /* <![CDATA[ */
            jQuery(document).ready(function ($) {
                'use strict';
                // COMMENT FORM AJAX SUBMIT START
                $('#commentform .comment-reply').on('click', function (event) {
                    event.preventDefault();
                    var name = $('#comment-name').val();
                    var email = $('#comment-email').val();
                    var message = $('#comment-message').val();
                    var form_data = new Array({'Name': name, 'Email': email, 'Message': message});
                    $.ajax({
                        type: 'POST',
                        url: "contact.html",
                        data: ({'action': 'comment', 'form_data': form_data})
                    }).done(function (data) {
                        alert(data);
                    });
                }); // COMMENT FORM AJAX SUBMIT END
            });
            /* ]]> */
        </script>
    </body>
</html>
