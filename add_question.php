<?php include("includes/header.php");
include('includes/connection.php');

	require("includes/db_functions.php");
	require("language/language.php");

//   $cat_qry="SELECT * FROM tbl_quiz_main_cat";
//   $cat_result=mysqli_query($mysqli,$cat_qry); 

//  	$cat_qry1="SELECT * FROM tbl_quiz_main_cat ORDER BY mid";
// 	$cat_result1=mysqli_query($mysqli,$cat_qry1); 
 
// 	$cat_qry2="SELECT * FROM tbl_quiz_cat ORDER BY id";
// 	$cat_result2=mysqli_query($mysqli,$cat_qry2); 

// 	$qry="SELECT * FROM tbl_quiz where cid='".$_GET['quiz_id']."'";
// 	$result=mysqli_query($mysqli,$qry);
// 	$row=mysqli_fetch_assoc($result);
  
// 	if(isset($_POST['submit']))
// 	{  

//     $banner_image1=$_FILES['banner_image1']['name'];
//     $tpath1='images/'.$banner_image1;        
//     $pic1=compress_image($_FILES["banner_image1"]["tmp_name"], $tpath1, 80);

// 		$h=$_REQUEST['ans'];
// 		$h1=implode(',',$h);
		
//      $qry1="INSERT INTO `quiz` 

//    (
//    `subject`,
//     `categories`,
//     `questions`,
//     `question_image`,
//     `ans1`,
//     `ans2`,
//     `ans3`,
//     `ans4`,
//     `ans5`,
//     `ans`) 
//   VALUES (
  
//   '".$_POST['cid']."',
//   '".$_POST['chapid']."',
//   '".$_POST['question']."',
//   '".$banner_image1."',
//   '".$_POST['ans1']."',
//   '".$_POST['ans2']."',
//   '".$_POST['ans3']."',
//   '".$_POST['ans4']."',
//   '".$_POST['ans5']."',
//   '".$h1."')"; 


	
//     $result1=mysqli_query($mysqli,$qry1);  
// 		$_SESSION['msg']="10";
 
// 		header( "Location:manage_quiz.php");
// 		exit;	

		 
// 	}
	
	  
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<script type="text/javascript">
  $(function() {
   
   $("#mid").bind("change", function() {
       $.ajax({
           type: "GET", 
           url: "change1.php",
           data: "mid="+$("#mid").val(),
           success: function(response) {
               $("#catID").html(response);
           }
       });
   });
        
   
  });
</script>




<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript">
$(function() {
 
 $("#cid").bind("change", function() {
     $.ajax({
         type: "GET", 
         url: "change2.php",
         data: "cid="+$("#cid").val(),
         success: function(response) {
                 $("#chapid").html(response);
         }
     });
 });
      
 
});
</script> 

<script>
            $(function () {
                $('#btn').click(function () {
                    $('.myprogress').css('width', '0');
                    $('.msg').text('');
                    var video_local = $('#video_local').val();
                    if (video_local == '') {
                        alert('Please enter file name and select file');
                        return;
                    }
                    var formData = new FormData();
                    formData.append('video_local', $('#video_local')[0].files[0]);
                    $('#btn').attr('disabled', 'disabled');
                     $('.msg').text('Uploading in progress...');
                    $.ajax({
                        url: 'uploadscript.php',
                        data: formData,
                        processData: false,
                        contentType: false,
                        type: 'POST',
                        // this part is progress bar
                        xhr: function () {
                            var xhr = new window.XMLHttpRequest();
                            xhr.upload.addEventListener("progress", function (evt) {
                                if (evt.lengthComputable) {
                                    var percentComplete = evt.loaded / evt.total;
                                    percentComplete = parseInt(percentComplete * 100);
                                    $('.myprogress').text(percentComplete + '%');
                                    $('.myprogress').css('width', percentComplete + '%');
                                }
                            }, false);
                            return xhr;
                        },
                        success: function (data) {
                         
                            $('#video_file_name').val(data);
                            $('.msg').text("File uploaded successfully!!");
                            $('#btn').removeAttr('disabled');
                        }
                    });
                });
            });
        </script>



<?php 

