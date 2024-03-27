<?php
// Connect to database
$host = "localhost"; 
$username = "inf1005-sqldev"; 
$password = "!Nf100%"; 
$database = "world_of_pets"; 

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the search term from the URL
$searchTerm = isset($_GET['query']) ? $conn->real_escape_string($_GET['query']) : '';

// Your search query
$sql = "SELECT * FROM fish WHERE fish_name LIKE '%$searchTerm%'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. "<br>";
    }
} else {
    echo "0 results found";
}
$conn->close();
?>