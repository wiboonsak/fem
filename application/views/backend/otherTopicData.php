<!-- DataTables -->
        <link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/datatables/buttons.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/jquery-toastr/jquery.toast.min.css')?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css')?>" rel="stylesheet" />
		<link href="<?php echo base_url('assets/plugins/switchery/switchery.min.css')?>" rel="stylesheet" />

           <div class="wrapper">
            <div class="container-fluid">			 	

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                           <h4 class="page-title">ข้อมูลหัวข้อเพิ่มเติม
							<div class="pull-right">                            	
                             	<!--<button type="button" class="btn btn-primary btn-sm" onClick="window.location.href='<?php //echo base_url('news/Newsdata')?>'"><i class="icon-action-undo"></i> กลับ</button>-->
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
											   <th>วันที่เพิ่มข้อมูล</th>
											   <th style="text-align: center">กำหนดแสดงหน้าเว็บ</th>
											   <th width="5" style="text-align: center">แก้ไข</th>		
											   <th width="5" style="text-align: center">ลบ</th>	   
											</tr>
											</thead>
											<tbody>	
											<?php $n=1;	foreach($topicData->result() as $topicData2){?>
											<tr>
											   <td style="text-align: center"><?php echo $n?></td>
											   <td><?php echo $topicData2->topic_th?></td>	
											   <td><?php echo $this->events_model->DateThai($topicData2->date_add); ?></td>
											   <td align="center"><label>
			   									<input id="ch<?php echo $topicData2->id?>" type="checkbox" class="js-switch js-check-change" onClick="setShow_onWeb('<?php echo $topicData2->id?>' , this.value , 'tbl_moreInformation')" value="<?php echo $topicData2->show_onWeb?>"  <?php if($topicData2->show_onWeb == '1'){  echo 'checked'; } ?> data-plugin="switchery" data-color="#007bff" data-size="small" /></label>
											   </td>
											   <td><button type="button" class="btn btn-success btn-sm" onClick="window.location.href ='<?php echo base_url('control/AddOtherTopic/').$topicData2->id?>'" >แก้ไข</button></td>
           									   <td><button type="button" class="btn btn-danger btn-sm" onClick="delete_data('<?php echo $topicData2->id?>' , 'tbl_moreInformation')">ลบ</button></td>
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