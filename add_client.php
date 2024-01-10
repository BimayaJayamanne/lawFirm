<!-- add_client.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title class="display-4">Add Client</title>
</head>

<body>
<div class="container">
        <h2 class="display-4">Add Client</h2>
    

    <form method="post" action="">
        <label for="clientName">Client Name:</label>
        <input type="text" name="clientName" required>
        <label for="caseNum">Case Number:</label>
        <input type="text" name="caseNum" required>
        <label for="clientEmail">Email:</label>
        <input type="email" name="clientEmail">
        <label for="clientPhone">Phone:</label>
        <input type="tel" name="clientPhone">
        <label for="clientAddress">Address:</label>
        <input type="text" name="clientAddress" >
        
        <button type="submit" class="btn btn-primary" name="add">Add Client</button>
    </form>

    <?php
    // Include the database connection file
    include('db_conn.php');

    // Check if the connection is successful
    if ($conn) {
        // Handle the form submission
        if (isset($_POST['add'])) {
            // Retrieve the client details from the form
            $clientName = $_POST['clientName'];
            $caseNum = $_POST['caseNum'];
            $clientEmail = $_POST['clientEmail'];
            $clientPhone = $_POST['clientPhone'];
            $clientAddress = $_POST['clientAddress'];

            // Implement your database query to add the new client
            $query = "INSERT INTO client_details (clName, caseNum, clEmail, clPhone, clAddress) VALUES (?, ?, ?,?,?)";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "sssss", $clientName, $caseNum, $clientEmail, $clientPhone,$clientAddress);

            // Execute the query
            if (mysqli_stmt_execute($stmt)) {
                echo "<p>Client added successfully!</p>";
            } else {
                echo "<p>Error adding client: " . mysqli_error($conn) . "</p>";
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
    <a href="lawfirm_home.php?page=client_management"class="btn btn-secondary"><button>Back</button></a>
</div>
</body>

</html>