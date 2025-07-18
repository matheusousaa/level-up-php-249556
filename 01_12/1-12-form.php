<?php 

function process_form() {
	$txtContent = Date('Y-m-d h:i:s') . "\r\n";
	$txtContent .= "Name: " . $_POST['name'] . "\r\n";
	$txtContent .= "Email: " . $_POST['email'] . "\r\n";
	$txtContent .= "Message: " . $_POST['message'] . "\r\n";

	if (false !== file_put_contents("form-into.txt", $txtContent, FILE_APPEND)) {
		echo "<pre>Your entry has been recorded!.</pre>";
	} else {
		echo "<pre>An error occured while trying to save your entry.</pre>";
	}
}

if ($_POST['submit']) {
	process_form();
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Process Form</title>
		<meta name="author" value="Joe Casabona" />
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<main>
			<form name="contact" method="POST">
				<div>
					<label for="name">Name:</label>
					<input type="text" name="name" placeholder="What's Your Name?" />
				</div>
				<div>
					<label for="email">Email:</label>
					<input type="email" name="email" placeholder="What's Your Email?" />
				</div>
				<div>
					<label for="message">Your Message:</label>
					<textarea name="message"></textarea>
				</div>
				<div><input type="submit" name="submit" value="Send Message" /></div>
			</form>	
		</main>
	</body>
</html>