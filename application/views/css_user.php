<?php 
    $qry = $this->db->order_by('office_id',"DESC")->get('tbloffice');
    if ($qry->num_rows()>0) {
        $row_id = $qry->row();
        $id = $row_id->office_id + 1;
    }
    else{
        $id = 1;
    }

    $ofc_id = str_pad($id, 4, '0', STR_PAD_LEFT);
    $agency_id = str_pad($this->session->userdata('agency_id'), 4, '0', STR_PAD_LEFT);

    $uname = "1753-$agency_id-$ofc_id";

    $msg = $this->input->get('msg');
    if (isset($msg) && $msg == "success") {
        $notif = "User has been successfuly created!";
    }
    else{
        $notif = "";
    }

   

function getPass($length)
{   
    $characters = 'ABCDEFGHIJKLMNPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $string = '';
    $max = strlen($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
      $string .= $characters[mt_rand(0, $max)];
    }
    return $string;
}


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
                                        <h4>User Registration</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 text-center">
                                            <form method="post" class="f1" action="<?php echo base_url('index.php/admin_controller/saveOffice'); ?>">
                                                <h3 class="m-t-0">Register To Calauit Safari System</h3>
                                                <p>Fill up the form to create a user</p>
                                                <div class="f1-steps">
                                                    <div class="f1-progress">
                                                        <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;"></div>
                                                    </div>
                                                    <div class="f1-step active" >
                                                        <div class="f1-step-icon" ><i class="fa fa-users" ></i></div>
                                                        <p>Office Information</p>
                                                    </div>
                                                </div>
                                                <fieldset>
                                                    <h4 class="m-t-0"></h4>
                                                    <div class="form-group">
                                                        <label class="sr-only" for="f1-contact">UACS</label>
                                                        <input type="text" name="resp_center" data-format = "1753-dddd-dddd-dddd" placeholder="UACS/Resposibility Center" class="form-control bfh-phone">
                                                    </div>

                                                     <div class="form-group">
                                                        <label class="sr-only" for="f1-last-name">Office Name*</label>
                                                        <input type="text" name="office_name" placeholder="Office Name..." class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="sr-only" for="f1-last-name">Program*</label>
                                                        <input type="text" name="program" placeholder="Program" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="sr-only" for="f1-last-name">Budget*</label>
                                                        <input type="text" name="budget" placeholder="Budget" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="sr-only" for="f1-last-name">Password*</label>
                                                        <input type="text" name="password" value="<?php echo getPass(6); ?>" placeholder="Password" class="form-control" readonly="" >
                                                    </div>
                                                     
                                                    <div class="f1-buttons">
                                                       <button type="submit" class="btn btn-success btn-submit">Register</button>
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




