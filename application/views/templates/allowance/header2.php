
				<!-- notifications and other links -->
			<ul class="nav navbar-right pull-right">
				
				<!-- dropdowns -->				
				<li class="dropdown">					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="entypo-user"></i>		
						ยินดีต้อนรับ คุณ <?php echo ($this->session->userdata['logged_in']['firstname'])." ".$lastname  = ($this->session->userdata['logged_in']['lastname']);?>
					</a>					
				
					<!-- dropdown menu (messages) -->
					<ul class="dropdown-menu">
						<li>
							<ul class="dropdown-menu-list scroller">
							<?php if($this->session->userdata['logged_in']['status'] == "user"){
	
									$quotaH = 0; $moneyQ = 0; $moneyQ2 = 0;
	
								    $checkQuotaH = $this->Allowance_model->check_quota($this->session->userdata['logged_in']['id']);
								    $numQuotaH = $checkQuotaH->num_rows();

								    if($numQuotaH > 0){

									    foreach($checkQuotaH->result() as $checkQuotaH2){}
									    $quotaH = $checkQuotaH2->quota;

									    $moneyQ = $this->Allowance_model->calculate_money($this->session->userdata['logged_in']['id']);		
									    $moneyQ2 = $quotaH - $moneyQ;	
								    }	
							?>	
								
								<li class="unread notification-info">
									<a href="javascript:void(0)" style="cursor: default;">
										<i class="entypo-credit-card pull-right"></i>
										<span class="line">
											<strong>โควต้าคงเหลือ <?php echo number_format($moneyQ2)?> บาท<?php echo $quotaH.'xxx'. $moneyQ?></strong>
										</span>
									</a>
								</li>
							<?php } ?>								
									
								<li class="unread notification-success">
									<a href="<?php echo base_url(); ?>Allowance/change_password">
										<i class="entypo-key pull-right"></i>
										<span class="line">
											<strong>เปลี่ยนรหัสผ่าน</strong>
										</span>
									</a>
								</li>
								<li class="unread notification-secondary">
									<a href="<?php echo base_url(); ?>Allowance/personal_Information">
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
					<a href="<?php echo base_url('allowance/logout'); ?>">
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