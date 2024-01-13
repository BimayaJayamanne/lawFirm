<?php
include('db_conn.php');

$query = "SELECT DISTINCT client FROM case_details";
$result = mysqli_query($conn, $query);

$options = "";
while ($row = mysqli_fetch_assoc($result)) {
    $options .= "<option value='{$row['client']}'>{$row['client']}</option>";
}

echo $options;

mysqli_close($conn);
?>
