<?php
 include('mysql.php');

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
</head>
<body background="img/body-bg.png">
<?php
    include 'pugin_css.php';
    include 'menu.php';
 ?>
<div class="file-manager-area mg-tb-15">
<div class="container-fluid">
<div class="row">
<div class="col-md-12 col-md-12 col-sm-12 col-xs-12" id="data">
    <div class="row">
        <div class="panel-heading">
            <input type="text" name="sarech" id="search" class="form-control" style="width: 200px" placeholder="ຄົ້ນຫາ....">
         </div>
        <?php 
            include 'mysql.php';
            $class_id=$_GET['class_id'];
            $student=mysqli_query($con,"select*from view_uproom1 where s_gender='ທ້າວ' and class_id='$class_id'");
            while($std=mysqli_fetch_array($student)){
         ?>
         <a href="view_data_set.php?s_id=<?php echo $std['s_id']?>" class="view_st">
        <div class="col-md-3" id="body" data-toggle="tooltip" data-placement="top" title="<?php echo $std['user'].' '.$std['time']?>">
            <div class="hpanel mt-b-30">
                <div class="panel-body file-body file-cs-ctn">
                    <img src="img/user_null.png" alt="" style="width: 100px;height: 100px;border-radius: 50%;margin-bottom: -1px;margin-top: -1px">
                </div>
                <div class="panel-footer red" style="text-align: center;height: 30px;">
                    <p style="margin-top: -5px"><?php echo $std['s_gender'].' '.$std['s_fname'].' '.$std['s_lname']; ?> </p>
                </div>
            </div>
        </div>
            </a>
        <?php } ?>
    </div>
</div>
</div>
</div>
<!-- <div class="modal fade " id="show_data">
    <div class="modal-dialog modal-lg">

        <div class="modal-content ">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body" id="show_content">
                
            </div>
            
        </div>
    </div>
</div> -->
<!-- <div class="modal fade " id="recycle">
    <div class="modal-dialog modal-sm">

        <div class="modal-content ">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 class="panel-title">ກູ້ຂໍ້ມູນໄປນຳໃຊ້ຄືນ</h3>
            </div>
            <div class="modal-body" id="form-rc">
                
            </div>
            
        </div>
    </div>
</div> -->
<?php
     error_reporting(~E_NOTICE);
        include 'Pugin_JS.php';
     ?>
</div>
<!-- <script>
    $(function(){
        $('.view_st').click(function(){
            var st_id=$(this).attr('st_id');
            $.ajax({
                url:'view_student.php',
                type:'POST',
                data:{st_id:st_id},
                success:function(show){
                    $('#show_content').html(show);
                    $('#show_data').modal('show');

                }
            });
        });
    });
       $(function(){
                $('.recy').click(function(event) {
                    var s_id=$(this).attr('s_id');
                    $.ajax({
                        url:'recycle.php',
                        type:'POST',
                        data:{
                            s_id:s_id
                        },
                        success:function(show){
                            $('#form-rc').html(show);
                            $('#recycle').modal('show');
                        }
                    });
                });
            });

</script> -->
</body>
</html>
<?php
      }
?>
