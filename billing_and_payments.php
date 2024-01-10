<h2>Billing and Payments</h2>

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
        // Fetch billing information from the database (replace with your actual query)
        $billingRecords = []; // Replace this with actual data retrieval

        foreach ($billingRecords as $record) {
            echo "<tr>";
            echo "<td>{$record['id']}</td>";
            echo "<td>{$record['caseNum']}</td>";
            echo "<td>{$record['clientName']}</td>";
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

   