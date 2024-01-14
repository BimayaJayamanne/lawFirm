<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous"></script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container mt-5">
        <h1> <Strong> Dashboard </strong></h1>

        <h2>Welcome to the Law Firm Management System</h2>
        <p>Manage your cases, clients, billing and more with our powerful cloud-based Law Firm Management application. Efficiency is guarenteed</p>

        <!-- Number of Cases -->
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Number of Cases</h5>
                <p class="card-text" id="numCases">Loading...</p>
            </div>
        </div>

        <!-- Number of Clients -->
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Number of Clients</h5>
                <p class="card-text" id="numClients">Loading...</p>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $(document).ready(function () {

            function fetchNumCases() {
                console.log('Fetching number of cases...');
                $.ajax({
                    url: 'count_of_cases.php',
                    type: 'GET',
                    success: function (response) {
                        console.log('Number of cases:', response);
                        $('#numCases').text(response);
                    },
                    error: function (xhr, status, error) {
                        console.error('Error fetching number of cases:', error);
                    }
                });
            }

            function fetchNumClients() {
                console.log('Fetching number of clients...');
                $.ajax({
                    url: 'count_of_clients.php',
                    type: 'GET',
                    success: function (response) {
                        console.log('Number of clients:', response);
                        $('#numClients').text(response);
                    },
                    error: function (xhr, status, error) {
                        console.error('Error fetching number of clients:', error);
                    }
                });
            }

            fetchNumCases();
            fetchNumClients();
        });
    </script>
</body>

</html>