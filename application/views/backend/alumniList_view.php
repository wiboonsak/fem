<!-- DataTables -->
        <link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/datatables/buttons.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/jquery-toastr/jquery.toast.min.css')?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css')?>" rel="stylesheet" />
           <div class="wrapper">
            <div class="container-fluid">			

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                           <h4 class="page-title">ข้อมูลศิษย์เก่า (Alumni) 
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
											   <th>รหัสนักศึกษา</th>
											   <th>ชื่อ - นามสกุล</th>										   
											   <th>อีเมล์</th>
											   <th>เบอร์โทรศัพท์</th>
											   <th>วันที่สมัครสมาชิก</th>
											   <!--<th width="5" style="text-align: center">รายละเอียด</th>	-->	
											   <th width="5" style="text-align: center">แก้ไข</th>		
											   <th width="5" style="text-align: center">ลบ</th>	   
											</tr>
											</thead>
											<tbody>	
											<?php $n=1;	foreach($alumniData->result() as $alumniData2){ ?>
											<tr>
											   <td style="text-align: center"><?php echo $n?></td>
											   <td><?php echo $alumniData2->studentID_number?></td>
											   <td><?php echo $alumniData2->name?></td>
											   <td><?php echo $alumniData2->email?></td>
											   <td><?php echo $alumniData2->telephone?></td>
											   <td><?php echo $this->events_model->DateThai($alumniData2->date_add); ?></td>
											   <td><!--<button type="button" class="btn btn-success btn-sm" onClick="window.location.href = '<?php// echo base_url('control/alumniDetail/'.$alumniData2->id)?>';">รายละเอียด</button>-->
											   <button type="button" class="btn btn-success btn-sm" onClick="window.location.href ='<?php echo base_url('control/editAlumni/').$alumniData2->id?>'" >แก้ไข</button>	
											   </td>
           									   <td><button type="button" class="btn btn-danger btn-sm" onClick="delete_data('<?php echo $alumniData2->id?>' , 'tbl_alumni_data')">ลบ</button></td>
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