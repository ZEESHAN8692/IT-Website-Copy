<?php
// Establish a database connection (modify these parameters with your database credentials)
$host = "localhost";
$username = "u226615051_cadtabs";
$password = "Civilengineer@1";
$dbname = "u226615051_cadtabs";

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $name = $conn->real_escape_string($_POST['name']);
    $fatherName = $conn->real_escape_string($_POST['fatherName']);
    $education = $conn->real_escape_string($_POST['education']);
    $address = $conn->real_escape_string($_POST['address']);
    $mobile = $conn->real_escape_string($_POST['mobile']);
    $email = $conn->real_escape_string($_POST['email']);
    $courseName = $conn->real_escape_string($_POST['courseName']);
    $dob = $conn->real_escape_string($_POST['dob']);

    // SQL query to insert data into the table
    $sql = "INSERT INTO demo_class (name, fatherName, education, address, mobile, email, courseName, dob) VALUES ('$name', '$fatherName', '$education', '$address', '$mobile', '$email', '$courseName', '$dob')";

    if ($conn->query($sql) === TRUE) {
        echo "Demo Class Form Submit Successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
