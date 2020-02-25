<div class="main-content">			
	
		<h2 style="text-align: center; padding-top: 20px;">ข้อมูล Admin</h2>
		<br>
		<br>
		
		<div class="row">
		</div>
		
		<table class="table table-bordered datatable" id="table-1">
			<thead> 
				<tr>
					<th style="text-align: center">ลำดับ</th>
					<th>ชื่อ - นามสกุล</th>
					<th>Username</th>
					<th>อีเมล์</th> 
					<th>ดำเนินการ</th>
					<th style="text-align: center">Block/Unblock</th>
				</tr>
			</thead>
			<tbody>				
				<?php	$n = 1; 
						foreach($getadmin->result() as $getadmin2){ 
				
						if(($getadmin2->checkType == '0') || ($getadmin2->checkType == '1')){
							
							$getFrom = '1';
						
						} else {
							$getFrom = '2';
						}
                                                 $checkuser = 0; $table = ''; $field = ''; $sar = ''; 

                For ($i=0; $i<2;$i++){
                    switch ($i) {
case 0:
    $table = 'manage_saraban';
    $field = 'user_create';
    $sar = 'admin_sara';
    break;
case 1:
    $table = 'tbl_saraban_previous';
    $field = 'user_update';
    $sar = 'admin_saraban';
    break;
}
$checkuser = $this->Allowance_model->checkuser($table, $field, $getadmin2->id,$sar);
if($checkuser >0){
    $i = 5;
}
                }
				
				?>		
				<tr class="odd gradeX">
					<td align="center"><?php echo $n;?></td> 
					<td><?php echo $getadmin2->firstname.' '.$getadmin2->lastname?></td>
					<td><?php echo $getadmin2->user_name?></td>
					<td><?php echo $getadmin2->email?></td>
					<td class="center">
						<a href="<?php echo base_url()?>Allowance/Edit_Admin/<?php echo $getadmin2->id.'/'.$getFrom;?>" class="btn btn-default btn-sm btn-icon icon-left"><i class="entypo-pencil"></i>แก้ไข</a>
								
                                                <a onclick="dosubmit_delete('<?php echo $getadmin2->id?>')" class="btn btn-danger btn-sm btn-icon icon-left"  <?php if($checkuser >0){?>style="display: none"<?php }?>><i class="entypo-cancel"></i>ลบ</a>

						<!--<a onclick="edituserpass('<?php //echo $getmember['id']; ?>')" class="btn btn-orange btn-sm btn-icon icon-left"><i class="entypo-key"></i>User/Pass</a>-->
					</td>
                                        <td style="text-align: center">
										<div class="form-group">
											<div class="make-switch switch-small" data-on="danger" onClick="setShow_onWeb('<?php echo $getadmin2->id?>', '<?php echo $getFrom?>')" >
										    	<input type="checkbox" id="ch<?php echo $getFrom.$getadmin2->id?>"  value="<?php echo $getadmin2->data_status?>" <?php if ($getadmin2->data_status == '1') { echo 'checked'; }?>>
											</div>
										</div></td>
				</tr>
				<?php $n++; } ?>	
			</tbody>
		</table>
		<br>
		<br>

	<!-- Footer -->
	<footer class="main">

		&copy; 2018 <strong>FEM.</strong> Developed by <a href="http://www.me-fi.com" target="_blank">ME-FI dot com</a>

	</footer>
	
	</div>