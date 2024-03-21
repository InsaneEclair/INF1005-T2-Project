<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$errorMsg = ""; // Initialize $errorMsg
$success = false; // Initialize $success

/*
* Helper function to authenticate the login.
*/
function authenticateUser()
{
    global $fname, $lname, $email, $pwd_hashed, $errorMsg, $success;
    // Assign POST data to variables
    $email = $_POST["email"];
    $password = $_POST["pwd"];
    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg = "Invalid email format";
        $success = false;
        return;
    }
    // Validate password
    if (empty($password)) {
        $errorMsg = "Password cannot be empty";
        $success = false;
        return;
    }
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
            $stmt = $conn->prepare("SELECT * FROM world_of_pets_members WHERE email=?");
            // Bind & execute the query statement:
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                // Note that email field is unique, so should only have
                // one row in the result set.
                $row = $result->fetch_assoc();
                $fname = $row["fname"];
                $lname = $row["lname"];
                $pwd_hashed = $row["password"];
                // Check if the password matches:
                if (!password_verify($password, $pwd_hashed)) {
                    // Don't be too specific with the error message - hackers don't
                    // need to know which one they got right or wrong. :)
                    $errorMsg = "Email not found or password doesn't match...";
                    $success = false;
                }else{
                    $success = true;}
            } else {
                $errorMsg = "Email not found or password doesn't match...";
                $success = false;
            }
            $stmt->close();
        }
        $conn->close();
    }
}
authenticateUser(); // Call the function
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    include "inc/nav.inc.php";
    include "inc/head.inc.php";
    ?>
    <h2>Login Result</h2>

    <?php
    if ($success) {
        echo "<div class='success'>";
        echo "<h4>Login successful!</h4>";
        echo "<p>Welcome back, " . $fname . " " . $lname . ".</p>";
        echo "<p><a href='index.php'>Go to homepage</a></p>";
        echo "</div>";
    } else {
        echo "<div class='error'>";
        echo "<h4>Login failed due to the following errors:</h4>";
        echo "<p>" . $errorMsg . "</p>";
        echo "<p><a href='login.php'>Go back to login page</a></p>";
        echo "</div>";
    }
    ?>
</body>
<?php
include "inc/footer.inc.php";
?>

</html>