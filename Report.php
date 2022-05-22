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
            font-size: 11px!important;
           }
        }
        body,.btn{font-family: phetsarath OT}
    </style>
</head>

<body>
	<?php include 'menu.php'; ?>
	<?php 
    include 'mysql.php';
    $class_id=$_GET['class_id'];
    $get_all=mysqli_query($con,"select class_name from class_room where class_id='$class_id'");
    $geta=mysqli_fetch_array($get_all);
    $cname=$geta[0]; 
 ?>
	<div class="income-order-visit-user-area mg-t-15">
		<div class="container-fluid">
			<div class="row">
				<div class="dashtwo-order-area mg-tb-30">
					<div class="container-fluid">
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
								<table class="table table-hover table-bordered table-striped" border="1" id="dataTable" style="font-family: phetsarath ot;font-size: 11px;width: 100%">
									<thead>
										<tr>
											<th colspan="14" class="red">
												<h3 align="center" class="panel-title">ນັກຮຽນ
													<?php echo $cname; ?> ສົກຮຽນ:
													<?php echo $r_part; ?>
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
											<th>ຊື່ພໍ່</th>
											<th>ອາຊີບ</th>
											<th>ເບີໂທ</th>
											<th>ຊື່ແມ່</th>
											<th>ອາຊີບ</th>
											<th>ເບີໂທ</th>
										</tr>
									</thead>
									<tbody>
										<?php 
					                    include 'mysql.php';
					                    $i=1;
					                    $class_id=$_GET['class_id'];
					                    $get_result=mysqli_query($con,"select*from view_uproom1 where class_id='$class_id' and part='$r_part'");
					                    while($rset=mysqli_fetch_array($get_result)){
					                 ?>
										<tr>
											<td style="text-align: center">
												<?php echo $i; ?>
											</td>
											<td style="text-align: center">
												<?php echo $rset['s_num']; ?>
											</td>
											<td>
												<?php echo $rset['s_gender'].' '.$rset['s_fname'].' '.$rset['s_lname']; ?>
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
												<?php echo $rset['f_fname'].' '.$rset['f_lname']; ?>
											</td>
											<td>
												<?php echo $rset['f_job']; ?>
											</td>
											<td>
												<?php echo $rset['f_tel']; ?>
											</td>
											<td>
												<?php echo $rset['m_fname'].' '.$rset['m_lname']; ?>
											</td>
											<td>
												<?php echo $rset['m_job']; ?>
											</td>
											<td>
												<?php echo $rset['m_tel']; ?>
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

	</script>
</body>

</html>
<?php
      }
?>
