    <div class="main-content">

		<?php
          //  if(chk==admin){
        ?>
		<!--	
		<h2 style="text-align: center; ">ระบบงานสารบรรณ</h2>
		<br />
		<div class="row">
		
			<div class="col-sm-4 col-xs-8">
		
				<div class="tile-stats tile-aqua">
					<div class="icon"><i class="entypo-upload"></i></div>
					<div class="num" data-start="0" data-end="135" data-postfix="" data-duration="1500" data-delay="0">34</div>
		
					<h3>รายการเลขสารบัญ</h3>
					<p>ระบบงานสารบรรณ FEM.</p>
				</div>
		
			</div>
			
			<div class="clear visible-xs"></div>
		
			<div class="col-sm-4 col-xs-8">
		
				<div class="tile-stats tile-blue">
					<div class="icon"><i class="entypo-users"></i></div>
					<div class="num" data-start="0" data-end="52" data-postfix="" data-duration="1500" data-delay="0">850</div>
		
					<h3>สมาชิกทั้งหมด</h3>
					<p>ระบบงานสารบรรณ FEM.</p>
				</div>
		
            </div>
            
            <div class="col-sm-4 col-xs-8">
		
				<div class="tile-stats tile-red">
					<div class="icon"><i class="entypo-download"></i></div>
					<div class="num" data-start="0" data-end="83" data-postfix="" data-duration="1500" data-delay="0">69</div>
		
					<h3>รายการเลขสารบัญที่ยกเลิก</h3>
					<p>ระบบงานสารบรรณ FEM.</p>
				</div>
		
			</div>

        </div>
        -->
        <?php
        //    }
        ?>
	
		<div class="table-header">
			<h2 style="text-align: center; padding-top: 20px;">ตารางรายการเลขสารบรรณล่าสุด</h2>
		</div>
		
		<table class="table table-bordered datatable table-striped" id="table-1">
			<thead>
				<tr> 
					<th>เลขสารบรรณ</th>
					<th>ผู้ใช้</th>
					<th>วันที่รับเลข</th>
					<th>ชื่อเรื่อง</th>
				</tr>
			</thead>
			<tbody>
				<?php //if(isset($getdata[0]['id_saraban'])): ?>
<!--					<tr class="odd gradeX">
						<td><?php 
							//$nextid = $getdata[0]['id_saraban']+1;
							//echo str_pad((int) $nextid,"4","0",STR_PAD_LEFT);
							?>
						</td> 
						<td></td>
						<td></td>
						<td></td>
					</tr>-->
				<?php //endif; ?>
				<?php foreach($getdata as $getdata) : ?> 
					<tr class="odd gradeX">
						<td><?php echo $getdata['id_saraban'];?> </td>
						<td><?php echo $getdata['firstname']; echo " "; echo $getdata['lastname'];?></td>
						<td><?php echo $this->Saraban_model->GetThaiDateTime($getdata['date_add']);?>
							<?php //$myDateTime = DateTime::createFromFormat('Y-m-d H:i:s',$getdata['date_add']);
						//echo $formattedweddingdate = $myDateTime->format('d/m/Y');?></td>
						<td><?php echo $getdata['topic'];?></td>
						<!--<td class="center">
							<a href="detail.html" class="btn btn-info btn-sm btn-icon icon-left">
								<i class="entypo-info"></i>
								รายละเอียด
							</a>
	
							<a href="detail.html" class="btn btn-default btn-sm btn-icon icon-left">
								<i class="entypo-pencil"></i>
								แก้ไข
							</a>
							
							<a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
								<i class="entypo-cancel"></i>
								ลบ
							</a>
						</td>-->
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		
		<?php //if(chk==user){}?>
		
		<br />

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary" data-collapsed="0">
				
					<div class="panel-heading">
						<div class="panel-title">
							<h3>ขอใช้เลขล่าสุด</h3>
						</div>
					</div>
					
					<div class="panel-body">
						<form id="frm1">
							<div class="row">
								<label for="field-1" class="col-sm-1 control-label">ชื่อ</label>
								<div class="col-md-5">
									<input readonly type="text" class="form-control" id="field-1" value="<?php echo $getname[0]['firstname'];?>">
								</div>

								<label for="field-2" class="col-sm-1 control-label">นามสกุล</label>
								<div class="col-md-5">
									<input readonly type="text" class="form-control" id="field-2" value="<?php echo $getname[0]['lastname'];?>">
								</div>
                                <div class="clear"></div>
								<br>
                                <label class="col-sm-1 control-label"></label>
							    <div class="col-md-5">
                                <input type="hidden" id="inorout" name="inorout">
                                <div class="radio radio-replace recheck" id="divinout">
                                    <input type="radio" name="in_out[]" id="in_out" value="1"  onClick="inout(this.value)">
                                    <label>หนังสือภายใน</label>
                                </div>
                                <br>
                                <div class="radio radio-replace recheck" id="divinout2">
                                    <input type="radio" name="in_out[]" id="in_out1" value="2"  onClick="inout(this.value)">
                                    <label>หนังสือภายนอก</label>
                                </div>
                                <br>
                                <div class="checkbox checkbox-replace recheck " id="divcircular">
                                    <input type="checkbox" name="circular_letter" id="circular_letter" value="0" onClick="circular(this.checked)">
                                    <label>หนังสือเวียน</label>
                                </div>                                           
                                <input type="hidden" id="numbersarabun" name="numbersarabun" placeholder="">
                                <br>
                                </div>
								<div class="clear"></div>
								<br>
								<label for="field-3" class="col-sm-1 control-label">ชื่อเรื่อง</label>
								<div class="col-md-11">
									<input type="text" class="form-control" id="field-3" placeholder="ชื่อเรื่อง">
								</div>
								<div class="clear"></div>
								<br>
								<label for="to_name" class="col-sm-1 control-label">เรียน</label>
								<div class="col-md-11">
									<input type="text" class="form-control" id="to_name" placeholder="เรียน">
								</div>
								<div class="clear"></div>
								<br>
								<label for="from_name" class="col-sm-1 control-label">จาก</label>
								<div class="col-md-11">
									<input type="text" class="form-control" id="from_name" placeholder="จาก">
								</div>
								<div class="clear"></div>
								<br>
								<label for="field-3" class="col-sm-1 control-label"></label>
								<div class="col-sm-5">								 
									<p class="bs-example"> 
										<button type="button" class="btn btn-green btn-icon" onclick="insert_topic()">บันทึกข้อมูล<i class="entypo-check"></i> </button> 
										<button type="button" onClick="reset_input()" class="btn btn-red btn-icon">รีเซ็ท<i class="entypo-arrows-ccw"></i> </button> 
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
