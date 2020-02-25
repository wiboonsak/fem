<div class="main-content">
			
            <h2 style="text-align: center; padding-top: 20px;">เพิ่ม/แก้ไข ข้อมูลผู้อนุมัติ</h2>
            <br />
            <br />
            
            <div class="row">
                <div class="" style="margin: 0 auto; width: 50%">
                    <div class="panel panel-gradient" data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-heading" style="font-size: 12pt !important">
                                เพิ่มข้อมูลผู้อนุมัติ
                            </div>
                        </div>
				<?php if($dataApprove != '0'){
						foreach($dataApprove->result() as $dataApprove2){}
	
						$positionData = $this->Allowance_model->get_position($dataApprove2->position_id); 
		  				foreach($positionData->result() as $positionData2){ }
				} ?>	
						
                        <div class="panel-body">
                            <form role="form" class="form-horizontal form-groups-bordered">
                                 
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">ชื่อ-นามสกุล</label>         
                                    <div class="col-sm-5">
                                        <select id="selected" style="width: 100%" >
                                            <option value="">----------เลือก----------</option>	
                                            <script type="text/javascript">
                                            var  user = [];
                                            </script>	 			
											<?php foreach ($getdatauser as $getdatauser): 
											
											$position_approve = $this->Allowance_model->get_position($getdatauser['position_id']);
											foreach($position_approve->result() as $position_approve2){}	
											?> 
											<option value="<?php echo $getdatauser['id']; ?>" <?php if(($dataApprove != '0') && ($dataApprove2->id == $getdatauser['id'])){ echo 'selected'; }?> >
											<?php  
											/*if($getdatauser['position_level'] == 3 ){
												echo "คณบดี "; 
											}elseif($getdatauser['position_level'] == 4 ){ 
												echo "รองคณบดี " ;
											} */
											echo $getdatauser['titlename']; 
											echo " "; 
											echo $getdatauser['firstname']; 
											echo " ";  
											echo $getdatauser['lastname'];  ?>
                                            </option>
                                            <script type="text/javascript">
                                                var dataObj = { 
                                                    id	:"<?php echo $getdatauser['id']; ?>",
                                                    plevel	:"<?php echo $position_approve2->position?>",
                                                    mail	:"<?php echo $getdatauser['email']; ?>",
                                                    position_manage	:"<?php echo $getdatauser['position_manage']; ?>",
                                                    act_for_else :"<?php echo $getdatauser['act_for_else']; ?>"
                                                }                 
                                                user.push(dataObj); 
                                            </script>			
										    <?php endforeach ?>
									    </select>			
                                    </div>                                   			
                                </div>
                                
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">ตำแหน่ง</label>            
                                    <div class="col-sm-5">
                                        <input readonly type="text" class="form-control" id="position" placeholder="ตำแหน่ง" value="<?php if($dataApprove != '0'){ echo $positionData2->position; }?>">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">อีเมล์</label>               
                                    <div class="col-sm-5">
                                        <input readonly type="email" class="form-control" id="email" placeholder="อีเมล์" value="<?php if($dataApprove != '0'){ echo $dataApprove2->email; }?>">
                                    </div>
                                </div> 
								
								<div class="form-group">
									<label for="field-1" class="col-sm-3 control-label">ตำแหน่งบริหาร</label>
									<div class="col-sm-5">
										<select id="position_manage" name="position_manage"  class="form-control">
											<option value="">----------เลือก----------</option>					
											<option value="1" <?php if(($dataApprove != '0') && ($dataApprove2->position_manage == '1')){ echo 'selected'; }?> >รองคณบดีฝ่ายวิจัย</option>	
											<option value="2" <?php if(($dataApprove != '0') && ($dataApprove2->position_manage == '2')){ echo 'selected'; }?> >รองคณบดีฝ่ายวางแผนและการเงิน</option>	
											<option value="3" <?php if(($dataApprove != '0') && ($dataApprove2->position_manage == '3')){ echo 'selected'; }?> >รองคณบดีฝ่ายสื่อสารองค์กร</option>	
											<option value="4" <?php if(($dataApprove != '0') && ($dataApprove2->position_manage == '4')){ echo 'selected'; }?> >หัวหน้าสาขาวิชาการจัดการสิ่งแวดล้อม</option>	
										</select>
										<span id="position_manage_error"></span>
									</div>
								</div>
								
								<div class="form-group">
									<label for="field-1" class="col-sm-3 control-label">ผู้มีอำนาจอนุมัติ</label>
									<div class="col-sm-5">
										<select id="act_for_else" name="act_for_else"  class="form-control">
											<option value="">----------เลือก----------</option>					
											<option value="1" <?php if(($dataApprove != '0') && ($dataApprove2->act_for_else == '1')){ echo 'selected'; }?> >รักษาการแทน</option>
											<option value="2" <?php if(($dataApprove != '0') && ($dataApprove2->act_for_else == '2')){ echo 'selected'; }?> >ปฏิบัติการแทน</option>		
										</select>
										<span id="act_for_else_error"></span>
									</div>
								</div>								
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">&nbsp;</label>
                                    <div class="col-sm-5">								 
                                         <p class="bs-example"> 
                                             <button onclick="add_approvers()" type="button" class="btn btn-green btn-icon">บันทึกข้อมูล<i class="entypo-check"></i> </button> 
                                             <button type="button" onClick="doreset()" class="btn btn-red btn-icon">รีเซ็ท<i class="entypo-arrows-ccw"></i> </button> 
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>            
            
            <br>     
    
        <!-- Footer -->
        <footer class="main">
    
            &copy; 2018 <strong>FEM.</strong> Developed by <a href="http://www.me-fi.com" target="_blank">ME-FI dot com</a>
    
        </footer>
        
        </div>