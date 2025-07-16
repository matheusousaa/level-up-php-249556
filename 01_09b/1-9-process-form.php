<?php 
function process_form() {
	echo "<pre>";
	echo ("Name: " . $_POST['name'] . "\n");
	echo ("Email: " . $_POST['email'] . "\n");
	echo ("Message: " . $_POST['message'] . "\n");
	echo "</pre>";
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