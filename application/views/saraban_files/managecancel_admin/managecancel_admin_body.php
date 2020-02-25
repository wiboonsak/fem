<style>
    .select2-drop {
        z-index: 99999 !important;
    }
</style>
<div class="main-content">

<?php
  //  if(chk==admin){
?>
	
<h2 style="text-align: center; ">ระบบงานสารบรรณ</h2>
<br />
<div class="row">

    <div class="col-sm-4 col-xs-8">
    
	<div class="tile-stats tile-aqua">
		<div class="icon"><i class="entypo-upload"></i></div>
		<div class="num" data-start="0" data-postfix="" data-duration="1500" data-delay="0"><?php echo $count1[0]['count']; ?></div>

		<h3>รายการเลขสารบรรณ</h3> 
		<p>ระบบงานสารบรรณ FEM.</p>
	</div> 

	</div>

	<div class="clear visible-xs"></div>

	<div class="col-sm-4 col-xs-8">

		<div class="tile-stats tile-blue">
			<div class="icon"><i class="entypo-users"></i></div>
			<div class="num" data-start="0" data-postfix="" data-duration="1500" data-delay="0"><?php echo $count2[0]['count']; ?></div>

			<h3>รายการเลขสารบรรณย้อนหลัง</h3>
			<p>ระบบงานสารบรรณ FEM.</p>
		</div>

	</div>

	<div class="col-sm-4 col-xs-8">

		<div class="tile-stats tile-red">
			<div class="icon"><i class="entypo-download"></i></div>
			<div class="num" data-start="0" data-postfix="" data-duration="1500" data-delay="0"><?php echo $count3[0]['count']; ?></div>

			<h3>รายการเลขสารบรรณที่ยกเลิก</h3>
			<p>ระบบงานสารบรรณ FEM.</p>
		</div>

	</div>

</div>
 
<?php
//    }
?>
<div id="modal-Edit-saraban" class="modal fade" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg ">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="hideselect()">
						<span class="white">&times;</span>
					</button> 
					แก้ไขการใช้เลข
				</div>
			</div>

			<div class="modal-body">
				<!-- PAGE CONTENT BEGINS -->
				<form class="form-horizontal" role="form">
					<div class="row">
							<label for="field-4" class="col-sm-2 text-left">เลขสารบรรณ</label>
							<div class="col-md-3">
								<input type="text" class="form-control" id="field-4" placeholder="เลขสารบัญ" disabled>
							</div>

							<label for="username" class="col-sm-3 text-left">username ผู้ใช้เลข</label>
							<div class="col-md-4">
                                                            <select class="form-control" id="username" name="username" style="font-size: 12px;" onchange="usernamesearh(this.value)">
										<option value="0"  >เลือก</option>;	
							
									
										<?php
										$firstname = "";
										 foreach ($getuser as $getuser2): 
										if($getuser2['user'] != $firstname){
													$firstname = $getuser2['user'];
											?>			
												<option value = "<?php echo $getuser2['user']; ?>"><?php echo $getuser2['user']; ?></option>;	
										<?php 
											}
										endforeach; 
										?>
										</select>
<!--								<input type="text" class="form-control" id="field-5" placeholder="username">-->
							</div>
										<script type="text/javascript"> 
										var  user = [];
										</script>																		
										<?php foreach ($getuser as $getuser): ?>
										<script type="text/javascript">
													var dataObj = { 
															id	:"<?php echo $getuser['id']; ?>",
															user	:"<?php echo $getuser['user']; ?>",
															fname	:"<?php echo $getuser['fname']; ?>",
															lname	:"<?php echo $getuser['lname']; ?>"
														}                 
													user.push(dataObj); 
										</script>				
										<?php endforeach ?> 
							<div class="clear"></div>
							<br>

							<label for="field-1" class="col-sm-2 text-left">ชื่อ</label>
							<div class="col-md-4">
								<input type="text" class="form-control" id="field-1" placeholder="ชื่อ" readonly >
							</div>

							<label for="field-2" class="col-sm-2 text-left">นามสกุล</label>
							<div class="col-md-4">
								<input type="text" class="form-control" id="field-2" placeholder="นามสกุล" readonly >
                                <input type="hidden" class="form-control" id="iduser" name="iduser" placeholder="นามสกุล" >
							</div>

							<div class="clear"></div>
							<br>

							<label for="field-3" class="col-sm-2 text-left ">ชื่อเรื่อง</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="field-3" placeholder="ชื่อเรื่อง">
							</div> 

							<div class="clear"></div>
							<br>
						
							<label for="to_name" class="col-sm-2 text-left ">เรียน</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="to_name" placeholder="เรียน">
							</div> 

							<div class="clear"></div>
							<br>
						
							<label for="from_name" class="col-sm-2 text-left ">จาก</label>
							<div class="col-md-10">
								<input type="text" class="form-control" id="from_name" placeholder="จาก">
							</div> 

							<div class="clear"></div>
							<br>

							<label for="field-1" class="col-sm-2 text-left">หมายเหตุ</label>
							<div class="col-md-4">
								<input type="text" class="form-control" id="field-6" placeholder="หมายเหตุ">
							</div>

							<label for="field-2" class="col-sm-2 text-left">Ref No.</label>
							<div class="col-md-4">
								<input type="text" class="form-control" id="field-7" placeholder="Reference Number">
							</div>

					</div>	
				</form>
			</div>

			<div class="modal-footer no-margin-top">
				<button type="button" class="btn btn-lg btn-success" onclick="dosubmit_edit()" data-dismiss="modal">
					<i class="ace-icon fa fa-check"></i>
					บันทึก
				</button>
                            <button class="btn btn-lg btn-danger pull-right" data-dismiss="modal" onclick="hideselect()">
					<i class="ace-icon fa fa-times"></i>
					ปิด
				</button>
				
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div> 

