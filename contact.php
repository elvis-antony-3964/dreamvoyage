<?php 
// if "email" variable is filled out, send email
if (isset($_REQUEST['email'])) {

//Email information
$to = "bookdreamvoyage@gmail.com";
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$subject = $_REQUEST['subject'];
$message = $_REQUEST['message'];
$date = date('Y-m-d');


//Send email
mail($to, $subject, $message, "From:" . $email);
$servername = "localhost";
$username = "dreamvoyage2024";
$password = "Dreamvoyage2024";
$dbname = "dreamvoyage";

ini_set('display_errors', 'On'); ini_set('html_errors', 0); error_reporting(-1);

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO `contactForm` (`email`, `name`, `subject`, `message`,`createdate`) VALUES ('$email', '$name', '$subject', '$message','$date')";

if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

 
//Email response
} ?>
<script>
  alert("Thank you for contacting us. Our executive will reach out to you soon. ");
  window.location.replace("index.html");

</script>