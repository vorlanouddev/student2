<?php
include('mysql.php');
session_start();
if(isset($_POST['submit'])){
$teach_fname=$_POST['teach_fname'];
$teach_lname=$_POST['teach_lname'];
$teach_gender=$_POST['teach_gender'];
$teach_dob=$_POST['teach_dob'];
$teach_address=$_POST['teach_address'];
$teach_tel=$_POST['teach_tel'];
$teach_lvl=$_POST['teach_lvl'];
$sty_branch=$_POST['sty_branch'];
$build_teach=$_POST['build_teach'];	
$user=$_SESSION['fname'];

$insert=mysqli_query($con,"insert into teacher values('','$teach_fname','$teach_lname','$teach_gender','$teach_dob','$teach_address','$teach_tel','$teach_lvl','$sty_branch','$build_teach','$user','$time')");
if($insert){
echo "<script>alert('ບັນທືກສຳເລັດ');location='add_teacher.php';</script>";
}
else{
echo "<script>alert('ບັນທືກບໍ່ສຳເລັດ');location='add_teacher.php';</script>";
}

}

?>


<?php

if($_SESSION['authuser']!=1){
header('location:Login.php');
}
else{
?>



<!doctype html>
<html class="no-js" lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Sign Up</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include 'pugin_css.php' ?>
<link rel="shortcut icon" type="image/x-icon" href="img/conky-manager_192x192.png">
<style>
body{font-family: phetsarath OT !important}
</style>
</head>

<body>
<?php include 'menu.php' ?>
<!-- Mobile Menu end -->
<div class="container-fluid" style="margin-top: 2%">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="review-tab-pro-inner">
<ul id="myTab3" class="tab-review-design">
	<li class="active"><a href="#form-resgister"><i class="fa fa-user-plus" aria-hidden="true"></i> ສ້າງບັນຊີໃໝ່</a></li>
	<li><a href="#DATA"><i class="fa fa-users" aria-hidden="true"></i> ຂໍ້ມູນທັງໝົດ</a></li>
	<li><a href="#Edit"><i class="fa fa-edit" aria-hidden="true"></i> ແກ້ໄຂຂໍ້ມູນ</a></li>
</ul>
<div id="myTabContent" class="tab-content custom-product-edit">
	<div class="product-tab-list tab-pane fade active in" id="form-resgister">
		<div class="row">
			<form action="" method="post">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="review-content-section">

						<div class="input-group mg-b-pro-edt">
							<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
							<input type="text" name='teach_fname' class="form-control" placeholder="ກະລຸນາປ້ອນຊື່" required>
						</div>
						<div class="input-group mg-b-pro-edt">
							<span class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
							<input type="text" name='teach_lname' class="form-control" placeholder="ກະລຸນາປ້ອນນາມສະກຸນ" required>
						</div>
						<div class="input-group mg-b-pro-edt">
							<span class="input-group-addon"><i class="fa fa-transgender" aria-hidden="true"></i></span>
							<select name="teach_gender" id="" class="form-control" required>
								<option value="">ເລືອກເພດ</option>
								<option value='ນາງ'>ນາງ</option>
								<option value="ທ້າວ">ທ້າວ</option>
							</select>
						</div>
						<div class="input-group mg-b-pro-edt">
							<span class="input-group-addon"><i class="fa fa-calendar-o" aria-hidden="true"></i></span>
							<input type="date" name="teach_dob" class="form-control" required>
						</div>
						<div class="input-group mg-b-pro-edt">
							<span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
							<textarea name="teach_address" id="" name="address" class="form-control" placeholder="ກະລຸນາປ້ອນທີ່ຢູ່" required></textarea>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="review-content-section">
						<div class="input-group mg-b-pro-edt">
							<span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
							<input type="text" name="teach_tel" class="form-control" placeholder="ກະລຸນາປ້ອນເບີໂທລະສັບ" required>
						</div>
						<div class="input-group mg-b-pro-edt">
							<span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
							
                            <select name="teach_lvl" id="input" class="form-control" required>
                                <option value="">ລະດັບການສືກສາ</option>
                                <option value='ມໍ7'>ມໍ7</option>
                                <option value="ອະນຸປະລິນຍາຕີ">ອະນຸປະລິນຍາຕີ</option>
                                <option value="ປະລິນຍາຕີ">ປະລິນຍາຕີ</option>
                                <option value="ປະລິນຍາໂທ">ປະລິນຍາໂທ</option>
                                <option value="ປະລິນຍາເອກ">ປະລິນຍາເອກ</option>
                                <option value="ສາດສະດາຈານ">ສາດສະດາຈານ</option>
                            </select>
                            
						</div>
						<div class="input-group mg-b-pro-edt">
							<span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
							<input type="text" name="sty_branch" class="form-control" placeholder="ສາຂາວິຊາຮຽນ" required>
						</div>
						<div class="input-group mg-b-pro-edt">
							<span class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
							<input type="text" name="build_teach" class="form-control" placeholder="ຜ່ານສ້າງຄູ" required>
						</div>
						</div>
					</div>
				</div>
		</div>

		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="text-left mg-b-pro-edt custom-pro-edt-ds">
					<button type="submit" name='submit' class="btn btn-primary waves-effect waves-light m-r-10"><i class="fa fa-check"></i> ສ້າງ
					</button>
					<button type="reset" class="btn"><i class="fa fa-remove"></i> ຍົກເລີກ
					</button>
				</div>
			</div>
		</div>
	</div>

	<div class="product-tab-list tab-pane fade" id="DATA">
		<div class="data-table-area mg-tb-15">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="sparkline13-list">
							<div class="sparkline13-graph">
								<div class="datatable-dashv1-list custom-datatable-overright">
									
									<table class="table table-bordered table-hover">
										<thead>
											<tr>
												<th>ລະຫັດ</th>
												<th>ຊື່ ແລະ ນາມສະກຸນ</th>
												<th>ວັນເດືອນປີເກີດ</th>
												<th>ທີ່ຢູ່</th>
												<th>ເບີໂທ</th>
												<th>ອີເມວ</th>
												<th>ຊື່ຜູ້ນຳໃຊ້</th>
												<th>ລະຫັດຜ່ານ</th>
												<th>ສະຖານະ</th>
												<th>ແກ້ໄຂ</th>
											</tr>
										</thead>
										<tbody>
										<?php
											include('mysql.php');
											$sel_user=mysqli_query($con,"select*from view_user");
											while($user=mysqli_fetch_array($sel_user)){
										?>
											<tr title="ວັນເວລາບັນທືກ: <?=$user['time']?>">
												<td> <?=$user['userid']?></td>
												<td> <?=$user['gender'].' '.$user['fname'].' '.$user['lname']?></td>
												<td> <?=$user['dob']?></td>
												<td> <?=$user['address']?></td>
												<td> <?=$user['tel']?></td>
												<td> <?=$user['email']?></td>
												<td> <?=$user['user']?></td>
												<td> <?=$user['pass']?></td>
												<td> <?=$user['status']?></td>
												<td>
												<div class="dropdown hidden-xs">
													<a href="#" class="dropdown-toggle btn btn-default btn-xs" data-toggle="dropdown" >
													<span class="fa fa-cog padding-right-small" style="position:relative;top: 3px;"></span>
													ແກ້ໄຂຂໍ້ມູນ
													<i class="fa fa-caret-down"></i>
													</a>
													<ul class="dropdown-menu">
													<li><a href="edit_user.php?userid=<?=$user['userid']?>"><i class="fa fa-fw fa-edit"></i> ແກ້ໄຂຂໍ້ມູນ</a></li>
													<li class="divider"></li>			
													<li><a href="?del=<?=$user['userid']?>" onclick="return confirm('ທ່ານຕ້ອງການລົບຂໍ້ມູນແທ້ບໍ່')"><i class="fa fa-fw fa-times-circle"></i> ລຶບຂໍ້ມູນ</a>
													</ul>
												</div>
												</td>
											</tr>
										<?php
											}
										?>
										</tbody>
									</table>
									
								
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<?php include 'Pugin_JS.php' ?>
</html>
<?php
}
if(isset($_GET['del'])){
$teach_id=$_GET['del'];

$del=mysqli_query($con,"delete from teacher where teach_id='$teach_id'");

if($del){
echo "<script>alert('ລົບຂໍ້ມູນສຳເລັດ');location='add_teacher.php';</script>";
}
else{
echo "<script>alert('ລົບຂໍ້ມູນບໍ່ສຳເລັດ');location='add_teacher.php';</script>";
}
}
?>