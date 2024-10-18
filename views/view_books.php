
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

<style>
        body{
        background-image:url("lib-img.jpeg"); 
        background-repeat: no-repeat;
      
      }      
</style>
<div class="container">
<h5>
        <i>
        <a href="../" class="btn btn-primary">student view</a>
        </i>
    </h5>
</div>
<div class="container table-responsive mt-4">
    <table class="table table-bordered table-striped">
        <?php
        // Fetch the data for the decks
        $deck = new books($conn);
        $res = $deck->getDecks($conn);

        if ($res && mysqli_num_rows($res) > 0) {
            while ($rows = mysqli_fetch_assoc($res)) {
                $deck = $rows['deck_name'];
                $deck_number = $rows['deck_id'];
                $cat_desc = $rows['deck_desc'];
        ?>
                <tr class="bg-light">
                    <th>Deck ID</th>
                    <th>Book Name</th>
                    <th>ISBN</th>
                    <th>Description</th>
                    <th>Availability</th>
                    <th>Actions</th>
                </tr>
                <tr>
                    <td><?php echo $deck_number; ?></td>
                    <td colspan="5">
                        <form action="add_book.php" method="post" enctype="multipart/form-data" class="form-inline">
                            <div class="form-group">
                                <input type="text" name="book_name" class="form-control" placeholder="New Book" required>
                            </div>
                            <div class="form-group ml-2">
                                <input type="text" name="isbn" class="form-control" placeholder="ISBN">
                            </div>
                            <div class="form-group ml-2">
                                <textarea name="book_desc" class="form-control" placeholder="Description"></textarea>
                            </div>
                            <div class="form-group ml-2">
                                <label class="mr-2"></label>
                                <input type="radio" name="isBorrowed" value="yes" class="form-check-input"> Available
                                <input type="radio" name="isBorrowed" value="no" class="form-check-input" required> borrowed
                            </div>
                            <div class="form-group ml-2">
                                <input type="hidden" name="deck_number" value="<?php echo $deck_number; ?>">
                                <input type="file" name="image" class="form-control-file">
                            </div>
                            <div class="form-group ml-2">
                                <input type="submit" name="add_prod" value="Add" class="btn btn-primary">
                            </div>
                        </form>
                    </td>
                </tr>

                <!-- Books for this deck -->
                <tr class="bg-secondary text-white">
                    <th>Book</th>
                    <th>ISBN</th>
                    <th>Deck</th>
                    <th>Description</th>
                    <th>Availability</th>
                    <th>Actions</th>
                </tr>

                <?php
                // Retrieve books in the current deck
                $view_books = new books($conn);
                $get_prod_res = $view_books->selectFromDeck($deck_number);
                if ($get_prod_res && mysqli_num_rows($get_prod_res) > 0) {
                    while ($prod_rows = mysqli_fetch_assoc($get_prod_res)) {
                        $book_name = $prod_rows['book_name'];
                        $book_desc = $prod_rows['book_description'];
                        $book_url = $prod_rows['book_url'];
                        $decks = $prod_rows['decks'];
                        $isbn = $prod_rows['isbn'];
                        $isBorrowed = $prod_rows['isBorrowed'];
                ?>
                        <tr>
                            <form action="update_book.php" method="post" enctype="multipart/form-data">
                                <td><input type="text" name="book_name" class="form-control" value="<?php echo $book_name; ?>"></td>
                                <td><input type="text" name="isbn" class="form-control" value="<?php echo $isbn; ?>"></td>
                                <td>
                                    <input type="number" name="decks" value="<?php echo $deck_number; ?>">
                                </td>
                                <td><textarea name="book_desc" class="form-control"><?php echo $book_desc; ?></textarea></td>
                                <td>
                                    <input type="radio" name="isBorrowed" value="yes" <?php if ($isBorrowed == 'yes') echo "checked"; ?>> Available
                                    <input type="radio" name="isBorrowed" value="no" <?php if ($isBorrowed == 'no') echo "checked"; ?>> Not Available
                                </td>
                        
                                <td>
                                    <img src="<?php echo $prod_image; ?>" alt="book cover" class="img-thumbnail" width="50">
                                    <input type="file" name="image" class="form-control-file" >
                                    <input type="submit" name="update_book" class="btn btn-success mt-2" value="Update">
                                    <a href="./index.php?del_id=<?= $isbn ?>" class="btn btn-danger mt-2">Delete</a>
                                </td>
                            </form>
                        </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>No books in this deck</td></tr>";
                }
                ?>

        <?php
            }
        }
        ?>
    </table>
</div>

<?php
// Handle book deletion
if (isset($_GET['del_id'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $isbn = $_GET['del_id'];
        $prod_to_delete = new books($conn);
        $isDeleted = $prod_to_delete->delete($isbn);
        if ($isDeleted) {
            echo "Deleting...$isbn";
        }
    } else {
        echo "Request error";
    }
}
?>
