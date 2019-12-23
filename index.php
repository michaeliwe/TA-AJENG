<html>
<head>
<title>TA EZPZ</title>
</head>
<body>
<center>
    <a href="python.php">
        <img src="start_button.png" alt="" class="mx-auto" width="150px" style="margin-top:20%">
    </a>
<center>
</body>

<?php
session_start();
if (isset($_SESSION["print"])) {
    echo "<script> window.open('data_comment_id.csv', '_blank'); </script>";
    echo "<script> window.open('caption_new.csv', '_blank'); </script>";
    echo "<script> window.open('likes_comments_id_tetuka.csv', '_blank'); </script>";
}
session_destroy();
?>


</html>
