<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Function to sanitize and validate data
    function sanitizeInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Sanitize and validate form data
    $name = sanitizeInput($_POST["name"]);
    $registrationNumber = sanitizeInput($_POST["registrationNumber"]);
    $fatherName = sanitizeInput($_POST["fatherName"]);
    $address = sanitizeInput($_POST["address"]);
    $mobile = sanitizeInput($_POST["mobile"]);
    $email = sanitizeInput($_POST["email"]);
    $courseName = sanitizeInput($_POST["courseName"]);
    $dob = sanitizeInput($_POST["dob"]);
    $suggestion = sanitizeInput($_POST["message"]);

    // File upload handling (you may need to adjust this based on your server setup)
    $targetDirectory = "uploads/";
    $passportPhoto = $targetDirectory . basename($_FILES["passportPhoto"]["name"]);
    $document = $targetDirectory . basename($_FILES["document"]["name"]);

    // Move uploaded files to the target directory
    move_uploaded_file($_FILES["passportPhoto"]["tmp_name"], $passportPhoto);
    move_uploaded_file($_FILES["document"]["tmp_name"], $document);

    // Your database credentials
    $servername = "your_database_server";
    $username = "your_database_username";
    $password = "your_database_password";
    $dbname = "your_database_name";

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("INSERT INTO certificate_applications 
        (name, registration_number, father_name, address, mobile, email, 
        passport_photo, document, course_name, dob, suggestion) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssss", $name, $registrationNumber, $fatherName, $address, $mobile, $email,
                      $passportPhoto, $document, $courseName, $dob, $suggestion);
    $stmt->execute();

    // Close the database connection
    $stmt->close();
    $conn->close();

    echo "Application submitted successfully!";
}
?>
