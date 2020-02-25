	
	<div class="main-content">
			
<!--	<h2 style="text-align: center; ">ระบบเบิกค่าเดินทาง</h2>

	<br />

		
		<div class="row">
			<div class="col-sm-3 col-xs-6">
		
				<div class="tile-stats tile-red">
					<div class="icon"><i class="entypo-download"></i></div>
					<div class="num" data-start="0" data-end="83" data-postfix="" data-duration="1500" data-delay="0">69</div>
		
					<h3>รายการเอกสารคำขอไม่ถูกต้อง</h3>
					<p>ระบบเบิกค่าเดินทาง FEM.</p>
				</div>
		
			</div>
		
			<div class="col-sm-3 col-xs-6">
		
				<div class="tile-stats tile-aqua">
					<div class="icon"><i class="entypo-upload"></i></div>
					<div class="num" data-start="0" data-end="135" data-postfix="" data-duration="1500" data-delay="600">34</div>
		
					<h3>รายการคำขอรอการตรวจเช็ค</h3>
					<p>ระบบเบิกค่าเดินทาง FEM.</p>
				</div>
		
			</div> 
			
			<div class="clear visible-xs"></div>
		
			<div class="col-sm-3 col-xs-6">
		
				<div class="tile-stats tile-green">
					<div class="icon"><i class="entypo-book-open"></i></div>
					<div class="num" data-start="0" data-end="23" data-postfix="" data-duration="1500" data-delay="1200">543</div>
		
					<h3>รายการคำขอทั้งหมด</h3>
					<p>ระบบเบิกค่าเดินทาง FEM.</p>
				</div>
		
			</div>
		
			<div class="col-sm-3 col-xs-6">
		
				<div class="tile-stats tile-blue">
					<div class="icon"><i class="entypo-users"></i></div>
					<div class="num" data-start="0" data-end="52" data-postfix="" data-duration="1500" data-delay="1800">850</div>
		
					<h3>สมาชิกทั้งหมด</h3>
					<p>ระบบเบิกค่าเดินทาง FEM.</p>
				</div>
		
			</div>
		</div>-->

		<h2 style="text-align: center; padding-top: 20px;"><?php echo $pageTopic?></h2>
		<br />
		<br />
		      <ul class="nav nav-tabs bordered">
                   <li class="active" style="width: 150px;font-size: 16px;text-align: center"> <a href="#process" data-toggle="tab" aria-expanded="true">  <span class="hidden-xs"><b>รออนุมัติ</b></span> </a></li> 
                   <li class="" style="width: 150px;font-size: 16px;text-align: center"> <a href="#success" data-toggle="tab" aria-expanded="false"> <span class="hidden-xs"><b>อนุมัติ</b></span> </a> </li> 
                   <li class="" style="width: 150px;font-size: 16px;text-align: center"> <a href="#nosuccess" data-toggle="tab" aria-expanded="false">  <span class="hidden-xs"><b>ไม่อนุมัติ</b></span> </a> </li> 
               </ul>
                   <div class="tab-content">
                <div class="tab-pane active" id="process">
		<table class="table table-bordered datatable" id="table-1">
			<thead>
				<tr>
					<th>ลำดับ</th> 
					<th>วันที่ส่งคำขอ</th>
                    <th>เลขสารบรรณ</th> 
					<th>เรื่อง</th>
					<th>ชื่อ-สกุล</th>					
					<th>ดำเนินการ</th>
				</tr> 
			</thead>
			<tbody>
				<?php $num = 0; foreach($getdataPending2 as $getdataPending2) : $num++;
			
						if($showExpenses != ''){	
                               $saraban = explode(",",$getdataPending2['saraban_number']);
                               $numsaranban = $saraban[0];
						}
                        if(($withdraw == '1') && ($getdataPending2['check_doc'] == '1') && ($getdataPending2['approve_status'] == '1')){
	
							if($showExpenses != ''){				
							  $saraban = explode(",",$getdataPending2['saraban_number']);
							  $numsaranban = $saraban[1];
							}
							  $withdrawData = $this->Allowance_model->get_withdrawData($getdataPending2['id'], '', $getdataPending2['user_create'], 'type_travel', 'desc');
							  $withdrawNum = $withdrawData->num_rows();									

							  if($withdrawNum > 0){			

								foreach($withdrawData->result() as $withdrawData2){	

									if(($withdrawNum == 1) && ($withdrawData2->type_travel == '1')){

										$subject_doc2 = 'ขออนุมัติเดินทางในประเทศเพื่อไปต่างประเทศ และขอเบิกค่าใช้จ่าย';

									} else if(($withdrawNum == 1) && ($withdrawData2->type_travel == '2')){

										$subject_doc2 = 'ขออนุมัติค่าใช้จ่ายในการเดินทางไปปฏิบัติงาน ณ ต่างประเทศ';

									} else if($withdrawNum == 2){

										$subject_doc2 = 'ขออนุมัติเดินทางในประเทศเพื่อไปต่างประเทศ และขอเบิกค่าใช้จ่าย';
									}
							  } }
						  
					} else {
						  
						  $subject_doc2 = $getdataPending2['subject_document'];
					}			
					if($showExpenses == ''){
						  $numsaranban = $getdataPending2['saraban_number'];
						  $subject_doc2 = $getdataPending2['subject_document'];
					}
			
                ?>  
				<tr class="odd gradeX">
					<td><?php echo $num; ?></td>   
					<td><?php 
						$myDateTime = DateTime::createFromFormat('Y-m-d',$getdataPending2['date_submit']);
						echo $formattedweddingdate = $myDateTime->format('d/m/Y');
					?></td>
                    <td><?php echo $numsaranban; ?></td>   
					<td><?php echo $subject_doc2?></td> 
					<td><?php echo $getdataPending2['name_surname']; ?></td>
					<td class="center">
						<button type="button" onclick="location.href='<?php echo base_url()?>Allowance/<?php echo $link2?>/<?php echo $getdataPending2['withdraw'];?>/<?php echo $getdataPending2['for_type'];?>/<?php echo $getdataPending2['id'].$showExpenses;?>'" class="btn btn-info btn-sm btn-icon icon-left"> 
							<i class="entypo-info"></i>
							ตรวจเช็ค 
						</button>
					</td> 
				</tr>
				<?php endforeach; ?>
			</tbody> 
		</table>
                </div>
                       <div class="tab-pane" id="success">
                           <table class="table table-bordered datatable" id="table-2">
			<thead>
				<tr>
					<th>ลำดับ</th> 
					<th>วันที่ส่งคำขอ</th>
                    <th>เลขสารบรรณ</th> 
					<th>เรื่อง</th>
					<th>ชื่อ-สกุล</th>
					<th>รายละเอียด</th>
				</tr> 
			</thead>
			<tbody>
				<?php $num = 0; foreach($getdataPending1 as $getdataPending1) : $num++;
				
						if($showExpenses != ''){	
                                $saraban = explode(",",$getdataPending1['saraban_number']);
                               $numsaranban = $saraban[0];
						}
				
                        $subject_doc2 = '';	
                               
                        if(($withdraw == '1') && ($getdataPending1['check_doc'] == '1') && ($getdataPending1['approve_status'] == '1')){
	
							  if($showExpenses != ''){			   

							  	$saraban = explode(",",$getdataPending1['saraban_number']);
							  	$numsaranban = $saraban[1];
							  }

							  $withdrawData = $this->Allowance_model->get_withdrawData($getdataPending1['id'], '', $getdataPending1['user_create'], 'type_travel', 'desc');
							  $withdrawNum = $withdrawData->num_rows();								   

							  if($withdrawNum > 0){			

								foreach($withdrawData->result() as $withdrawData2){	

									if(($withdrawNum == 1) && ($withdrawData2->type_travel == '1')){

										$subject_doc2 = 'ขออนุมัติเดินทางในประเทศเพื่อไปต่างประเทศ และขอเบิกค่าใช้จ่าย';

									} else if(($withdrawNum == 1) && ($withdrawData2->type_travel == '2')){

										$subject_doc2 = 'ขออนุมัติค่าใช้จ่ายในการเดินทางไปปฏิบัติงาน ณ ต่างประเทศ';

									} else if($withdrawNum == 2){

										$subject_doc2 = 'ขออนุมัติเดินทางในประเทศเพื่อไปต่างประเทศ และขอเบิกค่าใช้จ่าย';
									}
							  } }
						  
						} else {
						  
						  	$subject_doc2 = $getdataPending1['subject_document'];
						} 
						if($showExpenses == ''){
							$numsaranban = $getdataPending1['saraban_number'];
							$subject_doc2 = $getdataPending1['subject_document'];
						}			   
					?>  
				<tr class="odd gradeX">
					<td><?php echo $num; ?></td>   
					<td><?php 
						$myDateTime = DateTime::createFromFormat('Y-m-d',$getdataPending1['date_submit']);
						echo $formattedweddingdate = $myDateTime->format('d/m/Y');
					?></td>
                    <td><?php echo $numsaranban; ?></td>   
					<td><?php echo $subject_doc2; ?></td> 
					<td><?php echo $getdataPending1['name_surname'];?></td>					
					<td class="center">
						
						<!--<button type="button" onclick="location.href='<?php //echo base_url()?>Allowance/<?php //echo $link2?>/<?php //echo $getdataPending1['withdraw'];?>/<?php //echo $getdataPending1['for_type'];?>/<?php //echo $getdataPending1['id'].$showExpenses;?>'" class="btn btn-info btn-sm btn-icon icon-left"> 
							<i class="entypo-info"></i>
							ตรวจเช็ค 
						</button>-->					
						
