<?php
    session_start();
    $error_message = $_SESSION['error_message'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration error</title>
</head>
<body>
  <h1>
      <?php echo $_SESSION['error_message'] ?>
  </h1>
</body>
</html>
