<?php 

  $qry = $this->db->where('status',"current")->get('tblfiscal_year');

  $row = $qry->row();

  $fiscal_year = $row->fiscal_year;

  $agency_id = $this->session->userdata('agency_id');

  $qry_p = $this->db->where('agency_id',$agency_id)->get('tblagency');

  $row_p = $qry_p->row();



  $qry_app = $this->db->where('app_year',$fiscal_year)->where('app_agency_id',$agency_id)->get('tblapp');

  

  if ($qry_app->num_rows()>0) {

    $row_app = $qry_app->row();

    $app_name = $row_app->app_name;

  }

  else{

    $app_name = "";

  }

  
  $type = $this->input->get('type');



  $msg = $this->input->get('msg');

    if (isset($msg) && $msg == "success") {

        $notif = "APP has been successfully submitted to depot!";

    }



    else{

        $notif = "";

    }


    $is_cse = $this->input->get('is_cse');
 ?>

<!DOCTYPE html>

<html lang="en">



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

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/admin_css.css"/>

        <link href="<?php echo base_url(); ?>assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo base_url(); ?>assets/plugins/pace/flash.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo base_url(); ?>assets/dist/css/styleBD.css" rel="stylesheet" type="text/css"/>

        <link href="<?php echo base_url(); ?>assets/plugins/toastr/toastr.css" rel="stylesheet" type="text/css"/>



        <script type="text/javascript">

      // Toastr options

            toastr.options = {

                "debug": false,

                "newestOnTop": false,

                "positionClass": "toast-top-center",

                "closeButton": true,

                "toastClass": "animated fadeInDown"

            };



            $('.toastr1').on("click", function () {

                toastr.info('Info - This is a custom Homer info notification');

            });



            //$('.toastr2').on("click", function () {

                var msg = "<?php echo $msg; ?>";

                if (msg == "success") {

                    toastr.success("<?php echo $notif; ?>");

                }

                else{



                }

            //});



            $('.toastr3').on("click", function () {

                toastr.warning('Warning - This is a Homer warning notification');

            });



            //$('.toastr4').on("click", function () {

                

            //});



 </script>

