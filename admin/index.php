<?php

session_start();
header('Cache-Control: no-cache, must-revalidate, max-age=0');

if (!isset($_SESSION['attempts'])) {
	$_SESSION['attempts'] = 0;
}


// Let's not troll them too hard
if (++$_SESSION['attempts'] > 1000) {
	echo "<marquee scrollamount='30'><img src='ohno.png' /></marquee>";
	exit;
} else {
	header('HTTP/1.1 401 Authorization Required');
	header('WWW-Authenticate: Basic realm="Access denied"');
}

echo "You've tried " . $_SESSION['attempts'] . " times.";

?>
