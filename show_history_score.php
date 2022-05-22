<?php
include('mysql.php');
error_reporting(~E_NOTICE);
session_start();
if($_SESSION['authuser']!=1){
	header('location:Login.php');
}
else{
	?>
	<!doctype html>
	<script type="text/javascript">
		function Export(mytblId) {
			var htmldiv = document.getElementById('data');
			var html = htmldiv.outerHTML;
			window.open('data:application/vnd.ms-excel,' + encodeURIComponent(html));
		}

	</script>
	<html class="no-js" lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<!--	<meta http-equiv="refresh" content="2">-->
		<title>Students Management</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
		label{margin-top: 1%;}
		.rotate {
			text-align: left;
			white-space: nowrap;
			vertical-align: middle;
			width: 3em;
			height: 9em;
		}
		.rotate div {
			-moz-transform: rotate(-90.0deg);  /* FF3.5+ */
			-o-transform: rotate(-90.0deg);  /* Opera 10.5 */
			-webkit-transform: rotate(-90.0deg);  /* Saf3.1+, Chrome */
			filter:  progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083);  /* IE6,IE7 */
			-ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083)"; /* IE8 */
			margin-left: -4.5em;
			margin-right: -10em;
		}
		th {
			font-family:phetsarath OT;
			border: 1px black solid;

		}
		td {
			font-family:phetsarath OT;
			border: 1px black solid;
			padding: 5px;
		}
	</style>
</head>

