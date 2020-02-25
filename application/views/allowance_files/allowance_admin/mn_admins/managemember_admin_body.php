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

<div class="table-header">
    <h2 style="text-align: center; padding-top: 20px;">จัดการข้อมูลสมาชิก</h2>
</div>

<table class="table table-bordered datatable table-striped" id="table-1">
    <thead>
        <tr>
            <th>ลำดับ</th>
            <th>ชื่อ-สกุล</th>
            <th>อาชีพ</th>
            <th>ตำแหน่ง</th>
            <th>ตำแหน่งเลขที่</th>
            <th>แก้ไข</th>
            <th>ลบ</th>
        </tr> 
    </thead>
    <tbody>
        <?php $num = 0; foreach($getuser as $getuser) : $num++; ?>  
            <tr class="odd gradeX">
                <td><?php echo $num; ?></td>  
                <td><?php echo $getuser['firstname']; echo " "; echo $getuser['lastname']; ?></td>
                <td> <?php if($getuser['career'] != ''){echo $getuser['career']; }?> </td>
                <td> <?php if($getuser['position'] != ''){echo $getuser['position']; }?> </td>
                <td><?php if($getuser['position_number'] != ''){echo $getuser['position_number']; }?></td>  
<!--                <td class="center"> 
                    <button type="button" onclick="location.href='<?php //echo base_url() ?>Saraban/adminviewlist/<?php //echo $getuser['id']; ?>'" class="btn btn-info btn-sm btn-icon icon-left"> 
                        <i class="entypo-info"></i>
                        รายการขอเลข  
                    </button>
                </td>-->
                <td>
                    <a class="btn btn-default btn-sm btn-icon icon-left" onclick="location.href='<?php echo base_url() ?>Saraban/Add_member/<?php echo $getuser['id']; ?>'">
                        <i class="entypo-pencil"></i>
                        แก้ไข  
                    </a>
                </td> 
                <td>
                    <a class="btn btn-danger btn-sm btn-icon icon-left" onclick="deletedata('<?php echo $getuser['id']; ?>', 'tbl_user_data')">
                        <i class="entypo-cancel"></i>
                        ลบ
                    </a>
                </td> 
 
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<!-- Footer -->
<footer class="main">
&copy; 2018 <strong>FEM.</strong> Developed by <a href="http://www.me-fi.com" target="_blank">ME-FI dot com</a>
</footer>

</div>



