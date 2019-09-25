<?php

require_once("Rest.inc.php");
require_once("db.php");

class functions extends REST {
    
    private $mysqli = NULL;
    private $db = NULL;
    
    public function __construct($db) {
        parent::__construct();
        $this->db = $db;
        $this->mysqli = $db->mysqli;
    }

	public function checkConnection() {
			if (mysqli_ping($this->mysqli)) {
                $respon = array(
                    'status' => 'ok', 'database' => 'connected'
                );
                $this->response($this->json($respon), 200);
			} else {
                $respon = array(
                    'status' => 'failed', 'database' => 'not connected'
                );
                $this->response($this->json($respon), 404);
			}
	}

	public function getQuiz() {
		
		include "../includes/connection.php";
	    $api_key = APP_API_KEY;

      if (isset($_GET['api_key'])) {

		$access_key_received = $_GET['api_key'];
	
		if ($access_key_received == $api_key) {

		$pdf_order_by=API_ALL_PDF_ORDER_BY;

		$jsonObj= array();	
 
		$query="SELECT * FROM `quiz` where quiz.subject = '".$_GET['mid']."' and quiz.categories = '".$_GET['cid']."' ORDER BY quiz.id ASC ";
		

		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{
			$row['id'] = $data['id'];
			$row['subject'] = $data['subject'];
			$row['categories'] = $data['categories'];
			$row['questions'] = $data['questions'];
			$row['question_image'] = $data['question_image'];
			$row['ans1'] = $data['ans1'];
			$row['ans2'] = $data['ans2'];
			$row['ans3'] = $data['ans3'];
			$row['ans4'] = $data['ans4'];
			$row['ans5'] = $data['ans5'];
			$row['ans'] = $data['ans'];
		
			array_push($jsonObj,$row);
		
		}

		$set['quiz'] = $jsonObj;	

 		$this->response($this->json($set), 200);

		} else {
					$respon = array( 'status' => 'failed', 'message' => 'Oops, API Key is Incorrect!');
					$this->response($this->json($respon), 404);
				}
		} else {
			$respon = array( 'status' => 'failed', 'message' => 'Forbidden, API Key is Required!');
			$this->response($this->json($respon), 404);
		}


	}	

    public function getQuizmaincat() {
		
		include "../includes/connection.php";
	    $api_key = APP_API_KEY;

      if (isset($_GET['api_key'])) {

		$access_key_received = $_GET['api_key'];

		if ($access_key_received == $api_key) {

		$pdf_order_by=API_ALL_PDF_ORDER_BY;

		$jsonObj= array();	
 
		$query="SELECT * FROM tbl_quiz_main_cat WHERE tbl_quiz_main_cat.mmid= '".$_GET['mmid']."' ORDER BY tbl_quiz_main_cat.mid ASC ";
		

		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{
			$row['mid'] = $data['mid'];
			$row['mmid'] = $data['mmid'];
			$row['cat_name'] = $data['cat_name'];

			array_push($jsonObj,$row);
		
		}

		$set['quiz'] = $jsonObj;	

 		$this->response($this->json($set), 200);

		} else {
					$respon = array( 'status' => 'failed', 'message' => 'Oops, API Key is Incorrect!');
					$this->response($this->json($respon), 404);
				}
		} else {
			$respon = array( 'status' => 'failed', 'message' => 'Forbidden, API Key is Required!');
			$this->response($this->json($respon), 404);
		}


	}
	
