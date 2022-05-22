<?php
include('mysql.php');

session_start();
if ($_SESSION['authuser'] != 1) {
	header('location:Login.php');
} else {
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<!-- <meta http-equiv="refresh" content="2"> -->
		<title>Students Management</title>
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
										$mysqli = mysqli_query($con, "select*from class_room");
										while ($res = mysqli_fetch_array($mysqli)) {
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
										$mysqli = mysqli_query($con, "select*from class_room");
										while ($res = mysqli_fetch_array($mysqli)) {
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
										$mysqli = mysqli_query($con, "select*from class_room");
										while ($res = mysqli_fetch_array($mysqli)) {
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
								$countst = mysqli_query($con, "select count(s_id)from student");
								$sel = mysqli_fetch_array($countst);
								$conn = $sel[0];
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
								$male = mysqli_query($con, "select count(s_id)from student where s_gender='ທ້າວ'");
								$sel1 = mysqli_fetch_array($male);
								$m = $sel1[0];
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
								$female = mysqli_query($con, "select count(s_id)from student where s_gender='ນາງ'");
								$sel2 = mysqli_fetch_array($female);
								$fm = $sel2[0];
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
								<div class="panel-heading">
									<h3 class="panel-title">ຟອມບັນທຶກນັກຮຽນ</h3>
								</div>
								<div class="panel-body">
									<form action="save_student.php" method="get">
										<div class="col-md-12">
											<label for="">ລຸ້ນ</label>
											<?php
											$sel_gener = mysqli_query($con, "select max(gener) from up_room");
											$gen = mysqli_fetch_array($sel_gener);
											?>
											<div class="input-group" style="width: 150px">
												<span class="input-group-addon" id='minus_gen'>
													<i class="fa fa-minus-circle"></i>
												</span>
												<input type="text" name="gener" readonly id='gener' value="<?= $gen[0] ?>" class='form-control' style="width:100%">
												<span class="input-group-addon" id='add_gener'>
													<i class="fa fa-plus-circle"></i>
												</span>
											</div>
										</div>
										<div class="col-md-6">
											<?php
											$sel_std = mysqli_query($con, "select max(s_id) from student");
											$std = mysqli_fetch_array($sel_std);
											?>
											<input type="hidden" class="form-control" name='s_id' value="<?= $std[0] + 1 ?>">

											<label for="">ເລກປະຈຳຕົວ</label>
											<?php $num = rand(4, 10000); ?>
											<input type="text" class="form-control" name="s_num" value="<?php echo $num; ?>" readonly required>
											<label for="">ເພດ</label>

											<select name="s_gender" class="form-control" required>
												<option value="">ເລືອກເພດ</option>
												<option value="ທ້າວ">ທ້າວ</option>
												<option value="ນາງ">ນາງ</option>
											</select>

											<label for="">ຊື່</label>
											<input type="text" class="form-control" placeholder="ປ້ອນຊື່" name='s_fname' required>
											<label for="">ນາມສະກຸນ</label>
											<input type="text" class="form-control" placeholder="ປ້ອນນາມສະກຸນ" name='s_lname' required>
											<label for="">ວັນເດືອນປີເກີດ</label>
											<input type="date" class="form-control" placeholder="ປ້ອນວັນເດືອນປີເກີດ" name='s_dob' required>
											<label for="">ແຂວງ</label>

											<select name="pro_name" id='pro_name' class="form-control pro_name" required>
												<option value="">ເລືອກແຂວງ</option>
												<?php
												$sel_pro = mysqli_query($con, "select*from province");
												while ($pro = mysqli_fetch_array($sel_pro)) {
													echo "<option value='$pro[1]'>$pro[1]</option>";
												}
												?>
											</select>

											<label for="">ເມືອງ</label>
											<select class="form-control" name='dis_name' id='dis_name' required>
												<option value="">ເລືອກເມືອງ</option>
											</select>

											<label for="">ບ້ານ</label>
											<select class="form-control" name='vill_name' id='vill_name' required>
												<option value="">ເລືອກບ້ານ</option>
											</select>
										</div>
										<div class="col-md-6">
											<label for="">ສັນຊາດ</label>
											<input type="text" class="form-control" placeholder="ປ້ອນສັນຊາດ" name='national' required>
											<label for="">ຊົນເຜົ່າ</label>
											<input type="text" class="form-control" placeholder="ປ້ອນຊົນເຜົ່າ" name='trib' required>
											<label for="">ສາສະໜາ</label>
											<input type="text" class="form-control" placeholder="ປ້ອນສາສະໜາ" name='plash' required>
											<label for="">ເບີໂທລະສັບ</label>
											<input type="text" class="form-control" placeholder="ປ້ອນເບີໂທ" name='s_tel' required>
											<label for="">ຫ້ອງ</label>
											<?php
											include 'mysql.php';
											$class_id = $_REQUEST['class_id'];
											$rooms = mysqli_query($con, "select class_id,class_name from class_room where class_id='$class_id'");
											$rs = mysqli_fetch_array($rooms);
											?>
											<input type="hidden" class="form-control" name="class_id" value="<?php echo $class_id; ?>" readonly required>
											<input type="text" class="form-control" value="<?php echo $rs[1]; ?>" readonly required>

											<label for="">ສົກຮຽນ</label>
											<input type="text" class="form-control" name='part' value="<?php echo $curyear . '-' . $nextyear; ?>" readonly required>

											<label for="">ສະຖານະ</label>
											<select class="form-control" name='s_status' required>
												<option value="">ເລືອກສະຖານະ</option>
												<option value="ເຂົ້າ">ເຂົ້າ</option>
												<option value="ອອກ">ອອກ</option>
												<option value="ຍ້າຍ">ຍ້າຍ</option>
											</select>
											<label for="">ໝາຍເຫດ</label>
											<textarea class="form-control" placeholder="ໝາຍເຫດ" name='s_remark'></textarea>

										</div>
								</div>
								<div class="panel-footer">
									<button type="submit" class="btn btn-red btn-sm"> ບັນທຶກ</button>
									<button type="reset" class="btn btn-default btn-sm"> ຍົກເລີກ</button>
								</div>


								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
		error_reporting(~E_NOTICE);
		include 'Pugin_JS.php'
		?>

		<script>
			$('#add_gener').click(function() {
				var gener = $("#gener").val();
				$.post('get_gener.php', {
					gener: gener
				}, function(show_gener) {
					$('#gener').val(show_gener);
				});
			});


			$('#minus_gen').click(function() {
				var gener = $("#gener").val();
				$.post('minus_gener.php', {
					gener: gener
				}, function(show_gener) {
					$('#gener').val(show_gener);
				});
			});



			$('#pro_name').change(function() {


				var pro_name = $('#pro_name').val();

				console.log("pro_name---->", pro_name)

				$.post('get_district2.php', {
						pro_name: pro_name
					},
					function(show_dis) {
						console.log("show_dis---->", show_dis)
						$('#dis_name').html(show_dis);
					});
			});

			$('#dis_name').change(function() {
				var dis_name = $('#dis_name').val();
				$.post('get_village.php', {
						dis_name: dis_name
					},
					function(show_vill) {
						$('#vill_name').html(show_vill);
					});
			});
		</script>
	</body>

	</html>
<?php } ?>