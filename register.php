<?php
include("dbconnect.php");

// Start session safely
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Use output buffering to prevent header issues
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>SMC Ltd. - Contact</title>
    

</head>

<body class="register-body">
    <?php include("header.php"); ?>

    <section>
        <div class="contact-form">
            <h2 class="register-head">Register</h2>
            <form action="#" method="GET">
                <label for="fname"> Name:</label>
                <input type="text" id="fname" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="lname">Password:</label>
                <input type="password" id="lname" name="password" required>

                <label for="lname">City:</label>
                <input type="text" id="lname" name="city" required>

                <div class="rd">
                    Newsletter Subscription:
                    <input type="radio" name="sub" value="1"> Yes </input>
                    <input type="radio" name="sub" value="0"> No </input>
                </div>

                <button type="submit" name="btnSubmit">Submit</button>
                <br>
            </form>

            <?php
            if (isset($_GET['btnSubmit'])) {
                $name = $_GET['name'];
                $email = $_GET['email'];
                $password = $_GET['password'];
                $city = $_GET['city'];
                $sub = $_GET['sub'];

                $sql = "INSERT INTO member (id,name,email,password,city,subscription,usertype) VALUES (NULL,'$name','$email','$password','$city','$sub',1) ";
                $result = $conn->query($sql);

                if ($result) {
                    echo "<script type='text/javascript'>alert('Registered Successfully');</script>";
                    session_start();
                    $_SESSION['email'] = $email;
                    header("Location: index.php");
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }

            ?>

            <div class="privacy-policy">
                <input type="checkbox" id="privacy" name="privacy" required>
                <label for="privacy">I have read and agree to the <a href="privacy-policy.html" target="_blank">Privacy Policy</a>.</label>
            </div>

            <br>
        </div>
    </section>

    <footer>
        <p>You are here: Social Media App</p>
    </footer>

    <?php include("footer.php") ?>
</body>

</html>