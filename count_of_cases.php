<?php

include('db_conn.php');


if ($conn) {
    
    $query = "SELECT COUNT(*) AS numCases FROM case_details";
    $result = mysqli_query($conn, $query);

    if ($result) {
       
        $row = mysqli_fetch_assoc($result);

        
        echo $row['numCases'];
    } else {
        echo "Error fetching number of cases: " . mysqli_error($conn);
    }

    
    mysqli_free_result($result);

    
    mysqli_close($conn);
} else {
    echo "Database connection error.";
}
?>
