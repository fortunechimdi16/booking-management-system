<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $to = "fortunechimdi16@gmail.com";
    $subject = "New Contact Form Submission from $name";
    $body = "You have received a new message from the contact form.\n\n" .
            "Name: $name\n" .
            "Email: $email\n\n" .
            "Message:\n$message";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        header("Location: contact.php?success=1");
        exit();
    } else {
        echo "❌ Sorry, there was an error sending your message. Please try again later.";
    }
} else {
    header("Location: contact.php");
    exit();
}
?>
