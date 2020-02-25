
	<div class="main-content">
			
	
		<h2 style="text-align: center; padding-top: 20px;">เปลี่ยนรหัสผ่าน</h2>
		<br />
		<br />
		
		<div class="row">
			<div class="" style="margin: 0 auto; width: 70%">
				
				<div class="panel panel-gradient" data-collapsed="0">
				
					<div class="panel-heading">
						<div class="panel-heading" style="font-size: 12pt !important">
							เปลี่ยนรหัสผ่าน 
						</div>
						
					</div>
					
					<div class="panel-body">
								
						<form role="form" class="form-horizontal form-groups-bordered" >

							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">รหัสผ่านเก่า</label>
								
								<div class="col-sm-5">
									<input type="password" class="form-control" id="old_Pass"  >
									<span id='field-0_error'></span>
								</div>

							</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">รหัสผ่านใหม่</label>
								
								<div class="col-sm-5">
									<input type="password" class="form-control" id="new_pass" >
									<span id='field-1_error'></span>
									
								</div>
								<div class="col-sm-4">
									 <span id="pwdup" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> รหัสผ่านใหม่ต้องไม่ซ้ำกับรหัสปัจจุบัน<br>
								</div>
							</div>

							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">ยืนยันรหัสผ่านใหม่</label>
								
								<div class="col-sm-5">
									<input type="password" class="form-control" id="re_pass" >
									<span id='field-2_error'></span>
								</div>
								<div class="col-sm-4">
									<span id="pwmatch" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> ยืนยันรหัสผ่านต้องตรงกัน<br>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-12 text-center">
									<div class="checkbox checkbox-replace color-blue "> 
										<label class="cb-wrapper">
											<input type="checkbox" id="showpass" onclick="ShowPW()" >
										</label> 
										<label>แสดงรหัสผ่าน</label>
										 </div>				
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-5 control-label">&nbsp;</label>
								<div class="col-sm-5">								 
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
