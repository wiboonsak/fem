<div class="main-content">			
	
		<h2 style="text-align: center; padding-top: 20px;">รายการสมาชิกทั้งหมด</h2>
		<br>
		<br>
		
		<div class="row">
		</div>
		 
		<table class="table table-bordered datatable" id="table-1">
			<thead> 
				<tr>
					<th>ลำดับ</th>
					<th>ชื่อ - นามสกุล</th>
					<th>สถานภาพ</th>
					<th>ตำแหน่ง</th>
					<th>ตำแหน่งเลขที่</th>					 
					<th>โควต้า</th>
					<th>โควต้าคงเหลือ</th>
					<th>ดำเนินการ</th>
				</tr>
			</thead>
			<tbody>
				<script type="text/javascript">
					var  userlist = [];	
				</script>
					<?php $num = 0; foreach($getmember as $getmember) : $num++; 
				
						  $quota = 0; $money = 0; $balance = 0;
						  $checkQuota = $this->Allowance_model->check_quota($getmember['id']);
						  $numQuota = $checkQuota->num_rows();

						  if($numQuota > 0){

							  foreach($checkQuota->result() as $checkQuota2){}
							  $quota = $checkQuota2->quota;
							
							  $money = $this->Allowance_model->calculate_money($getmember['id']);		
							  $balance = $quota - $money;	
						  }
					?>							
						<tr class="odd gradeX">
							<td><?php echo $num; ?></td>  
							<td><?php echo $getmember['firstname']; echo " "; echo $getmember['lastname']; ?></td>
							<td><?php if($getmember['career'] != ''){echo $getmember['career']; }?></td>
							<td><?php if($getmember['position'] != ''){echo $getmember['position']; }?></td>
							<td><?php if($getmember['position_number'] != ''){echo $getmember['position_number']; }?></td>
							<td align="right"><?php echo number_format($quota);?></td>
							<td align="right"><?php echo number_format($balance);?></td>
							<td align="right">
								<a onclick="open_modalQuota('<?php echo $getmember['id']; ?>')" class="btn btn-default btn-sm btn-icon icon-left"><i class="entypo-pencil"></i>โควต้า
								</a>
							</td> 
						</tr>
					<?php endforeach; ?>
			</tbody>
		</table>
		<br>
		<br>

<div id="modalQuota" class="modal fade" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg ">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<span class="white">&times;</span>
					</button> 
					<strong>กำหนดโควต้า</strong>
				</div>
			</div>

			<div class="modal-body">
				<form class="form-horizontal" role="form">
					<div class="row">
						<label class="col-sm-3 text-right"><strong>ชื่อ - สกุล</strong></label>
						<label class="col-sm-9 text-left" id="label_name" style="font-weight: normal;"></label>
						<div class="clear"></div><br>
						
						<label class="col-sm-3 text-right"><strong>สถานภาพ</strong></label>
						<label class="col-sm-9 text-left" id="label_career" style="font-weight: normal;"></label>
						<div class="clear"></div><br>
						
						<label class="col-sm-3 text-right"><strong>ตำแหน่ง</strong></label>
						<label class="col-sm-9 text-left" id="label_position" style="font-weight: normal;">เรียน2</label>
						<div class="clear"></div><br>						
						
						<label for="to_name" class="col-sm-3 text-right"><strong>โควต้า</strong></label>			
						<div class="col-sm-9" style="display: -webkit-box;">
							<input type="number" class="form-control" id="quota" name="quota" style="width: 80%" > &nbsp;&nbsp;<label>บาท</label>
						</div>
						<div class="clear"></div><br>
						
						<input type="hidden" id="userID" >
					</div>	
				</form>
			</div>

			<div class="modal-footer no-margin-top">
				<button type="button" class="btn btn-lg btn-success" onclick="saveQuota()" data-dismiss="modal"><i class="ace-icon fa fa-check"></i>บันทึก
				</button>
				<button class="btn btn-lg btn-danger pull-right" data-dismiss="modal"><i class="ace-icon fa fa-times"></i>ปิด
				</button>				
			</div>
		</div>
	</div>
</div>

	<!-- Footer -->
	<footer class="main">
		&copy; 2018 <strong>FEM.</strong> Developed by <a href="http://www.me-fi.com" target="_blank">ME-FI dot com</a>
	</footer>
	
	</div>