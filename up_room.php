<?php
include('mysql.php');
error_reporting(~E_NOTICE);
session_start();
if($_SESSION['authuser']!=1){
header('location:Login.php');
}
else{
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<!-- <meta http-equiv="refresh" content="2"> -->
<title>Students Management</title>
<style>
label{margin-top: 2%!important}
</style>
</head>

<body background="img/body-bg.png">
<?php
include 'menu.php';
?>
<div class="file-manager-area mg-tb-15">
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3 col-md-3 col-sm-3 col-xs-12">
			<div class="hpanel responsive-mg-b-30">
				<div class="panel-body">
					<div class="dropdown custonfile">
						<a class="dropdown-toggle btn btn-primary btn-block" href="#" data-toggle="dropdown">
							<i class="fa fa-plus-circle"></i> ເພີ່ມ
						</a>
						<ul class="dropdown-menu filedropdown m-l">
							<?php
							include 'mysql.php';
							$mysqli=mysqli_query($con,"select*from class_room");
							while($res=mysqli_fetch_array($mysqli)){
								echo "<li><a href='add_students.php?class_id=$res[0]'><i class='fa fa-angle-double-right'></i> $res[2]</a></li>";
							}
							?>
						</ul>
					</div>
					<div class="dropdown custonfile">
						<a class="dropdown-toggle btn btn-success btn-block" href="#" data-toggle="dropdown" style="color: white">
							<i class="fa fa-line-chart"></i> ເລື່ອນຫ້ອງ
						</a>
						<ul class="dropdown-menu filedropdown m-l">
							<?php
							include 'mysql.php';
							$mysqli=mysqli_query($con,"select*from class_room");
							while($res=mysqli_fetch_array($mysqli)){
								echo "<li><a href='up_room.php?class_id=$res[0]'><i class='fa fa-angle-double-right'></i> $res[2]</a></li>";
							}
							?>
						</ul>
					</div>
					<div class="dropdown custonfile">
						<a class="dropdown-toggle btn btn-primary btn-block" href="#" data-toggle="dropdown" style="color: white">
							<i class="fa fa-history"></i> ປະຫວັດການຮຽນທັງໝົດ
						</a>
						<ul class="dropdown-menu filedropdown m-l">
							<?php
							include 'mysql.php';
							$mysqli=mysqli_query($con,"select*from class_room");
							while($res=mysqli_fetch_array($mysqli)){
								echo "<li><a href='history_study.php?class_id=$res[0]'><i class='fa fa-angle-double-right'></i> $res[2]</a></li>";
							}
							?>
						</ul>
					</div>
				</div>
			</div>
			<div class="hpanel responsive-mg-b-30">
				<div class="panel-body file-manager-usac">
					<h3 align="center">ນັກຮຽນທັງໝົດ</h3>
					<?php 
					include 'mysql.php';
					$countst=mysqli_query($con,"select count(s_id)from student");
					$sel=mysqli_fetch_array($countst);
					$conn=$sel[0];
					?>
					<h2 align="center">
						<?php echo $conn; ?> ຄົນ</h2>
						<div class="progress full m-t-lg" data-toggle="tooltip" data-placement="top" title="<?php echo $conn; ?> ຄົນ">
							<div style="width: <?php echo $conn; ?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="<?php echo $conn; ?>" role="progressbar" class=" progress-bar progress-bar-success">
								<?php echo $conn; ?>
							</div>
						</div>
						<?php 
						include 'mysql.php';
						$male=mysqli_query($con,"select count(s_id)from student where s_gender='ທ້າວ'");
						$sel1=mysqli_fetch_array($male);
						$m=$sel1[0];
						?>
						<p align="center">ຊາຍ
							<?php echo $m; ?> ຄົນ</p>
							<div class="progress full m-t-lg" data-toggle="tooltip" data-placement="top" title="<?php echo $m; ?> ຄົນ">
								<div style="width: <?php echo $m; ?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="<?php echo $m; ?>" role="progressbar" class=" progress-bar progress-bar-warning">
									<?php echo $m; ?> ຄົນ
								</div>
							</div>
							<?php 
							include 'mysql.php';
							$female=mysqli_query($con,"select count(s_id)from student where s_gender='ນາງ'");
							$sel2=mysqli_fetch_array($female);
							$fm=$sel2[0];
							?>
							<p align="center">ຍິງ
								<?php echo $fm; ?> ຄົນ</p>
								<div class="progress full m-t-lg" data-toggle="tooltip" data-placement="top" title="<?php echo $fm; ?> ຄົນ">
									<div style="width: <?php echo $fm; ?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="<?php echo $fm; ?> ຄົນ" role="progressbar" class=" progress-bar progress-bar-danger">
										<?php echo $fm; ?> ຄົນ
									</div>
								</div>
								<p>ລາຍງານຈຳນວນນັກຮຽນທັງໝົດໃນສົກຮຽນ</p>
								<h3 align="center">2018-2019</h3>
							</div>
						</div>
					</div>
					<div class="col-md-9 col-md-9 col-sm-9 col-xs-12">
						<div class="row">
							<div class="panel panel-default">
								<div class="panel-heading red" style="height: 40px!important">
									<?php 
									include 'mysql.php';
									$class_id=$_GET['class_id'];
									$getcl=mysqli_query($con,"select*from class_room where class_id='$class_id'");
									$cid=mysqli_fetch_array($getcl);
									?>
									<h3 class="panel-title">ລາຍການເລື່ອນຊັ້ນ
										<?php echo $cid['class_name'] ?>
									</h3>
								</div>
								<div class="panel-body">
									<form action="" method='post'>
										<input type="hidden" name="class_id1" id="inputclass_id" class="form-control" value="<?=$cid[0]?>" required="required" pattern="" title="">
										<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
											<label for="">ເລືອກຫ້ອງ</label>

											<select name="class_id" id="inputclass_id" class="form-control" required>
												<?php
												$sel_class=mysqli_query($con,"select*from class_room");
												while($class=mysqli_fetch_array($sel_class)){
													echo "<option value='$class[0]'>$class[2]</option>";
												}
												?>
											</select>

										</div>

										<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
											<label for="">ສົກຮຽນ</label>
											<input type="text" class="form-control" name='part' value="<?php echo $curyear.'-'.$nextyear;?>" required>
										</div>

										<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
											<label for="">ສະຖານະ</label>
											<select name="up_status" id="" class="form-control" required>
												<option>ເລືອກສະຖານະ</option>
												<option value="ຍ້າຍຫ້ອງ">ຍ້າຍຫ້ອງ</option>
												<option value="ຂື້ນຫ້ອງ">ຂື້ນຫ້ອງ</option>
												<option value="ອອກ">ອອກ</option>
											</select>
											<?php
											$sel_gener=mysqli_query($con,"select max(gener) from up_room");
											$gen=mysqli_fetch_array($sel_gener);
											?>
											<div class="input-group hidden" style="width: 150px">
												<span class=" input-group-addon" id='minus_gen'>
													<i class="hidden fa fa-minus-circle"></i>
												</span>
												<input type="hidden" name="gener" readonly id='gener' value="<?=$gen[0]?>" class='form-control' style="width:100%">
												<span class="hidden input-group-addon" id='add_gener'>
													<i class="hidden fa fa-plus-circle"></i>
												</span>
											</div>
										</div>
										<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
											<div class="form-group" style="margin-top:30%;">
												<label for=""></label>
												<button type="submit" name='save' class="btn btn-red btn-sm"><i class="fa fa-upload"></i></button>
											</div>
										</div>
										<hr>
										<div class="dataTables_wrapper dataTables_processing">
											<table class="table table-hover" id="dataTable">
												<thead>
													<tr>
														<th width="50px">#</th>
														<th>ລຳດັບ</th>
														<th>ຊື່ ແລະ ນາມສະກຸນ</th>
														<th>ລຸ້ນ</th>
														<th>ສົກຮຽນ</th>
														<th>ຫ້ອງ</th>
														<th>ສະຖານະ</th>
													</tr>
												</thead>
												<tbody>
													<?php 
													include 'mysql.php';
													$student=mysqli_query($con,"select*from view_uproom1 where class_id='$class_id'");
													$i=1;
													while($st=mysqli_fetch_array($student)){
														?>
														<tr>
															<td width="50px">
																<input type="checkbox" name="s_id[]" value="<?=$st['s_id']?>" style="width: 15px;height: 15px;">
																<input type="hidden" name="ID[]" value="<?=$st['ID']?>" style="width: 15px;height: 15px;">
															</td>
															<td>
																<?php echo $i; ?>
															</td>
															<td>
																<?php echo $st['s_gender'].' '.$st['s_fname'].' '.$st['s_lname']; ?>
																
															</td>
															<td>
																<?php echo $st['gener'] ?>
															</td>
															<td>
																<?php echo $st['part'] ?>
															</td>
															<td>
																<?php echo $st['class_name'] ?>
															</td>
															<td>
																<?php 
																$u_st=$st['up_status'] ;
																if($u_st=='ຍ້າຍຫ້ອງ'){
																	echo "<div style='color:#FF6D2C;'>ຍ້າຍຫ້ອງ</div>";
																}elseif($u_st=='ອອກ'){
																	echo "<div style='color:#F31C1C;'>ອອກ</div>";
																}
																else if($u_st=='ຂື້ນຫ້ອງ'){
																	echo "<div style='color:#00BB46;'>ຂື້ນຫ້ອງ</div>";

																}
																else{
																	echo "";
																}
																?>
															</td>
														</tr>
														<?php $i++;} ?>
													</tbody>
												</table>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>

			<script>
				$(function() {
					$('#add_gener').click(function() {
						var gener = $("#gener").val();
						$.post('get_gener.php', {
							gener: gener
						}, function(show_gener) {
							$('#gener').val(show_gener);
						});
					});
				});
				$(function() {
					$('#minus_gen').click(function() {
						var gener = $("#gener").val();
						$.post('minus_gener.php', {
							gener: gener
						}, function(show_gener) {
							$('#gener').val(show_gener);
						});
					});
				});

			</script>
			<?php include 'Pugin_JS.php'; ?>
		</body>

		</html>
		<?php
	}
	?>

	<?php
	if(isset($_POST['save'])){
		$class_id1=$_POST['class_id1'];
		$class_id=$_POST['class_id'];
		$part=$_POST['part'];
		$gener=$_POST['gener'];
		$up_status=$_POST['up_status'];
	
		$user=$_SESSION['fname'];
		$class_name=$cid['class_name'];
		$echo=mysqli_query($con,"select class_id,class_name from up_room where class_id='$class_id1'");
		$cl=mysqli_fetch_array($echo);
		$cname=$cl['class_name'];
		
		if(!empty($_POST['s_id'])){
			foreach($_POST['s_id'] as $s_id){
	$ID=$_POST['ID'];
		$up_id=implode(',',$ID);
				$insert=mysqli_query($con,"insert into up_room values('','$s_id','$class_id','$gener','$part','','$user','$time')");
		
				if($insert){
					$update=mysqli_query($con,"update up_room set up_status='$up_status' where ID in($up_id)");
					if($update){
					echo "<script>alert('ບັນທືກການເລື່ອນຫ້ອງສຳເລັດ');location='up_room.php?class_id=$class_id1';</script>";
					}
					else{
					echo "<script>alert('update up_status error');location='up_room.php?class_id=$class_id1';</script>";

					}
				}
				else{
					echo "<script>alert('ບໍ່ສາມາດເລື່ອນຫ້ອງໄດ້');location='up_room.php?class_id=$class_id1';</script>";
				}
			}
		}
		
		
		
		
		else{
			echo "error";
		}
		print_r($_POST);
	}
	?>
