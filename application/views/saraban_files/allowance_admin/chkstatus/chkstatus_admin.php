  	
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
                <h2 style="text-align: center; padding-top: 20px;">รายการสถานะการอนุมัติ</h2> 
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
							<th>สถานะการอนุมัติ</th>
							<th>รายละเอียด</th>
						</tr> 
                    </thead>
                    <tbody>
                        <?php $num = 0; foreach($getdataLocal as $getdataLocal) : $num++; ?>  
                        <tr class="odd gradeX">
                            <td><?php echo $num; ?></td> 
                            <td><?php echo $this->Allowance_model->DateThai($getdataLocal['date_submit'])?></td>
							<td><?php echo $getdataLocal['saraban_number']?></td>							
                            <td><?php echo $getdataLocal['subject_document'];?></td> 
                            <td><?php echo $getdataLocal['titlename'].''.$getdataLocal['firstname'].' '.$getdataLocal['lastname'];?></td>                             
                            <td>
                                <?php if($getdataLocal['approve_status'] == 0){ ?>
                                    <span class="text-danger" onClick="show_notapproved('<?php echo $getdataLocal['notapproved_approvers'];?>','เหตุผลการไม่อนุมัติ')" style="cursor: pointer" title="คลิกดูเหตุผลการไม่อนุมัติ">
										<i class="entypo-cancel"></i>ไม่อนุมัติ
									</span>
                                <?php } else if($getdataLocal['approve_status'] == 1){ ?>
                                    <span class="text-success">
										<i class="entypo-check"></i>อนุมัติ
									</span>
                                <?php } else if($getdataLocal['approve_status'] == 2){ ?>
                                    <span class="text-info">
										<i class="entypo-clock"></i>รออนุมัติ
									</span> 
                                <?php } ?>
                            </td> 
                            <td class="center">
                                <button type="button" onclick="location.href='<?php echo base_url()?>Saraban/detailLocal/<?php echo $getdataLocal['withdraw'];?>/<?php echo $getdataLocal['for_type'];?>/<?php echo $getdataLocal['id']?>'" class="btn btn-info btn-sm btn-icon icon-left"> 
                                    <i class="entypo-eye"></i>รายละเอียด 
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
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
							<th>สถานะการอนุมัติ</th>
							<th>รายละเอียด</th>
						</tr> 
                    </thead>
                    <tbody>
                        <?php $num = 0; foreach($getdata as $getdata) : $num++; 
						
								$saraban = explode(",",$getdata['saraban_number']);
                      			$numsaranban = $saraban[0];
						?>  
                        <tr class="odd gradeX">
                            <td><?php echo $num; ?></td> 
                            <td><?php echo $this->Allowance_model->DateThai($getdata['date_submit'])?></td>
							<td><?php echo $numsaranban?></td>							
                            <td><?php echo $getdata['subject_document'];?></td> 
                            <td><?php echo $getdata['titlename'].''.$getdata['firstname'].' '.$getdata['lastname'];?></td>                             
                            <td>
                                <?php if($getdata['approve_status'] == 0){ ?>
                                    <span class="text-danger" onClick="show_notapproved('<?php echo $getdata['notapproved_approvers'];?>','เหตุผลการไม่อนุมัติ')" style="cursor: pointer" title="คลิกดูเหตุผลการไม่อนุมัติ">
										<i class="entypo-cancel"></i>ไม่อนุมัติ
									</span>
                                <?php }elseif($getdata['approve_status'] == 1){ ?>
                                    <span class="text-success">
										<i class="entypo-check"></i>อนุมัติ
									</span>
                                <?php }elseif($getdata['approve_status'] == 2){ ?>
                                    <span class="text-info">
										<i class="entypo-clock"></i>รออนุมัติ
									</span> 
                                <?php } ?>
                            </td> 
                            <td class="center">
                                <button type="button" onclick="location.href='<?php echo base_url()?>Saraban/detail/<?php echo $getdata['withdraw'];?>/<?php echo $getdata['for_type'];?>/<?php echo $getdata['id']?>'" class="btn btn-info btn-sm btn-icon icon-left"> 
                                    <i class="entypo-eye"></i>รายละเอียด 
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
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
        