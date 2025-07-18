<?php 

function generate_number() {
	if (!isset( $_COOKIE['guess_this']) || is_null($_COOKIE['guess_this']))  {
		setcookie('guess_this', rand(0, 50));
	}
} 

function check_guess() {
	if ($_POST['guess'] == $_COOKIE['guess_this']) {
		setcookie('guess_this', '', time() - 3600);
		return "correct";
	} else if ($_POST['guess'] > $_COOKIE['guess_this']) {
		return "higher";
	}

	return "lower";
}

function test_game() {
	echo '<pre>Test Data <br/>';
	echo '<b>Number to Guess: ' . $_COOKIE['guess_this'] . '</b> <br/>';
	echo '<b>Guessed Number: ' . $_POST['guess'] . '</b>';
	echo '</pre>';
}

$guess_answer = "";

if (isset( $_POST['submit']) && isset($_COOKIE['guess_this'])) {
	$guess_answer = check_guess();
} 

generate_number(); //This call will generate the number and store it in a cookie! 

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Guess a Number! </title>
		<meta name="author" value="Joe Casabona" />
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<main>
			<?php 
				switch ($guess_answer) {
					case 'correct':
						echo '<h3>You guessed right!!</h3>';
						echo '<p><a href="'.$_SERVER['PHP_SELF'].'">Play again?</a></p>';
						break;
					case 'higher':
						echo '<p>Your guess is higher</p>';
						break;
					case 'lower':
						echo '<p>Your guess is lower</p>';
						break;
				}

				if ('correct' !== $guess_answer) :
			?>
			<form name="guess" method="POST">
					<input type="number" name="guess" min="0" max="50" placeholder="Enter your guess" />
					<input type="submit" name="submit" value="Make Your Guess!" />
			</form>	
			<?php endif; ?>
		</main>
	</body>
</html>