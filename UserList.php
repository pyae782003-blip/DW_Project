<!DOCTYPE html>
<html lang="en">
<?php 

include("dbconnect.php");


$sql="SELECT * from member";
$result=$conn->query($sql);

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>SMC Ltd. - User Lists</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <?php include("adminheader.php"); ?>

    <?php 
        if($result->num_rows>0)
        {
        ?>
    <section>
        <div class="contact-form">
            <h2>Member List</h2>
            <table border="1">
                <tr>
                    <th> Name</th>
                    <th>Login Email</th>
                    <th>City</th>
                    <th>NewsLetter Subscription</th>
                    <th>User Type</th>
                </tr>
                <?php 
                    while($row=$result->fetch_assoc())
                    {
                ?>
                <tr>
                    <td> <?php echo $row['name']; ?> </td>
                    <td> <?php echo $row['email']; ?></td>
                    <td> <?php echo $row['city']; ?></td>
                    <td> <?php echo $row['subscription']==1? "Yes":"No"; ?></td>
                    <td> <?php echo $row['usertype']==1? "Member":"Admin" ?></td>
                </tr>
                <?php 
                    }
                ?>
            </table>

        </div>
    </section>
    <?php 
        }
        ?>
    <br><br><br><br><br>
    <footer>
        <p>You are here: User List</p>
    </footer>
    <?php include("footer.php"); ?>
</body>

</html>