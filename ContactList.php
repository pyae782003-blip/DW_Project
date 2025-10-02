<!DOCTYPE html>
<html lang="en">
<?php 

include("dbconnect.php");


$sql="SELECT * from contact";
$result=$conn->query($sql);

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>SMC Ltd. - Contact</title>
</head>

<body>
    <?php include("adminheader.php"); ?>


    <section>
        <?php 
        if($result->num_rows>0)
        {
        ?>
        <div class="contact-form">
            <h2>Contact List</h2>
            <table border="1">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Message</th>
                </tr>
                <?php 
                    while($row=$result->fetch_assoc())
                    {
                ?>
                <tr>
                    <td> <?php echo $row['firstname']; ?> </td>
                    <td> <?php echo $row['lastname']; ?></td>
                    <td> <?php echo $row['email']; ?></td>
                    <td> <?php echo $row['message']; ?></td>
                </tr>
                <?php 
                    }
                ?>
            </table>

            <br>
        </div>
        <?php 
        }
        ?>
    </section>
    <br><br><br><br><br>
    <footer>
        <p>You are here: Contact List</p>
    </footer>
    <?php include("footer.php"); ?>
</body>

</html>