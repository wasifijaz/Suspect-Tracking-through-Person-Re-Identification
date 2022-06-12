<?php
	SESSION_START();
	SESSION_DESTROY();
	header("location: login.php?success=" . urlencode("Successfully Logged Out."));
	exit();
?>