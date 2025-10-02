<!DOCTYPE html>
<html lang="en">
<?php 
 include("dbconnect.php");

 if(isset($_POST['btnCreate']))
 {
    $desc=$_POST['desc'];
    $inforn=$_POST['inform'];
    if(isset($_FILES["file"]) && $_FILES["file"]["error"]==0)
    {
        // Real file name
        $filename = $_FILES["file"]["name"];
        // file path
        $filepath = $_FILES["file"]["tmp_name"];
    }


    $sql="INSERT INTO services (id, description, information,image) VALUES (NULL,'$desc','$inforn','$filename') ";
    $result = $conn->query($sql);

    if ($result) {
        echo "<script type='text/javascript'>alert('Social Media Created Successfully');</script>";
        move_uploaded_file($filepath, 'images/' . $filename);
        header("Location: ServicesSetup.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
 }
 // the related data row will be updated when Update button is clicked
 if (isset($_POST['btnEdit'])) {
    // $id = $_POST['id'];
    $Eid = $_GET['edit_id'];
    $desc=$_POST['desc'];
    $inforn=$_POST['inform'];
    if(isset($_FILES["file"]) && $_FILES["file"]["error"]==0)
    {
        // Real file name
        $filename = $_FILES["file"]["name"];
        // file path
        $filepath = $_FILES["file"]["tmp_name"];
    }

    if(!empty($filename)){
        $sql_update = "UPDATE services SET description = '$desc', information = '$inforn', image='$filename' WHERE id = '$Eid'";
    }else{
        $sql_update = "UPDATE services SET description = '$desc', information = '$inforn', image='$filename' WHERE id = '$Eid'";

    }
    $sql_update = "UPDATE services SET description = '$desc', information = '$inforn', image='$filename' WHERE id = '$Eid'";
    $result_query = $conn->query($sql_update);


    if ($result_query) {
        echo "<script>alert('Hotel Updated');</script>";
        move_uploaded_file($filepath, 'images/' . $filename);
        header("Location: ServicesSetup.php");
    } else {
        echo "Error: " . $sql_update . "<br>" . $conn->error;
    }
}

// the related data row will be deleted when Delete button is clicked
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $sql = "DELETE FROM services WHERE id = $id";
    $result = $conn->query($sql);

    if ($result) {
        echo "Deleted Successfully";
        header("Location: ServicesSetup.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// the id of the row will be selected (and show in url) when Edit button is clicked
if (isset($_GET['edit_id'])) {
    $Eid = $_GET['edit_id'];
    $sql = "SELECT * FROM services WHERE id = $Eid";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

$sql = "SELECT * FROM services";
$result = $conn->query($sql);

//  $sql1="SELECT * from socialmedia";
//  $result = $conn->query($sql1);

?>



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>SMC Ltd. - Contact</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <?php include("adminheader.php"); ?>

    <section class="services-container">
        <div class="contact-form">
            <h2>Service Set up</h2>
            <form action="#" method="post" enctype="multipart/form-data">
                <label for="fname">Description:</label>
                <textarea id="message" name="desc" rows="4" required></textarea>

                <label for="lname">Information:</label>
                <textarea id="message" name="inform" rows="4" required></textarea>

                <label for="email">Image:</label>
                <input type="file" id="email" name="file" required>


                <!-- <button type="submit">Submit</button> -->
                <?php if(isset($_GET['edit_id'])) {
                ?>
                    <input type="submit" class="form-control" name="btnEdit" value="Update ">

                <?php
                } else {
                ?>
                    <input type="submit" class="form-control" name="btnCreate" value="Create">
                <?php
                }
                ?>
                <br>
            </form>
            <br>


            <h2> Service Setup List </h2>
            <?php 
            if($result->num_rows>0)
                {
            ?>


         
           <table border="2">
            <tr>
                <th>ID</th>
                <th>Description</th>
                <th>Information</th>
                <th>Image</th>
                <th>Action</th>
            
            </tr>
            <?php
                while($row = $result->fetch_assoc())
                {
            ?>

            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['information']; ?></td>
                <td><img src="<?php echo "images\\" . $row['image']; ?>" alt="pic" width="100px" height="100px"></td>
                <td>
                    <a href="./ServicesSetup.php?edit_id=<?php echo $row['id']; ?>">
                        <i class="fi fi-rr-edit"></i>
                            &nbsp;Edit |
                    </a>
                    <a href="./ServicesSetup.php?delete_id=<?php echo $row['id']; ?>">
                        <i class="fi fi-rr-trash"></i>
                         &nbsp;Delete
                    </a>
                </td>

            </tr>
            <?php 
                }
            ?> 
        </table>
        <?php 
            }
        ?>
        
        </div>
        

    </section>
    <br><br><br><br><br>
    <footer>
        <p>You are here: Services Setup</p>
    </footer>
    <?php include("footer.php"); ?>

</body>

</html>