<div class="table-header">
    <h2 style="text-align: center; padding-top: 20px;">ตารางรายการเลขสารบรรณที่ยกเลิก</h2>
</div>

<table class="table table-bordered datatable table-striped" id="table-1">
    <thead>
        <tr>
            <th>เลขสารบรรณ</th>
            <th>ชื่อเรื่อง</th>
            <th>ผู้ใช้</th>
            <th>วันที่รับเลข</th>
            <th>วันที่ขอยกเลิก</th>
			<th>หมายเหตุ</th>
            <th>Ref No.</th>
            <th>ดำเนินการ</th>
        </tr>
    </thead>
    <tbody>
	<script type="text/javascript">
		var  sarabanList = [];	
	</script>
		
        <?php foreach($getcancel as $getcancel) : ?> 
			<script type="text/javascript">
				var dataObj = { 
								id_saraban	: "<?php echo $getcancel['id_saraban']; ?>", 
								fname 		: "<?php echo $getcancel['firstname']; ?>",
								lname 		: "<?php echo $getcancel['lastname']; ?>",
								topic    	: "<?php echo $getcancel['topic']; ?>",
								to_name    	: "<?php echo $getcancel['to_name']; ?>",
								from_name  	: "<?php echo $getcancel['from_name']; ?>",
								username    : "<?php echo $getcancel['user_name']; ?>",
								remark    	: "<?php echo $getcancel['remark']; ?>",
								refno    	: "<?php echo $getcancel['ref_no']; ?>",
								user_create : "<?php echo $getcancel['user_create']; ?>"
								}                
				sarabanList.push(dataObj);
			</script>	
            <tr class="odd gradeX">
                <td><?php echo $getcancel['id_saraban']; ?></td>
                <td><?php echo $getcancel['topic']; ?></td>
                <td><?php echo $getcancel['firstname']; echo " "; echo $getcancel['lastname']; ?></td>
                <td><?php echo $this->Saraban_model->GetThaiDateTime($getcancel['date_modify']);?>
					<?php //$myDateTime = DateTime::createFromFormat('Y-m-d H:i:s',$getcancel['date_add']);
						//echo $formattedweddingdate = $myDateTime->format('d/m/Y');
				?></td>
                <td><?php echo $this->Saraban_model->GetThaiDateTime($getcancel['date_modify']);?>
					<?php //$myDateTime = DateTime::createFromFormat('Y-m-d H:i:s',$getcancel['date_modify']);
						//echo $formattedweddingdate = $myDateTime->format('d/m/Y');
				?></td>
				<td><?php echo $getcancel['remark']; ?></td>
                <td><?php echo $getcancel['ref_no']; ?></td>
                <td class="center">
					<a class="btn btn-default btn-sm btn-icon icon-left" onclick="editbtn('<?php echo $getcancel['id_saraban']; ?>')">
                        <i class="entypo-pencil"></i>
                        ดำเนินการ
                    </a>
                    
                </td> 
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
	
<!-- Footer -->
<footer class="main">
&copy; 2018 <strong>FEM.</strong> Developed by <a href="http://www.me-fi.com" target="_blank">ME-FI dot com</a>
</footer>

</div>

