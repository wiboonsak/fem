<ul class="navbar-nav">
				<li class="has-sub">
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
				<li class=" root-level"><!--class="has-sub"-->
					<a href="#">
						<i class="entypo-doc-text"></i>
						<span class="title">รายงาน</span>
					</a>
					<ul>
						<li>
							<a href="admin_report">
								<span class="title">รายการคำขอ</span>
							</a>
						</li>
						<li>
							<a href="admin_reportBudget">
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
							<a href="<?php echo base_url(); ?>Allowance/edit_approvers">
								<span class="title">แก้ไข / ลบข้อมูลผู้อนุมัติ</span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>Allowance/all_approvers">
								<span class="title">รายการผู้อนุมัติทั้งหมด</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="has-sub">
					<a href="#">
						<i class="entypo-users"></i>
						<span class="title">สมาชิก</span>
					</a>
					<ul>
						<!--<li>
							<a href="<?php //echo base_url(); ?>Allowance/edit_member">
								<span class="title">แก้ไข / ลบข้อมูลสมาชิก</span>
							</a>
						</li>-->
						<li>
							<a href="<?php echo base_url(); ?>Allowance/all_member">
								<span class="title">รายการสมาชิกทั้งหมด</span>
							</a>
						</li>
					</ul>
				</li>
				<li class="has-sub">
					<a href="<?php echo base_url();?>Allowance/Admin_Data">
						<i class="entypo-users"></i>
						<span class="title">ข้อมูล Admin</span>
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
				<!--<li class="active has-sub">
					<a href="#">
						<i class="entypo-pencil"></i>
						<span class="title">ข้อมูลตำแหน่งและงบประมาณ</span>
					</a>
					<ul>
						<li>
							<a href="<?php echo base_url(); ?>Allowance/add_position">
								<span class="title">เพิ่มข้อมูล</span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>Allowance/edit_position">
								<span class="title">แก้ไข / ลบ ข้อมูล</span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>Allowance/all_position">
								<span class="title">รายการตำแหน่งทั้งหมด</span>
							</a>
						</li>
					</ul>
				</li>-->
			</ul>