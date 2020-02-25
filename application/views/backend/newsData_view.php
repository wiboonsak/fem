<!-- DataTables -->
        <link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/datatables/buttons.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/jquery-toastr/jquery.toast.min.css')?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css')?>" rel="stylesheet" />
		<link href="<?php echo base_url('assets/plugins/switchery/switchery.min.css')?>" rel="stylesheet" />

           <div class="wrapper">
            <div class="container-fluid">
			<?php $category_id = $this->uri->segment(3);
			  	  $lang = 'th'; 	
				  $category_name = $this->news_model->get_categoryName($category_id,$lang);
			  	  foreach($category_name->result() as $category_name2){}
			?> 	

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                           <h4 class="page-title">ข้อมูลข่าวสารหมวด <?php echo $category_name2->name_th?> 
							<div class="pull-right">                            	
                             	<button type="button" class="btn btn-primary btn-sm" onClick="window.location.href='<?php echo base_url('Control/Newsdata')?>'"><i class="icon-action-undo"></i> กลับ</button>
                            </div>
						   </h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                             <div class="row">
                                <div class="col-12">
                                    <div class="p-20">
                                    	<div class="card-box table-responsive">	
											<table class="table table-bordered table-hover" id="table2">
											<thead>	
											<tr style="background-color: #f2f2f2"> 
											   <th width="10">ลำดับ</th>
											   <th>หัวข้อ</th>
											   <th>วันที่เริ่มต้น - วันที่สิ้นสุด</th>
											   <th>วันที่เพิ่มข้อมูล</th>
											   <th style="text-align: center">กำหนดแสดงหน้าเว็บ</th>
											   <th width="5" style="text-align: center">แก้ไข</th>		
											   <th width="5" style="text-align: center">ลบ</th>	   
											</tr>
											</thead>
											<tbody>	
											<?php $n=1;	foreach($newsData->result() as $newsData2){ 
												
												  $date_start = ''; 
												  $date_end = ''; 
												  $dateAdd = ''; 
									 
												  if($newsData2->date_start != '0000-00-00'){ 
														$date_start = $this->news_model->DateThai($newsData2->date_start);
												  }

												  if($newsData2->date_end != '0000-00-00'){ 
														$date_end = $this->news_model->DateThai($newsData2->date_end);
												  }
												
												 /* if($newsData2->date_document != ''){ 
														$date_document = $this->news_model->DateThai($pp->date_document);
												  }*/
											?>
											<tr>
											   <td style="text-align: center"><?php echo $n?></td>
											   <td><?php echo $newsData2->topic_th?></td>
											   <td><?php echo $date_start." - ".$date_end;?></td>
											   <td><?php echo $this->news_model->DateThai($newsData2->date_add); ?></td>
											   <td align="center"><label>
													<input id="ch<?php echo $newsData2->id?>" type="checkbox" class="js-switch js-check-change" onClick="setShow_onWeb('<?php echo $newsData2->id?>' , this.value , 'tbl_news_data')" value="<?php echo $newsData2->show_onWeb?>"  <?php if($newsData2->show_onWeb == '1'){  echo 'checked'; } ?> data-plugin="switchery" data-color="#007bff" data-size="small" /></label>	 
											   </td>
											   <td><button type="button" class="btn btn-success btn-sm" onClick="window.location.href ='<?php echo base_url('control/AddNews/').$newsData2->id?>'" >แก้ไข</button></td>
           									   <td><button type="button" class="btn btn-danger btn-sm" onClick="delete_data('<?php echo $newsData2->id?>' , 'tbl_news_data')">ลบ</button></td>
											</tr>
											<?php 	$n++;	} ?>
											</tbody>	
											</table>
										</div>	
                                    </div>
                                </div>

                            </div>
                            
                            <!-- end row -->
                        </div>
                    </div>
                </div>
                <!-- end row -->


            </div> <!-- end container -->
        </div>