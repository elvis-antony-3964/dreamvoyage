<?php
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dream Voyage add tour Packages </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Contact Dream Voyage" name="keywords">
    <meta content="Dream voyage contact at bookdreamvoyage.com . bookdreamvoyage@gmail.com" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-light pt-3 d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 text-center text-lg-left mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <p><i class="fa fa-envelope mr-2"></i>bookdreamvoyage@gmail.com</p>
                        <p class="text-body px-3">|</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+91 9074333540</p>
                    </div>
                </div>
                <div class="col-lg-5 text-center text-lg-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-primary px-3" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-primary px-3" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-primary px-3" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-primary px-3" href="">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="text-primary pl-3" href="">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="" class="navbar-brand">
                   <h4 class="m-0 text-primary"> <span class="text-dark">Dream</span>Voyage</h4>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="index.html" class="nav-item nav-link">Home</a>
                        <a href="about.html" class="nav-item nav-link">About</a>
                        <a href="service.html" class="nav-item nav-link">Services</a>
                        <a href="package.html" class="nav-item nav-link">Tour Packages</a>
                     
                        <a href="contact.html" class="nav-item nav-link active">Contact</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Edit Packages</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="index.html">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Edit Package</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
<?php 
$packageCode = $_REQUEST['packageCode'];
//$packageCode = 2;
$packageName	= "";
$noOfPax	= "";
$noOfDays	= "";
$description	= "";
$displayOrder	= "";
$status	= "";
$packagType	= "";
dbConnect();
$query	= "select * from package_details where packageCode = '$packageCode' order by displayOrder";
$result	= mysqli_query($con,$query) or die (mysqli_error());


 while($row = mysqli_fetch_array($result))
  {
  	$packageName=$row['packageName'];
    $noOfPax=$row['noOfPax'];
    $noOfDays=$row['noOfDays'];
    $description=$row['description'];
    $displayOrder=$row['displayOrder'];
    $status=$row['status'];
    $packagType=$row['packagType'];
    $location = $row['location'];
    $price = $row['price'];
    $rating = $row['rating'];      
    $imageUrl = $row['imageUrl'];
  }
mysqli_close($con);
?>

  <form action="editpackageins.php" method="post" enctype="multipart/form-data" name="form1">
<!-- add package Start -->
<div class="container-fluid py-5">
        <div class="container py-5">
            
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="contact-form bg-white" style="padding: 30px;">
                        <div id="success"></div>
                            <div class="form-row">
                                <div class="control-group col-sm-6">
                                    <input type="text" class="form-control p-4" id="packageName" name="packageName" placeholder="Package Title"
                                        required="required" value="<?php echo $packageName;?>" data-validation-required-message="Please enter your package title" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group col-sm-6">
                                    <input type="text" class="form-control p-4" id="noOfPax" name="noOfPax" placeholder="No of Pax"
                                        required="required" value="<?php echo $noOfPax;?>" data-validation-required-message="Please enter no of Pax" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group col-sm-6">
                                    <input type="text" class="form-control p-4" id="noOfDays" name="noOfDays" placeholder="No of Days"
                                        required="required" value="<?php echo $noOfDays?>" data-validation-required-message="Please enter no Of Days" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group col-sm-6">
                                    <input type="text" class="form-control p-4" id="location" name="location" placeholder="Location"
                                        required="required" value="<?php echo htmlspecialchars($location); ?>" data-validation-required-message="Please enter the location" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group col-sm-6">
                                    <input type="number" class="form-control p-4" id="price" name="price" placeholder="Price (Rs)"
                                        required="required" value="<?php echo htmlspecialchars($price); ?>" data-validation-required-message="Please enter the price" min="0" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group col-sm-6">
                                    <input type="number" step="0.1" class="form-control p-4" id="rating" name="rating" placeholder="Rating (e.g. 4.5)"
                                        required="required" value="<?php echo htmlspecialchars($rating); ?>" data-validation-required-message="Please enter the rating" min="0" max="5" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group col-sm-6">
                                    <input type="hidden" id="imageUrl" name="imageUrl"  value="<?php echo htmlspecialchars($imageUrl); ?>" />
                                    <?php if (!empty($imageUrl)): ?>
                                    <div class="mb-2">
                                        <img src="<?php echo htmlspecialchars($imageUrl); ?>" alt="Current Thumbnail" style="max-width:120px;max-height:120px;">
                                        <p>Current Thumbnail</p>
                                    </div>
                                <?php endif; ?>
                                <label for="thumbnail">Thumbnail Image</label>
                                <input type="file" class="form-control-file" id="thumbnail" name="thumbnail" accept="image/*">
                                <p class="help-block text-danger"></p>
                                </div> 
                                <div class="control-group col-sm-6">
                                <select name="status" id="status" class="custom-select px-4" style="height: 47px;">
                                        <option selected value="A">Active</option>
                                        <option value="I">Inactive</option>
                                    </select>
                                    </div>
                                    <div class="control-group col-sm-6">
                                    <select name="packageType" id="packageType" class="custom-select px-4" style="height: 47px;">
                                        <option selected value="D">Domestic</option>
                                        <option value="I">International</option>
                                    </select>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group col-sm-6">
                                <select name="displayOrder" id="displayOrder" class="custom-select px-4" style="height: 47px;">
                                    <option selected value="">Display Order</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                                    </div>
                            </div>                            
                            <div class="control-group" >
                                
                            
                           <!--Include the JS & CSS-->
