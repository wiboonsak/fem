		<?php
		date_default_timezone_set("Asia/Bangkok");
		?>
<style>
    
 .isDisabled {
	  pointer-events: none;
	  cursor: not-allowed !important;
	  opacity: 0.5;
	  text-decoration: none;
 }
/* .nav-tabs > li.active > a {
     background-color: #21a9e1;
     color: white;
 }*/
 
</style>
<?php 

$table = '';
$user_id = $this->uri->segment(4);
$idsaraban = $this->uri->segment(3);
$checktab = $this->uri->segment(7);
$type_travel = $this->uri->segment(5);
$getuser = $this->Inputform_model->getuser($user_id);

  if($type_travel == '1'){
       $table = 'tbl_local_document';
  }else{
       $table = 'tbl_outbound_document';
  }
foreach ($getuser->result() AS $getuser2){}
$getdocument = $this->Inputform_model->getdocument($idsaraban,$table);
foreach ($getdocument->result() AS $documentData2){}
$user_create = $documentData2->user_create; 
$userDetail = $this->Allowance_model->get_userDetail($user_create);
 foreach($userDetail->result() as $userDetail2){}
  $array1 = array('1','5');						
  $array2 = array('2','3','4','6');

$getdoc2local = $this->Inputform_model->getdoc2($idsaraban,$type_travel,'1');
$numdoc2local = $getdoc2local->num_rows();
$getdoc2outbound = $this->Inputform_model->getdoc2($idsaraban,$type_travel,'2');
$numdoc2outbound = $getdoc2outbound->num_rows();
foreach ($getdoc2local->result() AS $doc2local){}
foreach ($getdoc2outbound->result() AS $doc2outbound){}

foreach ($get_userDetail->result() AS $userDetail){}
 if(($documentData2->date_start != '') && ($documentData2->date_start != '0000-00-00')){
            $date_start = $this->Allowance_model->get_month($documentData2->date_start,'3');
            $mon_start = $this->Allowance_model->get_month($documentData2->date_start,'1');
            $year_start = $this->Allowance_model->get_month($documentData2->date_start,'4');
                              }else{
                                $date = '';
                                $mon = '';
                                $year = '';
                              }
 if(($documentData2->date_end != '') && ($documentData2->date_end != '0000-00-00')){
            $date_end = $this->Allowance_model->get_month($documentData2->date_end,'3');
            $mon_end = $this->Allowance_model->get_month($documentData2->date_end,'1');
            $year_end = $this->Allowance_model->get_month($documentData2->date_end,'4');
                              }else{
                                $date = '';
                                $mon = '';
                                $year = '';
                              }
$doc1_id = 0;
$getdoc1idsaraban = $this->Inputform_model->getdoc1idsaraban($idsaraban,$type_travel);
$numdoc1 = $getdoc1idsaraban->num_rows();
if($numdoc1>0){
		foreach($getdoc1idsaraban->result() AS $getdoc1idsaraban2){}
		$doc1_id = $getdoc1idsaraban2->id;
		$getdoc1 = $this->Inputform_model->getdoc1($doc1_id,$type_travel);
		foreach($getdoc1->result() AS $Data){}
		$getdoc3 = $this->Inputform_model->getdoc3($idsaraban,$type_travel);
		$getdoc3_1 = $this->Inputform_model->getdoc3_1($idsaraban,$type_travel);
		$time_end = $Data->time_end;
		$time_endarray = explode(":",$time_end);
		$m1 = $time_endarray[1];
		$h1 = $time_endarray[0];
		$timeend = $h1.":".$m1;

		$time_start = $Data->time_start;
		$time_startarray = explode(":",$time_start);
		$m = $time_startarray[1];
		$h = $time_startarray[0];
		$timestart = $h.":".$m;
                
                  if(($Data->date != '') && ($Data->date != '0000-00-00')){
            $datedoc1 = $this->Allowance_model->get_month($Data->date,'3');
            $mondoc1 = $this->Allowance_model->get_month($Data->date,'1');
            $yeardoc1 = $this->Allowance_model->get_month($Data->date,'4');
                              }else{
                                $datedoc1 = '';
                                $mondoc1 = '';
                                $yeardoc1 = '';
                              }
                  if(($Data->dateinput != '') && ($Data->dateinput != '0000-00-00')){
            $dateinput = $this->Allowance_model->get_month($Data->dateinput,'3');
            $moninput = $this->Allowance_model->get_month($Data->dateinput,'1');
            $yearinput = $this->Allowance_model->get_month($Data->dateinput,'4');
                              }else{
                                $dateinput = '';
                                $moninput = '';
                                $yearinput = '';
                              }
                  if(($Data->datestart != '') && ($Data->datestart != '0000-00-00')){
            $datestart = $this->Allowance_model->get_month($Data->datestart,'3');
            $monstart = $this->Allowance_model->get_month($Data->datestart,'1');
            $yearstart = $this->Allowance_model->get_month($Data->datestart,'4');
                              }else{
                                $datestart = '';
                                $monstart = '';
                                $yearstart = '';
                              }
                  if(($Data->dateend != '') && ($Data->dateend != '0000-00-00')){
            $dateend = $this->Allowance_model->get_month($Data->dateend,'3');
            $monend = $this->Allowance_model->get_month($Data->dateend,'1');
            $yearend = $this->Allowance_model->get_month($Data->dateend,'4');
                              }else{
                                $dateend = '';
                                $monend = '';
                                $yearend = '';
                              }
}
if($documentData2->withdraw=='0'){
	$sarabannumber = $documentData2->saraban_number;
}else{
	$sarabannumber = $documentData2->saraban_number;
	if($type_travel == '2'){
		$sarabannumber = $this->Saraban_model->explode_sarabanNumber($sarabannumber,'1');
	}
}
$career_id = $getuser2->career_id;

?>
		<div class="well well-sm">
			<h4>กรุณากรอกแบบฟอร์มดังต่อไปนี้</h4>
		</div>
		
		<form action="#" id="rootwizard" name="rootwizard" class="form-wizard validate"  method="post" onsubmit="savedoc_1();return false">
			 <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id?>">
                    <input type="hidden" id="idsaraban" name="idsaraban" value="<?php echo $idsaraban?>">
                    <input type="hidden" id="doc_1_id" name="doc_1_id" value="<?php if($numdoc1>0){echo $doc1_id;}else{echo 0;}?>">
                    <input type="hidden" id="date_start" name="date_start" value="<?php if(($documentData2->date_start != '') && ($documentData2->date_start != '0000-00-00')){echo $documentData2->date_start;}else{ echo date("Y-m-d");}?>">
                    <input type="hidden" id="date_end" name="date_end" value="<?php if(($documentData2->date_end != '') && ($documentData2->date_end != '0000-00-00')){echo $documentData2->date_end;}else{ echo date("Y-m-d");}?>">
                   <input type="hidden" id="type_travel1" name="type_travel1" value="<?php echo $type_travel?>">
                    
			<div class="steps-progress">
				<div class="progress-indicator"></div>
			</div>
			
			<ul>
<!--                <li>
					<a href="#tab2-1" data-toggle="tab"><span>1</span>หลักฐานการจ่ายเงิน</a>
				</li>-->
                <li class="active">
					<a href="#tab2-2" data-toggle="tab"><span>1</span>ใบเบิกค่าใช้จ่าย</a>
				</li>
                <li class="">
					<a href="#tab2-4" data-toggle="tab"><span>2</span>ใบสำคัญรับเงิน</a>
				</li>				
			</ul>
			
			<div class="tab-content">

				
                <div class="tab-pane active" id="tab2-2">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label" for="full_name">ที่ทำการ</label>
                                <input class="form-control" name="1" id="1_where" data-validate="required" placeholder="ที่ทำการ" value="<?php if($numdoc1>0){echo $Data->doc_where;}?>" onchange="nextdisable()"/>
							</div>
						</div>
						
						<div class="col-md-6">
                                            <div class="form-group">
                                 <div class="col-md-12" style="padding-left: 0px;">
                                      <label class="control-label" for="birthdate">วันที่</label>
                                 </div><br>
                                 <div class="col-md-4" style="padding-right: 0px;padding-left: 0px">
                                      <select class="form-control" id="daydoc1" name="daydoc1" >
                               <option value="00">วัน</option>
							<?php for($a=1; $a<=31; $a++){ 
								
									if($a < 10){  $txt = '0';  } else { $txt =''; }
							?>								
                                                                <option value="<?php echo $txt.$a?>"    <?php if(($numdoc1>0)&&($datedoc1==$txt.$a)){echo 'selected';}else if(($numdoc1<1)&&(date('d')==$txt.$a)){echo 'selected';}?>><?php echo $a?></option>	
							<?php }	?>
							</select>
<!--                                                                    <input class="form-control" type="time" id="timestart" name="timestart" value="<?php //if($doc1_id!=''){echo $timestart;}else{echo date("H:i");} ?>" />-->
							</div>
                            <div class="col-md-4" style="padding-right: 0px;">
                                 <select class="form-control" id="monthdoc1" name="monthdoc1" >
                               <option value="00">เดือน</option>
							<?php for($x=1; $x<=12; $x++){ 
								
									if($x < 10){  $txt = '0';  } else { $txt =''; } 
                                                                        if($x==1){
                                                                            $month = 'มกราคม';
                                                                        }else if($x==2){
                                                                            $month = 'กุมภาพันธ์';
                                                                        }else if($x==3){
                                                                            $month = 'มีนาคม';
                                                                        }else if($x==4){
                                                                            $month = 'เมษายน';
                                                                        }else if($x==5){
                                                                            $month = 'พฤษภาคม';
                                                                        }else if($x==6){
                                                                            $month = 'มิถุนายน';
                                                                        }else if($x==7){
                                                                            $month = 'กรกฎาคม';
                                                                        }else if($x==8){
                                                                            $month = 'สิงหาคม';
                                                                        }else if($x==9){
                                                                            $month = 'กันยายน';
                                                                        }else if($x==10){
                                                                            $month = 'ตุลาคม';
                                                                        }else if($x==11){
                                                                            $month = 'พฤศจิกายน';
                                                                        }else if($x==12){
                                                                            $month = 'ธันวาคม';
                                                                        }
							?>								
								<option value="<?php echo $txt.$x?>"  <?php if(($numdoc1>0)&&($mondoc1==$txt.$x)){echo 'selected';}else if(($numdoc1<1)&&(date('m')==$txt.$x)){echo 'selected';}?> ><?php echo $month?> </option>
	
							<?php }	?>
							</select>

							</div>
                            <div class="col-md-4" style="padding-right: 0px;">
                                 <select class="form-control" id="yeardoc1" name="yeardoc1" >
                               <option value="00">ปี</option>
							<?php for($y=2017; $y<=2032; $y++){ 
						$yearthai = $y+543
							?>								
								<option value="<?php echo $y?>"   <?php if(($numdoc1>0)&&($yeardoc1==$y)){echo 'selected';}else if(($numdoc1<1)&&(date('Y')==$y)){echo 'selected';}?>><?php echo $yearthai?></option>
	
							<?php }	?>
							</select>

							</div>
							</div>
                                            
						</div>
					</div>
                                    <div>
                                        <hr style="height: 5px;background-color: #808080">
                                    </div>
                                    <div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label" for="full_name">เรื่อง</label>
                                <input class="form-control" name="3"  id="1_title" value="<?php if($numdoc1>0){echo $Data->title;}else{echo $documentData2->subject_document;}?>" placeholder="สัญญายืมเงินเลขที่" />
							</div>
						</div>
					</div>
						
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="full_name">เรียน</label>
                                <input class="form-control" name="4" id="1_to" data-validate="required" placeholder="เรียน" <?php if($numdoc1>0){?>value="<?php echo $Data->doc_to?>"<?php }else{?>value="<?php if(in_array($userDetail2->career_id, $array1)){ echo 'อธิการบดี'; }else{ echo 'คณบดีคณะการจัดการสิ่งแวดล้อม'; }?>"<?php }?>/>
							</div>
						</div> 

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="full_name">ตามคำสั่งบันทึกที่</label>
                                <input class="form-control" name="5" readonly id="1_idsaraban" value="<?php echo $sarabannumber;?>" />
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="form-group">
                                 <div class="col-md-12" style="padding-left: 0px;">
                                      <label class="control-label" for="birthdate">ลงวันที่</label>
                                 </div><br>
                                 <div class="col-md-4" style="padding-right: 0px;padding-left: 0px">
                                      <select class="form-control" id="dayinput" name="dayinput"  >
                               <option value="00">วัน</option>
							<?php for($a=1; $a<=31; $a++){ 
								
									if($a < 10){  $txt = '0';  } else { $txt =''; }
							?>								
                                                                <option value="<?php echo $txt.$a?>"    <?php if(($numdoc1>0)&&($dateinput==$txt.$a)){echo 'selected';}else if(($numdoc1<1)&&(date('d')==$txt.$a)){echo 'selected';}?>><?php echo $a?></option>	
							<?php }	?>
							</select>
