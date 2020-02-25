<?php 
   class Email_controller extends CI_Controller { 
 
      function __construct() { 
         parent::__construct(); 
         
         $this->load->library('session'); 
         $this->load->helper('form'); 
      } 
		
      public function index() {  
	
         $this->load->helper('form'); 
         $this->load->view('view_form'); 
      } 

      public function send_mail_approve() { 
         $from_email    = "puvaresjandoung@gmail.com"; 
         $process       = $this->input->post('process'); 
         $id_allowance  = $this->input->post('id_allowance');
         $to_email      = $this->input->post('email');
         $topic         = $this->input->post('topic');
         $budget        = $this->input->post('budget');
         $id_saraban    = $this->input->post('id_saraban');
         $id_approve    = $this->input->post('id_approve');
         $user_create    = $this->input->post('user_create');
         $datachk       = array(); 
         // Load database
         $this->load->model('Login_database_allowance');
         $resultuser = $this->Login_database_allowance->read_user_information_id($id_approve);

        if ($resultuser != false) {
            $titlename       = $resultuser[0]->titlename;
            $firstname       = $resultuser[0]->firstname;
            $lastname        = $resultuser[0]->lastname;
            if($resultuser[0]->position_level == '1'){
               $position_level ='อาจารย์';
            }else if($resultuser[0]->position_level == '2'){
               $position_level ='เจ้าหน้าที่';
            }else if($resultuser[0]->position_level == '3'){
               $position_level ='คณบดี';
            }else if($resultuser[0]->position_level == '4'){
               $position_level ='รองคณบดี';
            }
        }


         $resultuser_create = $this->Login_database_allowance->read_user_information_id($user_create);

        if ($resultuser_create != false) {
            $titlenameuser_create       = $resultuser_create[0]->titlename;
            $firstnameuser_create       = $resultuser_create[0]->firstname;
            $lastnameuser_create        = $resultuser_create[0]->lastname;
            if($resultuser_create[0]->position_level == '1'){
               $position_leveluser_create ='อาจารย์';
            }else if($resultuser_create[0]->position_level == '2'){
               $position_leveluser_create ='เจ้าหน้าที่';
            }else if($resultuser_create[0]->position_level == '3'){
               $position_leveluser_create ='คณบดี';
            }else if($resultuser_create[0]->position_level == '4'){
               $position_leveluser_create ='รองคณบดี';
            }
        }

        $strYear = date("Y")+543;
        $strMonth= date("n");
        $strDay= date("j");
        $strHour= date("H");
        $strMinute= date("i");
        $strSeconds= date("s");
        $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤษจิกายน","ธันวาคม");
        $strMonthThai=$strMonthCut[$strMonth];
        $strDate  = $strDay." ".$strMonthThai." ".$strYear;
         

             $email_body = "<!doctype html>
            <html>
            <head>
            <meta charset='utf-8'>
            <title>Untitled Document</title>

            <style type='text/css'>
            .share {
              -moz-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
              -webkit-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
              box-shadow:inset 0px 1px 0px 0px #c1ed9c;
              background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #9dce2c), color-stop(1, #8cb82b) );
              background:-moz-linear-gradient( center top, #9dce2c 5%, #8cb82b 100% );
              filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#9dce2c', endColorstr='#8cb82b');
              background-color:#9dce2c;
              -webkit-border-top-left-radius:6px;
              -moz-border-radius-topleft:6px;
              border-top-left-radius:6px;
              -webkit-border-top-right-radius:6px;
              -moz-border-radius-topright:6px;
              border-top-right-radius:6px;
              -webkit-border-bottom-right-radius:6px;
              -moz-border-radius-bottomright:6px;
              border-bottom-right-radius:6px;
              -webkit-border-bottom-left-radius:6px;
              -moz-border-radius-bottomleft:6px;
              border-bottom-left-radius:6px;
              text-indent:0;
              border:1px solid #83c41a;
              display:inline-block;
              color:#ffffff;
              font-family:Arial;
              font-size:15px;
              font-weight:normal;
              font-style:normal;
              height:40px;
              line-height:40px;
              width:177px;
              text-decoration:none;
              text-align:center;
              text-shadow:1px 1px 0px #689324;
            }
            .share:hover {
              background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8cb82b), color-stop(1, #9dce2c) );
              background:-moz-linear-gradient( center top, #8cb82b 5%, #9dce2c 100% );
              filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#8cb82b', endColorstr='#9dce2c');
              background-color:#8cb82b;
            }.share:active {
              position:relative;
              top:1px;
            }
            .book {
              -moz-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
              -webkit-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
              box-shadow:inset 0px 1px 0px 0px #bbdaf7;
              background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5) );
              background:-moz-linear-gradient( center top, #79bbff 5%, #378de5 100% );
              filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#79bbff', endColorstr='#378de5');
              background-color:#79bbff;
              -webkit-border-top-left-radius:6px;
              -moz-border-radius-topleft:6px;
              border-top-left-radius:6px;
              -webkit-border-top-right-radius:6px;
              -moz-border-radius-topright:6px;
              border-top-right-radius:6px;
              -webkit-border-bottom-right-radius:6px;
              -moz-border-radius-bottomright:6px;
              border-bottom-right-radius:6px;
              -webkit-border-bottom-left-radius:6px;
              -moz-border-radius-bottomleft:6px;
              border-bottom-left-radius:6px;
              text-indent:0;
              border:1px solid #84bbf3;
              display:inline-block;
              color:#ffffff;
              font-family:Arial;
              font-size:15px;
              font-weight:normal;
              font-style:normal;
              height:40px;
              line-height:40px;
              width:118px;
              text-decoration:none;
              text-align:center;
              text-shadow:1px 1px 0px #528ecc;
            }
            .book:hover {
              background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #378de5), color-stop(1, #79bbff) );
              background:-moz-linear-gradient( center top, #378de5 5%, #79bbff 100% );
              filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#378de5', endColorstr='#79bbff');
              background-color:#378de5;
            }.book:active {
              position:relative;
              top:1px;
            }</style>
            </head>

            <body>
            <table width='60%' height='772' border='0' align='center' cellpadding='0' cellspacing='0' style='font-family: arial; font-size: 11pt; border:1px solid #D5D5D5;'>
              <tbody>
                <tr>
                  <td height='70' bgcolor='#26ab93'>&nbsp;</td>
                  <td width='224'  bgcolor='#26ab93' style='color:#FFFFFF; font-size: 16pt;'><img src='".base_url()."assets_saraban/img/logo-white-header.png' width='500' height='95' alt=''/></td>
                  <td width='1063' height='70'  bgcolor='#26ab93' style='color:#FFFFFF; font-size: 16pt;'>&nbsp;</td>
                  <td width='38'  bgcolor='#26ab93'>&nbsp;</td>
                </tr>
                <tr>
                  <td width='43' height='67'>&nbsp;</td>
                  <td height='67' colspan='2' align='left' valign='bottom' style='font-size: 16pt; color: #666666; font-weight: 400;'>เรียน&nbsp; ".$titlenameuser_create  ." ".$firstnameuser_create  ." ".$lastnameuser_create."</td>
                  <td align='left'>&nbsp;</td>
                </tr>
                <tr>
                  <td height='223' align='left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . </td>
                  <td height='223' colspan='2' align='center' valign='top' style='font-size: 11pt; color: #666666; line-height: 25px;'><p><br>
                    </p>";

         if($budget == '1'){
            $subject = 'ผลการขออนุมัติเบิกค่าเดินทาง';
            if($process == 'approve'){

                     $email_body = $email_body." 
                              <table width='80%' border='0' align='center' cellpadding='3' cellspacing='0'>
                                <tbody>
                                  <tr>
                                    <td height='40' colspan='3' align='center' bgcolor='#E7E5E5'><strong>ผลการอนุมัติ งานเบิกค่าเดินทาง</strong></td>
                                  </tr>
                                  <tr>
                                    <td width='25%' height='40' align='right' bgcolor='#F7F7F7'><strong>สถานะอนุมัติ :</strong></td>
                                    <td width='2%' height='40' bgcolor='#F7F7F7'>&nbsp;</td>
                                    <td width='73%' height='40' bgcolor='#F7F7F7' style='font-size: 18pt; color:#549400'>อนุมัติ</td>
                                  </tr>
                                  <tr>
                                    <td height='40' align='right'><strong>หมายเลขหนังสือ :</strong></td>
                                    <td height='40'>&nbsp;</td>
                                    <td height='40'>มอ.820/".$id_saraban."</td>
                                  </tr>
                                  <tr>
                                    <td height='40' align='right' bgcolor='#F7F7F7'><strong>เรื่อง :</strong></td>
                                    <td height='40' bgcolor='#F7F7F7'>&nbsp;</td>
                                    <td height='40' bgcolor='#F7F7F7'>".$topic."</td>
                                  </tr>
                                  <tr>
                                    <td height='40' align='right'><strong>วันที่อนุมัติ :</strong></td>
                                    <td height='40'>&nbsp;</td>
                                    <td height='40'>".$strDate."</td>
                                  </tr>
                                  <tr>
                                    <td height='40' align='right' bgcolor='#F7F7F7'><strong>ผู้อนุมัติ :</strong></td>
                                    <td height='40' bgcolor='#F7F7F7'>&nbsp;</td>
                                    <td height='40' bgcolor='#F7F7F7'>".$titlename." ".$firstname." ".$lastname."&nbsp; ตำแหน่งงาน ".$position_level."</td>
                                  </tr>
                                  <tr>
                                    <td height='40' align='right'><strong>กรอกข้อมูล :</strong></td>
                                    <td height='40' >&nbsp;</td>
                                    <td height='40' ><a href='".base_url()."Inputform/form/".$id_saraban."'>คลิก</a></td>
                                  </tr>
                                    <tr>
                                        <td height='40' align='right' bgcolor='#F7F7F7'>&nbsp;</td>
                                        <td height='40' bgcolor='#F7F7F7'>&nbsp;</td>
                                        <td height='40' bgcolor='#F7F7F7'>&nbsp;</td>
                                      </tr>
                                </tbody>
                              </table>" ;
            }else if($process == 'Notapprove'){
                      $email_body = $email_body."
                                  <table width='80%' border='0' align='center' cellpadding='3' cellspacing='0'>
                                    <tbody>
                                      <tr>
                                        <td height='40' colspan='3' align='center' bgcolor='#E7E5E5'><strong>ผลการอนุมัติ งานเบิกค่าเดินทาง</strong></td>
                                      </tr>
                                      <tr>
                                        <td width='25%' height='40' align='right' bgcolor='#F7F7F7'><strong>สถานะอนุมัติ :</strong></td>
                                        <td width='2%' height='40' bgcolor='#F7F7F7'>&nbsp;</td>
                                        <td width='73%' height='40' bgcolor='#F7F7F7' style='font-size: 18pt; color:#C90003'>ไม่อนุมัติ</td>
                                      </tr>
                                      <tr>
                                        <td height='40' align='right'><strong>หมายเลขหนังสือ :</strong></td>
                                        <td height='40'>&nbsp;</td>
                                        <td height='40'>มอ.820/".$id_saraban."</td>
                                      </tr>
                                      <tr>
                                        <td height='40' align='right' bgcolor='#F7F7F7'><strong>เรื่อง :</strong></td>
                                        <td height='40' bgcolor='#F7F7F7'>&nbsp;</td>
                                        <td height='40' bgcolor='#F7F7F7'>".$topic."</td>
                                      </tr>
                                      <tr>
                                        <td height='40' align='right'><strong>วันที่อนุมัติ :</strong></td>
                                        <td height='40'>&nbsp;</td>
                                        <td height='40'>".$strDate."</td>
                                      </tr>
                                      <tr>
                                        <td height='40' align='right' bgcolor='#F7F7F7'><strong>ผู้อนุมัติ :</strong></td>
                                        <td height='40' bgcolor='#F7F7F7'>&nbsp;</td>
                                        <td height='40' bgcolor='#F7F7F7'>".$titlename." ".$firstname." ".$lastname."&nbsp; ตำแหน่งงาน ".$position_level."</td>
                                      </tr>
                                      <!--<tr>
                                        <td height='40' align='right' style='color:#C90003'><strong>เหตุผล :</strong></td>
                                        <td height='40'>&nbsp;</td>
                                        <td height='40'>ขาดเอกสาร จดหมายเชิญประชุม</td>
                                      </tr>
                                      <tr>
                                        <td height='40' align='right' bgcolor='#F7F7F7'>&nbsp;</td>
                                        <td height='40' bgcolor='#F7F7F7'>&nbsp;</td>
                                        <td height='40' bgcolor='#F7F7F7'>&nbsp;</td>
                                      </tr>-->
                                    </tbody>
                                  </table>";
            }
         }else if( $budget == '2' || $budget == '3'){
             $subject = 'ผลการขออนุมัติเบิกค่าเดินทาง';
            if($process == 'approve'){

                     $email_body = $email_body." 
                              <table width='80%' border='0' align='center' cellpadding='3' cellspacing='0'>
                                <tbody>
                                  <tr>
                                    <td height='40' colspan='3' align='center' bgcolor='#E7E5E5'><strong>ผลการอนุมัติ งานเบิกค่าเดินทาง</strong></td>
                                  </tr>
                                  <tr>
                                    <td width='25%' height='40' align='right' bgcolor='#F7F7F7'><strong>สถานะอนุมัติ :</strong></td>
                                    <td width='2%' height='40' bgcolor='#F7F7F7'>&nbsp;</td>
                                    <td width='73%' height='40' bgcolor='#F7F7F7' style='font-size: 18pt; color:#549400'>อนุมัติ</td>
                                  </tr>
                                  <tr>
                                    <td height='40' align='right'><strong>หมายเลขหนังสือ :</strong></td>
                                    <td height='40'>&nbsp;</td>
                                    <td height='40'>มอ.820/".$id_saraban."</td>
                                  </tr>
                                  <tr>
                                    <td height='40' align='right' bgcolor='#F7F7F7'><strong>เรื่อง :</strong></td>
                                    <td height='40' bgcolor='#F7F7F7'>&nbsp;</td>
                                    <td height='40' bgcolor='#F7F7F7'>".$topic."</td>
                                  </tr>
                                  <tr>
                                    <td height='40' align='right'><strong>วันที่อนุมัติ :</strong></td>
                                    <td height='40'>&nbsp;</td>
                                    <td height='40'>".$strDate."</td>
                                  </tr>
                                  <tr>
                                    <td height='40' align='right' bgcolor='#F7F7F7'><strong>ผู้อนุมัติ :</strong></td>
                                    <td height='40' bgcolor='#F7F7F7'>&nbsp;</td>
                                    <td height='40' bgcolor='#F7F7F7'>".$titlename." ".$firstname." ".$lastname."&nbsp; ตำแหน่งงาน ".$position_level."</td>
                                  </tr>
                                </tbody>
                              </table>" ;
            }else if($process == 'Notapprove'){
                      $email_body = $email_body."
                                  <table width='80%' border='0' align='center' cellpadding='3' cellspacing='0'>
                                    <tbody>
                                      <tr>
                                        <td height='40' colspan='3' align='center' bgcolor='#E7E5E5'><strong>ผลการอนุมัติ งานเบิกค่าเดินทาง</strong></td>
                                      </tr>
                                      <tr>
                                        <td width='25%' height='40' align='right' bgcolor='#F7F7F7'><strong>สถานะอนุมัติ :</strong></td>
                                        <td width='2%' height='40' bgcolor='#F7F7F7'>&nbsp;</td>
                                        <td width='73%' height='40' bgcolor='#F7F7F7' style='font-size: 18pt; color:#C90003'>ไม่อนุมัติ</td>
                                      </tr>
                                      <tr>
                                        <td height='40' align='right'><strong>หมายเลขหนังสือ :</strong></td>
                                        <td height='40'>&nbsp;</td>
                                        <td height='40'>มอ.820/".$id_saraban."</td>
                                      </tr>
                                      <tr>
                                        <td height='40' align='right' bgcolor='#F7F7F7'><strong>เรื่อง :</strong></td>
                                        <td height='40' bgcolor='#F7F7F7'>&nbsp;</td>
                                        <td height='40' bgcolor='#F7F7F7'>".$topic."</td>
                                      </tr>
                                      <tr>
                                        <td height='40' align='right'><strong>วันที่อนุมัติ :</strong></td>
                                        <td height='40'>&nbsp;</td>
                                        <td height='40'>".$strDate."</td>
                                      </tr>
                                      <tr>
                                        <td height='40' align='right' bgcolor='#F7F7F7'><strong>ผู้อนุมัติ :</strong></td>
                                        <td height='40' bgcolor='#F7F7F7'>&nbsp;</td>
                                        <td height='40' bgcolor='#F7F7F7'>".$titlename." ".$firstname." ".$lastname."&nbsp; ตำแหน่งงาน ".$position_level."</td>
                                      </tr>
                                      <!--<tr>
                                        <td height='40' align='right' style='color:#C90003'><strong>เหตุผล :</strong></td>
                                        <td height='40'>&nbsp;</td>
                                        <td height='40'>ขาดเอกสาร จดหมายเชิญประชุม</td>
                                      </tr>
                                      <tr>
                                        <td height='40' align='right' bgcolor='#F7F7F7'>&nbsp;</td>
                                        <td height='40' bgcolor='#F7F7F7'>&nbsp;</td>
                                        <td height='40' bgcolor='#F7F7F7'>&nbsp;</td>
                                      </tr>-->
                                    </tbody>
                                  </table>";
            }
         }else if($budget == '0'){
             $subject = 'ผลการขออนุมัติเดินทาง';
            if($process == 'approve'){

                     $email_body = $email_body." 
                              <table width='80%' border='0' align='center' cellpadding='3' cellspacing='0'>
                                <tbody>
                                  <tr>
                                    <td height='40' colspan='3' align='center' bgcolor='#E7E5E5'><strong>ผลการอนุมัติ งานเบิกค่าเดินทาง</strong></td>
                                  </tr>
                                  <tr>
                                    <td width='25%' height='40' align='right' bgcolor='#F7F7F7'><strong>สถานะอนุมัติ :</strong></td>
                                    <td width='2%' height='40' bgcolor='#F7F7F7'>&nbsp;</td>
                                    <td width='73%' height='40' bgcolor='#F7F7F7' style='font-size: 18pt; color:#549400'>อนุมัติ</td>
                                  </tr>
                                  <tr>
                                    <td height='40' align='right'><strong>หมายเลขหนังสือ :</strong></td>
                                    <td height='40'>&nbsp;</td>
                                    <td height='40'>มอ.820/".$id_saraban."</td>
                                  </tr>
                                  <tr>
                                    <td height='40' align='right' bgcolor='#F7F7F7'><strong>เรื่อง :</strong></td>
                                    <td height='40' bgcolor='#F7F7F7'>&nbsp;</td>
                                    <td height='40' bgcolor='#F7F7F7'>".$topic."</td>
                                  </tr>
                                  <tr>
                                    <td height='40' align='right'><strong>วันที่อนุมัติ :</strong></td>
                                    <td height='40'>&nbsp;</td>
                                    <td height='40'>".$strDate."</td>
                                  </tr>
                                  <tr>
                                    <td height='40' align='right' bgcolor='#F7F7F7'><strong>ผู้อนุมัติ :</strong></td>
                                    <td height='40' bgcolor='#F7F7F7'>&nbsp;</td>
                                    <td height='40' bgcolor='#F7F7F7'>".$titlename." ".$firstname." ".$lastname."&nbsp; ตำแหน่งงาน ".$position_level."</td>
                                  </tr>
                                </tbody>
                              </table>" ;
            }else if($process == 'Notapprove'){
                      $email_body = $email_body."
                                  <table width='80%' border='0' align='center' cellpadding='3' cellspacing='0'>
                                    <tbody>
                                      <tr>
                                        <td height='40' colspan='3' align='center' bgcolor='#E7E5E5'><strong>ผลการอนุมัติ งานเบิกค่าเดินทาง</strong></td>
                                      </tr>
                                      <tr>
                                        <td width='25%' height='40' align='right' bgcolor='#F7F7F7'><strong>สถานะอนุมัติ :</strong></td>
                                        <td width='2%' height='40' bgcolor='#F7F7F7'>&nbsp;</td>
                                        <td width='73%' height='40' bgcolor='#F7F7F7' style='font-size: 18pt; color:#C90003'>ไม่อนุมัติ</td>
                                      </tr>
                                      <tr>
                                        <td height='40' align='right'><strong>หมายเลขหนังสือ :</strong></td>
                                        <td height='40'>&nbsp;</td>
                                        <td height='40'>มอ.820/".$id_saraban."</td>
                                      </tr>
                                      <tr>
                                        <td height='40' align='right' bgcolor='#F7F7F7'><strong>เรื่อง :</strong></td>
                                        <td height='40' bgcolor='#F7F7F7'>&nbsp;</td>
                                        <td height='40' bgcolor='#F7F7F7'>".$topic."</td>
                                      </tr>
                                      <tr>
                                        <td height='40' align='right'><strong>วันที่อนุมัติ :</strong></td>
                                        <td height='40'>&nbsp;</td>
                                        <td height='40'>".$strDate."</td>
                                      </tr>
                                      <tr>
                                        <td height='40' align='right' bgcolor='#F7F7F7'><strong>ผู้อนุมัติ :</strong></td>
                                        <td height='40' bgcolor='#F7F7F7'>&nbsp;</td>
                                        <td height='40' bgcolor='#F7F7F7'>".$titlename." ".$firstname." ".$lastname."&nbsp; ตำแหน่งงาน ".$position_level."</td>
                                      </tr>
                                      <!--<tr>
                                        <td height='40' align='right' style='color:#C90003'><strong>เหตุผล :</strong></td>
                                        <td height='40'>&nbsp;</td>
                                        <td height='40'>ขาดเอกสาร จดหมายเชิญประชุม</td>
                                      </tr>
                                      <tr>
                                        <td height='40' align='right' bgcolor='#F7F7F7'>&nbsp;</td>
                                        <td height='40' bgcolor='#F7F7F7'>&nbsp;</td>
                                        <td height='40' bgcolor='#F7F7F7'>&nbsp;</td>
                                      </tr>-->
                                    </tbody>
                                  </table>";
            }
         }
         $email_body = $email_body."<p>&nbsp;</p>
                                  <p>ท่านสามารถตรวจสอบผลการขออนุมัติเดินทาง และ ผลการขอเบิกค่าเดินทาง&nbsp; ได้ที่<br>
                                    <a href='http://www.fempsu.com.122.155.167.147.no-domain.name/allowance/Login_user' target='_blank'>http://www.fempsu.com.122.155.167.147.no-domain.name/allowance/Login_user.com</a>&nbsp; <br>
                                  โดยใช้ Username &amp; Password ที่ท่านได้ทำการลงทะเบียนไว้      </p>
                                <p>&nbsp;</p></td>
                                <td align='left' valign='top'>&nbsp;</td>
                              </tr>
                              <tr>
                                <td height='108' align='left'>&nbsp;</td>
                                <td height='108' colspan='2' align='center' valign='top'><a href='http://www.fempsu.com.122.155.167.147.no-domain.name/allowance/Login_user' target='_blank' class='share'>งานเบิกค่าเดินทาง<a href='http://www.fempsu.com.122.155.167.147.no-domain.name/Saraban/login_user' target='_blank' class='book'>งานสารบรรณ</a></td>
                                <td height='108' align='left' valign='top'>&nbsp;</td>
                              </tr>
                              <tr>
                                <td height='100' align='left' bgcolor='#f0f0f0'>&nbsp;</td>
                                <td height='100' colspan='2' align='center' bgcolor='#f0f0f0' style='font-size: 9pt; color: #666666; line-height: 20px;'><h3><br>
                                  Faculty of Environmental Management Prince of Songkla University</h3>        
                                      <p>P.O.Box 50 Kor-Hong, Hatyai, Songkhla 90112 Thailand<br>
                                Tel. +66-7428-6810 , +66-74-28-6899   Fax. +66-7442-9758  </p></td>
                                <td height='100' align='left' valign='top' bgcolor='#f0f0f0'>&nbsp;</td>
                              </tr>
                            </tbody>
                          </table>
                          </body>
                          </html>";

         //Load email library 
         $this->load->library('email'); 

         $this->email->from($from_email, 'ระบบงานการเงิน'); 
         $this->email->to($to_email);
         $this->email->subject($subject); 
         $this->email->message($email_body); 
         //Send mail 
         if($this->email->send()){ 
            $datachk['chkmail'] = true;
         }else{ 
            $datachk['chkmail'] = false;
          }
           echo json_encode($datachk); 
            exit;
      }

public function send_mail_admin() { //ส่งเมล์จากแอดมิน
            $process       = $this->input->post('process'); //ส่งมาจากไหน
            $result        = $this->input->post('result');  //ผลการอนุมัติ
            $id_allowance  = $this->input->post('id_allowance');
            $to_email      = $this->input->post('email'); //ไปหาผู้ยื่นขอ
            $topic         = $this->input->post('topic');
            $id_saraban    = $this->input->post('id_saraban');
            $remark         = $this->input->post('remark');
            $tname         = $this->input->post('tname');
            $fname         = $this->input->post('fname');
            $lname         = $this->input->post('lname');
            

            $strYear = date("Y")+543;
            $strMonth= date("n");
            $strDay= date("j");
            $strHour= date("H");
            $strMinute= date("i");
            $strSeconds= date("s");
            $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤษจิกายน","ธันวาคม");
            $strMonthThai=$strMonthCut[$strMonth];
            $date   = $strDay." ".$strMonthThai." ".$strYear;
         

            $ccOwner      = $this->input->post('userupdate');
            $approver       = $this->input->post('sendto'); //id ผู้อนุมัติ
            $datachk       = array();

            $this->load->model("Allowance_model"); 
            $sql = "SELECT titlename,firstname,lastname,email FROM tbl_user_data 
                    where id = '$ccOwner' and data_status = '1'"; //ดึงเมล์แอดมิน
            $getMail = $this->Allowance_model->getdata($sql);
            $EmailCC = $getMail[0]['email'];
            $tname_admin = $getMail[0]['titlename'];
            $fname_admin = $getMail[0]['firstname'];
            $lname_admin = $getMail[0]['lastname'];

            //print_r($EmailCC);

            //set subject
            if($process == 'allow'){
              $subject      = 'ผลการตรวจสอบเอกสาร งานเบิกค่าเดินทาง'; 
              $from   = "admin_allowance@gmail.com";
              $namesend     = 'ระบบการเงิน';
            }else if($process == 'saraban'){
              $subject      = 'ผลการตรวจสอบเอกสาร งานอนุมัติเดินทาง';
              $from   = "admin_saraban@gmail.com";
              $namesend     = 'ระบบสารบรรณ';
            }

            //set result
            if($result == 'pass'){
              $showresult = ' ผลการตรวจเอกสาร "ผ่าน" รอดำเนินการอนุมัติจากคณะบดี';
              $this->send_mail_to_approvers($approver,$EmailCC,$from,$subject,$id_saraban,$topic,$namesend,$tname_admin,$fname_admin,$lname_admin,$date);
              /*$email_body ="<div>".$subject."</div>
                        <div>หมายเลขหนังสือ มอ.820/".$id_saraban."</div>
                        <div>เรื่อง ".$topic."<div>
                        <div>".$showresult."<div>" ;
              */
              $email_body = "<!doctype html>
              <html>
              <head>
              <meta charset='utf-8'>
              <title>Untitled Document</title>
               
              <style type='text/css'>
              .share {
                -moz-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
                -webkit-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
                box-shadow:inset 0px 1px 0px 0px #c1ed9c;
                background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #9dce2c), color-stop(1, #8cb82b) );
                background:-moz-linear-gradient( center top, #9dce2c 5%, #8cb82b 100% );
                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#9dce2c', endColorstr='#8cb82b');
                background-color:#9dce2c;
                -webkit-border-top-left-radius:6px;
                -moz-border-radius-topleft:6px;
                border-top-left-radius:6px;
                -webkit-border-top-right-radius:6px;
                -moz-border-radius-topright:6px;
                border-top-right-radius:6px;
                -webkit-border-bottom-right-radius:6px;
                -moz-border-radius-bottomright:6px;
                border-bottom-right-radius:6px;
                -webkit-border-bottom-left-radius:6px;
                -moz-border-radius-bottomleft:6px;
                border-bottom-left-radius:6px;
                text-indent:0;
                border:1px solid #83c41a;
                display:inline-block;
                color:#ffffff;
                font-family:Arial;
                font-size:15px;
                font-weight:normal;
                font-style:normal;
                height:40px;
                line-height:40px;
                width:177px;
                text-decoration:none;
                text-align:center;
                text-shadow:1px 1px 0px #689324;
              }
              .share:hover {
                background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8cb82b), color-stop(1, #9dce2c) );
                background:-moz-linear-gradient( center top, #8cb82b 5%, #9dce2c 100% );
                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#8cb82b', endColorstr='#9dce2c');
                background-color:#8cb82b;
              }.share:active {
                position:relative;
                top:1px;
              }
              .book {
                -moz-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
                -webkit-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
                box-shadow:inset 0px 1px 0px 0px #bbdaf7;
                background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5) );
                background:-moz-linear-gradient( center top, #79bbff 5%, #378de5 100% );
                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#79bbff', endColorstr='#378de5');
                background-color:#79bbff;
                -webkit-border-top-left-radius:6px;
                -moz-border-radius-topleft:6px;
                border-top-left-radius:6px;
                -webkit-border-top-right-radius:6px;
                -moz-border-radius-topright:6px;
                border-top-right-radius:6px;
                -webkit-border-bottom-right-radius:6px;
                -moz-border-radius-bottomright:6px;
                border-bottom-right-radius:6px;
                -webkit-border-bottom-left-radius:6px;
                -moz-border-radius-bottomleft:6px;
                border-bottom-left-radius:6px;
                text-indent:0;
                border:1px solid #84bbf3;
                display:inline-block;
                color:#ffffff;
                font-family:Arial;
                font-size:15px;
                font-weight:normal;
                font-style:normal;
                height:40px;
                line-height:40px;
                width:118px;
                text-decoration:none;
                text-align:center;
                text-shadow:1px 1px 0px #528ecc;
              }
              .book:hover {
                background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #378de5), color-stop(1, #79bbff) );
                background:-moz-linear-gradient( center top, #378de5 5%, #79bbff 100% );
                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#378de5', endColorstr='#79bbff');
                background-color:#378de5;
              }.book:active {
                position:relative;
                top:1px;
              }</style>
              </head>
              
              <body>
              <table width='60%' height='772' border='0' align='center' cellpadding='0' cellspacing='0' style='font-family: arial; font-size: 11pt; border:1px solid #D5D5D5;'>
                <tbody>
                  <tr>
                    <td height='70' bgcolor='#26ab93'>&nbsp;</td>
                    <td width='224'  bgcolor='#26ab93' style='color:#FFFFFF; font-size: 16pt;'><img src='".base_url()."assets_saraban/img/logo-white-header.png' width='500' height='95' alt=''/></td>
                    <td width='1063' height='70'  bgcolor='#26ab93' style='color:#FFFFFF; font-size: 16pt;'>&nbsp;</td>
                    <td width='38'  bgcolor='#26ab93'>&nbsp;</td>
                  </tr>
                  <tr>
                    <td width='43' height='67'>&nbsp;</td>
                    <td height='67' colspan='2' align='left' valign='bottom' style='font-size: 16pt; color: #666666; font-weight: 400;'>เรียน&nbsp; ".$tname." ".$fname." ".$lname."</td>
                    <td align='left'>&nbsp;</td>
                  </tr>
                  <tr>
                    <td height='223' align='left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . </td>
                    <td height='223' colspan='2' align='center' valign='top' style='font-size: 11pt; color: #666666; line-height: 25px;'><p><br>
                      </p>
                      <table width='80%' border='0' align='center' cellpadding='3' cellspacing='0'>
                        <tbody>
                          <tr>
                            <td height='40' colspan='3' align='center' bgcolor='#E7E5E5'><strong>".$subject."</strong></td>
                          </tr>
                          <tr>
                            <td width='25%' height='40' align='right' bgcolor='#F7F7F7'><strong>สถานะเอกสาร :</strong></td>
                            <td width='2%' height='40' bgcolor='#F7F7F7'>&nbsp;</td>
                            <td width='73%' height='40' bgcolor='#F7F7F7' style='font-size: 18pt; color:#549400'>ผ่าน</td>
                          </tr>
                          <tr>
                            <td height='40' align='right'><strong>หมายเลขหนังสือ :</strong></td>
                            <td height='40'>&nbsp;</td>
                            <td height='40'>มอ.820/".$id_saraban."</td>
                          </tr>
                          <tr>
                            <td height='40' align='right' bgcolor='#F7F7F7'><strong>เรื่อง :</strong></td>
                            <td height='40' bgcolor='#F7F7F7'>&nbsp;</td>
                            <td height='40' bgcolor='#F7F7F7'>".$topic."</td>
                          </tr>
                          <tr>
                            <td height='40' align='right'><strong>วันที่อนุมัติ :</strong></td>
                            <td height='40'>&nbsp;</td>
                            <td height='40'>".$date."</td>
                          </tr>
                          <tr>
                            <td height='40' align='right' bgcolor='#F7F7F7'><strong>ผู้ตรวจ :</strong></td>
                            <td height='40' bgcolor='#F7F7F7'>&nbsp;</td>
                            <td height='40' bgcolor='#F7F7F7'>".$tname_admin." ".$fname_admin." ".$lname_admin." ตำแหน่งงาน เจ้าหน้าที่ การเงิน</td>
                          </tr>
                        </tbody>
                      </table>
                      <p>ท่านสามารถตรวจสอบผลการขออนุมัติเดินทาง และ ผลการขอเบิกค่าเดินทาง&nbsp; ได้ที่<br>
                        <a href='http://www.fempsu.com.122.155.167.147.no-domain.name/allowance/Login_user' target='_blank'>http://www.fempsu.com.122.155.167.147.no-domain.name/allowance/Login_user.com</a>&nbsp; <br>
                      โดยใช้ Username &amp; Password ที่ท่านได้ทำการลงทะเบียนไว้      </p>
                    <p>&nbsp;</p></td>
                    <td align='left' valign='top'>&nbsp;</td>
                  </tr>
                  <tr>
                    <td height='108' align='left'>&nbsp;</td>
                    <td height='108' colspan='2' align='center' valign='top'><a href='http://www.fempsu.com.122.155.167.147.no-domain.name/allowance/Login_user' target='_blank' class='share'>งานเบิกค่าเดินทาง</a> <a href='http://www.fempsu.com.122.155.167.147.no-domain.name/Saraban/login_user' target='_blank' class='book'>งานสารบรรณ</a></td>
                    <td height='108' align='left' valign='top'>&nbsp;</td>
                  </tr>
                  <tr>
                    <td height='100' align='left' bgcolor='#f0f0f0'>&nbsp;</td>
                    <td height='100' colspan='2' align='center' bgcolor='#f0f0f0' style='font-size: 9pt; color: #666666; line-height: 20px;'><h3><br>
                      Faculty of Environmental Management Prince of Songkla University</h3>        
                          <p>P.O.Box 50 Kor-Hong, Hatyai, Songkhla 90112 Thailand<br>
                    Tel. +66-7428-6810 , +66-74-28-6899   Fax. +66-7442-9758  </p></td>
                    <td height='100' align='left' valign='top' bgcolor='#f0f0f0'>&nbsp;</td>
                  </tr>
                </tbody>
              </table>
              </body>
              </html>";
            }else if($result == 'fail'){
                $showresult = ' ผลการตรวจเอกสาร "ไม่ผ่าน"';
                /*$email_body ="<div>".$subject."</div>
                          <div>การยื่นขออนุมัติ</div>
                          <div>เรื่อง ".$topic."<div>
                          <div>".$showresult." เนื่องจาก ".$remark."<div> 
                          <div>กรุณาแก้ไขและตรวจสอบเอกสารอีกครั้งค่ะ<div>" ;
                */
                $email_body = "<!doctype html>
              <html>
              <head>
              <meta charset='utf-8'>
              <title>Untitled Document</title>
               
              <style type='text/css'>
              .share {
                -moz-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
                -webkit-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
                box-shadow:inset 0px 1px 0px 0px #c1ed9c;
                background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #9dce2c), color-stop(1, #8cb82b) );
                background:-moz-linear-gradient( center top, #9dce2c 5%, #8cb82b 100% );
                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#9dce2c', endColorstr='#8cb82b');
                background-color:#9dce2c;
                -webkit-border-top-left-radius:6px;
                -moz-border-radius-topleft:6px;
                border-top-left-radius:6px;
                -webkit-border-top-right-radius:6px;
                -moz-border-radius-topright:6px;
                border-top-right-radius:6px;
                -webkit-border-bottom-right-radius:6px;
                -moz-border-radius-bottomright:6px;
                border-bottom-right-radius:6px;
                -webkit-border-bottom-left-radius:6px;
                -moz-border-radius-bottomleft:6px;
                border-bottom-left-radius:6px;
                text-indent:0;
                border:1px solid #83c41a;
                display:inline-block;
                color:#ffffff;
                font-family:Arial;
                font-size:15px;
                font-weight:normal;
                font-style:normal;
                height:40px;
                line-height:40px;
                width:177px;
                text-decoration:none;
                text-align:center;
                text-shadow:1px 1px 0px #689324;
              }
              .share:hover {
                background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8cb82b), color-stop(1, #9dce2c) );
                background:-moz-linear-gradient( center top, #8cb82b 5%, #9dce2c 100% );
                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#8cb82b', endColorstr='#9dce2c');
                background-color:#8cb82b;
              }.share:active {
                position:relative;
                top:1px;
              }
              .book {
                -moz-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
                -webkit-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
                box-shadow:inset 0px 1px 0px 0px #bbdaf7;
                background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5) );
                background:-moz-linear-gradient( center top, #79bbff 5%, #378de5 100% );
                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#79bbff', endColorstr='#378de5');
                background-color:#79bbff;
                -webkit-border-top-left-radius:6px;
                -moz-border-radius-topleft:6px;
                border-top-left-radius:6px;
                -webkit-border-top-right-radius:6px;
                -moz-border-radius-topright:6px;
                border-top-right-radius:6px;
                -webkit-border-bottom-right-radius:6px;
                -moz-border-radius-bottomright:6px;
                border-bottom-right-radius:6px;
                -webkit-border-bottom-left-radius:6px;
                -moz-border-radius-bottomleft:6px;
                border-bottom-left-radius:6px;
                text-indent:0;
                border:1px solid #84bbf3;
                display:inline-block;
                color:#ffffff;
                font-family:Arial;
                font-size:15px;
                font-weight:normal;
                font-style:normal;
                height:40px;
                line-height:40px;
                width:118px;
                text-decoration:none;
                text-align:center;
                text-shadow:1px 1px 0px #528ecc;
              }
              .book:hover {
                background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #378de5), color-stop(1, #79bbff) );
                background:-moz-linear-gradient( center top, #378de5 5%, #79bbff 100% );
                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#378de5', endColorstr='#79bbff');
                background-color:#378de5;
              }.book:active {
                position:relative;
                top:1px;
              }</style>
              </head>
              
              <body>
              <table width='60%' height='772' border='0' align='center' cellpadding='0' cellspacing='0' style='font-family: arial; font-size: 11pt; border:1px solid #D5D5D5;'>
                <tbody>
                  <tr>
                    <td height='70' bgcolor='#26ab93'>&nbsp;</td>
                    <td width='224'  bgcolor='#26ab93' style='color:#FFFFFF; font-size: 16pt;'><img src='".base_url()."assets_saraban/img/logo-white-header.png' width='500' height='95' alt=''/></td>
                    <td width='1063' height='70'  bgcolor='#26ab93' style='color:#FFFFFF; font-size: 16pt;'>&nbsp;</td>
                    <td width='38'  bgcolor='#26ab93'>&nbsp;</td>
                  </tr>
                  <tr>
                    <td width='43' height='67'>&nbsp;</td>
                    <td height='67' colspan='2' align='left' valign='bottom' style='font-size: 16pt; color: #666666; font-weight: 400;'>เรียน&nbsp; ".$tname." ".$fname." ".$lname."</td>
                    <td align='left'>&nbsp;</td>
                  </tr>
                  <tr>
                    <td height='223' align='left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . </td>
                    <td height='223' colspan='2' align='center' valign='top' style='font-size: 11pt; color: #666666; line-height: 25px;'><p><br>
                      </p>
                      <table width='80%' border='0' align='center' cellpadding='3' cellspacing='0'>
                        <tbody>
                          <tr>
                            <td height='40' colspan='3' align='center' bgcolor='#E7E5E5'><strong>".$subject."</strong></td>
                          </tr>
                          <tr>
                            <td width='25%' height='40' align='right' bgcolor='#F7F7F7'><strong>สถานะเอกสาร :</strong></td>
                            <td width='2%' height='40' bgcolor='#F7F7F7'>&nbsp;</td>
                            <td width='73%' height='40' bgcolor='#F7F7F7' style='font-size: 18pt; color:#C90003'>ไม่ผ่าน</td>
                          </tr>
                          <tr>
                            <td height='40' align='right'><strong>หมายเลขหนังสือ :</strong></td>
                            <td height='40'>&nbsp;</td>
                            <td height='40'>มอ.820/".$id_saraban."</td>
                          </tr>
                          <tr>
                            <td height='40' align='right' bgcolor='#F7F7F7'><strong>เรื่อง :</strong></td>
                            <td height='40' bgcolor='#F7F7F7'>&nbsp;</td>
                            <td height='40' bgcolor='#F7F7F7'>".$topic."</td>
                          </tr>
                          <tr>
                            <td height='40' align='right'><strong>วันที่อนุมัติ :</strong></td>
                            <td height='40'>&nbsp;</td>
                            <td height='40'>".$date."</td>
                          </tr>
                          <tr>
                            <td height='40' align='right' bgcolor='#F7F7F7'><strong>ผู้ตรวจ :</strong></td>
                            <td height='40' bgcolor='#F7F7F7'>&nbsp;</td>
                            <td height='40' bgcolor='#F7F7F7'>".$tname_admin." ".$fname_admin." ".$lname_admin." ตำแหน่งงาน เจ้าหน้าที่ การเงิน</td>
                          </tr>
                          <tr>
                            <td height='40' align='right' style='color:#C90003'><strong>เหตุผลเอกสาร :</strong></td>
                            <td height='40'>&nbsp;</td>
                            <td height='40'>".$remark."</td>
                          </tr>
                        </tbody>
                      </table>
                      <p>ท่านสามารถตรวจสอบผลการขออนุมัติเดินทาง และ ผลการขอเบิกค่าเดินทาง&nbsp; ได้ที่<br>
                        <a href='http://www.fempsu.com.122.155.167.147.no-domain.name/allowance/Login_user' target='_blank'>http://www.fempsu.com.122.155.167.147.no-domain.name/allowance/Login_user.com</a>&nbsp; <br>
                      โดยใช้ Username &amp; Password ที่ท่านได้ทำการลงทะเบียนไว้      </p>
                    <p>&nbsp;</p></td>
                    <td align='left' valign='top'>&nbsp;</td>
                  </tr>
                  <tr>
                    <td height='108' align='left'>&nbsp;</td>
                    <td height='108' colspan='2' align='center' valign='top'><a href='http://www.fempsu.com.122.155.167.147.no-domain.name/allowance/Login_user' target='_blank' class='share'>งานเบิกค่าเดินทาง</a> <a href='http://www.fempsu.com.122.155.167.147.no-domain.name/Saraban/login_user' target='_blank' class='book'>งานสารบรรณ</a></td>
                    <td height='108' align='left' valign='top'>&nbsp;</td>
                  </tr>
                  <tr>
                    <td height='100' align='left' bgcolor='#f0f0f0'>&nbsp;</td>
                    <td height='100' colspan='2' align='center' bgcolor='#f0f0f0' style='font-size: 9pt; color: #666666; line-height: 20px;'><h3><br>
                      Faculty of Environmental Management Prince of Songkla University</h3>        
                          <p>P.O.Box 50 Kor-Hong, Hatyai, Songkhla 90112 Thailand<br>
                    Tel. +66-7428-6810 , +66-74-28-6899   Fax. +66-7442-9758  </p></td>
                    <td height='100' align='left' valign='top' bgcolor='#f0f0f0'>&nbsp;</td>
                  </tr>
                </tbody>
              </table>
              </body>
              </html>
              ";
            }
            
            //Load email library 
            $this->load->library('email'); 
      
            $this->email->from($from, $namesend); 
            $this->email->to($to_email);
            $this->email->cc($EmailCC);
            $this->email->subject($subject); 
            $this->email->message($email_body); 
      
            //Send mail 
            if($this->email->send()){ 
              $datachk['chkmail'] = true;
            }else{ 
              $datachk['chkmail'] = false;
            }

            echo json_encode($datachk); 
            exit;
        }

        public function send_mail_to_approvers($approver,$EmailCC,$from,$subject,$id_saraban,$topic,$namesend,$tname_admin,$fname_admin,$lname_admin,$date) { 
            $this->load->model("Allowance_model");
            $sql = "SELECT titlename,firstname,lastname,email FROM tbl_user_data
                    where id = '$approver' and data_status = '1'";
            $getMail = $this->Allowance_model->getdata($sql);
            $to_email = $getMail[0]['email'];
            $to_tname = $getMail[0]['titlename'];
            $to_fname = $getMail[0]['firstname'];
            $to_lname = $getMail[0]['lastname'];

            /*$email_body ="<div>".$subject."</div>
                        <div>หมายเลขหนังสือ มอ.820/".$id_saraban."</div>
                        <div>เรื่อง ".$topic."<div>
                        <div>ผลการตรวจเอกสาร :: 'ผ่าน'  <div> 

                        <div>คณบดีสามารถ เข้าดำเนินการได้ที่ ".base_url('allowance/login_admin')."<div>" ;
            */
            $email_body = "<!doctype html>
            <html>
            <head>
            <meta charset='utf-8'>
            <title>Untitled Document</title>
             
            <style type='text/css'>
            .share {
              -moz-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
              -webkit-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
              box-shadow:inset 0px 1px 0px 0px #c1ed9c;
              background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #9dce2c), color-stop(1, #8cb82b) );
              background:-moz-linear-gradient( center top, #9dce2c 5%, #8cb82b 100% );
              filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#9dce2c', endColorstr='#8cb82b');
              background-color:#9dce2c;
              -webkit-border-top-left-radius:6px;
              -moz-border-radius-topleft:6px;
              border-top-left-radius:6px;
              -webkit-border-top-right-radius:6px;
              -moz-border-radius-topright:6px;
              border-top-right-radius:6px;
              -webkit-border-bottom-right-radius:6px;
              -moz-border-radius-bottomright:6px;
              border-bottom-right-radius:6px;
              -webkit-border-bottom-left-radius:6px;
              -moz-border-radius-bottomleft:6px;
              border-bottom-left-radius:6px;
              text-indent:0;
              border:1px solid #83c41a;
              display:inline-block;
              color:#ffffff;
              font-family:Arial;
              font-size:15px;
              font-weight:normal;
              font-style:normal;
              height:40px;
              line-height:40px;
              width:177px;
              text-decoration:none;
              text-align:center;
              text-shadow:1px 1px 0px #689324;
            }
            .share:hover {
              background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8cb82b), color-stop(1, #9dce2c) );
              background:-moz-linear-gradient( center top, #8cb82b 5%, #9dce2c 100% );
              filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#8cb82b', endColorstr='#9dce2c');
              background-color:#8cb82b;
            }.share:active {
              position:relative;
              top:1px;
            }
            .book {
              -moz-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
              -webkit-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
              box-shadow:inset 0px 1px 0px 0px #bbdaf7;
              background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5) );
              background:-moz-linear-gradient( center top, #79bbff 5%, #378de5 100% );
              filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#79bbff', endColorstr='#378de5');
              background-color:#79bbff;
              -webkit-border-top-left-radius:6px;
              -moz-border-radius-topleft:6px;
              border-top-left-radius:6px;
              -webkit-border-top-right-radius:6px;
              -moz-border-radius-topright:6px;
              border-top-right-radius:6px;
              -webkit-border-bottom-right-radius:6px;
              -moz-border-radius-bottomright:6px;
              border-bottom-right-radius:6px;
              -webkit-border-bottom-left-radius:6px;
              -moz-border-radius-bottomleft:6px;
              border-bottom-left-radius:6px;
              text-indent:0;
              border:1px solid #84bbf3;
              display:inline-block;
              color:#ffffff;
              font-family:Arial;
              font-size:15px;
              font-weight:normal;
              font-style:normal;
              height:40px;
              line-height:40px;
              width:118px;
              text-decoration:none;
              text-align:center;
              text-shadow:1px 1px 0px #528ecc;
            }
            .book:hover {
              background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #378de5), color-stop(1, #79bbff) );
              background:-moz-linear-gradient( center top, #378de5 5%, #79bbff 100% );
              filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#378de5', endColorstr='#79bbff');
              background-color:#378de5;
            }.book:active {
              position:relative;
              top:1px;
            }</style>
            </head>
            
            <body>
            <table width='60%' height='772' border='0' align='center' cellpadding='0' cellspacing='0' style='font-family: arial; font-size: 11pt; border:1px solid #D5D5D5;'>
              <tbody>
                <tr>
                  <td height='70' bgcolor='#26ab93'>&nbsp;</td>
                  <td width='224'  bgcolor='#26ab93' style='color:#FFFFFF; font-size: 16pt;'><img src='".base_url()."assets_saraban/img/logo-white-header.png' width='500' height='95' alt=''/></td>
                  <td width='1063' height='70'  bgcolor='#26ab93' style='color:#FFFFFF; font-size: 16pt;'>&nbsp;</td>
                  <td width='38'  bgcolor='#26ab93'>&nbsp;</td>
                </tr>
                <tr>
                  <td width='43' height='67'>&nbsp;</td>
                  <td height='67' colspan='2' align='left' valign='bottom' style='font-size: 16pt; color: #666666; font-weight: 400;'>เรียน&nbsp; ".$to_tname." ".$to_fname." ".$to_lname."</td>
                  <td align='left'>&nbsp;</td>
                </tr>
                <tr>
                  <td height='223' align='left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . </td>
                  <td height='223' colspan='2' align='center' valign='top' style='font-size: 11pt; color: #666666; line-height: 25px;'><p><br>
                    </p>
                    <table width='80%' border='0' align='center' cellpadding='3' cellspacing='0'>
                      <tbody>
                        <tr>
                          <td height='40' colspan='3' align='center' bgcolor='#E7E5E5'><strong>".$subject."</strong></td>
                        </tr>
                        <tr>
                          <td width='25%' height='40' align='right' bgcolor='#F7F7F7'><strong>สถานะเอกสาร :</strong></td>
                          <td width='2%' height='40' bgcolor='#F7F7F7'>&nbsp;</td>
                          <td width='73%' height='40' bgcolor='#F7F7F7' style='font-size: 18pt; color:#549400'>ผ่าน</td>
                        </tr>
                        <tr>
                          <td height='40' align='right'><strong>หมายเลขหนังสือ :</strong></td>
                          <td height='40'>&nbsp;</td>
                          <td height='40'>มอ.820/".$id_saraban."</td>
                        </tr>
                        <tr>
                          <td height='40' align='right' bgcolor='#F7F7F7'><strong>เรื่อง :</strong></td>
                          <td height='40' bgcolor='#F7F7F7'>&nbsp;</td>
                          <td height='40' bgcolor='#F7F7F7'>".$topic."</td>
                        </tr>
                        <tr>
                          <td height='40' align='right'><strong>วันที่อนุมัติ :</strong></td>
                          <td height='40'>&nbsp;</td>
                          <td height='40'>".$date."</td>
                        </tr>
                        <tr>
                          <td height='40' align='right' bgcolor='#F7F7F7'><strong>ผู้ตรวจ :</strong></td>
                          <td height='40' bgcolor='#F7F7F7'>&nbsp;</td>
                          <td height='40' bgcolor='#F7F7F7'>".$tname_admin." ".$fname_admin." ".$lname_admin." ตำแหน่งงาน เจ้าหน้าที่ การเงิน</td>
                        </tr>
                        <tr>
                          <td height='40' align='right'><strong>คณะบดีสามารถเข้าดำเนินการได้ที่ :</strong></td>
                          <td height='40'>&nbsp;</td>
                          <td height='40'>คณบดีสามารถ เข้าดำเนินการได้ที่ <a href='".base_url('allowance/login_approve')."'>คลิก</a></td>
                        </tr>
                      </tbody>
                    </table>
                    <p>ท่านสามารถตรวจสอบผลการขออนุมัติเดินทาง และ ผลการขอเบิกค่าเดินทาง&nbsp; ได้ที่<br>
                      <a href='http://www.fempsu.com.122.155.167.147.no-domain.name/allowance/Login_user' target='_blank'>http://www.fempsu.com.122.155.167.147.no-domain.name/allowance/Login_user.com</a>&nbsp; <br>
                    โดยใช้ Username &amp; Password ที่ท่านได้ทำการลงทะเบียนไว้      </p>
                  <p>&nbsp;</p></td>
                  <td align='left' valign='top'>&nbsp;</td>
                </tr>
                <tr>
                  <td height='108' align='left'>&nbsp;</td>
                  <td height='108' colspan='2' align='center' valign='top'><a href='http://www.fempsu.com.122.155.167.147.no-domain.name/allowance/Login_user' target='_blank' class='share'>งานเบิกค่าเดินทาง</a> <a href='http://www.fempsu.com.122.155.167.147.no-domain.name/Saraban/login_user' target='_blank' class='book'>งานสารบรรณ</a></td>
                  <td height='108' align='left' valign='top'>&nbsp;</td>
                </tr>
                <tr>
                  <td height='100' align='left' bgcolor='#f0f0f0'>&nbsp;</td>
                  <td height='100' colspan='2' align='center' bgcolor='#f0f0f0' style='font-size: 9pt; color: #666666; line-height: 20px;'><h3><br>
                    Faculty of Environmental Management Prince of Songkla University</h3>        
                        <p>P.O.Box 50 Kor-Hong, Hatyai, Songkhla 90112 Thailand<br>
                  Tel. +66-7428-6810 , +66-74-28-6899   Fax. +66-7442-9758  </p></td>
                  <td height='100' align='left' valign='top' bgcolor='#f0f0f0'>&nbsp;</td>
                </tr>
              </tbody>
            </table>
            </body>
            </html>";
            //Load email library 
            $this->load->library('email'); 
      
            $this->email->from($from, $namesend); 
            $this->email->to($to_email);
            $this->email->cc($EmailCC);
            $this->email->subject($subject); 
            $this->email->message($email_body); 
      
            //Send mail 
            $this->email->send();
        }

   } 
?>