<!DOCTYPE html>
<html lang="en">
<?php 
 include("dbconnect.php");

 if(isset($_POST['btnCreate']))
 {
    $des=$_POST['des'];
    if(isset($_FILES["file1"]) && $_FILES["file1"]["error"]==0 && isset($_FILES["file2"]) && $_FILES["file2"]["error"]==0)
    {
        // Real file name
        $filename1 = $_FILES["file1"]["name"];
        // file path
        $filepath1 = $_FILES["file1"]["tmp_name"];
        // Real file name
        $filename2 = $_FILES["file2"]["name"];
        // file path
        $filepath2 = $_FILES["file2"]["tmp_name"];
    }


    $sql="INSERT INTO parenthelp (id, description, image1, image2) VALUES (NULL,'$des','$filename1','$filename2') ";
    $result = $conn->query($sql);

    if ($result) {
        echo "<script type='text/javascript'>alert('Parent help set up Successfully');</script>";
        move_uploaded_file($filepath1, 'images/' . $filename1);
        move_uploaded_file($filepath2, 'images/' . $filename2);
        header("Location: HowParentsCanHelpSetup.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
 }

 // the related data row will be updated when Update button is clicked
 if (isset($_POST['btnEdit'])) {
    // $id = $_POST['id'];
    $Eid = $_GET['edit_id'];
    $des = $_POST['des'];
    // $hrate = $_POST['rating'];
    if(isset($_FILES["file1"]) && $_FILES["file1"]["error"]==0 && isset($_FILES["file2"]) && $_FILES["file2"]["error"]==0)
    {
        // Real file name
        $filename1 = $_FILES["file1"]["name"];
        // file path
        $filepath1 = $_FILES["file1"]["tmp_name"];
        // Real file name
        $filename2 = $_FILES["file2"]["name"];
        // file path
        $filepath2 = $_FILES["file2"]["tmp_name"];
    }

    if(!empty($filename1 && $filename2)){
        $sql_update = "UPDATE parenthelp SET description = '$des', image1='$filename1', image2='$filename2' WHERE id = '$Eid'";
    }else{
        $sql_update = "UPDATE parenthelp SET description = '$des', image1='$filename1', image2='$filename2' WHERE id = '$Eid'";

    }
    // $sql_update = "UPDATE socialmedia SET name = '$name', loginlink = '$link',  privacylink = '$plink' WHERE id = '$Eid'";
    $result_query = $conn->query($sql_update);


    if ($result_query) {
        echo "<script>alert('Hotel Updated');</script>";
        move_uploaded_file($filepath1, 'images/' . $filename1);
        move_uploaded_file($filepath2, 'images/' . $filename2);
        header("Location: HowParentsCanHelpSetup.php");
    } else {
        echo "Error: " . $sql_update . "<br>" . $conn->error;
    }
}

// the related data row will be deleted when Delete button is clicked
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $sql = "DELETE FROM parenthelp WHERE id = $id";
    $result = $conn->query($sql);

    if ($result) {
        echo "Deleted Successfully";
        header("Location: HowParentsCanHelpSetup.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// the id of the row will be selected (and show in url) when Edit button is clicked
if (isset($_GET['edit_id'])) {
    $Eid = $_GET['edit_id'];
    $sql = "SELECT * FROM parenthelp WHERE id = $Eid";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

$sql1="SELECT * from parenthelp";
$result = $conn->query($sql1);

 

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>SMC Ltd. - How Parents Can help Set up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php include("adminheader.php"); ?>


    <section>
        <div class="contact-form">
            <h2>How Parent Help Set up</h2>
            <form action="#" method="POST" enctype="multipart/form-data"> 
                <label for="fname">Description:</label>
                <textarea id="message" name="des" rows="4" required></textarea>

                <label for="lname">Image 1 :</label>
                <input type="file" id="lname" name="file1" required>

                <label for="email">Image 2:</label>
                <input type="file" id="email" name="file2" required>

                <!-- <button type="submit" name="btnSubmit">Submit</button> -->
                <?php if (isset($_GET['edit_id'])) {
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
        </div>
        <?php 
            if($result->num_rows>0)
            {
        ?>
        <h2> Parents help Set up Lists </h2>
        <table border="2">
            <tr>
                <th>Id</th>
                <th>Description</th>
                <th>Image1</th>
                <th>Image2</th>
                <th>Action</th>
            </tr>
            <?php
                while($row = $result->fetch_assoc())
                {
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><img src="<?php echo "images\\" . $row['image1']; ?>" alt="pic" width="100px" height="100px"></td>
                <td><img src="<?php echo "images\\" . $row['image2']; ?>" alt="pic" width="100px" height="100px"></td>
                <td>
                    <a href="./HowParentsCanHelpSetup.php?edit_id=<?php echo $row['id']; ?>">
                        <i class="fa-solid fa-pen-to-square"></i>Edit 
                          
                    </a>
                    <a href="./HowParentsCanHelpSetup.php?delete_id=<?php echo $row['id']; ?>">
                        <i class="fa-solid fa-trash"></i>Delete
                        
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
    </section>
    <br><br><br><br><br>
    <footer>
        <p>You are here: How Parents Can Help Setup</p>
    </footer>
    <?php include("footer.php"); ?>
    

</body>

</html>