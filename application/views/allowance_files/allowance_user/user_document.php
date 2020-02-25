	<?php function DateThai($strDate){
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear";
	}  ?>
	
	<div class="main-content">			
	
		<h2 style="text-align: center; padding-top: 20px;">รายการคำขอทั้งหมด</h2>
		<br>
		<br>
		
		<ul class="nav nav-tabs bordered">
            <li class="active" style="font-size: 16px;"><a href="#local" data-toggle="tab" aria-expanded="true"><strong>เดินทางในประเทศ</strong></a></li> 
            <li class="" style="font-size: 16px;"><a href="#outbound" data-toggle="tab" aria-expanded="false"><strong>เดินทางต่างประเทศ</strong></a></li>             
        </ul>
		
		<div class="tab-content">
        <div class="tab-pane active" id="local">
			
			<table class="table table-bordered datatable table-striped" id="table-1">
	    	<thead>
		        <tr>
		            <th>ลำดับ</th>
		            <th>วันที่ส่งคำขอ</th>
		            <th>เลขที่คำขอ</th>
		            <th>เรื่อง</th>
		            <th>สถานะเอกสาร</th>
		            <!--<th>หมายเหตุเอกสาร</th>-->
		            <th>สถานะอนุมัติ</th>
                    <th >รายงานการเดินทาง</th>
			    	<th>ไฟล์หลักฐานการจ่าย</th>
		            <th>ดำเนินการ</th>
		        </tr>
	    	</thead>
	    	<tbody>		    																		
				<?php $documentNum2 = $getdataLocal->num_rows(); 
		  			  if($documentNum2 > 0){	
						  	$i =1; $disabled2 = 'disabled';						
							foreach($getdataLocal->result() as $getdataLocal2){				
				
					//if(($getdata2->withdraw == '1') && ($getdata2->check_doc == '1') && ($getdata2->approve_status == '1')){ 
					//$i++; 
					/*$subject_doc2 = '';
					$withdrawData = $this->Allowance_model->get_withdrawData($getdataLocal2->id, '', $getdataLocal2->user_create, 'type_travel', 'desc');
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
					} }*/  ?>	
				<tr class="gradeA odd" role="row">
						<td class=""><?php echo $i?></td>
						<td><?php echo DateThai($getdataLocal2->date_create);?></td>
						<td class="sorting_1"><?php echo $getdataLocal2->saraban_number;?></td>
						<td><?php echo $getdataLocal2->subject_document;?></td>
						<td class="center" align="center">							
						<?php if($getdataLocal2->withdraw == '0'){ 
								$notapproved = $getdataLocal2->notapproved_saraban; 
								//$disabled2 = '';
							  } else {
								$notapproved = $getdataLocal2->notapproved_admin;
							  } 
						?>							
							<?php if($getdataLocal2->check_doc == 0){ ?>				
								<span class="text-danger" onClick="show_notapproved('<?php echo $notapproved;?>','สาเหตุที่ไม่ผ่าน')" style="cursor: pointer" title="คลิกดูสาเหตุที่ไม่ผ่าน">
									<i class="entypo-cancel"></i>ไม่ผ่าน
                                </span>
							
							<?php /*} else if(($getdataLocal2->check_doc == 0) && ($getdataLocal2->check_doc2 == 1)){ ?>		<span class="text-danger">
									<i class="entypo-cancel"></i>ไม่ผ่าน
                                </span>
							
							<?php */} else if($getdataLocal2->check_doc == 1){ ?>	
								<span class="text-success">
									<i class="entypo-check"></i>ผ่าน
                                </span>
							
							<?php /*} else if(($getdataLocal2->check_doc == 1) && ($getdataLocal2->check_doc2 == 1)){ ?>	
								<span class="text-success">
									<i class="entypo-check"></i>ผ่าน
                                </span>							
							
							<?php */} else if($getdataLocal2->check_doc == 2){ ?>	
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
							
							<?php */} else if($getdataLocal2->check_doc == 3){ ?>					
								<span class="text-primary">
									<i class="entypo-mail"></i>รอส่ง
								</span>
							<?php } ?>						
						</td>
						<!--<td><?php //if($getdataLocal2->check_doc == 0){ echo $getdataLocal2->notapproved_admin; }?></td>-->
						<td class="center" align="center">							
							
							<?php if($getdataLocal2->approve_status == '0'){ ?>					
								<span class="text-danger" onClick="show_notapproved('<?php echo $getdataLocal2->notapproved_approvers;?>','เหตุผลการไม่อนุมัติ')" style="cursor: pointer" title="คลิกดูเหตุผลการไม่อนุมัติ">
									<i class="entypo-cancel"></i>ไม่อนุมัติ
								</span>
							
							<?php } else if($getdataLocal2->approve_status == '1'){ 
									$disabled2 = '';
							?>					
								<span class="text-success">
									<i class="entypo-check"></i>อนุมัติ
								</span>
							
							<?php } else if($getdataLocal2->approve_status == '2'){ ?>					
								<span class="text-info">
									<i class="entypo-clock"></i>รออนุมัติ
								</span>							
							
							<?php } /*else if(($getdataLocal2->approve_status2 == '0') && ($getdataLocal2->approve_status != '')){ ?>					
								<span class="text-danger">
									<i class="entypo-cancel"></i>ไม่อนุมัติ
								</span>
							
							<?php } else if(($getdataLocal2->approve_status2 == '1') && ($getdataLocal2->approve_status != '')){ $disabled2 = ''; ?>					
								<span class="text-success">
									<i class="entypo-check"></i>อนุมัติ
								</span>
							
							<?php } else if(($getdataLocal2->approve_status2 == '2') && ($getdataLocal2->approve_status != '')){ ?>					
								<span class="text-info">
									<i class="entypo-clock"></i>รออนุมัติ
								</span>						
							<?php }*/ ?>						
						</td>
						<td class="center" align="center">
							<?php if($getdataLocal2->finishform == '1'){
                                    $getdoc1_id = $this->Inputform_model->getdoc1idsaraban($getdataLocal2->id, '1');
                                    $file = $this->Inputform_model->getdocfile($getdataLocal2->id,'1');
									foreach($getdoc1_id->result() AS $getdoc1_id2){}
                                    if($getdataLocal2->for_type == '1'){ ?>
                                       <button type="button" onclick="window.open('<?php echo base_url();?>Printer_controller/Preview_doc/<?php echo $getdoc1_id2->id;?>/1')" class="btn btn-info btn-sm btn-icon icon-left"><i class="entypo-eye"></i>รายละเอียด</button>
                                       <?php if($getdataLocal2->take_money=='0'){?><a href="<?php echo base_url();?>Inputform/travel/<?php echo $getdataLocal2->id;?>/1"><button type="button" class="btn btn-danger btn-sm"> แก้ไข</button></a>
                                       <?php }?>		
                            		<?php } else { ?>
							
                                     <button type="button" onclick="window.open('<?php echo base_url();?>Printer_controller/Preview_doc_group/<?php echo $getdataLocal2->id;?>/1')" class="btn btn-info btn-sm "> <i class="entypo-eye"></i>รายละเอียด</button>
                                              <?php if($getdataLocal2->take_money=='0'){?>           
									  <a href="<?php echo base_url();?>Inputform/travel/<?php echo $getdataLocal2->id;?>/1"><button type="button" class="btn btn-danger btn-sm"> แก้ไข</button></a>
                                                                          <?php }?>
                           			<?php } ?>
						   <?php } else { ?>
                                                                          <?php if($getdataLocal2->withdraw !='0'){?>
                                      <a href="<?php echo base_url();?>Inputform/travel/<?php echo $getdataLocal2->id;?>/1"><button type="button" class="btn btn-primary btn-sm btn-icon icon-left" <?php echo $disabled2?> > <i class="entypo-eye"></i>ทำรายงานการเดินทาง</button></a>
                                                                          <?php }?>
                           <?php } ?>
                        </td>
                        <td class="center">
                            <?php if(($getdataLocal2->finishform == '1') && ($getdataLocal2->withdraw == '1')){
                                  $file = $this->Inputform_model->getdocfile($getdataLocal2->id,'1');
                                  $numfile = $file->num_rows();
                                  if($numfile>0){
                            ?>
                             <button type="button" onclick="upload('<?php echo $i?>')" class="btn btn-info btn-sm btn-icon icon-left"><i class="entypo-eye"></i>รายละเอียด</button>
                             <div id="modal-upload-saraban<?php echo $i?>" class="modal fade" role="dialog" >
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
												<form enctype="multipart/form-data" id="imgForm<?php echo $i?>" name="imgForm" method="post">
													<div class="row">
														<label class="col-sm-4 text-left" style="line-height: 30px;">เลขสารบรรณ</label>
														<label id="saraban_id" class="col-sm-8 text-left" style="line-height: 30px;"><?php echo $getdataLocal2->saraban_number?></label>
															<div class="clear"></div>
														<div id="showdata<?php echo $i?>">
 <?php $f = 1;

 if($numfile>0){
     foreach($file->result() AS $file2){
 ?>
<label class="col-sm-4 text-left" style="line-height: 30px;"><?php if($f==1){?>ไฟล์หลักฐานการจ่าย<?php } ?></label>
<div class="col-md-6">
    <p onclick="window.open('<?php echo base_url();?><?php echo $file2->file_name?>','_blank');" style="color:blue; cursor:pointer"><u><?php echo $file2->file_name?></u></p>    
</div>
<div class="col-md-2">
     <?php if($getdataLocal2->take_money=='0'){?> 
    <i class="entypo-trash" aria-hidden="true" style="cursor:pointer" onclick="comfirmDelete('<?php echo $getdataLocal2->id?>','<?php echo $file2->file_name?>','1','<?php echo $i?>')"></i>
     <?php }?>
</div>
<div class="clear"></div>
     <?php $f++;}}?>
</div>
                                                                                                                        <?php if($getdataLocal2->take_money=='0'){?>  
<label class="col-sm-4 text-left" style="line-height: 30px;">อัพโหลดไฟล์หลักฐานการจ่าย</label>
	<div class="col-md-8">
		<input type="file" class="form-control" placeholder="" id="img2<?php echo $i?>" name="img2[]" multiple style="height: 35px;" ><br>
		<p style="color:red">(รองรับไฟล์นามสกุล .jpg .png .jpeg .pdf และขนาดไฟล์ควรมีขนาดไม่เกิน 2 MB)</p>
		<input type="hidden" name="outboundid" value="<?php echo $getdataLocal2->id?>">
		<input type="hidden" name="sarabannumber" value="<?php echo $getdataLocal2->saraban_number?>">
		<input type="hidden" name="doc1_id" value="<?php echo $getdoc1_id2->id?>">
		<input type="hidden" name="x" value="<?php echo $i?>">
	</div>
                                                                                                                        <?php }?>
<label class="col-sm-4 text-left" style="line-height: 30px;"></label>
<div class="col-md-8" style="float:right">
		   <button type="button" onclick="window.open('<?php echo base_url();?>uploadfile/gbN8hF_6Vpcd-ScJw6k.php?id=<?php echo $getdataLocal2->id?>', '_blank');" class="btn btn-info" style="text-align:right">ดาวน์โหลดไฟลทั้งหมด</button>
	</div>	
</div>
                </form> 
           </div>							<div class="modal-footer no-margin-top">
               <?php if($getdataLocal2->take_money=='0'){?>  
												<button type="button" class="btn btn-lg btn-success" onClick="Addimg('<?php echo $i?>')" ><i class="ace-icon fa fa-check"></i>บันทึก</button>
               <?php }?>
												<button class="btn btn-lg btn-danger pull-right" data-dismiss="modal"><i class="ace-icon fa fa-times"></i>ปิด</button>	
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div>
								<!--</div>-->
                                  <?php } } ?>              
                   </td>					
					
						<td class="center" align="center">							
							<?php if($getdataLocal2->approve_status == '' && $getdataLocal2->check_doc == '3'){ ?>		
								<a href="<?php echo base_url().'Allowance2/detailLocal/'.$getdataLocal2->withdraw.'/'.$getdataLocal2->for_type.'/'.$getdataLocal2->id?>" class="btn btn-default btn-sm btn-icon icon-left">
									<i class="entypo-pencil"></i>แก้ไข
								</a>&nbsp;
								<button class="btn btn-danger btn-sm btn-icon icon-left" onclick="dodelete2('<?php echo $getdataLocal2->id;?>')">
									<i class="entypo-cancel"></i>ลบ
								</button> 
							
							<?php } else if($getdataLocal2->check_doc == '0' && ($getdataLocal2->approve_status == '2' || $getdataLocal2->approve_status == '')){ ?>
								<a href="<?php echo base_url().'Allowance2/detailLocal/'.$getdataLocal2->withdraw.'/'.$getdataLocal2->for_type.'/'.$getdataLocal2->id?>" class="btn btn-default btn-sm btn-icon icon-left">
									<i class="entypo-pencil"></i>แก้ไข
								</a>						
							
							<?php } else { ?>
								<a href="<?php echo base_url().'Allowance2/detailLocal/'.$getdataLocal2->withdraw.'/'.$getdataLocal2->for_type.'/'.$getdataLocal2->id?>" class="btn btn-info btn-sm btn-icon icon-left">
									<i class="entypo-info"></i>รายละเอียด
								</a>
							<?php } ?>							
						</td>
					</tr>
				<?php $i++; //} ?>				
					
					<?php
				//endforeach ;
			$i++; $disabled2 = 'disabled'; } } ?>
				
				</tbody>
		</table>
			
		</div>	
		
		<div class="tab-pane" id="outbound">
		
		<table class="table table-bordered datatable table-striped" id="table-2">
	    	<thead>
		        <tr>
		            <th>ลำดับ</th>
		            <th>วันที่ส่งคำขอ</th>
		            <th>เลขที่คำขอ</th>
		            <th>เรื่อง</th>
		            <th>สถานะเอกสาร</th>
		            <!--<th>หมายเหตุเอกสาร</th>-->
		            <th>สถานะอนุมัติ</th>
                    <th >รายงานการเดินทาง</th>
			    	<th>ไฟล์หลักฐานการจ่าย</th>
		            <th>ดำเนินการ</th>
		        </tr>
	    	</thead>
	    	<tbody>		    																		
				<?php $documentNum = $getdata->num_rows(); 
		  			  if($documentNum > 0){	
						  	$i =1; $disabled2 = 'disabled';						
							foreach($getdata->result() as $getdata2){				
				
					if(($getdata2->withdraw == '1') && ($getdata2->check_doc == '1') && ($getdata2->approve_status == '1')){ 
					//$i++; 
					$subject_doc2 = '';
					$withdrawData = $this->Allowance_model->get_withdrawData($getdata2->id, '', $getdata2->user_create, 'type_travel', 'desc');
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
					} }  ?>	
				<tr class="gradeA odd" role="row">
						<td class=""><?php echo $i?></td>
						<td><?php echo DateThai($getdata2->date_create);
						//$myDateTime = DateTime::createFromFormat('Y-m-d',$getdata2->date_create);
						//echo $myDateTime->format('d/m/Y');
						?></td>
						<td class="sorting_1"><?php if(($getdata2->saraban_number != '') && ($getdata2->withdraw == '1')){ echo $this->Saraban_model->explode_sarabanNumber($getdata2->saraban_number,'1');} else { echo $getdata2->saraban_number; }?></td>
						<td><?php echo $subject_doc2;?></td>
						<td class="center" align="center">	
							
						<?php if($getdata2->withdraw == '0'){ 
								$getdata2->check_doc2 = 1; 
								//$disabled2 = '';
						} ?>					
							
							<?php if(($getdata2->check_doc == 0) && ($getdata2->check_doc2 == 3)){ ?>				<span class="text-danger" onClick="show_notapproved('<?php echo $getdata2->notapproved_saraban;?>','สาเหตุที่ไม่ผ่าน')" style="cursor: pointer" title="คลิกดูสาเหตุที่ไม่ผ่าน">
									<i class="entypo-cancel"></i>ไม่ผ่าน
                                </span>
							
							<?php } else if(($getdata2->check_doc == 0) && ($getdata2->check_doc2 == 1)){ ?>		<span class="text-danger" onClick="show_notapproved('<?php echo $getdata2->notapproved_saraban;?>','สาเหตุที่ไม่ผ่าน')" style="cursor: pointer" title="คลิกดูสาเหตุที่ไม่ผ่าน">
									<i class="entypo-cancel"></i>ไม่ผ่าน
                                </span>
							
							<?php } else if(($getdata2->check_doc == 1) && ($getdata2->check_doc2 == 3)){ ?>	
								<span class="text-success">
									<i class="entypo-check"></i>ผ่าน
                                </span>
							
							<?php } else if(($getdata2->check_doc == 1) && ($getdata2->check_doc2 == 1)){ ?>	
								<span class="text-success">
									<i class="entypo-check"></i>ผ่าน
                                </span>							
							
							<?php } else if(($getdata2->check_doc == 2) && ($getdata2->check_doc2 == 3)){ ?>	
								<span class="text-info">
									<i class="entypo-clock"></i>รอตรวจ
								</span>
							
							<?php } else if(($getdata2->check_doc == 2) && ($getdata2->check_doc2 == 1)){ ?>	
								<span class="text-info">
									<i class="entypo-clock"></i>รอตรวจ
								</span>
							
							<?php } else if(($getdata2->check_doc == 3) && ($getdata2->check_doc2 == 3)){ ?>	
								<span class="text-primary">
									<i class="entypo-mail"></i>รอส่ง
								</span>
							
							<?php } else if(($getdata2->check_doc == 3) && ($getdata2->check_doc2 == 1)){ ?>	
								<span class="text-primary">
									<i class="entypo-mail"></i>รอส่ง
								</span>
							
							<?php } else if(($getdata2->check_doc2 == 0) && ($getdata2->approve_status == '1')){ ?>					
                                <span class="text-danger" onClick="show_notapproved('<?php echo $getdata2->notapproved_admin;?>','สาเหตุที่ไม่ผ่าน')" style="cursor: pointer" title="คลิกดูสาเหตุที่ไม่ผ่าน">
									<i class="entypo-cancel"></i>ไม่ผ่าน
                                </span>
							
							<?php } else if(($getdata2->check_doc2 == 1) && ($getdata2->approve_status == '1')){ $disabled2 = ''; ?>					
								<span class="text-success">
									<i class="entypo-check"></i>ผ่าน
                                </span>
							
							<?php } else if(($getdata2->check_doc2 == 2) && ($getdata2->approve_status == '1')){ ?>					
								<span class="text-info">
									<i class="entypo-clock"></i>รอตรวจ
								</span>
							
							<?php } else if(($getdata2->check_doc2 == 3) && ($getdata2->approve_status == '1')){ ?>					
								<span class="text-primary">
									<i class="entypo-mail"></i>รอส่ง
								</span>
							<?php } ?>						
						</td>
						<!--<td><?php //if($getdata2->check_doc2 == 0){ echo $getdata2->notapproved_admin; }?></td>-->
						<td class="center" align="center">							
							
							<?php if(($getdata2->approve_status == '0') && ($getdata2->approve_status2 == '')){ ?>					
								<span class="text-danger" onClick="show_notapproved('<?php echo $getdata2->notapproved_approvers;?>','เหตุผลการไม่อนุมัติ')" style="cursor: pointer" title="คลิกดูเหตุผลการไม่อนุมัติ">
									<i class="entypo-cancel"></i>ไม่อนุมัติ
								</span>
							
							<?php //} else if(($getdata2->approve_status == '1') && ($getdata2->approve_status2 == '')){ ?>					
								<!--<span class="text-success">
									<i class="entypo-check"></i>อนุมัติ
								</span>-->
							
							<?php } else if(($getdata2->approve_status == '2') && ($getdata2->approve_status2 == '')){ ?>					
								<span class="text-info">
									<i class="entypo-clock"></i>รออนุมัติ
								</span>							
							
							<?php } else if(($getdata2->approve_status2 == '0') && ($getdata2->approve_status != '')){ ?>					
								<span class="text-danger" onClick="show_notapproved('<?php echo $getdata2->notapproved_approvers2;?>','เหตุผลการไม่อนุมัติ')" style="cursor: pointer" title="เหตุผลการไม่อนุมัติ">
									<i class="entypo-cancel"></i>ไม่อนุมัติ
								</span>
							
							<?php } else if(($getdata2->approve_status2 == '1') && ($getdata2->approve_status != '')){ $disabled2 = ''; ?>					
								<span class="text-success">
									<i class="entypo-check"></i>อนุมัติ
								</span>
							
							<?php } else if(($getdata2->approve_status2 == '2') && ($getdata2->approve_status != '')){ ?>					
								<span class="text-info">
									<i class="entypo-clock"></i>รออนุมัติ
								</span>						
							<?php } ?>						
						</td>
						<td class="center" align="center">
							<?php if($getdata2->finishform == '1'){
                                    $getdoc1_id = $this->Inputform_model->getdoc1idsaraban($getdata2->id,'2');
                                    $file = $this->Inputform_model->getdocfile($getdata2->id,'2');
                                                           
                                    foreach ($getdoc1_id->result() AS $getdoc1_id2){}
                                    if($getdata2->for_type=='1'){?>
                                       <button type="button" onclick="window.open('<?php echo base_url();?>Printer_controller/Preview_doc/<?php echo $getdoc1_id2->id;?>/2')" class="btn btn-info btn-sm btn-icon icon-left"><i class="entypo-eye"></i>รายละเอียด</button>
                                       <?php if($getdata2->take_money=='0'){?>
                                       <a href="<?php echo base_url();?>Inputform/travel/<?php echo $getdata2->id;?>/2"><button type="button" class="btn btn-danger btn-sm"> แก้ไข</button></a>
                                       <?php }?>
							
                            <?php } else { ?>
							
                                      <button type="button" onclick="window.open('<?php echo base_url();?>Printer_controller/Preview_doc_group/<?php echo $getdata2->id;?>/2')" class="btn btn-info btn-sm"><i class="entypo-eye"></i>รายละเอียด</button>
                                        <?php if($getdata2->take_money=='0'){?>                 
									  <a href="<?php echo base_url(); ?>Inputform/travel/<?php echo $getdata2->id;?>/2"><button type="button" class="btn btn-danger btn-sm"> แก้ไข</button></a>
                           <?php } ?>
                           <?php } ?>
						   <?php } else { ?>
                                                <?php if($getdata2->withdraw !='0'){?>
                                      <a href="<?php echo base_url(); ?>Inputform/travel/<?php echo $getdata2->id;?>/2"><button type="button" class="btn btn-primary btn-sm btn-icon icon-left" <?php echo $disabled2?> > <i class="entypo-eye"></i>ทำรายงานการเดินทาง</button></a>
                                                <?php }?>
                           <?php } ?>
                        </td>
                        <td class="center">
                            <?php if(($getdata2->finishform == '1') && ($getdata2->withdraw == '1')){
                                  $file = $this->Inputform_model->getdocfile($getdata2->id,'2');
                                  $numfile = $file->num_rows();
                                  if($numfile>0){
                            ?>
                             <button type="button" onclick="upload('<?php echo $i?>')" class="btn btn-info btn-sm btn-icon icon-left"><i class="entypo-eye"></i>รายละเอียด</button>
                             <div id="modal-upload-saraban<?php echo $i?>" class="modal fade" role="dialog" >
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
												<form enctype="multipart/form-data" id="imgForm<?php echo $i?>" name="imgForm" method="post">
													<div class="row">
														<label class="col-sm-4 text-left" style="line-height: 30px;">เลขสารบรรณ</label>
														<label id="saraban_id" class="col-sm-8 text-left" style="line-height: 30px;"><?php echo $getdata2->saraban_number?></label>
															<div class="clear"></div>
														<div id="showdata<?php echo $i?>">
 <?php $f = 1;

 if($numfile>0){
     foreach ($file->result() AS $file2){ ?>
<label class="col-sm-4 text-left" style="line-height: 30px;"><?php if($f==1){?>ไฟล์หลักฐานการจ่าย<?php } ?></label>
<div class="col-md-6">
    <p onclick="window.open('<?php echo base_url();?><?php echo $file2->file_name?>','_blank');" style="color:blue; cursor:pointer"><u><?php echo $file2->file_name?></u></p>    
</div>
<div class="col-md-2">
     <?php if($getdata2->take_money=='0'){?> 
    <i class="entypo-trash" aria-hidden="true" style="cursor:pointer" onclick="comfirmDelete('<?php echo $getdata2->id?>','<?php echo $file2->file_name?>','2','<?php echo $i?>')"></i>
     <?php }?>
</div>
<div class="clear"></div>
     <?php $f++;}}?>
</div>	
                                                                                                                        <?php if($getdata2->take_money=='0'){?> 
<label class="col-sm-4 text-left" style="line-height: 30px;">อัพโหลดไฟล์หลักฐานการจ่าย</label>
	<div class="col-md-8">
             
		<input type="file" class="form-control" placeholder="" id="img2<?php echo $i?>" name="img2[]" multiple style="height: 35px;" ><br>
		<p style="color:red">(รองรับไฟล์นามสกุล .jpg .png .jpeg .pdf และขนาดไฟล์ควรมีขนาดไม่เกิน 2 MB)</p>
             
		<input type="hidden" name="outboundid" value="<?php echo $getdata2->id?>">
		<input type="hidden" name="sarabannumber" value="<?php echo $getdata2->saraban_number?>">
		<input type="hidden" name="doc1_id" value="<?php echo $getdoc1_id2->id?>">
		<input type="hidden" name="x" value="<?php echo $i?>">
	</div>
<?php }?>
<label class="col-sm-4 text-left" style="line-height: 30px;"></label>
<div class="col-md-8" style="float:right">
		   <button type="button" onclick="window.open('<?php echo base_url();?>uploadfile/gbN8hF_6Vpcd-ScJw6k.php?id=<?php echo $getdata2->id?>', '_blank');" class="btn btn-info" style="text-align:right">ดาวน์โหลดไฟล์ทั้งหมด</button>
	</div>	
</div>
                </form> 
           </div>							<div class="modal-footer no-margin-top">
                <?php if($getdata2->take_money=='0'){?> 
												<button type="button" class="btn btn-lg btn-success" onClick="Addimg('<?php echo $i?>')" ><i class="ace-icon fa fa-check"></i>บันทึก</button>
                <?php }?>
												<button class="btn btn-lg btn-danger pull-right" data-dismiss="modal"><i class="ace-icon fa fa-times"></i>ปิด</button>	
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div>
								<!--</div>-->
                                  <?php } } ?>                            
                   
                        </td>
						<td class="center" align="center">							
							<?php if($getdata2->approve_status == '' && $getdata2->check_doc == 3){  ?>		
								<a href="<?php echo base_url().'Allowance2/detailOutbound/'.$getdata2->withdraw.'/'.$getdata2->for_type.'/'.$getdata2->id?>" class="btn btn-default btn-sm btn-icon icon-left">
									<i class="entypo-pencil"></i>แก้ไข
								</a>&nbsp;
								<button class="btn btn-danger btn-sm btn-icon icon-left" onclick="dodelete('<?php echo $getdata2->id;?>')">
									<i class="entypo-cancel"></i>ลบ
								</button> 
							
							<?php } else if($getdata2->check_doc == 0 && ($getdata2->approve_status == 2 || $getdata2->approve_status == '')){ ?>
								<a href="<?php echo base_url().'Allowance2/detailOutbound/'.$getdata2->withdraw.'/'.$getdata2->for_type.'/'.$getdata2->id?>" class="btn btn-default btn-sm btn-icon icon-left">
									<i class="entypo-pencil"></i>แก้ไข
								</a>						
							
							<?php } else { ?>
								<a href="<?php echo base_url().'Allowance2/detailOutbound/'.$getdata2->withdraw.'/'.$getdata2->for_type.'/'.$getdata2->id?>" class="btn btn-info btn-sm btn-icon icon-left">
									<i class="entypo-info"></i>รายละเอียด
								</a>
							<?php } ?>							
						</td>
					</tr>
				<?php $i++; } ?>				
										
					<tr class="gradeA odd" role="row">
						<td class=""><?php echo $i?></td>
						<td><?php echo DateThai($getdata2->date_create);
						//$myDateTime = DateTime::createFromFormat('Y-m-d',$getdata2->date_create);
						//echo $myDateTime->format('d/m/Y');
						?></td>
						<td class="sorting_1"><?php if(($getdata2->saraban_number != '') && ($getdata2->withdraw == '1')){ echo $this->Saraban_model->explode_sarabanNumber($getdata2->saraban_number,'0');} else { echo $getdata2->saraban_number; }?></td>
						<td><?php echo $getdata2->subject_document;?></td>
						<td class="center" align="center">	
							
						<?php if($getdata2->withdraw == '0'){ 
								$getdata2->check_doc2 = 1; 
								//$disabled2 = '';
						} ?>	 			
							
							<?php if(($getdata2->check_doc == 0) && ($getdata2->check_doc2 == 3)){ ?>				<span class="text-danger" onClick="show_notapproved('<?php echo $getdata2->notapproved_saraban;?>','สาเหตุที่ไม่ผ่าน')" style="cursor: pointer" title="คลิกดูสาเหตุที่ไม่ผ่าน">
									<i class="entypo-cancel"></i>ไม่ผ่าน
                                </span>
							
							<?php } else if(($getdata2->check_doc == 0) && ($getdata2->check_doc2 == 1)){ ?>		<span class="text-danger" onClick="show_notapproved('<?php echo $getdata2->notapproved_saraban;?>','สาเหตุที่ไม่ผ่าน')" style="cursor: pointer" title="คลิกดูสาเหตุที่ไม่ผ่าน">
									<i class="entypo-cancel"></i>ไม่ผ่าน
                                </span>
							
							<?php } else if(($getdata2->check_doc == 1) && ($getdata2->check_doc2 == 3)){ ?>	
								<span class="text-success">
									<i class="entypo-check"></i>ผ่าน
                                </span>
							
							<?php } else if(($getdata2->check_doc == 1) && ($getdata2->check_doc2 == 1)){ ?>	
								<span class="text-success">
									<i class="entypo-check"></i>ผ่าน
                                </span>
							
							<?php } else if(($getdata2->check_doc == 1) && ($getdata2->check_doc2 == 2)){ ?>	
								<span class="text-success">
									<i class="entypo-check"></i>ผ่าน
                                </span>
							
							<?php } else if(($getdata2->check_doc == 1) && ($getdata2->approve_status == 1)){ ?>
								<span class="text-success">
									<i class="entypo-check"></i>ผ่าน
                                </span>
							
							<?php } else if(($getdata2->check_doc == 2) && ($getdata2->check_doc2 == 3)){ ?>	
								<span class="text-info">
									<i class="entypo-clock"></i>รอตรวจ
								</span>
							
							<?php } else if(($getdata2->check_doc == 2) && ($getdata2->check_doc2 == 1)){ ?>	
								<span class="text-info">
									<i class="entypo-clock"></i>รอตรวจ
								</span>
							
							<?php } else if(($getdata2->check_doc == 3) && ($getdata2->check_doc2 == 3)){ ?>	
								<span class="text-primary">
									<i class="entypo-mail"></i>รอส่ง
								</span>
							
							<?php } else if(($getdata2->check_doc == 3) && ($getdata2->check_doc2 == 1)){ ?>	
								<span class="text-primary">
									<i class="entypo-mail"></i>รอส่ง
								</span>
							
							<?php /*} else if(($getdata2->check_doc2 == 0) && ($getdata2->approve_status == '1')){ ?>					
                                <span class="text-danger" onClick="show_notapproved('<?php echo $getdata2->notapproved_admin;?>','สาเหตุที่ไม่ผ่าน')" style="cursor: pointer" title="คลิกดูสาเหตุที่ไม่ผ่าน">
									<i class="entypo-cancel"></i>ไม่ผ่าน
                                </span>
							
							<?php */ } else if(($getdata2->check_doc2 == 1) && ($getdata2->approve_status == '1')){ //$disabled2 = '' ?>					
								<span class="text-success">
									<i class="entypo-check"></i>ผ่าน
                                </span>
							
							<?php //} else if(($getdata2->check_doc2 == 2) && ($getdata2->approve_status == '1')){ ?>					
								<!--<span class="text-info">
									<i class="entypo-clock"></i>รอตรวจ
								</span>-->
							
							<?php } else if(($getdata2->check_doc2 == 3) && ($getdata2->approve_status == '1')){ ?>					
								<span class="text-primary">
									<i class="entypo-mail"></i>รอส่ง
								</span>
							<?php } ?>						
						</td>
						<!--<td><?php //if($getdata2->check_doc == 0){ echo $getdata2->notapproved_saraban; }?></td>-->
						<td class="center" align="center">							
							
							<?php if(($getdata2->approve_status == '0') && ($getdata2->approve_status2 == '')){ ?>					
								<span class="text-danger" onClick="show_notapproved('<?php echo $getdata2->notapproved_approvers;?>','เหตุผลการไม่อนุมัติ')" style="cursor: pointer" title="คลิกดูเหตุผลการไม่อนุมัติ">
									<i class="entypo-cancel"></i>ไม่อนุมัติ
								</span>
							
							<?php } else if(($getdata2->approve_status == '1') && ($getdata2->approve_status2 == '')){ ?>					
								<span class="text-success">
									<i class="entypo-check"></i>อนุมัติ
								</span>
							
							<?php } else if(($getdata2->approve_status == '1') && ($getdata2->approve_status2 != '')){ ?>					
								<span class="text-success">
									<i class="entypo-check"></i>อนุมัติ
								</span>
							
							<?php } else if(($getdata2->approve_status == '2') && ($getdata2->approve_status2 == '')){ ?>					
								<span class="text-info">
									<i class="entypo-clock"></i>รออนุมัติ
								</span>							
							
							<?php } else if(($getdata2->approve_status2 == '0') && ($getdata2->approve_status != '')){ ?>					
								<span class="text-danger" onClick="show_notapproved('<?php echo $getdata2->notapproved_approvers2;?>','เหตุผลการไม่อนุมัติ')" style="cursor: pointer" title="คลิกดูเหตุผลการไม่อนุมัติ">
									<i class="entypo-cancel"></i>ไม่อนุมัติ
								</span>
							
							<?php } else if(($getdata2->approve_status2 == '1') && ($getdata2->approve_status != '')){ ?>					
								<span class="text-success">
									<i class="entypo-check"></i>อนุมัติ
								</span>
							
							<?php } /*else if(($getdata2->approve_status2 == '2') && ($getdata2->approve_status != '')){ ?>					
								<span class="text-info">
									<i class="entypo-clock"></i>รออนุมัติ
								</span>						
							<?php }*/ ?>						
						</td>
						<td class="center" align="center">
							<?php /*if($getdata2->finishform == '1'){
                                    $getdoc1_id = $this->Inputform_model->getdoc1idsaraban($getdata2->id);
                                    $file = $this->Inputform_model->getdocfile($getdata2->id);
                                                           
                                    foreach ($getdoc1_id->result() AS $getdoc1_id2){}
                                    if($getdata2->for_type=='1'){?>
                                       <button type="button" onclick="window.open('<?php echo base_url(); ?>Printer_controller/Preview_doc/<?php echo $getdoc1_id2->id; ?>')" class="btn btn-info btn-sm btn-icon icon-left"><i class="entypo-eye"></i>รายละเอียด</button>
                                       <a href="<?php echo base_url(); ?>Inputform/travel/<?php echo $getdata2->id;?>"><button type="button" class="btn btn-danger btn-sm "> แก้ไข</button></a>
							
                            <?php } else {?>
							
                                      <button type="button" onclick="window.open('<?php echo base_url(); ?>Printer_controller/Preview_doc_group/<?php echo $getdata2->id;?>')" class="btn btn-info btn-sm "><i class="entypo-eye"></i>รายละเอียด</button>
                                                         
									  <a href="<?php echo base_url(); ?>Inputform/travel/<?php echo $getdata2->id;?>"><button type="button" class="btn btn-danger btn-sm  "> แก้ไข</button></a>
                           <?php } ?>
						   <?php } else { ?>
                                      <a href="<?php echo base_url(); ?>Inputform/travel/<?php echo $getdata2->id;?>"><button type="button" class="btn btn-primary btn-sm btn-icon icon-left" <?php echo $disabled2?> > <i class="entypo-eye"></i>ทำรายงานการเดินทาง</button></a>
                           <?php }*/ ?>
                        </td>
                        <td class="center">
                            <?php /*if(($getdata2->finishform == '1') && ($getdata2->withdraw == '1')){
                                  $file = $this->Inputform_model->getdocfile($getdata2->id);
                                  $numfile = $file->num_rows();
                                  if($numfile>0){
                            ?>
                             <button type="button" onclick="upload('<?php echo $i?>')" class="btn btn-info btn-sm btn-icon icon-left"><i class="entypo-eye"></i>รายละเอียด</button>
                             <div id="modal-upload-saraban<?php echo $i?>" class="modal fade" role="dialog" >
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
												<form enctype="multipart/form-data" id="imgForm" name="imgForm" method="post">
													<div class="row">
														<label class="col-sm-4 text-left" style="line-height: 30px;">เลขสารบรรณ</label>
														<label id="saraban_id" class="col-sm-8 text-left" style="line-height: 30px;"><?php echo $getdata2->saraban_number?></label>
															<div class="clear"></div>                             <div id="showdata">
														<?php $f = 1; if($numfile>0){
     															foreach ($file->result() AS $file2){
 ?>
<label class="col-sm-4 text-left" style="line-height: 30px;"><?php if($f==1){?>ไฟล์หลักฐานการจ่าย<?php }?></label>
<div class="col-md-6">
    <p onclick="window.open('<?php echo base_url();?><?php echo $file2->file_name?>','_blank');" style="color:blue; cursor:pointer"><u><?php echo $file2->file_name?></u></p>
    
</div>
<div class="col-md-2">
    <i class="entypo-trash" aria-hidden="true" style="cursor:pointer" onclick="comfirmDelete('1','<?php echo $file2->file_name?>')"></i>
</div>
<div class="clear"></div>
     <?php $f++;}}?>
</div>												
<label class="col-sm-4 text-left" style="line-height: 30px;">อัพโหลดไฟล์หลักฐานการจ่าย</label>
<div class="col-md-8">
	<input type="file" class="form-control" placeholder="" id="img2" name="img2[]" multiple style="height: 35px;" ><br>
	<input type="hidden" id="outboundid" name="outboundid" value="<?php echo $getdata2->id?>">
	<input type="hidden" id="sarabannumber" name="sarabannumber" value="<?php echo $getdata2->saraban_number?>">
	<input type="hidden" id="doc1_id" name="doc1_id" value="<?php echo $getdoc1_id2->id?>">
</div>	
</form> 
											</div>

											<div class="modal-footer no-margin-top">
								<button type="button" class="btn btn-lg btn-success " onClick="Addimg()" ><i class="ace-icon fa fa-check"></i>บันทึก</button>
												<button class="btn btn-lg btn-danger pull-right" data-dismiss="modal"><i class="ace-icon fa fa-times"></i>ปิด</button>	
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div>
                                  <?php } }*/ ?>                            
                   
                        </td>
						<td class="center" align="center">							
							<?php if($getdata2->approve_status == '' && $getdata2->check_doc == 3){  ?>		
                                                    <?php //if($getdata2->typeData !='2'){?>
								<a href="<?php echo base_url().'Allowance2/detailOutbound/'.$getdata2->withdraw.'/'.$getdata2->for_type.'/'.$getdata2->id?>" class="btn btn-default btn-sm btn-icon icon-left">
                                                    <?php //}else{ ?>
                                                                    <!--<a href="<?php //echo base_url().'Allowance2/detailLocal/'.$getdata2->withdraw.'/'.$getdata2->for_type.'/'.$getdata2->id?>" class="btn btn-default btn-sm btn-icon icon-left">-->
                                                    <?php //} ?>
									<i class="entypo-pencil"></i>แก้ไข
								</a>&nbsp;
                                                                <button class="btn btn-danger btn-sm btn-icon icon-left" onclick="dodelete('<?php echo $getdata2->id;?>')">
									<i class="entypo-cancel"></i>ลบ
								</button> 
							
								<?php } else if($getdata2->check_doc == 0 && ($getdata2->approve_status == 2 || $getdata2->approve_status == '')){ ?>
                                                            <?php //if($getdata2->typeData !='2'){?>
								<a href="<?php echo base_url().'Allowance2/detailOutbound/'.$getdata2->withdraw.'/'.$getdata2->for_type.'/'.$getdata2->id?>" class="btn btn-default btn-sm btn-icon icon-left">
                                                    <?php /*}else{ ?>
                                                                    <a href="<?php echo base_url().'Allowance2/detailLocal/'.$getdata2->withdraw.'/'.$getdata2->for_type.'/'.$getdata2->id?>" class="btn btn-default btn-sm btn-icon icon-left">
                                                    <?php }*/ ?>
									<i class="entypo-pencil"></i>แก้ไข
								</a>						
							
							<?php } else { ?>
								 <?php //if($getdata2->typeData !='2'){?>
								<a href="<?php echo base_url().'Allowance2/detailOutbound/'.$getdata2->withdraw.'/'.$getdata2->for_type.'/'.$getdata2->id?>" class="btn btn-default btn-sm btn-icon icon-left">
                                                    <?php /*}else{?>
                                                                    <a href="<?php echo base_url().'Allowance2/detailLocal/'.$getdata2->withdraw.'/'.$getdata2->for_type.'/'.$getdata2->id?>" class="btn btn-default btn-sm btn-icon icon-left">
                                                    <?php }*/ ?>									
									<i class="entypo-info"></i>รายละเอียด
								</a>
							<?php } ?>							
						</td>
					</tr>
					<?php
				//endforeach ;
			$i++; $disabled2 = 'disabled'; } }
					?>
				
				</tbody>
		</table>
		</div>		
		</div>		
				
				
				
				
				
				
				
				
				
				
				
				

	<!-- Footer -->
	<footer class="main">

		© 2018 <strong>FEM.</strong> Developed by <a href="http://www.me-fi.com" target="_blank">ME-FI dot com</a>

	</footer>
	
	</div>

<span role="status" aria-live="polite" class="select2-hidden-accessible"></span></body></html>