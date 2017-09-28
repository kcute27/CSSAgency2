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
                            <li><a href="#">General Report</a></li>
                            <li><a href="#">Generate APP</a></li>
                            <li class="active">Per Agencies</li>
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
                                        <h4 style="text-align: center; color: blue;">SELECT AGENCIES</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Code</th>
                                                    <th>Name</th>                                                   
                                                    <th>Group Name</th>
                                                    <th>Location</th>
                                                </tr>
                                            </thead>
                                            <tbody>                                               
                                                <?php foreach ($record->result() as $value) { ?>                               
                                                    <tr>
                                                        <td><?php echo $value->agency_id; ?></td>
                                                        <td><?php echo $value->agency_code; ?></td>
                                                        <td><a href="<?php echo base_url("index.php/admin_controller/app_report_per_agencies"); ?>"><?php echo $value->agency_name;?></td>
                                                        <td><?php echo $value->group_name; ?></td>
                                                        <td><?php echo $value->location; ?></td>                                     </tr>
                                                <?php }?> 
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