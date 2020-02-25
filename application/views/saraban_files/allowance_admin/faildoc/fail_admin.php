 	
	<div class="main-content">
			
    <h2 style="text-align: center; ">ขออนุมัติเดินทาง</h2>
<br />
<div class="row">

    <div class="col-sm-4 col-xs-8">
    
	<div class="tile-stats tile-aqua">
		<div class="icon"><i class="entypo-upload"></i></div>
		<div class="num" data-start="0" data-postfix="" data-duration="1500" data-delay="0"><?php echo $count1[0]['count']; ?></div>

		<h3>รายการเลขสารบรรณ</h3> 
		<p>ระบบงานสารบรรณ FEM.</p>
	</div> 

	</div>

	<div class="clear visible-xs"></div>

	<div class="col-sm-4 col-xs-8">

		<div class="tile-stats tile-blue">
			<div class="icon"><i class="entypo-users"></i></div>
			<div class="num" data-start="0" data-postfix="" data-duration="1500" data-delay="0"><?php echo $count2[0]['count']; ?></div>

			<h3>รายการเลขสารบรรณย้อนหลัง</h3>
			<p>ระบบงานสารบรรณ FEM.</p>
		</div>

	</div>

	<div class="col-sm-4 col-xs-8">

		<div class="tile-stats tile-red">
			<div class="icon"><i class="entypo-download"></i></div>
			<div class="num" data-start="0" data-postfix="" data-duration="1500" data-delay="0"><?php echo $count3[0]['count']; ?></div>

			<h3>รายการเลขสารบรรณที่ยกเลิก</h3>
			<p>ระบบงานสารบรรณ FEM.</p>
		</div>

	</div>

