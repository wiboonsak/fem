
	<div class="main-content">
			
	
		<h2 style="text-align: center; padding-top: 20px;">แก้ไขข้อมูลส่วนตัว</h2>
		<br />
		<br />
		
		<div class="row">
			<div class="" style="margin: 0 auto; width: 70%">
				
				<div class="panel panel-gradient" data-collapsed="0">
				
					<div class="panel-heading">
						<div class="panel-heading" style="font-size: 12pt !important">
							แก้ไขข้อมูลส่วนตัว 
						</div>
						
					</div>
					
					<div class="panel-body">
								
					  <form role="form" class="form-horizontal form-groups-bordered" enctype="multipart/form-data" id="frm1" name="frm1">

					  	<script type="text/javascript">
					  		var infor = [];	
					  	</script>

						<?php 
                                               
                                                foreach ($getdata as $getdata): ?>

						<script type="text/javascript">
							var dataObj = {
											user_name		: "<?php echo $getdata ->user_name;?>",
											email 			: "<?php echo $getdata ->email;?>",
											titlename		: "<?php echo $getdata ->titlename;?>",
											firstname 		: "<?php echo $getdata ->firstname;?>",
											lastname    	: "<?php echo $getdata ->lastname;?>",
											telephone    	: "<?php echo $getdata ->telephone;?>",
											position_level 	: "<?php echo $getdata ->position_level;?>",
											position_name 	: "<?php echo $getdata ->position_name;?>"
											}                
							infor.push(dataObj);
						</script>		

						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Username *</label>
							<div class="col-sm-5">
                                                                <input type="text" class="form-control" onchange="chk_username()" name="user_name" id="user_name" placeholder="Username" data-mask="[a-zA-Z0-9\.]+" data-is-regex="true" autocomplete="off"  value="<?php echo $getdata ->user_name;?>" onkeyup="	$('#fuser_name_error').html('').css('color', 'red');" readonly/>
<!--								<span id='user_name_error'></span>-->
							</div>
						</div>
                                                  <div class="form-group">
                                <label for="Password" class="col-sm-3 control-label">รหัสผ่านเดิม *</label>
                                <div class="col-sm-5">
                                    <input type="password" id="confirmPassword" name="confirmPassword" class="form-control form-control-sm" onchange="checkpass(this.value,'<?php echo $getdata->user_name;?>')"> 
                                </div>
                            </div>
                                                 <div class="form-group">
                                <label for="Password" class="col-sm-3 control-label">รหัสผ่าน *</label>
                                <div class="col-sm-5">
                                     <input type="password" id="Password" name="Password" class="form-control form-control-sm" readonly> 
                                     <input type="hidden" id="password_old" name="password_old" value="<?php echo $getdata->password;?>" >
                                </div>
                            </div>
                         <div class="form-group">
                                <label for="Repeat" class="col-sm-3 control-label">ยืนยันรหัสผ่าน *</label>
                                <div class="col-sm-5">
                                    <input type="password" id="Repeat" name="Repeat" class="form-control form-control-sm" onchange="chpass(this.value)" readonly> 
                                     <input type="hidden" id="Repeat_old" name="Repeat_old" value="<?php echo $getdata->password;?>">
                                </div>
                            </div>
                                                <div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">e-mail *</label>
                                                        <div  id="email_a" class="col-sm-5">
                                                            <input type="text" id="email" name="email" value="<?php  echo $getdata->email;?>" class="form-control form-control-sm" readonly><br>
<!--                                                            <input id="email" name="email[]" type="text" class="form-control form-control-sm email3" value="<?php //echo $getdata->email;?>" onchange="validateEmail2(this.value,'email')" placeholder="E-mail" autocomplete="off" value="<?php //echo $getdata ->email;?>"  onkeyup="$('#email_error').html('').css('color', 'red');">  -->
<!--                                                            <input id="email" name="email[]" type="hidden" class="form-control form-control-sm email3"  onchange="validateEmail2(this.value,'email')" placeholder="E-mail"  onkeyup="$('#email_error').html('').css('color', 'red');">  -->
<!--                        <span id='email_error'></span>-->
                                                             <a href="#" id="bt1"class="btn btn-primary btn-sm" onclick="ADDemail()">เพิ่มช่องสำหรับระบุอีเมล์</a>
                                                             <br>
                    </div>
                                                        <input type="hidden" id="idemail" name="idemail" value="<?php echo $getdata->id?>">
