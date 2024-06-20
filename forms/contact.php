<php
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $to = 'aeroastro_vzg@gitam.in';
  $name = htmlspecialchars($_POST["name"]);
  $from = htmlspecialchars($_POST["email"]);
  $subject = htmlspecialchars($_POST["subject"]);
  $message = htmlspecialchars($_POST["message"]);
  $sent = False;

  if(empty($from)) {
    $email_err = "Email is required"
  }
  if(empty($name)) {
    $name_err = "Name is required"
  }
  if(empty($from)) {
    $subject_err = "Subject is required"
  }
  if(empty($from)) {
    $message_err = "Message is required"
  }

  if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
    $name_err = "Only letters and white space allowed";
  }
  if(!filter_val($email, FILTER_VALIDATE_EMAIL)) {
    $email_err = "Invalid email format";
  }
  if (!preg_match("/^[a-zA-Z-' ]*$/",$subject)) {
    $subject_err = "Only letters and white space allowed";
  }

  if(empty($name_err) and empty($email_err) and empty($subject_err) and empty($message_err)) {
    $headers = "From: $from" . "\r\n" . "CC: parthiv.sk.pedapati@gmail.com";

    mail($to, $subject, $message, $headers);
    $sent = True;
  }
}
?>