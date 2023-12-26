
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rusaith";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve form data
    $name = isset($_POST["name"]) ? $conn->real_escape_string($_POST["name"]) : "";
    $phoneNumber = isset($_POST["phoneNumber"]) ? $conn->real_escape_string($_POST["phoneNumber"]) : "";
    $email = isset($_POST["email"]) ? $conn->real_escape_string($_POST["email"]) : "";

    // Insert data into the database
    $sql = "INSERT INTO appointments (Name, Phone_Number, Email) VALUES (?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $phoneNumber, $email);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
} else {
    echo "Invalid request method";
}

// Close the database connection
$conn->close();
?>