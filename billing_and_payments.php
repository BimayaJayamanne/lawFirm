<?php

include('db_conn.php');


if ($conn) {

    $query = "SELECT id, clName, caseNum, invoiceDate, amount, paymentStatus FROM billing_details";
    $result = mysqli_query($conn, $query);

    if ($result) {

        $billingRecords = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        echo "Error fetching billing records: " . mysqli_error($conn);
    }

    mysqli_free_result($result);

    mysqli_close($conn);
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    </head>

    <body>

        <h2>Billing and Payments</h2>
        <a href="lawfirm_home.php?page=billing_and_payments&action=create_invoice" class="btn btn-success">Create
            Invoice</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Case Number</th>
                    <th>Client Name</th>
                    <th>Invoice Date</th>
                    <th>Amount</th>
                    <th>Payment Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($billingRecords as $record) {
                    echo "<tr>";
                    echo "<td>{$record['id']}</td>";
                    echo "<td>{$record['caseNum']}</td>";
                    echo "<td>{$record['clName']}</td>";
                    echo "<td>{$record['invoiceDate']}</td>";
                    echo "<td>{$record['amount']}</td>";
                    echo "<td>{$record['paymentStatus']}</td>";
                    echo "<td>
                        <a href='#' class='btn btn-primary'>Send Invoice</a>
                        <a href='#' class='btn btn-warning'>Edit Invoice</a>
                      </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

    </body>

    </html>

    <?php
    if (isset($_GET['action']) && $_GET['action'] === 'create_invoice') {
        include('create_invoice.php');
    }
} else {
    echo "Database connection error.";
}
?>