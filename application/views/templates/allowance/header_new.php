<!-- main menu -->
						
			<ul class="navbar-nav">
				<li class=" root-level">
					<a href="<?php echo base_url('Allowance')?>">
						<i class="entypo-doc-text"></i>
						<span class="title">หน้าหลัก</span>
					</a>						
				</li>				
				<li class=" root-level">
					<a href="<?php echo base_url('allowance/createcountry')?>">
						<i class="entypo-doc-text"></i>
						<span class="title">เดินทางในประเทศ</span>
					</a>
					
				</li>
				<li class=" root-level">
					<a href="<?php echo base_url('allowance/createAbroad')?>">
						<i class="entypo-doc-text"></i>
						<span class="title">เดินทางต่างประเทศ</span>
					</a>
					<?php /* ?><ul>
						<li class="root-level">
							<a href="<?php echo base_url('allowance/createAbroad')?>">
							<!--<a href="<?php //echo base_url('allowance/createAllowance')?>">-->
								<span class="title">สร้างคำขออนุมัติเดินทาง</span>
							</a>
						</li>
						<!--<li>
							<a href="index1">
								<span class="title">สร้างคำขอเบิกค่าใช้จ่าย</span>
							</a>
						</li>-->					
					</ul><?php */ ?>	
				</li>
				<!--<li class=" root-level">
					<a href="create2_allowance">
						<i class="entypo-doc-text"></i>
						<span class="title">สร้างคำขออนุมัติเดินทาง</span>
					</a>
				</li>	
				<li class="root-level">
					<a href="create_allowance">
						<i class="entypo-doc-text"></i>
						<span class="title">สร้างคำขอเบิกค่าเดินทาง</span>
					</a>					
				</li>-->
				<li class=" root-level"><!--class="has-sub"-->
					<a href="#">
						<i class="entypo-doc-text"></i>
						<span class="title">ข้อมูลการใช้งาน</span>
					</a>
					<ul>
						<li>
							<a href="<?php echo base_url();?>Allowance/reportLocal">
								<span class="title">เดินทางในประเทศ</span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>Allowance/report">
								<span class="title">เดินทางต่างประเทศ</span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url();?>Allowance/reportBudget">
								<span class="title">การใช้งบประมาณ</span>
							</a>
						</li>
					</ul>					
				</li>
                <?php if($this->session->userdata['logged_in']['statusApprove']=='Yes'){ 
         
		$getdataoutbound = $this->Allowance_model->getdataPending();
                $numoutbound = $getdataoutbound->num_rows();
		$getdataLocal = $this->Allowance_model->getdataLocal();
                $numLocal = $getdataoutbound->num_rows();
                $totalnum = $numoutbound+$numLocal;
                    ?>
                <li class=" root-level">
                    <a onclick="window.open('<?php echo base_url('Allowance/index_approve')?>')" style="cursor: pointer">
						<i class="entypo-doc-text"></i>
						<span class="title">การอนุมัติ</span>
                                                <?php if($totalnum>0){?>
                                                <span class="badge badge-danger" style="border-radius: 10px; position: absolute; padding: 5px; font-size: 12px; right: -5px; top: 6px; min-width: 17px; line-height: 12px;"><?php echo $totalnum?></span>
                                                <?php }?>
					</a>						
				</li>	
                <?php } ?>
			</ul>