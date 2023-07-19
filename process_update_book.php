<?php
include 'db_connect.php';

$bookId = $_POST['book_id'];
$title = $_POST['title'];
$authorId = $_POST['author_id'];
$price = $_POST['price'];
$yearPublished = $_POST['year_published'];
$isbn = $_POST['isbn'];
$bookCover = $_POST['book_cover'];

$sql = "UPDATE Books SET title='$title', author_id=$authorId, price=$price,
        year_published=$yearPublished, ISBN='$isbn', book_cover='$bookCover'
        WHERE id=$bookId";

if ($conn->query($sql) === TRUE) {
    echo "Book updated successfully";
    header('Location: fetch_book.php');
} else {
    echo "Error: " . $sql . "<br>" .$conn->error;
}

$conn->close();
?>
