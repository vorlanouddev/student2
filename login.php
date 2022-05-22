<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login Students Management</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include 'pugin_css.php'; ?>
    <style>
        body{font-family: phetsarath OT !important}
    </style>
</head>

<body>
    <div class="color-line"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-4 col-md-4 col-sm-4 col-xs-12">
                <div class="hpanel"  style="margin-top: 15%">
                    <div class="panel-body">
                <div class="text-center m-b-md custom-login">
                    <h3>Stusdents Managerment</h3>
                    <p>ລະບົບບໍລິຫານນັກຮຽນ</p>
                    <i class="fa fa-expeditedssl" aria-hidden="true"></i>
                </div>
                <hr>
                        <form action="save_login.php" id="loginForm" method='post'>
                            <div class="input-group mg-b-pro-edt">
                               <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                <input type="text" name="username" placeholder="ກະລຸນາປ້ອນຊື່ຜູ້ນຳໃຊ້" title="Please enter you username" required="" value="" name="username" id="username" class="form-control">
                            </div>
                            <div class="input-group mg-b-pro-edt">
                                <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                                <input type="password" name="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-success btn-block loginbtn">ເຂົ້າສູ່ລະບົບ</button>
                            <a class="btn btn-default btn-block" href="sign_up.php">ລົງທະບຽນ ?</a>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</body>

</html>
