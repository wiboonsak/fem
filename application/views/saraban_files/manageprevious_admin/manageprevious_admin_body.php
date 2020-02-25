<style>
    .select2-drop {
        z-index: 40000 !important;
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
        <div class="modal-dialog modal-lg " >
            <div class="modal-content">
                <div class="modal-header no-padding">
                    <div class="table-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="hideselect()">
                            <span class="white">&times;</span>
                        </button> 
                        ขอเลขสารบรรณย้อนหลัง
                    </div>
                </div>

                <div class="modal-body" id="modalprevious">
                    <!-- PAGE CONTENT BEGINS -->
                    <form class="form-horizontal" role="form" id="frmpre">
                        <div class="row">
                            <label for="field-4" class="col-sm-3 text-left">วันที่ขอใช้เลข</label>
                            <div class="col-md-5">
                                <div class="col-sm-3" style="padding-left: 0px;padding-right: 0px;">
                                                                    <select  id="daystart" name="daystart" style="font-size: 14px;margin-left: 15px" >
                               <option value="">วัน</option>
							<?php for($a=1; $a<=31; $a++){ 
								
									if($a < 10){  $txt = '0';  } else { $txt =''; }
							?>								
                                                                <option value="<?php echo $txt.$a?>" ><?php echo $txt.$a?></option>	
							<?php }	?>
							</select>
                                                                </div>
                                                                <div class="col-sm-4" style="width: 130px">
                                                       <select   id="monthstart" name="monthstart" style="font-size: 14px">
                               <option value="">เดือน</option>
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
								<option value="<?php echo $txt.$x?>" ><?php echo $month?> </option>
	
							<?php }	?>
							</select>
                                                                </div>
                                                                <div class="col-sm-4" >
                                                       <select   id="yearstart" name="yearstart" >
                               <option value="">ปี</option>
							<?php for($y=2017; $y<=2032; $y++){ 
						$yearthai = $y+543
							?>								
								<option value="<?php echo $y?>"><?php echo $yearthai?></option>
	
							<?php }	?>
							</select>	
								</div>
                                <input type="hidden" class="form-control date33" id="date" name="date" placeholder="" >
                            </div>
                            <div class="col-md-4">
                                <input type="hidden" id="inorout" name="inorout">
                                <div class="radio radio-replace recheck" id="divinout">
                                    <input type="radio" name="in_out[]" id="in_out" value="1"  onClick="inout(this.value)" disabled>
                                    <label>หนังสือภายใน</label>
                                </div>
                                <div class="radio radio-replace recheck" id="divinout2">
                                    <input type="radio" name="in_out[]" id="in_out1" value="2"  onClick="inout(this.value)" disabled>
                                    <label>หนังสือภายนอก</label>
                                </div>
                                <div class="checkbox checkbox-replace recheck " id="divcircular">
                                    <input type="checkbox" name="circular_letter" id="circular_letter" value="0" onClick="circular(this.checked)" disabled>
                                    <label>หนังสือเวียน</label>
                                </div>
                                <br>
                            </div>
                            <label for="field-4" class="col-sm-3 text-left">เลขสารบรรณ</label>
                           <div class="col-md-5">
                                <input type="text" class="form-control" id="numbersarabun" name="numbersarabun" placeholder="" readonly>                               
                            </div>
                            <label class="col-sm-1" style="font-size: 18px;text-align: center;margin-top: 9px">.</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="numbersarabun1" name="numbersarabun1" placeholder="เลขสารบรรณย้อนหลัง" onChange="checknumber(this.value)">
                                <br>
                            </div>

                            <label for="field-5" class="col-sm-3 text-left">username ผู้ใช้เลข</label>
                            <div class="col-md-9">
                                <select class="form-control" id="username" name="username" style="font-size: 12px;" onchange="usernamesearh(this.value)">
										<option value="0"  >เลือก</option>;	
							
									
										<?php
										$firstname = "";
										 foreach ($getuser as $getuser2): 
										if ($getuser2['user'] != $firstname ) {
													$firstname = $getuser2['user'];
											?>			
												<option value = "<?php echo $getuser2['user']; ?>"><?php echo $getuser2['user']; ?></option>;	
										<?php 
											}
										endforeach; 
										?>
										</select>
