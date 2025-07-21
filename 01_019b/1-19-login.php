<?php 
	include_once( 'generate-file.php' );

	function login($username, $password) {
		$logins = file_get_contents('logins.txt');
		$logins = explode( "\n", $logins );

		foreach ($logins as $login) {
			$login = explode(',', $login);
			if ($username == $login[0] && password_verify($password, $login[1])) {
				setcookie('username', $username);
				$_COOKIE['username'] = $username;
				setcookie('loggedin', true);
				$_COOKIE['loggedin'] = true;
				return;
			}
		}

		setcookie('username', '', time()-3600);
		setcookie('loggedin', '', time()-3600);
		echo "Username and/or password incorret";
		return false;
	}
	
	if ( isset( $_POST['submit'] ) ) {
		login($_POST['username'], $_POST['password']);
	} 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<meta name="author" value="Joe Casabona" />
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<main>
			<?php 
				if (isset($_COOKIE['loggedin']) && !is_null($_COOKIE['loggedin'])) { 
					echo "Welcome {$_COOKIE['username']} !";
				}
			?>
			<form name="login" method="POST">
				<div>
					<label for="username">Username:</label>
					<input type="text" name="username" />
				</div>
				<div>
					<label for="password">Password:</label>
					<input type="password" name="password" />
				</div>
				<div>
						<input type="submit" name="submit" value="Submit" />
				</div>
			</form>	
		</main>
	</body>
</html>