<?php
// Make sure this is at the top of the file
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include("dbconnect.php");
$email = $_SESSION['email'];
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SMC Ltd. | Safe Social Media</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  
</head>

<body class="admin-body">
    <header>
        <h1>SMC Ltd.</h1>
        <h2>Empowering Teens for Safe Social Media</h2>
        <h5><i class="fa-solid fa-envelope-circle-check"></i> <?php echo isset($_SESSION['email']) ? $_SESSION['email'] : 'Guest'; ?></h5>
        </header>

    <nav>
        <ul>
            <li><a href="AdminHome.php" class="active">Home</a></li>
            <li><a href="./SocialMediaSetup.php">Social Media Apps</a></li>
            <li><a href="./HowParentsCanHelpSetup.php">How Parents Can Help</a></li>
            <li><a href="./ServicesSetup.php">ServicesSetup</a></li>
            <li><a href="./NewslettersSetup.php">Newslettersetup</a></li>
            <li><a href="./UserList.php">UserList</a></li>
            <li><a href="./ContactList.php">ContactList</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</body>

</html>