
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
											firstname 		: "<?php echo $getdata ->firstname;?>",
											lastname    	: "<?php echo $getdata ->lastname;?>"
											}                
							infor.push(dataObj);
						</script>		

						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">Username</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" onchange="chk_username()" name="user_name" id="user_name" placeholder="Username" data-mask="[a-zA-Z0-9\.]+" data-is-regex="true" autocomplete="off"  value="<?php echo $getdata ->user_name;?>" />
								<span id='user_name_error'></span>
							</div>
						</div>
					
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">e-mail</label>
                                                        <div  id="email_a" class="col-sm-5">
                        <input id="email" name="email[]" type="text" class="form-control form-control-sm author3" value="<?php echo $getdata ->email;?>" onchange="chk_email()">  
                        <span id='email_error'></span>
                    </div>
						</div>
								
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">ชื่อ - นามสกุล</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" autocomplete="off" value="<?php echo $getdata ->firstname;?>"/>
								<span id='firstname_error'></span>
							</div>
							<div class="col-sm-3">
								<input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" autocomplete="off" value="<?php echo $getdata ->lastname;?>"/>
								<span id='lastname_error'></span>
							</div>
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
