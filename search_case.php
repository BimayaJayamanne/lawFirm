
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Case</title>
    
</head>

<body>
    <h2>Search Case</h2>

    <form method="post" action="">
        <label for="caseNumber">Case Number:</label>
        <input type="text" name="caseNumber" required>
        <button type="submit" name="search">Search</button>
    </form>

    <?php
    // Include the database connection file
    include('db_conn.php');

    // Check if the connection is successful
    if ($conn) {
        // Handle the form submission
        if (isset($_POST['search'])) {
            // Retrieve the client details from the database based on the provided name
            $caseNumber = $_POST['caseNumber'];

            // Implement your database query here to fetch client details
            // Example:
            $query = "SELECT ID, caseNum, nextDate, court, lawyer, client, stepsTaken FROM case_details WHERE caseNum = ?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "s", $caseNumber);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            // Display the client details
            echo "<h3>Case Details</h3>";
            echo "<table>";
            echo "<tr><th>ID</th><th>Case Number</th><th>Next Date</th><th>Court</th><th>Lawyer</th><th>Client</th><th>StepsTaken</th></tr>";

            // Loop through the database results and display client details
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>{$row['ID']}</td><td>{$row['caseNum']}</td><td>{$row['nextDate']}</td><td>{$row['court']}</td><td>{$row['lawyer']}</td><td>{$row['client']}</td><td>{$row['stepsTaken']}</td></tr>";
            }

            echo "</table>";

            // Close the statement
            mysqli_stmt_close($stmt);
        }
    } else {
        echo "Database connection error.";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
    <a href="lawfirm_home.php?page=client_management"><button>Back</button></a>
</body>

</html>