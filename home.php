<?php
include("dbconnect.php");
include("homeheader.php"); // Include header 
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

            
            <div class="brain-teen-container">
                <h3 class="brain-head">Negative Impact of Social Media on Teens' Mental Health</h3>
                <div class="brain-container">
                    <div class="teen-brain-container">
                        <img src="./images/n1.jpg" alt="" class="brain1">
                        <div class="teen-text">
                            <h4 class="brain-text">Cyberbullying</h4>
                            <p class="brain-para">
                            Social media can be a platform for cyberbullying, which has been linked to increased anxiety, depression, and suicidal thoughts.
                            </p>
                        </div>
                    </div>
                    <div class="teen-brain-container">
                        <img src="./images/n2.jpg" alt="" class="brain1">
                        <div class="teen-text">
                            <h4 class="brain-text">Sleep Disruption</h4>
                            <p class="brain-para">
                            Excessive use of social media, especially before bedtime, can disrupt sleep patterns
                            leading to sleep deprivation and its associated mental health issues.
                            </p>
                        </div>
                    </div>
                    <div class="teen-brain-container">
                        <img src="./images/n3.jpg" alt="" class="brain1">
                        <div class="teen-text">
                            <h4 class="brain-text">Addiction and Overuse</h4>
                            <p class="brain-para">
                            Spending excessive time on social media can lead to addiction, reducing time for physical activities, 
                            face-to-face interactions, and other healthy behaviors.
                            </p>
                        </div>
                    </div>
                    <div class="teen-brain-container">
                        <img src="./images/n4.png" alt="" class="brain1">
                        <div class="teen-text">
                            <h4 class="brain-text">Comparison and Self-Esteem</h4>
                            <p class="brain-para">
                            Teens often compare themselves to others on social media
                            which can lead to feelings of inadequacy and lower self-esteem.
                            </p>
                        </div>
                    </div>
                    <div class="teen-brain-container">
                        <img src="./images/n5.jpg" alt="" class="brain1">
                        <div class="teen-text">
                            <h4 class="brain-text">Exposure to Harmful Content</h4>
                            <p class="brain-para">
                            Teens may be exposed to harmful or inappropriate content
                            including violent or sexually explicit material, which can impact their mental well-being
                            </p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="brain-teen-container">
                <h3 class="brain-head">Top Safety Tips</h3>
                <div class="brain-container">
                    <div class="teen-brain-container">
                        <img src="./images/s1.png" alt="" class="brain1">
                        <div class="teen-text">
                            <h4 class="brain-text">Set Strong Passwords</h4>
                            <p class="brain-para">
                            Ensure each social media account has a unique and strong password. Use a combination of letters, numbers, and symbols.
                            </p>
                        </div>
                    </div>
                    <div class="teen-brain-container">
                        <img src="./images/r2.webp" alt="" class="brain1">
                        <div class="teen-text">
                            <h4 class="brain-text">Review Privacy Settings</h4>
                            <p class="brain-para">
                            Regularly check and adjust the privacy settings on your social platforms to control who can see your information and posts.
                            </p>
                        </div>
                    </div>
                    <div class="teen-brain-container">
                        <img src="./images/r3.jpg" alt="" class="brain1">
                        <div class="teen-text">
                            <h4 class="brain-text">Think Before Sharing</h4>
                            <p class="brain-para">
                            Be cautious about sharing personal information online. Think twice before posting details such as your address, phone number, or financial information.
                            </p>
                        </div>
                    </div>
                    <div class="teen-brain-container">
                        <img src="./images/r4.jpg" alt="" class="brain1">
                        <div class="teen-text">
                            <h4 class="brain-text">Report Suspicious Behavior</h4>
                            <p class="brain-para">
                            If you encounter any suspicious or inappropriate behavior, report and block the user. Prioritize your safety and the safety of others.
                            </p>
                        </div>
                    </div>
                    <div class="teen-brain-container">
                        <img src="./images/r5.png" alt="" class="brain1">
                        <div class="teen-text">
                            <h4 class="brain-text">Verify Requests</h4>
                            <p class="brain-para">
                            Verify friend requests and follow requests. Ensure you know the person before accepting connections on social media.
                            </p>
                        </div>
                    </div>
                    <div class="teen-brain-container">
                        <img src="./images/r6.webp" alt="" class="brain1">
                        <div class="teen-text">
                            <h4 class="brain-text">Be Mindful of Phishing</h4>
                            <p class="brain-para">
                            Avoid clicking on suspicious links or providing personal information in response to unsolicited messages. Be aware of phishing attempts.
                            </p>
                        </div>
                </div>
            </div>


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