<!--                    <div class="col-2">
                                                       
                                                    </div>-->
                                                     
						</div>
						 <div class="form-group ">
                                                      <?php
                                                    $currentID = $getdata->id;
                                                    if ($currentID != '') { 
                                                      $email = $this->Saraban_model->list_email($currentID);
                                                      foreach ($email->result() AS $email2){?>
                                                     <div class="form-group"> 
                                                     <label class="col-sm-3"></label>
                                                     </div>
                                                     <div class="col-sm-1">
                                                        <a href="#" id="bt2"class="btn btn-danger btn-sm entypo-cancel" onclick="deleteemail('<?php echo $email2->id ?>', 'tbl_user_email')"></a>
                                                         
                                                    </div>
                                                     <div class="col-sm-3">
                                                         <input type="checkbox" class="chdefaultclass" id="chdefault<?php echo $email2->id ?>" name="chdefault" value="1" onclick="setDefault(this.checked,'chdefault<?php echo $email2->id ?>','<?php echo $email2->id ?>')" <?php if($email2->data_status == 1){echo 'checked';}?>> <label>Set Default</label>
                                                     </div>
<!--                                                     <br><br>-->
                                                    <?php  } } ?> 
                        </div>
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">คำนำหน้า - ชื่อ - นามสกุล *</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" name="titlename" id="titlename" placeholder="titlename" autocomplete="off" value="<?php echo $getdata ->titlename;?>"  onkeyup="	$('#titlename_error').html('').css('color', 'red');" readonly/>
								<span id='titlename_error'></span>
							</div>
							<div class="col-sm-3">
								<input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" autocomplete="off" value="<?php echo $getdata ->firstname;?>"  onkeyup="	$('#firstname_error').html('').css('color', 'red');" readonly/>
								<span id='firstname_error'></span>
							</div>
							<div class="col-sm-3">
								<input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" autocomplete="off" value="<?php echo $getdata ->lastname;?>"  onkeyup="	$('#lastname_error').html('').css('color', 'red');" readonly/>
								<span id='lastname_error'></span>
							</div>
						</div>
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">โทร</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" name="telephone" id="telephone" placeholder="Phone Number" data-mask="phone" autocomplete="off" value="<?php echo $getdata ->telephone;?>"   onkeyup="	$('#telephone_error').html('').css('color', 'red');"/>
								<span id='telephone_error'></span>
							</div>
						</div>
                                                <div class="form-group">
                                <label for="career" class="col-sm-3 control-label">ประเภท *</label>
                                <div class="col-sm-5">
									<input type="hidden" value="<?php if($currentID != '0'){ echo $getdata->workgroupID; }?>" id="workgroup" name="workgroup" >
                                    <select class="form-control form-control-sm" disabled>
										<option value="0">---เลือกอาชีพ---</option>
										<?php
                                                                                foreach ($workgroupDATA->result() AS $workgroup){ ?>
										<option value="<?php echo $workgroup->id?>" <?php
                                                                
                                                                    if(($getdata->workgroupID == $workgroup->id) && ($currentID != '0')){
                                                                        echo 'selected';
                                                                    } ?> >
    <?php echo $workgroup->workgroup ?>
                                                                </option>
                                                    <?php } ?>	
									</select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="career" class="col-sm-3 control-label">สถานภาพ *</label>
                                <div class="col-sm-5">
									<input type="hidden" value="<?php if($currentID != '0'){ echo $getdata->career_id; }?>" id="career" name="career" >
                                    <select class="form-control form-control-sm" disabled >
										<option value="0">---เลือกอาชีพ---</option>
										<?php
                                                                                foreach ($careerData->result() AS $category){ ?>
										<option value="<?php echo $category->id?>" <?php
                                                                
                                                                    if(($getdata->career_id == $category->id) && ($currentID != '0')){
                                                                        echo 'selected';
                                                                    }
                                                                
                                                                ?> >
    <?php echo $category->career ?>
                                                                </option>
                                                    <?php } ?>	
									</select>
                                </div>
                            </div>
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">ตำแหน่ง *</label>
							<div class="col-sm-5">
                                                            <input type="hidden" value="<?php if($currentID != '0'){ echo $getdata->position_id; }?>" id="position" name="position" >
<select   class="form-control form-control-sm" disabled>
										<option value="0">---เลือกตำแหน่ง---</option>
										<?php
                                                                                foreach($posData->result() AS $posData2){ ?>
												<option value="<?php echo $posData2->id?>" <?php
                                                                
                                                                    if(($getdata->position_id == $posData2->id) && ($currentID != '0')){
                                                                        echo 'selected';
                                                                    }
                                                                
                                                                ?> >
    <?php echo $posData2->position ?>
                                                                </option>
                                                    <?php } ?>	
									</select>
							</div>
						</div>
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">ตำแหน่งเลขที่ *</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" name="position_number" id="position_number" placeholder="ตำแหน่งเลขที่"  autocomplete="off" value="<?php echo $getdata ->position_number;?>"  readonly/>
<!--                                                                onkeyup="$('#position_name_error').html('').css('color', 'red');"-->
							</div>
							<span id='position_name_error'></span>
						</div>
						<div class="form-group">
                                <label for="wage" class="col-sm-3 control-label">อัตราค่าจ้าง</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="wage" id="wage" value="<?php if($currentID != ''){ echo number_format($getdata->wage,2); }?>"/>
                                </div>
                            </div>
                                                <input type="hidden" id="id_update" name="id_update" value="<?php echo ($this->session->userdata['logged_in']['id']); ?>">
                                                <input type="hidden" id="chk_authen" name="chk_authen" value="<?php echo ($this->session->userdata['logged_in']['status']); ?>">
                                                <?php endforeach ?>
							<div class="form-group">
								<label class="col-sm-5 control-label">&nbsp;</label>
								<div class="col-sm-5">	
								<span id='alert_error'></span>							 
								 	<p class="bs-example"> 
								 		<button type="button" class="btn btn-green btn-icon" onclick="dosubmit1()">บันทึกข้อมูล<i class="entypo-check"></i> </button> 
<!--								 		<button type="button" class="btn btn-red btn-icon" onclick="doreset()">รีเซ็ท<i class="entypo-arrows-ccw" > </i> </button>-->
									</p>
								</div>
							</div>				
						</form>
					</div>
				</div>
			
			</div>
		</div>
	<!-- Footer -->
	<footer class="main">

		&copy; 2018 <strong>FEM.</strong> Developed by <a href="http://www.me-fi.com" target="_blank">ME-FI dot com</a>

	</footer>
	
	</div>
