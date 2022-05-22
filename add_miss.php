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
										echo "<li><a href='add_miss.php?class_id=$res[0]'><i class='fa fa-angle-double-right'></i> $res[2]</a></li>";
									}
									?>
								</ul>
							</div>
							<ul class="mailbox-list">
								<?php 
								include 'mysql.php';
								$mysqli=mysqli_query($con,"select*from class_room");
								while($res=mysqli_fetch_array($mysqli)){
									echo "<li><a href='view_miss.php?class_id=$res[0]'><i class='fa fa-angle-double-right'></i> $res[2]</a></li>";
								}
								?>
							</ul>
							<div class="dropdown custonfile">
								<a class="dropdown-toggle btn btn-primary btn-block" href="#" data-toggle="dropdown">
									<i class="fa fa-eye"></i> ປະຫວັດໝາຍຂາດທີ່ຜ່ານມາ
								</a>
								<ul class="dropdown-menu filedropdown m-l">
									<?php
									include 'mysql.php';
									$mysqli=mysqli_query($con,"select*from class_room");
									while($res=mysqli_fetch_array($mysqli)){
										echo "<li><a href='history_miss.php?class_id=$res[0]'><i class='fa fa-angle-double-right'></i> $res[2]</a></li>";
									}
									?>
								</ul>
							</div>
						</div>
					</div>

				</div>
				<div class="col-md-9 col-md-9 col-sm-9 col-xs-12">
					<div class="row">
						<form action="" method="post">
							<div class="panel panel-default">
								<div class="panel-heading" style="height: 40px!important">

									<?php 
									include 'mysql.php';
									$class_id=$_GET['class_id'];
									$getcl=mysqli_query($con,"select*from class_room where class_id='$class_id'");
									$cid=mysqli_fetch_array($getcl);
									?>
									<h3 class="panel-title">ນັກຮຽນທັງໝົດໃນ
										<?php echo $cid['class_name'] ?>
										<input type="text" name="part" value="<?php echo $r_part;?>" style="width: 100px;float: right;border:none;margin-top: -5px;background-color: transparent;" readonly>
										<font style="float: right;"> &nbsp;ສົກຮຽນ: &nbsp;</font>
									</h3>
								</div>
								<div class="panel-body">

									<input type="hidden" name="class_id" id="inputclass_id" class="form-control" value="<?=$cid[0]?>" required="required" pattern="" title="">

									<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
										<div class="form-group">
											<label for="">ເລືອກວິຊາ</label>

											<select name="sub_id" id="inputsub_id" class="form-control" required="required">
												<option value="">ເລືອກວິຊາ</option>
												<?php
												$sel_sub=mysqli_query($con,"select*from subject");
												while($sub=mysqli_fetch_array($sel_sub)){
													echo "<option value='$sub[0]'>$sub[2]</option>";
												}
												?>
											</select>

										</div>
									</div>
									<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
										<div class="form-group">
											<label for="">ເຫດຜົນ</label>

											<select name="reason" id="inputsub_id" class="form-control" required="required">
												<option value="">ເຫດຜົນ</option>
												<option value="ມີເຫດຜົນ">ມີເຫດຜົນ</option>
												<option value="ບໍ່ມີເຫັດຜົນ">ບໍ່ມີເຫດຜົນ</option>
												<option value="ເຈັບເປັນ">ເຈັບເປັນ</option>
												<option value="ມາຊ້າ">ມາຊ້າ</option>

											</select>

										</div>
									</div>
									<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
										<div class="form-group">
											<label for="">ຊົ່ວໂມງຂາດ</label>
											<input type="text" name="hours" id="inputhours" class="form-control" placeholder='ຈຳນວນຊົ່ວໂມງ' required>
										</div>
									</div>
									<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
										<div class="form-group" style="margin-top:16%;">
											<label for=""></label>

											<button type="submit" name='save' class="btn btn-red btn-sm">ບັນທືກ</button>
											<button type="reset" class="btn btn-defualt btn-sm">ຍົກເລີກ</button>

										</div>
									</div>
									<table class="table table-hover table-bordered table-striped" id='dataTable'>
										<thead>
											<tr>
												<th style="width: 10px">#</th>
												<th>ລຳດັບ</th>
												<th>ຊື່ ແລະ ນາມສະກຸນ</th>
												<th>ຫຼຸ້ນ</th>
												<th>ສົກຮຽນ</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											include 'mysql.php';
											$class_id=$_GET['class_id'];
											$student=mysqli_query($con,"select*from view_uproom1 where class_id='$class_id' and part='$r_part'");
											$i=1;
											while($st=mysqli_fetch_array($student)){
												?>
												<tr>
													<td width="50px">
														<input type="checkbox" name="s_id[]" value="<?=$st['s_id']?>" style="width: 15px;height: 15px;">
													</td>
													<td style="width: 50px;text-align: center">
														<?php echo $i; ?>
													</td>
													<td>
														<?php echo $st['s_gender'] ?>
														<?php echo $st['s_fname'] ?>
														<?php echo $st['s_lname'] ?>
													</td>
													<td style="text-align: center">
														<?php echo $st['gener'] ?>
													</td>
													<td style="text-align: center">
														<?php echo $st['part'] ?>
													</td>
												</tr>
												<?php $i++;} ?>
											</tbody>
										</table>

									</div>

								</div>
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>

		<script>
		// $(function(){
		//     $('.up').click(function(){
		//         var st_id=$(this).attr('st_id');
		//         var s_num=$(this).attr('s_num');
		//         $.ajax({
		//             url:'insert_up_room.php',
		//             type:'POST',
		//             data:{st_id:st_id,s_num:s_num},
		//             success:function(show){
		//                 $('#show_content').html(show);
		//                 $('#show_data').modal('show');

		//             }
		//         });
		//     });

		//     $('.miss').click(function(){
		//         var st_id=$(this).attr('st_id');
		//         $.ajax({
		//             url:'add_miss.php',
		//             type:'POST',
		//             data:{st_id:st_id},
		//             success:function(show){
		//                 $('#view_miss').html(show);
		//                 $('#show_miss').modal('show');

		//             }
		//         });
		//     });
		// });

	</script>
	<?php include 'Pugin_JS.php'; ?>
</body>

</html>
<?php
}
?>

<?php
if(isset($_POST['save'])){
	$sub_id=$_POST['sub_id'];
	$hours=$_POST['hours'];
	$reason=$_POST['reason'];
	$part=$_POST['part'];
	$user=$_SESSION['fname'];
	if(!empty($_POST['s_id'])){
		foreach($_POST['s_id'] as $s_id)
		{
			$insert=mysqli_query($con,"insert into tb_miss values('','$s_id','$sub_id','$time','$hours','$reason','$part','$user','$time')");
			if($insert){
				echo "<script>alert('ບັນທຶກໝາຍຂາດສໍໍຳເລັດ');location='add_miss.php?class_id=$class_id';</script>";
			}
			else{
				echo "<script>alert('ບັນທຶກໝາຍຂາດບໍ່ສຳເລັດ');location='add_miss.php?class_id=$class_id';</script>";
			}
		}
	}
	else{
		echo "error";
	}
}
?>
