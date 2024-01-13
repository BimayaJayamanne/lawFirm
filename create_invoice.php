<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Create Invoice</title>
</head>

<body>
    <div class="container mt-5">
        <h2> Create Invoice</h2>

        <form method="post" action="">
            <label for="clName">Name:</label>
            <select name="clName" id="clNameSelect" required>
            </select>
            <label for="caseNum">Case Number:</label>
            <select name="caseNum" id="caseNumSelect" required>
            </select>

            <label for="invoiceDate">Invoice Date:</label>
            <input type="date" name="invoiceDate">
            <label for="amount">Amount due:</label>
            <input type="number" name="amount">
            <label>Payment Status:</label>
            <div>
                <input type="checkbox" name="paymentStatus[]" value="paid"> Paid
            </div>
            <div>
                <input type="checkbox" name="paymentStatus[]" value="pending"> Pending Payment
            </div>

            <button type="submit" name="add" class="btn btn-primary">Create Invoice</button>
        </form>
    </div>

    <?php
    // database connection file
    include('db_conn.php');

    // Check connection is successful
    if ($conn) {
        // Handle the form submission
        if (isset($_POST['add'])) {
            // Retrieving the invoice details from the form
            $caseNum = $_POST['caseNum'];
            $clName = $_POST['clName'];
            $invoiceDate = $_POST['invoiceDate'];
            $amount = $_POST['amount'];
            $paymentStatus = isset($_POST['paymentStatus']) ? implode(', ', $_POST['paymentStatus']) : '';

            $query = "INSERT INTO billing_details (caseNum, clName, invoiceDate, amount, paymentStatus) VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "sssss", $caseNum, $clName, $invoiceDate, $amount, $paymentStatus);

            // Executing the query
            if (mysqli_stmt_execute($stmt)) {
                echo "<p>Invoice created successfully!</p>";
            } else {
                echo "<p>Error creating invoice: " . mysqli_error($conn) . "</p>";
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script>
        // Use jQuery to handle AJAX requests
        $(document).ready(function () {
            // Populate clients dropdown on page load
            populateClientsDropdown();

            // When client selection changes, update cases dropdown
            $('#clNameSelect').on('change', function () {
                populateCasesDropdown($(this).val());
            });

            // Function to populate clients dropdown
            function populateClientsDropdown() {
                $.ajax({
                    url: 'get_clients.php', // Replace with the actual PHP file to fetch clients
                    type: 'GET',
                    success: function (response) {
                        $('#clNameSelect').html(response);
                        // Trigger change to update cases dropdown based on the initially selected client
                        $('#clNameSelect').trigger('change');
                    },
                    error: function (error) {
                        console.error('Error fetching clients:', error);
                    }
                });
            }

            // Function to populate cases dropdown based on the selected client
            function populateCasesDropdown(clientName) {
                $.ajax({
                    url: 'get_cases.php', // Replace with the actual PHP file to fetch cases
                    type: 'GET',
                    data: { clientName: clientName },
                    success: function (response) {
                        $('#caseNumSelect').html(response);
                    },
                    error: function (error) {
                        console.error('Error fetching cases:', error);
                    }
                });
            }
        });
    </script>
</body>

</html>