<!--                                <input type="text" class="form-control" id="username" name="username" placeholder="username" onchange="usernamesearh(this.value)">-->
                            </div>
                            <script type="text/javascript">
                                var user = [];
                            </script>																		
                            <?php foreach ($getuser as $getuser): ?>
                                <script type="text/javascript">
                                    var dataObj = {
                                        id: "<?php echo $getuser['id']; ?>",
                                        user: "<?php echo $getuser['user']; ?>",
                                        fname: "<?php echo $getuser['fname']; ?>",
                                        lname: "<?php echo $getuser['lname']; ?>"
                                    }
                                    user.push(dataObj);
                                </script>				
                            <?php endforeach ?> 
                            <div class="clear"></div>
                            <br>

                            <label  class="col-sm-3 text-left">ชื่อ</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="nameuser" name="nameuser" placeholder="ชื่อ" readonly>
                            </div>

                            <label  class="col-sm-3 text-left">นามสกุล</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="lastnameuser" name="lastnameuser" placeholder="นามสกุล" readonly>
                            </div>
                            <input type="hidden" class="form-control" id="iduser" name="iduser" placeholder="นามสกุล" >
                            <div class="clear"></div>
                            <br>

                            <label for="field-3" class="col-sm-3 text-left ">ชื่อเรื่อง</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="topic" name="topic" placeholder="ชื่อเรื่อง">
                            </div> 

                            <div class="clear"></div>
                            <br>
							
							<label for="to_name" class="col-sm-3 text-left">เรียน</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="to_name" name="to_name" placeholder="เรียน">
                            </div>
							
							<div class="clear"></div>
                            <br>
							
							<label for="from_name" class="col-sm-3 text-left">จาก</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="from_name" name="from_name" placeholder="จาก">
                            </div> 

                            <div class="clear"></div>
                            <br>

                            <label for="field-1" class="col-sm-3 text-left">หมายเหตุ</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="remark" name="remark" placeholder="หมายเหตุ">
                            </div>

                            <label for="field-2" class="col-sm-3 text-left">Ref No.</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="refno" name="refno" placeholder="Reference Number">
                            </div>

                        </div>	
                    </form>
                </div>

                <div class="modal-footer no-margin-top">
                    <button id="btnSave" type="button" class="btn btn-lg btn-success" onclick="addprevios()" data-dismiss="modal">
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
    <div id="modal-upload-saraban" class="modal fade" role="dialog" >
									<div class="modal-dialog modal-lg ">
										<div class="modal-content">
											<div class="modal-header no-padding">
												<div class="table-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
														<span class="white">&times;</span>
													</button>
													อัพโหลดไฟล์สำเนา 
												</div>
											</div>

											<div class="modal-body">
												<!-- PAGE CONTENT BEGINS -->
												<form enctype="multipart/form-data" id="imgForm" name="imgForm" method="post">
													<div class="row">
														<label class="col-sm-3 text-left" style="line-height: 30px;">เลขสารบรรณ</label>
														<label id="saraban_id" class="col-sm-9 text-left" style="line-height: 30px;"></label>
															<div class="clear"></div>
 
															<label class="col-sm-3 text-left" style="line-height: 30px;">ชื่อเรื่อง</label>
															<label id="saraban_topic" class="col-sm-9 text-left" style="line-height: 30px;"></label>
														<div class="clear"></div>													
<label class="col-sm-3 text-left" style="line-height: 30px;">อัพโหลดไฟล์สำเนา</label>
															<div class="col-md-9">
																<input type="file" class="form-control" placeholder="" id="img2" name="img2" style="height: 35px;" onChange="check_typeFile(this.value,'img2')"><br>
																
																<p style="font-size: 10pt; color: red; line-height: 24px;"><strong>ข้อแนะนำ</strong><br>
