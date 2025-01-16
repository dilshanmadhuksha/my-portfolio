<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data safely (sanitization)
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    // Check if email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!";
        exit;
    }

    // Email settings
    $to = "dilshanmadhuksha2449@gmail.com";
    $subject = "New Message from Contact Form";
    $body = "Name: $name\nEmail: $email\n\nMessage: $message";
    // Set additional headers
    $headers = "From: no-reply@yourdomain.com" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Use PHP's mail() function to send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you for your message! We'll get back to you soon.";
    } else {
        echo "Error: Unable to send email. Please try again later.";
    }
}
?>