<!--                                                                    <input class="form-control" type="time" id="timestart" name="timestart" value="<?php //if($doc1_id!=''){echo $timestart;}else{echo date("H:i");} ?>" />-->
							</div>
                            <div class="col-md-4" style="padding-right: 0px;">
                                 <select class="form-control" id="monthinput" name="monthinput" >
                               <option value="00">เดือน</option>
							<?php for($x=1; $x<=12; $x++){ 
								
									if($x < 10){  $txt = '0';  } else { $txt =''; } 
                                                                        if($x==1){
                                                                            $month = 'มกราคม';
                                                                        }else if($x==2){
                                                                            $month = 'กุมภาพันธ์';
                                                                        }else if($x==3){
                                                                            $month = 'มีนาคม';
                                                                        }else if($x==4){
                                                                            $month = 'เมษายน';
                                                                        }else if($x==5){
                                                                            $month = 'พฤษภาคม';
                                                                        }else if($x==6){
                                                                            $month = 'มิถุนายน';
                                                                        }else if($x==7){
                                                                            $month = 'กรกฎาคม';
                                                                        }else if($x==8){
                                                                            $month = 'สิงหาคม';
                                                                        }else if($x==9){
                                                                            $month = 'กันยายน';
                                                                        }else if($x==10){
                                                                            $month = 'ตุลาคม';
                                                                        }else if($x==11){
                                                                            $month = 'พฤศจิกายน';
                                                                        }else if($x==12){
                                                                            $month = 'ธันวาคม';
                                                                        }
							?>								
								<option value="<?php echo $txt.$x?>"  <?php if(($numdoc1>0)&&($moninput==$txt.$x)){echo 'selected';}else if(($numdoc1<1)&&(date('m')==$txt.$x)){echo 'selected';}?> ><?php echo $month?> </option>
	
							<?php }	?>
							</select>

							</div>
                            <div class="col-md-4" style="padding-right: 0px;">
                                 <select class="form-control" id="yearinput" name="yearinput" >
                               <option value="00">ปี</option>
							<?php for($y=2017; $y<=2032; $y++){ 
						$yearthai = $y+543
							?>								
								<option value="<?php echo $y?>"   <?php if(($numdoc1>0)&&($yearinput==$y)){echo 'selected';}else if(($numdoc1<1)&&(date('Y')==$y)){echo 'selected';}?>><?php echo $yearthai?></option>
	
							<?php }	?>
							</select>

							</div>
							</div>
						</div>
					</div>
					<div>
                      <hr style="height: 5px;background-color: #808080">
                    </div>
                                   
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label" for="full_name">ข้าพเจ้า</label>
                                <input class="form-control" name="7" id="1_name" data-validate="required" placeholder="ชื่อ นามสกุล"  <?php if($numdoc1>0){?>value="<?php echo $Data->name?>"<?php }else{?>value="<?php echo $getuser2->titlename.' '.$getuser2->firstname.' '.$getuser2->lastname?>"<?php }?>/>
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label" for="full_name">ตำแหน่ง</label>
                                <input class="form-control" name="8" id="1_position" data-validate="required" placeholder="ตำแหน่ง" value="<?php if($numdoc1>0){echo $Data->position;}else{echo $getuser2->position;}?>"/>
							</div>
						</div>
						
						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label" for="birthdate">สังกัด</label>
								<input class="form-control" name="9" id="1_major" data-validate="required" placeholder="สังกัด" value="<?php if($numdoc1>0){echo $Data->major;}else{echo 'คณะการจัดการสิ่งแวดล้อม';}?>"/>
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label" for="full_name">พร้อมด้วย</label>
								<input class="form-control" name="10" id="1_with" data-validate="required" placeholder="ผู้ติดตาม/คณะผู้ติดตาม" value="<?php if($numdoc1>0){echo $Data->doc_with;}?>"/>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-3">
                        <?php if($numdoc1>0){ ?>
                        <div class="form-group">
								<label class="control-label" for="full_name">เดินทางไปปฏิบัติราชการ</label>
                                <select name="11" id="1_goto" class="selectboxit"><option value="">-- เลือก --</option><option value="1" <?php if($Data->goto == '1'){ echo 'selected'; } ?> >เข้าร่วมประชุม</option><option value="2" <?php if($Data->goto == '2'){ echo 'selected'; } ?> >เข้าร่วมประชุมทางวิชาการ</option><option value="3" <?php if($Data->goto == '3'){ echo 'selected'; } ?> >ฝึกอบรม</option><option value="4" <?php if($Data->goto == '4'){ echo 'selected'; } ?> >ดูงาน</option><option value="5" <?php if($Data->goto == '5'){ echo 'selected'; } ?> >ประชุมเชิงปฎิบัติการ</option><option value="6" <?php if($Data->goto == '6'){ echo 'selected'; } ?> >ปฏิบัติงานเพื่อปรึกษาหารือ</option></select>
								
							</div>
                        <?php }else{ ?>
							<div class="form-group">
								<label class="control-label" for="full_name">เดินทางไปปฏิบัติราชการ</label>
                                <select name="11" id="1_goto" class="selectboxit"><option value="">-- เลือก --</option><option value="1" <?php if($documentData2->travel_for == '1'){ echo 'selected'; } ?> >เข้าร่วมประชุม</option><option value="2" <?php if($documentData2->travel_for == '2'){ echo 'selected'; } ?> >เข้าร่วมประชุมทางวิชาการ</option><option value="3" <?php if($documentData2->travel_for == '3'){ echo 'selected'; } ?> >ฝึกอบรม</option><option value="4" <?php if($documentData2->travel_for == '4'){ echo 'selected'; } ?> >ดูงาน</option><option value="5" <?php if($documentData2->travel_for == '5'){ echo 'selected'; } ?> >ประชุมเชิงปฎิบัติการ</option><option value="6" <?php if($documentData2->travel_for == '6'){ echo 'selected'; } ?> >ปฏิบัติงานเพื่อปรึกษาหารือ</option></select>
								
							</div>
                        <?php } ?>
						</div>
						<?php if($numdoc1 > 0){ ?>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="birthdate">โดยออกเดินทางจาก</label>
								<select name="11_1" id="1_start" class="selectboxit">
										<option value="">-------โปรดเลือก------</option>
										<option value="บ้านพัก"<?php if(($Data->start == 'บ้านพัก')&&($numdoc1>0)){ echo 'selected'; } ?>>บ้านพัก</option>
										<option value="สำนักงาน" <?php if(($Data->start == 'สำนักงาน')&&($numdoc1>0)){ echo 'selected'; } ?>>สำนักงาน</option>
										<option value="ประเทศไทย" <?php if(($Data->start == 'ประเทศไทย')&&($numdoc1>0)){ echo 'selected'; } ?>>ประเทศไทย</option>
								</select>
							</div>
						</div>
                        <?php }else{ ?>
                        <div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="birthdate">โดยออกเดินทางจาก</label>
								<select name="11_1" id="1_start" class="selectboxit">
										<option value="">-------โปรดเลือก------</option>
										<option value="บ้านพัก">บ้านพัก</option>
										<option value="สำนักงาน" >สำนักงาน</option>
										<option value="ประเทศไทย" >ประเทศไทย</option>
								</select>
							</div>
						</div>
                                                <?php } ?>
                                            
						<div class="col-md-5">
							<div class="form-group">
                                 <div class="col-md-12" style="padding-left: 0px;">
                                      <label class="control-label" for="birthdate">ตั้งแต่วันที่</label>
                                 </div><br>
                                 <div class="col-md-8" style="padding-left: 0px;padding-right: 0px;">
                                   
                                 <div class="col-md-3" style="padding-right: 0px;padding-left: 0px">
                                      <select class="form-control" id="daystart" name="daystart" onchange="calculatedaydaystart(this.value)">
                               <option value="00">วัน</option>
							<?php for($a=1; $a<=31; $a++){ 
								
									if($a < 10){  $txt = '0';  } else { $txt =''; }
							?>								
                                                        <option value="<?php echo $txt.$a?>"    <?php if($date_start==$txt.$a){echo 'selected';}else if(($numdoc1>0)&&($datestart==$txt.$a)){echo 'selected';}else if(($date_start=='')&&(date('d')==$txt.$a)){echo 'selected';}?>><?php echo $a?></option>	
							<?php }	?>
							</select>
			</div>
                            <div class="col-md-5" style="padding-right: 0px;">
                                 <select class="form-control" id="monthstart" name="monthstart" onchange="calculatedaymonthstart(this.value)">
                               <option value="00">เดือน</option>
							<?php for($x=1; $x<=12; $x++){ 
								
									if($x < 10){  $txt = '0';  } else { $txt =''; } 
                                                                        if($x==1){
                                                                            $month = 'มกราคม';
                                                                        }else if($x==2){
                                                                            $month = 'กุมภาพันธ์';
                                                                        }else if($x==3){
                                                                            $month = 'มีนาคม';
                                                                        }else if($x==4){
                                                                            $month = 'เมษายน';
                                                                        }else if($x==5){
                                                                            $month = 'พฤษภาคม';
                                                                        }else if($x==6){
                                                                            $month = 'มิถุนายน';
                                                                        }else if($x==7){
                                                                            $month = 'กรกฎาคม';
                                                                        }else if($x==8){
                                                                            $month = 'สิงหาคม';
                                                                        }else if($x==9){
                                                                            $month = 'กันยายน';
                                                                        }else if($x==10){
                                                                            $month = 'ตุลาคม';
                                                                        }else if($x==11){
                                                                            $month = 'พฤศจิกายน';
                                                                        }else if($x==12){
                                                                            $month = 'ธันวาคม';
                                                                        }
							?>								
								<option value="<?php echo $txt.$x?>"  <?php if($mon_start==$txt.$x){echo 'selected';}else if(($numdoc1>0)&&($monstart==$txt.$x)){echo 'selected';}else if(($mon_start=='')&&(date('m')==$txt.$x)){echo 'selected';}?> ><?php echo $month?> </option>
	
							<?php }	?>
							</select>

							</div>
                            <div class="col-md-4" style="padding-right: 0px;">
                                 <select class="form-control" id="yearstart" name="yearstart" onchange="calculatedayyearstart(this.value)">
                               <option value="00">ปี</option>
							<?php for($y=2017; $y<=2032; $y++){ 
						$yearthai = $y+543
							?>								
								<option value="<?php echo $y?>"   <?php if($year_start==$y){echo 'selected';}else if(($numdoc1>0)&&($yearstart==$y)){echo 'selected';}else if(($year_start=='')&&(date('Y')==$y)){echo 'selected';}?>><?php echo $yearthai?></option>
	
							<?php }	?>
							</select>

							</div>
							</div>
                                 <div class="col-md-2" style="padding-right: 0px;">
                                      <select class="form-control" id="transfer_h_time1" name="transfer_h_time1" onchange="calculatedayh(this.value)">
                               <option value="00">ชั่วโมง</option>
							<?php for($a=1; $a<=24; $a++){ 
								
									if($a < 10){  $txt = '0';  } else { $txt =''; }
							?>								
								<option value="<?php echo $txt.$a?>" <?php if(($doc1_id != '')&&($txt.$a==$h)){ echo "selected";}?>  ><?php echo $txt.$a?></option>	
							<?php }	?>
							</select>
