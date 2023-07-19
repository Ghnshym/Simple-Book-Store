<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
include 'db_connect.php';

// Retrieve form data
$title = $_POST['title'];
$authorId = $_POST['author_id'];
$price = $_POST['price'];
$yearPublished = $_POST['year_published'];
$isbn = $_POST['isbn'];
$bookCover = $_POST['book_cover'];

// Prepare and execute the SQL query
$sql = "INSERT INTO books (title, author_id, price, year_published, ISBN, book_cover)
        VALUES ('$title', $authorId, $price, $yearPublished, '$isbn', '$bookCover')";

if ($conn->query($sql) === TRUE) {
    echo "Book created successfully";
    header("Location: fetch_book.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Add Book</title>
  </head>
  <body>
    <?php include 'nav.php'; ?>
    <div class="container">
        <h4>Add Book </h4>
        <p>if you have not <b>Author id</b> than please first get Author id <a href="./create_author.php" class="btn btn-primary btn-sm">Get Author ID</a></p>
    </div>

   <div class="container">
   <form action="" method="POST">
  <div class="mb-3">
    <label  class="form-label">Book Title<b style="color:red;">*</b></label>
    <input type="text" class="form-control" name="title" required>
  </div>
  <div class="mb-3">
    <label  class="form-label">Author Id<b style="color:red;">*</b></label>
    <input type="number" class="form-control" name="author_id" placeholder="Please Use Author Id " required>
  </div>
  <div class="mb-3">
    <label  class="form-label">Book Price<b style="color:red;">*</b></label>
    <input type="number" class="form-control" name="price" required>
  </div>
  <div class="mb-3">
    <label  class="form-label">Publish Year<b style="color:red;">*</b></label>
    <input type="number" class="form-control" name="year_published" required>
  </div>
  <div class="mb-3">
    <label  class="form-label">Book ISBN<b style="color:red;">*</b></label>
    <input type="text" class="form-control" name="isbn" required>
  </div>
  <div class="mb-3">
    <label  class="form-label">Book Cover<b style="color:red;">*</b></label>
    <input type="text" class="form-control" name="book_cover" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
   </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>