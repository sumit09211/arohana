<?php
switch (@$_GET['do'])
 {

 case "send":

      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $femail = $_POST['femail'];
      $fphone1 = $_POST['fphone1'];
      $fsendmail = $_POST['fsendmail'];
      $secretinfo = $_POST['info'];

    if (!preg_match("/\S+/",$fname))
    {
      unset($_GET['do']);
      $message = "First Name required. Please try again.";
      break;
    }
    if (!preg_match("/\S+/",$lname))
    {
      unset($_GET['do']);
      $message = "Last Name required. Please try again.";
      break;
    }
    if (!preg_match("/^\S+@[A-Za-z0-9_.-]+\.[A-Za-z]{2,6}$/",$femail))
    {
      unset($_GET['do']);
      $message = "Primary Email Address is incorrect. Please try again.";
      break;
    }
    
    if (!preg_match("/^[0-9 #\-\*\.\(\)]+$/",$fphone1))
    {
      unset($_GET['do']);
      $message = "Phone Number 1 required. No letters, please.";
      break;
    }
 
    if ($secretinfo == "")
    {
       $myemail = "contact@arohana.co.in";
       $emess = "First Name: ".$fname."\n";
       $emess.= "Last Name: ".$lname."\n";
       $emess.= "Email: ".$femail."\n";
       $emess.= "Contact: ".$fphone1."\n";
       $emess.= "Comments: ".$fsendmail;
       $ehead = "From:contact@arohana.co.in \r\n";
       $subj = "Query from ".$fname." ".$lname."!";
       $mailsend=mail($myemail,$subj,$emess,$ehead);
       $message = "Thank you! We will contact you soon.";
    }
 
      unset($_GET['do']);
      header("Refresh:5; url=index.html");
      // sleep(5);
      //  header("Refresh:5, Location: index.html");
     break;

     $mail->isSMTP();
     $mail->Host = '209.99.16.226';
     $mail->SMTPAuth = false;
     $mail->SMTPAutoTLS = false; 
     $mail->Port = 587; 
 
 default: break;
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Arohana Management Solutions</title>
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.css" >
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="./css/style.css" type="text/css" media="all" />

</head>
<body>
    <div class="main-top" id="home">
		<!-- header -->
		<header class="fixed-top">
			<div class="container-fluid">
				<div class="header d-lg-flex justify-content-between align-items-center py-2 px-sm-3">
					<!-- logo -->
					<div id="logo" class="logo">
						<a href="index.html" >
                            <img src="./images/logo.png" title="Rising towards excellence" class="img-fluid" />
                        </a>
					</div>
					<!-- //logo -->
					<!-- nav -->
					<div class="nav_arls">
						<nav>
							<label for="drop" class="toggle">Menu</label>
							<input type="checkbox" id="drop" />
							<ul class="menu">
								<li><a href="index.html">Home</a></li>
								<li><a href="about.html">About Us</a></li>
								<li><a href="services.html">Services</a></li>
								<!-- <li><a href="pricing.html">Pricing</a></li> -->
								<!-- <li>
									<label for="drop-2" class="toggle toogle-2">Dropdown <span class="fa fa-angle-down" aria-hidden="true"></span>
									</label>
									<a href="#">Dropdown <span class="fa fa-angle-down" aria-hidden="true"></span></a>
									<input type="checkbox" id="drop-2" />
									<ul>
										<li><a href="#services" class="drop-text">Services</a></li>
										<li><a href="faq.html" class="drop-text">Faq's</a></li>
										<li><a href="404.html" class="drop-text">404</a></li>
										<li><a href="#stats" class="drop-text">Statistics</a></li>
										<li><a href="about.html" class="drop-text">Why Choose Us?</a></li>
										<li><a href="about.html" class="drop-text">Our Team</a></li>
										<li><a href="#partners" class="drop-text">Partners</a></li>
									</ul>
								</li> -->
								<li><a href="contact.php"  class="active">Contact Us</a></li>
							</ul>
						</nav>
					</div>
					<!-- //nav -->
				</div>
			</div>
		</header>
		<!-- //header -->
		<!-- banner -->
		<div class="banner_arlspvt-2 mt-5">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html" class="font-weight-bold">Home</a></li>
					<li class="breadcrumb-item" aria-current="page">Contact Us</li>
				</ol>
			</div>
			<!-- //banner -->
	
	</div>


<!-- contact -->
<div class="contact py-5" id="contact">
		<div class="container pb-xl-5 pb-lg-3">
			<div class="row">
				<div class="col-lg-6">
					<h3>Connect with us</h3>
					<p class="sub-tittle mt-3 mb-sm-5 mb-4">
						Reach out to us for consultancy from veterans, strategic planning from experienced practitioners, micro and macro level planning and implementation, and targeted people development interventions. 
					</p>
					<p class="mb-2">Email: 
						<a href="mailto:contact@arohana.co.in" target="_top">contact@arohana.co.in</a>
						<!-- <a href="mailto:19sg09@gmail.com" target="_top">19sg09@gmail.com</a>, 
						<a href="mailto:snehakashyap95@gmail.com" target="_top">snehakashyap95@gmail.com</a> -->
					</p>
					<p>Mobile: +91-7895309339</p>
				</div>
				<div class="col-lg-6 mt-lg-0 mt-5">
					<!-- contact form grid -->
					<div class="contact-top1">
						<form action="contact.php?do=send" method="post" class="contact-wthree-do">
                     <?php
                        if ($message) echo '<div class="alert alert-success" role="alert">
                        '.$message.'
                     </div>';
                     ?>
							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<label>
											First name <span class="required">*</span>
										</label>
										<input class="form-control" type="text" name="fname"  size="30" value="<?php echo @$fname ?>" placeholder="First Name" required="">
									</div>
									<div class="col-md-6 mt-md-0 mt-4">
										<label>
											Last name
										</label>
										<input class="form-control" type="text" name="lname" size="30" value="<?php echo @$lname ?>" placeholder="Last Name" required="">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<label>
											Mobile
										</label>
										<input class="form-control" type="text" placeholder="xxxx xxxx xx" name="fphone1" size="20" value="<?php echo @$fphone1 ?>" required="">
									</div>
									<div class="col-md-6 mt-md-0 mt-4">
										<label>
											Email
										</label>
										<input class="form-control" type="email" placeholder="example@mail.com" name="femail" size="30" value="<?php echo @$femail ?>" required="">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-12">
										<label>
											Your message
										</label>
										<textarea placeholder="Add your Description here" name="fsendmail" class="form-control"><?php if($fsendmail) echo $fsendmail; ?></textarea>
									</div>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-md-12">
									<button type="submit" class="btn btn-cont-w3 btn-block mt-4 button-style">Send</button>
								</div>
							</div>
						</form>
					</div>
					<!-- //contact form grid ends here -->
				</div>
			</div>
		</div>
	</div>
	<!-- //contact-->


	<!-- copyright bottom -->
	<div class="copy-bottom bg-li py-4 border-top">
		<div class="container-fluid">
			<div class="d-md-flex px-md-3 position-relative text-center">
				<!-- footer social icons -->
				<div class="social-icons-footer mb-md-0 mb-3">
					<ul class="list-unstyled">
						<li>
							<a href="#">
								<span class="fa fa-facebook"></span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="fa fa-twitter"></span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="fa fa-google-plus"></span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="fa fa-instagram"></span>
							</a>
						</li>
					</ul>
				</div>
				<!-- //footer social icons -->
				<!-- copyright -->
				<div class="copy_right mx-md-auto mb-md-0 mb-3">
					<p class="text-bl let">&copy; 2019 Arohana Management Solutions.
						 | Design by
						<a href="http://wireon.in/" target="_blank">Wireon Infosystem (P) Ltd</a>
					</p>
				</div>
				<!-- //copyright -->
				<!-- move top icon -->
				<a href="#home" class="move-top text-center">
					<span class="fa fa-level-up" aria-hidden="true"></span>
				</a>
				<!-- //move top icon -->
			</div>
		</div>
	</div>
	<!-- //copyright bottom -->

</body>
</html>