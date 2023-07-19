<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
include 'db_connect.php';

$authorName = $_POST['author_name'];
$sql = "INSERT INTO Authors (name) VALUES ('$authorName')";

if ($conn->query($sql) === TRUE) {
    echo "Author created successfully";
    header("Location: read_authors.php");
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

    <title>Hello, world!</title>
  </head>
  <body>
    <?php include 'nav.php'; ?>
    <div class="container">
        <h5 class="my-3">Add Author Name to Get Author ID </h5>
    </div>

   <div class="container">
   <form method="POST" action="">
  <div class="mb-3">
    <label  class="form-label">Author Name</label>
    <input type="text" class="form-control" name="author_name" >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
   </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>