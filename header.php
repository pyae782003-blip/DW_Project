<?php
session_start();
include("dbconnect.php");

// Get the session email
$email = isset($_SESSION['email']) ? $_SESSION['email'] : "Guest";

// Query to get the user details based on the session email
$sql = "SELECT * FROM member WHERE email='".$email."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the user data
    $user = $result->fetch_assoc();
    $usertype = $user['usertype']; // Get usertype (0 for admin, 1 for regular user)
} else {
    $usertype = null; // If user not found
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SMC Ltd. | Safe Social Media</title>
    <link rel="stylesheet" href="./styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
</head>

<body class="admin-body">
    <header>
        <h1>SMC Ltd.</h1>
        <h2>Empowering Teens for Safe Social Media</h2>
        <h5><i class="fa-solid fa-envelope-circle-check"></i> <?php echo $email; ?></h5>
    </header>

    <nav>
        <ul>
            <li><a href="index.php" class="active">Home</a></li>
            <li><a href="popularApps.php">Social Media Apps</a></li>
            <li><a href="information.php">Information</a></li>
            <li><a href="how-parents-can-help.php">How Parents Can Help</a></li>
            <li><a href="livestreaming.php">Livestreaming</a></li>
            <li><a href="how-to-stay-safe.php">How to Stay Safe Online</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</body>

</html>
