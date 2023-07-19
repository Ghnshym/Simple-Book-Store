<?php
include 'db_connect.php';

if (isset($_GET['book_id'])) {
    $bookId = $_GET['book_id'];
$sql = "DELETE FROM books WHERE id=$bookId";

if ($conn->query($sql) === TRUE) {
    echo "Book deleted successfully for Book list";
    header("Location: fetch_book.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}
$conn->close();
?>
