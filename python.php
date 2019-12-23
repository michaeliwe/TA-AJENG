<?php
$username = $_POST['username'];
$comments = $_POST['comments'];

shell_exec("instagram-scraper $username --comments -m $comments");
shell_exec("python excel.py");

session_start();
$_SESSION["print"] = "true";

header("Location: index.php");
