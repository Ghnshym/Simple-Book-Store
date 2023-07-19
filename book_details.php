<?php
include 'db_connect.php';

if (isset($_GET['book_id'])) {
    $bookId = $_GET['book_id'];

$sql = "SELECT * FROM books WHERE id=$bookId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <?php include 'nav.php'; ?>
        <div class="container my-3">
            <h1><center>Book Details</center></h1>
            
            <table class="table">
                <thead>
                    <tr>
                        <th>Book ID</th>
                        <th>Book Title</th>
                        <th>Book Author</th>
                        <th>Book Price</th>
                        <th>Year Published</th>
                        <th>ISBN</th>
                        <th>Book Cover</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td>
                                <?php
                                $authorId = $row['author_id'];
                                $Sql = "SELECT name FROM Authors WHERE id = $authorId";
                                $Result = $conn->query($Sql);
                                $Name = ($Result->num_rows > 0) ? $Result->fetch_assoc()['name'] : "Unknown";
                                echo $Name;
                                ?>
                            </td>
                            <td><?php echo $row['price']; ?></td>
                            <td><?php echo $row['year_published']; ?></td>
                            <td><?php echo $row['ISBN']; ?></td>
                            <td><?php echo $row['book_cover']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        
        </div>
    </body>
    </html>
    <?php
} else {
    echo "No books found";
}
}
$conn->close();
?>
