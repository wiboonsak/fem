
<div class="main-content">

    <h2 style="text-align: center; padding-top: 20px;">เพิ่ม/แก้ไข ข้อมูลสมาชิก</h2>
    <br />
    <br />
    <div class="row">
        <div class="" style="margin: 0 auto; width: 70%">

            <div class="panel panel-gradient" data-collapsed="0">

                <div class="panel-heading">
                    <div class="panel-heading" style="font-size: 12pt !important">
                        เพิ่ม/แก้ไข ข้อมูลสมาชิก 
                    </div>
                </div>

                <div class="panel-body">
                <?php if($currentID == 'x'){  $currentID = '';  }                
						if($currentID != ''){
						   foreach ($getuserdata->result() AS $userData2) {}
   						}
				?>
                    <form role="form" class="form-horizontal form-groups-bordered" enctype="multipart/form-data" id="frm1" name="frm1">
                         <div class="form-group">
                                <label for="user_name" class="col-sm-3 control-label">Username *</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" onchange="chk_username(this.value)" name="user_name" id="user_name" placeholder="Username" data-mask="[a-zA-Z0-9\.]+" data-is-regex="true" autocomplete="off"  value="<?php if ($currentID != '') {echo $userData2->user_name;}?>" onkeyup="	$('#fuser_name_error').html('').css('color', 'red');" />
    <!--								<span id='user_name_error'></span>-->
                                </div>
                            </div>
                         <div class="form-group">
                                <label for="Password" class="col-sm-3 control-label">รหัสผ่าน *</label>
                                <div class="col-sm-5">
                                     <input type="password" id="Password" name="Password" class="form-control form-control-sm" > 
                                     <input type="hidden" id="password_old" name="password_old" value="<?php if($currentID !=''){echo $userData2->password;}?>">
                                </div>
                            </div>
                         <div class="form-group">
                                <label for="Repeat" class="col-sm-3 control-label">ยืนยันรหัสผ่าน *</label>
                                <div class="col-sm-5">
                                     <input type="password" id="Repeat" name="Repeat" class="form-control form-control-sm" onchange="chpass(this.value)" > 
                                     <input type="hidden" id="Repeat_old" name="Repeat_old" value="<?php if($currentID !=''){echo $userData2->password;}?>">
                                </div>
                            </div>
                                        <div class="form-group">
                                <label class="col-sm-3 control-label">อีเมล์ *</label>
                                <div   class="col-sm-5">
                                    <input type="text" id="email" name="email" value="<?php if($currentID !=''){ echo $userData2->email; }?>" class="form-control form-control-sm" onchange="checkmail(this.value)">
                                    <input type="hidden" id="idemail" name="idemail" value="<?php if($currentID !=''){ echo $userData2->id; }?>">
                                    
                                </div>
                                
                            </div>
<!--                        <div class="form-group">
                                <label class="col-sm-3 control-label">อีเมล์</label>
                                <div  id="email_a" class="col-sm-5">
                                    <a href="#" id="bt1"class="btn btn-primary btn-sm" onclick="ADDemail()">เพิ่มช่องสำหรับระบุอีเมล์</a>
                                    <br>
                                </div>
                                
                            </div>-->
