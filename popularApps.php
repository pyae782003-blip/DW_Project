<!DOCTYPE html>
<html lang="en">
<?php
include("dbconnect.php");
include("header.php");

// search button
if (isset($_POST['btnSearch'])) {
    $search = $_POST['search'];
    $sql1 = "SELECT * FROM socialmedia WHERE name LIKE '%$search%' OR loginlink LIKE '%$search%' OR privacylink LIKE '%$search%'";
    $socialmediaResult = $conn->query($sql1);
} else {
    $sql1 = "SELECT * FROM socialmedia";
    $socialmediaResult = $conn->query($sql1);
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>SMC Ltd. - Popular Apps</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="admin-body">
    <section class="media-container">
        <div class="search-bar">
            <form action="#" method="POST">
                <label for="search">Search:</label>
                <input type="text" id="search" name="search" placeholder="Search by app name or links">
                <button type="submit" name="btnSearch">Search</button>
            </form>
        </div>

        <h2 class="app-head-text">Popular Social Media Apps</h2>
        <?php
        if ($socialmediaResult->num_rows > 0) {
        ?>
            <div class="social-media">
                <?php
                while ($row = $socialmediaResult->fetch_assoc()) {
                ?>
                    <div class="social-container">
                        <div class="apps">
                            <img src="images/<?php echo htmlspecialchars($row['logo']); ?>" alt="App Logo" class="app-img">
                            <p class="app-text">Login Link: <a href="<?php echo htmlspecialchars($row['loginlink']); ?>" target="_blank">Login</a></p>
                            <p class="app-text">Privacy Setting Link: <a href="<?php echo htmlspecialchars($row['privacylink']); ?>" target="_blank">Privacy Settings</a></p>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        <?php
        }
        ?>
    </section>
    <footer>
        <p>You are here: Social Media App</p>
    </footer>

    <?php include("footer.php") ?>
</body>

</html>