<body>
	<?php include 'menu.php' ?>
	<div class="mailbox-view-area mg-tb-15">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3 col-md-3 col-sm-3 col-xs-12">
					<div class="hpanel responsive-mg-b-30">
						<div class="panel-body">
							<div class="dropdown custonfile">
								<a class="dropdown-toggle btn btn-primary btn-block" href="#" data-toggle="dropdown">
									ເພີ່ມຄະແນນ
								</a>
								<ul class="dropdown-menu filedropdown m-l">
									<?php
									include 'mysql.php';
									$mysqli=mysqli_query($con,"select*from class_room");
									while($res=mysqli_fetch_array($mysqli)){
										echo "<li><a href='add_score.php?class_id=$res[0]'><i class='fa fa-angle-double-right'></i> $res[2]</a></li>";
									}
									?>
								</ul>
							</div>
							<ul class="mailbox-list">
								<?php 
								include 'mysql.php';
								$mysqli=mysqli_query($con,"select*from class_room");
								while($res=mysqli_fetch_array($mysqli)){
									echo "<li><a href='view_score.php?view_sc=$res[0]'><i class='fa fa-angle-double-right'></i> $res[2]</a></li>";
								}
								?>
							</ul>
							<hr>
							<ul class="mailbox-list">
								<li>
									<div class="dropup custonfile">
										<a class="dropdown-toggle btn btn-primary btn-block" href="#" data-toggle="dropdown">
											<i class="fa fa-arrow-circle-up"></i> ຄະແນນ 7 ຂື້ນໄປ
										</a>
										<ul class="dropdown-menu filedropdown m-l">
											<li class="btn btn-block btn-red" style="text-align: center;font-weight: bold;">ຄະແນນ 7 ຂື້ນໄປ</li>
											<?php
											include 'mysql.php';
											$mysqli=mysqli_query($con,"select*from class_room");
											while($res=mysqli_fetch_array($mysqli)){
												echo "<li><a href='Max_scores.php?view_sc=$res[0]'><i class='fa fa-angle-double-right'></i> $res[2]</a></li>";
											}
											?>
										</ul>
									</div>
								</li>
								<li>
									<div class="dropup custonfile">
										<a class="dropdown-toggle btn btn-primary btn-block" href="#" data-toggle="dropdown">
											<i class="fa fa-arrow-circle-down"></i> ຄະແນນ 5 ລົງມາ
										</a>
										<ul class="dropdown-menu filedropdown m-l">
											<li class="btn btn-block btn-red" style="text-align: center;font-weight: bold;">ຄະແນນ 5 ລົງມາ</li>
											<?php
											include 'mysql.php';
											$mysqli=mysqli_query($con,"select*from class_room");
											while($res=mysqli_fetch_array($mysqli)){
												echo "<li><a href='view_5down.php?view_sc=$res[0]'><i class='fa fa-angle-double-right'></i> $res[2]</a></li>";
											}
											?>
										</ul>
									</div>
								</li>
								<li>
									<div class="dropup custonfile">
										<a class="dropdown-toggle btn btn-default btn-block" href="#" data-toggle="dropdown">
											<i class="fa fa-bookmark"></i> ຜົນການຮຽນຜ່ານມາ
										</a>
										<ul class="dropdown-menu filedropdown m-l">
											<li class="btn btn-block btn-red" style="text-align: center;font-weight: bold;">ຜົນການຮຽນຜ່ານມາ</li>
											<?php
											include 'mysql.php';
											$mysqli=mysqli_query($con,"select*from class_room");
											while($res=mysqli_fetch_array($mysqli)){
												echo "<li><a href='history_score.php?view_sc=$res[0]'><i class='fa fa-angle-double-right'></i> $res[2]</a></li>";
											}
											?>
										</ul>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-9 col-md-9 col-sm-9 col-xs-12">
					<div class="panel panel-default">
						<div class="panel-heading red">
							<h3 class="panel-title">ຄົ້ນຫາຜົນການຮຽນທີ່ຜ່ານມາ</h3>
						</div>
						<div class="panel-body">
							<form action="show_history_score.php" method="POST" role="form">
								<?php
								$cl_id=$_POST['view_sc'];
								?>
								<input type="hidden" name='view_sc' value="<?=$cl_id?>">
								<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
									<div class="form-group">
										<label for="">ເລືອກລຸ້ນ</label>
										<select name="gener" id="gener" class="form-control" required>
											<option value="">ເລືອກລຸ້ນ</option>
											<?php
											$sel_gener=mysqli_query($con,"select gener from up_room group by gener");
											while($gener=mysqli_fetch_array($sel_gener)){
												echo "<option value='$gener[0]'>$gener[0]</option>";
											}
											?>
										</select>

									</div>
								</div>
								<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
									<div class="form-group">
										<label for="">ເລືອກສົກຮຽນ</label>
										<select name="part" id="part" class="form-control" required>
											<option value="">ກະເລືອກສົກຮຽນ</option>
										</select>

									</div>
								</div>
								<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
									<div class="form-group">
										<label for="">ເດືອນ</label>
										<select class="form-control" name='month' required>
											<option value="<?php echo $month1;?>">
												<?php include('function_month.php');?>
											</option>
											<option value="01">ມັງກອນ</option>
											<option value="02">ກຸມພາ</option>
											<option value="03">ມີນາ</option>
											<option value="04">ເມສາ</option>
											<option value="05">ພຶດສະພາ</option>
											<option value="06">ມິຖຸນາ</option>
											<option value="07">ກໍລະກົດ</option>
											<option value="08">ສິງຫາ</option>
											<option value="09">ກັນຍາ</option>
											<option value="10">ຕຸລາ</option>
											<option value="11">ພະຈິກ</option>
											<option value="12">ທັນວາ</option>
										</select>
									</div>
								</div>

								<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
									<div class="form-group" style='margin-top:28px;'>
										<button type="submit" class="btn btn-red">ຄົ້ນຫາ</button>
										<button type="reset" class="btn btn-default">ຍົກເລີກ</button>
									</div>
								</div>




							</form>

						</div>
					</div>






					<div class="btn-group" style="float: right;margin-top: -10px;margin-right: -5px" data-toggle="tooltip" data-placement="left" title="ສົ່ງອອກເປັນ Excel">
						<button type='submit' class="btn btn-default btn-sm" onclick="Export();"><i class="fa fa-file-excel-o"></i></button>
					</div>
					<div class="hpanel email-compose mailbox-view mg-b-15" id="data">
						<?php 
						$cl_id=$_GET['view_sc'];
						$class_id=$_POST['view_sc'];
						$gener=$_POST['gener'];
						$part=$_POST['part'];
						$month=$_POST['month'];
						$shows=mysqli_query($con,"select class_name,class_id from class_room where class_id='$class_id'");
						$sw=mysqli_fetch_array($shows);
						$sc=$sw[0];
						?>
						<div class="panel-heading" style="background-color:#CC3030;color:white;text-align:center">
							<h2 class="panel-title">ຜົນການຮຽນ
								<?php echo $sc;?> ປະຈຳເດືອນ
								<?php echo $month.' '.'ສົກຮຽນ'.' '.$part;?>
							</h2>
						</div>
						<table class="table table-hover table-striped" border=1>
							<thead>
								<tr>
									<th style="width: 3%">#</th>
									<th style="width: 20%">ຊື່ ແລະ ນາມສະກຸນ</th>
									<?php
									include 'mysql.php';
									$sqli=mysqli_query($con,"select*from subject");
									while($sj=mysqli_fetch_array($sqli)){
										?>
										<th class='rotate' style="width: 25px">
											<div style="margin-top: -20px!important;width: 140px">
												<?php
												echo $sj['sub_name'] ;
												?>

											</div><br><br><br>
											<div class="clear"></div>
										</th>
										<?php } ?>
										<th class='rotate'>
											<div style="margin-top: -20px!important;width: 140px">ລວມ</div><br><br><br>
										</th>
										<th class='rotate'>
											<div style="margin-top: -20px!important;width: 140px">ສະເລ່ຍ</div><br><br><br>
										</th>
										<th class='rotate'>
											<div style="margin-top: -20px!important;width: 140px">ອັນດັບທີ</div><br><br><br>
										</th>
										<th class='rotate'>
											<div style="margin-top: -20px!important;width: 140px">ຄູນສົມບັດ</div><br><br><br>
										</th>
										<th class='rotate'>
											<div style="margin-top: -20px!important;width: 140px">ອອກແຮງງານ</div><br><br><br>
										</th>
										<th class='rotate'>
											<div style="margin-top: -20px!important;width: 140px">ລວມຊົ່ວໂມງຂາດ</div><br><br><br>
										</th>
										<th>
											ໝາຍເຫດ
										</th>
									</tr>
								</thead>
								<tbody>
									<?php
									include 'mysql.php';
									$i=1;
									$class_id=$_POST['view_sc'];
									$gener=$_POST['gener'];
									$part=$_POST['part'];
									$month=$_POST['month'];
									$std=mysqli_query($con,"select*from view_uproom1 where class_id='$class_id' and part='$part' and gener='$gener' order by s_fname asc");
									while($st=mysqli_fetch_array($std)){
										?>
										<tr>
											<td>
												<?php echo $i ?>
											</td>
											<td>
												<?php echo $st['s_gender'].' '.$st['s_fname'].' '.$st['s_lname']; ?>
											</td>
											<?php
											include 'mysql.php';
											$sqli=mysqli_query($con,"select*from subject");
											while($sj=mysqli_fetch_array($sqli)){
												?>
												<?php
												include 'mysql.php';
												$a=0;
												$s_id=$st['s_id'];
												$sub_id=$sj['sub_id'];
												$class_id=$_POST['view_sc'];
												$gener=$_POST['gener'];
												$part=$_POST['part'];
												$month=$_POST['month'];
												$score=mysqli_query($con,"select*from view_score where s_id='$s_id' and sub_id='$sub_id' and p_month='$month' and p_part='$part' and gener='$gener'");
												while($sr=mysqli_fetch_array($score)){
													?>
													<td style="text-align: center">
														<?php
														$point= $sr['point'] ;
														if($point==""){
															echo "<div style='color:red'>$a</div>";
														}
														elseif($point<5){
															echo "<div style='color:red'>$point</div>";
														}elseif($point>7){
															echo "<div style='color:blue'>$point</div>";
														}
														else{
															echo "<div style='color:black'>$point</div>";
														}
														?>
													</td>

													<?php $a; } ?>

													<?php } ?>
													<td>
														<?php
														include 'mysql.php';
														$s_id=$st['s_id'];
														$sub_id=$sj['sub_id'];
														$class_id=$_POST['view_sc'];
														$gener=$_POST['gener'];
														$part=$_POST['part'];
														$month=$_POST['month'];
														$sum=mysqli_query($con,"select score from ranks where s_id='$s_id' and r_month='$month' and r_part='$part' and class_id='$class_id'");
														while($sm=mysqli_fetch_array($sum)){
															$sc=$sm['0'];
															if($sc==''){
																echo "<div style='color:red'>00</div>";
															}else{
																echo $sc;
															}
														}
														?>
													</td>
													<td>
														<?php
														include 'mysql.php';
														$s_id=$st['s_id'];
														$sub_id=$sj['sub_id'];
														$class_id=$_POST['view_sc'];
														$gener=$_POST['gener'];
														$part=$_POST['part'];
														$month=$_POST['month'];
														$count_sub=mysqli_query($con,"select count(sub_id) from subject");
														$count=mysqli_fetch_array($count_sub);
														$av=mysqli_query($con,"select sum(point) from view_score where s_id='$s_id' and p_month='$month' and p_part='$part' and gener='$gener' and class_id='$class_id'");
														
														while($aver=mysqli_fetch_array($av)){
															$average= $aver['0']/$count[0];
															echo number_format($average,1);
														}
														?>
													</td>
													<td>
														<?php
														include 'mysql.php';

														$cl_id=$_REQUEST['view_sc'];
														$sid=$st['s_id'];
														$class_id=$_POST['view_sc'];
														$gener=$_POST['gener'];
														$part=$_POST['part'];
														$month=$_POST['month'];
														$ranks=mysqli_query($con,"SELECT 1 + (SELECT count( * )
															FROM ranks a WHERE a.score > b.score and class_id='$class_id' AND r_month='$month' and r_part='$part') AS rank,score FROM
															ranks b where s_id='$sid'");
														while ($rank=mysqli_fetch_array($ranks)) {
															echo $rank[0];

														}
														?>


													</td>

													<td>0</td>
													<td>0</td>
													<td>
														<?php
														$s_id=$st['s_id'];
														$cl_id=$_REQUEST['view_sc'];
														$class_id=$_POST['view_sc'];
														$gener=$_POST['gener'];
														$part=$_POST['part'];
														$month=$_POST['month'];
														$cmiss=mysqli_query($con,"select sum(miss_hours) from view_miss where class_id='$class_id' and s_id='$s_id' and month(miss_date)='$month' and m_part='$part' and gener='$gener'");
														while($miss=mysqli_fetch_array($cmiss)){
															echo $miss['0'];
														}
														?>
													</td>
													<td style="text-align: center">
														<?php
														$s_id=$st['s_id'];
														$cl_id=$_REQUEST['view_sc'];
														$class_id=$_POST['view_sc'];
														$gener=$_POST['gener'];
														$part=$_POST['part'];
														$month=$_POST['month'];
														$count_sub=mysqli_query($con,"select count(sub_id) from subject");
														$count=mysqli_fetch_array($count_sub);
														$av=mysqli_query($con,"select sum(point) from view_score where s_id='$s_id' and p_month='$month' and p_part='$part' and class_id='$class_id'");
														while($aver=mysqli_fetch_array($av)){
															$average= $aver['0']/$count[0];
															if($average<5.0){
																echo "<div style='color:red;font-weight:bold'>ຕົກ</div>";
															}elseif($average>=7){
																echo "<div style='color:blue;font-weight:bold'>ໄດ້ສົມບູນ</div>";
															}
															elseif($average>=5){
																echo "<div style='color:#FFA200;font-weight:bold'>ອານຸລົມ</div>";
															}else{
																echo "<div style='color:black;font-weight:bold'>ໄດ້</div>";

															}
															
														}
														?>
													</td>
												</tr>
												<?php $i++;} ?>
											</tbody>
										</table>
										<div class="panel-body" style="height: 100px;border:1px dashed red;font-weight: bold;">
											<div class="col-sm-3">
												ໄດ້ສົມບູນ:<br>
												ອານຸລົມ:<br>
												ຕົກ:<br>
											</div>
											<?php
											include('mysql.php');
											$cl_id=$_REQUEST['view_sc'];
											$class_id=$_POST['view_sc'];
											$gener=$_POST['gener'];
											$part=$_POST['part'];
											$month=$_POST['month'];
											$count_sub=mysqli_query($con,"select count(sub_id) from subject");
											$count=mysqli_fetch_array($count_sub);
											$sub=$count[0];
											
								// ຈຳນວນ ເສັງຕົກ
											$sel_fail=mysqli_query($con," select count(r_id) as average from ranks where (score/'$sub' <5.0) and class_id='$class_id' and r_month='$month' and r_part='$part' ");
											$count_fail=mysqli_fetch_array($sel_fail);
								// ຈຳນວນ ອານຸລົມ
											$sel_good=mysqli_query($con," select count(r_id) as average from ranks where (score/'$sub') between '5.0' and '6.9' and class_id='$class_id' and r_month='$month' and r_part='$part'");
											$count_good=mysqli_fetch_array($sel_good);
											
								// ຈຳນວນ ເສັງໄດ້ສົມບູນ
											$sel_best=mysqli_query($con," select count(r_id) as average from ranks where (score/'$sub'>7 ) and class_id='$class_id' and r_month='$month' and r_part='$part'");
											$count_best=mysqli_fetch_array($sel_best);
											?>
											<div class="col-sm-3">
												<?php echo $count_best[0]; ?> ຄົນ<br>
												<?php echo $count_good[0]; ?> ຄົນ<br>
												<?php echo $count_fail[0]; ?> ຄົນ<br>
											</div>
											<div class="col-sm-3"></div>
											<div class="col-sm-3"></div>
										</div>



									</div>
								</div>
							</div>
						</div>
					</div>

					<?php include 'pugin_js.php'; ?>
					<script>
						function printlayer(layer) {
							var print = document.getElementById(layer);
							var mv = window.open(",'name',");
							mv.document.write(print.outerHTML.replace("print me"));
							mv.document.close();
							mv.focus();
							mv.print();
							mv.close();
						}
						$(function() {
							$('#gener').change(function() {
								var gener = $('#gener').val();
								$.post('show_history_std.php', {
									gener: gener
								},
								function(show) {
									$('#part').html(show);
								});
							});
						});

					</script>
				</body>

				</html>
				<?php
			}
			?>