<!--                                                                    <input class="form-control" type="time" id="timestart" name="timestart" value="<?php //if($doc1_id!=''){echo $timestart;}else{echo date("H:i");} ?>" />-->
							</div>
                            <div class="col-md-2" style="padding-right: 0px;">
                                 <select class="form-control" id="transfer_m_time1" name="transfer_m_time1" onchange="calculatedaym(this.value)">
                               <option value="00">นาที</option>
							<?php for($x=0; $x<=59; $x++){ 
								
									if($x < 10){  $txt = '0';  } else { $txt =''; }
							?>								
								<option value="<?php echo $txt.$x?>" <?php if(($doc1_id != '')&&($txt.$x==$m)){ echo "selected";}?> ><?php echo $txt.$x?></option>
	
							<?php }	?>
							</select>

							</div>
							</div>
						</div>
					</div>

					<div class="row">
                                            <?php if($numdoc1>0){?>
						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label" for="birthdate">กลับถึง</label>
								<select name="12_1" id="1_end" class="selectboxit">
										<option value="">-------โปรดเลือก------</option>
										<option value="บ้านพัก" <?php if(($Data->end == 'บ้านพัก')&&($numdoc1>0)){ echo 'selected'; } ?>>บ้านพัก</option>
										<option value="สำนักงาน" <?php if(($Data->end == 'สำนักงาน')&&($numdoc1>0)){ echo 'selected'; } ?>>สำนักงาน</option>
										<option value="ประเทศไทย" <?php if(($Data->end == 'ประเทศไทย')&&($numdoc1>0)){ echo 'selected'; } ?>>ประเทศไทย</option>
								</select>
							</div>
						</div>
                                            <?php }else{?>
                                            <div class="col-md-3">
							<div class="form-group">
								<label class="control-label" for="birthdate">กลับถึง</label>
								<select name="12_1" id="1_end" class="selectboxit">
										<option value="">-------โปรดเลือก------</option>
										<option value="บ้านพัก" >บ้านพัก</option>
										<option value="สำนักงาน" >สำนักงาน</option>
										<option value="ประเทศไทย" >ประเทศไทย</option>
								</select>
							</div>
						</div>
                                            <?php }?>
						<div class="col-md-5">
							<div class="form-group">
                                 <div class="col-md-12" style="padding-left: 0px;">
                                      <label class="control-label" for="birthdate">ในวันที่</label>
                                 </div><br>
                                 <div class="col-md-8" style="padding-left: 0px;padding-right: 0px;">
                                   
                                 <div class="col-md-3" style="padding-right: 0px;padding-left: 0px">
                                      <select class="form-control" id="dayend" name="dayend" onchange="calculatedaydayend(this.value)">
                               <option value="00">วัน</option>
							<?php for($a=1; $a<=31; $a++){ 
								
									if($a < 10){  $txt = '0';  } else { $txt =''; }
							?>								
                                                                <option value="<?php echo $txt.$a?>"    <?php if($date_end==$txt.$a){echo 'selected';}else if(($numdoc1>0)&&($dateend==$txt.$a)){echo 'selected';}else if(($numdoc1<1)&&(date('d')==$txt.$a)){echo 'selected';}?>><?php echo $a?></option>	
							<?php }	?>
							</select>
			</div>
                            <div class="col-md-5" style="padding-right: 0px;">
                                 <select class="form-control" id="monthend" name="monthend" onchange="calculatedaymonthend(this.value)">
                               <option value="00">เดือน</option>
							<?php for($x=1; $x<=12; $x++){ 
								
									if($x < 10){  $txt = '0';  } else { $txt =''; } 
                                                                        if($x==1){
                                                                            $month = 'มกราคม';
                                                                        }else if($x==2){
                                                                            $month = 'กุมภาพันธ์';
                                                                        }else if($x==3){
                                                                            $month = 'มีนาคม';
                                                                        }else if($x==4){
                                                                            $month = 'เมษายน';
                                                                        }else if($x==5){
                                                                            $month = 'พฤษภาคม';
                                                                        }else if($x==6){
                                                                            $month = 'มิถุนายน';
                                                                        }else if($x==7){
                                                                            $month = 'กรกฎาคม';
                                                                        }else if($x==8){
                                                                            $month = 'สิงหาคม';
                                                                        }else if($x==9){
                                                                            $month = 'กันยายน';
                                                                        }else if($x==10){
                                                                            $month = 'ตุลาคม';
                                                                        }else if($x==11){
                                                                            $month = 'พฤศจิกายน';
                                                                        }else if($x==12){
                                                                            $month = 'ธันวาคม';
                                                                        }
							?>								
								<option value="<?php echo $txt.$x?>"  <?php  if($mon_end==$txt.$x){echo 'selected';}else if(($numdoc1>0)&&($monend==$txt.$x)){echo 'selected';}else if(($numdoc1<1)&&(date('m')==$txt.$x)){echo 'selected';}?> ><?php echo $month?> </option>
	
							<?php }	?>
							</select>

							</div>
                            <div class="col-md-4" style="padding-right: 0px;">
                                 <select class="form-control" id="yearend" name="yearend" onchange="calculatedayyearend(this.value)">
                               <option value="00">ปี</option>
							<?php for($y=2017; $y<=2032; $y++){ 
						$yearthai = $y+543
							?>								
								<option value="<?php echo $y?>"   <?php if($year_end==$y){echo 'selected';}else if(($numdoc1>0)&&($yearend==$y)){echo 'selected';}else if(($numdoc1<1)&&(date('Y')==$y)){echo 'selected';}?>><?php echo $yearthai?></option>
	
							<?php }	?>
							</select>

							</div>
							</div>
                                 <div class="col-md-2" style="padding-right: 0px;">
                                      <select class="form-control" id="transfer_h_time2" name="transfer_h_time2" onchange="calculatedayendh(this.value)">
                               <option value="00">ชั่วโมง</option>
							<?php for($a=1; $a<=24; $a++){ 
								
									if($a < 10){  $txt = '0';  } else { $txt =''; }
							?>								
								<option value="<?php echo $txt.$a?>" <?php if(($doc1_id != '')&&($txt.$a==$h1)){ echo "selected";}?>  ><?php echo $txt.$a?></option>	
							<?php }	?>
							</select>
<!--                                                                    <input class="form-control" type="time" id="timestart" name="timestart" value="<?php //if($doc1_id!=''){echo $timestart;}else{echo date("H:i");} ?>" />-->
							</div>
                            <div class="col-md-2" style="padding-right: 0px;">
                                 <select class="form-control" id="transfer_m_time2" name="transfer_m_time2" onchange="calculatedayendm(this.value)">
                               <option value="00">นาที</option>
							<?php for($x=0; $x<=59; $x++){ 
								
									if($x < 10){  $txt = '0';  } else { $txt =''; }
							?>								
								<option value="<?php echo $txt.$x?>" <?php if(($doc1_id != '')&&($txt.$x==$m1)){ echo "selected";}?>  ><?php echo $txt.$x?></option>
	
							<?php }	?>
							</select>

							</div>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="full_name">รวมเวลาไปราชการครั้งนี้ (จำนวนวัน)</label>
                                                                <input name="14" class="form-control" id="1_sumdate" data-validate="required" placeholder="จำนวนวัน" value="<?php if($numdoc1>0){ echo $Data->sumdate; }?>" type="text" readonly/>
							</div>
						</div>
					</div>
<div>
                                     <hr style="height: 5px;background-color: #808080">
                                    </div>
                    <div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label class="control-label" for="full_name">หลักฐานค่าใช้จ่ายประกอบใบเบิกค่าใช้จ่ายในการเดินทางของ</label>
                                <input class="form-control" name="26" id="2_name" placeholder="ระบุ" data-validate="required" value="<?php if($numdoc2local>0){ echo $doc2local->name; }else if($userDetail->titlename!=''){echo $userDetail->titlename.$userDetail->firstname.' '.$userDetail->lastname;}else{echo $userDetail->firstname.' '.$userDetail->lastname;}?>"/>
							</div>
						</div>
                                            <?php 
                                            if($numdoc2local>0){
                  if(($doc2local->date != '') && ($doc2local->date != '0000-00-00')){
            $date1 = $this->Allowance_model->get_month($doc2local->date,'3');
            $mon1 = $this->Allowance_model->get_month($doc2local->date,'1');
            $year1 = $this->Allowance_model->get_month($doc2local->date,'4');
                              }else{
                                $date1 = '';
                                $mon1 = '';
                                $year1 = '';
                              }
                                            }
                                            ?>
					<div class="col-md-4" >	
                                            <div class="form-group">
                                 <div class="col-md-12" style="padding-left: 0px;">
                                      <label class="control-label" for="birthdate">ลงวันที่</label>
                                 </div><br>
                                 <div class="col-md-2" style="padding-right: 0px;padding-left: 0px">
                                      <select class="form-control" id="day1" name="day1" >
                               <option value="00">วัน</option>
							<?php for($a=1; $a<=31; $a++){ 
								
									if($a < 10){  $txt = '0';  } else { $txt =''; }
							?>								
                                                                <option value="<?php echo $txt.$a?>"    <?php if(($numdoc2local>0)&&($date1==$txt.$a)){echo 'selected';}else if(date('d')==$txt.$a){echo 'selected';}?>><?php echo $a?></option>	
							<?php }	?>
							</select>
