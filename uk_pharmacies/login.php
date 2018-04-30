<?php
if (isset($_POST["lusername"]) and isset($_POST["lpassword"])){
	$lusername = $_POST["lusername"];
	$lpassword = $_POST["lpassword"];
	if ($lusername == "zubairahmed@doctors.org.uk" and $lpassword == "medicspot") { echo "OK!"; } else { echo "Username and password invalid!"; }
} else { echo "Wrong username and password!"; }
?>