<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>allowance/assets/FontTHSarabun/styles.css">
	<div class="main-content">			
	
		<h2 style="text-align: center; padding-top: 20px;">สร้างคำขออนุมัติเดินทาง<?php if($in==''){ ?>ไปต่างประเทศ<?php } ?></h2>
		<br/><br/>
		
		<div class="row">
			<div class="" style="margin: 0 auto; width: 80%">
				
				<div class="panel panel-gradient" data-collapsed="0">
				
					<!--<div class="panel-heading">
						<div class="panel-heading" style="font-size: 12pt !important">
							รายละเอียดคำขออนุมัติเดินทาง
						</div>						
					</div>-->
					
					<div class="panel-body">
								
						<form role="form" class="form-horizontal form-groups-bordered" >					
							
							<div class="form-group">
								<label class="col-sm-3 control-label">สำหรับ</label>
								
								<div class="col-sm-9">
									<div class="radio radio-replace">
                                        <input type="radio" name="for_type[]" value="1" onClick="set_chFor(this.value,'1')" class="unCheck">
										<label>ข้าพเจ้า</label>
									</div><br>
									<div class="radio radio-replace">
                                        <input type="radio" name="for_type[]" value="2" onClick="set_chFor(this.value,'1')" class="unCheck">
										<label>คณะเดินทาง</label>
									</div>
									<!--<span id='radio2_error'></span>-->
									<input type="hidden" id="chFor">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label">เหตุผลการขออนุมัติ</label>
								
								<div class="col-sm-9">
									<div class="radio radio-replace">
                                        <input type="radio" name="reason_request[]" value="1" onClick="set_chFor(this.value,'3')" class="unCheck">
										<label>มีความประสงค์</label>
									</div><br>
									<div class="radio radio-replace">
                                        <input type="radio" name="reason_request[]" value="2" onClick="set_chFor(this.value,'3')" class="unCheck">
										<label>ได้รับมอบหมาย</label>
									</div>
									<!--<span id='radio2_error'></span>-->
									<input type="hidden" id="chReason">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label">ประเภทการเบิก</label>
								
								<div class="col-sm-9">
									<div class="radio radio-replace">
                                        <input type="radio" name="radio1[]" value="0" onClick="set_chFor(this.value,'2')" class="unCheck">
                                        <label>ไม่ขอเบิกค่าใช้จ่าย<?php if($in==''){ ?> (ต่างประเทศ)<?php } ?> จากคณะ</label>
									</div><br>
									<div class="radio radio-replace">
                                        <input type="radio" name="radio1[]" value="1" onClick="set_chFor(this.value,'2')" class="unCheck">
										<label>เบิกค่าใช้จ่าย<?php if($in==''){ ?> (ต่างประเทศ)<?php } ?> จากคณะ</label>
									</div>
									<!--<span id='radio2_error'></span>-->	
									<input type="hidden" id="money">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label">&nbsp;</label>
								<div class="col-sm-9">	
									<span id='alert_error'></span>							 
								 	<p class="bs-example">								 		
                                      <button type="button" class="btn btn-success btn-icon" onClick="<?php if($in==''){?>select_outbound()<?php }else{ ?>select_local()<?php } ?>">ดำเนินการต่อ<i class="entypo-right"></i></button>					 				
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
