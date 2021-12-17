<?php

	$msg = '';
	$msgClass = '';

	if(filter_has_var(INPUT_POST, 'submit')){
		
		$name = htmlspecialchars($_POST['name']);
		$email = htmlspecialchars($_POST['email']);
        $subject = htmlspecialchars($_POST['subject']);
		$message = htmlspecialchars($_POST['message']);

		if(!empty($email) && !empty($name) && !empty($subject) && !empty($message)){
			if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
				$msg = 'Invalid email';
				$msgClass = 'alert-danger';
			} else {
				// Passed
				$toEmail = '';
				$subject = 'Contacted by  '.$name;
				$body = "Company Name: $name
Email: $email
Message: $message
				";

				$headers = "From: " .$name. "<".$email.">". "\r\n";

				if(mail($toEmail, $subject, $body, $headers)){
					// Email Sent
					$msg = 'Your email has been sent';
					$msgClass = 'alert-success';
				} else {
					// Failed
					$msg = 'Your email was not sent';
					$msgClass = 'alert-danger';
				}
			}
		} else {
			// Failed
			$msg = 'Please fill in all fields';
			$msgClass = 'alert-danger';
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name="viewport" content ="width=device-width,initial-scale=1,user-scalable=yes">
    <title>Contact </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/contactform.css">
</head>
<body>
    <div>
    <?php if($msg != ''): ?>
    		<div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
    	<?php endif; ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label>Enter name</label>
    <input class="line" type="text" id="name" name="name" value="<?php echo isset($_POST['name']) ? $name : ''; ?>"  >
    <label>Enter email</label>
    <input class="line" type="text" id="email" name="email" value="<?php echo isset($_POST['email']) ? $email : ''; ?>" >
    <label>Enter subject</label>
    <input class="line" type="text" id="subject" name="subject" value="<?php echo isset($_POST['subject']) ? $subject : ''; ?>"  >
    <textarea class="line email" name="message" maxlength="700" placeholder="Write your email"  ><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
    <a href=""><button type="submit" name="submit" id="button">Send</button></a></div>
                    
</form></div>         
</body>
</html>