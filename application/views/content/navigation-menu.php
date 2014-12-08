<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?=site_url()?>">Manifest System v1</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
		<?php
            $list_deadline = $this->manifest_model->deadline_data('+3');
			if($list_deadline != false) {
				echo '
		        <li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">
					<i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
				</a>
	            <ul class="dropdown-menu dropdown-messages">';
					foreach($list_deadline as $row) {
						$consignee = $this->customers_model->get_by_id($row->consignee);
						echo '
							<li>
								<a href="#">
									<div>
										<strong>'.$row->hawb_no.'</strong>
										<span class="pull-right text-muted">
											<em>Deadline: '.$row->deadline.'</em>
										</span>
									</div>
									<div style="font-size:12px;">
									'.ucwords(strtolower($consignee->name)).'<br/>
									'.ucfirst(strtolower($consignee->address)).'
									</div>
								</a>
							</li>
						';
					}
				echo ' </ul> </li> ';
			}				
		?>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="<?=base_url('logout')?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
        </li>
    </ul>

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">              
                <li>
                    <a href="#"><i class="glyphicon glyphicon-upload"></i>  Manifest<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?= base_url()?>manifest/upload">Upload</a></li>
                        <li><a href="<?=base_url()?>manifest/data">Data</a></li>
                        <li><a href="<?=base_url()?>manifest/verification">
                            <span class="badge pull-right"><?=$this->manifest_model->count_not_verified()?></span>
                            Verification
                        </a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="glyphicon glyphicon-envelope"></i>  Request<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?= base_url()?>request/discount">Discount</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?=base_url('customers')?>"><i class="glyphicon glyphicon-file"></i> Customers <span class="fa arrow"></span></a>
                      <ul class="nav nav-second-level">
                        <li><a href="<?= base_url()?>customers">Data </a></li>
                        <li><a href="<?= base_url()?>customers/register">Add Customer </a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript"><i class="glyphicon glyphicon-folder-open"></i> Report <span class="fa arrow"></span></a>
                      <ul class="nav nav-second-level">
                        <li><a href="<?=base_url()?>report/customer_card"> Customers Card</a></li>
                    </ul>
                </li>


                <?php
                $user_id =  $this->session->userdata('user_id');
                $currentuser = $this->user_model->get_by_id($user_id);
                $currentuser= $currentuser->type;
                if($currentuser == "Admin" ){ ?>

                <li>
                    <a href="#"><i class="glyphicon glyphicon-user"></i>  Administrator<span class="fa arrow"></span></a>
					
                    <ul class="nav nav-second-level">
                        <li><a href="<?= base_url('administrator/manage_user')?>">Manage User</a></li>
                        <li><a href="<?= base_url('administrator/manage_kurs')?>">Manage Kurs</a></li>
                        <li><a href="<?=base_url()?>">Activity Users</a></li>
                    </ul>
                </li>

                <?php } ?>
            </ul>
        </div>
    </div>
</nav>

<div class="footer clearfix">
			<div class="footer-inner">
				2014 © clip-one by cliptheme.
			</div>
			<div class="footer-items">
				<span class="go-top"><i class="clip-chevron-up"></i></span>
			</div>
		</div>
