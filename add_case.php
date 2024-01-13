
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Case</title>
</head>

<body>
    <h2>Add Case</h2>

    <form method="post" action="">
        <label for="caseNum">Case Number:</label>
        <input type="text" name="caseNum" required>
        <label for="nextDate">Next Date:</label>
        <input type="date" name="nextDate" required>
        <label for="court">Court:</label>
        <input type="text" name="court">
        <label for="lawyer">Lawyer:</label>
        <input type="text" name="lawyer">
        <label for="client">Client:</label>
        <input type="text" name="client" >
        <label for="stepsTaken">Steps Taken:</label>
        <input type="text" name="stepsTaken" >
        <button type="submit" name="add">Add Case</button>
    </form>

    <?php
   
    include('db_conn.php');

    if ($conn) {
        
        if (isset($_POST['add'])) {
            // Retrieving the case details from the form
            $caseNum = $_POST['caseNum'];
            $nextDate = $_POST['nextDate'];
            $court = $_POST['court'];
            $lawyer = $_POST['lawyer'];
            $client = $_POST['client'];
            $stepsTaken = $_POST['stepsTaken'];

            // Implementing database query to add the new case
            $query = "INSERT INTO case_details (caseNum, nextDate, court, lawyer, client, stepsTaken) VALUES (?, ?, ?,?,?,?)";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "ssssss", $caseNum, $nextDate, $court, $lawyer,$client, $stepsTaken);

            // Execute the query
            if (mysqli_stmt_execute($stmt)) {
                echo "<p>Case added successfully!</p>";
            } else {
                echo "<p>Error adding case: " . mysqli_error($conn) . "</p>";
            }

            // Close the statement
            mysqli_stmt_close($stmt);
        }

        // Close the database connection
        mysqli_close($conn);
    } else {
        echo "Database connection error.";
    }
    ?>
    <a href="lawfirm_home.php?page=case_management"><button>Back</button></a>
</body>

</html>