<?php
include("dbconnect.php");
include("header.php"); // Include header 
// Retrieve the session email

// Query 1: Fetch all services
$sql = "SELECT * FROM services";
$serResult = $conn->query($sql);

// Query 2: Fetch all parent help resources
$sql1 = "SELECT * FROM parenthelp";
$parResult = $conn->query($sql1);

// Query 3: Get the subscription type for the logged-in user
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

// Query 4: Fetch newsletters
$sql12 = "SELECT * FROM newsletter";
$newsResult = $conn->query($sql12);

// Update Query: Update the subscription type
if (isset($_GET['btnSubscription'])) {
    $sub = $_GET['sub'];
    $sql22 = "UPDATE member SET subscription = '$sub' WHERE email = '$email'";
    if ($conn->query($sql22) === TRUE) {
        echo "<script>alert('Newsletter subscription updated successfully!');</script>";
        header("location:index.php");
        exit;
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMC Ltd. - Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="./style.css"> <!-- Link external CSS file -->
    
    
</head>

<body class="admin-body">
    <main class="index-main">
        <section>
            <?php if ($serResult->num_rows > 0) { ?>
                <h2>Available Services</h2>
                <div class="services">
                    <?php while ($row2 = $serResult->fetch_assoc()) { ?>
                        <div class="service-item">
                            <img src="images/<?php echo htmlspecialchars($row2['image']); ?>" alt="Service Image" class="service-img">
                            <div>
                                <h4><?php echo htmlspecialchars($row2['description']); ?></h4>
                                <p><?php echo htmlspecialchars($row2['information']); ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>

            <?php if ($parResult->num_rows > 0) { ?>
                <h2>How to Help Your Children Stay Safe Online</h2>
                <div class="parent-help">
                    <?php while ($row = $parResult->fetch_assoc()) { ?>
                        <div class="help-item">
                            <img src="images/<?php echo htmlspecialchars($row['image1']); ?>" alt="Parent Help Image">
                            <p><?php echo htmlspecialchars($row['description']); ?></p>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>

            <?php if ($subType == 1) { ?>
                <h2>Newsletters</h2>
                <div class="newsletters">
                    <?php while ($row33 = $newsResult->fetch_assoc()) { ?>
                        <div class="newsletter-item">
                            <img src="images/<?php echo htmlspecialchars($row33['image1']); ?>" alt="Newsletter Image">
                            <p><?php echo htmlspecialchars($row33['description']); ?></p>
                            <p>Published on: <?php echo htmlspecialchars($row33['publishdate']); ?></p>
                        </div>
                    <?php } ?>
                </div>
            <?php } else { ?>
                <form action="#" method="GET">
                    <div class="subscription">
                        <p>Newsletter Subscription:</p>
                        <label><input type="radio" name="sub" value="1"> Yes</label>
                        <label><input type="radio" name="sub" value="0"> No</label>
                    </div>
                    <button type="submit" name="btnSubscription">Submit</button>
                </form>
            <?php } ?>
            <div class="brain-teen-container">
                <h3 class="brain-head">Teen Brain and Social Media</h3>
                <div class="brain-container">
                    <div class="teen-brain-container">
                        <img src="./images/b2.jpg" alt="" class="brain1">
                        <div class="teen-text">
                            <h4 class="brain-text">Cognitive Effects</h4>
                            <p class="brain-para">
                                The vast amount of information available on social media can lead to cognitive overload,
                                making it difficult for adolescents to process and retain information effectively.
                            </p>
                        </div>
                    </div>
                    <div class="teen-brain-container">
                        <img src="./images/b3.jpg" alt="" class="brain1">
                        <div class="teen-text">
                            <h4 class="brain-text">Emotional Effects</h4>
                            <p class="brain-para">
                                Social media often showcases idealized images and lifestyles, leading to comparisons that can negatively affect adolescents' self-esteem and body image.
                                This can contribute to feelings of inadequacy and dissatisfaction with their own lives.
                            </p>
                        </div>
                    </div>
                    <div class="teen-brain-container">
                        <img src="./images/b4.webp" alt="" class="brain1">
                        <div class="teen-text">
                            <h4 class="brain-text">Social Effects</h4>
                            <p class="brain-para">
                                Social media can amplify peer pressure, as adolescents may feel compelled to conform to the behaviors and expectations of their online peers.
                                This can influence their decisions and behaviors, sometimes in harmful ways.
                            </p>
                        </div>
                    </div>
                    <div class="teen-brain-container">
                        <img src="./images/b5.jpg" alt="" class="brain1">
                        <div class="teen-text">
                            <h4 class="brain-text">Neurobiological Effects</h4>
                            <p class="brain-para">
                                Excessive social media use, especially before bedtime, can disrupt sleep patterns.
                                The blue light emitted from screens can interfere with melatonin production, leading to difficulties in falling and staying asleep.t difficult for adolescents to process and retain information effectively.
                            </p>
                        </div>
                    </div>
                    <div class="teen-brain-container">
                        <img src="./images/b6.jpg" alt="" class="brain1">
                        <div class="teen-text">
                            <h4 class="brain-text">Brain Development Changes</h4>
                            <p class="brain-para">
                                It affects regions associated with social rewards and punishments, emotional processing, and judgment.
                                These changes can lead to increased sensitivity to social cues and a heightened need for frequent stimulation
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </main>
    <footer>
        <p>You are here: Home</p>
       
    </footer>

    <?php include("footer.php"); // Include footer 
    ?>
</body>

</html>