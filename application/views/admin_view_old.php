<div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="header-icon">
                        <i class="pe-7s-monitor"></i>
                    </div>
                    <div class="header-title">
                        <h1>Calauit Safari System </h1>
                        <small>"Bringing Innovation in Your Door Steps"</small>
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
                                        <h2><span class="count-number"><?php  $this->db->where('agency_id',$this->session->userdata('agency_id'))->get('tbloffices'); echo $this->db->count_all_results();  ?></span></h2>
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
                                        <h2><span class="count-number">321</span></h2>
                                        <div class="small">Total APP Users</div>
                                        <div class="sparkline2 text-center"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="panel panel-bd">
                                <div class="panel-body">
                                    <div class="statistic-box">
                                        <h2><span class="count-number">789</span></h2>
                                        <div class="small">Total PPMP Users</div>
                                        <div class="sparkline3 text-center"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="panel panel-bd">
                                <div class="panel-body">
                                    <div class="statistic-box">
                                        <h2><span class="count-number">20,236,429</span></h2>
                                        <div class="small">APP Summary</div>
                                        <div class="sparkline4 text-center"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section> <!-- /.content -->
            </div> <!-- /.content-wrapper -->
    