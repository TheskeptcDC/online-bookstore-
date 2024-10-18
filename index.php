<?php
include './config/login_check.php';
require_once './controllers/view_books.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knowledge Haven</title>
    </style>
   <!-- Bootstrap 5 CSS CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap 5 JS with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background-color: #f6f4fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .header {
            margin-top: 50px;
            text-align: center;
        }

        .header h1 {
            color: #5a67d8;
            font-weight: bold;
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 1.1rem;
            color: #718096;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .book-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .book-item {
            width: 30%;
            margin-bottom: 20px;
        }
        .message {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .success {
            background-color: #c6f6d5;
            color: #2f855a;
        }
        .error {
            background-color: #fed7d7;
            color: #c53030;
        }
    </style>
</head>
    <div class="container">
        <?php
        if (isset($_SESSION['success_message'])) {
            echo '<div class="message success">' . htmlspecialchars($_SESSION['success_message']) . '</div>';
            unset($_SESSION['success_message']);
        }
        if (isset($_SESSION['error_message'])) {
            echo '<div class="message error">' . htmlspecialchars($_SESSION['error_message']) . '</div>';
            unset($_SESSION['error_message']);
        }
        ?>
        <div class="book-list">
            <?php// echo $bookCards; ?>
            
        </div>
       
    </div>
<?php
$viewBooksController = new ViewBooksController($conn);
$viewBooksController->index();
?>
    
</body>
</html>
<?php




?>