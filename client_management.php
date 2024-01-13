
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>


<h2 class="display-4">Client Management</h2>

<?php
// specific action requested (search or add)
$action = isset($_GET['action']) ? $_GET['action'] : '';

//  PHP file based on the action
switch ($action) {
    case 'search':
        include('search_client.php');
        break;
    case 'add':
        include('add_client.php');
        break;
    default:
        echo '<p>Please select an option: 
                <div class="d-grid gap-2">
                    <a href="lawfirm_home.php?page=client_management&action=search" class="btn btn-primary btn-lg">Search</a>
                    <a href="lawfirm_home.php?page=client_management&action=add" class="btn btn-success btn-lg">Add Client</a>
                </div>
                </p>';
        break;
}
?>