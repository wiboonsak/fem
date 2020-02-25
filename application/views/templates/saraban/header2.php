

<!-- notifications and other links -->
<ul class="nav navbar-right pull-right">
				
				<!-- dropdowns -->
				
				
				<li class="dropdown">
					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="entypo-user"></i>		
						ยินดีต้อนรับ คุณ <?php echo  ($this->session->userdata['logged_in']['firstname'])." ".
     $lastname  = ($this->session->userdata['logged_in']['lastname']);?>
					</a>
					
					<!-- dropdown menu (messages) -->
					<ul class="dropdown-menu">
						<li>
							<ul class="dropdown-menu-list scroller">
								<li class="unread notification-success">
									<a href="<?php echo base_url(); ?>Saraban/change_password">
										<i class="entypo-key pull-right"></i>
										<span class="line">
											<strong>เปลี่ยนรหัสผ่าน</strong>
										</span>
									</a>
								</li>
								<li class="unread notification-secondary">
									<a href="<?php echo base_url(); ?>Saraban/personal_Information">
										<i class="entypo-star pull-right"></i>
										<span class="line">
											<strong>แก้ไขข้อมูลส่วนตัว</strong>
										</span>
									</a>
								</li>
							</ul>
						</li>
					</ul>
				
				</li>
				
				<!-- raw links -->
				
				<li>
					<a href="<?php echo base_url('Saraban/logout'); ?>">
						ออกจากระบบ <i class="entypo-logout right"></i>
					</a>
				</li>
				
				
				<!-- mobile only -->
				<li class="visible-xs">	
				
					<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
					<div class="horizontal-mobile-menu visible-xs">
						<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
							<i class="entypo-menu"></i>
						</a>
					</div>
					
				</li>
				
			</ul>
	
		</div>
		
	</header>
	