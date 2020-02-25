<style>
    
    .isDisabled {
  pointer-events: none;
  cursor: not-allowed !important;
  opacity: 0.5;
  text-decoration: none;
}
</style>
<div class="well well-sm">
    <h4><b>รายงานการเดินทาง</b></h4>
		</div>
<?php foreach ($getdocument->result() AS $getdocument2){}?>
<div class="col-md-12" >
    <div style="padding-left: 20px;text-align: center"><h4><b>ข้าพเจ้าขอเบิกสำหรับ</b></h4></div><br>
    <div style="text-align: center" ><a href="<?php echo base_url('Inputform/form_alone/'.$idsaraban.'/'.$getdocument2->user_create.'/'.$type_travel)?>" style="<?php if($getdocument2->for_type!='1'){echo 'pointer-events: none;';}?>"><button class="btn btn-info <?php if($getdocument2->for_type!='1'){echo 'isDisabled';}?>" style="width: 200px;height: 50px;font-size: 16px;<?php if($getdocument2->for_type!='1'){echo 'pointer-events: none;';}?>">ข้าพเจ้า</button></a></div>
    <br>
    <div style="text-align: center" ><a href="<?php echo base_url('Inputform/form_group/'.$idsaraban.'/'.$getdocument2->user_create.'/'.$type_travel)?>" style="<?php if($getdocument2->for_type!='2'){echo 'pointer-events: none;';}?>"><button class="btn btn-success <?php if($getdocument2->for_type!='2'){echo 'isDisabled';}?>" style="width: 200px;height: 50px;font-size: 16px;">คณะเดินทาง</button></a></div>
</div>