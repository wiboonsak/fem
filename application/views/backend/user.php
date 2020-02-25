<!-- DataTables -->
        <link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/datatables/buttons.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/jquery-toastr/jquery.toast.min.css')?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/plugins/switchery/switchery.min.css')?>" rel="stylesheet" />
           <div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                           <h4 class="page-title">ข้อมูลผู้ใช้งาน
							   <div class="pull-right">
                           		<button type="button" class="btn btn-primary btn-sm" onClick="window.location.href='<?php echo base_url('Control/addUser')?>'">เพิ่มข้อมูลผู้ใช้งาน</button>
                           		</div>
                           </h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                <div class="row">
                    <div class="col-12">
                        <div class="card-box">                             
                            <div id="showData"></div>
                            
                            <!-- end row -->
                        </div>
                    </div>
                </div>
                <!-- end row -->


            </div> <!-- end container -->
        </div>


<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">แก้ไขข้อมูลผู้ใช้งาน</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form id="UpEmForm" name="UpEmForm" class="form-horizontal" role="form">
		<div class="form-group row">
			<label class="col-3 col-form-label">ชื่อ-นามสกุล</label>
			<div class="col-9">
				<input type="text" id="name_sname" name="name_sname" class="form-control" value="อรดี  ธรรมคุณ">
			</div>
		 </div>
		 <div class="form-group row">
			<label class="col-3 col-form-label">username</label>
			<div class="col-9">
				<input type="text" id="user_name" name="user_name" class="form-control" value="admin">
			</div>
		 </div>
		  <div class="form-group row">
			<label class="col-3 col-form-label">password</label>
			<div class="col-9">
				<input type="text" id="password" name="password" class="form-control">
				<input type="hidden" id="hpass" name="hpassword" value="81dc9bdb52d04dc20036dbd8313ed055">
			</div>
		 </div>
		 <!--<div class="form-group row">
			<label class="col-3 col-form-label">ระดับตำแหน่ง</label>
			<div class="col-9">
				<select class="form-control" id="position_level" name="position_level">
					<option value="x">--เลือกตำแหน่ง--</option>
					<option value="1" selected="">พนักงาน</option>
					<option value="2">ผู้จัดการ</option>
					<option value="3">admin</option>
					<option value="5">ที่ปรึกษาการขาย</option>
					<option value="7">ผู้บริหาร</option>
				</select>
			</div>  
		 </div>-->
		 <div class="form-group row">
			<label class="col-3 col-form-label"></label>
			<div class="col-9">
			  
				<button type="button" class="btn btn-success btn-sm" onclick="UpEmkdata()">แก้ไข</button>
					<small class="text-danger">**หากไม่ต้องการเปลียน password ให้เว้นว่างไว้</small>
				
				<input type="hidden" id="dataID" name="dataID" value="32">
			</div>
		 </div>
		  <div id="showMSG" align="center"></div>
		</form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
                                            <!--<button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>-->
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>



<div id="myModal33" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">กำหนดสิทธิ์ผู้ใช้งาน</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form id="UpEmForm" name="UpEmForm" class="form-horizontal" role="form">
		<div class="form-group row">
			<label class="col-6 col-form-label"><strong>ชื่อเมนู</strong></label>
			<div class="col-3" style="text-align: center;">
				<label><strong>ห้ามเข้า</strong></label>
			</div>
			<div class="col-3" style="text-align: center;">
				<label><strong>แก้ไขข้อมูลได้</strong></label>
			</div>
		 </div>
												
		<div class="form-group row">		
			<label class="col-6 col-form-label">หมวดข่าวสาร<?php //echo $data->menu_name?></label>
			<input name="hiddeID[]" type="hidden" id="hiddeID[]" value="" />
			<div class="col-3" style="text-align: center;">
				
                <input type="radio" class="radio_check" id="menu1_<?php //echo $data->id?>" name="menu<?php //echo $data->id?>[]" value="1"  >
			</div>
			<div class="col-3" style="text-align: center;">
				
                <input type="radio" class="radio_check" id="menu2_<?php //echo $data->id?>" name="menu<?php //echo $data->id?>[]" value="2"   >
			</div>
		 </div>
												
		<div class="form-group row">		
			<label class="col-6 col-form-label">เพิ่มข้อมูลข่าวสาร<?php //echo $data->menu_name?></label>
			<input name="hiddeID[]" type="hidden" id="hiddeID[]" value="" />
			<div class="col-3" style="text-align: center;">
				
                <input type="radio" class="radio_check" id="menu1_<?php //echo $data->id?>" name="menu<?php //echo $data->id?>[]" value="1"  >
			</div>
			<div class="col-3" style="text-align: center;">
				
                <input type="radio" class="radio_check" id="menu2_<?php //echo $data->id?>" name="menu<?php //echo $data->id?>[]" value="2"   >
			</div>
		 </div>
												
		<div class="form-group row">		
			<label class="col-6 col-form-label">เพิ่มข้อมูลผู้บริหาร<?php //echo $data->menu_name?></label>
			<input name="hiddeID[]" type="hidden" id="hiddeID[]" value="" />
			<div class="col-3" style="text-align: center;">
				
                <input type="radio" class="radio_check" id="menu1_<?php //echo $data->id?>" name="menu<?php //echo $data->id?>[]" value="1"  >
			</div>
			<div class="col-3" style="text-align: center;">
				
                <input type="radio" class="radio_check" id="menu2_<?php //echo $data->id?>" name="menu<?php //echo $data->id?>[]" value="2"   >
			</div>
		 </div>										
		
		<div class="form-group row">		
			<label class="col-6 col-form-label">ข้อมูลผู้บริหาร<?php //echo $data->menu_name?></label>
			<input name="hiddeID[]" type="hidden" id="hiddeID[]" value="" />
			<div class="col-3" style="text-align: center;">
				
                <input type="radio" class="radio_check" id="menu1_<?php //echo $data->id?>" name="menu<?php //echo $data->id?>[]" value="1"  >
			</div>
			<div class="col-3" style="text-align: center;">
				
                <input type="radio" class="radio_check" id="menu2_<?php //echo $data->id?>" name="menu<?php //echo $data->id?>[]" value="2"   >
			</div>
		 </div>
												
			<div class="form-group row">		
			<label class="col-6 col-form-label">ข้อมูลศิษย์เก่า<?php //echo $data->menu_name?></label>
			<input name="hiddeID[]" type="hidden" id="hiddeID[]" value="" />
			<div class="col-3" style="text-align: center;">
				
                <input type="radio" class="radio_check" id="menu1_<?php //echo $data->id?>" name="menu<?php //echo $data->id?>[]" value="1"  >
			</div>
			<div class="col-3" style="text-align: center;">
				
                <input type="radio" class="radio_check" id="menu2_<?php //echo $data->id?>" name="menu<?php //echo $data->id?>[]" value="2"   >
			</div>
		 </div>									
				 <input type="hidden" name="countCheck" id="countCheck" value="">
		 
		
		 <br><br>
		 <div class="form-group row">
			<label class="col-3 col-form-label"></label>
			<div class="col-9">
			  
				<button type="button" class="btn btn-success btn-sm" onclick="alert('แก้ไขข้อมูลสำเร็จแล้ว ');$('#modal_Large').modal('hide');">บันทึก</button>					
				
				<input type="hidden" id="dataID" name="dataID" value="32">
			</div>
		 </div>
		  <div id="showMSG" align="center"></div>
		</form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
                                            <!--<button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>-->
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>