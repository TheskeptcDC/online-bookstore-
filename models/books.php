<?php

class Books {
    private $conn;

    public function __construct($db_connection) {
        $this->conn = $db_connection;

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function __destruct() {
        // $this->conn->close();
    }

    public function create($isbn, $book_name, $book_description, $book_url, $decks, $isBorrowed) {
        $db_connection = $this->conn;
        // $sql = "INSERT INTO `books` (`isbn`, `book_name`, `book_description`, `book_url`, `decks`, `isBorrowed`) VALUES ('234567', 'test from code', 'dgfhgjh', 'asdfg', '14', 'no')";
        $sql = "INSERT INTO `books` (`isbn`, `book_name`, `book_description`, `book_url`, `decks`, `isBorrowed`) VALUES ('$isbn', '$book_name', '$book_description', '$book_url', '$decks', '$isBorrowed')";
        $res = mysqli_query($db_connection,$sql);

        if ($res) {
            return true;
        
    }else {
        return false;
    }
}

    public function read($isbn = null) {
        if ($isbn === null) {
            $result = $this->conn->query("SELECT * FROM books");
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            $stmt = $this->conn->prepare("SELECT * FROM books WHERE isbn = ?");
            $stmt->bind_param("i", $isbn);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_assoc();
        }
    }

        public function updateBook($isbn, $book_name, $book_desc,$decks, $isBorrowed,$conn) {
            $sql = "UPDATE `books` SET 
            `book_name` = '$book_name', 
            `book_description` = '$book_desc',  
            `decks` = '$decks', 
            `isBorrowed` = '$isBorrowed' WHERE  `isbn` = '$isbn'";

            $result = mysqli_query($conn,$sql);
    
           
    
            return $result;
        }

    public function delete($isbn) {
        $stmt = $this->conn->prepare("DELETE FROM books WHERE isbn = ?");
        $stmt->bind_param("i", $isbn);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function searchByName($book_name) {
        $stmt = $this->conn->prepare("SELECT * FROM books WHERE book_name LIKE ?");
        $search_term = "%" . $book_name . "%";
        $stmt->bind_param("s", $search_term);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAvailableBooks() {
        $query = "SELECT * FROM books WHERE isBorrowed = 'no'";
        $result = $this->conn->query($query);

        if ($result === false) {
            // Query failed, let's get more information
            error_log("MySQL Error: " . $this->conn->error);
            throw new Exception("Database query failed: " . $this->conn->error);
        }

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // for all the books borrowd or not 
    public function getAllBooks() {
        $query = "SELECT * FROM books ";
        $result = $this->conn->query($query);

        if ($result === false) {
            // Query failed, let's get more information
            error_log("MySQL Error: " . $this->conn->error);
            throw new Exception("Database query failed: " . $this->conn->error);
        }
        return $result;
    }

    // lets get det decks 
    public function getDecks() {
        $query = "SELECT * FROM decks ";
        $result = $this->conn->query($query);

        if ($result === false) {
            // Query failed, let's get more information
            error_log("MySQL Error: " . $this->conn->error);
            throw new Exception("Database query failed: " . $this->conn->error);
        }
        return $result;
    }
// for the books per deck
public function selectFromDeck($deck_number) {
    $query= "SELECT * FROM books WHERE decks = '$deck_number'";
    $result = $this->conn->query($query);
    return $result;
}
    

    public function returnBook($isbn) {
        $stmt = $this->conn->prepare("UPDATE books SET isBorrowed = 0 WHERE isbn = ?");
        $stmt->bind_param("i", $isbn);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function getBookById($book_id,$conn) {
        $query = "SELECT * FROM books WHERE isbn = $book_id";
        $res = mysqli_query($conn,$query);
        // $book = mysqli_fetch_assoc($res);
        return $res;
    }

    public function borrowBook($book_id,$conn) {
            // Update the book status
            $sql = "UPDATE `books` SET `isBorrowed` = 'yes' WHERE `books`.`isbn` = `$book_id`";
            $res = mysqli_query($conn,$sql);
            return $res;
       
}
}
?>