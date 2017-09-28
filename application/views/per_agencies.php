<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Calauit Safari System- ADMIN</title>
        <link rel="shortcut icon" href="<?php echo base_url('assets/dist/img/ico/favicon.png'); ?>" type="image/x-icon">
        <link rel="apple-touch-icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/dist/img/ico/apple-touch-icon-57-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="<?php echo base_url(); ?>assets/dist/img/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="<?php echo base_url(); ?>assets/dist/img/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="<?php echo base_url(); ?>assets/dist/img/ico/apple-touch-icon-144-precomposed.png">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/admin_css.css"/>
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
    </head>
    <style type="text/css">
    </style>
    <body class="hold-transition sidebar-collapse sidebar-mini">
       <div class="wrapper">
                <input style="margin-top: 10px; margin-right:10px;  " class="btn btn-success pull-right" id="printpagebutton" type="button" value="Print" onclick="printpage()"/>
            <div class="content-wrapper"  style="background-color: white; margin-right: 50px; ">
                <div class="content">
                    <div class="row">
                        <div class="panel-body">
                            <div class="table-responsive">
                             
                                   <table>
                                       <h3 class="text-center" "><b>ANNUAL PROCUREMENT PLAN FOR 2017</b></h3>
                                       <h4 class="text-center" style="margin-top:-10px">For Common-Use Supplies and Equipment</h4>

                                       <h6 style="text-align: left;"> <b>INSTRUCTIONS IN FILLING OUT THE ANNUAL PROCUREMENT PLAN (APP) FORM:</b></h6>
                                       <h6 style="margin-top: -10px">
                                            1. Select the appropriate worksheet depending on the nearest Regional/Provincial Depot in your area.                                                    
                                       </h6>
                                       <h6 style="margin-top: -10px">
                                            2. For Sub - Depots please refer to the following (Arranged/ Classified according to commmonality of freight cost):
                                       </h6>
                                       <h6 style="margin-left: 30px; margin-top: -10px">
                                           a. Bukidnon, Puerto Princesa Palawan, Biliran, Borongan, Misamis Occidental (Oroquieta) and Southern Leyte (Maasin) -<b>Region XIII</b> 
                                       </h6>
                                       <h6 style="margin-left: 30px; margin-top: -10px">
                                            b. Misamis Oriental, Bacolod, Calbayog, Bontoc and Northern Samar (Catarman) -<b>Regions VI, VII, VIII, X, & XI</b> 
                                       </h6>
                                       <h6 style="margin-left: 30px; margin-top: -10px">
                                           c. Surigao Del Norte -<b>Surigao Del Norte</b> 
                                       </h6>
                                       <h6 style="margin-left: 30px; margin-top: -10px">
                                           d. Zamboanga Sibugay- <b>Zamboanga Sibugay</b>
                                       </h6>
                                       <h6 style="margin-left: 30px; margin-top: -10px">
                                            e. Camiguin -<b>Camiguin</b> 
                                       </h6>
                                       <h6 style="margin-top: -10px">
                                            3. Indicate the agency’s monthly requirement per item in the APP form. The form will automatically compute for the Total Quarterly requirement, Total Amount per item and the Grand Total.
                                       </h6>
                                       <h6 style="margin-top: -10px">
                                           <b>
                                                4. APPs are considered incorrect if: a) form used is other than the prescribed format downloaded at philgeps.gov.ph and; b) correct format is used but fields were deleted and/or inserted
                                            </b> 
                                       </h6>
                                       <h6 style="margin-top: -10px">
                                                in Portion A of the APP. The agency will be informed through e-mail if the submission is incorrect.
                                       </h6>
                                       <h6 style="margin-top: -10px">
                                            5. For Other Items not available from the Procurement Service but regularly purchased from other sources, agency must specify/indicate the item name under each category and unit price based on their lastpurchase of the item/s. These items will be evaluated by the Procurement Service and may be considered Common Supplies or Equipment (CSE). Items will be added to the electronic catalogue/virtual store as soon as it is procured and made available by the Procurement Service.
                                      </h6> 
                                      <div class="nav">
                                      <h6 style="margin-top: -10px;" class="text-danger">
                                      6. The accomplished  <b class="text-danger">HARD COPY</b> of the APP-CSE shall be submitted in the following manner:
                                      </h6>
                                      <h6 style="margin-left: 30px; margin-top: -10px;" class="text-danger">
                                      a. DBM Central Office- for entities in the Central Office
                                      </h6>
                                      <h6 style="margin-left: 30px; margin-top: -10px;" class="text-danger">
                                      b. DBM Regional Office (RO)- for regional offices, operating units of DepEd, DOH, DPWH, CHED, TESDA and SUCs
                                      </h6>
                                      <h6 style="margin-top: -10px;" class="text-danger">
                                       6. The accomplished  <b class="text-danger">SOFT COPY</b> of the APP-CSE shall be submitted to the following email addressess:
                                       </h6>
                                      <h6 style="margin-left: 30px; margin-top: -10px;" class="text-danger"> 
                                      a. ps.app.nga@gmail.com- For central and regional offices of all national government agencies</h6>
                                      <h6 style="margin-left: 30px; margin-top: -10px;" class="text-danger">
                                      b. ps.app.suc@gmail.com- For main and other campuses of all state universities and colleges
                                      </h6>
                                      <h6 style="margin-left: 30px; margin-top: -10px;" class="text-danger"> 
                                      c. ps.app.gocc@gmail.com- For all central and regional offices of government owned and controlled corporations
                                      </h6>
                                      <h6 style="margin-left: 30px; margin-top: -10px;" class="text-danger">
                                      d. ps.app.deped@gmail.com- For primary and secondary schools
                                      </h6>
                                      </div>
                                      <h6 style=" margin-top: -10px">
                                      7. Consistent with National Budget Circular No. 555, the APP for FY 2016 must be submitted on or before  <b>November 30, 2015.</b> 
                                      </h6>
                                      <h6 style=" margin-top: -10px"> 
                                      8. Rename your APP file in the following format: APP2016- Name of Agency- Region (e.g. APP2016 -PS- Central Office).
                                      </h6>
                                      <h6 style=" margin-top: -10px"> 
                                      9. For further assistance/clarification, agencies may call the Planning Division of the Procurement Service at telephone nos. (02)561-6116 or (02)689-7750 loc. 4021.
                                      </h6>

                                    <div id="container">
                                        <div class="cell">
                                            <span>Agency/Department/Office:</span>
                                            <div align="buttom">Region:</div>
                                            <span>Address:</span>                                           
                                        </div>
                                        <div style="margin-top: -60px;">
                                            <div style="margin-left:850px;">Contact Person:</div>
                                            <div style="margin-left:850px;">Position:</div>
                                            <div style="margin-left:850px;">Email:</div>
                                            <div style="margin-left:850px;">Telephone/Mobile No:</div>
                                        </div>
                                    </div>
                                    </table>
                                    <table border="1" id="table_2" style="">
                                    <tr>
                                        <th rowspan="2" id="item">Item & Specification</th>
                                        <th rowspan="2" id="unit">Unit of Measure</th>
                                        <th colspan="17" id="QR">Quantity Requirments</th>
                                        <th rowspan="2" id="catalogue">Price Catalogue as of 16/01/2017</th>
                                        <th rowspan="2" id="amount">TOTAL AMOUNT</th>
                                    </tr>
                                    <tr>
                                        <th>Jan</th>
                                        <th>Feb</th>
                                        <th>Mar</th>
                                        <th><b>Q1</b></th>
                                        <th>Apr</th>
                                        <th>May</th>
                                        <th>Jun</th>
                                        <th>Jul</th>
                                        <th><b>Q2</b></th>
                                        <th>Aug</th>
                                        <th>Sep</th>
                                        <th>Oct</th>
                                        <th><b>Q3</b></th>
                                        <th>Oct</th>
                                        <th>Nov</th>
                                        <th>Dec</th>
                                        <th><b>Q4</b></th>
                                    </tr>
                                    <tr>
                                        <th colspan="21" id="a">A. AVAILABLE AT PROCUREMENT SERVICE STORES</th>
                                    </tr>
                                    </table>

                                    <table border="1" id="table_2" style="">
                                       <tr>
                                        <th rowspan="2" id="item" class="bg-primary " style="">COMMON ELECTRICAL SUPPLIES</th>
                                        <th id="unit"></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th id="catalogue"></th>
                                        <th id="amount"></th>
                                    </tr>
                                    </table>

                            </div>
                        </div>
                    </div>
                </div> 
            </div>              
    </div>

        <script src="<?php echo base_url('assets/plugins/jQuery/jquery-1.12.4.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/plugins/lobipanel/lobipanel.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/plugins/pace/pace.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/plugins/fastclick/fastclick.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/dist/js/frame.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/dist/js/dashboard.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/plugins/datatables/dataTables.min.js'); ?>" type="text/javascript"></script>

       <script>
        function printpage() {
        var printButton = document.getElementById("printpagebutton"); 
        printButton.style.visibility = 'hidden';
        window.print()
        printButton.style.visibility = 'visible';
    }
        </script>
    </body>
</html>