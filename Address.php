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
    <div class="col-md-3 col-md-3 col-sm-3 col-xs-12">
        <div class="hpanel responsive-mg-b-30">
            <div class="panel-body">
                <div class="dropdown custonfile">
                    <a class="dropdown-toggle btn btn-primary btn-block" href="Address.php" data-toggle="dropdown">
                        ຂໍ້ມູນອ້າງອີງ
                    </a>
                </div>
                <ul class="mailbox-list">
                    <li>
                        <a href="province.php">
                            <i class="fa fa-clone"></i> ຂໍ້ມູນແຂວງ
                        </a>
                    </li>
                    <li>
                        <a href="district_data.php"><i class="fa fa-clone"></i> ຂໍ້ມູນເມືອງ</a>
                    </li>
                    <li>
                        <a href="vill_data.php"><i class="fa fa-clone"></i> ຂໍ້ມູນບ້ານ</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-9 col-md-9 col-sm-9 col-xs-12">
        <div class="panel-body panel-csm">
            <div class="border-bottom border-left border-right bg-white mg-tb-15">
               <div class="row">
                <?php 
                include 'mysql.php';
                $select=mysqli_query($con,"select*from district as d,province as p,village as v where d.pro_id=p.pro_id and v.dis_id=d.dis_id");
                ?>
                <div class="panel-body panel-csm text-right">
                    <input type="text" class="form-control" id="search" style="width: 300px;float: left" placeholder="ຄົ້ນຫາ....">
                </div>
                <div class="panel-body panel-csm">
                    <table class="table" id="data">
                        <thead>
                            <tr>
                                <th>ລຳດັບ</th>
                                <th>ຊື່ແຂວງ</th>
                                <th>ຊື່ເມືອງ</th>
                                <th>ຊື່ບ້ານ</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i=1; while($res=mysqli_fetch_array($select)){ ?>
                            <tr  id="body">
                                <td><?php echo $i;?></td>
                                <td><?php echo $res['pro_name'] ?></td>
                                <td><?php echo $res['dis_name'] ?></td>
                                <td><?php echo $res['vill_name'] ?></td>
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
</div>
</div>
</div>
<?php include 'pugin_js.php' ?>
</body>

</html>