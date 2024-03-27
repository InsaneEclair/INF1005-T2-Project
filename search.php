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

// added by nic : this is basically modified from process_login
// Create database connection.
    $config = parse_ini_file('/var/www/private/db-config.ini');
    if (!$config) {
        $errorMsg = "Failed to read database config file.";
        $success = false;
    } else {
        $conn = new mysqli(
            $config['servername'],
            $config['username'],
            $config['password'],
            $config['dbname']
        );
        // Check connection
        if ($conn->connect_error) {
            $errorMsg = "Connection failed: " . $conn->connect_error;
            $success = false;
        } else {
            // Prepare the statement:
            //$stmt = $conn->prepare("SELECT * FROM world_of_pets_members WHERE email=?");
            $stmt = $conn->prepare("SELECT * FROM fish WHERE fish_name LIKE \"%$?%\"");
            // Bind & execute the query statement:
            $stmt->bind_param("s", $searchTerm);
            $stmt->execute();
            $result = $stmt->get_result();

            //for this part, since search result can have more than one i guess you can do a for loop? 
            //it kinda depends on what you're planning on doing with the data ?
            //so i dont really know what do do about it 

            if ($result->num_rows > 0) {
                // Note that email field is unique, so should only have
                // one row in the result set.
                $row = $result->fetch_assoc();
                $fishname = $row["fish_name"];
                $fishprice = $row["fish_price"];
                $fish_description = $row["fish_description"];
                
            } else {
                $errorMsg = "Fish not found or Fish doesn't match...";
                $success = false;
            }
            $stmt->close();
        }
        $conn->close();
    }
    
    ?>