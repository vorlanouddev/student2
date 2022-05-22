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
<html class="no-js" lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Students Management</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
label{margin-top: 1%;}

</style>

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
						<li><a href="Max_scores.php"><i class="fa fa-sort-amount-desc text-success"></i> ຄະແນນສູງ</a></li>
						<li><a href="Min_scores.php"><i class="fa fa-sort-amount-asc text-danger"></i> ຄະແນນຕ່ຳ</a></li>
						<li><a href="#"><i class="fa fa-clock-o text-primary"></i> ປະຫວັດການຮຽນ</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-9 col-md-9 col-sm-9 col-xs-12">
			<div class="hpanel email-compose mailbox-view mg-b-15">
				<div class="panel panel-default">
					<div class="panel-heading">

						<?php
						include 'mysql.php';
						$class_id=$_GET['class_id'];
						$c_id=mysqli_query($con,"select class_id,class_name from class_room where class_id='$class_id'");
						$st1=mysqli_fetch_array($c_id);
						?>
						<h3 class="panel-title" style="margin-left: 2%">ຟອມໃຫ້ຄະແນນ
							<?php echo $st1['class_name']?>
						</h3>
					</div>
					<form action="" method="post">
						<div class="panel-body">
							<div class="col-md-6">


								<input type="hidden" name="class_id" value="<?php echo $st1[0];?>" required>
								<label for="">ສົກຮຽນ</label>
								<input type="text" class="form-control" name='p_part' value="<?php echo $curyear.'-'.$nextyear;?>" readonly required>
								<label for="">ຫ້ອງ</label>
								<input type="text" name="" value="<?php echo $st1[1];?>" class="form-control" required>
								<label for="">ຊື່ນັກຮຽນ</label>
								<select name="s_id" id="s_id" class="form-control" required>
									<?php
									$sid=$_GET['s_id'];
									$class_id=$_GET['class_id'];
									$getID=mysqli_query($con,"select*from view_uproom1 where s_id='$sid' and class_id='$class_id'");
									$ID=mysqli_fetch_array($getID);
									?>
									<option value="<?php echo $ID[4]?>">
										<?php 
										$s_ID=$ID[0];
										if($s_ID>=1){
											echo $ID['s_fname'];
											echo $ID['s_lname'];
										}else{
											echo "ເລືອກຊື່ນັກຮຽນ";
										}
										?>
									</option>
									<?php
									$st=mysqli_query($con,"select*from view_uproom1 where class_id='$class_id'");
									while($sts=mysqli_fetch_array($st)){

										?>
										<option value="<?=$sts[4]?>">
											<?php echo $sts['s_gender'].' '.$sts['s_fname'].' '. $sts['s_lname']; ?>
										</option>
										<?php
									}
									?>
								</select>
								<label for="">ວິຊາ</label>
								<select name="sub_id" id="sub_id" class="form-control" required>
									<?php
									$maxrank=mysqli_query($con,"select sub_id from tb_point where p_id=(select max(p_id)from tb_point where s_id='$sid')");
									$maxID=mysqli_fetch_array($maxrank);
									$max=$maxID[0]+1;
									$sel_last_sub=mysqli_query($con,"select sub_id,sub_name from subject where sub_id='$max'");
									$last_sub=mysqli_fetch_array($sel_last_sub);
									$sub1=$last_sub['sub_id'];
									$sub2=$last_sub['sub_name'];
									?>

									<option value="<?php echo $sub1;?>">
										<?php 

										if($sub1>=1){
											echo $sub2;
										}else{
											echo "ເລືອກວິຊາ";
										}
										?>
									</option>
									<?php
									$st=mysqli_query($con,"select*from subject");
									while($sts=mysqli_fetch_array($st)){
										echo "<option value='$sts[0]'>$sts[2] </option>";
									}
									?>
								</select>
							</div>
							<div class="col-md-6">
								<label for="">ຄະແນນ</label>
								<input type="text" name="point" id='point' class="form-control" required>
								<div id="show-point"></div>
								<label for="">ເດືອນ</label>
								<select class="form-control" name='p_month' required>
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

								<label for="">ໝາຍເຫດ</label>
								<input type="text" name="p_ramark" class="form-control">
							</div>
						</div>
						<div class="panel-footer">
							<button type="submit" name='save' class="btn btn-red btn-sm">ບັນທຶກ</button>
							<button type="reset" class="btn btn-default btn-sm">ຍົກເລີກ</button>
						</div>

						<?php
						if(isset($_POST['save'])){
							$class_id=$_POST['class_id'];
							$s_id=$_POST['s_id'];
							$sub_id=$_POST['sub_id'];
							$point=$_POST['point'];
							$p_month=$_POST['p_month'];
							$p_remark=$_POST['p_remark'];
							$p_part=$_POST['p_part'];
							$user=$_SESSION['fname'];

							$sel=mysqli_query($con,"select*from tb_point where s_id='$s_id' and class_id='$class_id' and p_month='$p_month' and sub_id='$sub_id'and p_part='$p_part' ");
							$month=mysqli_fetch_array($sel);

							$sel_std=mysqli_query($con,"select*from student where s_id='$s_id'");
							$std=mysqli_fetch_array($sel_std);
							$gender=$std['s_gender'];
							$fname=$std['s_fname'];
							$lname=$std['s_lname'];

							$sel_sub=mysqli_query($con,"select sub_name from subject where sub_id='$sub_id'");
							$sub=mysqli_fetch_array($sel_sub);
							$sub_name=$sub['sub_name'];





							if($sub_id==$month['sub_id']){
								echo "<script>alert('$gender $fname $lname ໄດ້ບັນທືກຄະແນນວິຊາ $sub_name ປະຈຳເດືອນ $p_month ແລ້ວ');location='add_score.php?class_id=$class_id  && s_id=$s_id';</script>";
							}

							else{
								$insert=mysqli_query($con,"insert into tb_point values('','$s_id','$class_id','$sub_id','$point','$p_month','$p_remark','$p_part','$user','$time')");
								if($insert){
									$sel_all_point=mysqli_query($con,"select s_id from ranks where s_id='$s_id' and r_month='$p_month' and r_part='$p_part'");
									$rank=mysqli_fetch_array($sel_all_point);
									if($rank[0]==$s_id){
										$sum_rank=mysqli_query($con,"update ranks set score=score + '$point' where s_id='$s_id' and r_month='$p_month' and r_part='$p_part' and class_id='$class_id'");
										if($sum_rank){
											echo "<script>alert('ບັນທືກສຳເລັດ');location='add_score.php?class_id=$class_id && s_id=$s_id';</script>";
										}
										else{
											echo "<script>alert('update rank error');location='add_score.php?class_id=$class_id && s_id=$s_id';</script>";

										}
									}
									else{
										$insert_rank_new=mysqli_query($con,"insert into ranks values ('','$s_id','$class_id','$point','$p_month','$p_part','$user')");
										if($insert_rank_new){
											echo "<script>alert('ບັນທືກສຳເລັດ');location='add_score.php?class_id=$class_id && s_id=$s_id';</script>";
										} 
										else{
											echo "<script>alert('insert rank error');location='add_score.php?class_id=$class_id && s_id=$s_id';</script>";

										}
									}



								}
								else{
									echo "<script>alert('ບໍ່ສາມາດບັນທືກໄດ້');location='add_score.php?class_id=$class_id  && s_id=$s_id';</script>";
								}
							}
						}
						?>

					</form>

				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<?php include 'pugin_js.php'; ?>
<script>
$(function() {
$('#s_id').change(function() {
	var s_id = $('#s_id').val();
	$.post('get_sub.php', {
		s_id: s_id
	},
	function(show) {
		$('#sub_id').html(show);
	});

});
});

$(function() {
$('#point').keyup(function() {
	var point = $('#point').val();
	$.post('point_over.php', {
		point: point
	},
	function(show) {
		$('#show-point').html(show);
	});
});
});

</script>
</body>

</html>
<?php
}
?>
