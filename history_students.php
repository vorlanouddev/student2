<?php
session_start();
if($_SESSION['authuser']!=1){
header('location:Login.php');
}
else{
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
	<?php include 'pugin_css.php' ?>
	<style>
		@page{margin:0;}
        @media print {
           body {
               display: table!important;
               table-layout: fixed!important;
               padding-top: 2.5cm!important;
               padding-bottom: 2.5cm!important;
               height: auto!important;
               padding-left: 2.5cm!important;
               padding-right: 2.5cm!important;
               font-family: phetsarath OT!important;
           }
           div.table{
            border:1px solid black!important;
            font-size: 12px!important;
           }
        }
        body,.btn{font-family: phetsarath OT}
    </style>
</head>

<body>
	<?php include 'menu.php'; ?>
	<?php 
    include 'mysql.php';

    $get_all=mysqli_query($con,"select class_name from class_room");
    $geta=mysqli_fetch_array($get_all);
    $cname=$geta[0]; 
 ?>
	<div class="income-order-visit-user-area mg-t-15">
		<div class="container-fluid">
			<div class="row">
				<div class="dashtwo-order-area mg-tb-30">
					<div class="container-fluid">
						<div class="panel panel-danger">
							<div class="panel-heading red">
								<h3 class="panel-title">ຄົ້ນຫາຂໍ້ມູນນັກຮຽນແຕ່ລະລຸ້ນ</h3>
							</div>
							<div class="panel-body">
								<form action="show_search_std.php" method="POST" role="form">

									<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
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
									<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
										<div class="form-group">
											<label for="">ເລືອກສົກຮຽນ</label>
											<select name="part" id="part" class="form-control" required>
												<option value="">ກະເລືອກສົກຮຽນ</option>
											</select>

										</div>
									</div>

									<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
										<div class="form-group" style='margin-top:25px;'>
											<button type="submit" class="btn btn-red">ຄົ້ນຫາ</button>
											<button type="" class="btn btn-default">ຍົກເລີກ</button>
										</div>
									</div>





								</form>

							</div>
						</div>


						<script type="text/javascript">
							function Export(mytblId) {
								var htmldiv = document.getElementById('dataTable');
								var html = htmldiv.outerHTML;
								window.open('data:application/vnd.ms-excel,' + encodeURIComponent(html));
							}

						</script>
						<div class="row">

							<div class="btn-group" style="margin-left: 2%;">
								<button type='submit' class="btn btn-default btn-sm" onclick="Export();"><i class="fa fa-file-excel-o"></i></button>
								<a href="" id="print" class="btn btn-default btn-sm" onclick="javascript:printlayer('dataTable')">
									<span class="fa fa-print"></span></a>
							</div>
							<div class="table-responsive" style="font-size: 14px" id="data">
								<table class="table table-hover table-bordered table-striped" border="1" id="dataTable" style="font-family: phetsarath ot;font-size: 15px;width: 100%">
									<thead>
										<tr>
											<th colspan="14" class="red">
												<h3 align="center" class="panel-title">
													ປະຫວັດນັກຮຽນແຕ່ລະລຸ້ນ
												</h3>
											</th>
										</tr>
										<tr>
											<th>ລ/ດ</th>
											<th>ລະຫັດ</th>
											<th>ຊື່ ແລະ ນາມສະກຸນ</th>
											<th>ວັນເດືອນປີເກີດ</th>
											<th>ບ້ານ</th>
											<th>ເມືອງ</th>
											<th>ແຂວງ</th>
											<th>ເບີໂທ</th>
											<th>ຫ້ອງ</th>
											<th>ລຸ້ນ</th>
											<th>ສົກຮຽນ</th>

										</tr>
									</thead>
									<tbody>
										<?php 
                    include 'mysql.php';
                    $i=1;
                   // $class_id=$_GET['class_id'];
                    $get_result=mysqli_query($con,"select*from view_uproom1");
                    while($rset=mysqli_fetch_array($get_result)){
                 ?>
										<tr>
											<td>
												<?php echo $i; ?>
											</td>
											<td>
												<?php echo $rset['s_num']; ?>
											</td>
											<td>
												<a href="view_data_set.php?s_id=<?=$rset['s_id']?>">
													<i class="fa fa-eye"></i>
													<?php echo $rset['s_gender'].' '.$rset['s_fname'].' '.$rset['s_lname']; ?>

												</a>
											</td>
											<td>
												<?php echo $rset['s_dob']; ?>
											</td>
											<td>
												<?php echo $rset['s_vill_name']; ?>
											</td>
											<td>
												<?php echo $rset['s_dis_name']; ?>
											</td>
											<td>
												<?php echo $rset['s_pro_name']; ?>
											</td>
											<td>
												<?php echo $rset['s_tel']; ?>
											</td>
											<td>
												<?php echo $rset['class_name']; ?>
											</td>
											<td>
												<?php echo $rset['gener']; ?>
											</td>
											<td>
												<?php echo $rset['part']; ?>
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
	<?php include 'pugin_js.php';?>
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
