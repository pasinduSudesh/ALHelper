<?php

function insert($table,$data){//$data should be array
    
    global $mysqli;

    $fields = array_keys( $data );  
    $values = array_map( array($mysqli, 'real_escape_string'), array_values( $data ) );       
   
    mysqli_query($mysqli, "INSERT INTO $table(".implode(",",$fields).") VALUES ('".implode("','", $values )."');") or die( mysqli_error($mysqli) );

}

function delete($table, $where=''){
    
    global $mysqli;
    
    $whereSQL = '';
    if(!empty($where))
    {
        
        if(substr(strtoupper(trim($where)), 0, 5) != 'WHERE')
        {
            $whereSQL = " WHERE ".$where;
        } else
        {
            $whereSQL = " ".trim($where);
        }
    }
    
    $sql = "DELETE FROM ".$table.$whereSQL;
     
    return mysqli_query($mysqli,$sql);
}  



function update($table, $form_data, $where_clause='')
{   
    global $mysqli;
    // check for optional where clause
    $whereSQL = '';
    if(!empty($where_clause))
    {
        // check to see if the 'where' keyword exists
        if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
        {
            // not found, add key word
            $whereSQL = " WHERE ".$where_clause;
        } else
        {
            $whereSQL = " ".trim($where_clause);
        }
    }
    // start the actual SQL statement
    $sql = "UPDATE ".$table." SET ";

    // loop and build the column /
    $sets = array();
    foreach($form_data as $column => $value)
    {
         $sets[] = "`".$column."` = '".$value."'";
    }
    $sql .= implode(', ', $sets);

    // append the where statement
    $sql .= $whereSQL;
         
    // run and return the query result
    return mysqli_query($mysqli,$sql);
}


function getRemainingQuestions($pid){

    global $mysqli;
    // $pid='p0002';
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

        return $showingArray;
    
}
