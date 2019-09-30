<?php
 include("includes/connection.php");




$pid='p0002';
$i=1;
$qNums = array();
$showingArray = array();
$a = array();
while($i<=50){
    if ($i < 10){
        array_push($qNums,"0".strval($i));
    }else{
        array_push($qNums,strval($i));
    }
    // echo $qNums[$i-1];
    $i = $i+1;
}

$query_questions = "SELECT COUNT(*) as num FROM tbl_question";
$question_count = mysqli_fetch_array(mysqli_query($mysqli, $query_questions));    
$question_count = $question_count['num'];
// echo $question_count;

$query_question = "SELECT qid FROM tbl_question WHERE pid='{$pid}'";
$rows = mysqli_query($mysqli, $query_question);
// print_r($rows);

if ($question_count == 0){
    $showingArray = $qNums;
}else{
    while ($row = mysqli_fetch_array($rows)) {
        array_push($a,$row['qid']);
    }
    $showingArray = array_diff($qNums,$a);


}

// foreach($showingArray as $value){
//     echo "$value\n";
// }


?>