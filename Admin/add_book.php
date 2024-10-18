<?php
include '../models/books.php';
include '../config/constants.php';
if (isset($_POST['add_prod'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $errors = [];

        // Check if prod_name is set
        if (empty($_POST['book_name'])) {
            $errors[] = "Please enter the book name";
        } else {
            $book_name = $_POST['book_name'];
            echo "$book_name";
        }

        // Check if prod_desc is set
        if (empty($_POST['book_desc'])) {
            $errors[] = "Please enter the book description";
        } else {
            $book_desc = $_POST['book_desc'];
            echo "$book_desc";
        }

        // Check if old_price is set
        if (empty($_POST['isbn'])) {
            $errors[] = "Please enter the isbn";
        } else {
            $isbn = $_POST['isbn'];
            echo "$isbn";
        }

        

        // Check if cat_id is set
        if (empty($_POST['deck_number'])) {
            $errors[] = "Please select a deck number";
        } else {
            $decks = $_POST['deck_number'];
            echo $decks;
        }

        // Check if active and featured are set
        if (empty($_POST['isBorrowed'])) {
            $errors[] = "Please choose if the book is borrowed";
        } else {
            $isBorrowed = $_POST['isBorrowed'];
            echo $isBorrowed;
        }
$image = "";
        // Process the uploaded images
      // Process the uploaded image
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $imageName = $_FILES['image']['name'];
    $imageTmpName = $_FILES['image']['tmp_name'];
    $destinationPath = UPLOAD_DIR . $imageName;
    // var_dump($destinationPath);

    // Upload the image
    if (move_uploaded_file($imageTmpName, $destinationPath)) {
        $image = $imageName;
        echo $imageName;
    } else {
        $errors[] = "Failed to upload image: $imageName";
        // print_r($errors);
    }
}

    

            // $new_book = new books($conn);
            // $isAdded = $new_book->create($isbn, $book_name, $book_desc, $image, $decks, $isBorrowed);
            $sql = "INSERT INTO `books` (`isbn`, `book_name`, `book_description`, `book_url`, `decks`, `isBorrowed`)
                                 VALUES ('$isbn', '$book_name', '$book_desc', '$image', '$decks', '$isBorrowed')";

            $isAdded = mysqli_query($conn,$sql);
      
            var_dump($isAdded);
            if ($isAdded == true) {
                // Redirect to a success page
                header('Location: ' . SITEURL . 'admin/');
                exit();
            } else {
                var_dump($isAdded);
                $errors[] = "Update failed. Please contact tech support for assistance.";
                header('Location: ' . SITEURL . 'admin/');
                exit();
            }
        

        // Output any errors
        if (!empty($errors)) {
            print_r($errors);
        }
    }
}elseif ($_POST['update_book']) {
    # code...
}

?>