	public function getQuizcat() {
		
		include "../includes/connection.php";
	    $api_key = APP_API_KEY;

      if (isset($_GET['api_key'])) {

		$access_key_received = $_GET['api_key'];

		if ($access_key_received == $api_key) {

		$pdf_order_by=API_ALL_PDF_ORDER_BY;

		$jsonObj= array();	
 
		 $query="SELECT * FROM tbl_quiz_cat where tbl_quiz_cat.mid = '".$_GET['mid']."' and tbl_quiz_cat.ttid = '".$_GET['ttid']."' and tbl_quiz_cat.ppid = '".$_GET['ppid']."'ORDER BY tbl_quiz_cat.id ASC ";
		

		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{
			$row['id'] = $data['id'];
			$row['mid'] = $data['mid'];

			$row['category_name'] = $data['category_name'];
			$row['date'] = $data['date'];
			array_push($jsonObj,$row);
		
		}

		$set['quiz'] = $jsonObj;	

 		$this->response($this->json($set), 200);

		} else {
					$respon = array( 'status' => 'failed', 'message' => 'Oops, API Key is Incorrect!');
					$this->response($this->json($respon), 404);
				}
		} else {
			$respon = array( 'status' => 'failed', 'message' => 'Forbidden, API Key is Required!');
			$this->response($this->json($respon), 404);
		}


	}
	
		public function getQuizcatrevision() {
		
		include "../includes/connection.php";
	    $api_key = APP_API_KEY;

      if (isset($_GET['api_key'])) {

		$access_key_received = $_GET['api_key'];

		if ($access_key_received == $api_key) {

		$pdf_order_by=API_ALL_PDF_ORDER_BY;

		$jsonObj= array();	
 
		 $query="SELECT * FROM tbl_quiz_cat where tbl_quiz_cat.mid = '".$_GET['mid']."' and tbl_quiz_cat.ppid = '".$_GET['ppid']."'ORDER BY tbl_quiz_cat.id ASC ";
		

		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{
			$row['id'] = $data['id'];
			$row['mid'] = $data['mid'];
			$row['category_name'] = $data['category_name'];
			$row['date'] = $data['date'];
			array_push($jsonObj,$row);
		
		}

		$set['quiz'] = $jsonObj;	

 		$this->response($this->json($set), 200);

		} else {
					$respon = array( 'status' => 'failed', 'message' => 'Oops, API Key is Incorrect!');
					$this->response($this->json($respon), 404);
				}
		} else {
			$respon = array( 'status' => 'failed', 'message' => 'Forbidden, API Key is Required!');
			$this->response($this->json($respon), 404);
		}


	}
	
		public function user_practical() {
		
		include "../includes/connection.php";
	    $api_key = APP_API_KEY;

      if (isset($_GET['api_key'])) {

		$access_key_received = $_GET['api_key'];

		if ($access_key_received == $api_key) {

		$pdf_order_by=API_ALL_PDF_ORDER_BY;

		$jsonObj= array();	
 
		 $query="SELECT * FROM tbl_practical where tbl_practical.mid = '".$_GET['mid']."' and tbl_practical.subject = '".$_GET['subject']."' and tbl_practical.grade = '".$_GET['grade']."'ORDER BY tbl_practical.id ASC ";
		

		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{
			$row['id'] = $data['id'];
			$row['p_name'] = $data['p_name'];
            $row['p_url'] = $data['p_url'];
			$row['mid'] = $data['mid'];
			$row['subject'] = $data['subject'];
			$row['grade'] = $data['grade'];
			
			array_push($jsonObj,$row);
		
		}

		$set['quiz'] = $jsonObj;	

 		$this->response($this->json($set), 200);

		} else {
					$respon = array( 'status' => 'failed', 'message' => 'Oops, API Key is Incorrect!');
					$this->response($this->json($respon), 404);
				}
		} else {
			$respon = array( 'status' => 'failed', 'message' => 'Forbidden, API Key is Required!');
			$this->response($this->json($respon), 404);
		}


	}
	
