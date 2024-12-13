
<?php
// Database connection details
$host = "localhost";
$username = "u226615051_cadtabs";
$password = "Civilengineer@1";
$dbname = "u226615051_cadtabs";

// Email notification details
$recipient_email = "sonuhemantt@gmail.com"; // Update with your email address
$subject = "New Form Submission";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $name = $conn->real_escape_string($_POST['name']);
    $mobile = $conn->real_escape_string($_POST['mobile']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    // SQL query to insert data into the database
    $sql = "INSERT INTO contact_form (name, mobile, email, message) VALUES ('$name', '$mobile', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        // Send email notification
        $email_message = "New Form Submission\n\nName: $name\nMobile: $mobile\nEmail: $email\nMessage: $message";
        mail($recipient_email, $subject, $email_message);

        echo "Form submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
