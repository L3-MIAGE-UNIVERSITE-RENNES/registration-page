<?php
   session_start();
   $message = $_SESSION['success_message'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration success</title>
</head>
<body>
<h1>
    <?php  echo $message ?>
</h1>
</body>
</html>
