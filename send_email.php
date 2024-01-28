<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $state = $_POST["state"];
  $company = $_POST["company"];
  $product = $_POST["product"];
  $message = $_POST["message"];
  
  // Validate fields
  if (empty($name) || empty($email) || empty($phone)) {
    echo "Please fill in all the required fields.";
    exit;
  }
  
  // Validate email format
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Please enter a valid email address.";
    exit;
  }
  
  // Prepare email content
  $to = "raiji0211@gmail.com"; // Replace with your email address
  $subject = "New Contact Form Submission";
  $body = "Name: " . $name . "\n\n";
  $body .= "Email: " . $email . "\n\n";
  $body .= "Phone Number: " . $phone . "\n\n";
  $body .= "State: " . $state . "\n\n";
  $body .= "Company Name: " . $company . "\n\n";
  $body .= "Product Name: " . $product . "\n\n";
  $body .= "Message: " . $message;
  
  $headers = "From: " . $email;
  
  // Send email
  if (mail($to, $subject, $body, $headers)) {
    $_SESSION["success_message"] = "Thank you for your message. We will contact you shortly.";
  } else {
    $_SESSION["error_message"] = "Sorry, there was an error sending your message. Please try again later.";
  }
  
  // Redirect back to the form page
  header("Location: thankyou.html");
  exit;
}
?>


