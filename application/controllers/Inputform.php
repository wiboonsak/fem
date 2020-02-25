<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inputform extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();

        // Load session library
        $this->load->library('session');

        // Load database
        $this->load->model('Login_database_allowance');
        $this->load->model('Inputform_model');
        $this->load->model('Allowance_model');
        $this->load->model('Saraban_model');
    }   


    public function form_alone($idsaraban=null,$uer_id=null,$type_travel=null,$doc_id=null){ 

            //$idsaraban  =   $this->uri->segment(3);
            $table = '';
            $data  = array();
            $data['idsaraban'] = $idsaraban;
            $data['user_id'] = $uer_id;
            $data['doc1_id'] = $doc_id;
            $data['type_travel'] = $type_travel;
		
			/*$userDetail = $this->Allowance_model->get_userDetail($uer_id);	
			foreach($userDetail->result() as $userDetail2){}		
			$money2 = $this->Allowance_model->calculate_money($uer_id);		
			$data2['balance'] = $userDetail2->quota - $money2;*/
			if($this->session->userdata['logged_in']['status'] == "user"){
	
				$quotaH = 0; $moneyQ = 0; $moneyQ2 = 0;
	
				$checkQuotaH = $this->Allowance_model->check_quota($this->session->userdata['logged_in']['id']);
				$numQuotaH = $checkQuotaH->num_rows();

				if($numQuotaH > 0){

					foreach($checkQuotaH->result() as $checkQuotaH2){}
					$quotaH = $checkQuotaH2->quota;

					$moneyQ = $this->Allowance_model->calculate_money($this->session->userdata['logged_in']['id']);		
					$moneyQ2 = $quotaH - $moneyQ;	
				}
			}	
			$data2['balance'] =	$moneyQ2;
            
            if($type_travel == '1'){
                $table = 'tbl_local_document';
            }else{
                $table = 'tbl_outbound_document';
            }
            $data['table'] = $table;
            $data['getdocument'] = $this->Inputform_model->getdocument($idsaraban,$table);
            $data['getdoc1'] = $this->Inputform_model->getdoc1($doc_id,$type_travel);
            $data['getdoc3'] = $this->Inputform_model->getdoc3($idsaraban,$type_travel);
            $data['getdoc3_1'] = $this->Inputform_model->getdoc3_1($idsaraban,$type_travel);
			$this->load->view('templates/header',$data);
            $this->load->view('form/form',$data);
            $this->load->view('form/form_js',$data2);
    }
    //------------------------------------------
    public function form_group($idsaraban=null,$uer_id=null,$type_travel=null,$doc_id=null){ 
//$idsaraban  =   $this->uri->segment(3);
            $data['checktab'] = '';
            $data['idsaraban'] = $idsaraban;
            $data['user_id'] = $uer_id;
            $data['doc1_id'] = $doc_id;
            $data['type_travel'] = $type_travel;
		
			/*$userDetail = $this->Allowance_model->get_userDetail($uer_id);	
			foreach($userDetail->result() as $userDetail2){}		
			$money2 = $this->Allowance_model->calculate_money($uer_id);		
			$data2['balance'] = $userDetail2->quota - $money2;*/	
            $data['get_userDetail'] = $this->Allowance_model->get_userDetail($this->session->userdata['logged_in']['id']);
			if($this->session->userdata['logged_in']['status'] == "user"){
	
				$quotaH = 0; $moneyQ = 0; $moneyQ2 = 0;
	
				$checkQuotaH = $this->Allowance_model->check_quota($this->session->userdata['logged_in']['id']);
				$numQuotaH = $checkQuotaH->num_rows();

				if($numQuotaH > 0){

					foreach($checkQuotaH->result() as $checkQuotaH2){}
					$quotaH = $checkQuotaH2->quota;

					$moneyQ = $this->Allowance_model->calculate_money($this->session->userdata['logged_in']['id']);		
					$moneyQ2 = $quotaH - $moneyQ;	
				}
			}	
			$data2['balance'] =	$moneyQ2;			
		
            //$data['getdocument'] = $this->Inputform_model->getdocument($idsaraban);
//            $data['getdoc1'] = $this->Inputform_model->getdoc1($doc_id);
//            $data['getdoc3'] = $this->Inputform_model->getdoc3($idsaraban);
//            $data['getdoc3_1'] = $this->Inputform_model->getdoc3_1($idsaraban);
            //$data['get_listNameData'] = $this->Allowance_model->get_listNameData($idsaraban,'2');
            //$data  =  array();
            //$data['idsaraban']  =  $idsaraban;		
		
            $this->load->view('templates/header',$data);
            $this->load->view('form/form_group',$data);
            $this->load->view('form/form_group_js',$data2);
    }
	//------------------------------------------
    public function Travel(){ 
            $table = '';
            $idsaraban = $this->uri->segment(3);
            $type_travel = $this->uri->segment(4);
            $getdoc1 = $this->Inputform_model->getdoc1idsaraban($idsaraban,$type_travel);
            $getdoc2 = $this->Inputform_model->getdoc2($idsaraban,$type_travel);
            $numdoc1 = $getdoc1->num_rows();
            $numdoc2 = $getdoc2->num_rows();
            
            if($type_travel == '1'){
                $table = 'tbl_local_document';
            }else{
                $table = 'tbl_outbound_document';
            }
            
            if($numdoc1 > 0){
				foreach ($getdoc1->result() AS $Data){}
				$doc_id = $Data->doc_id;
				$user_update = $Data->user_update;
				$doc1_id = $Data->id;
            }
            if(($numdoc1 > 0) && ($numdoc2 > 0)){
				redirect(base_url('Inputform/form_group/'.$doc_id.'/'.$user_update.'/'.$type_travel.'/'.$doc1_id));
				
            }else if(($numdoc1 > 0)&&($numdoc2 == 0)){
				
             	redirect(base_url('Inputform/form_alone/'.$doc_id.'/'.$user_update.'/'.$type_travel.'/'.$doc1_id));
				
            }else{
				$data  =  array();
				$data['idsaraban']  =  $idsaraban;
				$data['type_travel']  =  $type_travel;
				$data['getdocument'] = $this->Inputform_model->getdocument($idsaraban,$table);
				$data2['balance'] = 0;	
				$this->load->view('templates/header',$data);
				$this->load->view('form/Travel',$data);
				$this->load->view('form/form_js',$data2);
            }
    }
    //------------------------------------------
    public function login(){
		
        $idsaraban  =   $this->input->get('saraban');
        $data  =  array();
        $data['idsaraban']  =  $idsaraban;
        $this->load->view('form/login',$data);
                
    }
        // Check for user login process
    public function user_login_process() 
    {

        # Response Data Array
        $resp = array();

        // Fields Submitted
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $idsaraban = $this->input->post("idsaraban");

        // Fields Submitted
        $data = array(
                    'username' => $username, 
                    'password' => md5($password)
                );

        // This array of data is returned for demo purpose, see assets_saraban/js/neon-forgotpassword.js
        $resp['submitted_data'] = $data;

        // Login success or invalid login data [success|invalid]
        // Your code will decide if username and password are correct

        $login_status = 'invalid'; 

        $result = $this->Login_database_allowance->user_login($data);

        if ($result != false) {

            $data = array(
                    'last_login' => date("Y-m-d H:i:sa")
                );

            $log = $this->Login_database_allowance->log_last_login_user($data,$username);

            if($log != false){

                $login_status = 'success';
            }

        } 

        $resp['login_status'] = $login_status;


        // Login Success URL
        if($login_status == 'success')
        {
            // If you validate the user you may set the user cookies/sessions here
            $resultuser = $this->Login_database_allowance->read_user_information($username);

            if ($resultuser != false) {

                $session_data = array(
                    'firstname'     => $resultuser[0]->firstname,
                    'lastname'      => $resultuser[0]->lastname,
                    'username'      => $resultuser[0]->user_name,
                    'user_type'     => $resultuser[0]->user_type,
                    'id'            => $resultuser[0]->id,
                    'status'        => "user"
                );

                // Add user data in session
                $this->session->set_userdata('logged_in', $session_data);

            }
            
            // Set the redirect url after successful login
            $resp['redirect_url'] = 'Travel/'.$idsaraban; 
        }

        echo json_encode($resp);            
    }

    public function form_edit(){
        $id_saraban =  $this->uri->segment(3); 
		/*$sql = "SELECT d1.* ,d2.* , d3.* , d4.* 
                FROM doc_1 as d1
                    INNER JOIN doc_2 as d2 on d1.id_saraban = d2.id_saraban
                    INNER JOIN doc_3 as d3 on d1.id_saraban = d3.id_saraban
                    INNER JOIN doc_4 as d4 on d1.id_saraban = d4.id_saraban
                WHERE d1.id_saraban = '$id_saraban' and d1.data_status = '1'";*/
        $sql1 = "SELECT * FROM doc_1 WHERE id_saraban = '$id_saraban' and data_status = '1'";
        $sql2 = "SELECT * FROM doc_2 WHERE id_saraban = '$id_saraban' and data_status = '1'";
        $sql3 = "SELECT * FROM doc_3 WHERE id_saraban = '$id_saraban' and data_status = '1'";
        $sql4 = "SELECT * FROM doc_4 WHERE id_saraban = '$id_saraban' and data_status = '1'";
		$this->load->model("Allowance_model");
		$data = array();              
        $data['getdata1'] = $this->Allowance_model->getdata($sql1);
        $data['getdata2'] = $this->Allowance_model->getdata($sql2);
        $data['getdata3'] = $this->Allowance_model->getdata($sql3);
        $data['getdata4'] = $this->Allowance_model->getdata($sql4);
        $this->load->view('templates/header');
        $this->load->view('form_edit/form_edit',$data);
        $this->load->view('form_edit/form_edit_js');
        
    }

    public function edit(){
        $this->load->model("Inputform_model");
        $id_saraban     =   $_POST["5"];
        //print_r($id_saraban);
        $resultedit = $this->Inputform_model->edit($id_saraban);
        if($resultedit == true){
        $a1 = $_POST["1"];       
        $a2 = $_POST["2"];
        $a3 = $_POST["3"];
        $a4 = $_POST["4"];
        $a5 = $_POST["5"]; //id saraban
        $a6 = $_POST["6"];
        $a7 = $_POST["7"];
        $a8 = $_POST["8"];
        $a9 = $_POST["9"];
        $a10 = $_POST["10"];
        $a11 = $_POST["11"];
        $a11_1 = $_POST["11_1"];
        $a12 = $_POST["12"];
        $a12_1 = $_POST["12_1"];
        $a13 = $_POST["13"];
        $a14 = $_POST["14"];
        $a14_1 = $_POST["14_1"]; 
        $a15 = $_POST["15"];
        $a16 = $_POST["16"];
        $a17 = $_POST["17"];
        $a18 = $_POST["18"];
        $a19 = $_POST["19"];
        $a20 = $_POST["20"];
        $a21 = $_POST["21"];
        $a22 = $_POST["22"];
        $a23 = $_POST["23"];
        $a24 = $_POST["24"];
        $a25 = $_POST["25"];

        $b26	=	 $_POST["26"];
        $b27	=	 $_POST["27"];
        $b28	=	 $_POST["28"];
        $b29	=	 $_POST["29"];
        $b30	=	 $_POST["30"];
        $b31	=	 $_POST["31"];
        $b32	=	 $_POST["32"];
        $b33	=	 $_POST["33"];
        $b34	=	 $_POST["34"];
        $b35	=	 $_POST["35"];
        $b36	=	 $_POST["36"];
        $b36_1	=	 $_POST["36_1"];
        $b37	=	 $_POST["37"];
        $b38	=	 $_POST["38"];
        $b39	=	 $_POST["39"];
        $b40	=	 $_POST["40"];
        $b41	=	 $_POST["41"];
        

        $c42	=	 $_POST["42"];
        $c43	=	 $_POST["43"];
        $c44	=	 $_POST["44"];
        $c45	=	 $_POST["45"];
        $c46	=	 $_POST["46"];
        $c47	=	 $_POST["47"];

        $d48	=	 $_POST["48"];
        $d49	=	 $_POST["49"];
        $d50	=	 $_POST["50"];
        $d51	=	 $_POST["51"];
        $d52	=	 $_POST["52"];
        $d53	=	 $_POST["53"];
        $d54	=	 $_POST["54"];
        $d55	=	 $_POST["55"];
        $d56	=	 $_POST["56"];
        
        $id_saraban     =   $_POST["5"];
        $user_update    =   ($this->session->userdata['logged_in']['id']);
        $chk_authen     =   ($this->session->userdata['logged_in']['status']);

        //--------------doc_1-----------------
        $sql  =  "INSERT INTO `doc_1`(
            `doc_where`,
            `date`,
            `title`,
            `doc_to`,
            `id_saraban`,
            `dateinput`,
            `name`,
            `position`,
            `major`,
            `doc_with`,
            `goto`,
            `start`,
            `datestart`,
            `end`,
            `dateend`,
            `sumdate`,
            `allowfor`,
            `travel`,
            `travelday`,
            `travelprice`,
            `resident`,
            `residentday`,
            `residentprice`,
            `vehical`,
            `vehicalprice`,
            `other`,
            `otherprice`,
            `sumprice`,
            `user_update`,
            `chk_authen`
            ) VALUES ( 
            '".$a1."',
            '".$a2."',
            '".$a3."',
            '".$a4."',
            '".$id_saraban."',
            '".$a6."',
            '".$a7."',
            '".$a8."',
            '".$a9."',
            '".$a10."',
            '".$a11."',
            '".$a11_1."',
            '".$a12."',
            '".$a12_1."',
            '".$a13."',
            '".$a14."',
            '".$a14_1."',
            '".$a15."',
            '".$a16."',
            '".$a17."',
            '".$a18."',
            '".$a19."',
            '".$a20."',
            '".$a21."',
            '".$a22."',
            '".$a23."',
            '".$a24."',
            '".$a25."',
            '".$user_update."',
            '".$chk_authen."'
            )";
            $result1  =  $this->Inputform_model->insert($sql);

        //--------------doc_2-----------------
        foreach ($b28 as $keyb  => $valueb) {
            $sql  =  "INSERT INTO `doc_2`(
                    `name`,
                    `date`,
                    `n`,
                    `p`,
                    `priceA`,
                    `priceB`,
                    `priceC`,
                    `priceD`,
                    `sum`,
                    `dateinput`,
                    `other`,
                    `sumA`,
                    `sumB`,
                    `sumC`,
                    `sumD`,
                    `sumAll`,
                    `sumthai`,
                    `user_create`,
                    `chk_authen`,
                    `id_saraban`
                )VALUES( 
                    '".$b26."',
                    '".$b27."',
                    '".$valueb."',
                    '".$b29[$keyb]."',
                    '".$b30[$keyb]."',
                    '".$b31[$keyb]."',
                    '".$b32[$keyb]."',
                    '".$b33[$keyb]."',
                    '".$b34[$keyb]."',
                    '".$b35[$keyb]."',
                    '".$b36[$keyb]."',
                    '".$b36_1."',
                    '".$b37."',
                    '".$b38."',
                    '".$b39."',
                    '".$b40."',
                    '".$b41."',
                    '".$user_update."',
                    '".$chk_authen."',
                    '".$id_saraban."'
                    )";
            $result2 =  $this->Inputform_model->insert($sql);
            }
        
        //--------------doc_3-----------------
        foreach ($c42 as $keyc  => $valuec) {
            $sql  = "INSERT INTO `doc_3`(
                    `date`,
                    `detail`,
                    `price`,
                    `other`,
                    `sum`,
                    `sumthai`,
                    `user_update`,
                    `chk_authen`,
                    `id_saraban`
                    )VALUES(
                    '".$valuec."',
                    '".$c43[$keyc]."',
                    '".$c44[$keyc]."',
                    '".$c45[$keyc]."',
                    '".$c46."',
                    '".$c47."',
                    '".$user_update."',
                    '".$chk_authen."',
                    '".$id_saraban."'
                    )";
            $result3 =  $this->Inputform_model->insert($sql);
            }
        
        //--------------doc_4-----------------
        foreach ($d54 as $keyd  => $valued) {
            $sql  = "INSERT INTO `doc_4`(
                    `date`,
                    `name`,
                    `address`,
                    `tambon`,
                    `district`,
                    `province`,
                    `item`,
                    `amount`,
                    `sumamount`,
                    `user_update`,
                    `chk_authen`,
                    `id_saraban`
                    )VALUES(
                    '".$d48."',
                    '".$d49."',
                    '".$d50."',
                    '".$d51."',
                    '".$d52."',
                    '".$d53."',
                    '".$valued."',
                    '".$d55[$keyd]."',
                    '".$d56."',
                    '".$user_update."',
                    '".$chk_authen."',
                    '".$id_saraban."'
                    )";
            $result4 =  $this->Inputform_model->insert($sql);
            }
        
            $data = array(
				"user_update"			=> $user_update,
				"finishform" 			=> "1",
				"chk_authen"			=> $chk_authen
            );
            $table = "manage_allowance";

		    $this->load->model("Allowance_model"); 
		    $resultupdate = $this->Inputform_model->update($data,$id_saraban,$table);
        
        $result = array(
            "result1" => $result1,
            "result2" => $result2,
            "result3" => $result3,
            "result4" => $result4,
        );

        echo json_encode($result);
        exit;
        }else{
            echo json_encode($resultedit);
            exit;
        }
    }

        public function savedoc_1($number=null){ 
            $resultdoc1 = '';
            $resultdoc3 = '';
            $resultdoc4 = '';
            $user_id = $this->input->post('user_id');
            $idsaraban = $this->input->post('idsaraban');
            $doc_1_id = $this->input->post('doc_1_id');
            $type_travel1 = $this->input->post('type_travel1');
            $where = $this->input->post('1');
            $daydoc1 = $this->input->post('daydoc1');
            $monthdoc1 = $this->input->post('monthdoc1');
            $yeardoc1 = $this->input->post('yeardoc1');
            $date = $yeardoc1.'-'.$monthdoc1.'-'.$daydoc1;
            $title = $this->input->post('3');
            $to = $this->input->post('4');
            $idsaraban1 = $this->input->post('5');
            $dayinput = $this->input->post('dayinput');
            $monthinput = $this->input->post('monthinput');
            $yearinput = $this->input->post('yearinput');
            $dateinput = $yearinput.'-'.$monthinput.'-'.$dayinput;
            $name = $this->input->post('7');
            $position = $this->input->post('8');
            $major = $this->input->post('9');
            $with = $this->input->post('10');
            $goto = $this->input->post('11');
            $start = $this->input->post('11_1');
            $daystart = $this->input->post('daystart');
            $monthstart = $this->input->post('monthstart');
            $yearstart = $this->input->post('yearstart');
            $datestart = $yearstart.'-'.$monthstart.'-'.$daystart;
            $transfer_h_time1 = $this->input->post('transfer_h_time1');
            $transfer_m_time1 = $this->input->post('transfer_m_time1');
            $transfer_h_time2 = $this->input->post('transfer_h_time2');
            $transfer_m_time2 = $this->input->post('transfer_m_time2');
            $timestart = $transfer_h_time1.':'.$transfer_m_time1.':00';
            $end = $this->input->post('12_1');
            $dayend = $this->input->post('dayend');
            $monthend = $this->input->post('monthend');
            $yearend = $this->input->post('yearend');
            $dateend = $yearend.'-'.$monthend.'-'.$dayend;
            $time_end = $transfer_h_time2.':'.$transfer_m_time2.':00';
            $sumdate = $this->input->post('14');
            $allowfor = $this->input->post('14_1');
            $travel = $this->input->post('15');
            $travelday = $this->input->post('16');
            $travelprice = $this->input->post('17');
            $typerent = $this->input->post('18');
            $residentday = $this->input->post('19');
            $residentprice = $this->input->post('20');
            $vehical = $this->input->post('21');
            $vehicalprice = $this->input->post('22');
            $other = $this->input->post('23');
            $otherprice = $this->input->post('24');
            $sumprice = $this->input->post('25');
            $chkshowdiv = $this->input->post('chkshowdiv');
            $chkshowauthor = $this->input->post('chkshowauthor');
            $user_update    =   ($this->session->userdata['logged_in']['id']);
            $chk_authen     =   ($this->session->userdata['logged_in']['status']);
            
            $daydoc3 = $this->input->post('daydoc3');
            $monthdoc3 = $this->input->post('monthdoc3');
            $yeardoc3 = $this->input->post('yeardoc3');
            $detail1_3 = $this->input->post('43');
            $price1_3 = $this->input->post('44');
            $other1_3 = $this->input->post('45');
            $textselect = $this->input->post('textselect');
            
            
            $daydoc3_1 = $this->input->post('daydoc3_1');
            $monthdoc3_1 = $this->input->post('monthdoc3_1');
            $yeardoc3_1 = $this->input->post('yeardoc3_1');
            $detail1_4 = $this->input->post('47');
            $price1_4 = $this->input->post('48');
            $other1_4 = $this->input->post('49');
            $textinput = $this->input->post('textinput');
            $sum = $this->input->post('50');
            $sumtotal = $this->input->post('53');
            

            $resultdoc1 = $this->Inputform_model->savedoc_1($idsaraban,$where,$date,$title,$to,$idsaraban1,$dateinput,$name,$position,$major,$with,$goto,$start,$datestart,$end,$dateend,$sumdate,$allowfor,$travel,$travelday,$travelprice,$typerent,$residentday,$residentprice,$vehical,$vehicalprice,$other,$otherprice,$sumprice,$sum,$sumtotal,$user_update,$chk_authen,$chkshowdiv,$chkshowauthor,$doc_1_id,$type_travel1,$timestart,$time_end);
            
            
            

            
            if($chkshowdiv==1){
                if($doc_1_id!=0){
                      $resultdelete = $this->Inputform_model->deletedoc_3insert($doc_1_id,'1');
                if($resultdelete == 1){
                        for($i=0;$i<count($daydoc3);$i++){
                $date1_31 = $yeardoc3[$i].'-'.$monthdoc3[$i].'-'.$daydoc3[$i];
                $detail1_31 = $detail1_3[$i];
                $price1_31 = $price1_3[$i];
                $other1_31 = $other1_3[$i];
                $textselect_3 = $textselect[$i];
               
             if($price1_31 != ''){
            $resultdoc3 = $this->Inputform_model->savedoc_3($idsaraban,$idsaraban1,$date1_31,$detail1_31,$price1_31,$other1_31,$user_update,$chk_authen,$textselect_3,$resultdoc1,$type_travel1);
              }
              }
                    }
                }
                else{
              for($i=0;$i<count($daydoc3);$i++){
                $date1_31 = $yeardoc3[$i].'-'.$monthdoc3[$i].'-'.$daydoc3[$i];
                $detail1_31 = $detail1_3[$i];
                $price1_31 = $price1_3[$i];
                $other1_31 = $other1_3[$i];
                $textselect_3 = $textselect[$i];
             if($date1_31 != ''){
            $resultdoc3 = $this->Inputform_model->savedoc_3($idsaraban,$idsaraban1,$date1_31,$detail1_31,$price1_31,$other1_31,$user_update,$chk_authen,$textselect_3,$resultdoc1,$type_travel1);
              }
              }
             }
            }
            
            
            
            
            
            
            if($chkshowauthor==1){
                if($doc_1_id!=0){
                    $resultdelete = $this->Inputform_model->deletedoc_3insert($doc_1_id,'2');
                    if($resultdelete == 1){
                       for($i=0;$i<count($daydoc3_1);$i++){
                $date1_41 = $yeardoc3_1[$i].'-'.$monthdoc3_1[$i].'-'.$daydoc3_1[$i];
                $detail1_41 = $detail1_4[$i];
                $price1_41 = $price1_4[$i];
                $other1_41 = $other1_4[$i];
                $textinput_4 = $textinput[$i];
             if($date1_31 != ''){
            $resultdoc4 = $this->Inputform_model->savedoc_3($idsaraban,$idsaraban1,$date1_41,$detail1_41,$price1_41,$other1_41,$user_update,$chk_authen,$textinput_4,$resultdoc1,$type_travel1);
              }
              }  
                    }
                }else{
              for($i=0;$i<count($daydoc3_1);$i++){
                $date1_41 = $yeardoc3_1[$i].'-'.$monthdoc3_1[$i].'-'.$daydoc3_1[$i];
                $detail1_41 = $detail1_4[$i];
                $price1_41 = $price1_4[$i];
                $other1_41 = $other1_4[$i];
                $textinput_4 = $textinput[$i];
             if($date1_31 != ''){
            $resultdoc4 = $this->Inputform_model->savedoc_3($idsaraban,$idsaraban1,$date1_41,$detail1_41,$price1_41,$other1_41,$user_update,$chk_authen,$textinput_4,$resultdoc1,$type_travel1);
              }
              }
                }
            }
        echo $resultdoc1;     
//            if(($resultdoc1!='')&&($number!='')){
//                redirect(base_url('Inputform/form_group/'.$idsaraban.'/'.$user_id.'/'.$resultdoc1.'/'.'2'));
//               // header('location:'.base_url('Inputform/form_alone/'.$idsaraban.'/'.$user_id));
//           }else{
//                redirect(base_url('Inputform/form_alone/'.$idsaraban.'/'.$user_id.'/'.$resultdoc1));
//           }
             
}
public function savedoc_1group(){ 
            $resultdoc1 = '';
            $resultdoc3 = '';
            $resultdoc4 = '';
            $user_id = $this->input->post('user_id');
            $idsaraban = $this->input->post('idsaraban');
            $doc_1_id = $this->input->post('doc_1_id');
            $type_travel1 = $this->input->post('type_travel1');
            $where = $this->input->post('1');
            $daydoc1 = $this->input->post('daydoc1');
            $monthdoc1 = $this->input->post('monthdoc1');
            $yeardoc1 = $this->input->post('yeardoc1');
            $date = $yeardoc1.'-'.$monthdoc1.'-'.$daydoc1;
            $title = $this->input->post('3');
            $to = $this->input->post('4');
            $idsaraban1 = $this->input->post('5');
            $dayinput = $this->input->post('dayinput');
            $monthinput = $this->input->post('monthinput');
            $yearinput = $this->input->post('yearinput');
            $dateinput = $yearinput.'-'.$monthinput.'-'.$dayinput;
            $name = $this->input->post('7');
            $position = $this->input->post('8');
            $major = $this->input->post('9');
            $with = $this->input->post('10');
            $goto = $this->input->post('11');
            $start = $this->input->post('11_1');
            $daystart = $this->input->post('daystart');
            $monthstart = $this->input->post('monthstart');
            $yearstart = $this->input->post('yearstart');
            $datestart = $yearstart.'-'.$monthstart.'-'.$daystart;
            $transfer_h_time1 = $this->input->post('transfer_h_time1');
            $transfer_m_time1 = $this->input->post('transfer_m_time1');
            $transfer_h_time2 = $this->input->post('transfer_h_time2');
            $transfer_m_time2 = $this->input->post('transfer_m_time2');
            $timestart = $transfer_h_time1.':'.$transfer_m_time1.':00';
            $end = $this->input->post('12_1');
            $dayend = $this->input->post('dayend');
            $monthend = $this->input->post('monthend');
            $yearend = $this->input->post('yearend');
            $dateend = $yearend.'-'.$monthend.'-'.$dayend;
            $time_end = $transfer_h_time2.':'.$transfer_m_time2.':00';
            $sumdate = $this->input->post('14');
            $allowfor = $this->input->post('14_1');
          
            $travelday = $this->input->post('travelday');
            $residentday = $this->input->post('residentday');
            $sumprice = $this->input->post('25');
            $chkshowdiv = $this->input->post('chkshowdiv');
            $chkshowauthor = $this->input->post('chkshowauthor');
            $user_update    =   ($this->session->userdata['logged_in']['id']);
            $chk_authen     =   ($this->session->userdata['logged_in']['status']);
            
            $daydoc3 = $this->input->post('daydoc3');
            $monthdoc3 = $this->input->post('monthdoc3');
            $yeardoc3 = $this->input->post('yeardoc3');
            $detail1_3 = $this->input->post('43');
            $price1_3 = $this->input->post('44');
            $other1_3 = $this->input->post('45');
            $textselect = $this->input->post('textselect');
            
            
            $daydoc3_1 = $this->input->post('daydoc3_1');
            $monthdoc3_1 = $this->input->post('monthdoc3_1');
            $yeardoc3_1 = $this->input->post('yeardoc3_1');
            $detail1_4 = $this->input->post('47');
            $price1_4 = $this->input->post('48');
            $other1_4 = $this->input->post('49');
            $textinput = $this->input->post('textinput');
            $sum = $this->input->post('50');
            $sumtotal = $this->input->post('53');
            

            $resultdoc1 = $this->Inputform_model->savedoc_1($idsaraban,$where,$date,$title,$to,$idsaraban1,$dateinput,$name,$position,$major,$with,$goto,$start,$datestart,$end,$dateend,$sumdate,$allowfor,$travelday,$residentday,$sumprice,$sum,$sumtotal,$user_update,$chk_authen,$chkshowdiv,$chkshowauthor,$doc_1_id,$type_travel1,$timestart,$time_end);
            
            
            
            $namedoc2 = $this->input->post('26');
            $day1 = $this->input->post('day1');
            $month1 = $this->input->post('month1');
            $year1 = $this->input->post('year1');
            $date = $year1.'-'.$month1.'-'.$day1;
            $sumA = $this->input->post('36_1');
            $sumB = $this->input->post('37');
            $sumC = $this->input->post('38');
            $sumD = $this->input->post('39');
            $sumAll = $this->input->post('40');

            
            $n = $this->input->post('28');
            $p = $this->input->post('29');
            $priceA = $this->input->post('30');
            $priceB = $this->input->post('31');
            $priceC = $this->input->post('32');
            $priceD = $this->input->post('33');
            $sumdoc2 = $this->input->post('34');
//            $day2 = $this->input->post('day2');
//            $month2 = $this->input->post('month2');
//            $year2 = $this->input->post('year2');
            $other = $this->input->post('36');
            $resultdelete = $this->Inputform_model->deletedoc_2insert($doc_1_id,$type_travel1);
                  if($resultdelete == 1){
            for($i=0;$i<count($n);$i++){
                $n1 = $n[$i];
                $p1 = $p[$i];
                $priceA1 = $priceA[$i];
                $priceB1 = $priceB[$i];
                $priceC1 = $priceC[$i];
                $priceD1 = $priceD[$i];
                $sum1 = $sumdoc2[$i];
                //$dateinput1 = $year2[$i].'-'.$month2[$i].'-'.$day2[$i];
                $other1 = $other[$i];
             if($n1 != ''){
                  
            $resultdoc2 = $this->Inputform_model->savedoc_2($doc_1_id,$namedoc2,$date,$sumA,$sumB,$sumC,$sumD,$sumAll,$n1,$p1,$priceA1,$priceB1,$priceC1,$priceD1,$sum1,$other1,$user_update,$chk_authen,$type_travel1,'1');
                  }
              }
            $sumAoutbound = $this->input->post('36_1outbound');
            $sumBoutbound = $this->input->post('37outbound');
            $sumCoutbound = $this->input->post('38outbound');
            $sumDoutbound = $this->input->post('39outbound');
            $sumAlloutbound = $this->input->post('40outbound');

            
            $noutbound = $this->input->post('28outbound');
            $poutbound = $this->input->post('29outbound');
            $priceAoutbound = $this->input->post('30outbound');
            $priceBoutbound = $this->input->post('31outbound');
            $priceCoutbound = $this->input->post('32outbound');
            $priceDoutbound = $this->input->post('33outbound');
            $sumdoc2outbound = $this->input->post('34outbound');
//            $day2 = $this->input->post('day2');
//            $month2 = $this->input->post('month2');
//            $year2 = $this->input->post('year2');
            $otheroutbound = $this->input->post('36outbound');
            for($i=0;$i<count($noutbound);$i++){
                $n1outbound = $noutbound[$i];
                $p1outbound = $poutbound[$i];
                $priceA1outbound = $priceAoutbound[$i];
                $priceB1outbound = $priceBoutbound[$i];
                $priceC1outbound = $priceCoutbound[$i];
                $priceD1outbound = $priceDoutbound[$i];
                $sum1outbound = $sumdoc2outbound[$i];
                //$dateinput1 = $year2[$i].'-'.$month2[$i].'-'.$day2[$i];
                $other1outbound = $otheroutbound[$i];
             if($n1outbound != ''){
                  
            $resultdoc2 = $this->Inputform_model->savedoc_2($doc_1_id,$namedoc2,$date,$sumAoutbound,$sumBoutbound,$sumCoutbound,$sumDoutbound,$sumAlloutbound,$n1outbound,$p1outbound,$priceA1outbound,$priceB1outbound,$priceC1outbound,$priceD1outbound,$sum1outbound,$other1outbound,$user_update,$chk_authen,$type_travel1,'2');
                  }
              }
              }
            
            if($chkshowdiv==1){
                if($doc_1_id!=0){
                      $resultdelete = $this->Inputform_model->deletedoc_3insert($doc_1_id,'1');
                if($resultdelete == 1){
                        for($i=0;$i<count($daydoc3);$i++){
                $date1_31 = $yeardoc3[$i].'-'.$monthdoc3[$i].'-'.$daydoc3[$i];
                $detail1_31 = $detail1_3[$i];
                $price1_31 = $price1_3[$i];
                $other1_31 = $other1_3[$i];
                $textselect_3 = $textselect[$i];
               
             if($price1_31 != ''){
            $resultdoc3 = $this->Inputform_model->savedoc_3($idsaraban,$idsaraban1,$date1_31,$detail1_31,$price1_31,$other1_31,$user_update,$chk_authen,$textselect_3,$resultdoc1,$type_travel1);
              }
              }
                    }
                }
                else{
              for($i=0;$i<count($daydoc3);$i++){
                $date1_31 = $yeardoc3[$i].'-'.$monthdoc3[$i].'-'.$daydoc3[$i];
                $detail1_31 = $detail1_3[$i];
                $price1_31 = $price1_3[$i];
                $other1_31 = $other1_3[$i];
                $textselect_3 = $textselect[$i];
             if($date1_31 != ''){
            $resultdoc3 = $this->Inputform_model->savedoc_3($idsaraban,$idsaraban1,$date1_31,$detail1_31,$price1_31,$other1_31,$user_update,$chk_authen,$textselect_3,$resultdoc1,$type_travel1);
              }
              }
             }
            }
            
            
            
            
            
            
            if($chkshowauthor==1){
                if($doc_1_id!=0){
                    $resultdelete = $this->Inputform_model->deletedoc_3insert($doc_1_id,'2');
                    if($resultdelete == 1){
                       for($i=0;$i<count($daydoc3_1);$i++){
                $date1_41 = $yeardoc3_1[$i].'-'.$monthdoc3_1[$i].'-'.$daydoc3_1[$i];
                $detail1_41 = $detail1_4[$i];
                $price1_41 = $price1_4[$i];
                $other1_41 = $other1_4[$i];
                $textinput_4 = $textinput[$i];
             if($date1_31 != ''){
            $resultdoc4 = $this->Inputform_model->savedoc_3($idsaraban,$idsaraban1,$date1_41,$detail1_41,$price1_41,$other1_41,$user_update,$chk_authen,$textinput_4,$resultdoc1,$type_travel1);
              }
              }  
                    }
                }else{
              for($i=0;$i<count($daydoc3_1);$i++){
                $date1_41 = $yeardoc3_1[$i].'-'.$monthdoc3_1[$i].'-'.$daydoc3_1[$i];
                $detail1_41 = $detail1_4[$i];
                $price1_41 = $price1_4[$i];
                $other1_41 = $other1_4[$i];
                $textinput_4 = $textinput[$i];
             if($date1_31 != ''){
            $resultdoc4 = $this->Inputform_model->savedoc_3($idsaraban,$idsaraban1,$date1_41,$detail1_41,$price1_41,$other1_41,$user_update,$chk_authen,$textinput_4,$resultdoc1,$type_travel1);
              }
              }
                }
            }
        echo $resultdoc1;     
}
public function deletedoc_3(){
    $iddoc_3 = $this->input->post('iddoc_3');
    $table = $this->input->post('table');
    $result = $this->Inputform_model->deletedoc_3($iddoc_3,$table);
    echo $result;
}
//-----------------------------------------
public function savedata(){
    $idsaraban = $this->input->post('idsaraban');
    $table = $this->input->post('table');
    $result = $this->Inputform_model->savedata($idsaraban,$table);
    echo $result;
}
//-----------------------------------------
public function savedoc_2(){
            $idsaraban = $this->input->post('idsaraban');
            $type_travel1 = $this->input->post('type_travel1');
            $name = $this->input->post('26');
            $day1 = $this->input->post('day1');
            $month1 = $this->input->post('month1');
            $year1 = $this->input->post('year1');
            $date = $year1.'-'.$month1.'-'.$day1;
            $sumA = $this->input->post('36_1');
            $sumB = $this->input->post('37');
            $sumC = $this->input->post('38');
            $sumD = $this->input->post('39');
            $sumAll = $this->input->post('40');
            $sumthai = $this->input->post('41');
            $user_update    =   ($this->session->userdata['logged_in']['id']);
            $chk_authen     =   ($this->session->userdata['logged_in']['status']);
            
            $n = $this->input->post('28');
            $p = $this->input->post('29');
            $priceA = $this->input->post('30');
            $priceB = $this->input->post('31');
            $priceC = $this->input->post('32');
            $priceD = $this->input->post('33');
            $sum = $this->input->post('34');
//            $day2 = $this->input->post('day2');
//            $month2 = $this->input->post('month2');
//            $year2 = $this->input->post('year2');
            $other = $this->input->post('36');
            $resultdelete = $this->Inputform_model->deletedoc_2insert($idsaraban,$type_travel1);
                  if($resultdelete == 1){
            for($i=0;$i<count($n);$i++){
                $n1 = $n[$i];
                $p1 = $p[$i];
                $priceA1 = $priceA[$i];
                $priceB1 = $priceB[$i];
                $priceC1 = $priceC[$i];
                $priceD1 = $priceD[$i];
                $sum1 = $sum[$i];
                //$dateinput1 = $year2[$i].'-'.$month2[$i].'-'.$day2[$i];
                $other1 = $other[$i];
             if($n1 != ''){
                  
            $resultdoc2 = $this->Inputform_model->savedoc_2($idsaraban,$name,$date,$sumA,$sumB,$sumC,$sumD,$sumAll,$sumthai,$n1,$p1,$priceA1,$priceB1,$priceC1,$priceD1,$sum1,$other1,$user_update,$chk_authen,$type_travel1);
                  }
              }
              }
    echo $resultdoc2;
}
   //----------------------------
    public function addimg(){		
		 $doc1_id = $this->input->post('doc1_id');
                 $outboundid = $this->input->post('outboundid');
                 $sarabannumber = $this->input->post('sarabannumber');
                 $type_travel = $this->input->post('type_travel');
                 $x = $this->input->post('x');
                 $user_update    =   ($this->session->userdata['logged_in']['id']);
 $upload_path = './uploadfile/';
        $upload_pathName = 'uploadfile/';
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|GIF|JPG|PNG|JPEG|PDF';
        $config['max_size'] = '0';
        $image_data = array();
        $is_file_error = FALSE;
        $Result = 0;
        $this->load->library('upload', $config);
        $countFiles = count($_FILES['img2']['name']);
        if ($countFiles > 0) {
            for ($i = 0; $i < $countFiles; $i++) {    //---------------------------
                $_FILES['file_upload2']['name'] = $_FILES['img2']['name'][$i];
                $_FILES['file_upload2']['type'] = $_FILES['img2']['type'][$i];
                $_FILES['file_upload2']['tmp_name'] = $_FILES['img2']['tmp_name'][$i];
                $_FILES['file_upload2']['error'] = $_FILES['img2']['error'][$i];
                $_FILES['file_upload2']['size'] = $_FILES['img2']['size'][$i];
                $this->upload->initialize($config);
                if ($this->upload->do_upload('file_upload2')) {
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $img = $upload_pathName.''.$uploadData[$i]['file_name'];
                 $result_id = $this->Inputform_model->addimg($img, $doc1_id,$outboundid,$user_update,$type_travel);
                }
            }
        }
        $f = 1;
        $file = $this->Inputform_model->getdocfile($outboundid,$type_travel);
        foreach ($file->result() AS $file2){
        {?>
	<label class="col-sm-4 text-left" style="line-height: 30px;"><?php if($f==1){?>ไฟล์หลักฐานการจ่าย<?php }?></label>
<div class="col-md-6">
    <p onclick="window.open('<?php echo base_url();?><?php echo $file2->file_name?>','_blank');" style="color:blue; cursor:pointer"><u><?php echo $file2->file_name?></u></p>
    
</div>
<div class="col-md-2">
    <i class="entypo-trash" aria-hidden="true" style="cursor:pointer" onclick="comfirmDelete('<?php echo $outboundid?>','<?php echo $file2->file_name?>','<?php echo $type_travel?>','<?php echo $x?>')"></i>
</div>
<div class="clear"></div>
     <?php $f++;}}?>

      <?php  }
    //-------------------------------------
            public function comfirmDelete() {
        $idsaraban = $this->input->post('idsaraban');
        $file_name = $this->input->post('file_name');
        $i = $this->input->post('i');
        $typeData = $this->input->post('typeData');
        $result = $this->Inputform_model->comfirmDelete($idsaraban, $file_name);
          $f = 1;
        $file = $this->Inputform_model->getdocfile($idsaraban,$typeData);
        foreach ($file->result() AS $file2){
        {?>
	<label class="col-sm-4 text-left" style="line-height: 30px;"><?php if($f==1){?>ไฟล์หลักฐานการจ่าย<?php }?></label>
<div class="col-md-6">
    <p onclick="window.open('<?php echo base_url();?><?php echo $file2->file_name?>','_blank');" style="color:blue; cursor:pointer"><u><?php echo $file2->file_name?></u></p>
    
</div>
<div class="col-md-2">
    <i class="entypo-trash" aria-hidden="true" style="cursor:pointer" onclick="comfirmDelete('<?php echo $idsaraban?>','<?php echo $file2->file_name?>','<?php echo $typeData?>','<?php echo $i?>')"></i>
</div>
<div class="clear"></div>
     <?php $f++;}}?>
    <?php }
    //------------------------------------
    public function calculateday(){
    $datestart = $this->input->post('date');
    $timestart = $this->input->post('timestart');
    $dateend = $this->input->post('endend_date');
    $timeend = $this->input->post('time_end');
    $result = $this->Inputform_model->calculatedate($datestart,$timestart,$dateend,$timeend);
    echo $result;
}
    //------------------------------------
    public function getdocfile(){
    $idsaraban = $this->input->post('idsaraban');
    $type_travel = $this->input->post('type_travel');
    $file2 = $this->Inputform_model->getdocfile($idsaraban,$type_travel);
    $numfile2 = $file2->num_rows();
    if($numfile2>0){
        $result = 1;
    }else{
        $result = 0;
    }
    echo $result;
}

}
            