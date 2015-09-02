<html>
<head>
<style>

nav {
	background: #ccc;
}
.text {
	max-height: 200px;
	max-width: 75vw;
	overflow-y: scroll;
}

</style>
</head>
<body>

<nav>
	<a href="index.php">Home</a>
</nav>

<?php

function get_the_files($fname) {
	$dir = "../../../../snmp/assignment/" . $fname . '/';

	$di = new RecursiveDirectoryIterator($dir);
	foreach (new RecursiveIteratorIterator($di) as $filename => $file) {
		if (strtolower(substr($file, -4)) == ".txt") {
			$content = file_get_contents($file);
			$content = nl2br($content);
			$content = split("<content>", $content);

			echo '<section>';
			echo '<h1>' . end(explode('\\', $filename)) . '</h1>';
			echo '<div class="text">';
			print_r($content[0]);
			echo '</div>';
			echo '</section>';
		}

	}
}

?>
