
<?php
session_start();
if(!$_SESSION['uname'] && !$_SESSION['upass']){
 header("location:../hr");

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Human Resource Database System | GES</title>
    <script src="<?=base_url()?>assets/js/snarl.min.js"></script>
    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/bootstrap-dialog.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/ui-lightness/jquery-ui-1.10.4.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/waves.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/snarl.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/dropzone.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/wecss.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
<div class="row we-nav we-nav-primary">

    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 cntrl-btn-area" style="display: none;">
        <a  href="#">
            <strong>
            <i class="fa fa-long-arrow-left fa-2x" style="padding:0 !important;"></i>
            </strong>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 hidden-sm hidden-xs title-area" style="font-weight: bold;">

    </div>
    <div class="col-lg-4 col-md-4 col-sm-9 col-xs-9">
    <div class="search-cont" style="display: none;">
    <input type="search" placeholder="Search..." class="we-search ">
    </div>
    </div>
<div class="col-lg-4 col-md-4 col-sm-2 col-xs-2 pull-right nav-tools">
<a  class="pull-right" style="box-shadow: 0 0 5px;" onclick="logout();return false;" href="#"><i style="margin: 0 !important;" class="fa fa-2x fa-sign-out"></i> </a>
<a  class="pull-right hidden-sm hidden-xs" onclick="showinfo(); return false;" href="#"><i style=" margin: 0 !important;" class="fa fa-info-circle fa-2x"></i></a>
<a  class="pull-right hidden-sm hidden-xs" onclick="showhelp(); return false;" href="#"><i style="margin: 0 !important;" class="fa fa-lightbulb-o fa-2x"></i> </a>
<a   class="pull-right add-btn" onclick="return false;" style="display: none;" href="#"><i style="margin: 0 !important;" class="fa fa-plus-square-o fa-2x"></i> </a>
<a   class="filter-btn pull-right" onclick="return false;" style="display: none;" href="#"><i style="margin: 0 !important;" class="fa fa-filter fa-2x"></i> </a>
</div>
</div>
    <div class="row">



    </div>
</div>







