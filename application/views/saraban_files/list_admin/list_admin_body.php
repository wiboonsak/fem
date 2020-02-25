<div class="main-content">

<?php
  //  if(chk==admin){
?>
	
<h2 style="text-align: center; ">ระบบงานสารบัญ</h2>
<br />
<div class="row">

    <div class="col-sm-4 col-xs-8">
    <?php
        if (isset($this->session->userdata['alert'])) {
            $count1   = ($this->session->userdata['alert']['countid']);
            $count2   = ($this->session->userdata['alert']['countmember']);
            $count3   = ($this->session->userdata['alert']['countcancel']);
        }else{
            $count1 = 0;
            $count1 = 0;
            $count1 = 0;
        }
    ?>
        <div class="tile-stats tile-aqua">
            <div class="icon"><i class="entypo-upload"></i></div>
            <div class="num" data-start="0" data-postfix="" data-duration="1500" data-delay="0"><?php echo $count1; ?></div>
 
            <h3>รายการเลขสารบัญ</h3> 
            <p>ระบบงานสารบัญ FEM.</p>
        </div> 

    </div>
    
    <div class="clear visible-xs"></div>

    <div class="col-sm-4 col-xs-8">

        <div class="tile-stats tile-blue">
            <div class="icon"><i class="entypo-users"></i></div>
            <div class="num" data-start="0" data-postfix="" data-duration="1500" data-delay="0"><?php echo $count2; ?></div>

            <h3>สมาชิกทั้งหมด</h3>
            <p>ระบบงานสารบัญ FEM.</p>
        </div>

    </div>
    
    <div class="col-sm-4 col-xs-8">

        <div class="tile-stats tile-red">
            <div class="icon"><i class="entypo-download"></i></div>
            <div class="num" data-start="0" data-postfix="" data-duration="1500" data-delay="0"><?php echo $count3; ?></div>

            <h3>รายการเลขสารบัญที่ยกเลิก</h3>
            <p>ระบบงานสารบัญ FEM.</p>
        </div>

    </div>

</div>

<?php
//    }
?>

<div class="table-header">
    <h2 style="text-align: center; padding-top: 20px;">ตารางรายการเลขสารบัญที่ขอใช้ทั้งหมด</h2>
</div>

<table class="table table-bordered datatable table-striped" id="table-1">
    <thead>
        <tr>
            <th>เลขสารบัญ</th>
            <th>ชื่อเรื่อง</th>
            <th>ผู้ใช้</th>
            <th>วันที่รับเลข</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($getdata as $getdata) : ?> 
            <tr class="odd gradeX">
                <td><?php echo $getdata['id_saraban']; ?></td>
                <td><?php echo $getdata['topic']; ?></td>
                <td><?php echo $getdata['firstname']; echo " "; echo $getdata['lastname']; ?></td>
                <td><?php echo $getdata['date_add']; ?></td>
                <!--<td class="center">
                    <a href="detail.html" class="btn btn-info btn-sm btn-icon icon-left">
                        <i class="entypo-info"></i>
                        รายละเอียด
                    </a>

                    <a href="detail.html" class="btn btn-default btn-sm btn-icon icon-left">
                        <i class="entypo-pencil"></i>
                        แก้ไข
                    </a>
                    
                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                        <i class="entypo-cancel"></i>
                        ลบ
                    </a>
                </td>-->
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<!-- Footer -->
<footer class="main">
&copy; 2018 <strong>FEM.</strong> Developed by <a href="http://www.me-fi.com" target="_blank">ME-FI dot com</a>
</footer>

</div>



