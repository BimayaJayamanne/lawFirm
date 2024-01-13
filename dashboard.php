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
    <!-- Include Bootstrap and jQuery -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-5">
        <h2>Dashboard</h2>

        <!-- Number of Cases -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Number of Cases</h5>
                <p class="card-text" id="numCases">Loading...</p>
            </div>
        </div>

        <!-- Number of Lawyers -->
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Number of Lawyers</h5>
                <p class="card-text" id="numLawyers">Loading...</p>
            </div>
        </div>

        <!-- Calendar for Case Selection -->
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Calendar</h5>
                <input type="date" class="form-control" id="datepicker" placeholder="Select a Date">
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <!-- jQuery UI for Datepicker -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- Your Custom Script -->
    <script>
        $(document).ready(function () {
            // Function to fetch and display the number of cases
            function fetchNumCases() {
                $.ajax({
                    url: 'php_script_to_fetch_cases.php', // Replace with your PHP script
                    type: 'GET',
                    success: function (response) {
                        $('#numCases').text(response);
                    }
                });
            }

            // Function to fetch and display the number of lawyers
            function fetchNumLawyers() {
                $.ajax({
                    url: 'php_script_to_fetch_lawyers.php', // Replace with your PHP script
                    type: 'GET',
                    success: function (response) {
                        $('#numLawyers').text(response);
                    }
                });
            }

            // Initialize Datepicker
            $('#datepicker').datepicker({
                onSelect: function (dateText) {
                    // Call a function to fetch and display cases for the selected date
                    fetchCasesForDate(dateText);
                }
            });

            // Function to fetch and display cases for the selected date
            function fetchCasesForDate(selectedDate) {
                $.ajax({
                    url: 'php_script_to_fetch_cases_for_date.php', // Replace with your PHP script
                    type: 'GET',
                    data: { date: selectedDate },
                    success: function (response) {
                        // Handle the response and update your UI as needed
                        console.log(response);
                    }
                });
            }

            // Initial fetch of data
            fetchNumCases();
            fetchNumLawyers();
        });
    </script>
</body>

</html>
