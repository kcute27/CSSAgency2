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
                            <li class="active">SE</li>
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
                                        <h4>Supplies and Equipments</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Code</th>
                                                    <th>Description</th>                                                   
                                                    <th>Unit</th>
                                                    <th>Price</th>
                                                    <th>VACS</th> 
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               <?php 
                                                    $rem = $this->input->get('rem');
                                                    $item_id = $this->input->get('item_id'); 
                                                ?>
                                                <?php if ($rem == 2) { ?>
                                                    <?php 
                                                        $edit = $this->db->where('item_id', $item_id)->get('tblitems');
                                                     ?>
                                                    <?php foreach ($edit->result() as $value){ ?>
                                                <tr>   
                                                    <form action="<?php echo base_url("index.php/admin_controller/update_cse"); ?>" method="post">
                                                    <input type="hidden" name="item_id" value="<?php echo $value->item_id; ?>">
                                                    <td><?php echo $value->item_id; ?></td>
                                                    <td><?php echo $value->item_code; ?></td>
                                                    <td><?php echo $value->description;?></td>
                                                    <td><?php echo $value->unit; ?></td>
                                                    <td><input type="text" style="width: 100%;" class="form-control" name="price" value="<?php echo $value->price; ?>"></td>
                                                     <td><?php echo $value->vacs; ?></td>
                                                    <td><input type="text" style="width: 100%;" class="form-control" name="status" value="<?php echo $value->status; ?>"></td>                                                 
                                                    <td><button type="submit" class="btn btn-primary btn-sm">Update</button></td>
                                                    <td><a href="<?php echo base_url("index.php/admin_controller/cse?rem=1") ?>" class="btn btn-danger btn-sm">Cancel</a></td>
                                                    </form>
                                                </tr>
                                                <?php } ?>
                                                <?php }
                                                else
                                                    {?>
                                                <?php foreach ($record->result() as $value) { ?>                               
                                                    <tr>
                                                        <td><?php echo $value->item_id; ?></td>
                                                        <td><?php echo $value->item_code; ?></td>
                                                        <td><a href="<?php echo base_url("index.php/admin_controller/cse?item_id=$value->item_id&rem=2"); ?>"><?php echo $value->description;?></td>
                                                        <td><?php echo $value->unit; ?></td>
                                                        <td><?php echo $value->price; ?></td>
                                                        <td><?php echo $value->vacs; ?></td>
                                                        <td><?php echo $value->status; ?></td>                                       </tr>
                                                <?php } }?> 
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