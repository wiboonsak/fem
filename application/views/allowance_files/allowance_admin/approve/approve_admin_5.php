	
	<div class="main-content">
			
<!--	<h2 style="text-align: center; ">ระบบเบิกค่าเดินทาง</h2>

	<br />

		
		<div class="row">
			<div class="col-sm-3 col-xs-6">
		
				<div class="tile-stats tile-red">
					<div class="icon"><i class="entypo-download"></i></div>
					<div class="num" data-start="0" data-end="83" data-postfix="" data-duration="1500" data-delay="0">69</div>
		
					<h3>รายการเอกสารคำขอไม่ถูกต้อง</h3>
					<p>ระบบเบิกค่าเดินทาง FEM.</p>
				</div>
		
			</div>
		
			<div class="col-sm-3 col-xs-6">
		
				<div class="tile-stats tile-aqua">
					<div class="icon"><i class="entypo-upload"></i></div>
					<div class="num" data-start="0" data-end="135" data-postfix="" data-duration="1500" data-delay="600">34</div>
		
					<h3>รายการคำขอรอการตรวจเช็ค</h3>
					<p>ระบบเบิกค่าเดินทาง FEM.</p>
				</div>
		
			</div> 
			
			<div class="clear visible-xs"></div>
		
			<div class="col-sm-3 col-xs-6">
		
				<div class="tile-stats tile-green">
					<div class="icon"><i class="entypo-book-open"></i></div>
					<div class="num" data-start="0" data-end="23" data-postfix="" data-duration="1500" data-delay="1200">543</div>
		
					<h3>รายการคำขอทั้งหมด</h3>
					<p>ระบบเบิกค่าเดินทาง FEM.</p>
				</div>
		
			</div>
		
			<div class="col-sm-3 col-xs-6">
		
				<div class="tile-stats tile-blue">
					<div class="icon"><i class="entypo-users"></i></div>
					<div class="num" data-start="0" data-end="52" data-postfix="" data-duration="1500" data-delay="1800">850</div>
		
					<h3>สมาชิกทั้งหมด</h3>
					<p>ระบบเบิกค่าเดินทาง FEM.</p>
				</div>
		
			</div>
		</div>-->

		<h2 style="text-align: center; padding-top: 20px;">รายการคำขอเบิกค่าเดินทาง อนุมัติแล้ว</h2>
		<br />
		<br />
		<table class="table table-bordered datatable" id="table-1">
			<thead>
				<tr>
					<th>ลำดับ</th> 
					<th>วันที่ส่งคำขอ</th>
					<th>เรื่อง</th>
					<th>ชื่อ-สกุล</th>
					<th>เบอร์โทรศัพท์</th>
					<th>ดำเนินการ</th>
				</tr> 
			</thead>
			<tbody>
				<?php $num = 0; foreach($getdataPending as $getdataPending) : $num++; ?>  
				<tr class="odd gradeX">
					<td><?php echo $num; ?></td>   
					<td><?php 
						$myDateTime = DateTime::createFromFormat('Y-m-d',$getdataPending['date_add']);
						echo $formattedweddingdate = $myDateTime->format('d/m/Y');
					?></td>
					<td><?php echo $getdataPending['topic']; ?></td> 
					<td><?php echo $getdataPending['firstname']; echo " "; echo $getdataPending['lastname']; ?></td>
					<td><?php echo $getdataPending['telephone']; ?></td>
					<td class="center">
						<button type="button" onclick="location.href='<?php echo base_url() ?>Allowance/view_approve_5/<?php echo $getdataPending['id_allowance']; ?>'" class="btn btn-info btn-sm btn-icon icon-left"> 
							<i class="entypo-info"></i>
							ตรวจเช็ค 
						</button>
					</td> 
				</tr>
				<?php endforeach; ?>
			</tbody> 
		</table>
		
		<br />


	<!-- Footer -->
	<footer class="main">

		&copy; 2018 <strong>FEM.</strong> Developed by <a href="http://www.me-fi.com" target="_blank">ME-FI dot com</a>

	</footer>
	
	</div>

