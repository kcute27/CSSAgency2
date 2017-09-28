 <div class="content-wrapper">

     <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-monitor"></i>
        </div>
        <div class="header-title">
            <h1>Calauit Safari System - Admin </h1>
            <small>"Bringing Innovation in Your Door Steps"</small>
            <ol class="breadcrumb">
                 <li><a href="<?php echo base_url('index.php/admin_controller'); ?>"><i class="pe-7s-home"></i> Home</a></li>
                <li><a href="#">Tools</a></li>
                <li class="active">Text Blast</li>
            </ol>
        </div>
    </section>

     <section class="content">
        <div class="row">           
        <div class="col-sm-12">
            <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>Send Text Messages</h4>
                    </div>
                </div>
                <div class="panel-body">  
                <?php echo form_open('admin_controller/sendmessage'); ?>                                
                    <form>                       
                        <div class="form-group">
                            <label for="exampleTextarea">Enter Message</label>
                            <textarea class="form-control" id="exampleTextarea" rows="3" name="message"></textarea>
                        </div>
                        <div class="col-md-2">
                            <?php echo form_error('message', '<div class="text-danger">', '</div>'); ?>
                        </div>

                         <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>User Role</th>
                                                    <th>Name</th>
                                                    <th>Contact Number</th>                                                   
                                                </tr>
                                            </thead>
                                            <tbody>  
                                                <?php if(count($results)) : ?>                                           
                                                <?php foreach ($results as $result) : ?>                               
                                                    <tr>
                                                        <td><input type="checkbox" name="contact_number[]" class="checkbox" value="<?php echo $result->contact_number;?>"></td>
                                                        <td><?php echo $result->priviledge; ?></td>
                                                        <td><?php echo $result->name; ?></td>
                                                        <td><?php echo $result->contact_number;?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                <?php else: ?>
                                                    <td>No Record Found!</td>
                                                <?php endif; ?> 
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                        <div class="col-md-2">
                            <?php echo form_submit(['name'=>'submit', 'value'=>'sendmessage']); ?>
                        </div>
                            
                    </form>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    </section>    
</div>

  <script src="<?php echo base_url('assets/plugins/datatables/dataTables.min.js'); ?>" type="text/javascript"></script>
     <script>
            $(document).ready(function () {

                "use strict"; // Start of use strict 

                $('#dataTableExample1').DataTable({
                    "dom": "<'row'<'col-sm-6'l><'col-sm-6'f>>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
                    "lengthMenu": [[6, 25, 50, -1], [6, 25, 50, "All"]],
                    "iDisplayLength": 6
                });            

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