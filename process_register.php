<?php
$lastName = $email = $password = $confirmPassword = $errorMsg = "";
$success = true;

// Validate first name
if (empty($_POST["fname"])) {
    $errorMsg .= "First name is required.<br>";
    $success = false;
} else {
    $firstName = sanitize_input($_POST["fname"]);
}

// Validate last name
if (empty($_POST["lname"])) {
    $errorMsg .= "Last name is required.<br>";
    $success = false;
} else {
    $lastName = sanitize_input($_POST["lname"]);
}

// Validate email
if (empty($_POST["email"])) {
    $errorMsg .= "Email is required.<br>";
    $success = false;
} else {
    $email = sanitize_input($_POST["email"]);
    // Additional check to make sure e-mail address is well-formed.
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg .= "Invalid email format.<br>";
        $success = false;
    }
}

// Validate password
if (empty($_POST["pwd"])) {
    $errorMsg .= "Password is required.<br>";
    $success = false;
} else {
    $password = $_POST["pwd"];
}

// Validate confirm password
if (empty($_POST["pwd_confirm"])) {
    $errorMsg .= "Confirm password is required.<br>";
    $success = false;
} else {
    $confirmPassword = $_POST["pwd_confirm"];
    // Check if password and confirm password match
    if ($password !== $confirmPassword) {
        $errorMsg .= "Passwords do not match.<br>";
        $success = false;
    } else {
        // Hash the password
        $password = password_hash($password, PASSWORD_DEFAULT);
    }
}

function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/*
* Helper function to write the member data to the database.
*/
function saveMemberToDB()
{
    global $firstName, $lastName, $email, $password, $errorMsg, $success;
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
            $stmt = $conn->prepare("INSERT INTO world_of_pets_members
            (fname, lname, email, password) VALUES (?, ?, ?, ?)");
            // Bind & execute the query statement:
            $stmt->bind_param("ssss", $firstName, $lastName, $email, $password);
            if (!$stmt->execute()) {
                $errorMsg = "Execute failed: (" . $stmt->errno . ") " .
                    $stmt->error;
                $success = false;
            }
            $stmt->close();
        }
        $conn->close();
    }
}

// Call saveMemberToDB() only if all form data has been successfully validated and sanitized
if ($success) {
    saveMemberToDB();
}
?>

<!-- Rest of the HTML code remains the same -->

<!DOCTYPE html>
<html>

<head>
    <title>Registration</title>
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
    <h2>Registration Result</h2>

    <?php
    if ($success) {
        echo "<div class='success'>";
        echo "<h4>Registration successful!</h4>";
        echo "<p>Thank you, " . $lastName . ". You have successfully registered with the email: " . $email . "</p>";
        echo "<p><a href='index.php'>Go back to homepage</a></p>";
        echo "</div>";
    } else {
        echo "<div class='error'>";
        echo "<h4>Registration failed due to the following errors:</h4>";
        echo "<p>" . $errorMsg . "</p>";
        echo "<p><a href='register.php'>Go back to registration page</a></p>";
        echo "</div>";
    }
    ?>
</body>
<?php
include "inc/footer.inc.php";
?>

</html>