<?php
    include '../config/admin_login_check.php';
    require('../models/user.php');
    require('../models/books.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <style>
      body {
    background-color: #f4f7fa;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.container {
    margin-top: 30px;
}

.heading {
    font-size: 2rem;
    font-weight: bold;
    text-align: center;
    color: #5a67d8;
    margin-bottom: 20px;
}

.table {
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 40px;
}

.table th, .table td {
    text-align: center;
    padding: 15px;
    vertical-align: middle;
}

.table thead th {
    background-color: #4e73df;
    color: #ffffff;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.table tbody tr:nth-child(even) {
    background-color: #f8f9fc;
}

.table tbody tr:hover {
    background-color: #e2e8f0;
}

.table input[type="text"], .table textarea {
    width: 100%;
    padding: 8px;
    border: 1px solid #cbd5e0;
    border-radius: 5px;
    background-color: #edf2f7;
    margin-bottom: 10px;
}

.table input[type="file"] {
    padding: 5px;
    background-color: #edf2f7;
    border: none;
}

.btn.add_cat {
    background-color: #38a169;
    color: #ffffff;
    border: none;
    padding: 8px 15px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.btn.add_cat:hover {
    background-color: #2f855a;
}

.btn-danger {
    background-color: #e53e3e;
    color: #ffffff;
    border: none;
    padding: 8px 15px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.btn-danger:hover {
    background-color: #c53030;
}

.btn-success {
    background-color: #38a169;
    color: white;
    border-radius: 5px;
    padding: 10px;
}

.btn-success:hover {
    background-color: #2f855a;
}

img {
    max-width: 100px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

/* Form inside the table styling */
form {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 15px;
}

form input, form textarea {
    margin: 5px 0;
}

   </style>
   <!-- Bootstrap 5 CSS CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/2btcf8C1BlpZviK2yYmUaaKzW8xF0bdyzzZp4b" crossorigin="anonymous">

<!-- Bootstrap 5 JS with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoNkABl+1hb7U9vv6ZbPteWIJ95asMSXQ6G1tZfn53vKTdN" crossorigin="anonymous"></script>

</head>
<body>
   
</body>
</html>
<?php
    
        
        
      //   HERE WE HANDLE SESSIONS AND ALERTS 

      if (isset( $_SESSION['success_message'])) {
         ?>
            <script>
               alert('success')
            </script>
         <?php
      }

      // alert failure
      if (isset($_SESSION['error_message'])) {
         echo $_SESSION['error_message'];
      }

      

         //   HERE WE SHOW PRODUCTS BY CATEGORY ...ALSO ALLOWING ADMIN TO ADD ANEW PRODUCT
            include '../views/view_books.php';
    

            include('../partials/footer.php');

         

?>

