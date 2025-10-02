<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>SMC Ltd. - Livestreaming</title>
    
</head>

<body>
    <!-- Include Header -->
    <?php include("header.php"); ?>

    <div class="video-container">
        <video width="100%" height="240" controls autoplay>
            <source src="./images/security.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <div class="center-text">
        <h3>Top Tips for Safe Livestreaming:</h3>
    </div>
    <div class="live-stream">
        <div class="stream-container">
            <img src="./images/live1.png" alt="Set Privacy Setting" class="stream1-image">
            <div class="live-text">
                <h3>Set Privacy Setting</h3>
                <p>
                    Adjust the privacy settings of your livestream platform to control who can view your broadcasts.
                    Limiting access to friends or followers can help create a more secure environment.
                </p>
            </div>
        </div>

        <div class="stream-container">
            <img src="./images/live2.avif" alt="Be Mindful of Personal Information" class="stream1-image">
            <div class="live-text">
                <h3>Be Mindful of Personal Information:</h3>
                <p>
                    Avoid sharing sensitive personal information during livestreams. This includes details such as
                    your home address, phone number, school name, and other private details that could compromise your safety.
                </p>
            </div>
        </div>

        <div class="stream-container">

            <img src="./images/live3.png" alt="" class="stream1-image">

            <div class="live-text">
            <h3>Interact Responsibly:</h3>
            <p>
                Encourage positive and respectful interactions with your livestream audience. Set ground rules for
                appropriate behavior in the chat and address any inappropriate comments promptly.
            </p>


            </div>
            


        </div>

        <div class="stream-container">

            <img src="./images/live4.svg" alt="" class="stream1-image">
            <div class="live-text">
            <h3>Monitor Comments:</h3>
            <p>
                Regularly check and moderate comments to prevent the spread of inappropriate content or cyberbullying.
                Create a supportive community by fostering positive communication among your viewers.
            </p>


            </div>


        </div>

        <div class="stream-container">
            <img src="./images/s2.jpg" alt="" class="stream1-image">
           
            <div class="live-text">
            <h3>Secure Accounts:</h3>
            <p>
                Use strong, unique passwords for all accounts and consider using a password manager.
                Enable two-factor authentication (2FA) where possible to add an extra layer of security.
            </p>


            </div>
            



        </div>


        <div class="stream-container">

            <img src="./images/live5.webp" alt="" class="stream1-image">
            <div class="live-text">
            <h3>Takes Break:</h3>
            <p>
                Livestreaming for extended periods can be tiring. Prioritize your well-being by taking breaks to rest,
                hydrate, and recharge. Don't hesitate to step away from the camera when needed.
            </p>


            </div>



        </div>


        <!-- Add additional tips as needed -->
    </div>

    <!-- Include Footer -->
    <footer>
        <p>You are here: Livestreaming</p>
    </footer>
    <?php include("footer.php"); ?>
</body>

</html>