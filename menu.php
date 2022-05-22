<!doctype html>
<html class="no-js" lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Students Management</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Google Fonts
============================================ -->
	<link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
	<link rel="stylesheet" href="settings.css">
	<!-- Bootstrap CSS
============================================ -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- datatable -->
	<!-- =========================================== -->
	<link rel="stylesheet" href="datatables/dataTables.bootstrap4.css">
	<!-- Bootstrap CSS
============================================ -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- owl.carousel CSS
============================================ -->
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/owl.theme.css">
	<link rel="stylesheet" href="css/owl.transitions.css">
	<!-- animate CSS
============================================ -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- normalize CSS
============================================ -->
	<link rel="stylesheet" href="css/normalize.css">
	<!-- meanmenu icon CSS
============================================ -->
	<link rel="stylesheet" href="css/meanmenu.min.css">
	<!-- main CSS
============================================ -->
	<link rel="stylesheet" href="css/main.css">
	<!-- morrisjs CSS
============================================ -->
	<link rel="stylesheet" href="css/morrisjs/morris.css">
	<link rel="stylesheet" href="Lib/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- mCustomScrollbar CSS

============================================ -->
	<link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
	<!-- metisMenu CSS
============================================ -->
	<link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
	<link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
	<!-- calendar CSS
============================================ -->
	<link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
	<link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
	<!-- style CSS
============================================ -->
	<link rel="stylesheet" href="style.css">
	<!-- responsive CSS
============================================ -->
	<link rel="stylesheet" href="css/responsive.css">
	<!-- modernizr JS
============================================ -->
	<script src="js/vendor/modernizr-2.8.3.min.js"></script>
	<style>
		body{font-family: phetsarath OT !important}
