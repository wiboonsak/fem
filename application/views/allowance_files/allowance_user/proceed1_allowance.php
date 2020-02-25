	
	<div class="main-content">
			
	
		<h2 style="text-align: center; padding-top: 20px;">รายการคำขอเบิกค่าเดินทาง</h2>
		<br>
		<br>
		<table class="table table-bordered datatable table-striped" id="table-1">
	    	<thead>
		        <tr>
		            <th>ลำดับ</th>
		            <th>วันที่ส่งคำขอ</th>
		            <th>เลขที่คำขอ</th>
		            <th>เรื่อง</th>
		            <th>สถานะเอกสาร</th>
		            <th>หมายเหตุเอกสาร</th>
		            <th>สถานะอนุมัติ</th>
		            <th>รายงานการเดินทาง</th>
		            <th>ดำเนินการ</th>
		        </tr>
	    	</thead>
	    	<tbody>		
	    																		
				<?php 
				if (is_array($getdata) || is_object($getdata))
				{
						$i = 0;
					foreach ($getdata as $getdata): 
						$i = $i+1;
						?>
										
					<tr class="gradeA odd" role="row">
						<td class=""><?php echo $i ;?></td>
						<td><?php 
						$myDateTime = DateTime::createFromFormat('Y-m-d',$getdata['date_add']);
						echo $formattedweddingdate = $myDateTime->format('d/m/Y');
						?></td>
						<td class="sorting_1">มอ.820/<?php echo $getdata['id_saraban']; ?></td>
						<td><?php echo $getdata['topic']; ?></td>
						<td class="center">	
							<?php if($getdata['check_doc'] == 0){
							?>					
								<a href="#" class="btn btn-red btn-sm btn-icon icon-left">
									<i class="entypo-cancel"></i>
									ไม่ผ่าน
								</a>
							<?php	
							}else if($getdata['check_doc'] == 1){
							?>					
								<a href="#" class="btn btn-green btn-sm btn-icon icon-left">
									<i class="entypo-check"></i>
									ผ่าน
								</a>
							<?php	
							}else if($getdata['check_doc'] == 2){
							?>					
								<a href="#" class="btn btn-blue btn-sm btn-icon icon-left">
									<i class="entypo-search"></i>
									รอตรวจ
								</a>
							<?php	
							}else if($getdata['check_doc'] == 3){
							?>					
								<a href="#" class="btn btn-primary  btn-sm btn-icon icon-left">
									<i class="entypo-mail"></i>
									รอส่ง
								</a>
							<?php	
							}
							?>					
						</td>
						<td>
							<?php 
								if($getdata['approve_status'] == 1 || $getdata['approve_status'] == '0'){
									echo "";
								}else{
									echo $getdata['remark']; 
								}
							?>	
						</td>
						<td class="center">	


							<?php 
						if($getdata['check_doc'] == 3){

						}else{
							if($getdata['approve_status'] == '0' ){
							?>					
								<a href="#" class="btn btn-red btn-sm btn-icon icon-left">
									<i class="entypo-cancel"></i>
									ไม่อนุมัติ
								</a>
							<?php	
							}else if($getdata['approve_status'] == 1){
							?>					
								<a href="#" class="btn btn-green btn-sm btn-icon icon-left">
									<i class="entypo-check"></i>
									อนุมัติ
								</a>
							<?php	
							}else if($getdata['approve_status'] == 2){
							?>					
								<a href="#" class="btn btn-blue btn-sm btn-icon icon-left">
									<i class="entypo-clock"></i>
									รออนุมัติ
								</a>
							<?php	
							}else if($getdata['approve_status'] == null){
							?>		
							<?php	
							}
						}
							?>
						</td>
						<td class="center">
							<?php if($getdata['finishform'] == '1'){ ?>
									<button type="button" onclick="window.open('<?php echo base_url(); ?>Printer_controller/Preview_doc/<?php echo $getdata['id_saraban']; ?>')" class="btn btn-info btn-sm btn-icon icon-left"> 
										<i class="entypo-eye"></i>
										รายละเอียด
									</button>
							<?php } ?>
                        </td>
						<td class="center">
							
							<?php if($getdata['approve_status'] == null && $getdata['check_doc'] == 3){
							?>					
								<a href="edit1_allowance?id_allowance=<?php echo $getdata['id_allowance']; ?>" class="btn btn-default btn-sm btn-icon icon-left">
									<i class="entypo-pencil"></i>
									แก้ไข
								</a>
								<button class="btn btn-danger btn-sm btn-icon icon-left" onclick="dodelete('<?php echo $getdata['id_allowance']; ?>')">
									<i class="entypo-cancel"></i>
									ลบ
								</button> 
							<?php	
							}else if($getdata['check_doc'] == 0 &&( $getdata['approve_status'] == 2 || $getdata['approve_status'] == null)){
							?>
								<a href="edit1_allowance?id_allowance=<?php echo $getdata['id_allowance']; ?>" class="btn btn-default btn-sm btn-icon icon-left">
									<i class="entypo-pencil"></i>
									แก้ไข
								</a>
							<?php
							}else{
							?>
								<a href="<?php echo base_url() ?>Allowance/view1_allowance?id_allowance=<?php echo $getdata['id_allowance']; ?>" class="btn btn-info btn-sm btn-icon icon-left">
									<i class="entypo-info"></i>
									รายละเอียด
								</a>
							<?php
							}
							?>
							
						</td>
					</tr>

					<?php 
				endforeach ;
			}
					?>
				
				</tbody>
		</table>


	<!-- Footer -->
	<footer class="main">

		© 2018 <strong>FEM.</strong> Developed by <a href="http://www.me-fi.com" target="_blank">ME-FI dot com</a>

	</footer>
	
	</div>




</div><span role="status" aria-live="polite" class="select2-hidden-accessible"></span></body></html>