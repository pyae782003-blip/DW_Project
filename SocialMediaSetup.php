<!DOCTYPE html>
<html lang="en">

<?php
include("dbconnect.php");


if (isset($_POST['btnCreate'])) {
    $smname = $_POST['smname'];
    $link = $_POST['smlink'];
    $plink = $_POST['smplink'];
    if (isset($_FILES["logofile"]) && $_FILES["logofile"]["error"] == 0) {
        $filename = $_FILES["logofile"]["name"];
        $filepath = $_FILES["logofile"]["tmp_name"];
    }

    $sql = "INSERT INTO socialmedia (id, name, loginlink, privacylink, logo) VALUES (NULL, '$smname', '$link', '$plink', '$filename')";
    $result = $conn->query($sql);

    if ($result) {
        echo "<script>alert('Social Media Created Successfully');</script>";
        move_uploaded_file($filepath, 'images/' . $filename);
        header("Location: SocialMediaSetup.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST['btnEdit'])) {
    $Eid = $_GET['edit_id'];
    $name = $_POST['smname'];
    $link = $_POST['smlink'];
    $plink = $_POST['smplink'];

    if (isset($_FILES["logofile"]) && $_FILES["logofile"]["error"] == 0) {
        $filename = $_FILES["logofile"]["name"];
        $filepath = $_FILES["logofile"]["tmp_name"];
    }

    if (!empty($filename)) {
        $sql_update = "UPDATE socialmedia SET name = '$name', loginlink = '$link', privacylink = '$plink', logo='$filename' WHERE id = '$Eid'";
    } else {
        $sql_update = "UPDATE socialmedia SET name = '$name', loginlink = '$link', privacylink = '$plink' WHERE id = '$Eid'";
    }

    $result_query = $conn->query($sql_update);

    if ($result_query) {
        echo "<script>alert('Social Media Updated');</script>";
        if (!empty($filename)) move_uploaded_file($filepath, 'images/' . $filename);
        header("Location: SocialMediaSetup.php");
    } else {
        echo "Error: " . $sql_update . "<br>" . $conn->error;
    }
}

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $sql = "DELETE FROM socialmedia WHERE id = $id";
    $result = $conn->query($sql);

    if ($result) {
        echo "Deleted Successfully";
        header("Location: SocialMediaSetup.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['edit_id'])) {
    $Eid = $_GET['edit_id'];
    $sql = "SELECT * FROM socialmedia WHERE id = $Eid";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

$sql = "SELECT * FROM socialmedia";
$result = $conn->query($sql);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <title>Social Media Setup</title>
</head>

<body>
    <?php include("adminheader.php"); ?>

    <section>
        <div class="contact-form">
            <h2>Social Media Set up</h2>
            <form action="#" method="POST" enctype="multipart/form-data">
                <label for="fname">Social Media Name:</label>
                <input type="text" id="fname" name="smname" required>

                <label for="lname">Login Link:</label>
                <input type="text" id="lname" name="smlink" required>

                <label for="email">Privacy Setting Link:</label>
                <input type="text" id="email" name="smplink" required>

                <label for="message">Logo Image:</label>
                <input type="file" id="email" name="logofile" required>

                <?php if (isset($_GET['edit_id'])) { ?>
                    <input type="submit" class="form-control" name="btnEdit" value="Update">
                <?php } else { ?>
                    <input type="submit" class="form-control" name="btnCreate" value="Create">
                <?php } ?>
            </form>
        </div>

        <?php if ($result->num_rows > 0) { ?>
            <h2>Social Media List</h2>
            <table border="2">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Login Link</th>
                    <th>Privacy Link</th>
                    <th>Logo</th>
                    <th>Action</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['loginlink']; ?></td>
                        <td><?php echo $row['privacylink']; ?></td>
                        <td><img src="images/<?php echo $row['logo']; ?>" alt="Logo" width="100px" height="100px"></td>
                        <td>
                            <a href="./SocialMediaSetup.php?edit_id=<?php echo $row['id']; ?>">Edit</a> |
                            <a href="./SocialMediaSetup.php?delete_id=<?php echo $row['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        <?php } ?>
    </section>
    <footer>
        <p>You are here: Social Media Setup</p>
    </footer>
    <?php include("footer.php"); ?>
</body>

</html>