$query_questions = "SELECT COUNT(*) as num FROM tab_question";
$question_count = mysqli_fetch_array(mysqli_query($mysqli, $query_questions));
$question_count = $question_count['num'];

?>

<div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title">Add Question</div>
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
            <form action="" name="add_form" method="POST" class="form form-horizontal" enctype="multipart/form-data">
 

            <div class="form-group">
                    <label class="col-md-3 control-label">Question No :-</label>
                    <div class="col-md-6 ">
                         <select name="qNo" id="qNo" class="select2" required>
                        <option value="">--Select--</option>



                <div class="form-group">
                    <label class="col-md-3 control-label">Selct subject :-</label>
                    <div class="col-md-6 ">
                         <select name="cid" id="cid" class="select2" required>
                        <option value="">--Select Subject Category--</option>
                  <?php
                  while($cat_row=mysqli_fetch_array($cat_result))
                  {
                      ?>                       
                      <option value="<?php echo $cat_row['mid'];?>" >
                          
                      <?php echo $cat_row['cat_name']; ?>
                            
                      </option>                          
                      <?php
                  }
                  ?>
                      </select> 
                    </div>
               </div>            
                    
               <div class="form-group">
                    <label class="col-md-3 control-label">Exam List :-</label>
                    <div class="col-md-6 ">
                    <select name="chapid" id="chapid" class="select2" required>
                        
                        <option value="">--Select Category--</option>

                      </select>    
                    </div>
                 </div>
                  

                   
                <div class="form-group">
                    <label class="col-md-3 control-label">Question:-</label>
                    <div class="col-md-6">
                       <textarea name="question" id="question" rows="5" cols="40" required></textarea>      
                    </div>
                </div></br>

              <div class="form-group">
                    <label class="col-md-3 control-label">Question Image :-</label>
                    <div class="col-md-6">
                      <div class="fileupload_block">
                        <input type="file" name="banner_image1" value="fileupload" id="fileupload"  >
                            <?php if(isset($_GET['banner_id']) and $row['question_image']!="") {?>
                            <div class="fileupload_img"><img type="image" src="images/<?php echo $row['question_image'];?>" alt="banner image" style="width: 172px;"/></div>
                          <?php } else {?>
                            <div class="fileupload_img"><img type="image" src="assets/images/add-image.png" alt="banner image" /></div>
                          <?php }?>
                      </div>
                    </div>
              </div>
				  
				            <div class="form-group">
                    <label class="col-md-3 control-label">Option 1:-</label>
                    <div class="col-md-6">
                   <textarea name="ans1" id="ans1" rows="2" cols="40" required></textarea>                    </div>
                  </div></br>

				  
				          <div class="form-group">
                    <label class="col-md-3 control-label" required>Option 2:-</label>
                    <div class="col-md-6">
                    <textarea name="ans2" id="ans2" rows="2" cols="40"></textarea>                    </div>
                  </div></br>
				          				         				  
		              <div class="form-group">
                    <label class="col-md-3 control-label" required>Option 3:-</label>
                    <div class="col-md-6">
                    <textarea name="ans3" id="ans3" rows="2" cols="40"></textarea>
                    </div>
                  </div></br>

                   <div class="form-group">
                    <label class="col-md-3 control-label" required>Option 4:-</label>
                    <div class="col-md-6">
                    <textarea name="ans4" id="ans4" rows="2" cols="40"></textarea>
                    </div>
                  </div></br>


                   <div class="form-group">
                    <label class="col-md-3 control-label">Option 5:-</label>
                    <div class="col-md-6">
                    <textarea name="ans5" id="ans5" rows="2" cols="40"></textarea>
                    </div>
                  </div></br>

				  
      			   	  <div class="form-group">
                          <label class="col-md-3 control-label">Answer:-</label>
                          <div class="col-md-6">
      						<input type="radio" name="ans[]" value="option1">A                  
      						<input type="radio" name="ans[]" value="option2">B                  
      						<input type="radio" name="ans[]" value="option3">C                  
      						<input type="radio" name="ans[]" value="option4">D                  
                  <input type="radio" name="ans[]" value="option5">E                  

      					   </div>
                  </div></br>
				  
                  
                  </br>
                  <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                      <button type="submit" name="submit" class="btn btn-primary">submit</button>
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
