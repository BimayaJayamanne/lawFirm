<?php

include('db_conn.php');


if ($conn) {
    
    $query = "SELECT COUNT(*) AS numClients FROM client_details";
    $result = mysqli_query($conn, $query);

    if ($result) {
       
        $row = mysqli_fetch_assoc($result);

        
        echo $row['numClients'];
    } else {
        echo "Error fetching number of clients: " . mysqli_error($conn);
    }

    
    mysqli_free_result($result);

    
    mysqli_close($conn);
} else {
    echo "Database connection error.";
}
?>