<?php 	if($type2 == 'out'){
	
			if(($getdataPending1['for_type'] == '1') && ($getdataPending1['withdraw'] == '1')){
					$pdf = 'preview_outboundWithdraw';

			} else if(($getdataPending1['for_type'] == '1') && ($getdataPending1['withdraw'] == '0')){
					$pdf = 'preview_outbound';

			} else if(($getdataPending1['for_type'] == '2') && ($getdataPending1['withdraw'] == '0')){
					$pdf = 'outboundGroup_noWithdraw';

			} else if(($getdataPending1['for_type'] == '2') && ($getdataPending1['withdraw'] == '1')){
					$pdf = 'preview_outboundGroup';
			}
	
		} if($type2 == 'local'){						
						
			if(($getdataPending1['for_type'] == '1') && ($getdataPending1['withdraw'] == '1')){
					$pdf = 'preview_LocalWithdraw';

			} else if(($getdataPending1['for_type'] == '1') && ($getdataPending1['withdraw'] == '0')){
					$pdf = 'preview_Local';

			} else if(($getdataPending1['for_type'] == '2') && ($getdataPending1['withdraw'] == '0')){
					$pdf = 'LocalGroup_noWithdraw';

			} else if(($getdataPending1['for_type'] == '2') && ($getdataPending1['withdraw'] == '1')){
					$pdf = 'preview_LocalGroup';
			}				
		} ?>						
						
						<button type="button" onclick="location.href='<?php echo base_url()?>Printer_controller/<?php echo $pdf?>/<?php echo $getdataPending1['id'];?>/<?php echo $getdataPending1['user_create'];?>'" class="btn btn-info btn-sm btn-icon icon-left"> 
							<i class="entypo-info"></i>
							รายละเอียด 
						</button>
						
					</td> 
				</tr>
				<?php endforeach; ?>
			</tbody> 
		</table>
                </div>
                       <div class="tab-pane" id="nosuccess">
           <table class="table table-bordered datatable" id="table-3">
			<thead>
				<tr>
					<th>ลำดับ</th> 
					<th>วันที่ส่งคำขอ</th>
                    <th>เลขสารบรรณ</th> 
					<th>เรื่อง</th>
					<th>ชื่อ-สกุล</th>
					<th>รายละเอียด</th>
				</tr> 
			</thead>
			<tbody>
				<?php $num = 0; foreach($getdataPending0 as $getdataPending0) : $num++;
				
				if($showExpenses != ''){	
                      $saraban = explode(",",$getdataPending0['saraban_number']);
                      $numsaranban = $saraban[0]; 
				}
				              
				if(($withdraw == '1') && ($getdataPending0['check_doc'] == '1') && ($getdataPending0['approve_status'] == '1')){
	
					if($showExpenses != ''){					
						  $saraban = explode(",",$getdataPending0['saraban_number']);
						  $numsaranban = $saraban[1];	
					}
					$withdrawData = $this->Allowance_model->get_withdrawData($getdataPending0['id'], '', $getdataPending0['user_create'], 'type_travel', 'desc');
					$withdrawNum = $withdrawData->num_rows();								

					if($withdrawNum > 0){			

						foreach($withdrawData->result() as $withdrawData2){	

							if(($withdrawNum == 1) && ($withdrawData2->type_travel == '1')){

								$subject_doc2 = 'ขออนุมัติเดินทางในประเทศเพื่อไปต่างประเทศ และขอเบิกค่าใช้จ่าย';

							} else if(($withdrawNum == 1) && ($withdrawData2->type_travel == '2')){

								$subject_doc2 = 'ขออนุมัติค่าใช้จ่ายในการเดินทางไปปฏิบัติงาน ณ ต่างประเทศ';

							} else if($withdrawNum == 2){

								$subject_doc2 = 'ขออนุมัติเดินทางในประเทศเพื่อไปต่างประเทศ และขอเบิกค่าใช้จ่าย';
							}
					} }
						  
				} else {
						  
					$subject_doc2 = $getdataPending0['subject_document'];
				}			
				if($showExpenses == ''){
					$numsaranban = $getdataPending0['saraban_number'];
					$subject_doc2 = $getdataPending0['subject_document'];
				}
			?>  
				<tr class="odd gradeX">
					<td><?php echo $num; ?></td>   
					<td><?php 
						$myDateTime = DateTime::createFromFormat('Y-m-d',$getdataPending0['date_submit']);
						echo $formattedweddingdate = $myDateTime->format('d/m/Y');
					?></td>
                    <td><?php echo $numsaranban;?></td>   
					<td><?php echo $subject_doc2;?></td> 
					<td><?php echo $getdataPending0['name_surname'];?></td>				
					<td class="center">
						<button type="button" onclick="location.href='<?php echo base_url()?>Allowance/<?php echo $link2?>/<?php echo $getdataPending0['withdraw'];?>/<?php echo $getdataPending0['for_type']; ?>/<?php echo $getdataPending0['id'].$showExpenses;?>'" class="btn btn-info btn-sm btn-icon icon-left"> 
							<i class="entypo-info"></i>
							ตรวจเช็ค 
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
