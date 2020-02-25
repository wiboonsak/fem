<!-- DataTables -->
        <link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/datatables/buttons.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/jquery-toastr/jquery.toast.min.css')?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css')?>" rel="stylesheet" />
          
        <!--<link type="text/css" rel="stylesheet" href="../../../webpage/css/font-awesome.min.css">-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
          
<style>
	.icon-click {
		cursor: pointer;
		padding: 0 7px 0 7px;
	}
	
	.select-icon {
		font-size: 50px;
		padding: 0 10px 0 10px;
		color: #FC3A3D;
	}

</style>   
          
           <div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                           <h4 class="page-title"><?php if($dataID ==''){ echo 'เพิ่มข้อมูลผู้ใช้งาน';  }  else {  echo 'แก้ไขข้อมูลผู้ใช้งาน'; } ?></h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                <div class="row">
                <?php   if($dataID !=''){
							//$show = '';		
							$user = $this->user_model->list_user($dataID);
			  				foreach($user->result() as $user2){	}	
				} ?>   
                   
                    <div class="col-12">
                        <div class="card-box">
                             <div class="row">
                                <div class="col-12">
                                    <div class="p-20">
                                    <form class="form-horizontal" role="form" enctype="multipart/form-data" id="frm1" name="frm1" >
										
								<div class="form-group row">
									<label class="col-3 col-form-label">ชื่อ-นามสกุล</label>
									<div class="col-9">
										<input type="text" id="name_sname" name="name_sname" class="form-control" value="<?php if($dataID !=''){ echo $user2->name_sname;}?>">
									</div>
								 </div>
								 <div class="form-group row">
									<label class="col-3 col-form-label">Username</label>
									<div class="col-9">
										<input type="text" id="user_name" name="user_name" <?php if($this->session->userdata('userLv') == '0'){ echo 'disabled'; } ?> class="form-control" value="<?php if($dataID !=''){ echo $user2->user_name;}?>">
									</div>
								 </div>
								 <div class="form-group row">
									<label class="col-3 col-form-label">Password</label>
									<div class="col-9">
										<input type="password" id="password" name="password" class="form-control">
										<small class="text-danger">**หากไม่ต้องการเปลี่ยน password ให้เว้นว่างไว้</small>
										<input type="hidden" id="hpass" name="hpassword" value="<?php if($dataID !=''){ echo $user2->password;}?>">
									</div>
								 </div>
								 <div class="form-group row">
									<label class="col-3 col-form-label">E-mail</label>
									<div class="col-9">
										<input type="text" id="email" name="email" class="form-control" value="<?php if($dataID !=''){ echo $user2->email;}?>">
									</div>
								 </div>		
								 <div class="form-group row">
									<label class="col-3 col-form-label">ประเภทบุคลากร</label>
									<div class="col-9">
										<select class="form-control" id="position_level" name="position_level">
											<option value="">-- เลือก --</option>
											<option value="1" <?php if(($dataID !='') && ($user2->position_level =='1')){ echo 'selected';}?> >เจ้าหน้าที่</option>
											<option value="2" <?php if(($dataID !='') && ($user2->position_level =='2')){ echo 'selected';}?> >อาจารย์</option>				
										</select>
									</div>  
								 </div>							 
								 <div class="form-group row">
									<label class="col-3 col-form-label">ตำแหน่ง</label>
									<div class="col-9">
										<input type="text" id="position_name" name="position_name" class="form-control" value="<?php if($dataID !=''){ echo $user2->position_name;}?>">
									</div>
								 </div>	
                                    
                                    		
									<br><br>
                                    <div class="form-group row">
										<div class="col-12" style="text-align: center">
											<button type="button"  class="btn btn-primary btn-sm" id="btnAdd" onClick="check_frmUser()">เพิ่มข้อมูล</button>								
										</div>
                                    <input type="hidden" id="dataID" name="dataID" value="<?php if($dataID !=''){ echo $dataID;}?>" >
                                    
                                    </div>	
										
									</form>		
                                    </div>
                                </div>

                            </div>
                            
                            <!-- end row -->
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div> <!-- end container -->
        </div>