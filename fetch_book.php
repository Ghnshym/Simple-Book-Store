<?php
include 'db_connect.php';

$sql = "SELECT * FROM Books";
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
        <div class="container-fluid my-3">
            <h1>Book List</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Price</th>
                        <th>Year Published</th>
                        <th>ISBN</th>
                        <th>Book Cover</th>
                        <th>Actions</th>
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
                            <td>
                                <a href="update_book.php?book_id=<?php echo $row['id']; ?>" class="btn btn-primary">Update</a>
                                <a href="delete_book.php?book_id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                            </td>
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

$conn->close();
?>
