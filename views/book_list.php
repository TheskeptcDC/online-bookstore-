<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knowledge Haven</title>
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
    </style>
</head>
<body>
    <?php
        include 'partials/menu.php';
    ?>


    <div class="container">
        <div class="book-list">
            <?php echo $bookCards; ?>
            
        </div>
    </div>
</body>
</html>