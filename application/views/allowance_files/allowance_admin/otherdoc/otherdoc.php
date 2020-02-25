	
	<div class="main-content">
			
	<h2 style="text-align: center; ">ระบบเบิกค่าเดินทาง</h2>

	<br>		
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

		<h2 style="text-align: center; padding-top: 20px;">รายการสถานะการส่งรายงานการเดินทาง</h2>
		<br><br>
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
					<th>สถานะ</th>
					<th>ไฟล์หลักฐานการจ่าย</th>
					<th>ดำเนินการ</th>
				</tr>			
			</thead>
			<tbody>
				<?php $num = 0; foreach($getdataLocal as $getdataLocal2) : $num++;					 
				
					  $nameL = $this->Allowance_model->get_userDetail($getdataLocal2['user_create']);
					  foreach($nameL->result() as $nameL2){}				
				?>  
				<tr class="odd gradeX">
					<td><?php echo $num;?></td>   
					<td><?php 
						$myDateTime = DateTime::createFromFormat('Y-m-d',$getdataLocal2['date_create']);
						echo $formattedweddingdate = $myDateTime->format('d/m/Y');?>
					</td>
					<td><?php echo $getdataLocal2['saraban_number'];?></td> 
					<td><?php echo $getdataLocal2['subject_document']?></td>
					<td><?php echo $nameL2->titlename.''.$nameL2->firstname.' '.$nameL2->lastname;?></td>
                    <td class="center"><span class="text-danger" onClick="show_notapproved('กรอกจำนวนเงินผิดพลาด','สาเหตุที่ไม่ผ่าน')" style="cursor: pointer" title="คลิกดูสาเหตุที่ไม่ผ่าน"><i class="entypo-cancel"></i>ไม่ผ่าน</span></td>
					<!--<td class="center"><button type="button" onclick="dosubmit_take('<?php //echo $getdataLocal2['id'];?>','1')" class="btn btn-primary btn-sm btn-icon icon-left" <?php //if($getdataLocal2['take_money']=='1'){echo 'disabled';}?>><i class="entypo-eye"></i>เบิกเงินแล้ว</button></td>-->
                    <td class="center">
                            <?php if(($getdataLocal2['finishform'] == '1') && ($getdataLocal2['withdraw'] == '1')){
                                  $file = $this->Inputform_model->getdocfile($getdataLocal2['id'],'1');
                                  $numfile = $file->num_rows();
                                  if($numfile>0){
                            ?>
                             <button type="button" onclick="upload('<?php echo $getdataLocal2['id']?>')" class="btn btn-info btn-sm btn-icon icon-left"><i class="entypo-eye"></i>รายละเอียด</button>
                             <div id="modal-upload-saraban<?php echo $getdataLocal2['id']?>" class="modal fade" role="dialog" >
									<div class="modal-dialog modal-lg ">
										<div class="modal-content">
											<div class="modal-header no-padding">
												<div class="table-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
														<span class="white">&times;</span>
													</button>
													ไฟล์หลักฐานการจ่าย
												</div>
											</div>

											<div class="modal-body">
												<!-- PAGE CONTENT BEGINS -->
												<form enctype="multipart/form-data" id="imgForm<?php echo $getdataLocal2['id']?>" name="imgForm" method="post">
													<div class="row">
														<label class="col-sm-4 text-left" style="line-height: 30px;">เลขสารบรรณ</label>
														<label id="saraban_id" class="col-sm-8 text-left" style="line-height: 30px;"><?php echo $getdataLocal2['saraban_number']?></label>
															<div class="clear"></div>
														<div id="showdata<?php echo $getdataLocal2['id']?>">
 <?php $f = 1;

 if($numfile>0){
     foreach($file->result() AS $file2){
 ?>
<label class="col-sm-4 text-left" style="line-height: 30px;"><?php if($f==1){?>ไฟล์หลักฐานการจ่าย<?php } ?></label>
<div class="col-md-6">
    <p onclick="window.open('<?php echo base_url();?><?php echo $file2->file_name?>','_blank');" style="color:blue; cursor:pointer"><u><?php echo $file2->file_name?></u></p>    
</div>
<div class="col-md-2">
   
</div>
<div class="clear"></div>
     <?php $f++;}}?>
</div>
<label class="col-sm-4 text-left" style="line-height: 30px;"></label>
<div class="col-md-8" style="float:right">
		   <button type="button" onclick="window.open('<?php echo base_url();?>uploadfile/gbN8hF_6Vpcd-ScJw6k.php?id=<?php echo $getdataLocal2['id']?>', '_blank');" class="btn btn-info" style="text-align:right">ดาวน์โหลดไฟลทั้งหมด</button>
	</div>	
</div>
                </form> 
           </div>							<div class="modal-footer no-margin-top">

												<button class="btn btn-lg btn-danger pull-right" data-dismiss="modal"><i class="ace-icon fa fa-times"></i>ปิด</button>	
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div>
								<!--</div>-->
                                  <?php } } ?>              
                   </td>
					<td class="center">
                        <?php if($getdataLocal2['for_type']==1){?>
                               <button type="button" onclick="window.open('<?php echo base_url();?>Printer_controller/Preview_doc/<?php echo $getdataLocal2['dic1_id'];?>/1')" class="btn btn-info btn-sm btn-icon icon-left" > 
                               <i class="entypo-eye"></i>ตรวจเช็ค
							   </button>
                        <?php } else { ?>
                               <button type="button" onclick="window.open('<?php echo base_url();?>Printer_controller/Preview_doc_group/<?php echo $getdataLocal2['id'];?>/1')" class="btn btn-info btn-sm btn-icon icon-left"> 
                               <i class="entypo-eye"></i>ตรวจเช็ค
							   </button>
                        <?php } ?>
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
					<th>สถานะ</th>
					<th>ไฟล์หลักฐานการจ่าย</th>
					<th>ดำเนินการ</th>
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
					} ?>  
				<tr class="odd gradeX">
					<td><?php echo $num;?></td>   
					<td><?php 
						$myDateTime = DateTime::createFromFormat('Y-m-d',$getdataPending2['date_create']);
						echo $formattedweddingdate = $myDateTime->format('d/m/Y');?>
					</td>
					<td><?php echo $numsaranban;?></td> 
					<td><?php echo $subject_doc2?></td>
					<td><?php echo $name2->titlename.''.$name2->firstname.' '.$name2->lastname;?></td>
					<td class="center"><span class="text-success">
									<i class="entypo-check"></i>ผ่าน
                                </span></td>
					<!--<td class="center"><button type="button" onclick="dosubmit_take('<?php //echo $getdataPending2['id'];?>','2')" class="btn btn-primary btn-sm btn-icon icon-left" <?php //if($getdataPending2['take_money']=='1'){echo 'disabled';}?>> 
                               <i class="entypo-eye"></i>เบิกเงินแล้ว
							   </button></td>-->
                                        <td class="center">
                            <?php if(($getdataPending2['finishform'] == '1') && ($getdataPending2['withdraw'] == '1')){
                                  $file = $this->Inputform_model->getdocfile($getdataPending2['id'],'2');
                                  $numfile = $file->num_rows();
                                  if($numfile>0){
                            ?>
                             <button type="button" onclick="upload('<?php echo $getdataPending2['id']?>')" class="btn btn-info btn-sm btn-icon icon-left"><i class="entypo-eye"></i>รายละเอียด</button>
                             <div id="modal-upload-saraban<?php echo $getdataPending2['id']?>" class="modal fade" role="dialog" >
									<div class="modal-dialog modal-lg ">
										<div class="modal-content">
											<div class="modal-header no-padding">
												<div class="table-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
														<span class="white">&times;</span>
													</button>
													ไฟล์หลักฐานการจ่าย
												</div>
											</div>

											<div class="modal-body">
												<!-- PAGE CONTENT BEGINS -->
												<form enctype="multipart/form-data" id="imgForm<?php echo $getdataPending2['id']?>" name="imgForm" method="post">
													<div class="row">
														<label class="col-sm-4 text-left" style="line-height: 30px;">เลขสารบรรณ</label>
														<label id="saraban_id" class="col-sm-8 text-left" style="line-height: 30px;"><?php echo $getdataPending2['saraban_number']?></label>
															<div class="clear"></div>
														<div id="showdata<?php echo $getdataPending2['id']?>">
 <?php $f = 1;

 if($numfile>0){
     foreach($file->result() AS $file2){
 ?>
<label class="col-sm-4 text-left" style="line-height: 30px;"><?php if($f==1){?>ไฟล์หลักฐานการจ่าย<?php } ?></label>
<div class="col-md-6">
    <p onclick="window.open('<?php echo base_url();?><?php echo $file2->file_name?>','_blank');" style="color:blue; cursor:pointer"><u><?php echo $file2->file_name?></u></p>    
</div>
<div class="col-md-2">
   
</div>
<div class="clear"></div>
     <?php $f++;}}?>
</div>
<label class="col-sm-4 text-left" style="line-height: 30px;"></label>
<div class="col-md-8" style="float:right">
		   <button type="button" onclick="window.open('<?php echo base_url();?>uploadfile/gbN8hF_6Vpcd-ScJw6k.php?id=<?php echo $getdataPending2['id']?>', '_blank');" class="btn btn-info" style="text-align:right">ดาวน์โหลดไฟลทั้งหมด</button>
	</div>	
</div>
                </form> 
           </div>							<div class="modal-footer no-margin-top">

												<button class="btn btn-lg btn-danger pull-right" data-dismiss="modal"><i class="ace-icon fa fa-times"></i>ปิด</button>	
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div>
								<!--</div>-->
                                  <?php } } ?>              
                   </td>
					<td class="center">
                        <?php if($getdataPending2['for_type']==1){ ?>
                            <button type="button" onclick="window.open('<?php echo base_url();?>Printer_controller/Preview_doc/<?php echo $getdataPending2['dic1_id'];?>/2')" class="btn btn-info btn-sm btn-icon icon-left">                                   
							<i class="entypo-eye"></i>ตรวจเช็ค
							</button>
                        <?php } else { ?>
                           <button type="button" onclick="window.open('<?php echo base_url();?>Printer_controller/Preview_doc_group/<?php echo $getdataPending2['id'];?>/2')" class="btn btn-info btn-sm btn-icon icon-left"> 
                           <i class="entypo-eye"></i>ตรวจเช็ค
						   </button>
                       <?php } ?>
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
