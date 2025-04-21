

<?php 
// if "email" variable is filled out, send email
if (isset($_REQUEST['mobile'])) {

//Email information
$to = "bookdreamvoyage@gmail.com";
$mobile = $_REQUEST['mobile'];
$packageType = $_REQUEST['packageType'];
$depDate = $_REQUEST['depDate'];
$name = $_REQUEST['name'];
$subject ="Enquiry from Dream Voyage Website";
$email = "info@bookdreamvoyage.com";
$date = date('Y-m-d');
//echo($mobile) ;
//echo($depDate);

//$message = "Dear Dream Voyage,<br>Following Enquiry posted from bookdreamvoyage.com<p> Mobile Number :".$mobile."</p> "."<p>Package Type : ".$packageType."</p><p>Name of Customer ".$name."</p><p>Departure Date:".$depDate."</p>";

$message="Dear Dream Voyage,<br>Following Enquiry posted from bookdreamvoyage.com<p> Mobile Number :".$mobile."</p>";

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

$sql = "INSERT INTO `enquiry` (`mobile`, `name`, `depDate`, `packageType`,`createdate`) VALUES ('$mobile', '$name', '$depDate', '$packageType','$date')";

if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();



} ?>
<script>
  alert("Thank you for contacting us. Our executive will reach out to you soon. ");
 window.location.replace("index.html");

</script>