<!--                                                                    <input class="form-control" type="time" id="timestart" name="timestart" value="<?php //if($doc1_id!=''){echo $timestart;}else{echo date("H:i");} ?>" />-->
							</div>
                            <div class="col-md-4" style="padding-right: 0px;">
                                 <select class="form-control" id="month1" name="month1" >
                               <option value="00">เดือน</option>
							<?php for($x=1; $x<=12; $x++){ 
								
									if($x < 10){  $txt = '0';  } else { $txt =''; } 
                                                                        if($x==1){
                                                                            $month = 'มกราคม';
                                                                        }else if($x==2){
                                                                            $month = 'กุมภาพันธ์';
                                                                        }else if($x==3){
                                                                            $month = 'มีนาคม';
                                                                        }else if($x==4){
                                                                            $month = 'เมษายน';
                                                                        }else if($x==5){
                                                                            $month = 'พฤษภาคม';
                                                                        }else if($x==6){
                                                                            $month = 'มิถุนายน';
                                                                        }else if($x==7){
                                                                            $month = 'กรกฎาคม';
                                                                        }else if($x==8){
                                                                            $month = 'สิงหาคม';
                                                                        }else if($x==9){
                                                                            $month = 'กันยายน';
                                                                        }else if($x==10){
                                                                            $month = 'ตุลาคม';
                                                                        }else if($x==11){
                                                                            $month = 'พฤศจิกายน';
                                                                        }else if($x==12){
                                                                            $month = 'ธันวาคม';
                                                                        }
							?>								
								<option value="<?php echo $txt.$x?>"  <?php if(($numdoc2local>0)&&($mon1==$txt.$x)){echo 'selected';}else if(($numdoc2local<1)&&(date('m')==$txt.$x)){echo 'selected';}?> ><?php echo $month?> </option>
	
							<?php }	?>
							</select>

							</div>
                            <div class="col-md-3" style="padding-right: 0px;">
                                 <select class="form-control" id="year1" name="year1" >
                               <option value="00">ปี</option>
							<?php for($y=2017; $y<=2032; $y++){ 
						$yearthai = $y+543
							?>								
								<option value="<?php echo $y?>"   <?php if(($numdoc2local>0)&&($year1==$y)){echo 'selected';}else if(date('Y')==$y){echo 'selected';}?>><?php echo $yearthai?></option>
	
							<?php }	?>
							</select>

							</div>
							</div>
                                            </div>
                                            </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-3" style="padding-left:0px">
                            <label >ค่าเบี้ยเลี้ยง จำนวน </label>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" name="travelday" id="travelday" placeholder="จำนวนวัน" data-validate="required" type="number" min="0"/>
                            </div>
                            <div class="col-md-3">
                            <label class="control-label" for="full_name">วัน</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-3" style="padding-left:0px">
                            <label >ค่าเช่าที่พัก จำนวน </label>
                            </div>
                            <div class="col-md-6">
                             <input class="form-control" name="residentday" id="residentday" placeholder="จำนวนวัน" data-validate="required" type="number" min="0"/>
                            </div>
                            <div class="col-md-3">
                            <label class="control-label" for="full_name">วัน</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card-box ">
                        <ul class="nav nav-tabs" style="margin-top: 0px;">                            
                            <li class="nav-item active">
                                <a href="#local" data-toggle="tab" aria-expanded="true" class="nav-link " id="locala" onclick="chcolor('locala','outbounda')">
                                   <i class="fa fa-file-text-o"></i> ค่าใช้จ่ายในประเทศ
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#outbound" data-toggle="tab" aria-expanded="false" class="nav-link " id="outbounda" onclick="chcolor('outbounda','locala')">
                                   <i class="mdi mdi-account-settings-variant "></i> ค่าใช้จ่ายระหว่างประเทศ
                                </a>
                            </li>
                       </ul>
						<div class="tab-content">
                        <div class="tab-pane active" id="local">
				
                            <?php if($numdoc2local>0){ ?>
                    <div class="container1">
                    <?php $e=1;
                          foreach($getdoc2local->result() AS $Data2){
                if(($Data2->dateinput != '') && ($Data2->dateinput != '0000-00-00')){
            $date = $this->Allowance_model->get_month($Data2->dateinput,'3');
            $mon = $this->Allowance_model->get_month($Data2->dateinput,'1');
            $year = $this->Allowance_model->get_month($Data2->dateinput,'4');
                              }else{
                                $date = '';
                                $mon = '';
                                $year = '';
                              }
                              
                              ?>
						<div class="row">
							<div class="col-md-2" >
								<div class="form-group">
									<label class="control-label" for="full_name">ชื่อ </label>
                                    <input class="form-control" name="28[]" id="2_n1" placeholder="ระบุ" value="<?php echo $Data2->n?>" />
								</div>
							</div>

                                                    <div class="col-md-2" >
								<div class="form-group">
									<label class="control-label" for="full_name">ตำแหน่ง</label>
                                    <input class="form-control" name="29[]" id="2_p1" placeholder="ระบุ" value="<?php echo $Data2->p?>"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="full_name">เบี้ยเลี้ยง</label>
                                                                        <input class="form-control Allowance totalall<?php echo $e?>" name="30[]" id="2_priceA1" placeholder="จำนวนเงิน" onchange="sumAllowance('<?php echo $e?>')" value="<?php echo $Data2->priceA?>" type="number" min="0"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label " for="full_name">ค่าที่พัก</label>
									<input class="form-control Accom totalall<?php echo $e?>" name="31[]" id="2_priceB1" placeholder="จำนวนเงิน" onchange="sumAccom('<?php echo $e?>')" value="<?php echo $Data2->priceB?>" type="number" min="0"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="full_name">ค่าพาหนะ</label>
									<input class="form-control Travel totalall<?php echo $e?>" name="32[]" id="2_priceC1" placeholder="จำนวนเงิน" onchange="sumTravel('<?php echo $e?>')" value="<?php echo $Data2->priceC?>" type="number" min="0"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="full_name">ค่าอื่นๆ</label>
									<input class="form-control Other totalall<?php echo $e?>" name="33[]" id="2_priceD1" placeholder="จำนวนเงิน" onchange="sumOther('<?php echo $e?>')" value="<?php echo $Data2->priceD?>" type="number" min="0"/>
								</div>
							</div>

                                                    <div class="col-md-1" >
								<div class="form-group">
									<label class="control-label" for="full_name">รวม</label>
									<input class="form-control totalalla<?php echo $e?>" name="34[]" id="2_sum1" placeholder="จำนวนเงิน" readonly value="<?php echo $Data2->sum?>" type="number"/>
								</div>
							</div>

							<div class="col-md-2" >
								<div class="form-group">
									<label class="control-label" for="birthdate">หมายเหตุ</label>
                                                                        <textarea class="form-control autogrow" name="36[]" id="2_other1" placeholder="หมายเหตุ" style="height:20px"><?php echo $Data2->other?></textarea>
								</div>
							</div>

                            <div class="col-md-1" id="deletea<?php echo $e?>">
								<br>
								<?php if($e==1){ ?>
									<button type="button" class="add_form_field1 btn btn-gold btn-icon">เพิ่มช่อง<i class="entypo-plus"></i> </button>
                                <?php }else{ ?>
                                    <a href="javascript:void(0);" class="delete" onclick="deletea('<?php echo $e?>')">Delete</a>
                               <?php } ?>
							</div>
						</div>
                        <?php $e++; } ?>
                        <input type="hidden" id="x" value="<?php echo $e?>">
					</div>
<?php }else{ ?>
                    
					<div class="container1">
                    <?php $e=1;
                          $get_listNameData = $this->Allowance_model->get_listNameData($idsaraban,$type_travel);

                          $numlistName = $get_listNameData->num_rows();
                          if($numlistName>0){
                               foreach ($get_listNameData->result() AS $get_listNameData2){?>
						<div class="row">
							<div class="col-md-2" >
								<div class="form-group">
									<label class="control-label" for="full_name">ชื่อ</label>
                                    <input class="form-control" name="28[]" id="2_n1" placeholder="ระบุ" value="<?php echo $get_listNameData2->name?>" />
								</div>
							</div>

                                                    <div class="col-md-2" >
								<div class="form-group">
									<label class="control-label" for="full_name">ตำแหน่ง</label>
                                    <input class="form-control" name="29[]" id="2_p1" placeholder="ระบุ" value="<?php echo $get_listNameData2->position?>"/>
								</div>
							</div>

							<div class="col-md-1" >
								<div class="form-group">
									<label class="control-label" for="full_name">เบี้ยเลี้ยง</label>
									<input class="form-control Allowance totalall<?php echo $e?>" name="30[]" id="2_priceA1" placeholder="จำนวนเงิน" onchange="sumAllowance('<?php echo $e?>')" type="number" min="0"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label " for="full_name">ค่าที่พัก</label>
									<input class="form-control Accom totalall<?php echo $e?>" name="31[]" id="2_priceB1" placeholder="จำนวนเงิน" onchange="sumAccom('<?php echo $e?>')" value="<?php echo $Data2->priceB?>" type="number" min="0"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="full_name">ค่าพาหนะ</label>
									<input class="form-control Travel totalall<?php echo $e?>" name="32[]" id="2_priceC1" placeholder="จำนวนเงิน" onchange="sumTravel('<?php echo $e?>')" type="number" min="0"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="full_name">ค่าอื่นๆ</label>
									<input class="form-control Other totalall<?php echo $e?>" name="33[]" id="2_priceD1" placeholder="จำนวนเงิน" onchange="sumOther('<?php echo $e?>')" type="number" min="0"/>
								</div>
							</div>

							<div class="col-md-1" >
								<div class="form-group">
									<label class="control-label" for="full_name">รวม</label>
									<input class="form-control totalalla<?php echo $e?>" name="34[]" id="2_sum1" placeholder="จำนวนเงิน" readonly type="number" min="0"/>
								</div>
							</div>

							

							<div class="col-md-2" >
								<div class="form-group">
									<label class="control-label" for="birthdate">หมายเหตุ</label>
									<textarea class="form-control autogrow" name="36[]" id="2_other1" placeholder="หมายเหตุ"></textarea>
								</div>
							</div>

                            <div class="col-md-1" id="deletea<?php echo $e?>">
								<br>
							<?php if($e==1){?>
								<button type="button" class="add_form_field1 btn btn-gold btn-icon">เพิ่มช่อง<i class="entypo-plus"></i> </button>
                            <?php }else{?>
                                <a href="javascript:void(0);" class="delete" onclick="deletea('<?php echo $e?>')">Delete</a>
                            <?php } ?>
							</div>
						</div>
                        <?php $e++; } }else{ ?>
                                                    <div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label class="control-label" for="full_name">ชื่อ</label>
                                    <input class="form-control" name="28[]" id="2_n1" placeholder="ระบุ" />
								</div>
							</div>

							<div class="col-md-2" >
								<div class="form-group">
									<label class="control-label" for="full_name">ตำแหน่ง</label>
                                    <input class="form-control" name="29[]" id="2_p1" placeholder="ระบุ" />
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="full_name">เบี้ยเลี้ยง</label>
                                    <input class="form-control Allowance totalall<?php echo $e?>" name="30[]" id="2_priceA1" placeholder="จำนวนเงิน" onchange="sumAllowance('<?php echo $e?>')" type="number" min="0"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label " for="full_name">ค่าที่พัก</label>
									<input class="form-control Accom totalall<?php echo $e?>" name="31[]" id="2_priceB1" placeholder="จำนวนเงิน" onchange="sumAccom('<?php echo $e?>')" value="<?php echo $Data2->priceB?>" type="number" min="0"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="full_name">ค่าพาหนะ</label>
									<input class="form-control Travel totalall<?php echo $e?>" name="32[]" id="2_priceC1" placeholder="จำนวนเงิน" onchange="sumTravel('<?php echo $e?>')" type="number" min="0"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="full_name">ค่าอื่นๆ</label>
									<input class="form-control Other totalall<?php echo $e?>" name="33[]" id="2_priceD1" placeholder="จำนวนเงิน" onchange="sumOther('<?php echo $e?>')" type="number" min="0"/>
								</div>
							</div>

							<div class="col-md-1" >
								<div class="form-group">
									<label class="control-label" for="full_name">รวม</label>
									<input class="form-control totalalla<?php echo $e?>" name="34[]" id="2_sum1" placeholder="จำนวนเงิน" readonly type="number" min="0"/>
								</div>
							</div>

							<div class="col-md-2" >
								<div class="form-group">
									<label class="control-label" for="birthdate">หมายเหตุ</label>
									<textarea class="form-control autogrow" name="36[]" id="2_other1" placeholder="หมายเหตุ"></textarea>
								</div>
							</div>

                            <div class="col-md-1" id="deletea<?php echo $e?>">
								<br>								
								<button type="button" class="add_form_field1 btn btn-gold btn-icon">เพิ่มช่อง<i class="entypo-plus"></i> </button>                                               
							</div>
						</div>
                      <?php } ?>
                      <input type="hidden" id="x" value="<?php echo $e?>">
					</div> <!-- div for container1-->
<?php } ?>
                    <div class="row">
						<div class="col-md-1"></div>

						<div class="col-md-1"></div>

						<div class="col-md-2">
							<div class="form-group">
								<br>
								&nbsp;&nbsp;&nbsp; รวมเงิน
							</div>
						</div>

						<div class="col-md-1">
							<div class="form-group">
								<label class="control-label" for="full_name">เบี้ยเลี้ยง</label>
                                <input class="form-control Allowancetotal" name="36_1" id="2_sumA" placeholder="จำนวนเงิน" readonly value="<?php if($numdoc2local>0){echo $doc2local->sumA;}?>" type="number"/>
							</div>
						</div>
						<div class="col-md-1">
							<div class="form-group">
								<label class="control-label" for="full_name">ค่าที่พัก</label>
								<input class="form-control Accomtotal" name="37" id="2_sumB" placeholder="จำนวนเงิน" readonly value="<?php if($numdoc2local>0){echo $doc2local->sumB;}?>" type="number"/>
							</div>
						</div>
						<div class="col-md-1">
							<div class="form-group">
								<label class="control-label" for="full_name">ค่าพาหนะ</label>
								<input class="form-control Traveltotal" name="38" id="2_sumC" placeholder="จำนวนเงิน" readonly value="<?php if($numdoc2local>0){echo $doc2local->sumC;}?>" type="number"/>
							</div>
						</div>

						<div class="col-md-1">
							<div class="form-group">
								<label class="control-label" for="full_name">ค่าอื่นๆ</label>
								<input class="form-control Othertotal" name="39" id="2_sumD" placeholder="จำนวนเงิน" readonly value="<?php if($numdoc2local>0){echo $doc2local->sumD;}?>" type="number"/>
							</div>
						</div>

						<div class="col-md-1" >
							<div class="form-group">
								<label class="control-label" for="full_name">รวม</label>
								<input class="form-control " name="40" id="2_sumAll" placeholder="จำนวนเงิน" readonly value="<?php if($numdoc2local>0){echo $doc2local->sumAll;}?>" type="number"/>
							</div>
						</div>

						<div class="col-md-1"></div>
						<div class="col-md-1"></div>
						<div class="col-md-1"></div>
					</div>
				</div>		
				<div class="tab-pane" id="outbound">
				
                            <?php if($numdoc2outbound>0){ ?>
                    <div class="container1outbound">
                    <?php $c=1;
                          foreach($getdoc2outbound->result() AS $Data2outbound){
                if(($Data2outbound->dateinput != '') && ($Data2outbound->dateinput != '0000-00-00')){
            $date = $this->Allowance_model->get_month($Data2outbound->dateinput,'3');
            $mon = $this->Allowance_model->get_month($Data2outbound->dateinput,'1');
            $year = $this->Allowance_model->get_month($Data2outbound->dateinput,'4');
                              }else{
                                $date = '';
                                $mon = '';
                                $year = '';
                              }
                              
                              ?>
						<div class="row">
							<div class="col-md-2" >
								<div class="form-group">
									<label class="control-label" for="full_name">ชื่อ </label>
                                    <input class="form-control" name="28outbound[]" id="2_noutbound1" placeholder="ระบุ" value="<?php echo $Data2outbound->n?>" />
								</div>
							</div>

							<div class="col-md-2" >
								<div class="form-group">
									<label class="control-label" for="full_name">ตำแหน่ง</label>
                                    <input class="form-control" name="29outbound[]" id="2_poutbound1" placeholder="ระบุ" value="<?php echo $Data2outbound->p?>"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="full_name">เบี้ยเลี้ยง</label>
									<input class="form-control Allowanceoutbound totalalloutbound<?php echo $c?>" name="30outbound[]" id="2_priceAoutbound1" placeholder="จำนวนเงิน" onchange="sumAllowanceoutbound('<?php echo $e?>')" value="<?php echo $Data2outbound->priceA?>" type="number" min="0"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label " for="full_name">ค่าที่พัก</label>
									<input class="form-control Accomoutbound totalalloutbound<?php echo $c?>" name="31outbound[]" id="2_priceBoutbound1" placeholder="จำนวนเงิน" onchange="sumAccomoutbound('<?php echo $c?>')" value="<?php echo $Data2outbound->priceB?>" type="number" min="0"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="full_name">ค่าพาหนะ</label>
									<input class="form-control Traveloutbound totalalloutbound<?php echo $c?>" name="32outbound[]" id="2_priceCoutbound1" placeholder="จำนวนเงิน" onchange="sumTraveloutbound('<?php echo $c?>')" value="<?php echo $Data2outbound->priceC?>" type="number" min="0"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="full_name">ค่าอื่นๆ</label>
									<input class="form-control Otheroutbound totalalloutbound<?php echo $c?>" name="33outbound[]" id="2_priceDoutbound1" placeholder="จำนวนเงิน" onchange="sumOtheroutbound('<?php echo $c?>')" value="<?php echo $Data2outbound->priceD?>" type="number" min="0"/>
								</div>
							</div>

                                                    <div class="col-md-1" >
								<div class="form-group">
									<label class="control-label" for="full_name">รวม</label>
									<input class="form-control totalallaoutbound<?php echo $c?>" name="34outbound[]" id="2_sumoutbound1" placeholder="จำนวนเงิน" readonly value="<?php echo $Data2outbound->sum?>" type="number"/>
								</div>
							</div>

							<div class="col-md-2" style="padding-left:0px;padding-right: 0px">
								<div class="form-group">
									<label class="control-label" for="birthdate">หมายเหตุ</label>
									<textarea class="form-control autogrow" name="36outbound[]" id="2_otheroutbound1" placeholder="หมายเหตุ"><?php echo $Data2outbound->other?></textarea>
								</div>
							</div>

                            <div class="col-md-1" id="deleteaoutbound<?php echo $c?>">
								<br>
								<?php if($c==1){ ?>
									<button type="button" class="add_form_field1outbound btn btn-gold btn-icon">เพิ่มช่อง<i class="entypo-plus"></i> </button>
                                <?php }else{ ?>
                                    <a href="javascript:void(0);" class="delete" onclick="deleteaoutbound('<?php echo $c?>')">Delete</a>
                               <?php } ?>
							</div>
						</div>
                        <?php $c++; } ?>
                        <input type="hidden" id="x" value="<?php echo $c?>">
					</div>
<?php }else{ ?>
                    
					<div class="container1outbound">
                    <?php $c=1;
                          $get_listNameData1 = $this->Allowance_model->get_listNameData($idsaraban,$type_travel);

                          $numlistName = $get_listNameData1->num_rows();
                          if($numlistName>0){
                               foreach ($get_listNameData1->result() AS $get_listNameData3){?>
						<div class="row">
							<div class="col-md-2" >
								<div class="form-group">
									<label class="control-label" for="full_name">ชื่อ</label>
                                    <input class="form-control" name="28outbound[]" id="2_noutbound1" placeholder="ระบุ" value="<?php echo $get_listNameData3->name?>" />
								</div>
							</div>

                                                    <div class="col-md-2" >
								<div class="form-group">
									<label class="control-label" for="full_name">ตำแหน่ง</label>
                                    <input class="form-control" name="29outbound[]" id="2_poutbound1" placeholder="ระบุ" value="<?php echo $get_listNameData3->position?>"/>
								</div>
							</div>

							<div class="col-md-1" >
								<div class="form-group">
									<label class="control-label" for="full_name">เบี้ยเลี้ยง</label>
									<input class="form-control Allowanceoutbound totalalloutbound<?php echo $c?>" name="30outbound[]" id="2_priceAoutbound1" placeholder="จำนวนเงิน"  onchange="sumAllowanceoutbound('<?php echo $c?>')" type="number" min="0"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label " for="full_name">ค่าที่พัก</label>
									<input class="form-control Accomoutbound totalalloutbound<?php echo $c?>" name="31outbound[]" id="2_priceBoutbound1" placeholder="จำนวนเงิน" onchange="sumAccomoutbound('<?php echo $c?>')"  type="number" min="0"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="full_name">ค่าพาหนะ</label>
									<input class="form-control Traveloutbound totalalloutbound<?php echo $c?>" name="32outbound[]" id="2_priceCoutbound1" placeholder="จำนวนเงิน" onchange="sumTraveloutbound('<?php echo $c?>')" type="number" min="0"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="full_name">ค่าอื่นๆ</label>
									<input class="form-control Otheroutbound totalalloutbound<?php echo $c?>" name="33outbound[]" id="2_priceDoutbound1" placeholder="จำนวนเงิน"  onchange="sumOtheroutbound('<?php echo $c?>')" type="number" min="0"/>
								</div>
							</div>

							<div class="col-md-1" >
								<div class="form-group">
									<label class="control-label" for="full_name">รวม</label>
									<input class="form-control totalallaoutbound<?php echo $c?>" name="34outbound[]" id="2_sumoutbound1" placeholder="จำนวนเงิน" readonly type="number"/>
								</div>
							</div>

							

							<div class="col-md-2" >
								<div class="form-group">
									<label class="control-label" for="birthdate">หมายเหตุ</label>
									<textarea class="form-control autogrow" name="36outbound[]" id="2_otheroutbound1" placeholder="หมายเหตุ"></textarea>
								</div>
							</div>

                            <div class="col-md-1" id="deleteaoutbound<?php echo $c?>">
								<br>
							<?php if($c==1){?>
								<button type="button" class="add_form_field1outbound btn btn-gold btn-icon">เพิ่มช่อง<i class="entypo-plus"></i> </button>
                            <?php }else{?>
                                <a href="javascript:void(0);" class="delete" onclick="deleteaoutbound('<?php echo $c?>')">Delete</a>
                            <?php } ?>
							</div>
						</div>
                        <?php $c++; } }else{ ?>
                                                    <div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label class="control-label" for="full_name">ชื่อ</label>
                                    <input class="form-control" name="28outbound[]" id="2_noutbound1" placeholder="ระบุ"  />
								</div>
							</div>

							<div class="col-md-2" >
								<div class="form-group">
									<label class="control-label" for="full_name">ตำแหน่ง</label>
                                    <input class="form-control" name="29outbound[]" id="2_poutbound1" placeholder="ระบุ"  />
								</div>
							</div>
                                                        <div class="col-md-1" >
								<div class="form-group">
									<label class="control-label" for="full_name">เบี้ยเลี้ยง</label>
									<input class="form-control Allowanceoutbound totalalloutbound<?php echo $c?>" name="30outbound[]" id="2_priceAoutbound1" placeholder="จำนวนเงิน"   onchange="sumAllowanceoutbound('<?php echo $c?>')" type="number" min="0"/>
								</div>
							</div>
							 

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label " for="full_name">ค่าที่พัก</label>
									<input class="form-control Accomoutbound totalalloutbound<?php echo $c?>" name="31outbound[]" id="2_priceBoutbound1" placeholder="จำนวนเงิน"  onchange="sumAccomoutbound('<?php echo $c?>')"  type="number" min="0"/>
								</div>
							</div>
                                                       

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label " for="full_name">ค่าที่พัก</label>
									<input class="form-control Accomoutbound totalalloutbound<?php echo $c?>" name="31outbound[]" id="2_priceBoutbound1" placeholder="จำนวนเงิน"  onchange="sumAccomoutbound('<?php echo $c?>')" type="number" min="0"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="full_name">ค่าพาหนะ</label>
									<input class="form-control Traveloutbound totalalloutbound<?php echo $c?>" name="32outbound[]" id="2_priceCoutbound1" placeholder="จำนวนเงิน"  onchange="sumTraveloutbound('<?php echo $c?>')" type="number" min="0"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="full_name">ค่าอื่นๆ</label>
									<input class="form-control Otheroutbound totalalloutbound<?php echo $c?>" name="33outbound[]" id="2_priceDoutbound1" placeholder="จำนวนเงิน"  onchange="sumOtheroutbound('<?php echo $c?>')" type="number" min="0"/>
								</div>
							</div>

							<div class="col-md-1" >
								<div class="form-group">
									<label class="control-label" for="full_name">รวม</label>
									<input class="form-control totalallaoutbound<?php echo $c?>" name="34outbound[]" id="2_sumoutbound1" placeholder="จำนวนเงิน"  readonly type="number"/>
								</div>
							</div>

							

							<div class="col-md-2" >
								<div class="form-group">
									<label class="control-label" for="birthdate">หมายเหตุ</label>
									<textarea class="form-control autogrow" name="36outbound[]"  id="2_otheroutbound1" placeholder="หมายเหตุ"></textarea>
								</div>
							</div>

                            <div class="col-md-1" id="deleteaoutbound<?php echo $c?>">
								<br>								
								<button type="button" class="add_form_field1outbound btn btn-gold btn-icon">เพิ่มช่อง<i class="entypo-plus"></i> </button>                                               
							</div>
						</div>
                      <?php } ?>
                      <input type="hidden" id="x" value="<?php echo $c?>">
					</div> <!-- div for container1-->
<?php } ?>
                    <div class="row">
						<div class="col-md-1"></div>

						<div class="col-md-1"></div>

						<div class="col-md-2">
							<div class="form-group">
								<br>
								&nbsp;&nbsp;&nbsp; รวมเงิน
							</div>
						</div>

						<div class="col-md-1">
							<div class="form-group">
								<label class="control-label" for="full_name">เบี้ยเลี้ยง</label>
                                <input class="form-control Allowancetotaloutbound" name="36_1outbound" id="2_sumAoutbound" placeholder="จำนวนเงิน"   readonly value="<?php if($numdoc2outbound>0){echo $doc2outbound->sumA;}?>" type="number" min="0"/>
							</div>
						</div>
						<div class="col-md-1">
							<div class="form-group">
								<label class="control-label" for="full_name">ค่าที่พัก</label>
								<input class="form-control Accomtotaloutbound" name="37outbound" id="2_sumBoutbound" placeholder="จำนวนเงิน"  readonly value="<?php if($numdoc2outbound>0){echo $doc2outbound->sumB;}?>" type="number" min="0"/>
							</div>
						</div>
						<div class="col-md-1">
							<div class="form-group">
								<label class="control-label" for="full_name">ค่าพาหนะ</label>
								<input class="form-control Traveltotaloutbound" name="38outbound" id="2_sumCoutbound" placeholder="จำนวนเงิน"  readonly value="<?php if($numdoc2outbound>0){echo $doc2outbound->sumC;}?>" type="number" min="0"/>
							</div>
						</div>

						<div class="col-md-1">
							<div class="form-group">
								<label class="control-label" for="full_name">ค่าอื่นๆ</label>
								<input class="form-control Othertotaloutbound" name="39outbound" id="2_sumDoutbound" placeholder="จำนวนเงิน" readonly value="<?php if($numdoc2outbound>0){echo $doc2outbound->sumD;}?>" type="number" min="0"/>
							</div>
						</div>

						<div class="col-md-1" >
							<div class="form-group">
								<label class="control-label" for="full_name">รวม</label>
								<input class="form-control " name="40outbound" id="2_sumAlloutbound" placeholder="จำนวนเงิน" readonly value="<?php if($numdoc2outbound>0){echo $doc2outbound->sumAll;}?>" type="number"/>
							</div>
						</div>

						<div class="col-md-1"></div>
						<div class="col-md-1"></div>
						<div class="col-md-1"></div>
					</div>
				</div>
				</div>
						
				</div>
				<div class="row">
						<div class="col-md-6">
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="full_name">รวมเงินทั้งสิ้น (ใบเสร็จรับเงินสมบูรณ์)</label>
								<input class="form-control" name="25" id="1_sumprice" placeholder="รวมเงิน" readonly value="" type="number" min = "0"/>
							</div>
						</div>
					</div>
                    
                    
                    
                                        <div class="form-group">
						<div class="checkbox checkbox-replace color-primary">
                                                    <input type="checkbox" name="chkshowdiv" id="chk-showdiv" onclick="showdiv()" value="1" <?php if(($numdoc1>0)&&($Data->checkno!=null)){echo 'checked';}?>>
							<label for="chk-showdiv">กรณีไม่มี ใบเสร็จรับเงิน หรือ ใบเสร็จรับเงินไม่สมบูรณ์ (ยกเว้นค่าเบี้ยเลี้ยง)</label>
							
						</div>
					</div>

                                    <div class="form-group" id="showdiv" <?php if(($numdoc1>0)&&($Data->checkno!=null)){?>style=""<?php }else{?>style="display:none"<?php }?>>
						<div class="container3">
                                                    
                                                    <?php $n=1;
                                                    
                                                    if($doc1_id>0){$numdoc_3 = $getdoc3->num_rows();
                                                    if($numdoc_3>0){foreach ($getdoc3->result() AS $Data3){
                  if(($Data3->date != '') && ($Data3->date != '0000-00-00')){
            $datedoc3 = $this->Allowance_model->get_month($Data3->date,'3');
            $mondoc3 = $this->Allowance_model->get_month($Data3->date,'1');
            $yeardoc3 = $this->Allowance_model->get_month($Data3->date,'4');
                              }else{
                                $datedoc3 = '';
                                $mondoc3 = '';
                                $yeardoc3 = '';
                              }
                                                        
                                                        ?>
                                                    
						<div class="row" >
							<div class="col-md-3">
								<div class="form-group">
                                 <div class="col-md-12" style="padding-left: 0px;">
                                      <label class="control-label" for="birthdate">วันที่/เดือน/ปี</label>
                                 </div><br>
                                 <div class="col-md-3" style="padding-right: 0px;padding-left: 0px">
                                      <select class="form-control" id="daydoc3<?php echo $n?>" name="daydoc3[]" >
                               <option value="00">วัน</option>
							<?php for($a=1; $a<=31; $a++){ 
								
									if($a < 10){  $txt = '0';  } else { $txt =''; }
							?>								
                                                                <option value="<?php echo $txt.$a?>"    <?php if(($numdoc_3>0)&&($datedoc3==$txt.$a)){echo 'selected';}else if(($numdoc_3<1)&&(date('d')==$txt.$a)){echo 'selected';}?>><?php echo $a?></option>	
							<?php }	?>
							</select>
<!--                                                                    <input class="form-control" type="time" id="timestart" name="timestart" value="<?php //if($doc1_id!=''){echo $timestart;}else{echo date("H:i");} ?>" />-->
							</div>
                            <div class="col-md-5" style="padding-right: 0px;">
                                 <select class="form-control" id="monthdoc3<?php echo $n?>" name="monthdoc3[]" >
                               <option value="00">เดือน</option>
							<?php for($x=1; $x<=12; $x++){ 
								
									if($x < 10){  $txt = '0';  } else { $txt =''; } 
                                                                        if($x==1){
                                                                            $month = 'มกราคม';
                                                                        }else if($x==2){
                                                                            $month = 'กุมภาพันธ์';
                                                                        }else if($x==3){
                                                                            $month = 'มีนาคม';
                                                                        }else if($x==4){
                                                                            $month = 'เมษายน';
                                                                        }else if($x==5){
                                                                            $month = 'พฤษภาคม';
                                                                        }else if($x==6){
                                                                            $month = 'มิถุนายน';
                                                                        }else if($x==7){
                                                                            $month = 'กรกฎาคม';
                                                                        }else if($x==8){
                                                                            $month = 'สิงหาคม';
                                                                        }else if($x==9){
                                                                            $month = 'กันยายน';
                                                                        }else if($x==10){
                                                                            $month = 'ตุลาคม';
                                                                        }else if($x==11){
                                                                            $month = 'พฤศจิกายน';
                                                                        }else if($x==12){
                                                                            $month = 'ธันวาคม';
                                                                        }
							?>								
								<option value="<?php echo $txt.$x?>"  <?php if(($numdoc_3>0)&&($mondoc3==$txt.$x)){echo 'selected';}else if(($numdoc_3<1)&&(date('m')==$txt.$x)){echo 'selected';}?> ><?php echo $month?> </option>
	
							<?php }	?>
							</select>

							</div>
                            <div class="col-md-4" style="padding-right: 0px;">
                                 <select class="form-control" id="yeardoc3<?php echo $n?>" name="yeardoc3[]" >
                               <option value="00">ปี</option>
							<?php for($y=2017; $y<=2032; $y++){ 
						$yearthai = $y+543
							?>								
								<option value="<?php echo $y?>"   <?php if(($numdoc_3>0)&&($yeardoc3==$y)){echo 'selected';}else if(($numdoc_3<1)&&(date('Y')==$y)){echo 'selected';}?>><?php echo $yearthai?></option>
	
							<?php }	?>
							</select>

							</div>
							</div>
							</div>
							

							<div class="col-md-3">
								<div class="form-group">
									<label class="control-label" for="full_name">รายละเอียดรายจ่าย</label>
                                                                         <select name="43[]" id="3_detail<?php echo $n?>" class="form-control" ><option value="">-------โปรดเลือก------</option>
                                                                             <option value="ค่าเช่าที่พัก" <?php if($Data3->detail=='ค่าเช่าที่พัก'){echo 'selected';}?>>ค่าเช่าที่พัก</option>
                        <option value="ค่าพาหนะ" <?php if($Data3->detail=='ค่าพาหนะ'){echo 'selected';}?>>ค่าพาหนะ</option>
										
								</select> 
<!--									<input class="form-control" name="43[]"  data-validate="required" placeholder="รายละเอียดรายจ่าย" />-->
								</div>
							</div>
                                                    <div class="col-md-4">
								<div class="form-group">
									<label class="control-label" for="birthdate">รายละเอียด</label>
									<input class="form-control" name="45[]" id="3_other<?php echo $n?>" data-validate="required" placeholder="รายละเอียด" value="<?php echo $Data3->other?>"/>
                                                                         <input class="form-control" name="textselect[]" id="textselect" value="1" type="hidden"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="birthdate">จำนวนเงิน</label>
									<input class="form-control qty1" name="44[]" id="3_price<?php echo $n?>" data-validate="required" placeholder="จำนวนเงิน" onchange="sumqty()" value="<?php echo $Data3->price?>" type="number" min = "0"/>
								</div>
							</div>

							

							<div class="col-md-1" id="delete<?php echo $n?>">
								<br>
                                                                <?php if($n==1){?>
								<button type="button" class="add_form_field3 btn btn-gold btn-icon">เพิ่มช่อง<i class="entypo-plus"></i> </button>
                                                                <?php }else{?>
                                                                <a href="javascript:void(0);" onclick="deletedoc_3('<?php echo $Data3->id?>','tbl_doc_3','<?php echo $n?>')">Delete</a>
                                                                <?php }?>
							</div>
						</div>
                                                    <?php $n++;}}else{?>
                                                   
                                                    <div class="row">
							<div class="col-md-3">
								<div class="form-group">
                                 <div class="col-md-12" style="padding-left: 0px;">
                                      <label class="control-label" for="birthdate">วันที่/เดือน/ปี</label>
                                 </div><br>
                                 <div class="col-md-3" style="padding-right: 0px;padding-left: 0px">
                                      <select class="form-control" id="daydoc31" name="daydoc3[]" >
                               <option value="00">วัน</option>
							<?php for($a=1; $a<=31; $a++){ 
								
									if($a < 10){  $txt = '0';  } else { $txt =''; }
							?>								
                                                                <option value="<?php echo $txt.$a?>"    <?php  if(date('d')==$txt.$a){echo 'selected';}?>><?php echo $a?></option>	
							<?php }	?>
							</select>

							</div>
                            <div class="col-md-5" style="padding-right: 0px;">
                                 <select class="form-control" id="monthdoc31" name="monthdoc3[]" >
                               <option value="00">เดือน</option>
							<?php for($x=1; $x<=12; $x++){ 
								
									if($x < 10){  $txt = '0';  } else { $txt =''; } 
                                                                        if($x==1){
                                                                            $month = 'มกราคม';
                                                                        }else if($x==2){
                                                                            $month = 'กุมภาพันธ์';
                                                                        }else if($x==3){
                                                                            $month = 'มีนาคม';
                                                                        }else if($x==4){
                                                                            $month = 'เมษายน';
                                                                        }else if($x==5){
                                                                            $month = 'พฤษภาคม';
                                                                        }else if($x==6){
                                                                            $month = 'มิถุนายน';
                                                                        }else if($x==7){
                                                                            $month = 'กรกฎาคม';
                                                                        }else if($x==8){
                                                                            $month = 'สิงหาคม';
                                                                        }else if($x==9){
                                                                            $month = 'กันยายน';
                                                                        }else if($x==10){
                                                                            $month = 'ตุลาคม';
                                                                        }else if($x==11){
                                                                            $month = 'พฤศจิกายน';
                                                                        }else if($x==12){
                                                                            $month = 'ธันวาคม';
                                                                        }
							?>								
								<option value="<?php echo $txt.$x?>"  <?php if(date('m')==$txt.$x){echo 'selected';}?> ><?php echo $month?> </option>
	
							<?php }	?>
							</select>

							</div>
                            <div class="col-md-4" style="padding-right: 0px;">
                                 <select class="form-control" id="yeardoc31" name="yeardoc3[]" >
                               <option value="00">ปี</option>
							<?php for($y=2017; $y<=2032; $y++){ 
						$yearthai = $y+543
							?>								
								<option value="<?php echo $y?>"   <?php if(date('Y')==$y){echo 'selected';}?>><?php echo $yearthai?></option>
	
							<?php }	?>
							</select>

							</div>
							</div>
							</div>
							

							<div class="col-md-3">
								<div class="form-group">
									<label class="control-label" for="full_name">รายละเอียดรายจ่าย</label>
                                                                         <select name="43[]" id="3_detail1" class="form-control" ><option value="">-------โปรดเลือก------</option><option value="ค่าเช่าที่พัก">ค่าเช่าที่พัก</option><option value="ค่าพาหนะ">ค่าพาหนะ</option>
										
								</select> 
<!--									<input class="form-control" name="43[]"  data-validate="required" placeholder="รายละเอียดรายจ่าย" />-->
								</div>
							</div>

                                                        <div class="col-md-4">
								<div class="form-group">
									<label class="control-label" for="birthdate">รายละเอียด</label>
									<input class="form-control" name="45[]" id="3_other1" data-validate="required" placeholder="รายละเอียด" />
                                                                        <input class="form-control" name="textselect[]" id="textselect" value="1" type="hidden" />
								</div>
							</div>
							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="birthdate">จำนวนเงิน</label>
									<input class="form-control qty1" name="44[]" id="3_price1" data-validate="required" placeholder="จำนวนเงิน" onchange="sumqty()" type="number" min = "0"/>
								</div>
							</div>

							

							<div class="col-md-1">
								<br>
								<button type="button" class="add_form_field3 btn btn-gold btn-icon">เพิ่มช่อง<i class="entypo-plus"></i> </button>
							</div>
						</div>
                                                     <?php }?>
                                                              <?php  }else{?>
                                                    <div class="row">
							<div class="col-md-3">
								<div class="form-group">
                                 <div class="col-md-12" style="padding-left: 0px;">
                                      <label class="control-label" for="birthdate">วันที่/เดือน/ปี</label>
                                 </div><br>
                                 <div class="col-md-3" style="padding-right: 0px;padding-left: 0px">
                                      <select class="form-control" id="daydoc31" name="daydoc3[]" >
                               <option value="00">วัน</option>
							<?php for($a=1; $a<=31; $a++){ 
								
									if($a < 10){  $txt = '0';  } else { $txt =''; }
							?>								
                                                                <option value="<?php echo $txt.$a?>"    <?php  if(date('d')==$txt.$a){echo 'selected';}?>><?php echo $a?></option>	
							<?php }	?>
							</select>

							</div>
                            <div class="col-md-5" style="padding-right: 0px;">
                                 <select class="form-control" id="monthdoc31" name="monthdoc3[]" >
                               <option value="00">เดือน</option>
							<?php for($x=1; $x<=12; $x++){ 
								
									if($x < 10){  $txt = '0';  } else { $txt =''; } 
                                                                        if($x==1){
                                                                            $month = 'มกราคม';
                                                                        }else if($x==2){
                                                                            $month = 'กุมภาพันธ์';
                                                                        }else if($x==3){
                                                                            $month = 'มีนาคม';
                                                                        }else if($x==4){
                                                                            $month = 'เมษายน';
                                                                        }else if($x==5){
                                                                            $month = 'พฤษภาคม';
                                                                        }else if($x==6){
                                                                            $month = 'มิถุนายน';
                                                                        }else if($x==7){
                                                                            $month = 'กรกฎาคม';
                                                                        }else if($x==8){
                                                                            $month = 'สิงหาคม';
                                                                        }else if($x==9){
                                                                            $month = 'กันยายน';
                                                                        }else if($x==10){
                                                                            $month = 'ตุลาคม';
                                                                        }else if($x==11){
                                                                            $month = 'พฤศจิกายน';
                                                                        }else if($x==12){
                                                                            $month = 'ธันวาคม';
                                                                        }
							?>								
								<option value="<?php echo $txt.$x?>"  <?php if(date('m')==$txt.$x){echo 'selected';}?> ><?php echo $month?> </option>
	
							<?php }	?>
							</select>

							</div>
                            <div class="col-md-4" style="padding-right: 0px;">
                                 <select class="form-control" id="yeardoc31" name="yeardoc3[]" >
                               <option value="00">ปี</option>
							<?php for($y=2017; $y<=2032; $y++){ 
						$yearthai = $y+543
							?>								
								<option value="<?php echo $y?>"   <?php if(date('Y')==$y){echo 'selected';}?>><?php echo $yearthai?></option>
	
							<?php }	?>
							</select>

							</div>
							</div>
							</div>
							

							<div class="col-md-3">
								<div class="form-group">
									<label class="control-label" for="full_name">รายละเอียดรายจ่าย</label>
                                                                         <select name="43[]" id="3_detail1" class="form-control" ><option value="">-------โปรดเลือก------</option><option value="ค่าเช่าที่พัก">ค่าเช่าที่พัก</option><option value="ค่าพาหนะ">ค่าพาหนะ</option>
										
								</select> 
<!--									<input class="form-control" name="43[]"  data-validate="required" placeholder="รายละเอียดรายจ่าย" />-->
								</div>
							</div>
                                                        <div class="col-md-4">
								<div class="form-group">
									<label class="control-label" for="birthdate">รายละเอียด</label>
									<input class="form-control" name="45[]" id="3_other1" data-validate="required" placeholder="รายละเอียด" />
                                                                        <input class="form-control" name="textselect[]" id="textselect" value="1" type="hidden" />
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="birthdate">จำนวนเงิน</label>
									<input class="form-control qty1" name="44[]" id="3_price1" data-validate="required" placeholder="จำนวนเงิน" onchange="sumqty()" type="number" min = "0"/>
								</div>
							</div>

							
							<div class="col-md-1">
								<br>
								<button type="button" class="add_form_field3 btn btn-gold btn-icon">เพิ่มช่อง<i class="entypo-plus"></i> </button>
							</div>
						</div>
                                                    <?php }?>
                                                     <input type="hidden" id="z" value="<?php echo $n?>">
					</div><!--div container3-->
