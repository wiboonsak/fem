<ul class="navbar-nav">
				<li class="active has-sub">
					<a href="#">
						<i class="entypo-doc-text"></i>
						<span class="title">การขอเบิกค่าเดินทาง</span>
					</a>
					<ul>
						<li>
							<a href="<?php echo base_url(); ?>Allowance/index_admin">
								<span class="title">รายการคำขอรอดำเนินการตรวจเช็ค</span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>Allowance/fail_admin">
								<span class="title">รายการเอกสารคำขอไม่ถูกต้อง</span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>Allowance/chkstatus_admin">
								<span class="title">รายการสถานะการอนุมัติ</span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>Allowance/otherdoc">
								<span class="title">รายการสถานะการส่งรายงานการเดินทาง</span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>Allowance/wait_toPay">
								<span class="title">รายการสถานะรอจ่ายเงิน</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="has-sub"><!--class="has-sub"-->
					<a href="#">
						<i class="entypo-doc-text"></i>
						<span class="title">รายงาน</span>
					</a>
					<ul>
						<li>
							<a href="<?php echo base_url(); ?>Allowance/admin_report">
								<span class="title">รายการคำขอ</span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>Allowance/admin_reportBudget">
								<span class="title">รายการงบประมาณ</span>
							</a>
						</li>
					</ul>					
				</li>
				<li class="has-sub">
					<a href="#">
						<i class="entypo-user-add"></i>
						<span class="title">ข้อมูลผู้อนุมัติ</span>
					</a>
					<ul>						
						<li>
							<a href="<?php echo base_url(); ?>Allowance/add_approvers">
								<span class="title">เพิ่มผู้อนุมัติ</span>
							</a>
						</li>

						<li>
							<a href="<?php echo base_url(); ?>Allowance/all_approvers">
								<span class="title">รายการผู้อนุมัติทั้งหมด</span>
							</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="<?php echo base_url();?>Allowance/all_member">
						<i class="entypo-users"></i>
						<span class="title">ข้อมูลสมาชิก</span>
					</a>
					<!--<ul>
						<li>
							<a href="<?php //echo base_url(); ?>Allowance/edit_member">
								<span class="title">แก้ไข / ลบข้อมูลสมาชิก</span>
							</a>
						</li>
						<li>
							<a href="<?php //echo base_url(); ?>Allowance/all_member">
								<span class="title">รายการสมาชิกทั้งหมด</span>
							</a>
						</li>
					</ul>-->
				</li>
				<li>
					<a href="<?php echo base_url();?>Allowance/admin_data">
						<i class="entypo-users"></i>
						<span class="title">ข้อมูล Admin</span>
					</a>
					
				</li>
				
			</ul>