<?php

	require_once("Rest.inc.php");
	require_once("db.php");
	require_once("functions.php");

	class API extends REST {

		private $functions = NULL;
		private $db = NULL;

		public function __construct() {
			$this->db = new DB();
			$this->functions = new functions($this->db);
		}

		public function check_connection() {
			$this->functions->checkConnection();
		}

		/*
		 * ALL API Related android client -------------------------------------------------------------------------
		*/
		
		private function get_quiz() {
	        $this->functions->getQuiz();
	    } 
	    
	    private function get_quiz_main_cat() {
	        $this->functions->getQuizmaincat();
	    }
	    

	   private function get_quiz_cat() {
	        $this->functions->getQuizcat();
	    }
	       private function get_quiz_cat_revision() {
	        $this->functions->getQuizcatrevision();
	    }
	    
	      private function contacttoadmin() {
	        $this->functions->contacttoadmin();
	    }
	    
	   private function get_quiz_chapter() {
	        $this->functions->getquizchapter();
	    }
	    
		private function get_quiz_by_id() {
	        $this->functions->getQuizById();
	    }
	    
	    
		private function get_app_details() {
	        $this->functions->getAppDetails();
	    }

	    private function get_home_banner() {
	        $this->functions->getHomeBanner();
	    }

        private function get_all_pdf_cat() {
	        $this->functions->getAllPdfcat();
	    }

		  private function get_all_pdf() {
	        $this->functions->getAllPdf();
	    }
			
		private function payment_success() {
	        $this->functions->paymentsuccess();
	    }
				
	
	    private function get_home() {
	        $this->functions->getHome();
	    }

	    private function get_all_videos() {
	        $this->functions->getAllVideos();
	    }

	    private function get_latest_videos() {
	        $this->functions->getLatestVideos();
	    }
  		
  		private function get_cat_list() {
	        $this->functions->getCatList();
	    }	
	    
	    private function get_cat_videos() {
	        $this->functions->getCatVideos();
	    }

	    private function get_video() {
	        $this->functions->getVideo();
	    }

	    private function get_search_videos() {
	        $this->functions->getSearchVideos();
	    }
	    
	     private function post_all_free_video() {
	        $this->functions->postallfreevideo();
	    }

	    private function user_register() {
	        $this->functions->user_register();
	    }

	    private function post_user_login() {
	        $this->functions->postUserLogin();
	    }
	    
	     private function student_report() {
	        $this->functions->studentreport();
	    }

	    private function get_user_profile() {
	        $this->functions->getUserProfile();
	    }

	    private function post_user_profile_update() {
	        $this->functions->postUserProfileUpdate();
	    }

	    private function get_user_status() {
	        $this->functions->getUserStatus();
	    }

	    private function get_user_forgot_pass() {
	        $this->functions->getUserForgotPass();
	    }

	    private function post_video_rate() {
	        $this->functions->postVideoRate();
	    }

	    private function post_video_comment() {
	        $this->functions->postVideoComment();
	    } 
	    
	     private function post_status_update() {
	        $this->functions->poststatusupdate();
	    }
	    
	     private function user_practical() {
	        $this->functions->user_practical();
	    }
	    
	    
	     private function student_report_chapter_view() {
	        $this->functions->student_report_chapter_view();
	    }
	    
	      private function view_all_student_report() {
	        $this->functions->view_all_student_report();
	    }
	    
	    
	     private function student_report_view() {
	        $this->functions->student_report_view();
	    }
	     
		/*
		 * End of API Transactions ----------------------------------------------------------------------------------
		*/

		public function processApi() {
			if(isset($_REQUEST['x']) && $_REQUEST['x']!=""){
				$func = strtolower(trim(str_replace("/","", $_REQUEST['x'])));
				if((int)method_exists($this,$func) > 0) {
					$this->$func();
				} else {
					echo 'processApi - method not exist';
					exit;
				}
			} else {
				echo 'processApi - method not exist';
				exit;
			}
		}

	}

	// Initiiate Library
	$api = new API;
	$api->processApi();

?>
