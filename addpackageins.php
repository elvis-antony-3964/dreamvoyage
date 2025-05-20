<?php
include("config.php");

//exit;

$packageName	= trim($_POST['packageName']);
$noOfPax	= trim($_POST['noOfPax']);
$noOfDays	= trim($_POST['noOfDays']);
$description	= trim($_POST['editorContent']);
$displayOrder	= trim($_POST['displayOrder']);
$status	= trim($_POST['status']);
$packagType	= trim($_POST['packageType']);
$location	= trim($_POST['location']);
$price	= trim($_POST['price']);
$rating	= trim($_POST['rating']);
$imageUrl	= trim($_POST['imageUrl']);

// Handle thumbnail upload
$thumbnailPath = '';
if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] == UPLOAD_ERR_OK) {
    $targetDir = "uploads/thumbnails/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    $fileName = uniqid() . '_' . basename($_FILES['thumbnail']['name']);
    $targetFile = $targetDir . $fileName;
    if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], $targetFile)) {
        $thumbnailPath = $targetFile;
    }
}
$imageUrl = $thumbnailPath;

//echo $packageName;
//echo $noOfPax;
//echo $noOfDays;
//echo $description;
//echo $displayOrder;
//echo $status;  
//echo $packagType;

dbConnect();
//ADDING
$query = "INSERT INTO package_details 
    (packageName, noOfPax, noOfDays, description, displayOrder, status, packagType, location, price, rating, imageUrl) 
    VALUES 
    ('$packageName', '$noOfPax', '$noOfDays', '$description', '$displayOrder', '$status', '$packagType', '$location', '$price', '$rating', '$imageUrl')";

$result 	= mysqli_query($con,$query) or die (mysqli_error());
mysqli_close($con);

?>
<script>
alert("Package added successfully.");
window.location.replace("addPackage.php");

</script>