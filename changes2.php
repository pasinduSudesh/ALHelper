<?php
include('includes/connection.php');

		//collect the passed id
	  $subject = $_GET['subject'];

	//   $cat_qry1="SELECT * FROM `tab_paper` LEFT JOIN tbl_quiz_main_cat ON tbl_quiz_cat.mid= tbl_quiz_main_cat.mid WHERE tbl_quiz_cat.mid = '".$cid."'";
    $cat_qry1 = "SELECT * FROM `tab_paper` WHERE `subject`='".$subject."'";
     
    $cat_result1=mysqli_query($mysqli,$cat_qry1); 
	  
     while($row=mysqli_fetch_array($cat_result1))
	  {
		  echo	"<option value='".$row['paperCategory']."'>".$row['paperCategory']."</option>";}