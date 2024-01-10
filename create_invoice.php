

<!-- create_invoice.php -->

<!-- Your HTML and Bootstrap styles go here -->

<h2>Create Invoice</h2>

<form method="post" action="process_invoice.php">
    <!-- Add input fields for Id, CaseNum, Client Name, Invoice Date, Amount, Payment Status -->
    <label for="caseNum">Case Number:</label>
    <input type="text" name="caseNum" required>

    <!-- Add other input fields -->

    <button type="submit" name="createInvoice" class="btn btn-success">Create Invoice</button>
</form>