* งานสารบรรณจะไม่เก็บสำเนาเอกสารในรูปแบบกระดาษ<br>																	
1. ผู้ใช้จะต้องทำการแสกนเอกสารที่มีลายเซ็นอนุมัติแล้วเท่านั้น<br> 
2. การอัพโหลดไฟล์ สามารถอัพโหลดได้ครั้งละ 1 ไฟล์เท่านั้น และหากมีหลายหน้าหรือหลายภาพ ควรจัดทำและบันทึกเป็นไฟล์ .pdf เพื่อสะดวกต่อการอัพโหลดไฟล์และเรียกดูการแสดงผล<br>
3. รองรับไฟล์นามสกุล .pdf , .jpg , .png , .gif เท่านั้น<br> 
4. ขนาดไฟล์ไม่ควรเกิน 2MB</p>
																
																
																<input type="hidden" id="uelseg" name="uelseg">
																<input type="hidden" id="uelseg3" name="uelseg3">
																<input type="hidden" id="id" name="id">
																<input type="hidden" id="old_img" name="old_img">
															</div> 

                                                     		</div>	
												</form> 
											</div>

											<div class="modal-footer no-margin-top">
												<button type="button" class="btn btn-lg btn-success " onClick="Addimg()" data-dismiss="modal"><i class="ace-icon fa fa-check"></i>บันทึก</button>
												<button class="btn btn-lg btn-danger pull-right" data-dismiss="modal"><i class="ace-icon fa fa-times"></i>ปิด</button>	
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div>
    <div class="table-header">
        <h2 style="text-align: center; padding-top: 20px;">รายการเลขสารบรรณย้อนหลัง</h2>
    </div>
    <?php $urlseg2 = $this->uri->segment(2);?>
<?php $urlseg3 = $this->uri->segment(3);?>
    <table class="table table-bordered datatable table-striped" id="table-1" >  
        <div class="pull-right">
