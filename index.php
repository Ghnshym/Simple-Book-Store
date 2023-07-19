<?php
include 'db_connect.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';
$sql = "SELECT * FROM Books";
if (!empty($search)) {
    $sql .= " INNER JOIN authors ON books.author_id = authors.id
              WHERE books.title LIKE '%$search%'
              OR authors.name LIKE '%$search%'";
}

$result = $conn->query($sql);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Book List</title>
</head>
<body>
  <?php include 'nav.php'; ?>
    <div class="container my-3">
        <h3 class="text-center">Book List</h3>
        <form action="" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="search" value="<?php echo $search; ?>">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $bookId = $row['id'];
                    $title = $row['title'];
                    $authorId = $row['author_id'];
                    $price = $row['price'];
                    $yearPublished = $row['year_published'];
                    $isbn = $row['ISBN'];
                    $bookCover = $row['book_cover'];

                    $authorSql = "SELECT name FROM Authors WHERE id = $authorId";
                    $authorResult = $conn->query($authorSql);
                    $authorName = ($authorResult->num_rows > 0) ? $authorResult->fetch_assoc()['name'] : "Unknown";
                    ?>

                    <div class="col-md-4 my-2">
                        <div class="card" style="width: 18rem;">
                            <img src="https://source.unsplash.com/400x300/?<?php echo $title; ?>,microsoft" class="card-img-top" alt="Book Cover">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $title; ?></h5>
                                <p class="card-text">
                                    <strong>Author:</strong> <?php echo $authorName; ?><br>
                                    <strong>Price Rs:</strong> <?php echo $price; ?><br>
                                    <strong>Year Published:</strong> <?php echo $yearPublished; ?><br>
                                    <strong>ISBN:</strong> <?php echo $isbn; ?>
                                </p>
                                <a href="book_details.php?book_id=<?php echo $row['id']; ?>" class="btn btn-primary">More</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php
    } else {
        echo "<p class='text-center'>No books found</p>";
    }

    $conn->close();
    ?>
    </body>
    </html>