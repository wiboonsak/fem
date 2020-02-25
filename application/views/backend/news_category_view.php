<!-- DataTables -->
        <link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/datatables/buttons.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/jquery-toastr/jquery.toast.min.css')?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css')?>" rel="stylesheet" />
           <div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                           <h4 class="page-title">ข้อมูลข่าวสาร</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                             <div class="row">
                                <div class="col-12">
                                    <div class="p-20">
									<div class="card-box table-responsive">	
                                    <table class="table table-bordered table-hover" id="table2">
									<thead>	
									<tr style="background-color: #f2f2f2"> 
									   <th width="10">ลำดับ</th>
									   <th>หมวดข่าวสาร (ภาษาไทย)</th>
									   <th>หมวดข่าวสาร (ภาษาอังกฤษ)</th>
									   <th width="10" style="text-align: center">ข้อมูลข่าวสาร</th>					   
									</tr>
									</thead>
									<tbody>	
									<?php $n=1;	foreach($newsCategory->result() as $newsCategory2){ ?>
									<tr>
									   <td style="text-align: center"><?php echo $n?></td>
									   <td><?php echo $newsCategory2->name_th?></td>
									   <td><?php echo $newsCategory2->name_en?></td>							  
									   <td><button type="button" class="btn btn-info btn-sm" onClick="window.location.href='<?php echo base_url('Control/ShowNewsdata/').$newsCategory2->id?>'">ดูรายละเอียด</button></td>									   
									</tr>
									<?php 	$n++;	} ?>
									</tbody>	
									</table>
									</div>	
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