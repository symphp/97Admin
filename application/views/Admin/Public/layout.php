<!DOCTYPE html>
<html lang="en">
<!--header-->
<?= $this->load->view('Public/header','',true);?>
<body class="nav-md">
<div class="container body">
	<div class="main_container">
		<div class="col-md-3 left_col">
			<div class="left_col scroll-view">
				<div class="navbar nav_title" style="border: 0;">
					<a href="index.html" class="site_title"><i class="fa fa-home"></i> <span>97Admin</span></a>
				</div>

				<div class="clearfix"></div>

				<!-- menu profile quick info -->
				<div class="profile clearfix">
					<div class="profile_pic">
						<img src="/public/img/touxiang.jpg" alt="..." class="img-circle profile_img">
					</div>
					<div class="profile_info">
						<span>Welcome,</span>
						<h2><?=$admin['username']??'';?></h2>
					</div>
				</div>
				<!-- /menu profile quick info -->
                <br />
                <!-- sidebar menu -->
				<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <?php if(!empty($menus)) :?>
                                <?php foreach ($menus as $menu) :?>
                                    <li <?php if($menu['auth_id'] == 1) {echo "style='border-right:0px solid #1ABB9C'";} ?>>
                                        <a <?php if($menu['auth_id'] == 1) {echo "href='/admin/index'";} ?>><i class="<?=$menu['icon']??''?>"></i> <?=$menu['title']??''?> <span class="<?=$menu['icon']??''?>"></span></a>
										<?php if(isset($menu['children'])) :?>
											<?php foreach ($menu['children'] as $child) :?>
                                                <ul class="nav child_menu">
                                                    <li><a href="/Admin/<?=$child['name']??''?>"><?=$child['title']??''?></a></li>
                                                </ul>
											<?php endforeach;?>
										<?php endif;?>
                                    </li>
                                <?php endforeach;?>
                            <?php endif;?>
                        </ul>
                    </div>
				</div>
				<!-- /sidebar menu -->
			</div>
		</div>

		<!-- top navigation -->
		<div class="top_nav">
			<div class="nav_menu">
				<nav>
					<div class="nav toggle">
						<a id="menu_toggle"><i class="fa fa-bars"></i></a>
					</div>

					<ul class="nav navbar-nav navbar-right">
						<li class="">
							<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<img src="/public/img/touxiang.jpg" alt="">
                                <?=$admin['username']??''?>
								<span class=" fa fa-angle-down"></span>
							</a>
							<ul class="dropdown-menu dropdown-usermenu pull-right">
								<li>
									<a href="javascript:;">
										<span>设置</span>
									</a>
								</li>
								<li><a href="javascript:;">Help</a></li>
								<li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> 退出</a></li>
							</ul>
						</li>

						<li role="presentation" class="dropdown">
							<ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
								<li>
									<a>
										<span class="image"><img src="/Public/img/touxiang.jpg" alt="Profile Image" /></span>
										<span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
										<span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
									</a>
								</li>
								<li>
									<a>
										<span class="image"><img src="/Public/img/touxiang.jpg" alt="Profile Image" /></span>
										<span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
										<span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
									</a>
								</li>
								<li>
									<a>
										<span class="image"><img src="/Public/img/touxiang.jpg" alt="Profile Image" /></span>
										<span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
										<span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
									</a>
								</li>
								<li>
									<a>
										<span class="image"><img src="/Public/img/touxiang.jpg" alt="Profile Image" /></span>
										<span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
										<span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
									</a>
								</li>
								<li>
									<div class="text-center">
										<a>
											<strong>See All Alerts</strong>
											<i class="fa fa-angle-right"></i>
										</a>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /top navigation -->

		<!-- page content -->

		<?= $content??'';?>

		<!-- footer content -->
		<footer>
			<div class="pull-right">
				Gentelella - Bootstrap Admin Template by Colorlib. More Templates
			</div>
			<div class="clearfix"></div>
		</footer>
		<!-- /footer content -->
		<!-- /page content -->
<!--		footer-->
		<?= $this->load->view('Public/footer','',true);?>
</body>
</html>