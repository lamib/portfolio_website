<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    // Email recipient
    $to = 'rupeshbabu240@gmail.com';
    // Email subject
    $email_subject = "New message from $name: $subject";
    // Email body
    $email_body = "You have received a new message from the contact form on your website.\n\n" .
                  "Here are the details:\n\n" .
                  "Name: $name\n\n" .
                  "Email: $email\n\n" .
                  "Subject: $subject\n\n" .
                  "Message:\n$message\n";

    // Email headers
    $headers = "From: $email\n";
    $headers .= "Reply-To: $email";

    // Send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        // Redirect to a thank-you page or display a success message
        echo "Message sent successfully!";
    } else {
        // Display an error message
        echo "Failed to send the message. Please try again later.";
    }
}
?>
