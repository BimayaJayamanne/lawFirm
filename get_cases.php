<?php
include('db_conn.php');

$clientName = $_GET['clientName'];
$query = "SELECT caseNum FROM case_details WHERE client = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $clientName);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$options = "";
while ($row = mysqli_fetch_assoc($result)) {
    $options .= "<option value='{$row['caseNum']}'>{$row['caseNum']}</option>";
}

echo $options;

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
