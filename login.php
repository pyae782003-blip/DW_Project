<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (isset($_SESSION['attempt_again'])) {
    $now = time();

    if ($now >= $_SESSION['attempt_again']) {
        unset($_SESSION['attempt']);
        unset($_SESSION['attempt_again']);
        unset($_SESSION['msg']);
        unset($_SESSION['check']);
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMC Ltd. - Login</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>SMC Ltd. - Livestreaming</title>
</head>

<body class="admin-body">
    <header>
        <h1>SMC Ltd.</h1>
        <h2 class="smc-head-text">Empowering Teens for Safe Social Media</h2>
    </header>
    <nav>
        <ul>
        <li><a href="home.php">Home</a></li>
            <li><a href="Binformation.php">Information</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>
   

    <section class="login-container">

        <?php
        if (isset($_SESSION['msg'])) {
            echo "<div class='error-msg'>" . $_SESSION['msg'] . "</div>";
        }

        if (!isset($_SESSION['check'])) {
        ?>
            <form action="login-success.php" method="POST">
                <h2 class="login-text">Login</h2>

                <label for="username">Username/Email:</label>
                <input type="text" id="username" name="username" placeholder="Enter your username or email" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>

                <button type="submit">Login</button>
                <span>Not a member yet? <a href="register.php" class="register-link">Register here</a></span>
            </form>
        <?php
        }
        ?>

    </section>
    <footer>
        <p>You are here: Login</p>
    </footer>
    <?php include("footer.php"); // Include footer 
    ?>
</body>

</html>