<script src="<?php echo base_url('assets/plugins/toastr/toastr.min.js'); ?>" type="text/javascript"></script>

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

                                       <h5><?php echo $app_name; ?></h5>

                                       <h3 class="text-center" "><b>ANNUAL PROCUREMENT PLAN FOR <?php echo $fiscal_year; ?></b></h3>

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

                                            <span>Agency/Department/Office: <b><?php echo $row_p->agency_name; ?></b></span>

                                            <div align="buttom">Region: <b><?php echo $row_p->region; ?></b></div>

                                            <span>Address: <b><?php echo $row_p->location; ?></b></span>

                                            <div align="buttom">Agency Account Code: <b><?php echo $row_p->agency_code; ?></b></div>                                           

                                        </div>

                                        <div style="margin-top: -80px;">

                                            <div style="margin-left:850px;">Contact Person: <b><?php echo $row_p->contact_person; ?></b></div>

                                            <div style="margin-left:850px;">Position: <b><?php echo $row_p->cp_position; ?></b></div>

                                            <div style="margin-left:850px;">Email: <b><?php echo $row_p->cp_email; ?></b></div>

                                            <div style="margin-left:850px;">Telephone/Mobile No: <b><?php echo $row_p->cp_number; ?></b></div>

                                        </div>

                                    </div>

                                    </table>

                                    

                                    <table border="1" id="table_2" style="">

                                    <tr>

                                        <th rowspan="2" id="item">Item & Specification</th>

                                        <th rowspan="2" id="unit">Unit of Measure</th>

                                        <th colspan="21" id="QR">Quantity Requirments</th>

                                        <th rowspan="2" id="catalogue" style="width: 50px;">Price Catalogue as of 16/01/2017</th>

                                        <th rowspan="2" id="amount" style="width: 80px;">TOTAL AMOUNT</th>

                                    </tr>

                                    <tr style="font-size: 10px;">

                                        <th style="width: 33px; text-align: center;">Jan</th>

                                        <th style="width: 33px; text-align: center;">Feb</th>

                                        <th style="width: 33px; text-align: center;">Mar</th>



                                        <th style="width: 35px; text-align: center;"><b>Q1</b></th>



                                        <th style="width: 35px; text-align: center; font-size:10px; "><b>Q1 Amount</b></th>



                                        <th style="width: 33px; text-align: center;">Apr</th>

                                        <th style="width: 33px; text-align: center;">May</th>

                                        <th style="width: 33px; text-align: center;">Jun</th>



                                        <th style="width: 35px; text-align: center;"><b>Q2</b></th>



                                         <th style="width: 35px; text-align: center; font-size:10px;"><b>Q2 Amount</b></th>



                                        <th style="width: 33px; text-align: center;">Jul</th>

                                        <th style="width: 33px; text-align: center;">Aug</th>

                                        <th style="width: 33px; text-align: center;">Sep</th>



                                        <th style="width: 35px; text-align: center;"><b>Q3</b></th>



                                         <th style="width: 35px; text-align: center; font-size:10px;"><b>Q3 Amount</b></th>



                                        <th style="width: 33px; text-align: center;">Oct</th>

                                        <th style="width: 33px; text-align: center;">Nov</th>

                                        <th style="width: 33px; text-align: center;">Dec</th>



                                        <th style="width: 35px; text-align: center;"><b>Q4</b></th>



                                         <th style="width: 35px; text-align: center; font-size:10px;"><b>Q4 Amount</b></th>

                                         <th style="width: 35px; text-align: center; font-size:10px;"><b>Total Quantity</b></th>



                                    </tr>

                                    <tr>

                                        <th colspan="26" id="a">A. AVAILABLE AT PROCUREMENT SERVICE STORES</th>

                                    </tr>

                                    

                                       

                                    <?php 

                                      $aq1 = 0; $aq2=0; $aq3=0; $aq4=0;

                                     ?>

                                    <tbody>

                                    <?php $qry=$this->db->where('is_cse',$is_cse)->get('tblvacs') ?>                                               

                                    <?php foreach ($qry->result() as $value) { $vacs=$value->vacs?>

                                    <tr>

                                      <th class="bg-primary" id="item" style="font-weight: bold; text-align: center;"><?php echo $value->vacs_name ?></th>

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

                                      <th></th>

                                      <th></th>

                                      <th></th>

                                      <th></th>

                                      <th id="catalogue" style="width: 45px;"></th>

                                      <th id="amount" style="width: 73px;"></th>

                                    </tr>

             

                                    <?php 



                                        $qry1 = $this->db->query("SELECT tblitems.description, tblitems.item_id, tblitems.unit, 

                                      SUM(tbltransaction.qty_jan) as qty_jan, 

                                      SUM(tbltransaction.qty_feb) as qty_feb, 

                                      SUM(tbltransaction.qty_mar) as qty_mar, 

                                      SUM(tbltransaction.qty_apr) as qty_apr, 

                                      SUM(tbltransaction.qty_may) as qty_may, 

                                      SUM(tbltransaction.qty_jun) as qty_jun, 

                                      SUM(tbltransaction.qty_jul) as qty_jul, 

                                      SUM(tbltransaction.qty_aug) as qty_aug, 

                                      SUM(tbltransaction.qty_sep) as qty_sep, 

                                      SUM(tbltransaction.qty_oct) as qty_oct, 

                                      SUM(tbltransaction.qty_nov) as qty_nov, 

                                      SUM(tbltransaction.qty_dec) as qty_dec, 

                                      tbltransaction.price, 

                                      SUM(tbltransaction.total_price) as total_price 

                                      FROM tbltransaction 

                                      INNER JOIN `tblitems` ON `tblitems`.item_id = tbltransaction.item_id

                                      INNER JOIN `tblvacs` ON `tblvacs`.vacs = tblitems.vacs

                                      INNER JOIN `tblppmp` ON `tblppmp`.ppmp_id = tbltransaction.ppmp_id

                                      INNER JOIN `tbloffice` ON `tbloffice`.office_id = tblppmp.office_id

                                      INNER JOIN `tblagency` ON `tblagency`.agency_id = tbloffice.agency_id

                                      WHERE tblitems.vacs = $vacs AND tblvacs.is_cse = $is_cse AND tblitems.separatr = 'A' AND tblagency.agency_id = $agency_id AND tblppmp.approved = '1' AND tblppmp.is_ppmp = '".$type."' AND tblppmp.fiscal_year = $fiscal_year

                                      GROUP BY tbltransaction.item_id");

                                     ?>



                                    

                                    <?php foreach ($qry1->result() as $row) { ?>                              

                                        <tr style="font-size: 11px;">

                                            <td><?php echo $row->description; ?></td>

                                            <td id="unit"><?php echo $row->unit; ?></td>



                                            <td style="width:33px; text-align: center; "><?php echo $row->qty_jan; ?></td> 

                                            <td style="width: 33px; text-align: center;"><?php echo $row->qty_feb; ?></td>

                                            <td style="width: 33px; text-align: center;"><?php echo $row->qty_mar; ?></td>



                                            <?php $Q1=$row->qty_jan + $row->qty_feb + $row->qty_mar; ?>

                                            <td style="width: 33px; font-weight: bold; text-align: center;"><?php echo $Q1 ?></td>



                                            <?php $q1amount=$Q1*$row->price; ?>

                                            <?php $aq1+=$Q1*$row->price; ?>

                                            <td style="width: 35px; font-weight: bold; text-align: center;"><?php echo $q1amount ?></td>



                                            <td style="width: 33px; text-align: center;"><?php echo $row->qty_apr; ?></td>

                                            <td style="width: 33px; text-align: center;"><?php echo $row->qty_may; ?></td>

                                            <td style="width: 33px; text-align: center;"><?php echo $row->qty_jun; ?></td>



                                            <?php $Q2=$row->qty_apr + $row->qty_may + $row->qty_jun; ?>

                                            <td style="width: 33px; font-weight: bold; text-align: center;"><?php echo $Q2 ?></td>



                                            <?php $q2amount=$Q2*$row->price; ?>

                                            <?php $aq2+=$Q2*$row->price; ?>

                                            <td style="width: 35px; font-weight: bold; text-align: center;"><?php echo $q2amount ?></td>



                                            <td style="width: 33px; text-align: center;"><?php echo $row->qty_jul; ?></td>                                                                           

                                            <td style="width: 33px; text-align: center;"><?php echo $row->qty_aug; ?></td>

                                            <td style="width: 33px; text-align: center;"><?php echo $row->qty_sep; ?></td>



                                            <?php $Q3=$row->qty_jul + $row->qty_aug + $row->qty_sep; ?>

                                            <td style="width: 33px; font-weight: bold; text-align: center;"><?php echo $Q3 ?></td>



                                            <?php $q3amount=$Q3*$row->price; ?>

                                            <?php $aq3+=$Q3*$row->price; ?>

                                            <td style="width: 35px; font-weight: bold; text-align: center;"><?php echo $q3amount ?></td>



                                            <td style="width: 33px; text-align: center;"><?php echo $row->qty_oct; ?></td>

                                            <td style="width: 33px; text-align: center;"><?php echo $row->qty_nov; ?></td>

                                            <td style="width: 33px; text-align: center;"><?php echo $row->qty_dec; ?></td>



                                            <?php $Q4=$row->qty_oct + $row->qty_nov + $row->qty_dec; ?>

                                            <td style="width: 33px; font-weight: bold; text-align: center;"><?php echo $Q4 ?></td>



                                            <?php $q4amount=$Q4*$row->price; ?>

                                            <?php $aq4+=$Q4*$row->price; ?>

                                            <td style="width: 35px; font-weight: bold; text-align: center;"><?php echo $q4amount ?></td>



                                            <?php $totalquantity=$Q1+$Q2+$Q3+$Q4 ?>

                                            <td style="width: 50px; font-weight: bold; text-align: center;"><?php echo $totalquantity ?></td>



                                            <td id="catalogue" style="font-weight: bold; width: 78px;"><?php echo $row->price; ?></td>

                                           

                                            <td style="font-weight: bold; text-align: center; width: 50px;"><?php echo number_format($row->total_price,2); ?></td>

                                        </tr>

                                     <?php } }?> 

                                   </tbody>

                                      <tr>

                                        <th colspan="26" id="a">B. OTHER ITEMS NOT AVALABLE AT PS BUT REGULARLY PURCHASED FROM OTHER SOURCES (Note: Please indicate price of items)</th>

                                    </tr>                                  

                                    <tbody>

                                    <?php 

                                      $bq1 = 0; $bq2=0; $bq3=0; $bq4=0;

                                     ?>

                                    <?php $qry=$this->db->where('is_cse',$is_cse)->get('tblvacs') ?>                                               

                                    <?php foreach ($qry->result() as $value) { $vacs=$value->vacs?>

                                    <tr>

                                    <style type="text/css">

                                        @media print

                                        {

                                          .bg-primary{

                                            background-color: #506eda !important;

                                            color: white !important;

                                          }

                                          #a{

                                            background-color: #de98e6 !important;

                                          }

                                        }

                                      </style>

                                      <td class="bg-primary" id="item" style="font-weight: bold; text-align: center;"><?php echo $value->vacs_name ?></td>

                                      <td id="unit"></td>

                                      <td></td>

                                      <td></td>

                                      <td></td>

                                      <td></td>

                                      <td></td>

                                      <td></td>

                                      <td></td>

                                      <td></td>

                                      <td></td>

                                      <td></td>

                                      <td></td>

                                      <td></td>

                                      <td></td>

                                      <td></td>

                                      <td></td>

                                      <td></td>

                                      <td></td>

                                      <td></td>

                                      <td></td>

                                      <td></td>

                                      <td></td>

                                      <td id="catalogue" style="width: 45px;"></td>

                                      <td id="amount" style="width: 73px;"></td>

                                    </tr>

                                       

                                                                 

                                   <?php

                                        $qry2 = $this->db->query("SELECT tblitems.description, tblitems.item_id, tblitems.unit, 

                                      SUM(tbltransaction.qty_jan) as qty_jan, 

                                      SUM(tbltransaction.qty_feb) as qty_feb, 

                                      SUM(tbltransaction.qty_mar) as qty_mar, 

                                      SUM(tbltransaction.qty_apr) as qty_apr, 

                                      SUM(tbltransaction.qty_may) as qty_may, 

                                      SUM(tbltransaction.qty_jun) as qty_jun, 

                                      SUM(tbltransaction.qty_jul) as qty_jul, 

                                      SUM(tbltransaction.qty_aug) as qty_aug, 

                                      SUM(tbltransaction.qty_sep) as qty_sep, 

                                      SUM(tbltransaction.qty_oct) as qty_oct, 

                                      SUM(tbltransaction.qty_nov) as qty_nov, 

                                      SUM(tbltransaction.qty_dec) as qty_dec, 

                                      tbltransaction.price, 

                                      SUM(tbltransaction.total_price) as total_price 

                                      FROM tbltransaction 

                                      INNER JOIN `tblitems` ON `tblitems`.item_id = tbltransaction.item_id

                                      INNER JOIN `tblvacs` ON `tblvacs`.vacs = tblitems.vacs

                                      INNER JOIN `tblppmp` ON `tblppmp`.ppmp_id = tbltransaction.ppmp_id

                                      INNER JOIN `tbloffice` ON `tbloffice`.office_id = tblppmp.office_id

                                      INNER JOIN `tblagency` ON `tblagency`.agency_id = tbloffice.agency_id 

                                      WHERE tblitems.vacs = $vacs AND tblvacs.is_cse = $is_cse AND tblitems.separatr = 'B' AND tblagency.agency_id = $agency_id AND tblppmp.approved = '1' AND tblppmp.is_ppmp = '".$type."' AND tblppmp.fiscal_year = $fiscal_year 

                                      GROUP BY tbltransaction.item_id");

                                     ?> 

                                    <?php  foreach ($qry2->result() as $row) { ?>                              

                                        <tr style="font-size: 11px;">

                                            <td><?php echo $row->description; ?></td>

                                            <td id="unit"><?php echo $row->unit; ?></td>

                                            <td style="width:33px; text-align: center; "><?php echo $row->qty_jan; ?></td> 

                                            <td style="width: 33px; text-align: center;"><?php echo $row->qty_feb; ?></td>

                                            <td style="width: 33px; text-align: center;"><?php echo $row->qty_mar; ?></td>



                                            <?php $Q1=$row->qty_jan + $row->qty_feb + $row->qty_mar; ?>

                                            <td style="width: 33px; font-weight: bold; text-align: center;"><?php echo $Q1 ?></td>



                                             <?php $q1amount=$Q1*$row->price; ?>

                                             <?php $bq1+=$Q1*$row->price; ?>

                                            <td style="width: 33px; font-weight: bold; text-align: center;"><?php echo $q1amount ?></td>



                                            <td style="width: 33px; text-align: center;"><?php echo $row->qty_apr; ?></td>

                                            <td style="width: 33px; text-align: center;"><?php echo $row->qty_may; ?></td>

                                            <td style="width: 33px; text-align: center;"><?php echo $row->qty_jun; ?></td>



                                            <?php $Q2=$row->qty_apr + $row->qty_may + $row->qty_jun; ?>

                                            <td style="width: 33px; font-weight: bold; text-align: center;"><?php echo $Q2 ?></td>



                                             <?php $q2amount=$Q2*$row->price; ?>

                                             <?php $bq2+=$Q2*$row->price; ?>

                                            <td style="width: 35px; font-weight: bold; text-align: center;"><?php echo $q2amount ?></td>



                                            <td style="width: 33px; text-align: center;"><?php echo $row->qty_jul; ?></td>                                                                             

                                            <td style="width: 33px; text-align: center;"><?php echo $row->qty_aug; ?></td>

                                            <td style="width: 33px; text-align: center;"><?php echo $row->qty_sep; ?></td>



                                            <?php $Q3=$row->qty_jul + $row->qty_aug + $row->qty_sep; ?>

                                            <td style="width: 33px; font-weight: bold; text-align: center;"><?php echo $Q3 ?></td>



                                             <?php $q3amount=$Q3*$row->price; ?>

                                             <?php $bq3+=$Q3*$row->price; ?>

                                            <td style="width: 33px; font-weight: bold; text-align: center;"><?php echo $q3amount ?></td>



                                            <td style="width: 33px; text-align: center;"><?php echo $row->qty_oct; ?></td>

                                            <td style="width: 33px; text-align: center;"><?php echo $row->qty_nov; ?></td>

                                            <td style="width: 33px; text-align: center;"><?php echo $row->qty_dec; ?></td>



                                            <?php $Q4=$row->qty_oct + $row->qty_nov + $row->qty_dec; ?>

                                            <td style="width: 33px; font-weight: bold; text-align: center;"><?php echo $Q4 ?></td>



                                             <?php $q4amount=$Q4*$row->price; ?>

                                             <?php $bq4+=$Q4*$row->price; ?>

                                            <td style="width: 35px; font-weight: bold; text-align: center;"><?php echo $q4amount ?></td>



                                             <?php $totalquantity=$Q1+$Q2+$Q3+$Q4 ?>

                                            <td style="width: 50px; font-weight: bold; text-align: center;"><?php echo $totalquantity ?></td>



                                            <td id="catalogue" style="font-weight: bold; width: 78px;"><?php echo $row->price; ?></td>                                           

                                            <td id="amount" style="font-weight: bold; width: 50px;"><?php echo number_format($row->total_price,2); ?></td>

                                        </tr>

                                     <?php  }  }  ?> 



                                   </tbody>

                                      <tbody>

                                      

                                      <?php

                                          $qry3=$this->db->select_sum('tbltransaction.total_price')
                                          ->where('tblitems.separatr','A')
                                          ->where('tblagency.agency_id',$agency_id)
                                          ->where('tblppmp.approved','1')
                                          ->where('tblppmp.is_ppmp',$type)
                                          ->where('tblppmp.fiscal_year',$fiscal_year)
                                          ->where('tblvacs.is_cse',$is_cse)
                                          ->join('tblppmp',"tblppmp.ppmp_id=tbltransaction.ppmp_id")
                                          ->join('tbloffice',"tbloffice.office_id=tblppmp.office_id")
                                          ->join('tblagency',"tblagency.agency_id=tbloffice.agency_id")
                                          ->join('tblitems',"tblitems.item_id=tbltransaction.item_id")
                                          ->join('tblvacs',"tblvacs.vacs=tblitems.vacs")
                                          ->get('tbltransaction');

                                      ?> 

                                      <?php $qry4=$this->db->select_sum('tbltransaction.total_price')
                                      ->where('tblitems.separatr','B')
                                      ->where('tblagency.agency_id',$agency_id)
                                      ->where('tblppmp.approved','1')
                                      ->where('tblppmp.is_ppmp',$type)
                                      ->where('tblppmp.fiscal_year',$fiscal_year)
                                      ->where('tblvacs.is_cse',$is_cse)
                                      ->join('tblppmp',"tblppmp.ppmp_id=tbltransaction.ppmp_id")
                                      ->join('tbloffice',"tbloffice.office_id=tblppmp.office_id")
                                      ->join('tblagency',"tblagency.agency_id=tbloffice.agency_id")
                                      ->join('tblitems',"tblitems.item_id=tbltransaction.item_id")
                                      ->join('tblvacs',"tblvacs.vacs=tblitems.vacs")
                                      ->get('tbltransaction') ?>



                                      <?php  foreach ($qry3->result() as $row) {  ?>

                                      <?php  foreach ($qry4->result() as $value) { $ab=($row->total_price+$value->total_price); $additional=$ab*0.10;} ?>

                                        <tr style="font-size: 11px;">

                                      <th class="bg-primary" id="item" style="font-weight: bold; text-align: left;">C. TOTAL(A+B)</th>

                                      <th id="unit"></th>

                                      <th style="width: 33px;"></th>

                                      <th style="width: 33px;"></th>

                                      <th style="width: 33px;"></th>

                                      <th style="width: 33px;"></th>

                                      <th style="width: 39px;"></th>

                                      <th style="width: 33px;"></th>

                                      <th style="width: 33px;"></th>

                                      <th style="width: 33px;"></th>

                                      <th style="width: 33px;"></th>

                                      <th style="width: 39px;"></th>

                                      <th style="width: 33px;"></th>

                                      <th style="width: 33px;"></th>

                                      <th style="width: 33px;"></th>

                                      <th style="width: 33px;"></th>

                                      <th style="width: 39px;"></th>

                                      <th style="width: 33px;"></th>

                                      <th style="width: 33px;"></th>

                                      <th style="width: 33px;"></th>

                                      <th style="width: 33px;"></th>

                                      <th style="width: 39px;"></th>

                                      <th style="width: 45px;"></th>

                                      <th id="catalogue" style="width: 75px;"></th>

                                      <th id="amount" style="width: 70px;"><?php echo number_format($ab,2); ?></th>

                                    </tr>

                                    <tr style="font-size: 11px;">

                                      <th class="bg-primary" id="item" style="font-weight: bold; text-align: left;">D. ADDITIONAL PROVISION FOR INFLATION(10% of TOTAL)</th>

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

                                      <th></th>

                                      <th></th>

                                      <th></th>

                                      <th></th>

                                      <th id="catalogue" style="width: 45px;"></th>

                                      <th id="amount" style="width: 70px;"><?php echo number_format($additional,2); ?></th>

                                    </tr>

                                    <tr style="font-size: 11px;">

                                      <th class="bg-primary" id="item" style="font-weight: bold; text-align: left;">E. GRAND TOTAL (C + D)</th>

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

                                      <th></th>

                                      <th></th>

                                      <th></th>

                                      <th></th>

                                      <th id="catalogue" style="width: 45px;"></th>

                                      <th id="amount" style="width: 70px;"><?php echo number_format($ab+$additional,2); ?></th>

                                    </tr>

                                    <tr style="font-size: 11px;">

                                      <th class="bg-primary" id="item" style="font-weight: bold; text-align: left;">F. APPROVED BUDGET BY THE AGENCY HEAD</th>

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

                                      <th></th>

                                      <th></th>

                                      <th></th>

                                      <th></th>

                                      <th id="catalogue" style="width: 45px;"></th>

                                      <th id="amount" style="width: 70px;"></th>

                                    </tr>

                                    <tr style="font-size: 11px;">

                                      <th class="bg-primary" id="item" style="font-weight: bold; text-align: left;">G. MONTHLY CASH REQUIREMENTS</th>

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

                                      <th></th>

                                      <th></th>

                                      <th></th>

                                      <th></th>

                                      <th id="catalogue" style="width: 45px;"></th>

                                      <th id="amount" style="width: 70px;"></th>

                                    </tr>

                                    <tr style="font-size: 11px;">

                                      <th class="" id="item" style="font-weight: bold; text-align: left;">&nbsp&nbspG.1 Available at Procurement Service Stores</th>

                                       <th id="unit"></th>

                                      <th colspan="4"></th>

                                      <th style="text-align: center;"><?php echo $aq1; ?></th>                                     

                                      

                                      <th colspan="4"></th>

                                      <th style="text-align: center;"><?php echo $aq2; ?></th>

                                      

                                      <th colspan="4"></th>

                                      <th style="text-align: center;"><?php echo $aq3; ?></th>

                                      

                                      <th colspan="4"></th>

                                      <th style="text-align: center;"><?php echo $aq4; ?></th>

                                      <th></th>



                                      <th id="catalogue" style="width: 45px;"></th>

                                      <th id="amount" style="width: 70px;"></th>

                                    </tr>

                                    <tr style="font-size: 11px;">

                                      <th class="" id="item" style="font-weight: bold; text-align: left;">&nbsp&nbspG.2 Other Items not available at PS but regulary purchased &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspfrom other sources</th>

                                      <th id="unit"></th>

                                      <th colspan="4"></th>

                                      <th style="text-align: center;"><?php echo $bq1; ?></th>                                     

                                      

                                      <th colspan="4"></th>

                                      <th style="text-align: center;"><?php echo $bq2; ?></th>

                                      

                                      <th colspan="4"></th>

                                      <th style="text-align: center;"><?php echo $bq3; ?></th>

                                      

                                      <th colspan="4"></th>

                                      <th style="text-align: center;"><?php echo $bq4; ?></th>

                                      <th></th>



                                      <th id="catalogue" style="width: 45px;"></th>

                                      <th id="amount" style="width: 70px;"></th>

                                    </tr>

                                    <tr style="font-size: 11px;">

                                      <th class="" id="item" style="font-weight: bold; text-align: left;">TOTAL MONTHLY CASH REQUIREMENTS</th>

                                      <th id="unit"></th>

                                      <th colspan="4"></th>

                                      <th></th>                                     

                                      

                                      <th colspan="4"></th>

                                      <th></th>

                                      

                                      <th colspan="4"></th>

                                      <th></th>

                                      

                                      <th colspan="4"></th>

                                      <th></th>

                                      <th></th>



                                      <th id="catalogue" style="width: 45px;"></th>

                                      <th id="amount" style="width: 70px;"></th>

                                    </tr>

                                    <?php } ?>

                                      </tbody>

                                    </table>



                                    <h6>&nbsp&nbsp&nbsp&nbsp&nbsp*Other categories that are not indicated herein</h6>

                                    <h6>&nbsp&nbsp&nbsp&nbsp&nbsp**Prices are FOB Manila/Applicable for items under A.</h6>

                                    </br>

                                    </br>

                                    <h5>We hereby warrant that the total amount reflected in this Annual Supplies/ Equipment Procurement Plan to procure the listed common-use supplies, materials and equipment has been included in or is within our approved budget for the year. </h5>

                                  

                                  <br/>

                                  <br/>

                                  <br/>

                                <table border="0" style="width: 85%;margin: 0 auto;" id="table_2">

                                  <thead>

                                    <tr>

                                      <td style="width: 33%;">Prepared by:</td>

                                      <td style="width: 33%;">Certified by:</td>

                                      <td style="width: 33%;">Approved by:</td>

                                    </tr>

                                  </thead>

                                  <tbody>

                                  <tr>

                                    <td colspan="3"><br/></td>

                                  </tr> 

                                    <tr>

                                      <td class="text-center"><b><?php echo $row_p->prep_by; ?></b></td>

                                      <td class="text-center"><b><?php echo $row_p->cert_by; ?></b></td>

                                      <td class="text-center"><b><?php echo $row_p->aprv_by; ?></b></td>

                                    </tr>

                                    <tr>

                                      <td><div style="width: 80%;border-top: 1px solid #000;margin: 0px auto;"></div></td>

                                      <td><div style="width: 80%;border-top: 1px solid #000;margin: 0px auto;"></div></td>

                                      <td><div style="width: 80%;border-top: 1px solid #000;margin: 0px auto;"></div></td>

                                    </tr>

                                    <tr>

                                      <td class="text-center">Property/Supply Officer</td>

                                      <td class="text-center">Accountant / Local Budget Officer</td>

                                      <td class="text-center">Head of Office/Agency</td>

                                    </tr>

                                    

                                   

                                  </tbody>

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