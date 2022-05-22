<?php
include('mysql.php');

session_start();
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
	<title>Students Management</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
									<i class="fa fa-plus-circle"></i> ເພີ່ມຄະແນນ
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
					<div class="hpanel email-compose mailbox-view mg-b-15">
						<div class="panel-body" style="border:1px solid #C12A2A">
							<div class="panel-heading red">
								<h3 class="panel-title" align="center">ຄະແນນທັງໝົດ</h3>
							</div><br>
							<table class="table table-hover table-striped" id="dataTable">
								<thead>
									<tr>
										<th>#</th>
										<th>ຊື່ ແລະ ນາມສະກຸນ</th>
										<th>ວິຊາ</th>
										<th>ຄະແນນ</th>
										<th>ຫ້ອງ</th>
										<th>ເດືອນ</th>
										<th>ສົກສຽນ</th>
										<th>ແກ້ໄຂ</th>
									</tr>
								</thead>
								<tbody>
									<?php 
							include 'mysql.php';
							$i=1;
							$call_data=mysqli_query($con,"SELECT*FROM VIEW_SCORE WHERE P_PART='$r_part'");
							while($row=mysqli_fetch_array($call_data)){
								?>
									<tr id="body">
										<td>
											<?php echo $i; ?>
										</td>
										<td>
											<?php echo $row['s_gender'].' '.$row['s_fname'].' '. $row['s_lname']; ?>
										</td>
										<td>
											<?php echo $row['sub_name'] ?>
										</td>
										<td>
											<?php echo $row['point']; ?>
										</td>
										<td>
											<?php echo $row['class_name']; ?>
										</td>
										<td>
											<?php echo $row['p_month']; ?>
										</td>
										<td>
											<?php echo $row['p_part']; ?>
										</td>
										<td>
											<div class="btn-group">
												<a href="edit_score.php?edit=<?php echo $row['p_id']?>" class="btn btn-default btn-xs" name="edit"><i class="fa fa-edit"></i></a>
												<a href="?del=<?php echo $row['p_id']?>" class="btn btn-default btn-xs" name="del" onclick="return confirm('ທ່ານຕ້ອງການລຶບຂໍ້ມູນນີ້ແທ້ບໍ່ ?')"><i class="fa fa-trash"></i></a>
											</div>
										</td>
									</tr>
									<?php 
								if(isset($_GET['del'])){
									$p_id=$_GET['del'];
									$selpoint=mysqli_query($con,"select*from tb_point where p_id='$p_id'");
									$pp=mysqli_fetch_array($selpoint);
									$s_id=$pp['s_id'];
									$p_month=$pp['p_month'];
									$p_point=$pp['point'];
									$p_part=$pp['p_part'];
									$class_id=$pp['class_id'];
									
									$del_rank=mysqli_query($con,"update ranks set score=score - '$p_point' where s_id='$s_id' and r_month='$p_month' and r_part='$p_part' and class_id='$class_id'");

									
									if($del_rank){
										$delete=mysqli_query($con,"delete from tb_point where p_id='$p_id'");
										if($delete){
											echo "<script>alert('ລຶບຂໍ້ມູນສຳເລັດ');location='score.php';</script>";
										}
										else{
											echo "<script>alert('update rank error');location='score.php';</script>";
										}
									}else{
										echo "<script>alert('ລຶບຂໍ້ມູນບໍ່ສຳເລັດ');location='score.php';</script>";

									}
								}
								?>
									<?php $i++;} ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include 'pugin_js.php'; ?>
</body>

</html>
<?php
}
?>
