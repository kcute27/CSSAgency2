<?php 
  $ppmp_id = $this->input->get('ppmp_id');
  $qry = $this->db->where('ppmp_id',$ppmp_id)->get('tblppmp');
  $row = $qry->row();
  $office_id = $row->office_id;
  $status = $row->approved;

  $agency_id = $this->session->userdata('agency_id');

  $qry = $this->db->where('office_id',$office_id)->get('tbloffice');
  $row = $qry->row();
  $office_name = $row->office_name;
  $resp_center = $row->resp_center;

  $qry = $this->db->where('agency_id',$agency_id)->get('tblagency');
  $row = $qry->row();
  $agency = $row->agency_name;
 ?>
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
        <link href="<?php echo base_url(); ?>assets/plugins/pace/flash.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/dist/css/styleBD.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/themify-icons/themify-icons.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/plugins/toastr/toastr.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"/>

      <style type="text/css" media="print"> 

      #footer {bottom: 0; width: 100%; 

} 
    </head>
    <style type="text/css">
    </style>
    <body class="hold-transition sidebar-collapse sidebar-mini">
       <div class="wrapper">
               <!-- <input style="margin-top: 10px; margin-right:10px;  " class="btn btn-success pull-right" id="printpagebutton" type="button" value="Print" onclick="printpage()"/>-->
            <div class="content-wrapper"  style="background-color: white; margin-right: 50px;">
                <div class="content">
                    <div class="row">
                        <div class="panel-body">
                             
                                   <table>
                                   <?php 
                                    $qry = $this->db->where('status',"current")->get('tblfiscal_year'); 
                                    $row = $qry->row();
                                    $fy = $row->fiscal_year;
                                  ?>
                                       <h4 class="text-center" "><b>PROJECT PROCUREMENT MANAGEMENT PLAN</b></h4>
                                       <h4 class="text-center" style="margin-top:-10px">FY <?php echo $fy; ?></h4>

                                       

                                    <div id="container">
                                        <div class="cell" style="float: left;">
                                            <span>Agency/Department: <b><?php echo $agency ?></b></span>
                                            <div align="buttom">Program/Project: <b><?php echo $office_name ?></b></div>
                                            <span>Resposibility Center: <b><?php echo $resp_center; ?></b></span>                 
                                        </div>

                                        <div style="float: right;">
                                        <?php 
                                          if ($status == 1) {
                                            ?>
                                            <img style="width: 300px; margin: -40px 0px 25px 0px;" src="<?php echo base_url('images/Approved.png'); ?>">
                                            <?php
                                          }
                                          elseif($status == 2){
                                            ?>
                                              <button type="button" onclick="approve(<?php echo $ppmp_id;?>)" class="btn btn-labeled btn-success m-b-5">
                                              <span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span>Approve
                                              </button>
                                            <?php
                                          }
                                          else{
                                            ?>
                                            <span style="color: #F01;font-size: 20px;"><b>IN PROCESS</b></span>
                                            <?php
                                          }
                                         ?>
                                          

                                        </div>
                                    </div>
                                    <br/>
                                    </table>

                                    <table border="1" id="table_2" style="">
                                      <thead>
                                        <tr>
                                          <th class="text-center" rowspan="2">Type of Contract to be employed</th>
                                          <th class="text-center" rowspan="2"></th>
                                          <th class="text-center" colspan="4">Extent / Size of Contract Schope / Packages</th>
                                          <th class="text-center" colspan="2">Procurement Method</th>
                                          <th class="text-center" colspan="12">Delivery Schedule</th>
                                          <th class="text-center" rowspan="2">Estimated Budget</th>
                                        </tr>
                                        <tr>
                                          <th class="text-center" >Description</th>
                                          <th class="text-center" >Qty</th>
                                          <th class="text-center" >Unit</th>
                                          <th class="text-center">Unit Cost</th>
                                          <th class="text-center">End Use</th>
                                          <th class="text-center">BAC</th>
                                          <th class="text-center">J</th>
                                          <th class="text-center">F</th>
                                          <th class="text-center">M</th>
                                          <th class="text-center">A</th>
                                          <th class="text-center">M</th>
                                          <th class="text-center">J</th>
                                          <th class="text-center">J</th>
                                          <th class="text-center">A</th>
                                          <th class="text-center">S</th>
                                          <th class="text-center">O</th>
                                          <th class="text-center">N</th>
                                          <th class="text-center">D</th>
                                        </tr>
                                        <tr>
                                          <th class="text-center">(1)</th>
                                          <th class="text-center">(2)</th>
                                          <th class="text-center">(3)</th>
                                          <th class="text-center">(4)</th>
                                          <th class="text-center">(5)</th>
                                          <th class="text-center">(6)</th>
                                          <th class="text-center">(7)</th>
                                          <th class="text-center">(8)</th>
                                          <th class="text-center">(9)</th>
                                          <th class="text-center">(10)</th>
                                          <th class="text-center">(11)</th>
                                          <th class="text-center">(12)</th>
                                          <th class="text-center">(13)</th>
                                          <th class="text-center">(14)</th>
                                          <th class="text-center">(15)</th>
                                          <th class="text-center">(16)</th>
                                          <th class="text-center">(17)</th>
                                          <th class="text-center">(18)</th>
                                          <th class="text-center">(19)</th>
                                          <th class="text-center">(20)</th>
                                          <th class="text-center">(21)</th>
                                        </tr>
                                      </thead>

                                     

                                      <tbody>
                                      
                                        <?php 
                                          $count = 1;
                                          $qry = $this->db->select("*")->from('tbltransaction')->where('tbltransaction.ppmp_id',$ppmp_id)->join('tblitems',"tbltransaction.item_id = tblitems.item_id")->get();
                                          ?>
                                            <tr>
                                            <td class="text-center" rowspan="<?php echo $qry->num_rows(); ?>">A to A/PS-Depot</td>
                                            <?php
                                            foreach ($qry->result() as $row) {
                                              ?>
                                            <td class="text-center"><?php echo $count++; ?></td>
                                            <td><?php echo $row->description; ?></td>
                                            <td class="text-center"><?php echo $row->total_qty; ?></td>
                                            <td class="text-center"><?php echo $row->unit; ?></td>
                                            <td class="text-right"><?php echo number_format($row->price,2); ?></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-center"><?php echo $row->qty_jan; ?></td>
                                            <td class="text-center"><?php echo $row->qty_feb; ?></td>
                                            <td class="text-center"><?php echo $row->qty_mar; ?></td>
                                            <td class="text-center"><?php echo $row->qty_apr; ?></td>
                                            <td class="text-center"><?php echo $row->qty_may; ?></td>
                                            <td class="text-center"><?php echo $row->qty_jun; ?></td>
                                            <td class="text-center"><?php echo $row->qty_jul; ?></td>
                                            <td class="text-center"><?php echo $row->qty_aug; ?></td>
                                            <td class="text-center"><?php echo $row->qty_sep; ?></td>
                                            <td class="text-center"><?php echo $row->qty_oct; ?></td>
                                            <td class="text-center"><?php echo $row->qty_nov; ?></td>
                                            <td class="text-center"><?php echo $row->qty_dec; ?></td>
                                            <td class="text-right"><?php echo number_format($row->total_price,2); ?></td>

                                            </tr>
                                          <?php
                                          }
                                         ?>
                                      <tr>

                                        <td></td>
                                        <td class="text-center"> <b><?php echo $qry->num_rows(); ?></b></td>
                                        <?php $qry_sum = $this->db->query("SELECT SUM(total_price) as total FROM tbltransaction   WHERE ppmp_id = $ppmp_id");
                                        $row = $qry_sum->row();

                                        ?>
                                        <td class="text-right" colspan="19">
                                          <b><?php echo number_format($row->total,2); ?></b>
                                        </td>
                                      </tr>
                                      </tbody>
                                    </table>
                        </div>  
