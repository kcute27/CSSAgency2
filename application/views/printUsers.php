<?php 
     $qry = $this->db->where('agency_id',$this->session->userdata('agency_id'))->get('tblagency');
    $row = $qry->row();
    $agency = $row->agency_name;

 ?>
 <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="header-icon">
                        <i class="pe-7s-monitor"></i>
                    </div>
                    <div class="header-title">
                        <h1>Calauit Safari System - <?php echo $agency; ?> </h1>
                        <small>"Supplying Solutions"</small>
                        <ol class="breadcrumb">
                             <li><a href="<?php echo base_url('index.php/admin_controller'); ?>"><i class="pe-7s-home"></i> Home</a></li>
                            <li class="active">Print Users</li>
                        </ol>

                    </div>
                </section>
                <!-- Main content -->
                <section class="content">
                    
                     <div class="row">
                        <div class="col-sm-12">
                            
                                    <div class="table-responsive">
                                        <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>UACS</th>
                                                    <th>Office</th>
                                                    <th>Program</th>                             
                                                    <th>Budget</th>
                                                    <th>Password</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                                $count = 1;
                                                $agency_id = $this->session->userdata('agency_id');
                                                $qry = $this->db->where('agency_id',$agency_id)->get('tbloffice');
                                                foreach ($qry->result() as $row) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $count++ ?></td>
                                                        <td><?php echo $row->resp_center; ?></td>
                                                        <td><?php echo $row->office_name; ?></td>
                                                        <td><?php echo $row->program; ?></td>
                                                        <td><?php echo $row->budget; ?></td>
                                                        <td><?php echo $row->office_password; ?></td>
                                                    </tr>
                                                    <?php
                                                }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section> <!-- /.content -->
            </div> <!-- /.content-wrapper -->
    <script src="<?php echo base_url('assets/plugins/datatables/dataTables.min.js'); ?>" type="text/javascript"></script>
     <script>
            $(document).ready(function () {

                "use strict"; // Start of use strict             

                $("#dataTableExample2").DataTable({
                    dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                    "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
                    buttons: [
                        {extend: 'copy', className: 'btn-sm'},
                        {extend: 'csv', title: '"<?php echo $agency ?> - Users"', className: 'btn-sm'},
                        {extend: 'excel', title: '<?php echo $agency ?> - Users', className: 'btn-sm'},
                        {extend: 'pdf', title: '<?php echo $agency ?> - Users', className: 'btn-sm'},
                        {extend: 'print', className: 'btn-sm'}
                    ]
                });

            });
        </script>