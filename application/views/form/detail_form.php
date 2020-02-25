<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>allowance/assets/FontTHSarabun/styles.css">
	<div class="main-content">			
	
		<h2 style="text-align: center; padding-top: 20px;">ตรวจเช็ครายงานการเดินทาง</h2>
		<br/><br/>
		
		<div class="row">
			<div class="" style="margin: 0 auto; width: 100%">
				
				<div class="panel panel-gradient" data-collapsed="0">					
					
					<div class="panel-body">
						<div class="container-full">            	   
                             <iframe id="iframe" src="<?php echo $url?>" style="width:100%;height:640px"></iframe>     
            			</div>
                        <br>
                        <div class="row" style="text-align:center">
                            <button onclick="sendpass('<?php echo $this->uri->segment(3);?>','pass','ผ่าน','<?php echo $this->uri->segment(5);?>')" type="button" class="btn btn-green btn-icon">ผ่าน<i class="entypo-check"></i> </button>&nbsp; 
							<button onclick="btn_fail('<?php echo $this->uri->segment(3);?>','1','x','<?php echo $this->uri->segment(5);?>')" type="button" class="btn btn-red btn-icon">ไม่ผ่าน<i class="entypo-cancel"></i> </button>
                        </div>						
					</div>
				
				</div>
			
			</div>
		</div>	

	<!-- Footer -->
	<footer class="main">

		&copy; 2018 <strong>FEM.</strong> Developed by <a href="http://www.me-fi.com" target="_blank">ME-FI dot com</a>

	</footer>
	
	</div>