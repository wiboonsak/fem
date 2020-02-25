<div class="main-content">
			
	
		<h2 style="text-align: center; padding-top: 20px;">ข้อมูลตำแหน่งและงบประมาณ</h2>
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
						</tr>
					<?php endforeach; ?>
			</tbody>
		</table>
		<br />
		<br />

	<!-- Footer -->
	<footer class="main">

		&copy; 2018 <strong>FEM.</strong> Developed by <a href="http://www.me-fi.com" target="_blank">ME-FI dot com</a>

	</footer>
	
	</div>