<div class="form-group">
						<div class="checkbox checkbox-replace color-primary">
                                                    <input type="checkbox" name="chkshowauthor" id="chk-showauthor" onclick="showauthor()" value="1" <?php if(($numdoc1>0)&&($Data->checkexpenses!=null)){echo 'checked';}?>>
							<label for="chk-showauthor">ค่าใช้จ่ายอื่นๆ</label>
<!--							<p></p>-->
						</div>
					</div>
                                        <div class="form-group" id="showauthor" <?php if(($numdoc1>0)&&($Data->checkexpenses!=null)){?>style=""<?php }else{?>style="display:none"<?php }?>>
						<div class="container4">
                                                     <?php $a=1;
                                                   
                                                    if($numdoc1>0){$numdoc_3_1 = $getdoc3_1->num_rows();
                                                    if($numdoc_3_1>0){foreach ($getdoc3_1->result() AS $Data3_1){
                     if(($Data3_1->date != '') && ($Data3_1->date != '0000-00-00')){
            $datedoc3_1 = $this->Allowance_model->get_month($Data3_1->date,'3');
            $mondoc3_1 = $this->Allowance_model->get_month($Data3_1->date,'1');
            $yeardoc3_1 = $this->Allowance_model->get_month($Data3_1->date,'4');
                              }else{
                                $datedoc3_1 = '';
                                $mondoc3_1 = '';
                                $yeardoc3_1 = '';
                              }
                                                        
                                                        
                                                        ?>
                                                   
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
                                 <div class="col-md-12" style="padding-left: 0px;">
                                      <label class="control-label" for="birthdate">วันที่/เดือน/ปี</label>
                                 </div><br>
                                 <div class="col-md-3" style="padding-right: 0px;padding-left: 0px">
                                      <select class="form-control" id="daydoc3_1<?php echo $n?>" name="daydoc3_1[]" >
                               <option value="00">วัน</option>
							<?php for($a=1; $a<=31; $a++){ 
								
									if($a < 10){  $txt = '0';  } else { $txt =''; }
							?>								
                                                                <option value="<?php echo $txt.$a?>"    <?php if(($numdoc_3_1>0)&&($datedoc3_1==$txt.$a)){echo 'selected';}else if(($numdoc_3_1<1)&&(date('d')==$txt.$a)){echo 'selected';}?>><?php echo $a?></option>	
							<?php }	?>
							</select>
<!--                                                                    <input class="form-control" type="time" id="timestart" name="timestart" value="<?php //if($doc1_id!=''){echo $timestart;}else{echo date("H:i");} ?>" />-->
							</div>
                            <div class="col-md-5" style="padding-right: 0px;">
                                 <select class="form-control" id="monthdoc3_1<?php echo $n?>" name="monthdoc3_1[]" >
                               <option value="00">เดือน</option>
							<?php for($x=1; $x<=12; $x++){ 
								
									if($x < 10){  $txt = '0';  } else { $txt =''; } 
                                                                        if($x==1){
                                                                            $month = 'มกราคม';
                                                                        }else if($x==2){
                                                                            $month = 'กุมภาพันธ์';
                                                                        }else if($x==3){
                                                                            $month = 'มีนาคม';
                                                                        }else if($x==4){
                                                                            $month = 'เมษายน';
                                                                        }else if($x==5){
                                                                            $month = 'พฤษภาคม';
                                                                        }else if($x==6){
                                                                            $month = 'มิถุนายน';
                                                                        }else if($x==7){
                                                                            $month = 'กรกฎาคม';
                                                                        }else if($x==8){
                                                                            $month = 'สิงหาคม';
                                                                        }else if($x==9){
                                                                            $month = 'กันยายน';
                                                                        }else if($x==10){
                                                                            $month = 'ตุลาคม';
                                                                        }else if($x==11){
                                                                            $month = 'พฤศจิกายน';
                                                                        }else if($x==12){
                                                                            $month = 'ธันวาคม';
                                                                        }
							?>								
								<option value="<?php echo $txt.$x?>"  <?php if(($numdoc_3_1>0)&&($mondoc3_1==$txt.$x)){echo 'selected';}else if(($numdoc_3_1<1)&&(date('m')==$txt.$x)){echo 'selected';}?> ><?php echo $month?> </option>
	
							<?php }	?>
							</select>

							</div>
                            <div class="col-md-4" style="padding-right: 0px;">
                                 <select class="form-control" id="yeardoc3_1<?php echo $n?>" name="yeardoc3_1[]" >
                               <option value="00">ปี</option>
							<?php for($y=2017; $y<=2032; $y++){ 
						$yearthai = $y+543
							?>								
								<option value="<?php echo $y?>"   <?php if(($numdoc_3_1>0)&&($yeardoc3_1==$y)){echo 'selected';}else if(($numdoc_3_1<1)&&(date('Y')==$y)){echo 'selected';}?>><?php echo $yearthai?></option>
	
							<?php }	?>
							</select>

							</div>
							</div>
							</div>
							

							<div class="col-md-3">
								<div class="form-group">
									<label class="control-label" for="full_name">รายละเอียดรายจ่าย</label>
                                                                        <input class="form-control" name="47[]" id="4_detail<?php echo $a?>" data-validate="required" placeholder="รายละเอียดค่ายใช้จ่ายอื่น ๆ" value="<?php echo $Data3_1->detail ?>" />
										
								</select> 
<!--									<input class="form-control" name="43[]"  data-validate="required" placeholder="รายละเอียดรายจ่าย" />-->
								</div>
							</div>
<div class="col-md-4">
								<div class="form-group">
									<label class="control-label" for="birthdate">รายละเอียด</label>
									<input class="form-control" name="49[]" id="4_other<?php echo $a?>" data-validate="required" placeholder="รายละเอียด" value="<?php echo $Data3_1->other ?>"/>
                                                                        <input class="form-control" name="textinput[]" id="textinput" value="2" type="hidden"/>
								</div>
							</div>
							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="birthdate">จำนวนเงิน</label>
									<input class="form-control qty1" name="48[]" id="4_price<?php echo $a?>" data-validate="required" placeholder="จำนวนเงิน" onchange="sumqty()" value="<?php echo $Data3_1->price ?>" type="number" min = "0"/>
								</div>
							</div>

							
                                                    
							<div class="col-md-1" id="deletet<?php echo $a?>">
								<br>
                                                                <?php if($a==1){?>
								<button type="button" class="add_form_field4 btn btn-gold btn-icon">เพิ่มช่อง<i class="entypo-plus"></i> </button>
                                                                <?php }else{?>
                                                                <a href="javascript:void(0);" onclick="deletedoc_3_1('<?php echo $Data3_1->id?>','tbl_doc_3','<?php echo $a?>')" class="delete">Delete</a>
                                                                <?php }?>
							</div>
						</div>
                                                    <?php $a++;}}else{?>
                                                    <div class="row">
							<div class="col-md-3">
								<div class="form-group">
                                 <div class="col-md-12" style="padding-left: 0px;">
                                      <label class="control-label" for="birthdate">วันที่/เดือน/ปี</label>
                                 </div><br>
                                 <div class="col-md-3" style="padding-right: 0px;padding-left: 0px">
                                      <select class="form-control" id="daydoc3_1" name="daydoc3_1[]" >
                               <option value="00">วัน</option>
							<?php for($a=1; $a<=31; $a++){ 
								
									if($a < 10){  $txt = '0';  } else { $txt =''; }
							?>								
                                                                <option value="<?php echo $txt.$a?>"    <?php  if(date('d')==$txt.$a){echo 'selected';}?>><?php echo $a?></option>	
							<?php }	?>
							</select>

							</div>
                            <div class="col-md-5" style="padding-right: 0px;">
                                 <select class="form-control" id="monthdoc3_1" name="monthdoc3_1[]" >
                               <option value="00">เดือน</option>
							<?php for($x=1; $x<=12; $x++){ 
								
									if($x < 10){  $txt = '0';  } else { $txt =''; } 
                                                                        if($x==1){
                                                                            $month = 'มกราคม';
                                                                        }else if($x==2){
                                                                            $month = 'กุมภาพันธ์';
                                                                        }else if($x==3){
                                                                            $month = 'มีนาคม';
                                                                        }else if($x==4){
                                                                            $month = 'เมษายน';
                                                                        }else if($x==5){
                                                                            $month = 'พฤษภาคม';
                                                                        }else if($x==6){
                                                                            $month = 'มิถุนายน';
                                                                        }else if($x==7){
                                                                            $month = 'กรกฎาคม';
                                                                        }else if($x==8){
                                                                            $month = 'สิงหาคม';
                                                                        }else if($x==9){
                                                                            $month = 'กันยายน';
                                                                        }else if($x==10){
                                                                            $month = 'ตุลาคม';
                                                                        }else if($x==11){
                                                                            $month = 'พฤศจิกายน';
                                                                        }else if($x==12){
                                                                            $month = 'ธันวาคม';
                                                                        }
							?>								
								<option value="<?php echo $txt.$x?>"  <?php if(date('m')==$txt.$x){echo 'selected';}?> ><?php echo $month?> </option>
	
							<?php }	?>
							</select>

							</div>
                            <div class="col-md-4" style="padding-right: 0px;">
                                 <select class="form-control" id="yeardoc3_1" name="yeardoc3_1[]" >
                               <option value="00">ปี</option>
							<?php for($y=2017; $y<=2032; $y++){ 
						$yearthai = $y+543
							?>								
								<option value="<?php echo $y?>"   <?php if(date('Y')==$y){echo 'selected';}?>><?php echo $yearthai?></option>
	
							<?php }	?>
							</select>

							</div>
							</div>
							</div>
							

							<div class="col-md-3">
								<div class="form-group">
									<label class="control-label" for="full_name">รายละเอียดรายจ่าย</label>
                                    <input class="form-control" name="47[]" id="4_detail1" data-validate="required" placeholder="รายละเอียดค่ายใช้จ่ายอื่น ๆ" />
										
								</select> 
<!--									<input class="form-control" name="43[]"  data-validate="required" placeholder="รายละเอียดรายจ่าย" />-->
								</div>
							</div>
<div class="col-md-4">
								<div class="form-group">
									<label class="control-label" for="birthdate">รายละเอียด</label>
									<input class="form-control" name="49[]" id="4_other1" data-validate="required" placeholder="รายละเอียด" />
                                                                        <input class="form-control" name="textinput[]" id="textinput" value="2" type="hidden"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="birthdate">จำนวนเงิน</label>
									<input class="form-control qty1" name="48[]" id="4_price1" data-validate="required" placeholder="จำนวนเงิน" onchange="sumqty()" type="number" min = "0"/>
								</div>
							</div>

							
							<div class="col-md-1">
								<br>
								<button type="button" class="add_form_field4 btn btn-gold btn-icon">เพิ่มช่อง<i class="entypo-plus"></i> </button>
							</div>
						</div>
                                                    <?php }?>
                                                    <?php }else{?>
                                                    <div class="row">
							<div class="col-md-3">
								<div class="form-group">
                                 <div class="col-md-12" style="padding-left: 0px;">
                                      <label class="control-label" for="birthdate">วันที่/เดือน/ปี</label>
                                 </div><br>
                                 <div class="col-md-3" style="padding-right: 0px;padding-left: 0px">
                                      <select class="form-control" id="daydoc3_1" name="daydoc3_1[]" >
                               <option value="00">วัน</option>
							<?php for($a=1; $a<=31; $a++){ 
								
									if($a < 10){  $txt = '0';  } else { $txt =''; }
							?>								
                                                                <option value="<?php echo $txt.$a?>"    <?php  if(date('d')==$txt.$a){echo 'selected';}?>><?php echo $a?></option>	
							<?php }	?>
							</select>

							</div>
                            <div class="col-md-5" style="padding-right: 0px;">
                                 <select class="form-control" id="monthdoc3_1" name="monthdoc3_1[]" >
                               <option value="00">เดือน</option>
							<?php for($x=1; $x<=12; $x++){ 
								
									if($x < 10){  $txt = '0';  } else { $txt =''; } 
                                                                        if($x==1){
                                                                            $month = 'มกราคม';
                                                                        }else if($x==2){
                                                                            $month = 'กุมภาพันธ์';
                                                                        }else if($x==3){
                                                                            $month = 'มีนาคม';
                                                                        }else if($x==4){
                                                                            $month = 'เมษายน';
                                                                        }else if($x==5){
                                                                            $month = 'พฤษภาคม';
                                                                        }else if($x==6){
                                                                            $month = 'มิถุนายน';
                                                                        }else if($x==7){
                                                                            $month = 'กรกฎาคม';
                                                                        }else if($x==8){
                                                                            $month = 'สิงหาคม';
                                                                        }else if($x==9){
                                                                            $month = 'กันยายน';
                                                                        }else if($x==10){
                                                                            $month = 'ตุลาคม';
                                                                        }else if($x==11){
                                                                            $month = 'พฤศจิกายน';
                                                                        }else if($x==12){
                                                                            $month = 'ธันวาคม';
                                                                        }
							?>								
								<option value="<?php echo $txt.$x?>"  <?php if(date('m')==$txt.$x){echo 'selected';}?> ><?php echo $month?> </option>
	
							<?php }	?>
							</select>

							</div>
                            <div class="col-md-4" style="padding-right: 0px;">
                                 <select class="form-control" id="yeardoc3_1" name="yeardoc3_1[]" >
                               <option value="00">ปี</option>
							<?php for($y=2017; $y<=2032; $y++){ 
						$yearthai = $y+543
							?>								
								<option value="<?php echo $y?>"   <?php if(date('Y')==$y){echo 'selected';}?>><?php echo $yearthai?></option>
	
							<?php }	?>
							</select>

							</div>
							</div>
							</div>
							

							<div class="col-md-3">
								<div class="form-group">
									<label class="control-label" for="full_name">รายละเอียดรายจ่าย</label>
                                                                         <input class="form-control" name="47[]" id="4_detail1" data-validate="required" placeholder="รายละเอียดค่ายใช้จ่ายอื่น ๆ" />
										
								</select> 
<!--									<input class="form-control" name="43[]"  data-validate="required" placeholder="รายละเอียดรายจ่าย" />-->
								</div>
							</div>
<div class="col-md-4">
								<div class="form-group">
									<label class="control-label" for="birthdate">รายละเอียด</label>
									<input class="form-control" name="49[]" id="4_other1" data-validate="required" placeholder="รายละเอียด" />
                                                                        <input class="form-control" name="textinput[]" id="textinput" value="2" type="hidden"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="birthdate">จำนวนเงิน</label>
									<input class="form-control qty1" name="48[]" id="4_price1" data-validate="required" placeholder="จำนวนเงิน" onchange="sumqty()" type="number" min = "0"/>
								</div>
							</div>

							
							<div class="col-md-1">
								<br>
								<button type="button" class="add_form_field4 btn btn-gold btn-icon">เพิ่มช่อง<i class="entypo-plus"></i> </button>
							</div>
						</div>
                                                    <?php }?>
                                                     <input type="hidden" id="z1" value="<?php echo $a?>">
					</div>
					</div>
					<div class="row">
						<div class="col-md-2">
							<div class="form-group">
							</div>
						</div>

						<div class="col-md-4"></div>

						<div class="col-md-1">
							<br>
							&nbsp;&nbsp;&nbsp;&nbsp; รวมเงิน
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label" for="birthdate">จำนวนเงิน (ใบเสร็จรับเงินไม่สมบูรณ์)</label>
                               <input class="form-control total" name="50" id="3_sum" data-validate="required" placeholder="จำนวนเงิน" readonly value="<?php if(($numdoc1>0)&&($Data->checkno!=null)){echo $Data->Incomplete_receipt;}?>" type="number"/>
							</div>
						</div>

						<div class="col-md-2"></div>
					</div>

					</div>
					<div class="form-group">
						<div class="checkbox checkbox-replace color-primary" >
                            <input type="checkbox" name="chkrules" id="chkrules" onclick="enablebutton(this.checked)">
							<label for="chk-rules">ข้าพเจ้าขอรับรองว่ารายการที่กล่าวมาข้างต้นเป็นความจริง และหลักฐานการจ่ายที่ส่งมาด้วย รวมทั้งจำนวนเงินที่ขอเบิกถูกต้องตามกฎหมายทุกประการ</label><br>
                            <label for="chk-rules" style="color:red">(กรุณากดเลือกปุ่มรับรองความจริงก่อนบันทึกข้อมูล)</label>  
						</div>
					</div>
                    <div class="row" style="display:none">
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="full_name">ใบเสร็จรับเงินสมบูรณ์</label>
                                <input class="form-control" name="51" id="1_sumprice1" data-validate="required" placeholder="ใบเสร็จรับเงินสมบูรณ์" readonly value="<?php if($numdoc1>0){echo $Data->sumprice;}?>" type="number"/>
							</div>
						</div>
                        <div class="col-md-4" id="billnosuccess" <?php if(($numdoc1>0)&&($Data->checkno!=null)){?>style=""<?php }else{?>style="display:none"<?php }?>>
							<div class="form-group">
								<label class="control-label" for="full_name">ใบเสร็จรับเงินไม่สมบูรณ์</label>
                                <input class="form-control total1" name="52" id="total1" data-validate="required" placeholder="ใบเสร็จรับเงินไม่สมบูรณ์" readonly value="<?php if(($numdoc1>0)&&($Data->checkno!=null)){echo $Data->Incomplete_receipt;}?>" type="number"/>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="birthdate">รวมเงินทั้งสิ้น</label>
								<input class="form-control" name="53" id="sumtotal" data-validate="required" type="text" placeholder="รวมเงินทั้งสิ้น" readonly value="<?php if($numdoc1>0){echo $Data->sumtotal_price;}?>" />
							</div>
						</div>
						<input type="hidden" id="money_spent" value="<?php if($numdoc1 > 0){ echo $Data->sumprice; }?>" >	
                                                <input type="hidden" id="reason_request" value="<?php echo $documentData2->reason_request;?>" >		
					</div>
                    <div class="form-group" style="text-align:center">
						<div class="">
                           <button class="btn btn-info" type="submit" id="btn1" disabled>บันทึกข้อมูล</button><br>
                           <label  style="color:red">(กรุณากดเลือกปุ่มรับรองความจริงก่อนบันทึกข้อมูล)</label>
						</div>
					</div>
				</div>
                <input type="hidden" id="checkhidden" >
                            
                <div class="tab-pane" id="tab2-4"> 
				<div class="container-full">
            	<!--<iframe id="iframe" src="package_pdf/1Quotation_<?php //echo $_GET['OrderNo']?>.pdf"></iframe> -->     
                      <iframe id="iframe" src="http://www.fempsu.com.122.155.167.147.no-domain.name/Printer_controller/Preview_doc_group/<?php echo $idsaraban?>/<?php echo $type_travel?>" style="width:100%;height:640px"></iframe>     
            	</div>
                <br>
                <div class="row" style="text-align:center">
                     <button type="button" class="btn btn-success" onclick="upload()" >ไฟล์หลักฐานการจ่าย</button>&nbsp;
                     <button type="button" class="btn btn-info" style="width:8%" onclick="savedata('<?php echo $idsaraban?>','<?php echo $table?>','<?php echo $type_travel?>','<?php echo $documentData2->check_4step?>')">ยืนยัน</button>   
                </div>
				</div>
				<ul class="pager wizard">
					<li class="previous">
						<a href="#"><i class="entypo-left-open"></i> Previous</a>
					</li>
					<li class="next">
                       <a href="#" class="<?php if($numdoc2local>0){echo '';}else{echo 'isDisabled';}?>" id="nextnext">Next <i class="entypo-right-open"></i></a>
					</li>
				</ul>
			</div>		
		</form>
		<div id="modal-upload-saraban" class="modal fade" role="dialog" >
									<div class="modal-dialog modal-lg ">
										<div class="modal-content">
											<div class="modal-header no-padding">
												<div class="table-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
														<span class="white">&times;</span>
													</button>
													ไฟล์หลักฐานการจ่าย
												</div>
											</div>

											<div class="modal-body">
												<!-- PAGE CONTENT BEGINS -->
												<form enctype="multipart/form-data" id="imgForm" name="imgForm" method="post">
													<div class="row">
														<label class="col-sm-4 text-left" style="line-height: 30px;">เลขสารบรรณ</label>
														<label id="saraban_id" class="col-sm-8 text-left" style="line-height: 30px;"><?php echo $sarabannumber?></label>
															<div class="clear"></div>
														
		<div id="showdata">
 <?php $f = 1;
 $file = $this->Inputform_model->getdocfile($idsaraban,$type_travel);
 $numfile = $file->num_rows();
 if($numfile>0){
     foreach ($file->result() AS $file2){
 ?>
<label class="col-sm-4 text-left" style="line-height: 30px;"><?php if($f==1){?>ไฟล์หลักฐานการจ่าย<?php }?></label>
<div class="col-md-6">
    <p onclick="window.open('<?php echo base_url();?><?php echo $file2->file_name?>','_blank');" style="color:blue; cursor:pointer"><u><?php echo $file2->file_name?></u></p>    
</div>
<div class="col-md-2">
    <i class="entypo-trash" aria-hidden="true" style="cursor:pointer" onclick="comfirmDelete('<?php echo $idsaraban?>','<?php echo $file2->file_name?>','<?php echo $type_travel?>')"></i>
</div>
<div class="clear"></div>
     <?php $f++; } } ?>
