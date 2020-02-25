<!-- main menu -->
						
<ul class="navbar-nav">
				<?php if(($this->session->userdata['logged_in']['status']) == "user"){ ?>
				<li class="has-sub">
					<a href="<?php echo base_url(); ?>Saraban/index">
						<i class="entypo-doc-text"></i>
						<span class="title">ขอเลขสารบรรณ</span>
					</a>
				</li>
				<?php } ?>

			<li class="active has-sub">
					<a href="<?php echo base_url(); ?>Saraban/list_saraban">
						<i class="entypo-book-open"></i>
						<span class="title">รายการเลขสารบรรณ</span>
					</a>
				</li>
				<?php if(($this->session->userdata['logged_in']['status']) == "user"){ ?>
				<li class="has-sub">
					<a href="<?php echo base_url(); ?>Saraban/report">
						<i class="entypo-users"></i>
						<span class="title">รายงาน</span>
					</a>
				</li>
				<?php } ?>

				<?php if(($this->session->userdata['logged_in']['status']) == "admin_saraban"){ ?>
				<li class="has-sub">
					<a href="#">
						<i class="entypo-users"></i>
						<span class="title">ผู้ดูแล</span>
					</a>
					<ul>
						<li>
							<a href="edit_member.html">
								<span class="title">รายการข้อมูลสมาชิก</span>
							</a>
						</li>
						<li>
							<a href="all_member.html">
								<span class="title">รายการเลขสารบรรณที่ยกเลิก</span>
							</a>
						</li>
					</ul>
				</li>
				<?php } ?>
			</ul>