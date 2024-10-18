<?php
include '../config/constants.php';
include '../models/books.php';
if (isset($_POST['update_book'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $errors = [];

        // Check if book_id is set
        if (empty($_POST['isbn'])) {
            $errors[] = "Book ID is required for updating";
        } else {
            $isbn = $_POST['isbn'];
        }

        // Check if book_name is set
        if (empty($_POST['book_name'])) {
            $errors[] = "Please enter the book name";
        } else {
            $book_name = $_POST['book_name'];
        }

        // Check if book_desc is set
        if (empty($_POST['book_desc'])) {
            $errors[] = "Please enter the book description";
        } else {
            $book_desc = $_POST['book_desc'];
        }

      

        // Check if deck_number is set
        if (empty($_POST['decks'])) {
            $errors[] = "Please select a deck number";
        } else {
            $decks = $_POST['decks'];
        }

        // Check if isBorrowed is set
        if (!isset($_POST['isBorrowed'])) {
            $errors[] = "Please choose if the book is borrowed";
        } else {
            $isBorrowed = $_POST['isBorrowed'];
        }

        // Process the uploaded images ..no need 

        if (empty($errors)) {
            // Assuming you have a Book class with an updateBook method
            $book = new Books($conn);
            $isUpdated = $book->updateBook($isbn, $book_name, $book_desc, $decks, $isBorrowed,$conn);
            echo $isUpdated;
            if ($isUpdated) {
                // Redirect to a success page
                header('Location: ' . SITEURL . 'admin/');
                exit();
            } else {
                $errors[] = "Update failed. Please try again or contact tech support for assistance.";
            }
        }

        // Output any errors
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo "<p class='error'>$error</p>";
                var_dump($isUpdated);
            }
        }
    }
}
?>