</div>
        
                <h2 style="text-align: center; padding-top: 20px;">รายการเอกสารคำขอไม่ถูกต้อง</h2> 
                <br>
                <br>
		
				<ul class="nav nav-tabs bordered">
					<li class="active" style="font-size: 16px;"><a href="#local" data-toggle="tab" aria-expanded="true"><strong>เดินทางในประเทศ</strong></a></li> 
					<li class="" style="font-size: 16px;"><a href="#outbound" data-toggle="tab" aria-expanded="false"><strong>เดินทางต่างประเทศ</strong></a></li>             
				</ul>
		
				<div class="tab-content">
        		<div class="tab-pane active" id="local">
					
					<table class="table table-bordered datatable" id="table-1">
                    <thead>
                        <tr>
							<th>ลำดับ</th>					
							<th>วันที่ส่งคำขอ</th>
							<th>เลขสารบรรณ</th> 
							<th>เรื่อง</th>
							<th>ชื่อ-สกุล</th>
							<th>สถานะเอกสาร</th>
							<th>รายละเอียด</th>
						</tr>
                    </thead>
                    <tbody> 
                        <?php $num = 0; foreach($getdataLocal as $getdataLocal2) : $num++; 
						
								$nameL = $this->Allowance_model->get_userDetail($getdataLocal2['user_create']);
						  		foreach($nameL->result() as $nameL2){}
						?>  
                        <tr class="odd gradeX">
                            <td><?php echo $num; ?></td>
                            <td><?php echo $this->Allowance_model->DateThai($getdataLocal2['date_submit'])?></td>
							<td><?php echo $getdataLocal2['saraban_number'];?></td>
                            <td><?php echo $getdataLocal2['subject_document']; ?></td> 
                            <td><?php echo $nameL2->titlename.''.$nameL2->firstname.' '.$nameL2->lastname;?></td>
                            <td class="center" align="center">							
							<?php if($getdataLocal2['withdraw'] == '0'){ 
									$notapproved = $getdataLocal2['notapproved_saraban']; 
									//$disabled2 = '';
								  } else {
									$notapproved = $getdataLocal2['notapproved_admin'];
								  } 
							?>							
								<?php if($getdataLocal2['check_doc'] == 0){ ?>				
									<span class="text-danger" onClick="show_notapproved('<?php echo $notapproved;?>','สาเหตุที่ไม่ผ่าน')" style="cursor: pointer" title="คลิกดูสาเหตุที่ไม่ผ่าน">
										<i class="entypo-cancel"></i>ไม่ผ่าน
									</span>

								<?php /*} else if(($getdataLocal2->check_doc == 0) && ($getdataLocal2->check_doc2 == 1)){ ?>		<span class="text-danger">
										<i class="entypo-cancel"></i>ไม่ผ่าน
									</span>

								<?php */} else if($getdataLocal2['check_doc'] == 1){ ?>	
									<span class="text-success">
										<i class="entypo-check"></i>ผ่าน
									</span>

								<?php /*} else if(($getdataLocal2->check_doc == 1) && ($getdataLocal2->check_doc2 == 1)){ ?>	
									<span class="text-success">
										<i class="entypo-check"></i>ผ่าน
									</span>							

								<?php */} else if($getdataLocal2['check_doc'] == 2){ ?>	
									<span class="text-info">
										<i class="entypo-clock"></i>รอตรวจ
									</span>

								<?php /*} else if(($getdataLocal2->check_doc == 2) && ($getdataLocal2->check_doc2 == 1)){ ?>	
									<span class="text-info">
										<i class="entypo-clock"></i>รอตรวจ
									</span>

								<?php } else if(($getdataLocal2->check_doc == 3) && ($getdataLocal2->check_doc2 == 3)){ ?>	
									<span class="text-primary">
										<i class="entypo-mail"></i>รอส่ง
									</span>

								<?php } else if(($getdataLocal2->check_doc == 3) && ($getdataLocal2->check_doc2 == 1)){ ?>	
									<span class="text-primary">
										<i class="entypo-mail"></i>รอส่ง
									</span>

								<?php } else if(($getdataLocal2->check_doc2 == 0) && ($getdataLocal2->approve_status == '1')){ ?>					
									<span class="text-danger">
										<i class="entypo-cancel"></i>ไม่ผ่าน
									</span>

								<?php } else if(($getdataLocal2->check_doc2 == 1) && ($getdataLocal2->approve_status == '1')){ $disabled2 = ''; ?>					
									<span class="text-success">
										<i class="entypo-check"></i>ผ่าน
									</span>

								<?php } else if(($getdataLocal2->check_doc2 == 2) && ($getdataLocal2->approve_status == '1')){ ?>					
									<span class="text-info">
										<i class="entypo-clock"></i>รอตรวจ
									</span>

								<?php */} else if($getdataLocal2['check_doc'] == 3){ ?>					
									<span class="text-primary">
										<i class="entypo-mail"></i>รอส่ง
									</span>
								<?php } ?>						
							</td>                            
                             <td class="center">
                                <button type="button" onclick="location.href='<?php echo base_url()?>Saraban/detailLocal/<?php echo $getdataLocal2['withdraw'];?>/<?php echo $getdataLocal2['for_type'];?>/<?php echo $getdataLocal2['id']?>'" class="btn btn-info btn-sm btn-icon icon-left"> 
                                    <i class="entypo-eye"></i>รายละเอียด 
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody> 
                </table>		
			</div>
		
			<div class="tab-pane" id="outbound">	
                
                <table class="table table-bordered datatable" id="table-2">
                    <thead>
                        <tr>
							<th>ลำดับ</th>					
							<th>วันที่ส่งคำขอ</th>
							<th>เลขสารบรรณ</th> 
							<th>เรื่อง</th>
							<th>ชื่อ-สกุล</th>
							<th>สถานะเอกสาร</th>
							<th>รายละเอียด</th>
						</tr>
                    </thead>
                    <tbody> 
                        <?php $num = 0; foreach($getdata as $getdata) : $num++; 
						
								$saraban = explode(",",$getdata['saraban_number']);
                      			$numsaranban = $saraban[0];
						
								$name = $this->Allowance_model->get_userDetail($getdata['user_create']);
					  			foreach($name->result() as $name2){}
						?>  
                        <tr class="odd gradeX">
                            <td><?php echo $num; ?></td>
                            <td><?php echo $this->Allowance_model->DateThai($getdata['date_submit'])?></td>
							<td><?php echo $numsaranban;?></td>
                            <td><?php echo $getdata['subject_document']; ?></td> 
                            <td><?php echo $name2->titlename.''.$name2->firstname.' '.$name2->lastname;?></td>
                            <td align="center"><?php if($getdata['check_doc'] == 0){ ?>				
									<span class="text-danger" onClick="show_notapproved('<?php echo $getdata['notapproved_saraban'];?>','สาเหตุที่ไม่ผ่าน')" style="cursor: pointer" title="คลิกดูสาเหตุที่ไม่ผ่าน">
										<i class="entypo-cancel"></i>ไม่ผ่าน
									</span>

								<?php /*} else if(($getdataLocal2->check_doc == 0) && ($getdataLocal2->check_doc2 == 1)){ ?>		<span class="text-danger">
										<i class="entypo-cancel"></i>ไม่ผ่าน
									</span>

								<?php */} else if($getdata['check_doc'] == 1){ ?>	
									<span class="text-success">
										<i class="entypo-check"></i>ผ่าน
									</span>

								<?php /*} else if(($getdataLocal2->check_doc == 1) && ($getdataLocal2->check_doc2 == 1)){ ?>	
									<span class="text-success">
										<i class="entypo-check"></i>ผ่าน
									</span>							

								<?php */} else if($getdata['check_doc'] == 2){ ?>	
									<span class="text-info">
										<i class="entypo-clock"></i>รอตรวจ
									</span>

								<?php /*} else if(($getdataLocal2->check_doc == 2) && ($getdataLocal2->check_doc2 == 1)){ ?>	
									<span class="text-info">
										<i class="entypo-clock"></i>รอตรวจ
									</span>

								<?php } else if(($getdataLocal2->check_doc == 3) && ($getdataLocal2->check_doc2 == 3)){ ?>	
									<span class="text-primary">
										<i class="entypo-mail"></i>รอส่ง
									</span>

								<?php } else if(($getdataLocal2->check_doc == 3) && ($getdataLocal2->check_doc2 == 1)){ ?>	
									<span class="text-primary">
										<i class="entypo-mail"></i>รอส่ง
									</span>

								<?php } else if(($getdataLocal2->check_doc2 == 0) && ($getdataLocal2->approve_status == '1')){ ?>					
									<span class="text-danger">
										<i class="entypo-cancel"></i>ไม่ผ่าน
									</span>

								<?php } else if(($getdataLocal2->check_doc2 == 1) && ($getdataLocal2->approve_status == '1')){ $disabled2 = ''; ?>					
									<span class="text-success">
										<i class="entypo-check"></i>ผ่าน
									</span>

								<?php } else if(($getdataLocal2->check_doc2 == 2) && ($getdataLocal2->approve_status == '1')){ ?>					
									<span class="text-info">
										<i class="entypo-clock"></i>รอตรวจ
									</span>

								<?php */} else if($getdata['check_doc'] == 3){ ?>					
									<span class="text-primary">
										<i class="entypo-mail"></i>รอส่ง
									</span>
								<?php } ?></td>                            
                            <td class="center">
                                <button type="button" onclick="location.href='<?php echo base_url()?>Saraban/detail/<?php echo $getdata['withdraw'];?>/<?php echo $getdata['for_type'];?>/<?php echo $getdata['id']?>'" class="btn btn-info btn-sm btn-icon icon-left"> 
                                    <i class="entypo-eye"></i>รายละเอียด 
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody> 
                </table>
            </div>
			</div>	
                <br>        
        
            <!-- Footer -->
            <footer class="main">
        
                &copy; 2018 <strong>FEM.</strong> Developed by <a href="http://www.me-fi.com" target="_blank">ME-FI dot com</a>
        
            </footer>
            
            </div>        
        