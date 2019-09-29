<?php include("includes/header.php");

	require("includes/db_functions.php");
	require("language/language.php");




if (isset($_GET['addThis'])){

    $qry="SELECT * FROM tab_paper where pid='".$_GET['paper_id']."'";
	$result=mysqli_query($mysqli,$qry);
	$row=mysqli_fetch_assoc($result);

}

if ((isset($_GET['addThis'])) and (isset($_POST['submit']))) {

    $data = array(
        'subject' => $_POST['subject'],
        'paperCategory' => $_POST['catagory'],
        'paperTitle' => $_POST['paperTitle'],
        'date' => date("Y/m/d"),
        'time' => '00:59:00.000000'
    );

    update('tab_paper',$data,"WHERE pid = '".$_GET['paper_id']."'");

    $_SESSION['msg']="11"; 
	header( "Location:manage_exams.php");
	exit;

}

if ((isset($_GET['add'])) and (isset($_POST['submit']))) {

    $data = array(
        'subject' => $_POST['subject'],
        'paperCategory' => $_POST['catagory'],
        'paperTitle' => $_POST['paperTitle'],
        'date' => date("Y/m/d"),
        'time' => '00:59:00.000000'
    );

    insert('tab_paper',$data);

    $_SESSION['msg']="10"; 
	header( "Location:manage_exams.php");
	exit;

}
	
	// if(isset($_POST['submit']) and isset($_GET['add']))
// 	{
	
//        $data = array( 
           
//             'mmid'  =>  $_POST['mmid'],
// 			    'cat_name'  =>  $_POST['category_name'],

// 			    );		

//  		$qry = Insert('tbl_quiz_main_cat',$data);	

 	   
// 		$_SESSION['msg']="10"; 
// 		header( "Location:manage_quiz_main_cat.php");
// 		exit;	

		 
		
// 	}
	
	
// 	if(isset($_GET['banner_id']))
// 	{
			 
// 			$qry="SELECT * FROM tbl_quiz_main_cat where mid='".$_GET['banner_id']."'";
// 			$result=mysqli_query($mysqli,$qry);
// 			$row=mysqli_fetch_assoc($result);

// 	}
	
// 	if(isset($_POST['submit']) and isset($_GET['banner_id']))
// 	{
	    

// 	      $data = array( 
// 	                      'mmid'  =>  $_POST['mmid'],

// 			    'cat_name'  =>  $_POST['category_name'],

// 			    );			

// 		$category_edit=UPDATE('tbl_quiz_main_cat', $data, "WHERE mid = '".$_GET['banner_id']."'");

// 		$_SESSION['msg']="11"; 
		
// 		header( "Location:manage_quiz_main_cat.php");
// 		exit;
 
// 	}
	
	
	  
// ?>



<div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title">Add Exam</div>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="row mrg-top">
            <div class="col-md-12">
               
              <div class="col-md-12 col-sm-12">
                <?php if(isset($_SESSION['msg'])){?> 
               	 <div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                	<?php echo $client_lang[$_SESSION['msg']] ; ?></a> </div>
                <?php unset($_SESSION['msg']);}?>	
              </div>
              
            </div>
          </div>
          <div class="card-body mrg_bottom"> 
            <form action="" name="edit_form" method="post" class="form form-horizontal" enctype="multipart/form-data">
              <input  type="hidden" name="hospital_id" value="<?php echo $_GET['hospital_id'];?>" />

              <div class="section">
                <div class="section-body">
				
				<div class="form-group">
                    <label class="col-md-3 control-label">Subject:-</label>
                    <div class="col-md-6">
                      <select name="subject" id="mmid" class="select2" required>
                        <option value="">--Select Subject--</option>
          						        						 
          							<option value="Maths" <?php if(isset($_GET['addThis'])){if ($row['subject']=="Maths"){?>selected<?php }}?>>
                                      Maths
                                    </option>

                                    <option value="Bio" <?php if(isset($_GET['addThis'])){if($row['subject']=="Bio"){?>selected<?php }}?>>
                                      Bio
                                    </option>

                                    <option value="Commerce" <?php if(isset($_GET['addThis'])){if($row['subject']=="Commerce"){?>selected<?php }}?>>
                                    Commerce
                                    </option>

                                    <option value="Art" <?php if(isset($_GET['addThis'])){if($row['subject']=="Art"){?>selected<?php }}?>>
                                    Art
                                    </option> 
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-3 control-label">Catagory:-</label>
                    <div class="col-md-6">
                      <select name="catagory" id="mmid" class="select2" required>
                        <option value="">--Select Catagory--</option>
          						        						 
          							<option value="Revision" <?php if(isset($_GET['addThis'])){if($row['paperCategory']=="Revision"){?>selected<?php }}?>>
                                      Revision
                                    </option>

                                    <option value="Grade 12, 1st term" <?php if(isset($_GET['addThis'])){if($row['paperCategory']=="Grade 12, 1st term"){?>selected<?php }}?>>
                                    Grade 12, 1st term
                                    </option>

                                    <option value="Grade 12, 2nd term" <?php if(isset($_GET['addThis'])){if($row['paperCategory']=="Grade 12, 2nd term"){?>selected<?php }}?>>
                                    Grade 12, 2nd term
                                    </option>

                                    <option value="Grade 12, 3rd term" <?php if(isset($_GET['addThis'])){if($row['paperCategory']=="Grade 12, 3rd term"){?>selected<?php }}?>>
                                    Grade 12, 3rd term
                                    </option>

                                    <option value="Grade 13, 1st term" <?php if(isset($_GET['addThis'])){if($row['paperCategory']=="Grade 13, 1st term"){?>selected<?php }}?>>
                                    Grade 13, 1st term
                                    </option>

                                    <option value="Grade 13, 2nd term" <?php if(isset($_GET['addThis'])){if($row['paperCategory']=="Grade 13, 2nd term"){?>selected<?php }}?>>
                                    Grade 13, 2nd term
                                    </option>

                                    <option value="Grade 13, 3rd term" <?php if(isset($_GET['addThis'])){if($row['paperCategory']=="Grade 13, 3rd term"){?>selected<?php }}?>>
                                    Grade 13, 3rd term
                                    </option>

                                    <option value="Special Paper" <?php if(isset($_GET['addThis'])){if($row['paperCategory']=="Special Paper"){?>selected<?php }}?>>
                                    Special Paper
                                    </option> 
                      </select>
                    </div>
                  </div>
				
				 <div class="form-group">
                    <label class="col-md-3 control-label">Paper Title :-</label>
                    <div class="col-md-6">
                      <input type="text" name="paperTitle" id="category_name" value="<?php if(isset($_GET['addThis'])){echo $row['paperTitle'];}?>"  class="form-control" required>
                    </div>
                  </div>
			
				
                  <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                      <button type="submit" name="submit" class="btn btn-primary">Save</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
        
<?php include("includes/footer.php");?>       
