<!doctype html>
<html class="no-js" lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Sign Up</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- favicon
============================================ -->

<?php include 'pugin_css.php' ?>
<style>
    body{font-family: phetsarath OT !important}
</style>
</head>

<body>
<!-- Mobile Menu end -->
<div class="breadcome-area">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="breadcome-list single-page-breadcome">
<div class="row">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="back-link back-backend">
                    <a href="login.php" class="btn btn-primary"><i class="fa fa-reply-all"></i> ກັບຄືນ</a>
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
</div>
<!-- Single pro tab start-->
<div class="single-product-tab-area mg-tb-15">
<!-- Single pro tab review Start-->
<div class="single-pro-review-area">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="review-tab-pro-inner">
<ul id="myTab3" class="tab-review-design">
<li class="active"><a href="#description"><i class="fa fa-user-plus" aria-hidden="true"></i> ສ້າງບັນຊີໃໝ່</a></li>
</ul>
<div id="myTabContent" class="tab-content custom-product-edit">
<div class="product-tab-list tab-pane fade active in" id="description">
    <div class="row">
        <form action="" method="post">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="review-content-section">
                <div class="input-group mg-b-pro-edt">
                    <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" placeholder="ກະລຸນາປ້ອນຊື່" required>
                </div>
                <div class="input-group mg-b-pro-edt">
                    <span class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" placeholder="ກະລຸນາປ້ອນນາມສະກຸນ" required>
                </div>
                <div class="input-group mg-b-pro-edt">
                    <span class="input-group-addon"><i class="fa fa-transgender" aria-hidden="true"></i></span>
                    <select name="gender" id="" class="form-control">
                        <option value="">ເລືອກເພດ</option>
                        <option value="ຍິງ">ຍິງ</option>
                        <option value="ຊາຍ">ຊາຍ</option>
                    </select>
                </div>
                <div class="input-group mg-b-pro-edt">
                    <span class="input-group-addon"><i class="fa fa-calendar-o" aria-hidden="true"></i></span>
                    <input type="date" name="dob" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="review-content-section">
                <div class="input-group mg-b-pro-edt">
                    <span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                    <textarea name="" id="" name="address" class="form-control" placeholder="ກະລຸນາປ້ອນທີ່ຢູ່" required></textarea>
                </div>
                <div class="input-group mg-b-pro-edt">
                    <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                    <input type="text" name="tel" class="form-control" placeholder="ກະລຸນາປ້ອນເບີໂທລະສັບ" required>
                </div>
                <div class="input-group mg-b-pro-edt">
                    <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                    <input type="text" name="username" class="form-control" placeholder="ກະລຸນາປ້ອນຊື່ຜູ້ນຳໃຊ້" required>
                </div>
                <div class="input-group mg-b-pro-edt">
                    <span class="input-group-addon"><i class="fa fa-expeditedssl" aria-hidden="true"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="ກະລຸນາປ້ອນລະຫັດຜ່ານ" required>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="text-left mg-b-pro-edt custom-pro-edt-ds">
                <button type="submit" class="btn btn-primary waves-effect waves-light m-r-10"><i class="fa fa-check"></i> ສ້າງ
				</button>
                <button type="reset" class="btn"><i class="fa fa-remove"></i> ຍົກເລີກ
			</button>
            </div>
        </div>
    </div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<?php include 'Pugin_JS.php' ?>
</body>

</html>