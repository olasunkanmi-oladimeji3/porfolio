<?php
  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'olasunkanmi.oladimeji321@gmail.com';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $email_body = "From: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Message:\n$message\n";

    if (mail($receiving_email_address, $subject, $email_body, $headers)) {
      echo "Your message has been sent. Thank you!";
    } else {
      echo "Failed to send your message. Please try again later.";
    }
  } else {
    http_response_code(405);
    echo "Method Not Allowed";
  }
?>