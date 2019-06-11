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
    <div class="row" style="border: 1px solid #CCCCCC; box-shadow: 0 0 5px;">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 hidden-sm hidden-xs text-center">
            <img src="./assets/img/ghanacrest.png" class="img-responsive" alt="">
            <h3>GHANA EDUCATION SERVICE</h3>
            <h3>WA MUNICIPAL, WA</h3>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <div class="row"><center><h2 class="text-muted">HUMAN RESOURCE DATABASE SYSTEM</h2></center></div>
            <p>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3 col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form id="loginfrm">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="uname" class="control-label">Login Name</label>
                                    <input type="text" name="uname" class="form-control" placeholder="Enter your login name" required />
                                </div>
                            </div>
                                <br />
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="upass" class="control-label">Password</label>
                                    <input name="upass" type="password" class="form-control" placeholder="Enter your login password" required />
                                </div>
                            </div>
                            <p></p>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                   <button type="submit" class="btn btn-good btn-block btn-default">Log In</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <P><span id="loginprogress" style="transition: .3s ease-in-out"></span></P>
                        <span class="text-warning"><i class="fa fa-warning"></i> PLEASE ENTER YOUR VALID LOGIN CREDENTIALS TO LOGIN</span>

                    </div>

                </div>
            </div>


        </div>
    </div>
</div>
<script src="<?=base_url()?>assets/js/jquery.min.js"></script>
<script src="<?=base_url()?>assets/js/jquery-ui-1.10.4.min.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap-dialog.min.js"></script>
<script src="<?=base_url()?>assets/js/waves.min.js"></script>
<script src="<?=base_url()?>assets/js/dropzone.min.js"></script>
<script src="<?=base_url()?>assets/js/wejs.js"></script>


<script>
    $(document).ready(function(){
$("form#loginfrm").submit(function(){
var msg = "<span class='text-muted'><i class='fa fa-spinner fa-spin'></i> Verifying your identity, Please wait.. </span>";
$("#loginprogress").html(msg);
    var data = $("#loginfrm :input").serializeArray();

    $
        .getJSON("./app/confirmuser/",data,function(d){


        })

        .error(function(d){
            var msg = "<span class='text-danger'><i class='fa fa-bug'></i>Something went wrong, login process failed</span>";
            $("#loginprogress").html(msg);
        })
        .done(function(d){
            if(d.status == 0){
                var msg = "<span class='text-danger'><i class='fa fa-bug'></i> "+ d.msg+"</span>";
                $("#loginprogress").html(msg);
            }else{

                window.location="./app";
            }

        });
    return false;
});

    });

</script>
</body>
</html>