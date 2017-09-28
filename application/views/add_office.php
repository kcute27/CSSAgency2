<?php 
    $agency_id = $this->session->userdata('agency_id');
    $user_id = $this->input->get('user_id');
    $qry = $this->db->where('user_id',$user_id)->get('tbluser');
    $row = $qry->row();
    $username = $row->username;
    $name = $row->name;
 ?>
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
                            <li><a href="#">Registration</a></li>
                            <li class="active">CSS</li>
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
                                        <h4>Office Registration</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 text-center">
                                            <form method="post" class="f1" action="<?php echo base_url("index.php/admin_controller/save_office"); ?>">
                                                <h3 class="m-t-0">Register To Calauit Safari System</h3>
                                                <p>Fill up the form to add an office or responsibility center to a specific PPMP user.</p>
                                                <div class="f1-steps">
                                                    <div class="f1-progress">
                                                        <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;"></div>
                                                    </div>
                                                    <div class="f1-step active" >
                                                        <div class="f1-step-icon" ><i class="fa fa-building" ></i></div>
                                                        <p>Office</p>
                                                    </div>
                                                    
                                                </div>
                                                <fieldset>
                                                    <h4 class="m-t-0">Name: <b><span style="color: #F01;"><?php echo $name; ?></span></b></h4>

                                                    <h4 class="m-t-0">Username: <b><span style="color: #F01;"><?php echo $username; ?></span></b></h4>

                                                    <div class="form-group">
                                                        <label class="sr-only" for="f1-last-name">Office Name*</label>
                                                        <input type="text" name="office_name" placeholder="Office Name..." class="form-control" id="name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="sr-only" for="f1-address">Address</label>
                                                        <input type="text" name="address" placeholder="Address..." class="form-control" id="address">
                                                    </div>
                                                     <div class="form-group">
                                                        <label class="sr-only" for="f1-contact">Responsibility Center</label>
                                                        <input type="text" name="resp_center" placeholder="Responsibility Center..." class="form-control" id="contact_number">
                                                    </div>
                                                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">

                                                    <div class="f1-buttons">
                                                        <button type="button" onclick="done()" class="btn btn-primary btn-previous">Finish</button>
                                                        <button type="submit" class="btn btn-success btn-next">Save Office</button>
                                                    </div>
                                                </fieldset>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section> <!-- /.content -->
            </div>

 <script src="<?php echo base_url('assets/plugins/bootstrap-wizard/jquery.backstretch.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/plugins/bootstrap-wizard/form.scripts.js'); ?>" type="text/javascript"></script>


<script type="text/javascript">

     function done() {
                    swal({
                        title: "Are you sure?",
                        text: "Are you sure you are done adding offices?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#5BC752",
                        confirmButtonText: "Yes, I'm done!",
                        cancelButtonText: "No, cancel!",
                        closeOnConfirm: false,
                        closeOnCancel: true
                    },
                            function (isConfirm) {
                                if (isConfirm) {
                                    //swal("Deleted!", "Your PPMP file has been deleted.", "success");
                                    window.location.replace("<?php echo base_url('index.php/admin_controller/css_user'); ?>");
                                } 
                                else{
                                    window.location.replace('<?php echo base_url("index.php/admin_controller/add_office?user_id=$user_id"); ?>');
                                }
                            });
                };
</script>

