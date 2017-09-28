<!DOCTYPE html>

<html>

<head>



	 <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        	<title>Calauit Safari System</title>

        <link rel="shortcut icon" href="<?php echo base_url('assets/dist/img/ico/favicon.png'); ?>" type="image/x-icon">

        <link rel="apple-touch-icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/dist/img/ico/apple-touch-icon-57-precomposed.png">

        <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="<?php echo base_url(); ?>assets/dist/img/ico/apple-touch-icon-72-precomposed.png">

        <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="<?php echo base_url(); ?>assets/dist/img/ico/apple-touch-icon-114-precomposed.png">

        <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="<?php echo base_url(); ?>assets/dist/img/ico/apple-touch-icon-144-precomposed.png">

        <link href="<?php echo base_url(); ?>assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo base_url(); ?>assets/plugins/lobipanel/lobipanel.min.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo base_url(); ?>assets/plugins/pace/flash.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo base_url(); ?>assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo base_url(); ?>assets/themify-icons/themify-icons.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo base_url(); ?>assets/plugins/toastr/toastr.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo base_url(); ?>assets/plugins/emojionearea/emojionearea.min.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo base_url(); ?>assets/plugins/monthly/monthly.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo base_url(); ?>assets/dist/css/styleBD.css" rel="stylesheet" type="text/css"/>



        <!-- Notification Styles -->

        <link href="<?php echo base_url(); ?>assets/plugins/NotificationStyles/css/demo.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo base_url(); ?>assets/plugins/NotificationStyles/css/ns-default.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo base_url(); ?>assets/plugins/NotificationStyles/css/ns-style-growl.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo base_url(); ?>assets/plugins/NotificationStyles/css/ns-style-attached.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo base_url(); ?>assets/plugins/NotificationStyles/css/ns-style-bar.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo base_url(); ?>assets/plugins/NotificationStyles/css/ns-style-other.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo base_url(); ?>assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo base_url(); ?>assets/plugins/toastr/toastr.css" rel="stylesheet" type="text/css"/>



</head>



 <body class="hold-transition sidebar-mini">

