<?php
include('mysql.php');
error_reporting(~E_NOTICE);
session_start();
if ($_SESSION['authuser'] != 1) {
  header('location:Login.php');
} else {
?>
  <!doctype html>
  <html class="no-js" lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Students Management</title>
    <meta name="description" content="">
    <?php include 'pugin_css.php' ?>
    <style>
      label {
        margin-top: 2% !important
      }
    </style>
  </head>
  <!-- <meta http-equiv="refresh" content="2"> -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <body>
    <?php include 'menu.php' ?>
    <div class="mailbox-view-area mg-tb-15">
      <div class="container-fluid">
        <div class="row">

          <div class="col-md-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">ຟອມບັນທຶກຂໍ້ມູນພໍ່</h3>
              </div>
              <div class="panel-body panel-csm">
                <div class="col-md-6">
                  <form action="" method="post">
                    <?php
                    $s_id = $_REQUEST['s_id'];
                    $class_id = $_REQUEST['class_id'];
                    ?>
                    <label for="">ລະຫັດນັກຮຽນ</label>
                    <input type="text" class="form-control" name="s_id" value="<?= $s_id ?>" readonly required>
                    <label for="">ຊື່</label>
                    <input type="text" class="form-control" name='f_fname' placeholder="ປ້ອນຊື່" required>
                    <label for="">ນາມສະກຸນ</label>
                    <input type="text" name="f_lname" class="form-control" placeholder="ປ້ອນນາມສະກຸນ" required>
                    <label for="">ວັນເດືອນປີເກີດ</label>
                    <input type="date" name="f_dob" class="form-control" required>
                    <label for="">ແຂວງ</label>

                    <select name="pro_name" id='pro_name' class="form-control" required>
                      <option value="">ເລືອກແຂວງ</option>
                      <?php
                      $sel_pro = mysqli_query($con, "select*from province");
                      while ($pro = mysqli_fetch_array($sel_pro)) {
                        echo "<option value='$pro[1]'>$pro[1]</option>";
                      }
                      ?>
                    </select>
                </div>
                <div class="col-md-6">


                  <label for="">ເມືອງ</label>
                  <select class="form-control" name='dis_name' id='dis_name' required>
                    <option value="">ເລືອກເມືອງ</option>
                  </select>

                  <label for="">ບ້ານ</label>
                  <select class="form-control" name='vill_name' id='vill_name' required>
                    <option value="">ເລືອກບ້ານ</option>
                  </select>
                  <label for="">ອາຊີບ</label>
                  <input type="text" name="f_job" class="form-control" placeholder="ປ້ອນອາຊີບ" required>
                  <label for="">ເບີໂທ</label>
                  <input type="text" name="f_tel" class="form-control" placeholder="ປ້ອນເບີໂທ" required>
                  <label for="">ໝາຍເຫດ</label>
                  <textarea class="form-control" placeholder="ໝາຍເຫດ" name='f_remark'></textarea>

                </div>
              </div>
              <div class="panel-footer">
                <button type="submit" name="save" class="btn btn-red btn-sm"> ບັນທຶກ</button>
                <button type="reset" class="btn btn-default btn-sm"> ຍົກເລີກ</button>
              </div>

              <?php
              if (isset($_POST['save'])) {
                $class_id = $_REQUEST['class_id'];
                $s_id = $_POST['s_id'];
                $f_fname = $_POST['f_fname'];
                $f_lname = $_POST['f_lname'];
                $f_dob = $_POST['f_dob'];
                $pro_name = $_POST['pro_name'];
                $dis_name = $_POST['dis_name'];
                $vill_name = $_POST['vill_name'];
                $f_job = $_POST['f_job'];
                $f_tel = $_POST['f_tel'];
                $f_remark = $_POST['f_remark'];
                $user = $_SESSION['fname'];

                $insert = mysqli_query($con, "insert into tb_father values(
                '',
                '$s_id',
                '$f_fname',
                '$f_lname',
                '$f_dob',
                '$f_job',
                '$vill_name',
                '$dis_name',
                '$pro_name',
                '$f_tel',
                '$f_remark',
                '$user'
                )");
                if ($insert) {
                  echo "<script>
                      alert('ບັນທືກສຳເລັດ');
                      location='add_mother.php?s_id=$s_id && class_id=$class_id';
                      </script>
                  ";
                } else {
                  echo "
                    <script>
                      alert('ບໍ່ສາມາດບັນທືກໄດ້');
                      location='add_father.php?s_id=$s_id && class_id=$class_id';
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
      $('#pro_name').change(function() {
        var pro_name = $('#pro_name').val();
        $.post('get_district2.php', {
            pro_name: pro_name
          },
          function(show_dis) {
            $('#dis_name').html(show_dis);
          });
      });

      $('#dis_name').change(function() {
        var dis_name = $('#dis_name').val();
        $.post('get_village.php', {
            dis_name: dis_name
          },
          function(show_vill) {
            $('#vill_name').html(show_vill);
          });
      });
    </script>
  </body>
<?php } ?>

  </html>