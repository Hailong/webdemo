<?php

$message = '';

if (isset($_GET['who'])) {
	$message .= $_GET['who'] . ' says ';
}

if (isset($_POST['who'])) {
	$message .= $_POST['who'] . ' says ';
}

$message .= 'Hello World!';

if (isset($_GET['how'])) {
	$message .= ' ' . $_GET['how'];
}

if (isset($_POST['how'])) {
	$message .= ' ' . $_POST['how'];
}

echo $message;

echo '<br><br><br><br><br><br>';
echo '<form action="hello.php" method="POST"><label>who:</label><input name="who" /><br><label>how:</label><input name="how" /><br><input type="submit" /></form>';
