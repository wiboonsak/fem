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
                           <h4 class="page-title">ข้อมูลวีดิโอ (Video)
							<div class="pull-right">                            	
                             	
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
											<?php $n=1;	foreach($videoData->result() as $videoData2){?>
											<tr>
											   <td style="text-align: center"><?php echo $n?></td>
											   <td><?php echo $videoData2->topic_th?></td>					<td><?php echo $this->video_model->DateThai($videoData2->date_add); ?></td>
											   <td align="center"><label>
			   										<input id="ch<?php echo $videoData2->id?>" type="checkbox" class="js-switch js-check-change" onClick="setShow_onWeb('<?php echo $videoData2->id?>' , this.value , 'tbl_linkYoutube_data')" value="<?php echo $videoData2->show_onWeb?>"  <?php if($videoData2->show_onWeb == '1'){  echo 'checked'; } ?> data-plugin="switchery" data-color="#007bff" data-size="small" /></label>
											   </td>
											   <td><button type="button" class="btn btn-success btn-sm" onClick="edit_newsCategory('<?php echo $videoData2->id?>')">แก้ไข</button></td>
           									   <td><button type="button" class="btn btn-danger btn-sm" onClick="delete_data('<?php echo $videoData2->id?>' , 'tbl_linkYoutube_data')">ลบ</button></td>
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