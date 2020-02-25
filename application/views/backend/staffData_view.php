<!-- DataTables -->
        <link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/datatables/buttons.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/jquery-toastr/jquery.toast.min.css')?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css')?>" rel="stylesheet" />
           <div class="wrapper">
            <div class="container-fluid">	
			<?php $category_id = $this->uri->segment(3);				  
				  $category_name = $this->staff_model->get_categoryName($category_id);
			  	  foreach($category_name->result() as $category_name2){}
			?>	

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                           <h4 class="page-title">ข้อมูลบุคลากรหมวด <?php echo $category_name2->name_th?> 
							<div class="pull-right">                            	
                             	<button type="button" class="btn btn-primary btn-sm" onClick="window.location.href='<?php echo base_url('Control/staffData')?>'"><i class="icon-action-undo"></i> กลับ</button>
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
											   <th>ชื่อ - นามสกุล</th>
											   <th>ตำแหน่ง</th>
											   <th>อีเมล์</th>
											   <th>เบอร์โทรศัพท์</th>						  
											   <th>เรียงลำดับ</th>							  
											   <th width="5" style="text-align: center">แก้ไข</th>		
											   <th width="5" style="text-align: center">ลบ</th>	   
											</tr>
											</thead>
											<tbody>	
											<?php $n=1;	foreach($staffData->result() as $staffData2){ ?>
											<tr>
											   <td style="text-align: center"><?php echo $n?></td>
											   <td><?php echo $staffData2->name_th?></td>
											   <td><?php echo $staffData2->position_th?></td>
											   <td><?php echo $staffData2->email?></td>
											   <td><?php echo $staffData2->telephone?></td>	
											   <td><input type="number" id="sort_number<?php echo $staffData2->id?>" name="sort_number<?php echo $staffData2->id?>" style="text-align: center" class="form-control form-control-sm" onChange="sort_number('<?php echo $staffData2->id?>' , this.value , 'tbl_staff_data')" value="<?php echo $staffData2->sort_number;?>" >
											   </td>										
											   <td><button type="button" class="btn btn-success btn-sm" onClick="window.location.href ='<?php echo base_url('control/staffAdd/').$staffData2->id?>'" >แก้ไข</button></td>
           									   <td><button type="button" class="btn btn-danger btn-sm" onClick="delete_data('<?php echo $staffData2->id?>' , 'tbl_staff_data')">ลบ</button></td>
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