<!--                                            <button type="button" class="btn btn-success btn-sm" onclick="addPrevious()"> ขอเลขสารบรรณย้อนหลัง </button>-->
        </div>
        <thead>
            <tr>
                <th>เลขสารบรรณ</th>
                <th>ชื่อเรื่อง</th>
                <th>ผู้ใช้</th>
                <th>วันที่ขอใช้เลข</th>
                <th>วันที่ทำรายการ</th>
                <th>หมายเหตุ</th>
                <th>Ref No.</th>
                <th>ไฟล์สำเนา</th>
                <th>แก้ไข</th>
                <th>ลบ</th>
            </tr>
        </thead>
        <tbody>
        <script type="text/javascript">
            var sarabanList = [];
        </script>

        <?php foreach ($getprevious as $getprevious) : ?> 
            <script type="text/javascript">
                var dataObj = {
                    id_saraban: "<?php echo $getprevious['id_saraban']; ?>",
                    fname: "<?php echo $getprevious['firstname']; ?>",
                    lname: "<?php echo $getprevious['lastname']; ?>",
                    topic  : "<?php echo htmlentities($getprevious['topic'], ENT_QUOTES);?>",
                    to_name  : "<?php echo htmlentities($getprevious['to_name'], ENT_QUOTES);?>",
                    from_name  : "<?php echo htmlentities($getprevious['from_name'], ENT_QUOTES);?>",
                    username: "<?php echo $getprevious['user_name']; ?>",
                    remark: "<?php echo $getprevious['remark']; ?>",
                    date_saraban: "<?php echo $getprevious['date_saraban']; ?>",
                    in_out: "<?php echo $getprevious['in_out']; ?>",
                    circular_letter: "<?php echo $getprevious['circular_letter']; ?>",
                    refno: "<?php echo $getprevious['ref_no']; ?>",
                }
                sarabanList.push(dataObj);
            </script>	
            <tr class="odd gradeX">
                <td><?php echo $getprevious['id_saraban']; ?></td>
                <td><?php echo htmlentities($getprevious['topic'], ENT_QUOTES);?></td>
                <td><?php echo $getprevious['firstname'];
        echo " ";
        echo $getprevious['lastname']; ?></td>
                <td><?php echo $this->Saraban_model->GetThaiDateTime($getprevious['date_saraban']);?>
					<?php //$myDateTime = DateTime::createFromFormat('Y-m-d', $getprevious['date_saraban']);
                    //echo $formattedweddingdate = $myDateTime->format('d/m/Y');
                    ?></td>
                <td><?php echo $this->Saraban_model->GetThaiDateTime($getprevious['date_add']);?>
					<?php //$myDateTime = DateTime::createFromFormat('Y-m-d H:i:s', $getprevious['date_add']);
                    //echo $formattedweddingdate = $myDateTime->format('d/m/Y');
                    ?></td>
                <td><?php echo $getprevious['remark']; ?></td>
                <td><?php echo $getprevious['ref_no']; ?></td>
                 <td class="center">
					 <a class="btn btn-danger btn-sm btn-icon icon-left" onclick="upload('<?php echo $getprevious['id_saraban']; ?>','<?php echo htmlentities($getprevious['topic'], ENT_QUOTES);?>','<?php echo $urlseg2?>','<?php echo $urlseg3?>','<?php echo $getprevious['id']; ?>','<?php echo $getprevious['copy_file'];?>')" <?php if($getprevious['copy_file'] != ''){?>title="อัพโหลดไฟล์สำเนาอีกครั้ง"<?php } ?> >อัพโหลด<i class="entypo-search"></i> </a>
					
					<button class="btn btn-green btn-sm btn-icon icon-left" <?php if($getprevious['copy_file'] == ''){?>disabled title="ยังไม่ได้อัพโหลดไฟล์สำเนา"<?php } ?> type="button" onClick="window.open('<?php echo base_url().$getprevious['copy_file'];?>','_blank'); location.reload();" >ดู<i class="entypo-cancel"></i> </button>
					 
					 
					 
                     <?php /*if($getprevious['copy_file'] ==''){?>
                    <a class="btn btn-default btn-sm btn-icon icon-left" onclick="upload('<?php echo $getprevious['id_saraban']; ?>','<?php echo htmlentities($getprevious['topic'], ENT_QUOTES);?>','<?php echo $urlseg2?>','<?php echo $urlseg3?>','<?php echo $getprevious['id']; ?>')">
                        <i class="entypo-pencil"></i>
                        ไฟล์สำเนา 
                    </a>
                    <?php }else{?>
                        <a class="btn btn-default btn-sm btn-icon icon-left" onClick="window.open('<?php echo base_url()  . $getprevious['copy_file']; ?>', '_blank'); location.reload();">
                        <i class="entypo-pencil"></i>
                        ไฟล์สำเนา 
                    </a>
                    <?php }*/ ?>
                </td>
                <td class="center">
                    <?php //if($getprevious['copy_file'] == ''){ $txtEdit = 'แก้ไข'; } else { $txtEdit = 'รายละเอียด'; }?>
                    <a class="btn btn-default btn-sm btn-icon icon-left" onclick="editbtn('<?php echo $getprevious['id_saraban'];?>' , '<?php echo $getprevious['id'];?>','<?php echo htmlentities($getprevious['topic'], ENT_QUOTES);?>')" >
                        <i class="entypo-pencil"></i>แก้ไข                        
                    </a>
                </td>				
                <td style="text-align:center;"><button  type="button" class="btn btn-danger btn-sm" onClick="delete_data('<?php echo $getprevious['id'];?>', 'tbl_saraban_previous')"  <?php if($getprevious['copy_file'] != ''){echo 'disabled';}?> >ลบข้อมูล</td>
            </tr>
<?php endforeach; ?>
        </tbody>
    </table>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <!--<div class="modal-dialog" role="document">
          <div class="modal-content">
            <div  id="routemodal" class="modal-body">
             
            </div>
          </div>
        </div>-->
    </div> 

    <!-- Footer -->
    <footer class="main">
        &copy; 2018 <strong>FEM.</strong> Developed by <a href="http://www.me-fi.com" target="_blank">ME-FI dot com</a>
    </footer>

</div>



