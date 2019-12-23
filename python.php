<?php
shell_exec('instagram-scraper telkomuniversity');
shell_exec('python excel.py');

session_start();
$_SESSION["print"] = "true";

header("Location: index.php");
