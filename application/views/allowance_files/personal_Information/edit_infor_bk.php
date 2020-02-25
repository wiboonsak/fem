
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
								
					  <form role="form" class="form-horizontal form-groups-bordered" >

					  	<script type="text/javascript">
					  		var infor = [];	
					  	</script>

						<?php foreach ($getdata as $getdata): ?>

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
							<label for="field-1" class="col-sm-3 control-label">Username</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" onchange="chk_username()" name="user_name" id="user_name" placeholder="Username" data-mask="[a-zA-Z0-9\.]+" data-is-regex="true" autocomplete="off"  value="<?php echo $getdata ->user_name;?>" onkeyup="	$('#fuser_name_error').html('').css('color', 'red');" />
								<span id='user_name_error'></span>
							</div>
						</div>
					
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">e-mail</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" onchange="chk_email()" name="email" id="email" data-mask="email" placeholder="E-mail" autocomplete="off" value="<?php echo $getdata ->email;?>"  onkeyup="	$('#email_error').html('').css('color', 'red');" />
								<span id='email_error'></span>
							</div>
						</div>		
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">คำนำหน้า - ชื่อ - นามสกุล</label>
							<div class="col-sm-2">
								<input type="text" class="form-control" name="titlename" id="titlename" placeholder="titlename" autocomplete="off" value="<?php echo $getdata ->titlename;?>"  onkeyup="	$('#titlename_error').html('').css('color', 'red');"/>
								<span id='titlename_error'></span>
							</div>
							<div class="col-sm-3">
								<input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" autocomplete="off" value="<?php echo $getdata ->firstname;?>"  onkeyup="	$('#firstname_error').html('').css('color', 'red');"/>
								<span id='firstname_error'></span>
							</div>
							<div class="col-sm-3">
								<input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" autocomplete="off" value="<?php echo $getdata ->lastname;?>"  onkeyup="	$('#lastname_error').html('').css('color', 'red');"/>
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
							<label for="field-1" class="col-sm-3 control-label">ตำแหน่ง</label>
							<div class="col-sm-5">

								<?php 

								$select1 = "";
								$select2 = "";
								$select3 = "";

								if($getdata ->position_level == "1"){
									$select1 = "selected";
								}else if($getdata ->position_level == "2"){
									$select2 = "selected";
								}else if($getdata ->position_level == "3"){
									$select3 = "selected";
								}

								?>

								<select  type="text" class="form-control" name="position_level" id="position_level" autocomplete="off" style="color: gray" value="<?php echo $getdata ->position_level;?>"  onChange ="	$('#position_level_error').html('').css('color', 'red');">
									<option value="3" <?php echo $select3;?> >คณบดี</option>
									<option value="1" <?php echo $select1;?> >อาจารย์</option>
									<option value="2" <?php echo $select2;?> >เจ้าหน้าที่</option>
								</select>
								<span id='position_level_error'></span>
							</div>
						</div>
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">ชื่อตำแหน่ง</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" name="position_name" id="position_name" placeholder="ชื่อตำแหน่ง"  autocomplete="off" value="<?php echo $getdata ->position_name;?>"  onkeyup="	$('#position_name_error').html('').css('color', 'red');"/>
							</div>
							<span id='position_name_error'></span>
						</div>
						<?php endforeach ?>

							<div class="form-group">
								<label class="col-sm-5 control-label">&nbsp;</label>
								<div class="col-sm-5">	
								<span id='alert_error'></span>							 
								 	<p class="bs-example"> 
								 		<button type="button" class="btn btn-green btn-icon" onclick="dosubmit()">บันทึกข้อมูล<i class="entypo-check"></i> </button> 
								 		<button type="button" class="btn btn-red btn-icon" onclick="doreset()">รีเซ็ท<i class="entypo-arrows-ccw" > </i> </button>
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