</div>												
<label class="col-sm-4 text-left" style="line-height: 30px;">อัพโหลดไฟล์หลักฐานการจ่าย</label>
	<div class="col-md-8">
		<input type="file" class="form-control" placeholder="" id="img2" name="img2[]" multiple style="height: 35px;" ><br>
<p style="color:red">(รองรับไฟล์นามสกุล .jpg .png .jpeg .pdf และขนาดไฟล์ควรมีขนาดไม่เกิน 2 MB)</p>                                                                                                                            
		<input type="hidden" id="outboundid" name="outboundid" value="<?php echo $idsaraban?>">  
		<input type="hidden" id="sarabannumber" name="sarabannumber" value="<?php echo $sarabannumber?>"> <input type="hidden" id="doc1_id" name="doc1_id" value="<?php echo $doc1_id?>">
		<input type="hidden" id="type_travel" name="type_travel" value="<?php echo $type_travel?>">	
	</div> 
</div>	
												</form> 
											</div>

											<div class="modal-footer no-margin-top">
												<button type="button" class="btn btn-lg btn-success " onClick="Addimg()" ><i class="ace-icon fa fa-check"></i>บันทึก</button>
												<button class="btn btn-lg btn-danger pull-right" data-dismiss="modal"><i class="ace-icon fa fa-times"></i>ปิด</button>	
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div>
		<!-- Footer -->
		<footer class="main">
			&copy; 2018 <strong>FEM.</strong> Developed by <a href="http://www.me-fi.com" target="_blank">ME-FI dot com</a>
		</footer>	
	</div> 
</div>
	