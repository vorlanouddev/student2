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
								<li class="active"><a href="#"><i class="fa fa-file"></i> ຄະແນນທັງໝົດ</a></li>
								<li class="active"><a href="#"><i class="fa fa-clock-o text-success"></i> ປະຫວັດການຮຽນຜ່ານມາ</a></li>
							</ul>
						</div>
					</div>
					<div class="hpanel responsive-mg-b-30">
						<div class="panel-body file-manager-usac">
							<h3 align="center">ນັກຮຽນທັງໝົດ</h3>
							<h2 align="center">456</h2>
							<div class="progress full m-t-lg">
								<div style="width: 65%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="65" role="progressbar" class=" progress-bar progress-bar-success">
									65%
								</div>
							</div>
							<p align="center">ຊາຍ</p>
							<div class="progress full m-t-lg">
								<div style="width: 45%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="45" role="progressbar" class=" progress-bar progress-bar-warning">
									45%
								</div>
							</div>
							<p align="center">ຍິງ</p>
							<div class="progress full m-t-lg">
								<div style="width: 20%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class=" progress-bar progress-bar-danger">
									20%
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
							<div class="panel-heading" style="height: 40px!important">

								<?php 
					            include 'mysql.php';
					            $class_id=$_GET['class_id'];
					            $miss_id=$_GET['miss_id'];
					            $getcl=mysqli_query($con,"select*from class_room where class_id='$class_id'");
					            $cid=mysqli_fetch_array($getcl);
								
								$sel_up=mysqli_query($con,"select*from view_miss where miss_id='$miss_id'");
								$miss=mysqli_fetch_array($sel_up);
					           ?>
								<h3 class="panel-title">ຟອມແກ້ໄຂໝາຍຂາດປະຈຳວັນ
									<?php echo $cid['class_name'] ?>
									<input type="text" name="part" value="<?php echo $r_part;?>" style="width: 100px;float: right;border:none;margin-top: -5px;background-color: transparent;" readonly>
									<font style="float: right;"> &nbsp;ສົກຮຽນ: &nbsp;</font>
								</h3>
							</div>
							<div class="panel-body">
								<form action="save_edit_miss.php" method="POST" role="form">

									<input type="hidden" name='miss_id' value="<?=$miss_id;?>">
									<input type="hidden" name='class_id' value="<?=$class_id;?>">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<div class="form-group">
											<label for="">ເລືອກວິຊາ</label>

											<select name="sub_id" id="inputsub_id" class="form-control" required="required">
												<option value="<?=$miss['sub_id']?>">
													<?=$miss['sub_name']?>
												</option>
												<?php
                            $sel_sub=mysqli_query($con,"select*from subject");
                            while($sub=mysqli_fetch_array($sel_sub)){
                                echo "<option value='$sub[0]'>$sub[2]</option>";
                            }
                          ?>
											</select>
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<div class="form-group">
											<label for="">ເຫດຜົນ</label>

											<select name="reason" id="inputsub_id" class="form-control" required="required">
												<option value="<?=$miss['miss_reason']?>">
													<?=$miss['miss_reason']?>
												</option>
												<option value="ມີເຫດຜົນ">ມີເຫດຜົນ</option>
												<option value="ບໍ່ມີເຫັດຜົນ">ບໍ່ມີເຫດຜົນ</option>
												<option value="ເຈັບເປັນ">ເຈັບເປັນ</option>
												<option value="ມາຊ້າ">ມາຊ້າ</option>

											</select>

										</div>
									</div>

									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<label for="">ຊົ່ວໂມງຂາດ</label><input type="text" name="hours" id="inputhours" value="<?=$miss['miss_hours']?>" class="form-control" placeholder='ຈຳນວນຊົ່ວໂມງ' required>
									</div>

									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<button type="submit" class="btn btn-red">ແກ້ໄຂ</button>
										<a href="view_miss.php?class_id=<?=$class_id?>">
											<button type="button" class="btn btn-default">ຍົກເລິກ</button>

										</a>
									</div>






								</form>



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