	public function getquizchapter() {
		
		include "../includes/connection.php";
	    $api_key = APP_API_KEY;

      if (isset($_GET['api_key'])) {

		$access_key_received = $_GET['api_key'];

		if ($access_key_received == $api_key) {

		$pdf_order_by=API_ALL_PDF_ORDER_BY;

		$jsonObj= array();	
 
		$query="SELECT * FROM chapter LEFT JOIN tbl_quiz_cat ON chapter.sub_name= tbl_quiz_cat.id where chapter.sub_name = '".$_GET['id']."' ORDER BY chapter.cid ASC ";
		

		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{
			$row['cid'] = $data['cid'];
			$row['grade'] = $data['grade'];
			$row['category_name'] = $data['category_name'];
			$row['chap_id'] = $data['chap_id'];
			$row['chap_name'] = $data['chap_name'];

		
			array_push($jsonObj,$row);
		
		}

		$set['quiz'] = $jsonObj;	

 		$this->response($this->json($set), 200);

		} else {
					$respon = array( 'status' => 'failed', 'message' => 'Oops, API Key is Incorrect!');
					$this->response($this->json($respon), 404);
				}
		} else {
			$respon = array( 'status' => 'failed', 'message' => 'Forbidden, API Key is Required!');
			$this->response($this->json($respon), 404);
		}


	}
	
	
    public function getQuizById() {
		
		include "../includes/connection.php";
	    $api_key = APP_API_KEY;

      if (isset($_GET['api_key'])) {

		$access_key_received = $_GET['api_key'];
		 $catid = $_GET['category_name'];
		 $chapter = $_GET['chapter'];
	
		if ($access_key_received == $api_key) {

		$pdf_order_by=API_ALL_PDF_ORDER_BY;

		$jsonObj= array();	
 
		$query="SELECT * FROM `$catid` WHERE `chapter`=$chapter ORDER BY $catid.id ASC ";
		
		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());

		while($data = mysqli_fetch_assoc($sql))
		{
			$row['id'] = $data['id'];
			$row['subject'] = $data['subject'];
			$row['grade'] = $data['grade'];
			$row['chapter'] = $data['chapter'];
			$row['question'] = $data['questions'];
			$row['question_image'] = $data['question_image'];
			$row['ans1'] = $data['ans1'];
			$row['ans1_image'] = $data['ans1_image'];
			$row['ans2'] = $data['ans2'];
			$row['ans2_image'] = $data['ans2_image'];
			$row['ans3'] = $data['ans3'];
			$row['ans3_image'] = $data['ans3_image'];
			$row['ans4'] = $data['ans4'];
			$row['ans4_image'] = $data['ans4_image'];
			$row['ans5'] = $data['ans5'];
			$row['ans5_image'] = $data['ans5_image'];
			$row['ans'] = $data['ans'];

			array_push($jsonObj,$row);
		
		}

		$set['quiz'] = $jsonObj;	

 		$this->response($this->json($set), 200);

		} else {
					$respon = array( 'status' => 'failed', 'message' => 'Oops, API Key is Incorrect!');
					$this->response($this->json($respon), 404);
				}
		} else {
			$respon = array( 'status' => 'failed', 'message' => 'Forbidden, API Key is Required!');
			$this->response($this->json($respon), 404);
		}


	}	

    public function getAppDetails() {
		include "../includes/connection.php";

	   $jsonObj= array();	

		$query="SELECT * FROM tbl_settings WHERE id='1'";
		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());


		while($data = mysqli_fetch_assoc($sql))
		{
			 
			$row['app_name'] = $data['app_name'];
			$row['app_logo'] = $data['app_logo'];
			$row['app_version'] = $data['app_version'];
			$row['app_author'] = $data['app_author'];
			$row['app_contact'] = $data['app_contact'];
			$row['app_email'] = $data['app_email'];
			$row['app_website'] = $data['app_website'];
			$row['app_description'] = $data['app_description'];
			$row['app_developed_by'] = $data['app_developed_by'];

			$row['app_privacy_policy'] = stripslashes($data['app_privacy_policy']);
 			
			array_push($jsonObj,$row);
		
		}
 
		$set['ALL_IN_ONE_VIDEO'] = $jsonObj;
		
		//$respon = array( 'status' => 'failed', 'message' => 'Forbidden, API Key is Required!');
		$this->response($this->json($set), 200);

	}

 
	
	 public function student_report_chapter_view() {
		include "../includes/connection.php";
	   
	   $stdid = $_GET['stdid'];
	   $sub = $_GET['sub'];
        $chap = $_GET['chap'];

	   $jsonObj= array();	

		$query="SELECT * FROM `report` WHERE `student_id`=$stdid and `subject_id`=$sub and `chapter_id`=$chap " ;
		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());


		while($data = mysqli_fetch_assoc($sql))
		{
			 
	    	$row['id'] = $data['id'];
			$row['student_id'] = $data['student_id'];
			$row['subject_id'] = $data['subject_id'];
			$row['subject_name'] = $data['subject_name'];
			$row['chapter_id'] = $data['chapter_id'];
			$row['chapter_name'] = $data['chapter_name'];
			
			array_push($jsonObj,$row);
		
		}
 
		$set['ALL_IN_ONE_VIDEO'] = $jsonObj;
		
		//$respon = array( 'status' => 'failed', 'message' => 'Forbidden, API Key is Required!');
		$this->response($this->json($set), 200);

	}

    public function student_report_view() {
		include "../includes/connection.php";
	   
	   $stdid = $_GET['stdid'];
	   $sub = $_GET['sub'];
	   $chapid = $_GET['chapid'];

	   $jsonObj= array();	


	     $query="SELECT * FROM `report` 
	    LEFT JOIN tbl_users ON report.student_id= tbl_users.id  
	    LEFT JOIN tbl_quiz_main_cat ON report.subject_id= tbl_quiz_main_cat.mid 
	    LEFT JOIN tbl_quiz_cat ON report.chapter_id= tbl_quiz_cat.id 
	    WHERE `student_id`=$stdid and `subject_id`=$sub and `chapter_id`=$chapid";

		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());


		while($data = mysqli_fetch_assoc($sql))
		{
			 
			$row['id'] = $data['id'];
			$row['student_id'] = $data['student_id'];
			$row['name'] = $data['name'];
			$row['subject_id'] = $data['subject_id'];
			$row['cat_name'] = $data['cat_name'];
				$row['ppid'] = $data['ppid'];
			$row['ttid'] = $data['ttid'];
			$row['chapter_id'] = $data['chapter_id'];
			$row['category_name'] = $data['category_name'];
			$row['total_questions'] = $data['total_questions'];
			$row['attempted_questions'] = $data['attempted_questions'];
			$row['total_marks'] = $data['total_marks'];
			$row['correct_answers'] = $data['correct_answers'];
			$row['wrong_answers'] = $data['wrong_answers'];
			$row['marks_obtained'] = stripslashes($data['marks_obtained']);
 			
			array_push($jsonObj,$row);
		
		}
 
		$set['ALL_IN_ONE_VIDEO'] = $jsonObj;
		
		//$respon = array( 'status' => 'failed', 'message' => 'Forbidden, API Key is Required!');
		$this->response($this->json($set), 200);

	}
	
	    public function view_all_student_report() {
		include "../includes/connection.php";


	   $jsonObj= array();	


	    $query="SELECT * FROM `report`";

		$sql = mysqli_query($mysqli,$query)or die(mysqli_error());


		while($data = mysqli_fetch_assoc($sql))
		{
			 
			$row['id'] = $data['id'];
			$row['student_id'] = $data['student_id'];
			$row['subject_id'] = $data['subject_id'];
			$row['chapter_id'] = $data['chapter_id'];
			$row['total_questions'] = $data['total_questions'];
			$row['attempted_questions'] = $data['attempted_questions'];
			$row['total_marks'] = $data['total_marks'];
			$row['correct_answers'] = $data['correct_answers'];
			$row['wrong_answers'] = $data['wrong_answers'];
			$row['marks_obtained'] = stripslashes($data['marks_obtained']);
 			
			array_push($jsonObj,$row);
		
		}
 
		$set['ALL_IN_ONE_VIDEO'] = $jsonObj;
		
		//$respon = array( 'status' => 'failed', 'message' => 'Forbidden, API Key is Required!');
		$this->response($this->json($set), 200);

	}

	public function contacttoadmin() {
		include "../includes/connection.php";
		include('../includes/function.php');
	
    	 $user_id=$_REQUEST['user_id'];
    	 $subject=$_REQUEST['subject'];
    	 $message=$_REQUEST['message'];
    	
	

		{ 
		     $qry1="INSERT INTO `tbl_contact` (`id`,`user_id`,`subject`,`message`,`status`) VALUES ('Normal','$user_id','$subject','$message','1')"; 

            $result1=mysqli_query($mysqli,$qry1);  
            
            $set['ALL_IN_ONE_VIDEO'][]=array('msg' => "message successflly sended...!",'success'=>'1');
		
		}
	     $this->response($this->json($set), 200);

	} 
	
		public function postUserSocialLogin() 
	{
		include "../includes/connection.php";
		include('../includes/function.php');

		$email_id = $_POST['email_id'];
		
		$qry = "SELECT * FROM tbl_registration WHERE email_id = '".$email_id."'"; 
		$result = mysqli_query($mysqli,$qry);
		$num_rows = mysqli_num_rows($result);
		$row = mysqli_fetch_assoc($result);
		
    	if ($num_rows > 0)
		{ 
			$set['JSON_DATA'][]	=	array(    'user_id' 	=>	$row['user_id'],
		     								  'first_name'	=>	$row['first_name'],
		     								  'last_name'	=>	$row['last_name'],
		     								  'email_id'	=>	$row['email_id'],
		     								  'country_id'	=>	$row['country_id'],
		     								  'city_id'		=>	$row['city_id'],
		     								  'phone_number'=>	$row['phone_number'],
		     								  'role'		=>	$row['role'],
		     								  'type'		=>	$row['type']
		     								);
		    $this->response($this->json($set), 200);
		}		 
		else
		{
			$qry1="INSERT INTO tbl_registration 
				  (`first_name`,
				  `last_name`,
				  `email_id`,
				  `country_id`,
				  `city_id`,
				  `phone_number`,
				  `role`,
				  `type`
				) VALUES (
					'".trim($_POST['first_name'])."',
					'".trim($_POST['last_name'])."',
					'".trim($_POST['email_id'])."',
					'".$_POST['country_id']."',
					'".$_POST['city_id']."',
					'".$_POST['phone_number']."',
					'".$_POST['role']."',
					'".$_POST['type']."'
					 
				)"; 
            
            $result1 = mysqli_query($mysqli,$qry1);
            $last_id = mysqli_insert_id($mysqli);  

            
            $qrys = "SELECT * FROM tbl_registration WHERE user_id = '".$last_id."'"; 
			$results = mysqli_query($mysqli,$qrys);
			$row = mysqli_fetch_assoc($results);
												 
			$set['JSON_DATA'][]	=	array('user_id' 	=>	$row['user_id'],
		     								  'first_name'	=>	$row['first_name'],
		     								  'last_name'	=>	$row['last_name'],
		     								  'email_id'	=>	$row['email_id'],
		     								  'country_id'	=>	$row['country_id'],
		     								  'city_id'		=>	$row['city_id'],
		     								  'phone_number'=>	$row['phone_number'],
		     								  'role'		=>	$row['role'],
		     								  'type'		=>	$row['type']
		     								);
		    		 
			$this->response($this->json($set), 200);
 		}
	}

	public function getHomeBanner() {
		include "../includes/connection.php";

	    $api_key    = APP_API_KEY;

      if (isset($_GET['api_key'])) {

		$access_key_received = $_GET['api_key'];

		if ($access_key_received == $api_key) {

		$jsonObj= array();
		
		 
		$query="SELECT id,banner_name,banner_image,banner_url FROM tbl_home_banner ORDER BY tbl_home_banner.id";
		$sql = mysqli_query($mysqli,$query)or die(mysql_error());

		while($data = mysqli_fetch_assoc($sql))
		{
			 

			$row['id'] = $data['id'];
			$row['banner_name'] = $data['banner_name'];
			$row['banner_image'] = $file_path.'images/'.$data['banner_image'];
			$row['banner_image_thumb'] = $file_path.'images/thumbs/'.$data['banner_image'];
			$row['banner_url'] = $data['banner_url'];
 
			array_push($jsonObj,$row);
		
		}

		$set['ALL_IN_ONE_VIDEO'] = $jsonObj;	

 		$this->response($this->json($set), 200);

		} else {
					$respon = array( 'status' => 'failed', 'message' => 'Oops, API Key is Incorrect!');
					$this->response($this->json($respon), 404);
				}
		} else {
			$respon = array( 'status' => 'failed', 'message' => 'Forbidden, API Key is Required!');
			$this->response($this->json($respon), 404);
		}


	}		
	
	
	public function studentreport() {
		include "../includes/connection.php";
		include('../includes/function.php');
		
		   $qry1="INSERT INTO `report`(`student_id`,`subject_id`,`chapter_id`,`total_questions`,`attempted_questions`,`total_marks`,`correct_answers`,`wrong_answers`,`marks_obtained`)
		 
		 VALUES ('".$_REQUEST['student_id']."','".$_REQUEST['subject_id']."','".$_REQUEST['chapter_id']."','".$_REQUEST['total_questions']."','".$_REQUEST['attempted_questions']."','".$_REQUEST['total_marks']."','".$_REQUEST['correct_answers']."','".$_REQUEST['wrong_answers']."','".$_REQUEST['marks_obtained']."')"; 
            
        $result1=mysqli_query($mysqli,$qry1);  
        
        $set['ALL_IN_ONE_VIDEO'][]=array('msg' => "Report added successflly...!",'success'=>'1');
		
	 	 $this->response($this->json($set), 200);

	} 
	
	public function user_register() {
		include "../includes/connection.php";
		include('../includes/function.php');
		

	     $qry = "SELECT * FROM `tbl_users` WHERE email = '".$_POST['email']."' OR phone = '".$_POST['phone']."'"; 
		$result = mysqli_query($mysqli,$qry);
		$row = mysqli_fetch_assoc($result);
		
		if($row['email']!="")
		{
			$set['ALL_IN_ONE_VIDEO'][]=array('msg' => "Email or phone address already used!",'success'=>'0');
		}
		else
		{

	 $qry1="INSERT INTO `tbl_users` (`name`,`email`,`password`,`phone`,`status`) VALUES ('".$_POST['name']."','".$_POST['email']."','".$_POST['password']."','".$_POST['phone']."','1')"; 
            
            $result1=mysqli_query($mysqli,$qry1);  
            $set['ALL_IN_ONE_VIDEO'][]=array('msg' => "Register successflly...!",'success'=>'1');
					
		}
	  
	 	 $this->response($this->json($set), 200);

	} 

	public function postUserLogin() {
		include "../includes/connection.php";
		include('../includes/function.php');
			
			$email = $_REQUEST['email'];
			$password = $_REQUEST['password'];
			
		    $qry = "SELECT * FROM tbl_users WHERE email = '".$email."' and password = '".$password."'"; 
			$result = mysqli_query($mysqli,$qry);
			$num_rows = mysqli_num_rows($result);
			$row = mysqli_fetch_assoc($result); 
			
			if($num_rows > 0)
			{
			
				$set['ALL_IN_ONE_VIDEO'][]=array('message' => 'login successfully','user_id' => $row['id'],'name'=>$row['name'],'email'=>$row['email'],'grade'=>$row['grade'],'success'=>'1');
						
				$this->response($this->json($set), 200);
								 
					
 
			}
			else 
			{		
					$cars['ALL_IN_ONE_VIDEO'][] = array('message' => 'id and password is not correct','success'=>'0');
					$this->response($this->json($cars), 200);
					
			}  
			
		 

	}

	public function getUserStatus() {
		include "../includes/connection.php";
		include('../includes/function.php');

		$user_id = $_GET['user_id'];
		 
		$qry = "SELECT * FROM tbl_users WHERE status='1' and id = '".$user_id."'"; 
		$result = mysqli_query($mysqli,$qry);
		$num_rows = mysqli_num_rows($result);
		$row = mysqli_fetch_assoc($result);
		
		if ($num_rows > 0)
		{ 
					 
			     $set['ALL_IN_ONE_VIDEO'][]=array('message' => 'Enable','success'=>'1');
			     $this->response($this->json($set), 200);
			 
		}		 
		else
		{

 				$set1['ALL_IN_ONE_VIDEO'][]=array('message' => 'Disable','success'=>'0');
 				$this->response($this->json($set1), 200);
		}


	}

	public function getUserProfile() {
		include "../includes/connection.php";
		include('../includes/function.php');

		 $qry = "SELECT * FROM tbl_users WHERE id = '".$_GET['id']."'"; 
		 $result = mysqli_query($mysqli,$qry);
		 
		$row = mysqli_fetch_assoc($result);
	  				 
	    $set['ALL_IN_ONE_VIDEO'][]=array('user_id' => $row['id'],'name'=>$row['name'],'email'=>$row['email'],'phone'=>$row['phone'],'success'=>'1');

	    $this->response($this->json($set), 200);

	}

	public function getUserForgotPass() {
		include "../includes/connection.php";
		include('../includes/function.php');


		$host = $_SERVER['HTTP_HOST'];
		preg_match("/[^\.\/]+\.[^\.\/]+$/", $host, $matches);
        $domain_name=$matches[0];
         
	 	 
		$qry = "SELECT * FROM tbl_users WHERE email = '".$_GET['email']."'"; 
		$result = mysqli_query($mysqli,$qry);
		$row = mysqli_fetch_assoc($result);
		
		if($row['email']!="")
		{
 
			$to = $_GET['email'];
			// subject
			$subject = '[IMPORTANT] '.APP_NAME.' Forgot Password Information';
 			
			$message='<div style="background-color: #f9f9f9;" align="center"><br />
					  <table style="font-family: OpenSans,sans-serif; color: #666666;" border="0" width="600" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
					    <tbody>
					      <tr>
					        <td colspan="2" bgcolor="#FFFFFF" align="center"><img src="http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/../images/'.APP_LOGO.'" alt="header" /></td>
					      </tr>
					      <tr>
					        <td width="600" valign="top" bgcolor="#FFFFFF"><br>
					          <table style="font-family:OpenSans,sans-serif; color: #666666; font-size: 10px; padding: 15px;" border="0" width="100%" cellspacing="0" cellpadding="0" align="left">
					            <tbody>
					              <tr>
					                <td valign="top"><table border="0" align="left" cellpadding="0" cellspacing="0" style="font-family:OpenSans,sans-serif; color: #666666; font-size: 10px; width:100%;">
					                    <tbody>
					                      <tr>
					                        <td><p style="color: #262626; font-size: 28px; margin-top:0px;"><strong>Dear '.$row['name'].'</strong></p>
					                          <p style="color:#262626; font-size:20px; line-height:32px;font-weight:500;">Thank you for using '.APP_NAME.',<br>
					                            Your password is: '.$row['password'].'</p>
					                          <p style="color:#262626; font-size:20px; line-height:32px;font-weight:500;margin-bottom:30px;">Thanks you,<br />
					                            '.APP_NAME.'.</p></td>
					                      </tr>
					                    </tbody>
					                  </table></td>
					              </tr>
					               
					            </tbody>
					          </table></td>
					      </tr>
					      <tr>
					        <td style="color: #262626; padding: 20px 0; font-size: 20px; border-top:5px solid #52bfd3;" colspan="2" align="center" bgcolor="#ffffff">Copyright © '.APP_NAME.'.</td>
					      </tr>
					    </tbody>
					  </table>
					</div>';
 
			 
			$headers = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: '.APP_NAME.' <omegacareerindia@gmail.com>' . "\r\n";
			// Mail it
			@mail($to, $subject, $message, $headers);

			 	 
			  
			$set['ALL_IN_ONE_VIDEO'][]=array('msg' => "Password has been sent on your mail!",'success'=>'1');
		}
		else
		{  	 
				
			$set['ALL_IN_ONE_VIDEO'][]=array('msg' => "Email not found in our database!",'success'=>'0');
					
		}

		$this->response($this->json($set), 200);

	}
	

}

?>