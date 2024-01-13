<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title display-4>Search Client</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">

                <h2 class="text-primary"><strong>Search Client</h2>

                <form method="post" action="">
                    <label for="clientName">Client Name:</label>
                    <input type="text" name="clientName" required>
                    <button type="submit" class="btn btn-primary" name="search">Search</button>

                </form>

                <?php

                include('db_conn.php');

                if ($conn) {

                    if (isset($_POST['search'])) {

                        // Retrieving the client details from the database based on the provided name
                        $clientName = $_POST['clientName'];


                        $query = "SELECT ID, clName, clPhone, clAddress, caseNum FROM client_details WHERE clName = ?";
                        $stmt = mysqli_prepare($conn, $query);
                        mysqli_stmt_bind_param($stmt, "s", $clientName);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);


                        echo "<h3>Client Details</h3>";
                        echo "<table>";
                        echo "<tr><th>ID</th><th>Name</th><th>Phone</th><th>Address</th><th>Case Number</th></tr>";


                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><td>{$row['ID']}</td><td>{$row['clName']}</td><td>{$row['clPhone']}</td><td>{$row['clAddress']}</td><td>{$row['caseNum']}</td></tr>";
                        }

                        echo "</table>";


                        mysqli_stmt_close($stmt);
                    }
                } else {
                    echo "Database connection error.";
                }


                mysqli_close($conn);
                ?>
                <!-- <a href="lawfirm_home.php?page=client_management" class="btn btn-secondary">Back</a> -->
            </div>



        </div>

    </div>
</body>

</html>