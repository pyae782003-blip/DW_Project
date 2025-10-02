<!DOCTYPE html>
<html lang="en">
<?php
include("dbconnect.php");


if (isset($_POST['btnSubmit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contact (firstname, lastname, email, message) VALUES ('$fname', '$lname', '$email', '$message')";
    if ($conn->query($sql)) {
        echo "<script>alert('Message sent successfully!');</script>";
        header("location:contact.php");
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>SMC Ltd. - Contact</title>
    
</head>

<body class="contact-body">
    <?php include("header.php"); // Include header 
    ?>
    <section>
        <div class="contact-form">
            <h2 class="contactus">Contact Us</h2>
            <form action="contact.php" method="POST" class="contact-form">
                <label for="fname" class="lname">First Name:</label>
                <input type="text" id="fname" name="fname" class="text-field" required>

                <label for="lname" class="lname">Last Name:</label>
                <input type="text" id="lname" name="lname" class="text-field" required>

                <label for="email" class="lname">Email:</label>
                <input type="email" id="email" name="email" class="text-field" required>

                <label for="message" class="lname">Message:</label>
                <textarea id="message" name="message" rows="4" class="text-field" required></textarea>

                <div class="privacy-policy">
                    <input type="checkbox" id="privacy" name="privacy" required>
                    <label for="privacy">I have read and agree to the <a href="privacy-policy.html" target="_blank">Privacy Policy.</a></label>
                </div>

                <button type="submit" name="btnSubmit" class="btnContact">Contact</button>
            </form>
        </div>
    </section>
    <footer>
        <p>You are here: Contact</p>
    </footer>
    <?php include("footer.php"); // Including the footer 
    ?>
</body>

</html>