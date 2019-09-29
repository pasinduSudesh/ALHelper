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


function getRemainingQuestions(){

    global $mysqli;

    $qNums = array();

    $query_questions = "SELECT COUNT(*) as num FROM tab_question";
    $question_count = mysqli_fetch_array(mysqli_query($mysqli, $query_questions));
    $question_count = $question_count['num'];

    $i=1;
    while ($i<51){
        array_push($qNums,$i);
        $i+1;
    }

    
    


    
}


?>