<?php
	if(isset($_POST['submit']))
	{
		$to = "jhiles@nomadicux.com";
		$subject = "Customer Enquiry";
		$name_field = $_POST['userName'];
		$email_field = $_POST['userMail'];
		$message = $_POST['userMessage'];

		$body = "From: $name_field\n E-Mail: $email_field\n Message:\n $message";

		echo "Thanks for your enquiry! Expect a response within 24 hours.";
		mail($to, $subject, $body);
	}
	else
	{
		echo "ERROR: Email not sent. Please go back and try again or manually send to jhiles@nomadicux.com";
	}
?>
