<?php
session_start();
if (!isset($_SESSION['logged_in']) || isset($_SESSION['logged_in']) !== true) {
    header('location: login.php');
    exit();
}
// session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<!-- meaning that row with 6% height for navbar and all the rest will be for other  -->
<frameset rows="60px,*" frameborder="0" border="0">
    <frame src="navbar.php" name="">
        <frameset cols="250px,*">
            <frame src="root/Sidemenu.php" name="menu">
                <frame src="root/Content.php" name="content">
        </frameset>
</frameset>

</html>