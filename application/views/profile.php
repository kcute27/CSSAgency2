<?php 

    $msg = $this->input->get('msg');
    if (isset($msg) && $msg == "success") {
        $notif = "Your profile has been successfully updated!";
    }
    else if (isset($msg) && $msg == "error"){
        $notif = "An error occured while updating your profile";
    }

    else{
        $notif = "";
    }

    $qry = $this->db->where('agency_id',$this->session->userdata('agency_id'))->get('tblagency');
    $row = $qry->row();
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
                        <h1>Calauit Safari System</h1>
                        <small>"Supplying Solutions"</small>
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url('index.php/admin_controller'); ?>"><i class="pe-7s-home"></i> Home</a></li>
                            <li class="active">Dashboard 1</li>
                        </ol>

                    </div>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                    <!-- Textual inputs -->
                        <div class="col-sm-7">
                            <div class="panel panel-bd lobidrag">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4> My Profile</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <p></p>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label">Agency Code</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" disabled="" value="<?php echo $row->agency_code; ?>">
                                        </div>
                                    </div>

                                    <?php echo form_open('admin_controller/update_agency_profile'); ?>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label">Agency Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="agency_name" value="<?php echo $row->agency_name; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label">Group Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="group_name" value="<?php echo $row->group_name ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label">Region</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="region" value="<?php echo $row->region; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label">Location</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="location" value="<?php echo $row->location; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label">Lat.</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="lat" value="<?php echo $row->lat; ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label">Long.</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="lng" value="<?php echo $row->lng; ?>">
                                        </div>
                                    </div>
                                    <h4 style="width: 100%;text-align: center;border-bottom: 1px solid #999; padding-bottom: 10px;">Contact Details</h4>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label">Contact Person.</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="contact_person" value="<?php echo $row->contact_person; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label">Position</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="cp_position" value="<?php echo $row->cp_position; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label">Contact Number</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="cp_number" value="<?php echo $row->cp_number ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="cp_email" value="<?php echo $row->cp_email; ?>">
                                        </div>
                                    </div>
                                    <h4 style="width: 100%;text-align: center;border-bottom: 1px solid #999; padding-bottom: 10px;">Signatories</h4>

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label">Prepared by</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="prep_by" value="<?php echo $row->prep_by; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label">Certified by</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="cert_by" value="<?php echo $row->cert_by; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label">Approved by</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="aprv_by" value="<?php echo $row->aprv_by; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <button style="float: right;margin-right: 18px;" type="submit" class="btn btn-success btn-submit">Update Profile</button>
                                    </div>

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
    