<div class="main-content">
			
	
		<h2 style="text-align: center; padding-top: 20px;">แก้ไขข้อมูลสมาชิก</h2>
		<br />
		<br />
		
		<div class="row">
		</div>
		
		<table class="table table-bordered datatable" id="table-1">
			<thead> 
				<tr>
					<th>ลำดับ</th>
					<th>ชื่อ - นามสกุล</th>
					<th>โทรศัพท์</th>
					<th>อีเมล์</th> 
					<th>ดำเนินการ</th>
				</tr>
			</thead>
			<tbody>
				<script type="text/javascript">
					var  userlist = [];	
				</script>
					<?php $num = 0; foreach($getmember as $getmember) : $num++; ?> 
						<script type="text/javascript">
							var dataObj = {
											id			: "<?php echo $getmember['id']; ?>",
											fname 		: "<?php echo $getmember['firstname']; ?>",
											lname 		: "<?php echo $getmember['lastname']; ?>", 
											tel 		: "<?php echo $getmember['telephone']; ?>",
											mail 		: "<?php echo $getmember['email']; ?>",
											plevel 		: "<?php echo $getmember['position_level']; ?>",
											pname 		: "<?php echo $getmember['position_name']; ?>", 
											usrname 	: "<?php echo $getmember['user_name']; ?>", 
											approve 	: "<?php echo $getmember['approve']; ?>"
											}                
							userlist.push(dataObj);
						</script>	
						<tr class="odd gradeX">
							<td><?php echo $num; ?></td> 
							<td><?php echo $getmember['firstname']; echo " "; echo $getmember['lastname']; ?></td>
							<td><?php echo $getmember['telephone']; ?></td>
							<td><?php echo $getmember['email']; ?></td>
							<td class="center">
								<a onclick="editbtn('<?php echo $getmember['id']; ?>')" class="btn btn-default btn-sm btn-icon icon-left">
									<i class="entypo-pencil"></i>
									แก้ไข
								</a>
								
								<a onclick="dosubmit_delect('<?php echo $getmember['id']; ?>')" class="btn btn-danger btn-sm btn-icon icon-left">
									<i class="entypo-cancel"></i>
									ลบ
								</a>

								<a onclick="edituserpass('<?php echo $getmember['id']; ?>')" class="btn btn-orange btn-sm btn-icon icon-left">
									<i class="entypo-key"></i>
									User/Pass
								</a>

							</td> 
						</tr>
					<?php endforeach; ?>
			</tbody>
		</table>
		<br />
		<br />

<div id="modal-Edit" class="modal fade" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg ">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<span class="white">&times;</span>
					</button> 
					แก้ไขข้อมูลสมาชิก
				</div>
			</div>

			<div class="modal-body">
				<!-- PAGE CONTENT BEGINS -->
				<form class="form-horizontal" role="form">
					<div class="row">
							<label for="field-1" class="col-sm-2 text-left">ชื่อนำหน้า</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="0" placeholder="ชื่อนำหน้า">
							</div>

							<div class="clear"></div>
							<br>

							<label for="field-1" class="col-sm-2 text-left">ชื่อ</label>
							<div class="col-md-4">
								<input type="text" class="form-control" id="1" placeholder="ชื่อ">
							</div>
							<label for="field-2" class="col-sm-2 text-left">นามสกุล</label>
							<div class="col-md-4">
								<input type="text" class="form-control" id="2" placeholder="นามสกุล">
							</div>
							<div class="clear"></div>
							<br>

							<label for="field-4" class="col-sm-2 text-left">ตำแหน่ง</label>
							<div class="col-md-4">
								<select id="3" style="width: 100%" >
									<option value="3">คณบดี</option>
									<option value="4">รองคณบดี</option>
									<option value="1">อาจารย์</option> 
									<option value="2">เจ้าหน้าที่</option>
								</select>
							</div>
							<label for="field-5" class="col-sm-2 text-left">สถานะอนุมัติ</label>
							<div class="col-md-4">
								<select disabled readonly id="4" style="width: 100%" >
									<option value="1">มีสิทธิอนุมัติ</option>
									<option value="0">ไม่มีสิทธิอนุมัติ</option>
								</select>
							</div>
							<div class="clear"></div>
							<br>

							<label for="field-4" class="col-sm-2 text-left">เบอร์โทร</label>
							<div class="col-md-4">
								<input type="tel" class="form-control" id="5" placeholder="เบอร์โทร" maxlength="10">
							</div>
							<label for="field-5" class="col-sm-2 text-left">อีเมล์</label>
							<div class="col-md-4">
								<input type="email" class="form-control" id="6" placeholder="อีเมล์">
								<input type="hidden" class="form-control" id="id">
							</div>

					</div>	
				</form>
			</div>

			<div class="modal-footer no-margin-top">
				<button type="button" class="btn btn-lg btn-success" onclick="dosubmit_edit()" data-dismiss="modal">
					<i class="ace-icon fa fa-check"></i>
					บันทึก
				</button>
				<button class="btn btn-lg btn-danger pull-right" data-dismiss="modal">
					<i class="ace-icon fa fa-times"></i>
					ปิด
				</button>
				
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<div id="modal-editP" class="modal fade" role="dialog" >
	<div class="modal-dialog modal-lg ">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<span class="white">&times;</span>
					</button>
					เปลี่ยน username/password
				</div>
			</div>

			<div class="modal-body"> 
			<!-- PAGE CONTENT BEGINS -->
			<form class="form-horizontal" role="form">
			<div class="row">
						
					<label for="field-1" class="col-sm-3 text-left">หมายเลขประจำตัวผู้ใช้</label>	
					<div class="col-md-7" >
						<input type="text" class="form-control" id="idusr" disabled />
					</div>
							
					<div class="clear"></div>
					<br>

					<label for="field-1" class="col-sm-3 text-left">Username</label>	
					<div class="col-md-7" >
						<input type="text" class="form-control" id="usr" placeholder="username"/>
					</div>
					<div class="clear"></div>
					<br>

					<label for="field-1" class="col-sm-3 text-left">New Password</label>	
					<div class="col-md-7" >
						<input type="password" class="form-control" id="NEW_PassWord" placeholder="New Password"/>
					</div>
					<div class="clear"></div>
					<br>

					<label for="field-1" class="col-sm-3 text-left">Confirm Password</label>	
					<div class="col-md-7" >
						<input type="password" class="form-control" id="NEW_confirm_PassWord" placeholder="Confirm Password"/>
					</div>		
				</div>	
			</form>
			</div>
			<div class="modal-footer no-margin-top">
				<button type="buStton" class="btn btn-lg btn-success " onclick="dosubmitCHP()" data-dismiss="modal">
					<i class="ace-icon fa fa-check"></i>
					บันทึก
				</button>
				<button class="btn btn-lg btn-danger pull-right" data-dismiss="modal">
					<i class="ace-icon fa fa-times"></i>
					ปิด
				</button>
				
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

	<!-- Footer -->
	<footer class="main">

		&copy; 2018 <strong>FEM.</strong> Developed by <a href="http://www.me-fi.com" target="_blank">ME-FI dot com</a>

	</footer>
	
	</div>