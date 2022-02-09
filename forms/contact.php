<?php
  
  
  $receiving_email_address = "sedric.24cs@licet.ac.in";

  // define variables and set to empty values
  $nameErr = $emailErr = $subeErr = $Err = "";
  $name = $email = $sub = $message = $headers = "";

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } else {
      $name = test_input($_POST["name"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        $nameErr = "Only letters and white space allowed";
      }
    }
  
    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
    }
  
    if (empty($_POST["subject"])) {
      $sub = "";
    } else {
      $sub = test_input($_POST["subject"]);
      // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
      if (!preg_match("/^[a-zA-Z-' ]*$\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/",$sub)) {
        $subeErr = "Invalid URL";
      }
    }
  
    if (empty($_POST["message"])) {
      $message = "";
    } else {
      $message = test_input($_POST["message"]);
    }
  }

  // Email sending 

  ini_set("SMTP","localhost");
  ini_set("smtp_port","465");
  ini_set("sendmail_from",$email);
  ini_set("sendmail_path", "C:\\xampp\sendmail\sendmail.exe -t -i");

 
    $to = $receiving_email_address;
    $subject = $sub;
    $txt = $message;
    $headers = "From: ".$email. "\r\n" ;


    mail($to,$subject,$txt,$headers);

 
?>
