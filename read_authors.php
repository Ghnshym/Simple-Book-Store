<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Author</title>
  </head>
  <body>
    <?php include 'nav.php'; ?>
    <div class="container">
        <h4>Author List </h4>
        <p> If your name is not Here than please add <b style='color:red;'>Author</b> first and Get your <b style='color:red;'>ID</b></p><a href = 'create_author.php' class='btn btn-primary btn-sm'>Add Author </a>
    </div>

   <div class="container">
   <?php
include 'db_connect.php';

$sql = "SELECT * FROM Authors";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table'>
            <tr>
                <th>Your Author Id <br> (Now you can publish book with Author id)</th>
                <th>Author Name</th>
                <th>Action</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['name']."</td>
                <td><a href='create_book.php' class='btn btn-primary' role='button'>Add Book</a></td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "No authors found";
}

$conn->close();
?>

   </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>
