<?php 
error_reporting(E_ALL ^ E_NOTICE); // hide all basic notices from PHP

//If the form is submitted
if(isset($_POST['submitted'])) {
	
	// require a name from user

	
	// need valid email
	if(trim($_POST['email']) === '')  {
		$emailError = 'Forgot to enter in your e-mail address.';
		$hasError = true;
	} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
		$emailError = 'You entered an invalid email address.';
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}
		
	// we need at least some content

		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['comments']));
		} else {
			$comments = trim($_POST['comments']);
		}
		
	// upon no failure errors let's email now!
	if(!isset($hasError)) {
		
/*// Set the info between this comment and the next with your own		//*/	
		$emailTo = 'texx@texxsmith.com';
		$subject = 'Notification request';
/*//  Set the info between this comment and the one above it  //*/			
		$sendCopy = trim($_POST['sendCopy']);
		$body = "Email: $email";
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
    <meta charset="UTF-8">
    <title>Full Screen Video BackGround, Experiment 1</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href='css/core.css' rel='stylesheet' type='text/css'>
    <link href='css/style1.css' rel='stylesheet' type='text/css'>
    <link href='css/overlay.css' rel='stylesheet' type='text/css'>

    <!--[if lt IE 9]>
    <script>
        document.createElement('video');
    </script>
    <![endif]-->
  


</head>
<body>
<div id="bg_pattern"></div>

<video autoplay loop poster="poster.jpg" id="bgvid">    <source src="vids/grain/wild_grass.webm" type="video/webm">
    <source src="vids/grain/wild_grass.mp4" type="video/mp4">
    <source src="vids/grain/wild_grass.ogg" type="video/ogg">
</video>

<div class="container">
  
  <?php if(isset($emailSent) && $emailSent == true) { ?>
  <h1>
    Thank You . . .
  </h1>
  <h2>
     . . . for reaching out to us.
  </h2>
                <p class="dark">Your email was sent. We strive to resolve all contacts within 24 hours</p>
            <?php } else { ?>
    <h1>Coming Soon</h1>
    <h2>Our Awesome Website</h2>
    <p>Enter your e-mail below to be notified when we launch:</p>
 
  				<div id="contact-form">
					<?php if(isset($hasError) || isset($captchaError) ) { ?>
                        <p class=" class="dark"">Error submitting the form</p>
                    <?php } ?>
				
					<form id="contact-us" action="form1.php" method="post" class="pure-form">
						<!--  <div class="formblock">
							<label class="screen-reader-text">Name</label>
							<input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="txt requiredField" placeholder="Name:" />
							<?php if($nameError != '') { ?>
								<br /><span class="error"><?php echo $nameError;?></span> 
							<?php } ?>
						</div>  -->
                        
						<p>
							<!--  <label class="screen-reader-text">Email</label>  -->
							<input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="txt requiredField email" placeholder="E-Mail Address"/>
							<?php if($emailError != '') { ?>
								<br /><span class="error"><?php echo $emailError;?></span>
							<?php } ?>&nbsp;
<button name="submit" type="submit" class="dark-ghost-button">Get Notified</button>
						</p>
                        
						<!--  <div class="formblock">
							<label class="screen-reader-text">Message</label>
							 <textarea name="comments" id="commentsText" class="txtarea requiredField" placeholder="Message:"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
							<?php if($commentError != '') { ?>
								<br /><span class="error"><?php echo $commentError;?></span> 
							<?php } ?>
						</div>  -->
                        
							
							<input type="hidden" name="submitted" id="submitted" value="true" />
					</form>			
				</div>
				
			<?php } ?>
  
  
</div>
  
<!--  Google Analytics code  -->  
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-74783923-2', 'auto');
  ga('send', 'pageview');
</script>
<!--  End Google Analytics Code -->
  
</body>
</html>