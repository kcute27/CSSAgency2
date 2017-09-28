<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Calauit Safari</title>

        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/dist/img/ico/favicon.png" type="image/x-icon">      
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/dist/css/styleBD.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
     <style type="text/css">

        body{
            background-image: url("<?php echo base_url(); ?>assets/dist/img/zebra_module/background.jpg");
        }
        .panel{
            background-image: url("<?php echo base_url(); ?>assets/dist/img/zebra_module/login_bg.png");
            background-repeat: no-repeat;

        }
         .panel-heading{
            background-image: url("<?php echo base_url(); ?>assets/dist/img/zebra_module/login_bg.png");
            background-repeat: no-repeat;
        }
    </style>
    <body>
   
    <div id="wrapper">

            <div class="navbar-header" style="text-align: center; left:0px; right: 0px; position: absolute; ">                         
              <img style="width: 100%;" src="<?php echo base_url('assets/dist/img/zebra_module/header.jpg'); ?>"   >            
            </div>
            <div style=" text-align: center; position: absolute; top: 3px; width: 100%;"><img style="width: 35%;  " src="<?php echo base_url('assets/dist/img/zebra_module/css.png'); ?>"></div>
            
            <div style="text-align: right; width: 100%; position: absolute; right: 50px; top: 0px;">
                <img style="width: 20%;   " src="<?php echo base_url('assets/dist/img/zebra_module/zebra.png'); ?>">
            </div>

           
 <!--<div class="login-wrapper" style="text-align: center;">

                            <img style="width: 35%; margin-top:-150px; margin-right:  30px; " src="<?php echo base_url('assets/dist/img/giraffe_module/login.png'); ?>">

            </div>-->  
            <div class="login-wrapper" style="margin-top: 0px;" >
            <div class="container-center">
                <div class="panel panel-bd">
                    <div class="panel-heading">
                        <div class="view-header">
                            <div class="header-icon">
                                <i class="pe-7s-unlock"></i>
                            </div>
                            <div class="header-title" >
                                <h1>ZEBRA</h1>
                                <h4>Module</h4>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form action="<?php echo base_url('index.php/login_controller/validate_user'); ?>" method = "post" id="loginForm" novalidate>
                            <div class="form-group">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" placeholder="Please enter your username" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" placeholder="Please enter your password" name="password" id="password" class="form-control">
                            </div>
                            <div style="">
                                <button type="submit" class="btn btn-lg btn-labeled btn-success m-b-5 col-md-12" style="text-align: left; "><span class="btn-label"><i class="pe-7s-unlock"></i></span><b class="col-md-offset-3">Login</b></button>
                            </div><br/>
                            <?php if (validation_errors() != "") { ?>
                                <div id="helpdiv" class="alert alert-danger text-center" style="display:block">
                                    <strong>Error!</strong> <?php echo validation_errors(); ?>
                                </div>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div style="text-align: center; margin-top: -50px;">
                  <h3 style="text-align: center;"><img style="width: 3%;" src="<?php echo base_url(); ?>assets/dist/img/ico/logocs.png" alt=""></i>&nbsp&nbsp&nbsp Calauit Safari - Agency!<br><b style="font-size: 15px;">Version</b> 1.0</h3>
                <strong>Copyright &copy; 2017 <a href="#">Provincial Government of Palawan-eGovernance</a>.</strong> All rights reserved. <i class="fa fa-smile-o color-green"></i>
                </div>      
</div>
    <!--
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">             
              <img src="<?php echo base_url('assets/dist/img/header.png'); ?>" style="margin-left: -17px;">
            </div>
          </div>
        </nav>
    -->

    <!--<nav class="navbar navbar-default" style="background-color: white; height: 150px;">
          <div class="container" style="margin-top: -19px; text-align: center;">
            <div class="navbar">
                <img style="width: 45%;" src="<?php echo base_url(); ?>images/cssbanner2.jpg" alt="">
            </div>
          </div>
    </nav>  


        <div class="login-wrapper" style="margin-top: -150px">
            <div class="container-center">
                <div class="panel panel-bd">
                    <div class="panel-heading">
                        <div class="view-header">
                            <div class="header-icon">
                                <i class="pe-7s-unlock"></i>
                            </div>
                            <div class="header-title">
                                <h3>Login - Agency</h3>
                                <small><strong>Please enter your credentials to login.</strong></small>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form action="<?php echo base_url('index.php/login_controller/validate_user'); ?>" method = "post" id="loginForm" novalidate>
                            <div class="form-group">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" placeholder="Please enter your username" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" placeholder="Please enter your password" name="password" id="password" class="form-control">
                            </div>
                            <div style="">
                                <button type="submit" class="btn btn-lg btn-labeled btn-success m-b-5 col-md-12" style="text-align: left;"><span class="btn-label"><i class="pe-7s-unlock"></i></span><b class="col-md-offset-3">Login</b></button>
                            </div><br/>
                            <?php if (validation_errors() != "") { ?>
                                <div id="helpdiv" class="alert alert-danger text-center" style="display:block">
                                    <strong>Error!</strong> <?php echo validation_errors(); ?>
                                </div>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div style="text-align: center; margin-top: -50px;">
                  <h3 style="text-align: center;"><img style="width: 3%;" src="<?php echo base_url(); ?>assets/dist/img/ico/logocs.png" alt=""></i>&nbsp&nbsp&nbsp Calauit Safari System - Agency!<br><b style="font-size: 15px;">Version</b> 1.0</h3>
                <strong>Copyright &copy; 2016-2017 <a href="#">Provincial Government of Palawan-eGovernance</a>.</strong> All rights reserved. <i class="fa fa-smile-o color-green"></i>
                </div>
-->
        <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>
        <script type="text/javascript">
                    // close the div in 5 secs
                    window.setTimeout("closeHelpDiv();", 5000);

                    function closeHelpDiv(){
                    document.getElementById("helpdiv").style.display=" none";
                    }
        </script>
