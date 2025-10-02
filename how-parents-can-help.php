<!DOCTYPE html>
<html lang="en">

<?php
include("dbconnect.php");
include("header.php"); // Includes session_start() and user authentication

// Fetching parent help content
$sql1 = "SELECT * FROM parenthelp";
$parResult = $conn->query($sql1);

// Fetching subscription type for the logged-in user
$subType = 0;
if (!empty($email)) {
    $stmt = $conn->prepare("SELECT * FROM member WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resMember = $stmt->get_result();
    if ($resMember->num_rows > 0) {
        $row11 = $resMember->fetch_assoc();
        $subType = $row11['subscription'];
    }
    $stmt->close();
}

// Fetching newsletter content
$sql12 = "SELECT * FROM newsletter";
$newsResult = $conn->query($sql12);

// Handling subscription update
if (isset($_GET['btnSubscription'])) {
    $sub = $_GET['sub'];
    $sql22 = "UPDATE member SET subscription = '$sub' WHERE email= '$email'";
    if ($conn->query($sql22) === TRUE) {
        echo "Newsletter subscribed";
        header("location:./how-parents-can-help.php");
        exit;
    }
}
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>SMC Ltd. - How Parents Can Help</title>
    <link rel="stylesheet" href="./styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- Include Header -->
    <section class="parent-help-section">
        <div class="parent-container">
            <h1 class="parent-text">How To Help Your Children Stay Safe Online</h1>
        </div>

        <div class="safety-container">
            <?php while ($row = $parResult->fetch_assoc()) { ?>
                <div class="parent-div">
                    <img src="<?php echo "images/" . $row['image1']; ?>" alt="Featured Content" class="parent-img">
                    <p class="safe-text"><?php echo $row['description']; ?></p>
                </div>
            <?php } ?>
        </div>
    </section>

    <!-- Include Footer -->
    <footer>
        <p>You are here: How Parent Can Help</p>
    </footer>
    <?php include("footer.php"); ?>
</body>

</html>