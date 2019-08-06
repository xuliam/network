<?php 
error_reporting(E_ALL ^ E_NOTICE); // hide all basic notices from PHP

//If the form is submitted
if(isset($_POST['submitted'])) {
	
	// require a name from user
	if(trim($_POST['contactName']) === '') {
		$nameError =  'Forgot your name!'; 
		$hasError = true;
	} else {
		$name = trim($_POST['contactName']);
	}
	
	// need valid email
	if(trim($_POST['email']) === '')  {
		$emailError = 'Forgot your e-mail address.';
		$hasError = true;
	} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
		$emailError = 'Invalid email address!';
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}
		
	// we need at least some content
	if(trim($_POST['comments']) === '') {
		$commentError = 'Forgot your message!';
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['comments']));
		} else {
			$comments = trim($_POST['comments']);
		}
	}
		
	// upon no failure errors let's email now!
	if(!isset($hasError)) {
		
		$emailTo = 'email@gmail.com'; // ADD YOUR EMAIL ADDRESS HERE FOR CONTACT FORM!
		$subject = 'Submitted message from '.$name; // ADD YOUR EMAIL SUBJECT LINE HERE FOR CONTACT FORM!
		$sendCopy = trim($_POST['sendCopy']);
		$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
		$headers = 'From: ' .' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		mail($emailTo, $subject, $body, $headers);
        
        // set our boolean completion value to TRUE
		$emailSent = true;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Nest - Responsive Bootstrap 4 Theme</title>
	<link rel="shortcut icon" href="img/favicon.ico">
	<link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/fixed.css">
	<link rel="stylesheet" href="css/lightbox.css">
</head>
<body data-spy="scroll" data-target="#navbarResponsive">

<!--- Start Home Section -->
<div id="home">

<!--- Navigation -->
<nav class="navbar navbar-expand-md fixed-top">
<div class="container-fluid">
	<a class="navbar-brand" href="#"><img src="img/nest.png" alt=""></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
		<span class="custom-toggler-icon"><i class="fas fa-bars"></i></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarResponsive">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a class="nav-link" href="#home">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#about">About</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#portfolio">Portfolio</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#testimonials">Testimonials</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#contact">Contact</a>
			</li>
		</ul>
	</div>
</div>
</nav>
<!--- End Navigation -->

<!--- Start Landing Page Image -->
<div class="landing">
	<div class="home-wrap">
		<div class="home-inner">
		</div>
	</div>
</div>
<!--- End Landing Page Image -->

<!--- Start Landing Page Caption -->
<div class="caption center-block text-center">
	<h3>Nest Responsive Bootstrap Theme</h3>
	<a class="btn btn-outline-light" href="#about">Get Started</a>
</div>
<!--- End Landing Page Caption -->

</div>
<!--- End Home Section -->

<!--- Start About Section -->
<div id="about" class="offset">

<!--- Start Jumbotron -->
<div class="jumbotron">

	<h3 class="heading">About</h3>
	<div class="heading-underline"></div>

<div class="row narrow">

	<div class="col-md-4">
		<div class="about text-center">
			<i class="fas fa-desktop fa-3x"></i>
			<h3>Full Screen Landing</h3>
			<p>Nest features a full screen, responsive landing page using Bootstrap.</p>
		</div>
	</div>

	<div class="col-md-4">
		<div class="about text-center">
			<i class="fas fa-arrow-circle-down fa-3x"></i>
			<h3>Smooth Scrolling</h3>
			<p>The Nest Bootstrap navigation menu features smooth scrolling links.</p>
		</div>
	</div>

	<div class="col-md-4">
		<div class="about text-center">
			<i class="fas fa-address-card fa-3x"></i>
			<h3>Contact Form</h3>
			<p>Using Bootstrap and PHP Mailer, Nest has a responsive contact form.</p>
		</div>
	</div>

</div> <!--- End Row -->
</div><!--- End Jumbotron -->
</div>
<!--- End About Section -->

<!--- Start Portfolio Section -->
<div id="portfolio" class="offset">

<div class="container-fluid padding">

	<h3 class="heading">Portfolio</h3>
	<div class="heading-underline"></div>

<!--- Start Portfolio Grid -->
<div class="row no-padding">

	<div class="col-md-6">
		<div class="portfolio-item">
			<a href="img/portfolio/1.png" data-lightbox="example-set" data-title="My Portfolio Image Description">
				<img class="example-image" src="img/portfolio/1.png" alt="">
			</a>
		</div>
	</div>

	<div class="col-md-6">
		<div class="portfolio-item">
			<a href="img/portfolio/2.png" data-lightbox="example-set">
				<img class="example-image" src="img/portfolio/2.png" alt="">
			</a>
		</div>
	</div>

	<div class="col-md-6">
		<div class="portfolio-item">
			<a href="img/portfolio/3.png" data-lightbox="example-set">
				<img class="example-image" src="img/portfolio/3.png" alt="">
			</a>
		</div>
	</div>

	<div class="col-md-6">
		<div class="portfolio-item">
			<a href="img/portfolio/4.png" data-lightbox="example-set">
				<img class="example-image" src="img/portfolio/4.png" alt="">
			</a>
		</div>
	</div>

</div> <!--- End Row -->
<!--- End Portfolio Grid -->
</div> <!--- End Container -->

<div class="narrow text-center padding">
	<p class="lead">Get in contact with us to see more of our great portfolio design work in addition to web development projects such as websites, apps and more!</p>
	<div class="center-block">
		<a class="btn btn-secondary" href="#contact">Get in Touch</a>
	</div>
</div>

</div>
<!--- End Portfolio Section -->

<!--- Start Testimonials Section -->
<div id="testimonials" class="offset">

<div class="jumbotron">

	<h3 class="heading">Testimonials</h3>
	<div class="heading-underline"></div>

<div class="row narrow">

	<div class="col-md-6">
		<div class="card text-center">
			<img class="card-img-top" src="img/testimonials/1.png" alt="">
			<div class="card-body">
				<h4>John Lee</h4>
				<h5>CEO, Company Inc.</h5>
				<p>"I have over 10 years of experience in technology and haven't come accross a better service."</p>
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="card text-center">
			<img class="card-img-top" src="img/testimonials/2.png" alt="">
			<div class="card-body">
				<h4>Jessica Miller</h4>
				<h5>President, Company Inc.</h5>
				<p>"I have over 10 years of experience in technology and haven't come accross a better service."</p>
			</div>
		</div>
	</div>

</div> <!--- End Row -->
</div> <!--- End Jumbotron -->

</div>
<!--- End Testimonials Section -->

<!--- Start Contact Section -->
<div id="contact" class="offset">

<div class="container-fluid footer">
<div class="row">

	<div class="col-md-5">
		<img src="img/nest.png" alt="">
		<p>At our core is a collection of design and development solutions that represent everything your business needs to compete in the modern marketplace.</p>
		<strong>Our Location</strong>
		<p>100 Street Name<br>Our City, AA 10000</p>
		<strong>Contact Info</strong>
		<p>(888) 888-8888<br>email@nest.com</p>
		<a href="#"><i class="fab fa-facebook-square"></i></a>
		<a href="#"><i class="fab fa-twitter-square"></i></a>
		<a href="#"><i class="fab fa-google-plus-square"></i></a>
		<a href="#"><i class="fab fa-linkedin"></i></a>
	</div>

	<div class="col-md-7">
		<h3>Contact Us</h3>
<!-- Start Contact Form -->
	<div id="contact-area">
	<div class="section">
		<div class="container content">
	        <?php if(isset($emailSent) && $emailSent == true) { ?>
                <h5 class="info">Thanks! Your email has been delivered!</h5>
            <?php } else { ?>		
				</div>	
				<div id="contact-form">
					<?php if(isset($hasError) || isset($captchaError) ) { ?>
                        <p class="alert">Error submitting the form</p>
                    <?php } ?>
				
					<form id="contact-us" action="index.php#contact" method="post">
						<div class="formblock">
							<input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="txt requiredField" placeholder="Enter your name." />
							<?php if($nameError != '') { ?>
								<br /><span class="error"><?php echo $nameError;?></span> 
							<?php } ?>
						</div>
                        <div class="clearfix"></div>
						<div class="formblock">
							<input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="txt requiredField email" placeholder="Enter your email." />
							<?php if($emailError != '') { ?>
								<br /><span class="error"><?php echo $emailError;?></span>
							<?php } ?>
						</div>
                        <div class="clearfix"></div>
						<div class="formblock">
							 <textarea name="comments" id="commentsText" class="txtarea requiredField" placeholder="Add your message." rows="4"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
							<?php if($commentError != '') { ?>
								<br /><span class="error"><?php echo $commentError;?></span> 
							<?php } ?>
						</div>
                      <div class="clearfix"></div>  
							<button name="submit" type="submit" class="subbutton btn btn-outline-light">Send Message</button>
							<input type="hidden" name="submitted" id="submitted" value="true" />
					</form>			
			<?php } ?>
		</div>
    </div>
<script>
	<!--//--><![CDATA[//><!--
	$(document).ready(function() {
		$('form#contact-us').submit(function() {
			$('form#contact-us .error').remove();
			var hasError = false;
			$('.requiredField').each(function() {
				if($.trim($(this).val()) == '') {
					var labelText = $(this).prev('label').text();
					$(this).parent().append('<span class="error">Forgot your '+labelText+'!</span>');
					$(this).addClass('inputError');
					hasError = true;
				} else if($(this).hasClass('email')) {
					var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
					if(!emailReg.test($.trim($(this).val()))) {
						var labelText = $(this).prev('label').text();
						$(this).parent().append('<span class="error">Sorry! Invalid '+labelText+'!</span>');
						$(this).addClass('inputError');
						hasError = true;
					}
				}
			});
			if(!hasError) {
				var formInput = $(this).serialize();
				$.post($(this).attr('action'),formInput, function(data){
					$('form#contact-us').slideUp("fast", function() {				   
						$(this).before('<p class="tick"><h3>Thanks! Your email has been delivered!</h3></p>');
					});
				});
			}
			
			return false;	
		});
	});
	//-->!]]>
</script>
	</div>
<!-- End Contact Form -->

	</div>

	<hr class="socket">
	&copy; Nest Theme.

</div> <!--- End Row -->
</div> <!--- End Container Footer -->

</div>
<!--- End Contact Section -->


<!--- Script Source Files -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
<script src="https://use.fontawesome.com/releases/v5.9.0/js/all.js"></script>
<script src="js/custom.js"></script>
<script src="js/lightbox.js"></script>
<script src="js/contact.js"></script>
<!--- End of Script Source Files -->
</body>
</html>