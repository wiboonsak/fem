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
		
		<link href="<?php echo base_url('assets_journal/plugins/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/plugins/datatables/buttons.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="<?php echo base_url('assets_journal/plugins/datatables/responsive.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets_journal/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')?>" rel="stylesheet">
		
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
                                    <h4 class="page-title"><?php echo $page_title?></h4>
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
                                    <!--<h4 class="m-t-0 header-title">Buttons example</h4>
                                    <p class="text-muted font-14 m-b-30">
                                        The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
                                    </p>-->
								<?php if($check == '1'){ ?>	
									<div><div class="form-group row">
									<label class="col-md-2 col-sm-4 col-form-label">Date Strat</label>
                                    <div class="col-md-4 col-sm-8">
                                         <div class="input-group">
                                             <input type="text" class="form-control" id="datepicker1" placeholder="dd/mm/yyyy">
                                             <div class="input-group-append">
                                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                             </div>
                                         </div>
                                    </div>
									<label class="col-md-2 col-sm-4 col-form-label">Date End</label>
                                    <div class="col-md-4 col-sm-8">
                                         <div class="input-group">
                                             <input type="text" class="form-control" id="datepicker2" placeholder="dd/mm/yyyy">
                                             <div class="input-group-append">
                                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                             </div>
                                         </div>
                                    </div>		
									</div>
									<div class="form-group row">
										<label class="col-md-2 col-sm-4 col-form-label">Status</label>       <select class="form-control col-md-4 col-sm-8" id="status">
                                           <option value=""></option>
                                           <option value="5">in process</option>
                                           <option value="1">Accepted</option>
                                           <option value="2">Minor Revision</option>
                                           <option value="3">Major Revision</option>
                                           <option value="4">Rejected</option>
                                        </select>									
									</div>
									<p style="text-align: center;"><button type="button" class="btn btn-sm btn-primary" onClick="search_byStatus()">Submit</button></p><br></div>
								<?php } ?>	
								<?php if($check == '2'){ ?>	
									<div><div class="form-group row">
									<label class="col-md-2 col-sm-4 col-form-label">Date Strat</label>
                                    <div class="col-md-4 col-sm-8">
                                         <div class="input-group">
                                             <input type="text" class="form-control" id="datepicker1" placeholder="dd/mm/yyyy">
                                             <div class="input-group-append">
                                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                             </div>
                                         </div>
                                    </div>
									<label class="col-md-2 col-sm-4 col-form-label">Date End</label>
                                    <div class="col-md-4 col-sm-8">
                                         <div class="input-group">
                                             <input type="text" class="form-control" id="datepicker2" placeholder="dd/mm/yyyy">
                                             <div class="input-group-append">
                                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                             </div>
                                         </div>
                                    </div>		
									</div>									
									<p style="text-align: center;"><button type="button" class="btn btn-sm btn-primary" onClick="search_numberPaper()">Submit</button></p><br></div>
								<?php } ?>
								<?php if($check == '3'){ ?>	
									<div><div class="form-group row">
									<label class="col-md-2 col-sm-4 col-form-label">Author Name</label>
                                    <div class="col-md-4 col-sm-8">
                                         <input id="name" name="name" type="text" class="form-control" >
                                    </div>											
									</div>									
									<p style="text-align: center;"><button type="button" class="btn btn-sm btn-primary" onClick="search_by_Author()">Submit</button></p><br></div>
								<?php } ?>
									
									<div id="showData"></div>	
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
		
		<script src="<?php echo base_url('assets_journal/plugins/datatables/jquery.dataTables.min.js')?>"></script>
        <script src="<?php echo base_url('assets_journal/plugins/datatables/dataTables.bootstrap4.min.js')?>"></script>
        <!-- Buttons examples -->
        <script src="<?php echo base_url('assets_journal/plugins/datatables/dataTables.buttons.min.js')?>"></script>
        <script src="<?php echo base_url('assets_journal/plugins/datatables/buttons.bootstrap4.min.js')?>"></script>
        <script src="<?php echo base_url('assets_journal/plugins/datatables/jszip.min.js')?>"></script>
        <script src="<?php echo base_url('assets_journal/plugins/datatables/pdfmake.min.js')?>"></script>
        <script src="<?php echo base_url('assets_journal/plugins/datatables/vfs_fonts.js')?>"></script>
        <script src="<?php echo base_url('assets_journal/plugins/datatables/buttons.html5.min.js')?>"></script>
        <script src="<?php echo base_url('assets_journal/plugins/datatables/buttons.print.min.js')?>"></script>  
		<script src="<?php echo base_url('assets_journal/plugins/moment/moment.js')?>"></script>       
        <script src="<?php echo base_url('assets_journal/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>

        <!-- Responsive examples -->
        <script src="<?php echo base_url('assets_journal/plugins/datatables/dataTables.responsive.min.js')?>"></script>
        <script src="<?php echo base_url('assets_journal/plugins/datatables/responsive.bootstrap4.min.js')?>"></script>

        <!-- App js -->
        <script src="<?php echo base_url('assets_journal/js/jquery.core.js')?>"></script>
        <script src="<?php echo base_url('assets_journal/js/jquery.app.js')?>"></script>
		


 <script type="text/javascript">
     $(document).ready(function() {
                
          //Buttons examples
          var table = $('#datatable-buttons').DataTable({
               lengthChange: false,
               buttons: ['print', 'excel', 'pdf']
          });                

          table.buttons().container()
              .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
		 
		 var today3 = '<?php echo $today?>';	 

		jQuery('#datepicker1 , #datepicker2').datepicker({
			autoclose: true,
			format: "dd/mm/yyyy",			
			todayHighlight: true
		});	
     });	 
	//////////////////////////////////////
	 
	function search_byStatus(){
		
		var dateStart = $('#datepicker1').val();
		var dateEnd = $('#datepicker2').val();
		var status = $('#status').val();		
		
			$.post('<?php echo base_url('CMS_Journal/search_paper')?>' , { dateStart : dateStart , dateEnd : dateEnd , status : status } , function(data){ 
				
					$('#showData').empty();		
					$('#showData').html(data);	
			})		
	} 
	//////////////////////////////////////
	 
	function search_numberPaper(){
		
		var dateStart = $('#datepicker1').val();
		var dateEnd = $('#datepicker2').val();				
		
			$.post('<?php echo base_url('CMS_Journal/searchNumber_Paper')?>' , { dateStart : dateStart , dateEnd : dateEnd } , function(data){ 
				
					$('#showData').empty();		
					$('#showData').html(data);	
			})		
	} 
	//////////////////////////////////////
	 
	function search_by_Author(){ 
		
		var name = $('#name').val(); 			
		
		$.post('<?php echo base_url('CMS_Journal/search_byAuthor')?>' , { name : name } , function(data){ 				
			$('#showData').empty();		
			$('#showData').html(data);	
		})		
	} 
	 
</script>	 

    </body>
</html>                