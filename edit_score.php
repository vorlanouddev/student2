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
								<h3 class="panel-title" style="margin-left: 2%">ຟອມແກ້ໄຂຄະແນນ
									<?php echo $st1['class_name']?>
								</h3>
							</div>
							<form action="" method="post">
								<div class="panel-body">
									<div class="col-md-6">

										<?php 
                                  $p_id=$_GET['edit'];
                                  $call_data=mysqli_query($con,"SELECT*FROM view_score where p_id='$p_id'");
                                  $call=mysqli_fetch_array($call_data);
                                 ?>
										<input type="hidden" name="p_id" value="<?php echo $call['p_id'];?>" required>
										<input type="hidden" name="class_id" value="<?php echo $call['class_id'];?>" required>
										<label for="">ສົກຮຽນ</label>
										<input type="text" class="form-control" name='p_part' value="<?php echo $call['p_part'];?>" readonly required>
										<label for="">ຫ້ອງ</label>
										<input type="text" value="<?php echo $call['class_name'];?>" readonly class="form-control" required>
										<label for="">ຊື່ນັກຮຽນ</label>
										<input type="hidden" name="s_id" value="<?php echo $call['s_id'];?>" readonly class="form-control" required>
										<input type="text" value="<?php echo $call['s_fname'].' '.$call['s_lname'];?>" readonly class="form-control" required>
										<label for="">ວິຊາ</label>
										<input type="hidden" name="sub_id" value="<?php echo $call['sub_id'];?>" readonly class="form-control" required>
										<input type="text" value="<?php echo $call['sub_name'];?>" readonly class="form-control" required>
									</div>
									<div class="col-md-6">
										<label for="">ຄະແນນ</label>
										<input type="text" name="point" value="<?php echo $call['point'];?>" class="form-control" required>
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
									<button type="submit" name='save' class="btn btn-red btn-sm">ແກ້ໄຂ</button>
									<button type="reset" class="btn btn-default btn-sm">ຍົກເລີກ</button>
								</div>

								<?php
                                  if(isset($_POST['save'])){
                                    $p_id=$_POST['p_id'];
                                    $class_id=$_POST['class_id'];
                                    $s_id=$_POST['s_id'];
                                    $sub_id=$_POST['sub_id'];
                                    $point=$_POST['point'];
                                    $p_month=$_POST['p_month'];
                                    $p_remark=$_POST['p_remark'];
                                    $p_part=$_POST['p_part'];
                                    $user=$_SESSION['fname'];
									  
									  
									$sel_point=mysqli_query($con,"select point from tb_point where p_id='$p_id'");
									$count_point=mysqli_fetch_array($sel_point);
									
									 if($count_point[0]>$point){
										 $point1=$count_point[0]-$point;
										 
										 	$update_rank1=mysqli_query($con,"update ranks set score=score - '$point1',r_month='$p_month' where r_month='$p_month' and r_part='$p_part' and s_id='$s_id' and class_id='$class_id'");
										 if($update_rank1){
											 $update_tb_point1=mysqli_query($con,"update tb_point set point='$point',p_month='$p_month',p_remark='$p_remark' where p_id='$p_id'");
											 if($update_tb_point1){
												  echo "<script>
											 alert('ແກ້ໄຂສຳເລັດ');
											 location='score.php';
											 </script>";
											 }
											 else{
												  echo "<script>
											 alert('update tb_point 1 error');
											 location='score.php';
											 </script>";
											 }
											 
										 }
										 else{
											 echo "<script>
											 alert('update rank1 error');
											 location='score.php';
											 </script>";
										 }
										 
									 }
									 
									  else if($point>$count_point[0]){
										  $point2=$point-$count_point[0];
										   	$update_rank2=mysqli_query($con,"update ranks set score=score + '$point2',r_month='$p_month' where r_month='$p_month' and r_part='$p_part' and s_id='$s_id' and class_id='$class_id'");
										  
										  	if($update_rank2){
											 $update_tb_point2=mysqli_query($con,"update tb_point set point='$point',p_month='$p_month',p_remark='$p_remark' where p_id='$p_id'");
											 if($update_tb_point2){
												  echo "<script>
											 alert('ແກ້ໄຂສຳເລັດ');
											 location='score.php';
											 </script>";
											 }
											 else{
												  echo "<script>
											 alert('update tb_point 2 error');
											 location='score.php';
											 </script>";
											 }
											 
										 }
										 else{
											 echo "<script>
											 alert('update rank2 error');
											 location='score.php';
											 </script>";
										 }
										  
									  }
									  
									  
									 else{
										
										 $update_tb_point3=mysqli_query($con,"update tb_point set p_month='$p_month',p_remark='$p_remark' where p_id='$p_id'");
									 		
										 if($update_tb_point3){
											  $update_rank3=mysqli_query($con,"update ranks set score=score + '$point' where r_month='$p_month' and r_part='$p_part' and s_id='$s_id' and class_id='$class_id'");
											 if($update_rank3){
											 echo "<script>
											 alert('ແກ້ໄຂສຳເລັດ');
											 location='score.php';
											 </script>";
											 }
											 else{
											 echo "<script>
											 alert('update rank3');
											 location='score.php';
											 </script>";
										 }
										 }
										 else{
											 echo "<script>
											 alert('update tb_point3 error');
											 location='score.php';
											 </script>";
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

	</script>
</body>

</html>
<?php
      }
?>
