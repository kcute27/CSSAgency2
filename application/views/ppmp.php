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
                                         <th class="text-center" rowspan="2">CODE</th>
                                         <th class="text-center" rowspan="2">GENERAL DESCRIPTION</th>
                                         <th class="text-center" rowspan="2">UNIT</th>
                                         <th class="text-center" rowspan="2">PRICE</th>
                                         <th class="text-center" rowspan="2">QUANTITY/SIZE</th>
                                         <th class="text-center" rowspan="2">ESTIMATED BUDGET</th>
                                         <th class="text-center" colspan="12">SCHEDULE/MILESSTONE OF ACTIVITIES</th>
                                       </tr>
                                       <tr>
                                         <th class="text-center">JAN</th>
                                          <th class="text-center">FEB</th>
                                          <th class="text-center">MAR</th>
                                          <th class="text-center">APR</th>
                                          <th class="text-center">MAY</th>
                                          <th class="text-center">JUN</th>
                                          <th class="text-center">JUL</th>
                                          <th class="text-center">AUG</th>
                                          <th class="text-center">SEP</th>
                                          <th class="text-center">OCT</th>
                                          <th class="text-center">NOV</th>
                                          <th class="text-center">DEC</th>
                                       </tr>
                                        
                                      </thead>
                                      <?php $qry = $this->db->select('*')->from('tblvacs')->join('tblitems','tblitems.vacs = tblvacs.vacs')->join('tbltransaction','tblitems.item_id = tbltransaction.item_id')->where('tbltransaction.ppmp_id',$ppmp_id)->group_by('tblvacs.vacs')->order_by('tblvacs.vacs_name')->get();

                                       ?>
                                      <?php 
                                      foreach ($qry->result() as $row) {
                                        ?>
                                        <tr>
                                          <td class="text-center"><b><?php echo $row->vacs; ?></b></td>
                                          <td><b><?php echo $row->vacs_name; ?></b></td>
                                          <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                          <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                        </tr>

                                        <?php $qry2 = $this->db->select('*')->from('tbltransaction')->join('tblitems','tbltransaction.item_id = tblitems.item_id')->where('tblitems.vacs',$row->vacs)->where('tbltransaction.ppmp_id',$ppmp_id)->order_by('tblitems.description')->get(); ?>
                                        <?php foreach ($qry2->result() as $row2) {
                                          ?>
                                          <tr>
                                            <td></td>

                                            <td style="padding-left: 10px;"><?php echo $row2->description; ?></td>
                                            <td class="text-center"><?php echo $row2->unit; ?></td>
                                            <td class="text-right"><?php echo number_format($row2->price,2); ?></td>
                                            <td class="text-center"><?php echo $row2->total_qty; ?></td>
                                            <td class="text-right"><?php echo number_format($row2->total_price,2); ?></td>
                                            <td class="text-center"><?php echo $row2->qty_jan; ?></td>
                                            <td class="text-center"><?php echo $row2->qty_feb; ?></td>
                                            <td class="text-center"><?php echo $row2->qty_mar; ?></td>
                                            <td class="text-center"><?php echo $row2->qty_apr; ?></td>
                                            <td class="text-center"><?php echo $row2->qty_may; ?></td>
                                            <td class="text-center"><?php echo $row2->qty_jun; ?></td>
                                            <td class="text-center"><?php echo $row2->qty_jul; ?></td>
                                            <td class="text-center"><?php echo $row2->qty_aug; ?></td>
                                            <td class="text-center"><?php echo $row2->qty_sep; ?></td>
                                            <td class="text-center"><?php echo $row2->qty_oct; ?></td>
                                            <td class="text-center"><?php echo $row2->qty_nov; ?></td>
                                            <td class="text-center"><?php echo $row2->qty_dec; ?></td>
                                          </tr>
                                          <?php
                                        } ?>

                                        <?php
                                      }
                                       ?>
                                      <tbody>
                                      
                                        
                                      </tbody>
                                    </table>

                                    <table border="1" id="table_2" style="width: 50%;margin-top: 20px;">
                                    <thead>
                                      <tr>
                                        <th class="text-center">CODE</th>
                                        <th class="text-center">GENERAL DESCRIPTION</th>
                                        <th class="text-center">PRICE</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php $qry_sum = $this->db->select('SUM(tbltransaction.total_price) as total, tblvacs.vacs_name,tblvacs.vacs')->from('tblvacs')->join('tblitems','tblitems.vacs = tblvacs.vacs')->join('tbltransaction','tblitems.item_id = tbltransaction.item_id')->where('tbltransaction.ppmp_id',$ppmp_id)->group_by('tblvacs.vacs')->order_by('tblvacs.vacs_name')->get();
                                       ?>
                                       <?php foreach ($qry_sum->result() as $row_sum) {
                                         ?>
                                          <tr>
                                          <td class="text-center"><b><?php echo $row_sum->vacs; ?></b></td>
                                          <td><?php echo $row_sum->vacs_name; ?></td>
                                          <td class="text-right"><?php echo number_format($row_sum->total,2); ?></td>
                                          </tr>

                                         <?php
                                       } ?>

                                       <tr>
                                            <?php 
                                              $qry_gtotal = $this->db->select('SUM(total_price) as gtotal')->where('ppmp_id',$ppmp_id)->get('tbltransaction');
                                              $row_gtotal = $qry_gtotal->row();
                                             ?>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right"><b><?php echo number_format($row_gtotal->gtotal,2); ?></b></td>
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