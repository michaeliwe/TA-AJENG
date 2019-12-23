<html>
<head>
    <title>TA EZPZ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style type="text/css">
        body
         {
             background-image: url('bg.jpg');
             background-repeat: no-repeat;
             background-size: cover;
         }
     </style>
</head>
<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6 mx-auto my-5">
                <div class="card">
                    <div class="card-header">
                        <center>
                            <h4>GET INSTAGRAM DATA</h4>
                        </center>
                    </div>
                    <div class="card-body">
                        <form action="python.php" method="post">
                            <div class="form-group">
                                <label for="username">Instagram Username</label>
                                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" required>
                            </div>
                            <div class="form-group">
                                <label for="comments">Number of Comments</label>
                                <input type="number" class="form-control" id="comments" name="comments" max="200" required>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-block btn-primary">SUBMIT</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
