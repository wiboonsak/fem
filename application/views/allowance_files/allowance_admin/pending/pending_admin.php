	
	<div class="main-content">
			
	<h2 style="text-align: center; ">ระบบเบิกค่าเดินทาง</h2>

	<br />

		
		<div class="row">
			<div class="col-sm-3 col-xs-6">
		
				<div class="tile-stats tile-red">
					<div class="icon"><i class="entypo-download"></i></div>
					<div class="num" data-start="0" data-postfix="" data-duration="1500" data-delay="0"><?php echo $count1;?></div>
		
					<h3>รายการเอกสารคำขอไม่ถูกต้อง</h3>
					<p>ระบบเบิกค่าเดินทาง FEM.</p> 
				</div>
		
			</div>
		
			<div class="col-sm-3 col-xs-6">
		
				<div class="tile-stats tile-aqua">
					<div class="icon"><i class="entypo-upload"></i></div>
					<div class="num" data-start="0" data-postfix="" data-duration="1500" data-delay="600"><?php echo $count2?></div>
		
					<h3>รายการคำขอรอการตรวจเช็ค</h3>
					<p>ระบบเบิกค่าเดินทาง FEM.</p>
				</div>
		
			</div> 
			
			<div class="clear visible-xs"></div>
		
			<div class="col-sm-3 col-xs-6">
		
				<div class="tile-stats tile-green">
					<div class="icon"><i class="entypo-book-open"></i></div>
					<div class="num" data-start="0" data-postfix="" data-duration="1500" data-delay="1200"><?php echo $count3?></div>
		
					<h3>รายการสถานะรอจ่ายเงิน</h3>
					<p>ระบบเบิกค่าเดินทาง FEM.</p>
				</div>
		
			</div>
		
			<div class="col-sm-3 col-xs-6">		
				<div class="tile-stats tile-blue">
					<div class="icon"><i class="entypo-users"></i></div>
					<div class="num" data-start="0" data-postfix="" data-duration="1500" data-delay="1800"><?php echo $count4[0]['count']; ?></div>
		
					<h3>สมาชิกทั้งหมด</h3>
					<p>ระบบเบิกค่าเดินทาง FEM.</p>
				</div>		
			</div>
		</div>

		<h2 style="text-align: center; padding-top: 20px;"><?php echo $pageTopic?></h2>
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
					<?php if($columnStatus == 'Yes'){ ?> 
						<th>สถานะเอกสาร</th>	
						<th>รายละเอียด</th>
					<?php } else if($columnStatus == 'approve'){ ?> 
						<th>สถานะการอนุมัติ</th>	
						<th>รายละเอียด</th>
					<?php } else { ?>		
						<th>ดำเนินการ</th>
					<?php } ?>	
					</tr>			
				</thead>
				<tbody>
					<?php $numL = 0; foreach($getdataLocal as $getdataLocal2) : $numL++; 
						  //$sarabanL = explode(",",$getdataLocal2['saraban_number']);
						  //$numsaranbanL = $sarabanL[1];	

						  $nameL = $this->Allowance_model->get_userDetail($getdataLocal2['user_create']);
						  foreach($nameL->result() as $nameL2){}				  

						  /*$withdrawData = $this->Allowance_model->get_withdrawData($getdataLocal2['id'], '', $getdataLocal2['user_create'], 'type_travel', 'desc');				
						  $withdrawNum = $withdrawData->num_rows();
						  $subject_doc2 ='';

						if($withdrawNum > 0){

							foreach($withdrawData->result() as $withdrawData2){	

								if(($withdrawNum == 1) && ($withdrawData2->type_travel == '1')){

									$subject_doc2 = 'ขออนุมัติเดินทางในประเทศเพื่อไปต่างประเทศ และขอเบิกค่าใช้จ่าย';

								} else if(($withdrawNum == 1) && ($withdrawData2->type_travel == '2')){

									$subject_doc2 = 'ขออนุมัติค่าใช้จ่ายในการเดินทางไปปฏิบัติงาน ณ ต่างประเทศ';

								} else if($withdrawNum == 2){

									$subject_doc2 = 'ขออนุมัติเดินทางในประเทศเพื่อไปต่างประเทศ และขอเบิกค่าใช้จ่าย';
								}							
							}
						}*/ ?>  
					<tr class="odd gradeX">
						<td><?php echo $numL;?></td>   
						<td><?php 
							$myDateTime = DateTime::createFromFormat('Y-m-d',$getdataLocal2['date_create']);
							echo $formattedweddingdate = $myDateTime->format('d/m/Y');?>
						</td>
						<td><?php echo $getdataLocal2['saraban_number'];?></td> 
						<td><?php echo $getdataLocal2['subject_document'];?></td>
						<td><?php echo $nameL2->titlename.''.$nameL2->firstname.' '.$nameL2->lastname;?></td>
					<?php if($columnStatus == 'Yes'){ ?>	
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
                                <button type="button" onclick="location.href='<?php echo base_url()?>Allowance/detailLocal/<?php echo $getdataLocal2['withdraw'];?>/<?php echo $getdataLocal2['for_type'];?>/<?php echo $getdataLocal2['id']?>'" class="btn btn-info btn-sm btn-icon icon-left"> 
                                    <i class="entypo-eye"></i>รายละเอียด 
                                </button>
                            </td>
						<?php } else if($columnStatus == 'approve'){ ?>	
							<td class="center" align="center">							
							<?php if($getdataLocal2['approve_status'] == 0){ ?>
                                    <span class="text-danger" onClick="show_notapproved('<?php echo $getdataLocal2['notapproved_approvers'];?>','เหตุผลการไม่อนุมัติ')" style="cursor: pointer" title="คลิกดูเหตุผลการไม่อนุมัติ">
										<i class="entypo-cancel"></i>ไม่อนุมัติ
									</span>
                           <?php } else if($getdataLocal2['approve_status'] == 1){ ?>
                                    <span class="text-success">
										<i class="entypo-check"></i>อนุมัติ
									</span>
                           <?php } else if($getdataLocal2['approve_status'] == 2){ ?>
                                    <span class="text-info">
										<i class="entypo-clock"></i>รออนุมัติ
									</span> 
                           <?php } ?>						
							</td>                            
                            <td class="center">
                                <button type="button" onclick="location.href='<?php echo base_url()?>Allowance/detailLocal/<?php echo $getdataLocal2['withdraw'];?>/<?php echo $getdataLocal2['for_type'];?>/<?php echo $getdataLocal2['id']?>'" class="btn btn-info btn-sm btn-icon icon-left"> 
                                    <i class="entypo-eye"></i>รายละเอียด 
                                </button>
                            </td>
						<?php } else { ?>						
						<td class="center">
						<?php /*if($getdataLocal2['typeData'] != '2'){ ?>
							<button type="button" onclick="location.href='<?php echo base_url()?>Allowance/detaill/<?php echo $getdataLocal2['withdraw']; ?>/<?php echo $getdataLocal2['for_type'];?>/<?php echo $getdataLocal2['id'];?>'" class="btn btn-info btn-sm btn-icon icon-left"> 
						<?php } else {*/ ?>
							<button type="button" onclick="location.href='<?php echo base_url()?>Allowance/detailLocal/<?php echo $getdataLocal2['withdraw'];?>/<?php echo $getdataLocal2['for_type'];?>/<?php echo $getdataLocal2['id'];?>'" class="btn btn-info btn-sm btn-icon icon-left"> 
						<?php //} ?>
								<i class="entypo-info"></i>ตรวจเช็ค 
							</button>
						</td> 
						<?php } ?>
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
				<?php if($columnStatus == 'Yes'){ ?> 
					<th>สถานะเอกสาร</th>	
					<th>รายละเอียด</th>
				<?php } else if($columnStatus == 'approve'){ ?> 
					<th>สถานะการอนุมัติ</th>	
					<th>รายละเอียด</th>	
				<?php } else { ?>		
					<th>ดำเนินการ</th>
				<?php } ?>
				</tr>			
			</thead>
			<tbody>
				<?php $num = 0; foreach($getdataPending as $getdataPending2) : $num++; 
					  $saraban = explode(",",$getdataPending2['saraban_number']);
                      $numsaranban = $saraban[1];	
				
					  $name = $this->Allowance_model->get_userDetail($getdataPending2['user_create']);
					  foreach($name->result() as $name2){}				  
				
					  $withdrawData = $this->Allowance_model->get_withdrawData($getdataPending2['id'], '', $getdataPending2['user_create'], 'type_travel', 'desc');				
					  $withdrawNum = $withdrawData->num_rows();
					  $subject_doc2 ='';
				
					if($withdrawNum > 0){
									
						foreach($withdrawData->result() as $withdrawData2){	

							if(($withdrawNum == 1) && ($withdrawData2->type_travel == '1')){

								$subject_doc2 = 'ขออนุมัติเดินทางในประเทศเพื่อไปต่างประเทศ และขอเบิกค่าใช้จ่าย';

							} else if(($withdrawNum == 1) && ($withdrawData2->type_travel == '2')){

								$subject_doc2 = 'ขออนุมัติค่าใช้จ่ายในการเดินทางไปปฏิบัติงาน ณ ต่างประเทศ';

							} else if($withdrawNum == 2){

								$subject_doc2 = 'ขออนุมัติเดินทางในประเทศเพื่อไปต่างประเทศ และขอเบิกค่าใช้จ่าย';
							}							
						}
					}?>  
				<tr class="odd gradeX">
					<td><?php echo $num; ?></td>   
					<td><?php 
						$myDateTime = DateTime::createFromFormat('Y-m-d',$getdataPending2['date_create']);
						echo $formattedweddingdate = $myDateTime->format('d/m/Y');?>
					</td>
					<td><?php echo $numsaranban;?></td> 
					<td><?php echo $subject_doc2?></td>
					<td><?php echo $name2->titlename.''.$name2->firstname.' '.$name2->lastname;?></td>
				<?php if($columnStatus == 'Yes'){ ?>	
					<td class="center" align="center">													
						<?php if($getdataPending2['check_doc2'] == 0){ ?>				
								<span class="text-danger" onClick="show_notapproved('<?php echo $getdataPending2['notapproved_admin'];?>','สาเหตุที่ไม่ผ่าน')" style="cursor: pointer" title="คลิกดูสาเหตุที่ไม่ผ่าน">
									<i class="entypo-cancel"></i>ไม่ผ่าน
								</span>

								<?php /*} else if(($getdataPending2->check_doc == 0) && ($getdataPending2->check_doc2 == 1)){ ?>		<span class="text-danger">
										<i class="entypo-cancel"></i>ไม่ผ่าน
									</span>

								<?php */} else if($getdataPending2['check_doc2'] == 1){ ?>	
									<span class="text-success">
										<i class="entypo-check"></i>ผ่าน
									</span>

								<?php /*} else if(($getdataPending2->check_doc == 1) && ($getdataPending2->check_doc2 == 1)){ ?>	
									<span class="text-success">
										<i class="entypo-check"></i>ผ่าน
									</span>							

								<?php */} else if($getdataPending2['check_doc2'] == 2){ ?>	
									<span class="text-info">
										<i class="entypo-clock"></i>รอตรวจ
									</span>

								<?php /*} else if(($getdataPending2->check_doc == 2) && ($getdataPending2->check_doc2 == 1)){ ?>	
									<span class="text-info">
										<i class="entypo-clock"></i>รอตรวจ
									</span>

								<?php } else if(($getdataPending2->check_doc == 3) && ($getdataPending2->check_doc2 == 3)){ ?>	
									<span class="text-primary">
										<i class="entypo-mail"></i>รอส่ง
									</span>

								<?php } else if(($getdataPending2->check_doc == 3) && ($getdataLocal2->check_doc2 == 1)){ ?>	
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

								<?php */} else if($getdataPending2['check_doc2'] == 3){ ?>					
									<span class="text-primary">
										<i class="entypo-mail"></i>รอส่ง
									</span>
								<?php } ?>						
							</td>                            
                            <td class="center">
                                <button type="button" onclick="location.href='<?php echo base_url()?>Allowance/detaill/<?php echo $getdataPending2['withdraw'];?>/<?php echo $getdataPending2['for_type'];?>/<?php echo $getdataPending2['id']?>'" class="btn btn-info btn-sm btn-icon icon-left"> 
                                    <i class="entypo-eye"></i>รายละเอียด 
                                </button>
                            </td>
				<?php } else if($columnStatus == 'approve'){ ?>	
							<td class="center" align="center">													
							<?php if($getdataPending2['approve_status2'] == 0){ ?>
                                    <span class="text-danger" onClick="show_notapproved('<?php echo $getdataPending2['notapproved_approvers2'];?>','เหตุผลการไม่อนุมัติ')" style="cursor: pointer" title="คลิกดูเหตุผลการไม่อนุมัติ">
										<i class="entypo-cancel"></i>ไม่อนุมัติ
									</span>
                                <?php }elseif($getdataPending2['approve_status2'] == 1){ ?>
                                    <span class="text-success">
										<i class="entypo-check"></i>อนุมัติ
									</span>
                                <?php }elseif($getdataPending2['approve_status2'] == 2){ ?>
                                    <span class="text-info">
										<i class="entypo-clock"></i>รออนุมัติ
									</span> 
                                <?php } ?>						
							</td>                            
                            <td class="center">
                                <button type="button" onclick="location.href='<?php echo base_url()?>Allowance/detaill/<?php echo $getdataPending2['withdraw'];?>/<?php echo $getdataPending2['for_type'];?>/<?php echo $getdataPending2['id']?>'" class="btn btn-info btn-sm btn-icon icon-left"> 
                                    <i class="entypo-eye"></i>รายละเอียด 
                                </button>
                            </td>
						<?php } else { ?>	
						<td class="center">
                                         <?php //if($getdataPending2['typeData'] != '2'){?>
						<button type="button" onclick="location.href='<?php echo base_url()?>Allowance/detaill/<?php echo $getdataPending2['withdraw'];?>/<?php echo $getdataPending2['for_type'];?>/<?php echo $getdataPending2['id'];?>'" class="btn btn-info btn-sm btn-icon icon-left"> 
                                         <?php /*}else{?>
						<button type="button" onclick="location.href='<?php echo base_url()?>Allowance/detailLocal/<?php echo $getdataPending2['withdraw']; ?>/<?php echo $getdataPending2['for_type'];?>/<?php echo $getdataPending2['id'];?>'" class="btn btn-info btn-sm btn-icon icon-left"> 
                                         <?php }*/ ?>
							<i class="entypo-info"></i>ตรวจเช็ค 
						</button>
					</td> 
					<?php } ?>
				</tr>
				<?php endforeach; ?>
			</tbody> 
		</table>
		</div>			
				
		</div>	
		
		<br />

	<!-- Footer -->
	<footer class="main">

		&copy; 2018 <strong>FEM.</strong> Developed by <a href="http://www.me-fi.com" target="_blank">ME-FI dot com</a>

	</footer>
	
	</div>
