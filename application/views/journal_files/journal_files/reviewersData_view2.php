<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url('assets_journal/favicon.ico')?>">
				
        <!-- App css -->
        <link href="<?php echo base_url('assets_journal/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />		
        <link href="<?php echo base_url('assets_journal/css/icons.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/css/metismenu.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/css/style.css')?>" rel="stylesheet" type="text/css" />
        <script src="<?php echo base_url('assets_journal/js/modernizr.min.js')?>"></script>
		
		
		<style>
			.file_btn {
				border-color: #666666;
    			background-color: #666666;
    			color: #ffffff;
			}
			/*.accordion-blocks .card {
			  margin-bottom: 1.2rem;
			  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
			}

			.accordion-blocks .card .card-body {
			  border-top: 1px solid #eee;
			}*/
			
		</style>

    </head>


    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            
            <!-- Left Sidebar End -->

			<?php include('side_menu.php')?>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->

            <div class="content-page">

                  <!-- Top Bar Start -->
                <div class="topbar">

                    <nav class="navbar-custom">                    

                        <ul class="list-inline menu-left mb-0">
                            <li class="float-left">
                                <button class="button-menu-mobile open-left disable-btn">
                                    <i class="dripicons-menu"></i>
                                </button>
                            </li>
                            <li>
                                <div class="page-title-box">
                                    <h4 class="page-title">Comment by reviewers</h4>
                                    <!--<ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Highdmin</a></li>
                                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                        <li class="breadcrumb-item active">Starter</li>
                                    </ol>-->
                                </div>
                            </li>
                        </ul>
                    </nav>

                </div>
                <!-- Top Bar End -->				
               
                <!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">							
								
							 <div class="col-12">
                                <div class="card-box table-responsive">
									<div class="pull-right"><button type="button" class="btn btn-primary btn-sm" onclick="goBack()"><i class="icon-action-undo"></i> Back</button></div><br><br>
									<?php $round = $this->journal_model->get_roundNumber($paperID); ?>
                                    
									<div class="form-group row">
								<table class="col-6 table table-bordered mb-0">
						<!--<table style="float: left">-->
							<thead>	
								<tr style="background-color: #f2f2f2">
								  <th colspan="4" style="text-align: center">Submission</th>
								</tr>
								<tr>
								  <td style="text-align: center">No.</td>
								  <td style="text-align: center">Reviewers</td>
								  <td style="text-align: center">Agree/Not Agree</td>
								  <td style="text-align: center">Status/Date</td>
								</tr>
							</thead>
							<tbody>
							<?php 	$n=1; $b=1; $x =''; $result_status =''; $result_status2 =''; $date1 =''; $date3 =''; $paper_no ='';
									//$reviewerName = $this->journal_model->get_reviewerList($paperID,'0'); 
									$reviewerName = $this->journal_model->get_reviewerList3($paperID,'0','1'); 
									foreach($reviewerName->result() as $reviewerName2){ 
								
								  	$name = $this->journal_model->get_nameEditor($reviewerName2->reviewer_id);
								  	foreach($name->result() as $name2){ }	
										
									$txt = 'Click to see the comment detail';
									$commentS = $this->journal_model->get_comment($x, $reviewerName2->reviewer_id, $paperID, 0);			  
								  	$commentNum3 = $commentS->num_rows();		  		  	  
								  	foreach($commentS->result() as $commentS2){ 
									  
								  	$date1 = '<br>'.$this->journal_model->GetShortEngDate2($commentS2->review_date);			  
								  	$paper_no = $commentS2->paper_no; 
	
								  	switch ($commentS2->result_status) {
										case "1":
											$result_status2 = "Accepted";
										break;
										case "2":
											$result_status2 = "Minor Revision";
										break;
										case "3":
											$result_status2 = "Major Revision";
										break;
										case "4":
											$result_status2 = "Rejected";
										break;
								}	}	
							?>								
								<tr>
								  <td style="text-align: center"><?php echo $n?></td>
								  <td>
									<?php if($commentNum3 >0){ ?>
									  	<a title="Click to see the comment detail" href="<?php echo base_url('CMS_Journal/comment_by_reviewers/').$paper_no.'/'.$name2->id?>">
									<?php } else { ?>
										<a title="Not yet commented" href="#"><?php } echo $name2->name_sname?></a>							
								  </td>
								  <td style="text-align: center"><?php if($reviewerName2->agree == '1'){ echo 'Agree'; } else if($reviewerName2->agree == '2'){ echo 'Not Agree'; } else { echo 'No Response'; }?></td>
								  <td style="text-align: center"><?php if(($result_status2 !='') && ($date1 !='')){ echo $result_status2.$date1; } else { echo 'No Response'; }?></td>
								</tr>
							<?php $n++; $result_status2=''; $date1 =''; } ?>			
							</tbody>	
						</table>	<!--</div>-->
									
									
						<?php if($round >0){ 
								for($i=1; $i<=$round; $i++){ ?>			
								<!--<div class="col-md-4">-->	
								<table class="col-6 table table-bordered mb-0">
						<!--<table style="float: left">-->
							<thead>	
								<tr style="background-color: #f2f2f2">
								  <th colspan="4" style="text-align: center">Round #<?php echo $i?></th>
								</tr>							
								<tr>
								  <td style="text-align: center">No.</td>
								  <td style="text-align: center">Reviewers</td>
								  <td style="text-align: center">Agree/Not Agree</td>
								  <td style="text-align: center">Status/Date</td>
								</tr>							
							</thead>
							<tbody>
							<?php //$reviewerName3 = $this->journal_model->get_reviewerList($paperID,$i); 
								  $reviewerName3 = $this->journal_model->get_reviewerList3($paperID,$i,'1');  	  				
								  foreach($reviewerName3->result() as $reviewerName4){ 
								
								  	  $name3 = $this->journal_model->get_nameEditor($reviewerName4->reviewer_id);
								  	  foreach($name3->result() as $name4){ }
									
									  $txt2 = 'Click to see the comment detail';
									  $comment = $this->journal_model->get_comment($x, $reviewerName4->reviewer_id, $paperID, $i);			  
								  	  $commentNum = $comment->num_rows();			  		  	  
								  	  foreach($comment->result() as $comment2){ 
									  
								  	  $date3 = '<br>'.$this->journal_model->GetShortEngDate2($comment2->review_date);									  
									  $paper_no = $comment2->paper_no; 

									  switch ($comment2->result_status) {
										case "1":
											$result_status = "Accepted";
											break;
										case "2":
											$result_status = "Minor Revision";
											break;
										case "3":
											$result_status = "Major Revision";
											break;
										case "4":
											$result_status = "Rejected";
											break;										  
									} } ?>									
								<tr>
								  <td style="text-align: center"><?php echo $b?></td>
								  <td>
									<?php if($commentNum >0){ ?>
									  	<a title="Click to see the comment detail" href="<?php echo base_url('CMS_Journal/comment_by_reviewers/').$paper_no.'/'.$name4->id?>">
									<?php } else { ?>
										<a title="Not yet commented" href="#"><?php } echo $name4->name_sname?></a>
								  </td>
								  <td style="text-align: center"><?php if($reviewerName4->agree == '1'){ echo 'Agree'; } else if($reviewerName4->agree == '2'){ echo 'Not Agree'; } else { echo 'No Response'; }?></td>
								  <td style="text-align: center">
									  <?php if(($result_status !='') && ($date3 !='')){ echo $result_status.$date3; } else { echo 'No Response'; }?>
								  </td>
								</tr>						
							<?php $b++; $result_status =''; $date3 =''; } ?>				
							</tbody>	
									</table>
									
									
									
						<?php $b=1;  } } ?>	
									
								</div>	
								
									
									
                                </div>
                            </div>
					</div> <!-- container -->

                </div> <!-- content -->			
			
			
			<?php $today = date("d-m-Y"); ?>	
				
				

<footer class="footer text-right">
                    <!--2018 © Highdmin. - Coderthemes.com-->
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <!-- jQuery  -->
        <script src="<?php echo base_url('assets_journal/js/jquery.min.js')?>"></script>
        <script src="<?php echo base_url('assets_journal/js/popper.min.js')?>"></script>
        <script src="<?php echo base_url('assets_journal/js/bootstrap.min.js')?>"></script>
        <script src="<?php echo base_url('assets_journal/js/metisMenu.min.js')?>"></script>
        <script src="<?php echo base_url('assets_journal/js/waves.js')?>"></script>
        <script src="<?php echo base_url('assets_journal/js/jquery.slimscroll.js')?>"></script>		

        <!-- App js -->
        <script src="<?php echo base_url('assets_journal/js/jquery.core.js')?>"></script>
        <script src="<?php echo base_url('assets_journal/js/jquery.app.js')?>"></script>
		


 <script>	
	
	function goBack(){		
		
		var url = '<?php echo $url;?>';
		window.location.href = url;		
	}
	
	
</script>	 

    </body>
</html>                