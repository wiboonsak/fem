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
    }   


    public function form(){ 

            $idsaraban  =   $this->uri->segment(3);

            $data  =  array();
            $data['idsaraban']  =  $idsaraban;
            $this->load->view('templates/header',$data);
            $this->load->view('form/form',$data);
            $this->load->view('form/form_js');
    }

    public function login()
    {
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
            $resp['redirect_url'] = 'form/'.$idsaraban; 
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

    public function insert(){ 
        $this->load->model("Inputform_model");

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
            `date_create`,
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
            '".date('Y-m-d H:i:sa')."',
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
                    `date_create`,
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
                    '".date('Y-m-d H:i:sa')."',
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
                    `date_create`,
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
                    '".date('Y-m-d H:i:sa')."',
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
                    `date_create`,
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
                    '".date('Y-m-d H:i:sa')."',
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
    }

}
?>
            