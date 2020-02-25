	
	<div class="main-content">
			
	<h2 style="text-align: center; ">ขออนุมัติเดินทาง</h2>
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
		<h2 style="text-align: center; padding-top: 20px;">รายการคำขอรอดำเนินการตรวจเช็ค</h2>
		<br>
		<br>
		
		<ul class="nav nav-tabs bordered">
            <li class="active" style="font-size: 16px;"><a href="#local" data-toggle="tab" aria-expanded="true"><strong>เดินทางในประเทศ</strong></a></li> 
            <li class="" style="font-size: 16px;"><a href="#outbound" data-toggle="tab" aria-expanded="false"><strong>เดินทางต่างประเทศ</strong></a></li>             
        </ul>
		
		<div class="tab-content">
        <div class="tab-pane active" id="local">		
		
		<table class="table table-bordered datatable" id="table-1">
			<thead>
				<tr>
					<th>ลำดับ</th>					
					<th>วันที่ส่งคำขอ</th>
                    <th>เลขสารบรรณ</th> 
					<th>เรื่อง</th>
					<th>ชื่อ-สกุล</th>					
					<th>ดำเนินการ</th>
				</tr> 
			</thead>
			<tbody>
				<?php $num = 0; foreach($getdataLocal->result() as $getdataLocal2){ $num++; 
				
						$nameL = $this->Allowance_model->get_userDetail($getdataLocal2->user_create);
						foreach($nameL->result() as $nameL2){}			
				?>  
				<tr class="odd gradeX">
					<td><?php echo $num;?></td>					
					<td><?php 
						$myDateTime = DateTime::createFromFormat('Y-m-d',$getdataLocal2->date_create);
						echo $formattedweddingdate = $myDateTime->format('d/m/Y');
					?></td>
                    <td><?php echo $getdataLocal2->saraban_number;?></td>   
					<td><?php echo $getdataLocal2->subject_document;?></td> 
					<td><?php echo $nameL2->titlename.''.$nameL2->firstname.' '.$nameL2->lastname;?></td>		
					<td class="center">
                                            <?php /*if($getdataLocal2->typeData !='2'){?>
						<button type="button" onclick="location.href='<?php echo base_url() ?>Saraban/detail/<?php echo $getdataLocal2->withdraw; ?>/<?php echo $getdataLocal2->for_type;?>/<?php echo $getdataLocal2->id;?>'" class="btn btn-info btn-sm btn-icon icon-left"> 
                                            <?php }else{*/ ?>
                        <button type="button" onclick="location.href='<?php echo base_url()?>Saraban/detailLocal/<?php echo $getdataLocal2->withdraw;?>/<?php echo $getdataLocal2->for_type;?>/<?php echo $getdataLocal2->id;?>'" class="btn btn-info btn-sm btn-icon icon-left"> 
                                            <?php //} ?>
							<i class="entypo-info"></i>ตรวจเช็ค 
						</button>
					</td> 
				</tr>
                <?php } ?>
			</tbody> 
		</table>
		</div>
			
		<div class="tab-pane" id="outbound">		
		
		<table class="table table-bordered datatable" id="table-2">
			<thead>
				<tr>
					<th>ลำดับ</th>					
					<th>วันที่ส่งคำขอ</th>
                    <th>เลขสารบรรณ</th> 
					<th>เรื่อง</th>
					<th>ชื่อ-สกุล</th>					
					<th>ดำเนินการ</th>
				</tr> 
			</thead>
			<tbody>
				<?php $num = 0; foreach($getdataPending->result() as $getdataPending2) { $num++; 
                               $saraban = explode(",",$getdataPending2->saraban_number);
                               $numsaranban = $saraban[0];
																						
					  $name = $this->Allowance_model->get_userDetail($getdataPending2->user_create);
					  foreach($name->result() as $name2){}													
				?>  
				<tr class="odd gradeX">
					<td><?php echo $num;?></td>				
					<td><?php 
						$myDateTime = DateTime::createFromFormat('Y-m-d',$getdataPending2->date_create);
						echo $formattedweddingdate = $myDateTime->format('d/m/Y');
					?></td>
                    <td><?php echo $numsaranban; ?></td>   
					<td><?php echo $getdataPending2->subject_document; ?></td> 
					<td><?php echo $name2->titlename.''.$name2->firstname.' '.$name2->lastname;?></td>		
					<td class="center">
                                            <?php //if($getdataPending2->typeData !='2'){?>
						<button type="button" onclick="location.href='<?php echo base_url() ?>Saraban/detail/<?php echo $getdataPending2->withdraw; ?>/<?php echo $getdataPending2->for_type;?>/<?php echo $getdataPending2->id;?>'" class="btn btn-info btn-sm btn-icon icon-left"> 
                                            <?php /*}else{?>
                                                    <button type="button" onclick="location.href='<?php echo base_url() ?>Saraban/detailLocal/<?php echo $getdataPending2->withdraw; ?>/<?php echo $getdataPending2->for_type;?>/<?php echo $getdataPending2->id;?>'" class="btn btn-info btn-sm btn-icon icon-left"> 
                                            <?php }*/ ?>
							<i class="entypo-info"></i>ตรวจเช็ค 
						</button>
					</td> 
				</tr>
                <?php } ?>
			</tbody> 
		</table>
		</div>	
		</div>	
		
		<br>

	<!-- Footer -->
	<footer class="main">

		&copy; 2018 <strong>FEM.</strong> Developed by <a href="http://www.me-fi.com" target="_blank">ME-FI dot com</a>

	</footer>
	
	</div>
