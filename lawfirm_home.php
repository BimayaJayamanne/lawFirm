<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['userName'])) {

     ?>
     <!DOCTYPE html>
     <html>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
     <head>
          <title> Law Firm</title>
          <link rel="stylesheet" type="text/css" href="style.css">
     </head>

     <body>
          <header>
               <div  class="firm-Name">
                    <h1 strong >Law Firm</h1>
               </div>

               <div class="user-info">
                    <h1>Hello,
                         <?php echo $_SESSION['name']; ?>
                    </h1>
                    <a href="logout.php">Logout</a>
               </div>
          </header>

          <nav>
               <ul>
                    <li><a href="lawfirm_home.php?page=dashboard">Dashboard</a></li>
                    <li><a href="lawfirm_home.php?page=client_management">Client Management</a></li>
                    <li><a href="lawfirm_home.php?page=case_management">Case Management</a></li>
                    <!-- <li><a href="lawfirm_home.php?page=forms">Forms</a></li> -->
                    <li><a href="lawfirm_home.php?page=billing_and_payments">Billing and Payments</a></li>
               </ul>
          </nav>
          <div class="content"id="content">
               <?php
               // Get the value of the 'page' parameter from the URL, defaulting to 'dashboard' if not present
               $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

               // Define an array of valid pages
               $validPages = ['dashboard', 'client_management', 'case_management', 'forms', 'billing_and_payments'];

              
               if (in_array($page, $validPages)) {
                    include($page . '.php');
               } else {
                    include('dashboard.php');
               }
               ?>
          </div>

     </body>

     </html>

     <?php
} else {
     header("Location: index.php");
     exit();
}
?>