.btn-vga{background-color: #7AE100 !important;color:white !important;}
.bg-red{background-color: #E30505 !important;color:white !important;}
.btn-red:hover{background-color: #B22828 !important;color:white !important;}
.btn-red{background-color: #E30505 !important;color:white !important;}
.red{
    background-color: #B22828!important;
    color: white!important
}
.red > a{
    color:white;
}
span.input-group-addon{height: 20px!important}
div.dataTables_filter input{height: 20px!important;border-radius: 5px;}
.panel-heading{padding-left: 2%!important}
.metismenu>li>a:hover{background-color: #DE4B4B!important;color:white!important;}
</style>
</head>

<body background="img/body-bg.png">
	<div class="left-sidebar-pro">
		<nav id="sidebar" class="">
			<div class="sidebar-header">
				<a href="index.php"><img src="img/logo.png" alt="" style="width: 200px;height: 60px"></a>
			</div>
			<div class="left-custom-menu-adp-wrap comment-scrollbar">
				<nav class="sidebar-nav left-sidebar-menu-pro">
					<ul class="metismenu" id="menu1">
						<li>
							<a href="students.php">
								<i class="fa big-icon fa-users icon-wrap" style="color:#E23232"></i>
								<span class="mini-click-non"> ຂໍ້ມູນນັກຮຽນ</span>
							</a>
						</li>
						<li>
							<a href="add_teacher.php" aria-expanded="false"><i class="fa big-icon fa-user-md icon-wrap" style="color:#E23232"></i>
								<span class="mini-click-non"> ຂໍ້ມູນຄູ ແລະ ອາຈານ</span></a>
						</li>
						<li>
							<a href="subjects.php" aria-expanded="false"><i class="fa big-icon fa-globe icon-wrap" style="color:#E23232"></i> <span class="mini-click-non"> ວິຊາຮຽນ</span></a>
						</li>
						<li>
							<a href="Class_room.php" aria-expanded="false"><i class="fa fa-th icon-wrap" style="color:#E23232"></i> <span class="mini-click-non"> ຫ້ອງຮຽນ</span></a>
						</li>
						<li>
							<a href="Address.php" aria-expanded="false"><i class="fa big-icon fa-file icon-wrap" style="color:#E23232"></i> <span class="mini-click-non"> ຂໍ້ມູນອ້າງອີງ</span></a>
						</li>
						<li>
							<a href="score.php" aria-expanded="false"><i class="fa big-icon fa-bar-chart icon-wrap" style="color:#E23232"></i> <span class="mini-click-non"> ຄະແນນ</span></a>
						</li>
						<li>
							<div class="dropdown custonfile">
								<a class="dropdown-toggle" href="#" data-toggle="dropdown">
									<i class="fa fa-list-ul" style="color:#E23232"></i> ລາຍງານ
								</a>
								<ul class="dropdown-menu filedropdown m-l">
									<?php
                            include 'mysql.php';
                            $mysqli=mysqli_query($con,"select*from class_room");
                            while($res=mysqli_fetch_array($mysqli)){
                                echo "<li><a href='report.php?class_id=$res[0]'><i class='fa fa-angle-double-right'></i> $res[2]</a></li>";
                            }
                            ?>
								</ul>
							</div>

						</li>
						<li>
							<a href="bin.php" aria-expanded="false"><i class="fa big-icon fa-trash icon-wrap" style="color:#E23232"></i> <span class="mini-click-non"> ຖັງຂີ້ເຫຍື້ອ</span></a>
						</li>
					</ul>
				</nav>
			</div>
		</nav>
	</div>
	<!-- Start Welcome area -->
	<div class="all-content-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="logo-pro">
						<a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
					</div>
				</div>
			</div>
		</div>
		<div class="header-advance-area">
			<div class="header-top-area">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="header-top-wraper">
								<div class="row">
									<div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
										<div class="menu-switcher-pro">
											<button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
												<i class="fa fa-bars"></i>
											</button>
										</div>
									</div>
									<div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
										<div class="header-top-menu tabl-d-n">
											<ul class="nav navbar-nav mai-top-nav">
												<li class="nav-item"><a href="index.php" class="nav-link"><i class="fa fa-home"></i> ໜ້າຫຼັກ</a>
												</li>
												<li class="nav-item">
													<div class="dropdown custonfile" style="margin-top: 20px">
														<a class="dropdown-toggle" href="#" data-toggle="dropdown" style="color: white">
															<i class="fa fa-user-times"></i> ບັນທຶກການຂາດປະຈຳວັນ
														</a>
														<ul class="dropdown-menu filedropdown m-l">
															<?php
                                            include 'mysql.php';
                                            $mysqli=mysqli_query($con,"select*from class_room");
                                            while($res=mysqli_fetch_array($mysqli)){
                                                echo "<li><a href='add_miss.php?class_id=$res[0]'><i class='fa fa-angle-double-right'></i> $res[2]</a></li>";
                                            }
                                            ?>
														</ul>
													</div>

												</li>
												<li class="nav-item"><a href="history_students.php" class="nav-link"><i class="fa fa-list-alt"></i> ປະຫວັດນັກຮຽນ</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
										<div class="header-right-info">
											<ul class="nav navbar-nav mai-top-nav header-right-menu">
												<li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-bell-o" aria-hidden="true"></i><span class="indicator-nt"></span></a>
													<div role="menu" class="notification-author dropdown-menu animated zoomIn" style="background-color: #FFFFFF !important;color: black !important">
														<div class="notification-single-top">
															<h1 style="color: black;font-weight: bold;"> ລາຍການຂາດ </h1>
														</div>
														<ul class="notification-menu" style="color: black !important;height: 100%!important;width: 400px;">
															<li>
																<?php 
                                        $res_set=mysqli_query($con,"select*from view_miss where  date(miss_date)=date(curdate()) and m_part='$r_part' limit 5");
                                        $i=1;
                                        while($rs=mysqli_fetch_array($res_set)){
                                           ?>
																<a href="#">
																	<div class="notification-icon" style="color: black !important">
																		<img src="img/user_null.png" class="img-circle" alt="" style="width: 80px;">
																	</div>
																	<div class="notification-content" style="color: black ;width: 300px;height: auto!important">
																		<span class="notification-date">
																			<?php echo $i; ?></span>
																		<h2>
																			<?php echo $rs['s_gender'].' '.$rs['s_fname'].' '.$rs['s_lname']; ?>
																		</h2>
																		<p>ຊົ່ວໂມງ:
																			<?php echo $rs['miss_hours'] ?> ວິຊາ:
																			<?php echo $rs['sub_name'] ?> ຜູ້ສອນ:
																			<?php echo $rs['teach_fname'] ?>
																		</p>
																	</div>
																</a>
																<?php $i++;} ?>
															</li>
														</ul>
														<div class="notification-view" style="color: black !important">
															<a href="view_miss_today.php" class="btn btn-red btn-xs">ເບິ່ງລາຍລະອຽດ</a>
														</div>
													</div>
												</li>
												<li class="nav-item">
													<a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
														<i class="fa fa-user adminpro-user-rounded header-riht-inf" aria-hidden="true"></i>
														<span class="admin-name">ຂໍ້ມູນຜູ້ນຳໃຊ້ລະບົບ</span>
														<i class="fa fa-angle-down adminpro-icon adminpro-down-arrow"></i>
													</a>
													<ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn" style="background-color: #FFFFFF !important;color: black !important">
														<li><a href="add_user.php" style="color: black !important"><span class="fa fa-user-plus author-log-ic"></span>ລົງທະບຽນ</a>
														</li>
														<li><a href="view_users.php" style="color: black !important"><span class="fa fa-users author-log-ic"></span> ຜູ້ນຳໃຊ້ທັງໝົດ</a>
														</li>
														<li><a href="logout.php" style="color: black !important"><span class="fa fa-lock author-log-ic"></span> ອອກຈາກລະບົບ</a>
														</li>
													</ul>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="section-admin container-fluid">
			<div class="row admin text-center">
				<div class="col-md-12">
					<div class="row" style="margin-bottom: 4%;width: 80% !important">

					</div>
				</div>
			</div>
		</div>
		<!-- jquery
============================================ -->
		<script src="js/vendor/jquery-1.11.3.min.js"></script>
		<!-- bootstrap JS
============================================ -->
		<script src="js/bootstrap.min.js"></script>
		<!-- wow JS
============================================ -->
		<script src="js/wow.min.js"></script>
		<!-- price-slider JS
============================================ -->
		<script src="js/jquery-price-slider.js"></script>
		<!-- meanmenu JS
============================================ -->
		<script src="js/jquery.meanmenu.js"></script>
		<!-- owl.carousel JS
============================================ -->
		<script src="js/owl.carousel.min.js"></script>
		<!-- sticky JS
============================================ -->
		<script src="js/jquery.sticky.js"></script>
		<!-- scrollUp JS
============================================ -->
		<script src="js/jquery.scrollUp.min.js"></script>
		<!-- mCustomScrollbar JS
============================================ -->
		<script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
		<script src="js/scrollbar/mCustomScrollbar-active.js"></script>
		<!-- metisMenu JS
============================================ -->
		<script src="js/metisMenu/metisMenu.min.js"></script>
		<script src="js/metisMenu/metisMenu-active.js"></script>
		<!-- morrisjs JS
============================================ -->
		<script src="js/morrisjs/raphael-min.js"></script>
		<script src="js/morrisjs/morris.js"></script>
		<script src="js/morrisjs/morris-active.js"></script>
		<!-- morrisjs JS
============================================ -->
		<script src="js/sparkline/jquery.sparkline.min.js"></script>
		<script src="js/sparkline/jquery.charts-sparkline.js"></script>
		<!-- calendar JS
============================================ -->
		<script src="js/calendar/moment.min.js"></script>
		<script src="js/calendar/fullcalendar.min.js"></script>
		<script src="js/calendar/fullcalendar-active.js"></script>
		<!-- plugins JS
============================================ -->
		<script src="js/plugins.js"></script>
		<!-- main JS
============================================ -->
		<script src="js/main.js"></script>
		<!-- ======================================================== -->
		<!-- datatable -->
		<script src="datatables/jquery.dataTables.js"></script>
		<script src="datatables/dataTables.bootstrap4.js"></script>
		<script src="datatables/sb-admin-datatables.min.js"></script>
		<!-- Export files -->

</body>

</html>
