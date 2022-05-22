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
    <?php include 'pugin_css.php' ?>
    <!-- <meta http-equiv="refresh" content="2"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <body >
        <?php include 'menu.php' ?>
        <div class="mailbox-view-area mg-tb-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="panel panel-default">
                         <div class="panel-heading">
                           <h3 class="panel-title">ຟອມແກ້ໄຂຂໍ້ມູນແມ່</h3>
                       </div>
                       <div class="panel-body panel-csm">
                         <form action="" method="post">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="review-content-section">
                                    <?php
                                      $m_id=$_REQUEST['m_id'];
                                      $sel=mysqli_query($con,"select*from tb_mother where m_id='$m_id'");
                                      $mo=mysqli_fetch_array($sel);
                                     ?>
                                     
                                    <input type="hidden" class="form-control" name="m_id" value="<?php echo $m_id;?>" readonly required>
                                    <label for="">ຊື່</label>
                                    <input type="text" class="form-control" value="<?=$mo['m_fname']?>" placeholder="ປ້ອນຊື່" name='m_fname' required>
                                    <label for="">ນາມສະກຸນ</label>
                                    <input type="text" class="form-control" placeholder="ປ້ອນນາມສະກຸນ" value="<?=$mo['m_lname']?>" name='m_lname' required>
                                    <label for="">ວັນເດືອນປີເກີດ</label>
                                    <input type="date" class="form-control" value="<?=$mo['m_dob']?>" name='m_dob' required>
                                    <label for="">ແຂວງ</label>
                                       <select name="pro_name" id='pro_name' class="form-control" required>
                                           <option value="<?=$mo['m_pro_name']?>"><?=$mo['m_pro_name']?></option>
                                           <?php
                                               $sel_pro=mysqli_query($con,"select*from province");
                                               while($pro=mysqli_fetch_array($sel_pro)){
                                                   echo "<option value='$pro[1]'>$pro[1]</option>";
                                               }
                                           ?>
                                       </select>
                                       <label for="">ເມືອງ</label>
                                <select class="form-control" name='dis_name' id='dis_name' required>
                                  <option value="<?=$mo['m_dis_name']?>"><?=$mo['m_dis_name']?></option>
                                </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 col-sm-6 ">
                                <div class="review-content-section">
                                   <div class="form-group">

                                    <label for="">ບ້ານ</label>
                                <select class="form-control" name='vill_name' id='vill_name' required>
                                  <option value="<?=$mo['m_vill_name']?>"><?=$mo['m_vill_name']?></option>
                                </select>
                         </div>
                         <label for="">ອາຊີບ</label>
                         <input type="text" class="form-control" value="<?=$mo['m_job']?>" name='m_job' placeholder="ປ້ອນອາຊີບ" required>
                         <label for="">ເບີໂທ</label>
                         <input type="text" class="form-control" name='m_tel' value="<?=$mo['m_tel']?>" placeholder="ປ້ອນເບີໂທ" required>
                         <label for="">ໝາຍເຫດ</label>
                         <textarea class="form-control" placeholder="ໝາຍເຫດ" name='m_remark' value="<?=$mo['m_remark']?>"><?=$mo['m_remark']?></textarea>

                     </div>
                 </div>
             </div>
             <div class="panel-footer">
               <button type="submit" name="update" class="btn btn-red btn-sm"> ແກ້ໄຂ</button>
               <a href="students.php">
               <button type="button" class="btn btn-default btn-sm"> ຍົກເລີກ</button>
               </a>
           </div>
           <?php
            if(isset($_POST['update'])){
                    
                    $m_id=$_POST['m_id'];
                    $m_fname=$_POST['m_fname'];
                    $m_lname=$_POST['m_lname'];
                    $m_dob=$_POST['m_dob'];
                    $pro_name=$_POST['pro_name'];
                    $dis_name=$_POST['dis_name'];
                    $vill_name=$_POST['vill_name'];
                    $m_job=$_POST['m_job'];
                    $m_tel=$_POST['m_tel'];
                    $m_remark=$_POST['m_remark'];
                    $user=$_SESSION['fname'];

                    $insert=mysqli_query($con,"update tb_mother set
                      m_fname='$m_fname',
                      m_lname='$m_lname',
                      m_dob='$m_dob',
                      m_vill_name='$vill_name',
                      m_dis_name='$dis_name',
                      m_pro_name='$pro_name',
                      m_tel='$m_tel',
                      m_remark='$m_remark',
                      m_job='$m_job',
                      user='$user'
                      where m_id='$m_id'");
                      if($insert){
                        echo "<script>
                            alert('ແກ້ໄຂສຳເລັດ');
                            location='students.php';
                            </script>
                        ";
                      }
                      else{
                        echo "
                          <script>
                            alert('ບໍ່ສາມາດແກ້ໄຂໄດ້');
                            location='add_mother.php';
                            </script>
                        ";
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
    <?php include 'pugin_js.php' ?>
    <script>
        $(function(){
            $('#pro_name').change(function(){
                var pro_name=$('#pro_name').val();
                $.post('get_district2.php',{
                  pro_name:pro_name
                },
              function(show_dis){
                $('#dis_name').html(show_dis);
              });
            });
        });
        $(function(){
            $('#dis_name').change(function(){
                var dis_name=$('#dis_name').val();
                $.post('get_village.php',{
                  dis_name:dis_name
                },
              function(show_vill){
                $('#vill_name').html(show_vill);
              });
            });
        });
    </script>
    </body>
    </html>
    <?php
    }
    ?>
