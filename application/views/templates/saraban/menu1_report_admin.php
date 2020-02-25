<!-- main menu -->
						
<ul class="navbar-nav">
				<?php if(($this->session->userdata['logged_in']['status']) == "user"){ ?>
				<li class="has-sub">
					<a href="<?php echo base_url(); ?>Saraban/index">
						<i class="entypo-doc-text"></i>
						<span class="title">ขอเลขสารบรรณ(แอดมินไม่เห็น)</span>
					</a>
				</li>
				<?php } ?>
				<li class=" has-sub">
					<a href="<?php echo base_url(); ?>Saraban/list_saraban">
						<i class="entypo-book-open"></i>
						<span class="title">รายการเลขสารบรรณ</span>
					</a>
				</li> 
				<?php if(($this->session->userdata['logged_in']['status']) == "admin_saraban"){ ?>
				<li class="has-sub">
					<a href="#">
						<i class="entypo-users"></i>
						<span class="title">รายการข้อมูลสมาชิก</span>
					</a>
					<ul>
						<li>
							<a href="<?php echo base_url(); ?>Saraban/managemember_admin">
								<span class="title">จัดการข้อมูลสมาชิก</span> 
							</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>Saraban/manageuser_admin">
								<span class="title">รายการข้อมูลสมาชิกที่ใช้เลขสารบรรณ</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="has-sub">
					<a href="<?php echo base_url(); ?>Saraban/managecancel_admin">
						<i class="entypo-users"></i>
						<span class="title">รายการเลขสารบรรณที่ยกเลิก</span>
					</a>
				</li>
                                <li class="has-sub">
					<a href="<?php echo base_url(); ?>Saraban/manageprevious_admin">
						<i class="entypo-users"></i>
						<span class="title">ขอเลขสารบรรณย้อนหลัง</span>
					</a>
				</li>
				<li class="has-sub">
					<a href="#">
						<i class="entypo-users"></i>
						<span class="title">ขออนุมัติเดินทาง</span>
					</a>
					<ul>
						<li>
							<a href="<?php echo base_url(); ?>Saraban/index_admin">
								<span class="title">รายการคำขอรอดำเนินการตรวจเช็ค</span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>Saraban/fail_admin">
								<span class="title">รายการเอกสารคำขอไม่ถูกต้อง</span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>Saraban/chkstatus_admin">
								<span class="title">รายการสถานะการอนุมัติ</span>
							</a>
						</li>
						
					</ul>
				</li>
				<li class="active has-sub">
					<a href="#">
						<i class=" entypo-users"></i>
						<span class="title">รายงาน</span>
					</a>
					<ul>
						<li>
							<a href="<?php echo base_url(); ?>Saraban/report_saraban_admin">
								<span class="title">รายงานเลขสารบรรณ</span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>Saraban/report_allowance_admin">
								<span class="title">รายงานการขออนุมัติเดินทาง</span> 
							</a>
						</li>
					</ul>
				</li>
				<?php } ?>
			</ul>