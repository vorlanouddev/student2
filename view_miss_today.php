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
<?php 
include('pugin_css.php');
?>
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
					<ul class="h-list m-t">
						<li class="active"><a href="#"><i class="fa fa-clock-o text-success"></i> ປະຫວັດການຮຽນຜ່ານມາ</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-9 col-md-9 col-sm-9 col-xs-12">
			<div class="row">

				<div class="panel panel-default">
					<div class="panel-heading" style="height: 40px!important">

						<?php 
						include 'mysql.php';
						$class_id=$_GET['class_id'];
						$getcl=mysqli_query($con,"select*from class_room where class_id='$class_id'");
						$cid=mysqli_fetch_array($getcl);
						?>
						<h3 class="panel-title">ບັນທືກໝາຍຂາດປະຈຳວັນ
							<?php echo $cid['class_name'] ?>
							<input type="text" name="part" value="<?php echo $r_part;?>" style="width: 100px;float: right;border:none;margin-top: -5px;background-color: transparent;" readonly>
							<font style="float: right;"> &nbsp;ສົກຮຽນ: &nbsp;</font>
						</h3>
					</div>
					<div class="panel-body">

						<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>

									<th width='5%'>ລຳດັບ</th>
									<th width='25%'>ຊື່ ແລະ ນາມສະກຸນ</th>
									<th width='15%'>ວິຊາ</th>
									<th width='13%'>ຊົ່ວໂມງຂາດ</th>
									<th width='15%'>ເຫດຜົນ</th>
									<th width='9%'>ແກ້ໄຂ</th>

								</tr>
							</thead>
							<tbody>
								<?php 
								include 'mysql.php';
								$class_id=$_GET['class_id'];
								$student=mysqli_query($con,"select*from view_miss where  date(miss_date)=date(curdate()) and m_part='$r_part'");
								$i=1;
								while($st=mysqli_fetch_array($student)){
									?>
									<tr title="<?php echo $st['user'].' '.$st['time'];?>">

										<td>
											<?php echo $i; ?>
										</td>

										<td>
											<?php echo $st['s_gender'] ?>
											<?php echo $st['s_fname'] ?>
											<?php echo $st['s_lname'] ?>
										</td>
										<td>
											<?php echo $st['sub_name'] ?>
										</td>
										<td>
											<?php echo $st['miss_hours'] ?>
										</td>
										<td>
											<?php echo $st['miss_reason'] ?>
										</td>
										<td>
											<div class="btn-group" style="margin-top:-17px !important">
												<a href="edit_miss.php?<?=$st['miss_id']?> && class_id=<?php echo $class_id;?>" class="btn btn-default btn-xs"><i class="fa fa-edit"></i></a>
												<a href="delete_miss.php?miss_id=<?php echo $st['miss_id'];?> && class_id=<?php echo $class_id;?>" class="btn btn-default btn-xs" onclick="return confirm('ທ່ານຕ້ອງການລຶບຂໍ້ມູນນີ້ແທ້ບໍ່ ?')"><i class="fa fa-trash"></i></a>
											</div>
										</td>

									</tr>

									<?php $i++;} ?>
								</tbody>
							</table>

						</div>

					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<!--
<div class="modal fade " id="show_edit_miss">
<div class="modal-dialog modal-lg">

	<div class="modal-content ">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		</div>
		<div class="modal-body" id="show_miss">

		</div>

	</div>
</div>
</div>
-->
<?php include 'Pugin_JS.php'; ?>
<script>
// $(function() {
// $('.edit-miss').click(function() {
// var m_id = $(this).attr('m_id');
// $.ajax({
// url: 'edit_miss.php',
// type: 'POST',
// data: {
// m_id: m_id
// },
// success: function(show) {
// $('#show_miss').html(show);
// $('#show_edit_miss').modal('show');
//
// }
// });
// });
// });

</script>

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
	$insert=mysqli_query($con,"insert into tb_miss values('','$s_id','$sub_id','$time','$hours','$reason','$user','$part','$time')");
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
