<div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="header-icon">
                        <i class="pe-7s-monitor"></i>
                    </div>
                    <div class="header-title">
                        <h1>Calauit Safari System</h1>
                        <small>"Supplying Solutions"</small>
                        <ol class="breadcrumb">
                             <li><a href="<?php echo base_url('index.php/admin_controller'); ?>"><i class="pe-7s-home"></i> Home</a></li>
                            <li class="active">Offices, Programs</li>
                        </ol>

                    </div>
                </section>
                <!-- Main content -->
                <section class="content">
                    
                     <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-bd ">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Offices / Programs</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Office / Program Name</th>
                                                    <th>Location</th>                                                   
                                                    <th>Responsibility Center</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              
                                                <?php 
                                                $count = 1;
                                                foreach ($record->result() as $value) { ?>                               
                                                    <tr>
                                                        <td><?php echo $count++; ?></td>
                                                        <td><a href="<?php echo base_url("index.php/admin_controller/agencies?agency_id=$value->agency_id&rem=2"); ?>"><?php echo $value->office_name; ?></td>
                                                        <td><?php echo $value->location; ?></td>
                                                        <td><?php echo $value->resp_center;?></td>
                                                        <td>
                                                            
                                                            <a href="<?php echo base_url("index.php/admin_controller/exportAcct?user_id=$value->user_id") ?>" type="button" target = "_blank" class="btn btn-primary btn-circle m-b-5" title="Export User Acount File"><i class="glyphicon glyphicon-export"></i>
                                       
                                                            </a>
                                                        </td>                                
                                                    </tr>
                                                <?php } ?> 
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
                        {extend: 'csv', title: 'ExampleFile', className: 'btn-sm'},
                        {extend: 'excel', title: 'ExampleFile', className: 'btn-sm'},
                        {extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'},
                        {extend: 'print', className: 'btn-sm'}
                    ]
                });

            });
        </script>