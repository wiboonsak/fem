<div class="main-content">
			
	
		<h2 style="text-align: center; padding-top: 20px;">แก้ไขข้อมูลตำแหน่งและงบประมาณ</h2>
		<br />
		<br />
		
		<div class="row">
		</div>
		
		<table class="table table-bordered datatable" id="table-1">
			<thead> 
				<tr>
					<th>ลำดับ</th>
					<th>ตำแหน่ง</th>
					<th>งบประมาณ</th> 
					<th>ดำเนินการ</th>
				</tr>
			</thead>
			<tbody>
				<script type="text/javascript">
					var  userlist = [];	
				</script>
					<?php $num = 0; foreach($getposition as $getposition) : $num++; ?> 
						<script type="text/javascript">
							var dataObj = {
											id			: "<?php echo $getposition['id']; ?>",
											plevel 		: "<?php echo $getposition['position_level']; ?>",
											allow 		: "<?php echo $getposition['allowance']; ?>"
											}                
							userlist.push(dataObj);
						</script>	
						<tr class="odd gradeX">
							<td><?php echo $num; ?></td> 
							<td>
							<?php 
								if($getposition['position_level'] == 3 ){
									echo "คณบดี "; 
								}elseif($getposition['position_level'] == 4 ){ 
									echo "รองคณบดี " ;
								}elseif($getposition['position_level'] == 2 ){ 
									echo "เจ้าหน้าที่ " ;
								}elseif($getposition['position_level'] == 1 ){ 
									echo "อาจารย์ " ;
								} 
							?> 
							</td> 
							<td><?php echo $getposition['allowance']; ?></td>
							<td class="center">
								<a onclick="editbtn('<?php echo $getposition['id']; ?>')" class="btn btn-default btn-sm btn-icon icon-left">
									<i class="entypo-pencil"></i>
									แก้ไข
								</a>
								
								<a onclick="dosubmit_delect('<?php echo $getposition['id']; ?>')" class="btn btn-danger btn-sm btn-icon icon-left">
									<i class="entypo-cancel"></i>
									ลบ
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
					แก้ไขข้อมูลคำแหน่งและงบประมาณ
				</div>
			</div>

			<div class="modal-body">
				<!-- PAGE CONTENT BEGINS -->
				<form class="form-horizontal" role="form">
					<div class="row">
							<label for="field-4" class="col-sm-2 text-left">ตำแหน่ง</label>
							<div class="col-md-4">
								<select disabled id="0" style="width: 100%" >
									<option value="3">คณบดี</option>
									<option value="4">รองคณบดี</option>
									<option value="1">อาจารย์</option> 
									<option value="2">เจ้าหน้าที่</option>
								</select>
							</div>

							<label for="field-5" class="col-sm-2 text-left">งบประมาณ</label>
							<div class="col-md-4"> 
								<input type="text" class="form-control" id="1" placeholder="งบประมาณ">
								<input type="hidden" class="form-control" id="id" placeholder="งบประมาณ">
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

	<!-- Footer -->
	<footer class="main">

		&copy; 2018 <strong>FEM.</strong> Developed by <a href="http://www.me-fi.com" target="_blank">ME-FI dot com</a>

	</footer>
	
	</div>