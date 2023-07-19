<!-- Run single Time  -->
<?php
// Replace these variables with your MySQL server credentials
$hostname = 'localhost';
$username = 'root';
$password = '';

// Connect to MySQL server
$connection = new mysqli($hostname, $username, $password);

// Check for connection errors
if ($connection->connect_error) {
    die('Connection failed: ' . $connection->connect_error);
}

// Create the database
$databaseName = 'online_bookstore';
$createDatabaseQuery = "CREATE DATABASE IF NOT EXISTS $databaseName";

if ($connection->query($createDatabaseQuery) === TRUE) {
    echo "Database created successfully.\n";
} else {
    echo "Error creating database: " . $connection->error . "\n";
}

// Select the database
$connection->select_db($databaseName);

// Create the 'authors' table
$createAuthorsTableQuery = "
CREATE TABLE IF NOT EXISTS authors (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50)
)";

if ($connection->query($createAuthorsTableQuery) === TRUE) {
    echo "Table 'authors' created successfully.\n";
} else {
    echo "Error creating table 'authors': " . $connection->error . "\n";
}

// Create the 'books' table
$createBooksTableQuery = "
CREATE TABLE IF NOT EXISTS books (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(50),
    author_id INT(11),
    price DECIMAL(10, 2),
    year_published INT(4),
    ISBN VARCHAR(15),
    book_cover VARCHAR(255),
    FOREIGN KEY (author_id) REFERENCES authors(id)
)";

if ($connection->query($createBooksTableQuery) === TRUE) {
    echo "Table 'books' created successfully.\n";
} else {
    echo "Error creating table 'books': " . $connection->error . "\n";
}

// Close the connection
$connection->close();
?>
