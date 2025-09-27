<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name  = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);

    // Email recipients (2 people)
    $to  = "person1@example.com, person2@example.com"; 

    // Email subject
    $subject = "New Heart Check-up Registration";

    // Email body
    $message = "
    <h2>New Registration Received</h2>
    <p><strong>Name:</strong> {$name}</p>
    <p><strong>Email:</strong> {$email}</p>
    <p><strong>Phone:</strong> {$phone}</p>
    ";

    // Headers for HTML email
    $headers  = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: WIINS Hospitals <no-reply@wiinshospitals.com>\r\n";
    $headers .= "Reply-To: {$email}\r\n";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        // Redirect to thank you page
        header("Location: thank-you.html");
        exit();
    } else {
        echo "Error: Unable to send email. Please try again later.";
    }
} else {
    echo "Invalid Request.";
}
?>