<div id="footer">
            <?php 
                          $qry = $this->db->where('ppmp_id',$ppmp_id)->get('tblppmp');
                          foreach ($qry->result() as $row) {
                            $prep = $row->prep_name;
                            $prep_des = $row->prep_des;
                            $rev = $row->rev_name;
                            $rev_des = $row->rev_des;

                            $aprv = $row->aprov_name;
                            $aprv_des = $row->aprov_des;
                          }
                         ?>

                        <table border="0" style="width: 85%;margin: 0 auto;" id="table_2">
                          <thead>
                            <tr>
                              <td style="width: 33%;">Prepared by:</td>
                              <td style="width: 33%;">Reviewed by:</td>
                              <td style="width: 33%;">Approved by:</td>
                            </tr>
                          </thead>
                          <tbody>
                          <tr>
                            <td colspan="3"><br/></td>
                          </tr> 
                            <tr>
                              <td class="text-center"><b><?php echo $prep; ?></b></td>
                              <td class="text-center"><b><?php echo $rev; ?></b></td>
                              <td class="text-center"><b><?php echo $aprv; ?></b></td>
                            </tr>

                            <tr>
                              <td class="text-center"><?php echo $prep_des; ?></td>
                              <td class="text-center"><?php echo $rev_des; ?></td>
                              <td class="text-center"><?php echo $aprv_des; ?></td>
                            </tr>
                            <tr>
                              <td><div style="width: 80%;border-top: 1px solid #000;margin: 0px auto;"></div></td>
                              <td><div style="width: 80%;border-top: 1px solid #000;margin: 0px auto;"></div></td>
                              <td><div style="width: 80%;border-top: 1px solid #000;margin: 0px auto;"></div></td>
                            </tr>
                            <tr>
                              <td style="padding-left: 40px">Date:</td>
                              <td style="padding-left: 40px">Date:</td>
                              <td style="padding-left: 40px">Date:</td>
                            </tr>
                          </tbody>
                        </table> 
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
         <script src="<?php echo base_url('assets/plugins/toastr/toastr.min.js'); ?>" type="text/javascript"></script>
         <script src="<?php echo base_url('assets/plugins/sweetalert/sweetalert.min.js'); ?>" type="text/javascript"></script>

       <script>
        function printpage() {
        var printButton = document.getElementById("printpagebutton"); 
        printButton.style.visibility = 'hidden';
        window.print()
        printButton.style.visibility = 'visible';
    }
        </script>


        <script type="text/javascript">
        
                function approve(id) {
                    swal({
                        title: "Are you sure?",
                        text: "Are you sure you want to approve this PPMP?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#5BC752",
                        confirmButtonText: "Yes, approve it!",
                        cancelButtonText: "No, cancel!",
                        closeOnConfirm: false,
                        closeOnCancel: true},
                            function (isConfirm) {
                                if (isConfirm) {
                                    var data = id;
                                    //swal("Deleted!", "Your PPMP file has been deleted.", "success");
                                            window.location.replace("<?php echo base_url('index.php/Uploader/approve_ppmp?ppmp_id='); ?>" + data);
                                } 
                            });
                };
            
        </script>
         
    </body>

    
</html>