<?php 

    $qry = $this->db->where('agency_id',$this->session->userdata('agency_id'))->get('tblagency');

    $row = $qry->row();

    $agency = $row->agency_name;

 ?>

  <!-- Site wrapper -->

        <div class="wrapper">

            <header class="main-header"> 

                <a href="index.html" class="logo"> <!-- Logo -->

                    <span class="logo-mini">

                        <!--<b>A</b>BD-->

                        <img src="<?php echo base_url('assets/dist/img/palawan.png'); ?>" alt="">

                    </span>

                    <span >

                        <!--<b>Admin</b>BD-->

                        <img src="<?php echo base_url('images/csslogo.png'); ?>" alt="">

                    </span>

                </a>

                <!-- Header Navbar -->

                <nav class="navbar navbar-static-top">

                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <!-- Sidebar toggle button-->

                        <span class="sr-only">Toggle navigation</span>

                        <span class="pe-7s-keypad"></span>

                    </a>

                    <div class="navbar-custom-menu">

                        <ul class="nav navbar-nav">                                                                                  

                            <!-- settings -->

                            <li class="dropdown dropdown-user">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="pe-7s-settings"></i></a>

                                <ul class="dropdown-menu">

                                    <li><a href="#"><i class="pe-7s-users"></i> User Profile</a></li>

                                    <li><a href="#"><i class="pe-7s-settings"></i> Settings</a></li>

                                    <li><a href="<?php echo base_url('index.php/admin_controller/logout'); ?>"><i class="pe-7s-key"></i> Logout</a></li>

                                </ul>

                            </li>

                        </ul>

                    </div>

                </nav>

            </header>

            <!-- =============================================== -->

            <!-- Left side column. contains the sidebar -->

            <aside class="main-sidebar">

                <!-- sidebar -->

                <div class="sidebar">

                    <!-- Sidebar user panel -->

                    <div class="user-panel text-center">

                        <div class="image">

                            <img src="<?php echo base_url('assets/dist/img/palawan.png'); ?>" class="img-circle" alt="User Image">

                        </div>

                        <div class="info">

                            <p>Welcome!</p>

                            <p style="color: red;"><?php echo $this->session->userdata('username'); ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>

                        </div>

                    </div>

                    <!-- sidebar menu -->

                    <ul class="sidebar-menu">

                        <li class="header">MAIN NAVIGATION</li>

                        <li>

                            <a href="<?php echo base_url('index.php/admin_controller'); ?>"><i class="ti-stats-up"></i> <span>Dashboard</span></a>

                        </li>

                          

                        <li class="treeview">

                            <a href="#">

                                <i class="ti-file"></i><span>Manage Plans</span>

                                <span class="pull-right-container">

                                    <i class="fa fa-angle-left pull-right"></i>

                                </span>

                            </a>

                            <ul class="treeview-menu">

                                        <li>

                                        <a href="<?php echo base_url('index.php/uploader'); ?>"><span>Approve PPMP</span></a>

                                        </li>

                                    <li class="treeview">

                                        <a href="#">

                                            <span>Consolidate PPMP - CSE</span>

                                            <span class="pull-right-container">

                                                <i class="fa fa-angle-left pull-right"></i>

                                            </span>

                                        </a>
                                        <ul class="treeview-menu">
                                            <li><a target="_blank" href="<?php echo base_url("index.php/admin_controller/app_summary?type=2&is_cse=1"); ?>">Indicative PPMP</a></li>

                                            <li><a target="_blank" href="<?php echo base_url("index.php/admin_controller/app_summary?type=1&is_cse=1"); ?>">Final PPMP</a></li>

                                            <li><a target="_blank" href="<?php echo base_url("index.php/admin_controller/app_summary?type=0&is_cse=1"); ?>">Supplemental PPMP</a></li>
                                        </ul>

                                        </li><!--end consolidate CSE-->

                                        <li class="treeview">

                                        <a href="#">

                                            <span>Consolidate PPMP - GEN</span>

                                            <span class="pull-right-container">

                                                <i class="fa fa-angle-left pull-right"></i>

                                            </span>

                                        </a>
                                        <ul class="treeview-menu">
                                            <li><a target="_blank" href="<?php echo base_url("index.php/admin_controller/app_summary_gen?type=2&is_cse=0"); ?>">Indicative PPMP</a></li>

                                            <li><a target="_blank" href="<?php echo base_url("index.php/admin_controller/app_summary_gen?type=1&is_cse=0"); ?>">Final PPMP</a></li>

                                            <li><a target="_blank" href="<?php echo base_url("index.php/admin_controller/app_summary_gen?type=0&is_cse=0"); ?>">Supplemental PPMP</a></li>
                                        </ul>

                                        </li> <!--end consolidate GEN-->
                                    

                                         <li class="treeview">

                                        <a href="#">

                                            <span>Submit APP to PS-DBM</span>

                                            <span class="pull-right-container">

                                                <i class="fa fa-angle-left pull-right"></i>

                                            </span>

                                        </a>
                                        <ul class="treeview-menu">

                                            <li><a style="cursor: pointer;" onclick="submit_app()">Indicative APP</a></li>

                                            <li><a style="cursor: pointer;" onclick="submit_app2()">Final APP</a></li>

                                            <li><a style="cursor: pointer;" onclick="submit_app3()">Supplemental APP</a></li>
                                        </ul>
                                        </li><!--end submit-->

                                        <li>

                                        <a href="<?php echo base_url('index.php/uploader/archives'); ?>"><span>Archived PPMPs</span></a>

                                        </li>


                                </li>    



                            </ul>

                        </li>

                        

                         <!--<li><a href="<?php echo base_url("index.php/admin_controller/agencies?rem=1"); ?>"><i class="ti-user"></i>Offices / Programs</a></li>-->

                                <li><a href="<?php echo base_url("index.php/admin_controller/cse?rem=1"); ?>"><i class="ti-clipboard"></i>Supplies & Equipment</a></li>

                        <li class="treeview">

                            <a href="#">

                                <i class="ti-lock"></i> <span>User Management</span>

                                <span class="pull-right-container">

                                    <i class="fa fa-angle-left pull-right"></i>

                                </span>

                            </a>

                            <ul class="treeview-menu">

                                <li><a href="<?php echo base_url('index.php/admin_controller/css_user'); ?>">Register User</a></li>



                                <li><a href="<?php echo base_url('index.php/admin_controller/printUsers'); ?>">View User</a></li>                                

                            </ul>

                        </li>

                        <li class="treeview">

                            <a href="#">

                                <i class="ti-settings"></i> <span>Settings</span>

                                <span class="pull-right-container">

                                    <i class="fa fa-angle-left pull-right"></i>

                                </span>

                            </a>

                            <ul class="treeview-menu">

                                <!--<li><a href="<?php echo base_url('index.php/admin_controller/textblast'); ?>">Text Blast</a></li>-->

                                <!--<li><a href="#">Price List</a></li>-->

                                <li><a href="<?php echo base_url('index.php/admin_controller/edit_profile')?>">Profile</a></li>                            

                            </ul>

                        </li>

                     </ul>  

                </div> <!-- /.sidebar -->

            </aside>

       



        <script src="<?php echo base_url('assets/plugins/jQuery/jquery-1.12.4.min.js'); ?>" type="text/javascript"></script>

        <script src="<?php echo base_url('assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js'); ?>" type="text/javascript"></script>

        <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>

        <script src="<?php echo base_url('assets/plugins/lobipanel/lobipanel.min.js'); ?>" type="text/javascript"></script>

        <script src="<?php echo base_url('assets/plugins/pace/pace.min.js'); ?>" type="text/javascript"></script>

        <script src="<?php echo base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js'); ?>" type="text/javascript"></script>

        <script src="<?php echo base_url('assets/plugins/fastclick/fastclick.min.js'); ?>" type="text/javascript"></script>

        <script src="<?php echo base_url('assets/dist/js/frame.js'); ?>" type="text/javascript"></script>

        <script src="<?php echo base_url('assets/plugins/toastr/toastr.min.js'); ?>" type="text/javascript"></script>

        <script src="<?php echo base_url('assets/plugins/sparkline/sparkline.min.js'); ?>" type="text/javascript"></script>

        <script src="<?php echo base_url('assets/plugins/datamaps/d3.min.js'); ?>" type="text/javascript"></script>

        <script src="<?php echo base_url('assets/plugins/datamaps/topojson.min.js'); ?>" type="text/javascript"></script>

        <script src="<?php echo base_url('assets/plugins/datamaps/datamaps.all.min.js'); ?>" type="text/javascript"></script>

        <script src="<?php echo base_url('assets/plugins/counterup/waypoints.js'); ?>" type="text/javascript"></script>

        <script src="<?php echo base_url('assets/plugins/counterup/jquery.counterup.min.js'); ?>" type="text/javascript"></script>

        <script src="<?php echo base_url('assets/plugins/emojionearea/emojionearea.min.js'); ?>" type="text/javascript"></script>

        <script src="<?php echo base_url('assets/plugins/monthly/monthly.js'); ?>" type="text/javascript"></script>

        <script src="<?php echo base_url('assets/dist/js/dashboard.js'); ?>" type="text/javascript"></script>







        <!-- Notification js -->

        <script src="<?php echo base_url('assets/plugins/NotificationStyles/js/modernizr.custom.js'); ?>" type="text/javascript"></script>

        <script src="<?php echo base_url('assets/plugins/NotificationStyles/js/classie.js'); ?>" type="text/javascript"></script>

        <script src="<?php echo base_url('assets/plugins/NotificationStyles/js/notificationFx.js'); ?>" type="text/javascript"></script>

        <script src="<?php echo base_url('assets/plugins/NotificationStyles/js/snap.svg-min.js'); ?>" type="text/javascript"></script>

        <script src="<?php echo base_url('assets/plugins/sweetalert/sweetalert.min.js'); ?>" type="text/javascript"></script>

        <script src="<?php echo base_url('assets/plugins/toastr/toastr.min.js'); ?>" type="text/javascript"></script>

        <!-- End Page Lavel Plugins -->







        <script>

            $(document).ready(function () {



                "use strict"; // Start of use strict



              



                //counter

                $('.count-number').counterUp({

                    delay: 10,

                    time: 5000

                });

              

                //Sparklines Charts

                $('.sparkline1').sparkline([4, 6, 7, 7, 4, 3, 2, 4, 6, 7, 4, 6, 7, 7, 4, 3, 2, 4, 6, 7, 7, 4, 3, 1, 5, 7, 6, 6, 5, 5, 4, 4, 3, 3, 4, 4, 5], {

                    type: 'bar',

                    barColor: '#37a000',

                    height: '35',

                    barWidth: '3',

                    barSpacing: 2

                });



                $(".sparkline2").sparkline([-8, 2, 4, 3, 5, 4, 3, 5, 5, 6, 3, 9, 7, 3, 5, 6, 9, 5, 6, 7, 2, 3, 9, 6, 6, 7, 8, 10, 15, 16, 17, 15], {

                    type: 'line',

                    height: '35',

                    width: '100%',

                    lineColor: '#37a000',

                    fillColor: '#fff'

                });



                $(".sparkline3").sparkline([2, 5, 3, 7, 5, 10, 3, 6, 5, 7], {

                    type: 'line',

                    height: '35',

                    width: '100%',

                    lineColor: '#37a000',

                    fillColor: '#fff'

                });



                $(".sparkline4").sparkline([10, 34, 13, 33, 35, 24, 32, 24, 52, 35], {

                    type: 'line',

                    height: '35',

                    width: '100%',

                    lineColor: '#37a000',

                    fillColor: 'rgba(55, 160, 0, 0.7)'

                });



                $(".sparkline5").sparkline([4, 2], {

                    type: 'pie',

                    sliceColors: ['#37a000', '#2c3136']

                });



                $(".sparkline6").sparkline([3, 2], {

                    type: 'pie',

                    sliceColors: ['#37a000', '#2c3136']

                });



                $(".sparkline7").sparkline([4, 1], {

                    type: 'pie',

                    sliceColors: ['#37a000', '#2c3136']

                });



                $(".sparkline8").sparkline([1, 3], {

                    type: 'pie',

                    sliceColors: ['#37a000', '#2c3136']

                });



                $(".sparkline9").sparkline([3, 5], {

                    type: 'pie',

                    sliceColors: ['#37a000', '#2c3136']

                });

            });

        </script>       



        <script type="text/javascript">

        

                function submit_app() {

                    swal({

                        title: "Are you sure?",

                        text: "Are you sure you want to submit your INDICATIVE APP to PS-DBM?",

                        type: "warning",

                        showCancelButton: true,

                        confirmButtonColor: "#5BC752",

                        confirmButtonText: "Yes, Submit it!",

                        cancelButtonText: "No, cancel!",

                        closeOnConfirm: false,

                        closeOnCancel: true},

                            function (isConfirm) {

                                if (isConfirm) {

                                    //swal("Deleted!", "Your PPMP file has been deleted.", "success");

                                            window.location.replace("<?php echo base_url('index.php/admin_controller/submit_app?type=IND&status=1'); ?>");

                                } 

                            });

                };

                function submit_app2() {

                    swal({

                        title: "Are you sure?",

                        text: "Are you sure you want to submit your FINAL APP to PS-DBM?",

                        type: "warning",

                        showCancelButton: true,

                        confirmButtonColor: "#5BC752",

                        confirmButtonText: "Yes, Submit it!",

                        cancelButtonText: "No, cancel!",

                        closeOnConfirm: false,

                        closeOnCancel: true},

                            function (isConfirm) {

                                if (isConfirm) {

                                    //swal("Deleted!", "Your PPMP file has been deleted.", "success");

                                            window.location.replace("<?php echo base_url('index.php/admin_controller/submit_app?type=FIN&status=3'); ?>");

                                } 

                            });

                };

                function submit_app3() {

                    swal({

                        title: "Are you sure?",

                        text: "Are you sure you want to submit your SUPPLEMENTAL APP to PS-DBM?",

                        type: "warning",

                        showCancelButton: true,

                        confirmButtonColor: "#5BC752",

                        confirmButtonText: "Yes, Submit it!",

                        cancelButtonText: "No, cancel!",

                        closeOnConfirm: false,

                        closeOnCancel: true},

                            function (isConfirm) {

                                if (isConfirm) {

                                    //swal("Deleted!", "Your PPMP file has been deleted.", "success");

                                            window.location.replace("<?php echo base_url('index.php/admin_controller/submit_app?type=SUP&status=5'); ?>");

                                } 

                            });

                };

            

        </script>