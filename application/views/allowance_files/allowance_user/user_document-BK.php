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
		<table class="table table-bordered datatable table-striped" id="table-1">
	    	<thead>
		        <tr>
		            <th>ลำดับ</th>
		            <th>วันที่ส่งคำขอ</th>
		            <th>เลขที่คำขอ</th>
		            <th>เรื่อง</th>
		            <th>สถานะเอกสาร</th>
		            <th>หมายเหตุเอกสาร</th>
		            <th>สถานะอนุมัติ</th>
                            <th >รายงานการเดินทาง</th>
			    <th>ไฟล์หลักฐานการจ่าย</th>
		            <th>ดำเนินการ</th>
		        </tr>
	    	</thead>
	    	<tbody>		    																		
				<?php $documentNum = $getdata->num_rows(); 
		  			  if($documentNum > 0){	
						  	$i =1;						
							foreach($getdata->result() as $getdata2){
				?>
										
					<tr class="gradeA odd" role="row">
						<td class=""><?php echo $i ;?></td>
						<td><?php echo DateThai($getdata2->date_create);
						//$myDateTime = DateTime::createFromFormat('Y-m-d',$getdata2->date_create);
						//echo $myDateTime->format('d/m/Y');
						?></td>
						<td class="sorting_1"><?php echo $getdata2->saraban_number;?></td>
						<td><?php echo $getdata2->subject_document;?></td>
						<td class="center" align="center">	
							<?php if($getdata2->check_doc == 0){ ?>					
                                                    <span class="text-danger">
									<i class="entypo-cancel"></i>ไม่ผ่าน
                                                                </span>
							
							<?php } else if($getdata2->check_doc == 1){ ?>					
								<span class="text-success">
									<i class="entypo-check"></i>ผ่าน
                                                                </span>
							
							<?php } else if($getdata2->check_doc == 2){ ?>					
								<span class="text-info">
									<i class="entypo-clock"></i>รอตรวจ
								</span>
							
							<?php } else if($getdata2->check_doc == 3){ ?>					
								<span class="text-primary">
									<i class="entypo-mail"></i>รอส่ง
								</span>
							<?php } ?>					
						</td>
						<td><?php 
								/*if($getdata2->approve_status == 1 || $getdata2->approve_status == '0'){
									echo "";
								}else{
									echo $getdata2->remark; 
								}*/
							?>	
						</td>
						<td class="center" align="center">
							<?php if($getdata2->approve_status == '0' ){ ?>					
								<span class="text-danger">
									<i class="entypo-cancel"></i>ไม่อนุมัติ
								</span>
							
							<?php } else if($getdata2->approve_status == 1){ ?>					
								<span class="text-success">
									<i class="entypo-check"></i>อนุมัติ
								</span>
							
							<?php } else if($getdata2->approve_status == 2){ ?>					
								<span class="text-info">
									<i class="entypo-clock"></i>รออนุมัติ
								</span>
							
							<?php }else if($getdata2->approve_status == ''){ echo ''; }?>						
						</td>
						<td class="center" align="center">
							<?php if($getdata2->finishform == '1'){
                                                            $getdoc1_id = $this->Inputform_model->getdoc1idsaraban($getdata2->id);
                                                             $file = $this->Inputform_model->getdocfile($getdata2->id);
                                                           
                                                            foreach ($getdoc1_id->result() AS $getdoc1_id2){}
                                                     if($getdata2->for_type=='1'){?>
                                                                        <button type="button" onclick="window.open('<?php echo base_url(); ?>Printer_controller/Preview_doc/<?php echo $getdoc1_id2->id; ?>')" class="btn btn-info btn-sm btn-icon icon-left"> 
                                                                                
										<i class="entypo-eye"></i>
										รายละเอียด
									</button>
                                                     <a href="<?php echo base_url(); ?>Inputform/travel/<?php echo $getdata2->id;?>"><button type="button"  class="btn btn-danger btn-sm "> แก้ไข</button></a>
                                                     <?php }else{?>
                                                          <button type="button" onclick="window.open('<?php echo base_url(); ?>Printer_controller/Preview_doc_group/<?php echo $getdata2->id;?>')" class="btn btn-info btn-sm "> 
                                                                                
										<i class="entypo-eye"></i>
										รายละเอียด
									</button>
                                                         <a href="<?php echo base_url(); ?>Inputform/travel/<?php echo $getdata2->id;?>"><button type="button"  class="btn btn-danger btn-sm  "> แก้ไข</button></a>
                                                 <?php    }?>
							<?php }else{ ?>
                                                    <a href="<?php echo base_url(); ?>Inputform/travel/<?php echo $getdata2->id;?>"><button type="button"  class="btn btn-primary btn-sm btn-icon icon-left"> <i class="entypo-eye"></i>ทำหลักฐานการเดินทาง</button></a>
                                                        <?php }?>
                        </td>
                        <td class="center">
                            <?php if($getdata2->finishform == '1'){
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
												<form enctype="multipart/form-data" id="imgForm<?php echo $i?>" name="imgForm" method="post">
													<div class="row">
														<label class="col-sm-4 text-left" style="line-height: 30px;">เลขสารบรรณ</label>
														<label id="saraban_id" class="col-sm-8 text-left" style="line-height: 30px;"><?php echo $getdata2->saraban_number?></label>
															<div class="clear"></div>
                                                                                                                        <div id="showdata<?php echo $i?>">
 <?php $f = 1;

 if($numfile>0){
     foreach ($file->result() AS $file2){
 ?>
<label class="col-sm-4 text-left" style="line-height: 30px;"><?php if($f==1){?>ไฟล์หลักฐานการจ่าย<?php }?></label>
<div class="col-md-6">
    <p onclick="window.open('<?php echo base_url();?><?php echo $file2->file_name?>','_blank');" style="color:blue; cursor:pointer"><u><?php echo $file2->file_name?></u></p>
    
</div>
<div class="col-md-2">
    <i class="entypo-trash" aria-hidden="true" style="cursor:pointer" onclick="comfirmDelete('<?php echo $getdata2->id?>','<?php echo $file2->file_name?>','<?php echo $i?>')"></i>
</div>
<div class="clear"></div>
     <?php $f++;}}?>
</div>												
<label class="col-sm-4 text-left" style="line-height: 30px;">อัพโหลดไฟล์หลักฐานการจ่าย</label>
															<div class="col-md-8">
																<input type="file" class="form-control" placeholder="" id="img2<?php echo $i?>" name="img2[]" multiple style="height: 35px;" ><br>
                                                                                                                                <p style="color:red">(รับรองไฟล์นามสกุล .jpg .png .jpeg .pdf และขนาดไฟล์ไม่ควรมีขนาดเกิน 2 MB)</p>
                                                                                                                                <input type="hidden"  name="outboundid" value="<?php echo $getdata2->id?>">
                                                                                                                                <input type="hidden"  name="sarabannumber" value="<?php echo $getdata2->saraban_number?>">
                                                                                                                                <input type="hidden"  name="doc1_id" value="<?php echo $getdoc1_id2->id?>">

                                                     		</div>	
												
											</div>
                                                                                                    </form> 

											<div class="modal-footer no-margin-top">
								<button type="button" class="btn btn-lg btn-success " onClick="Addimg('<?php echo $i?>')" ><i class="ace-icon fa fa-check"></i>บันทึก</button>
												<button class="btn btn-lg btn-danger pull-right" data-dismiss="modal"><i class="ace-icon fa fa-times"></i>ปิด</button>	
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div>
                                  <?php }}?>
                            
                   
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
									<i class="entypo-info"></i>
									รายละเอียด
								</a>
							<?php } ?>							
						</td>
					</tr>

					<?php 
				//endforeach ;
			$i++;  } }
					?>
				
				</tbody>
		</table>

	<!-- Footer -->
	<footer class="main">

		© 2018 <strong>FEM.</strong> Developed by <a href="http://www.me-fi.com" target="_blank">ME-FI dot com</a>

	</footer>
	
	</div>

</div><span role="status" aria-live="polite" class="select2-hidden-accessible"></span></body></html>