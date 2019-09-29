<?php include("includes/header.php");

	require("includes/db_functions.php");
	require("language/language.php");




if (isset($_GET['addThis'])){

    $qry="SELECT * FROM tab_practical where paid='".$_GET['practical_id']."'";
	$result=mysqli_query($mysqli,$qry);
	$row=mysqli_fetch_assoc($result);

}

if ((isset($_GET['addThis'])) and (isset($_POST['submit']))) {

    $data = array(
        'name' => $_POST['name'],
        'practicalCategory' => $_POST['category'],
        'subject' => $_POST['subject'],
        'link' => $_POST['link'],
    
    );

    update('tab_practical',$data,"WHERE paid = '".$_GET['practical_id']."'");

    $_SESSION['msg']="11"; 
	header( "Location:manage_practicals.php");
	exit;

}

if ((isset($_GET['add'])) and (isset($_POST['submit']))) {

    $data = array(
        'name' => $_POST['name'],
        'practicalCategory' => $_POST['category'],
        'subject' => $_POST['subject'],
        'link' => $_POST['link'],
    
    );


    insert('tab_practical',$data);

    $_SESSION['msg']="10"; 
	header( "Location:manage_practicals.php");
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
              <div class="page_title">Add Practical</div>
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
                    <label class="col-md-3 control-label">Practical Name :-</label>
                    <div class="col-md-6">
                      <input type="text" name="name" id="name" value="<?php if(isset($_GET['addThis'])){echo $row['name'];}?>"  class="form-control" required>
                    </div>
                  </div>


                  <div class="form-group">
                    <label class="col-md-3 control-label">Subject:-</label>
                    <div class="col-md-6">
                      <select name="subject" id="mmid" class="select2" required>
                        <option value="">--Select Subject--</option>
          						        						 
          							<option value="Chemistry" <?php if(isset($_GET['addThis'])){if ($row['subject']=="Chemistry"){?>selected<?php }}?>>
                                      Chemistry
                                    </option>

                                    <option value="Physics" <?php if(isset($_GET['addThis'])){if($row['subject']=="Physics"){?>selected<?php }}?>>
                                    Physics
                                    </option>

                                    <option value="Biology" <?php if(isset($_GET['addThis'])){if($row['subject']=="Biology"){?>selected<?php }}?>>
                                    Biology
                                    </option>



                                   
                      </select>
                    </div>
                  </div>
				
			

                  <div class="form-group">
                    <label class="col-md-3 control-label">Catagory:-</label>
                    <div class="col-md-6">
                      <select name="category" id="mmid" class="select2" required>
                        <option value="">--Select Catagory--</option>
          						        						 
          							
                                    <option value="Grade 12, 1st term" <?php if(isset($_GET['addThis'])){if($row['practicalCategory']=="Grade 12, 1st term"){?>selected<?php }}?>>
                                    Grade 12, 1st term
                                    </option>

                                    <option value="Grade 12, 2nd term" <?php if(isset($_GET['addThis'])){if($row['practicalCategory']=="Grade 12, 2nd term"){?>selected<?php }}?>>
                                    Grade 12, 2nd term
                                    </option>

                                    <option value="Grade 12, 3rd term" <?php if(isset($_GET['addThis'])){if($row['practicalCategory']=="Grade 12, 3rd term"){?>selected<?php }}?>>
                                    Grade 12, 3rd term
                                    </option>

                                    <option value="Grade 13, 1st term" <?php if(isset($_GET['addThis'])){if($row['practicalCategory']=="Grade 13, 1st term"){?>selected<?php }}?>>
                                    Grade 13, 1st term
                                    </option>

                                    <option value="Grade 13, 2nd term" <?php if(isset($_GET['addThis'])){if($row['practicalCategory']=="Grade 13, 2nd term"){?>selected<?php }}?>>
                                    Grade 13, 2nd term
                                    </option>

                                    <option value="Grade 13, 3rd term" <?php if(isset($_GET['addThis'])){if($row['practicalCategory']=="Grade 13, 3rd term"){?>selected<?php }}?>>
                                    Grade 13, 3rd term
                                    </option>

                                    
                      </select>
                    </div>
                  </div>
                
                  <div class="form-group">
                    <label class="col-md-3 control-label">Link :-</label>
                    <div class="col-md-6">
                      <input type="text" name="link" id="link" value="<?php if(isset($_GET['addThis'])){echo $row['link'];}?>"  class="form-control" required>
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
