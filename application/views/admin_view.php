<div class="content-wrapper">

<?php 
    $qry_fy = $this->db->where('status','current')->get('tblfiscal_year');
    $row_fy = $qry_fy->row();
    if ($row_fy->finalized == 0 ) {
        $is_ppmp = 2;
    }
    else{
        $is_ppmp = 1;
    }
    
    $agency_id = $this->session->userdata('agency_id');

 ?>

        <?php $this->db->where('approved','1')->where('is_ppmp',$is_ppmp); $this->db->from('tblppmp');  $oldold = $this->db->count_all_results(); ?>

                <!-- Content Header (Page header) -->

                <section class="content-header">

                    <div class="header-icon">

                        <i class="pe-7s-monitor"></i>

                    </div>

                    <div class="header-title">

                        <h1>Calauit Safari System - Agency Module</h1>

                        <small>"First Government Procurement Network Platform"</small>

                        <ol class="breadcrumb">

                            <li><a href="<?php echo base_url('index.php/admin_controller'); ?>"><i class="pe-7s-home"></i> Home</a></li>

                            <li class="active">Dashboard</li>

                        </ol>



                    </div>

                </section>

                <!-- Main content -->

                <section class="content">

                    <div class="row">

                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">

                            <div class="panel panel-bd">

                                <div class="panel-body">

                                    <div class="statistic-box">

                                        <h2><span class="count-number"><?php  $this->db->from('tbloffice')->where('agency_id',$agency_id); echo $this->db->count_all_results(); ?></span></h2>

                                        <div class="small">Total Offices</div>

                                        <div class="sparkline1 text-center"></div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">

                            <div class="panel panel-bd">

                                <div class="panel-body">

                                    <div class="statistic-box">

                                        <h2><span class="count-number"><?php $this->db->from('tblitems'); echo $this->db->count_all_results(); ?></span></h2>

                                        <div class="small">Total Items Available</div>

                                        <div class="sparkline2 text-center"></div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">

                            <div class="panel panel-bd">

                                <div class="panel-body">

                                    <div class="statistic-box">

                                        <h2><span class="count-number">0</span></h2>

                                        <div class="small">Total Items Not Available</div>

                                        <div class="sparkline3 text-center"></div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">

                            <div class="panel panel-bd">

                                <div class="panel-body">

                                    <div class="statistic-box">

                                    <?php 

                                        $fiscal = $this->db->where('status','current')->get('tblfiscal_year');

                                        $row = $fiscal->row();

                                        $fiscal_year = $row->fiscal_year;

                                    ?>

                                        <h2><span class="count-number">

                                        <?php 

                                          $qry3=$this->db->select_sum('tbltransaction.total_price')->where('tblagency.agency_id',$agency_id)->where('tblppmp.approved','1')->where('tblppmp.is_ppmp',$is_ppmp)->where('tblppmp.fiscal_year',$fiscal_year)->join('tblppmp',"tblppmp.ppmp_id=tbltransaction.ppmp_id")->join('tbloffice',"tbloffice.office_id=tblppmp.office_id")->join('tblagency',"tblagency.agency_id=tbloffice.agency_id")->join('tblitems',"tblitems.item_id=tbltransaction.item_id")->get('tbltransaction');

                                      ?> 




                                      <?php  foreach ($qry3->result() as $row) {  ?>

                                      <?php  $ab=$row->total_price

                                        ?>

                                            <?php echo number_format($ab,2);}?>

                                        </span></h2>

                                        <div class="small">Total Amount of APP Consolidated</div>

                                        <div class="sparkline4 text-center"></div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    <!--////////////////////////////////////////////////////////////////////-->

                    <div class="col-md-12">

                        <table id="dataTableExample2" class="table table-bordered table-striped table-hover">

                            <thead>

                                <tr>

                                    <th>Agency/Office</th>

                                    <th>PPMP Completed</th>

                                    <th width="400">Progress</th>                                                   

                                    <th>Total Amount</th>

                                </tr>

                            </thead>

                            <tbody>



                                <?php 

                                    $office = $this->db->where('agency_id',$agency_id)->get('tbloffice');

                                    foreach ($office->result() as $row) {

                                ?>

                                <?php 

                                    $amount = $this->db->select_sum('total_price')->where('tbloffice.office_id',$row->office_id)->where('tblppmp.approved','1')->where('tblppmp.is_ppmp',$is_ppmp)->where('tblppmp.fiscal_year',$fiscal_year)->join('tblppmp',"tblppmp.ppmp_id=tbltransaction.ppmp_id")->join('tbloffice',"tbloffice.office_id=tblppmp.office_id")->join('tblagency',"tblagency.agency_id=tbloffice.agency_id")->get('tbltransaction');

                                    foreach ($amount->result() as $key) {

                                 ?>

                                <tr>  

                                    <td><?php echo $row->office_name; ?></td>

                                    <td style="text-align: center;"><?php $this->db->where('tblppmp.office_id',$row->office_id)->where('tblppmp.approved','1')->where('tblppmp.is_ppmp',$is_ppmp)->where('tblppmp.fiscal_year',$fiscal_year); $this->db->from('tblppmp'); 

                                    $ppmpcompleted = $this->db->count_all_results();

                                    echo $ppmpcompleted; ?> / <?php $this->db->where('office_id',$row->office_id)->where('tblppmp.fiscal_year',$fiscal_year); $this->db->from('tblppmp'); $totalppmp = $this->db->count_all_results(); echo $totalppmp; ?></td> 

                                    <?php 

                                        if ($totalppmp == 0) {

                                            $totalprogress = 0 / 1;

                                            $progress = $totalprogress * 100; 

                                        }

                                        else{



                                            $totalprogress = $ppmpcompleted / $totalppmp;

                                            $progress = $totalprogress * 100; 

                                        }

                                    ?>

                                    <td><div class="progress progress-lg "><div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $progress; ?>%"><span style="color:black;"><?php echo $progress; ?>%</span>

                                    </div></div></td>

                                    <td><?php echo 'Php'.' '.number_format($key->total_price,2); ?></td>

                                </tr>

                                <?php } ?>

                                <?php } ?>

                            </tbody>

                        </table>

                    </div>

                    <!--//////////////////////////////////////////////////////////////-->

                    <!--/////////////////////////////////////////////////////////////-->

                    </div>

            </section> <!-- /.content -->

            </div> <!-- /.content-wrapper -->

            <script src="<?php echo base_url('assets/plugins/datatables/dataTables.min.js'); ?>" type="text/javascript"></script>

     <script>

            $(document).ready(function () {



                "use strict"; // Start of use strict             



                $("#dataTableExample2").DataTable({

                    dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",

                    "lengthMenu": [[5, 25, 50, -1], [5, 25, 50, "All"]],

                    buttons: [

                        //{extend: 'copy', className: 'btn-sm'},

                        //{extend: 'csv', title: 'ExampleFile', className: 'btn-sm'},

                        //{extend: 'excel', title: 'ExampleFile', className: 'btn-sm'},

                        //{extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'},

                        //{extend: 'print', className: 'btn-sm'}

                    ]

                });



            });

        </script>

        <script type="text/javascript">

            $(document).ready(function() {

  setInterval(function() {

    cache_clear()

  }, 10000);

});



function cache_clear() {

    $.ajax({

        type:"GET",

        url:"<?php echo base_url("index.php/admin_controller/get_current"); ?>",

        datatype: 'html',

        success: function(data){

            var a = "<?php echo $oldold; ?>";

           if (data != a) {

        window.location.reload(true);

    }

        }

    });

  // window.location.reload(); use this if you do not remove cache

}

        </script>