<link rel="stylesheet" href="richtexteditor/rte_theme_default.css" />
<script type="text/javascript" src="richtexteditor/rte.js"></script>
<script type="text/javascript" src='richtexteditor/plugins/all_plugins.js'></script>
<div id="div_editor1">
    
	
</div>
<!-- Hidden Input to Store Editor Content -->
<input type="hidden" id="editorContent" name="editorContent" />
<input type="hidden" id="packageCode" name="packageCode"  value="<?php echo $packageCode; ?>" />

<script>
  var editor1cfg = {}
	editor1cfg.toolbar = "full";
	var editor1 = new RichTextEditor("#div_editor1", editor1cfg);

        editor1.setHTMLCode(<?php echo json_encode($description); ?>);
        document.getElementById("displayOrder").value = '<?php echo $displayOrder; ?>';
        document.getElementById("status").value = '<?php echo $status; ?>';

     // Transfer editor content to hidden input before form submission
    document.querySelector("form").addEventListener("submit", function (e) {
        document.getElementById("editorContent").value = editor1.getHTMLCode();
    });
</script>
                            <br>
                            </div>
                            <div class="text-center">
                                <input type="submit" class="btn btn-primary py-3 px-4" id="sendMessageButton" value="Add Package">
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>      
    <!-- Contact End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 py-5 px-sm-3 px-lg-5" style="margin-top: 90px;">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="" class="navbar-brand">
                    <h3 class="text-primary"><span class="text-white">Dream</span>Voyage</h3>
                </a>
                <p>Explore and discover special Kerala tour packages with us. We offer Kerala backwaters, Munnar hillstation , Athirappily Waterfall and many more special packages with precise budget planning without compromising the quality.</p>
                <h6 class="text-white text-uppercase mt-4 mb-3" style="letter-spacing: 5px;">Follow Us</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-outline-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Our Services</h5>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>International Tour Package</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Domestic Tour Package</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Air Ticketing</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Hotel and Resort Booking</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Cab Services</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Vehicle Rentals</a>
                    <a class="text-white-50" href="#"><i class="fa fa-angle-right mr-2"></i>Honeymoon Packages</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Usefull Links</h5>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white-50 mb-2" href="about.html"><i class="fa fa-angle-right mr-2"></i>About</a>
                    <a class="text-white-50 mb-2" href="package.html"><i class="fa fa-angle-right mr-2"></i>Destination</a>
                    <a class="text-white-50 mb-2" href="service.html"><i class="fa fa-angle-right mr-2"></i>Services</a>
                    <a class="text-white-50 mb-2" href="package.html"><i class="fa fa-angle-right mr-2"></i>Packages</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Guides</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Testimonial</a>
                    <a class="text-white-50" href="#"><i class="fa fa-angle-right mr-2"></i>Blog</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Contact Us</h5>
                <p><i class="fa fa-map-marker-alt mr-2"></i>Dream Voyage, E S I Road, Palluruthy, Kochi - 682006, Kerala, India.</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+91 9074333540</p>
                <p><i class="fa fa-envelope mr-2"></i>bookdreamvoyage@gmail.com</p>
                
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="row">
            <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white-50">Copyright &copy;. All Rights Reserved.</a>
                </p>
            </div>
            <div class="col-lg-6 text-center text-md-right">
                <p class="m-0 text-white-50">Designed by <a href="#">Dream Voyage</a>
                </p>
            </div>
        </div>
    </div>
</body>

</html>