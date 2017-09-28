<?php 
    $msg = $this->input->get('msg');
    $file = $this->input->get('file');
    if (isset($msg) && $msg == "success") {
        $notif = "PPMP file ($file) has been successfully uploaded!";
    }
    else if (isset($msg) && $msg == "error"){
        $notif = $this->input->get('data');
    }
    else if (isset($msg) && $msg == "deleted"){
        $notif = "Your PPMP file has been delete.";
    }
    else{
        $notif = "";
    }

    $qry = $this->db->where('agency_id',$this->session->userdata('agency_id'))->get('tblagency');
    $row = $qry->row();
    $agency = $row->agency_name;

    $qfy = $this->db->where('status',"current")->get('tblfiscal_year');
    $rfy = $qfy->row();
    $fiscal_year = $rfy->fiscal_year;
 ?>
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
                else if (msg == "error"){
                    toastr.error("<?php echo $notif; ?>");
                }
                else if (msg == "deleted"){
                    toastr.error("<?php echo $notif; ?>");
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
                            <li class="active">Manage PPMP</li>
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
                                        <h4>PPMP Uploader</h4>
                                    </div>
                                </div>
                                

                                <div class="panel-body">

                                <div class="form-group">
                                    <label for="exampleInputFile">Select a PPMP file (sample.cssx)</label>
                                    <?php echo form_open_multipart('Uploader/do_upload');?>
                                    <input type="file" class="btn btn-default w-md m-b-5" id="exampleInputFile" name="userfile" aria-describedby="fileHelp" accept=".cssx">
                                    <input type="submit" name="upload" value="Upload" class="btn btn-primary w-md m-b-5"><br/>
                                    <small id="fileHelp" class="text-muted">Note: You can only upload a PPMP file exported from Calauit Safari PPMP Generator.</small>
                                    </form>
                                </div>

                                    <div class="table-responsive">
                                        <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th width="240">Office</th>
                                                    <th>Program</th>
                                                    <th width="100">Fiscal Year</th>                                             
                                                    <th width="200">PPMP Name</th>
                                                    <th width="120">Status</th>
                                                    <th width="120">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                                $count = 1;
                                                $qry = $this->db->select("*")->from('tblppmp')->join("tbloffice","tblppmp.office_id = tbloffice.office_id")->where('tblppmp.fiscal_year',$fiscal_year)->where('tbloffice.agency_id',$this->session->userdata('agency_id'))->where('approved !=',3)->order_by('ppmp_id',"DESC")->get(); 
                                                foreach ($qry->result() as $row) {
                                                    ?>
                                                    <tr id="<?php echo $row->ppmp_id; ?>">
                                                        <td><?php echo $count++ ?></td>
                                                        <td><?php echo $row->office_name; ?></td>
                                                        <td><?php echo $row->program; ?></td>
                                                        <td><?php echo $row->fiscal_year; ?></td>
                                                        <td><?php echo $row->supplemental_name; ?></td>
                                                            <?php 
                                                                if ($row->approved == 0) {
                                                                    echo "<td> In Process</td>";
                                                                }
                                                                elseif ($row->approved == 1) {
                                                                    echo "<td>Approved</td>";
                                                                }
                                                                elseif ($row->approved == 2) {
                                                                    echo "<td>For Approval</td>";
                                                                }
                                                             ?>
                                                        <td>
                                                        <a href="<?php echo base_url("index.php/uploader/preview_ppmp?ppmp_id=$row->ppmp_id") ?>" type="button" target = "_blank" class="btn btn-primary btn-circle m-b-5" title="Preview"><i class="glyphicon glyphicon-list-alt"></i>
                                       
                                    </a>
                                                        <button type="button" onclick="delete_row(<?php echo $row->ppmp_id;?>)" class="btn btn-danger btn-circle m-b-5" title="Delete"><i class="glyphicon glyphicon-trash"></i>
                                    </button>
</td>
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
                        {extend: 'csv', title: 'ExampleFile', className: 'btn-sm'},
                        {extend: 'excel', title: 'ExampleFile', className: 'btn-sm'},
                        {extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'},
                        {extend: 'print', className: 'btn-sm'}
                    ]
                });

            });
        </script>

        <script type="text/javascript">
        
                function delete_row(id) {
                    swal({
                        title: "Are you sure?",
                        text: "You will not be able to recover this PPMP file!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "No, cancel!",
                        closeOnConfirm: false,
                        closeOnCancel: true},
                            function (isConfirm) {
                                if (isConfirm) {
                                    var data = id;
                                    //swal("Deleted!", "Your PPMP file has been deleted.", "success");
                                            window.location.replace("<?php echo base_url('index.php/Uploader/delete_ppmp?ppmp_id='); ?>" + data);
                                } 
                            });
                };
            
        </script>