	
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

		<h2 style="text-align: center; padding-top: 20px;">รายการคำขอรอดำเนินการอนุมัติ</h2>
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
					<th>ดำเนินการ</th>
				</tr> 
			</thead>
			<tbody>
				<?php $num = 1; foreach($getdataLocal as $getdataLocal) :                     	
	
					  $nameL = $this->Allowance_model->get_userDetail($getdataLocal['user_create']);
					  foreach($nameL->result() as $nameL2){}
				?>  
				<tr class="odd gradeX">
					<td><?php echo $num;?></td>					
					<td><?php 
						$myDateTime = DateTime::createFromFormat('Y-m-d',$getdataLocal['date_create']);
						echo $formattedweddingdate = $myDateTime->format('d/m/Y');
					?></td>
                    <td><?php echo $getdataLocal['saraban_number'];?></td>   
					<td><?php echo $getdataLocal['subject_document'];?></td> 
					<td><?php echo $nameL2->titlename.''.$nameL2->firstname.' '.$nameL2->lastname;?></td>		
					<td class="center">                                            
						<button type="button" onclick="location.href='<?php echo base_url() ?>allowance/detail_approvelocal/<?php echo $getdataLocal['withdraw'];?>/<?php echo $getdataLocal['for_type'];?>/<?php echo $getdataLocal['id'];?>'" class="btn btn-info btn-sm btn-icon icon-left">                                            
							<i class="entypo-info"></i>ตรวจเช็ค 
						</button>
					</td> 
				</tr>
                <?php $num++; endforeach; ?>
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
					<th>ดำเนินการ</th>
				</tr> 
			</thead>
			<tbody>
				<?php $num = 1; foreach($getdataPending as $getdataPending2) : 
	 
                      $saraban = explode(",",$getdataPending2['saraban_number']);
                      $numsaranban = $saraban[0];                                
					  $subject_doc2 = '';
					  $showExpenses = '1';	
				
					  $name = $this->Allowance_model->get_userDetail($getdataPending2['user_create']);
					  foreach($name->result() as $name2){}	
	
					  if(($getdataPending2['withdraw'] == '1') && ($getdataPending2['check_doc'] == '1') && ($getdataPending2['approve_status'] == '1')){
	
						  $saraban = explode(",",$getdataPending2['saraban_number']);
						  $numsaranban = $saraban[1];	
						  $showExpenses = '2';
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
					}  ?>  
				<tr class="odd gradeX">
					<td><?php echo $num;?></td>					
					<td><?php 
						$myDateTime = DateTime::createFromFormat('Y-m-d',$getdataPending2['date_create']);
						echo $formattedweddingdate = $myDateTime->format('d/m/Y');
					?></td>
                    <td><?php echo $numsaranban;?></td>   
					<td><?php echo $subject_doc2;?></td> 
					<td><?php echo $name2->titlename.''.$name2->firstname.' '.$name2->lastname;?></td>			
					<td class="center">                                            
						<button type="button" onclick="location.href='<?php echo base_url()?>allowance/detail_approve/<?php echo $getdataPending2['withdraw'];?>/<?php echo $getdataPending2['for_type'];?>/<?php echo $getdataPending2['id'];?>/<?php echo $showExpenses;?>'" class="btn btn-info btn-sm btn-icon icon-left">                        
							<i class="entypo-info"></i>ตรวจเช็ค 
						</button>
					</td> 
				</tr>
                <?php $num++; endforeach; ?>
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
