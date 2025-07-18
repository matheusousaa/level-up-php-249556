<?php
function print_info( $info ) {
	echo '<pre>';
	var_dump( $info );
	echo '</pre>';
}


function get_comic() {
	$get_total = file_get_contents("http://xkcd.com/info.0.json");
	$total = json_decode($get_total)->num;
	$comic = file_get_contents("https://xkcd.com/".rand(1, $total)."/info.0.json");
	
	return json_decode($comic);
}

$comic = get_comic();

?>

<!DOCTYPE html>
<html>
<head>
	<title>REST API for xkcd</title>
	<meta name="author" value="Joe Casabona" />
	<link rel="stylesheet" href="style.css" />
</head>
<body>
	<main>
		<p><h2><?php echo $comic->title; ?></h2></p>
		<img src="<?php echo $comic->img; ?>" title="<?php echo $comic->alt; ?>" alt="<?php echo $comic->alt; ?>">
	</main>
</body>
</html>