<!--                        	<div class="form-group">
                                <?php  //if($currentID != ''){
                                       //$email = $this->Saraban_model->list_email($currentID);
                                       //foreach($email->result() AS $email2){?>
                                        <div class="form-group"> 
                                            <label class="col-sm-3"></label>
											<div class="col-sm-5">                                            	
												<input id="inputMail<?php //echo $email2->id ?>" type="text" class="form-control form-control-sm email3" value="<?php //echo $email2->email ?>" disabled>  
                                            </div>
                                            <div class="col-sm-1">
                                                <a href="#" id="bt2"class="btn btn-danger btn-sm entypo-cancel" onclick="deleteemail('<?php //echo $email2->id ?>', 'tbl_user_email','<?php //echo $currentID?>')"></a>
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="checkbox" class="chdefaultclass" id="chdefault<?php //echo $email2->id ?>" name="chdefault" value="1" onclick="setDefault(this.checked, 'chdefault<?php //echo $email2->id ?>', '<?php //echo $email2->id ?>','<?php //echo $currentID?>')" <?php //if($email2->data_status == 1){  echo 'checked'; }?> >
												<label>Set Default</label>
                                            </div></div>
                                                                                             <br><br>
        						<?php //}  } ?> 
                            </div>-->
                         <div class="form-group">
                                <label for="titlename" class="col-sm-3 control-label">คำนำหน้า - ชื่อ - นามสกุล *</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="titlename" id="titlename" placeholder="คำนำหน้า" autocomplete="off" value="<?php if($currentID !=''){echo $userData2->titlename;} ?>"  onkeyup="	$('#titlename_error').html('').css('color', 'red');"/>
                                    <span id='titlename_error'></span>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="ชื่อ" autocomplete="off" value="<?php if($currentID !=''){echo $userData2->firstname;} ?>"  onkeyup="	$('#firstname_error').html('').css('color', 'red');"/>
                                    <span id='firstname_error'></span>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="นามสกุล" autocomplete="off" value="<?php if($currentID !=''){echo $userData2->lastname;} ?>"  onkeyup="	$('#lastname_error').html('').css('color', 'red');"/>
                                    <span id='lastname_error'></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="telephone" class="col-sm-3 control-label">เบอร์โทรศัพท์</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="telephone" id="telephone" placeholder="เบอร์โทรศัพท์" data-mask="phone" autocomplete="off" value="<?php if($currentID !=''){echo $userData2->telephone;} ?>"   onkeyup="	$('#telephone_error').html('').css('color', 'red');"/>
                                    <span id='telephone_error'></span>
                                </div>
                            </div>
                        <div class="form-group">
                                <label for="career" class="col-sm-3 control-label">ประเภท *</label>
                                <div class="col-sm-5">
                                   <select id="workgroup" name="workgroup"  class="form-control form-control-sm" >
										<option value="0">---เลือกอาชีพ---</option>
										<?php
                                                                                foreach ($workgroupDATA->result() AS $workgroup){ ?>
										<option value="<?php echo $workgroup->id ?>" <?php
                                                                if ($currentID == '') {
                                                                    if ($workgroup->id == '') {
                                                                        echo "selected";
                                                                    }
                                                                } else {
                                                                    if ($userData2->workgroupID == $workgroup->id) {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?> >
    <?php echo $workgroup->workgroup ?>
                                                                </option>
                                                    <?php } ?>	
									</select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="career" class="col-sm-3 control-label">สถานภาพ *</label>
                                <div class="col-sm-5">
                                   <select id="career" name="career"  class="form-control form-control-sm" >
										<option value="0">---เลือกอาชีพ---</option>
										<?php
                                                                                foreach ($careerData->result() AS $category){ ?>
										<option value="<?php echo $category->id ?>" <?php
                                                                if ($currentID == '') {
                                                                    if ($category->id == '') {
                                                                        echo "selected";
                                                                    }
                                                                } else {
                                                                    if ($userData2->career_id == $category->id) {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?> >
    <?php echo $category->career ?>
                                                                </option>
                                                    <?php } ?>	
									</select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="position" class="col-sm-3 control-label">ตำแหน่ง *</label>
                                <div class="col-sm-5">
                                   <select id="position" name="position"  class="form-control form-control-sm" >
										<option value="0">---เลือกตำแหน่ง---</option>
										<?php
                                                                                foreach($posData->result() AS $posData2){ ?>
										<option value="<?php echo $posData2->id ?>" <?php
                                                                if ($currentID == '') {
                                                                    if ($posData2->id == '') {
                                                                        echo "selected";
                                                                    }
                                                                } else {
                                                                    if ($userData2->position_id == $posData2->id) {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?> >
    <?php echo $posData2->position ?>
										<?php }?>
									</select>
                                </div>
                            </div>
                         <div class="form-group">
                                <label for="position_number" class="col-sm-3 control-label">ตำแหน่งเลขที่ *</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="position_number" id="position_number"   value="<?php if ($currentID != '') {echo $userData2->position_number;}?>"/>
                                </div>
                            </div>
                         <div class="form-group">
                                <label for="wage" class="col-sm-3 control-label">อัตราค่าจ้าง</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="wage" id="wage" value="<?php if($currentID != ''){ echo $userData2->wage; }?>"/>
                                </div>
                            </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">&nbsp;</label>
                            <div class="col-sm-5">	
                                <span id='alert_error'></span>							 
                                <p class="bs-example"> 
                                    <button type="button" class="btn btn-green btn-icon" onclick="dosubmit1()">บันทึกข้อมูล<i class="entypo-check"></i> </button> 
                                </p>
                            </div>
                        </div>	
                          <input type="hidden" id="id_update" name="id_update" value="<?php echo ($this->session->userdata['logged_in']['id']); ?>">
                          <input type="hidden" id="chk_authen" name="chk_authen" value="<?php echo ($this->session->userdata['logged_in']['status']); ?>">
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
