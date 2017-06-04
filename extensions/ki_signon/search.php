<?php
include("database.php");

    if(isset($_POST['search_keyword'])) {

	$search_keyword = $conn->real_escape_string($_POST['search_keyword']);
	  
	    $sql = "SELECT name FROM kimai_users WHERE name LIKE '%$search_keyword%'";
		  
        $exe=$conn->query($sql);
 
        if($exe === false) {
            trigger_error('Error: ' . $conn->error, E_USER_ERROR);
        }else{
            $rows_returned = $exe->num_rows;
        }
 
	$bold_search_keyword = '<strong>'.$search_keyword.'</strong>';
	if($rows_returned > 0){
            while($row = $exe->fetch_assoc()) 
            {		
                echo '<div class="show" align="left"><span class="fullname">'.str_ireplace($search_keyword,$bold_search_keyword,$row['name']).'</span></div>'; 	
            }
        }else{
            echo '<div class="show" align="left">No matching records.</div>'; 	
        }
    }	
?>