<?php
// File: controllers/view_books.php

require_once 'models/Books.php';

class ViewBooksController {
    private $books;

    public function __construct($conn) {
        $this->books = new Books($conn);
    }

    public function index() {
        $availableBooks = $this->books->getAllBooks();
        $bookCards = $this->generateBookCards($availableBooks);

        // Load the main view
        include 'views/book_list.php';
    }

    private function generateBookCards($books) {
        $bookCards = '';
        foreach ($books as $book) {
            $bookImage = 'assets\books\ ' . htmlspecialchars($book['book_url']);
            // $bookImage = 'assets/books/' . str_replace('\\', '/', htmlspecialchars($book['book_url']));
            $bookName = htmlspecialchars($book['book_name']);
            $bookDesc = htmlspecialchars($book['book_description']);
            $bookId = htmlspecialchars($book['isbn']);
            $isBorrowed = $book['isBorrowed'] === 'yes';

            // Load and process the book card template
            $cardTemplate = file_get_contents('views/book_card.html');
            $cardHtml = str_replace(
                ['{{book_image}}', '{{book_name}}', '{{book_description}}', '{{book_id}}'],
                [$bookImage, $bookName, $bookDesc, $bookId],
                $cardTemplate
            );

            // Handle the borrowed status
            if ($isBorrowed) {
                $cardHtml = preg_replace('/{{#if is_borrowed}}(.*?){{else}}.*?{{\/if}}/s', '$1', $cardHtml);
            } else {
                $cardHtml = preg_replace('/{{#if is_borrowed}}.*?{{else}}(.*?){{\/if}}/s', '$1', $cardHtml);
            }

            $bookCards .= $cardHtml;
        }

        return $bookCards;
    }
}


?>