<?php
include 'db_connect.php';

// Check if book_id is provided via GET
if (isset($_GET['book_id'])) {
    $bookId = $_GET['book_id'];

    $sql = "SELECT * FROM Books WHERE id = $bookId";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $book = $result->fetch_assoc();
    } else {
        echo "Book not found.";
        exit;
    }
} else {
    echo "Book ID not provided.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Book</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Update Book</h1>
        <form action="process_update_book.php" method="POST">
            <input type="hidden" name="book_id" value="<?php echo $book['id']; ?>">

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $book['title']; ?>">
            </div>

            <div class="form-group">
                <label for="author_id">Author ID</label>
                <input type="number" class="form-control" id="author_id" name="author_id" value="<?php echo $book['author_id']; ?>">
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?php echo $book['price']; ?>">
            </div>

            <div class="form-group">
                <label for="year_published">Year Published</label>
                <input type="number" class="form-control" id="year_published" name="year_published" value="<?php echo $book['year_published']; ?>">
            </div>

            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" class="form-control" id="isbn" name="isbn" value="<?php echo $book['ISBN']; ?>">
            </div>

            <div class="form-group">
                <label for="book_cover">Book Cover</label>
                <input type="text" class="form-control" id="book_cover" name="book_cover" value="<?php echo $book['book_cover']; ?>">
            </div>

            <button type="submit" class="btn btn-primary">Update Book</button>
        </form>
    </div>
</body>
</html>
