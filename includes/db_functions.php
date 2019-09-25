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



?>