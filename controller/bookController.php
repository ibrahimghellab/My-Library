<?php 

require_once(__DIR__."/../model/book.php");

class Controller{
    public static function displayBooks(){
        $books = Book::getAll();
        $line=array();

        foreach($books as $book){
            array_push($line, $book->display);
        }
        require_once(__DIR__."/../view/nav.php");
        require_once(__DIR__."/../view/books.php");
        require_once(__DIR__."/../view/footer.php");
    }

    public static function displayBook($id){
        $book = Book::getBookById($id);
        require_once(__DIR__."/../view/book.php");
    }
}