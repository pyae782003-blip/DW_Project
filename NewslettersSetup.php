<!DOCTYPE html>
<html lang="en">
<?php 
include("dbconnect.php");

if(isset($_POST['btnCreate']))
 {
    $des=$_POST['des'];
    // $timestamp = time();
    
    if(isset($_FILES["file"]) && $_FILES["file"]["error"]==0)
    {
        // Real file name
        $filename = $_FILES["file"]["name"];
        // file path
        $filepath = $_FILES["file"]["tmp_name"];
    }


    $sql="INSERT INTO newsletter (id, description, image1) VALUES (NULL,'$des','$filename') ";
    $result = $conn->query($sql);

    if ($result) {
        echo "<script type='text/javascript'>alert('Social Media Created Successfully');</script>";
        move_uploaded_file($filepath, 'images/' . $filename);
        header("Location: NewslettersSetup.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
 }


 // the related data row will be updated when Update button is clicked
 if (isset($_POST['btnEdit'])) {
    // $id = $_POST['id'];
    $Eid = $_GET['edit_id'];
    $des=$_POST['des'];
    if(isset($_FILES["file"]) && $_FILES["file"]["error"]==0)
    {
        // Real file name
        $filename = $_FILES["file"]["name"];
        // file path
        $filepath = $_FILES["file"]["tmp_name"];
    }

    if(!empty($filename)){
        $sql_update = "UPDATE newsletter SET description = '$des', image1='$filename' WHERE id = '$Eid'";
    }else{
        $sql_update = "UPDATE newsletter SET description = '$des', image1='$filename' WHERE id = '$Eid'";

    }
    $sql_update = "UPDATE newsletter SET description = '$des', image1='$filename' WHERE id = '$Eid'";
    $result_query = $conn->query($sql_update);


    if ($result_query) {
        echo "<script>alert('Hotel Updated');</script>";
        move_uploaded_file($filepath, 'images/' . $filename);
        header("Location: NewslettersSetup.php");
    } else {
        echo "Error: " . $sql_update . "<br>" . $conn->error;
    }
}

// the related data row will be deleted when Delete button is clicked
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $sql = "DELETE FROM newsletter WHERE id = $id";
    $result = $conn->query($sql);

    if ($result) {
        echo "Deleted Successfully";
        header("Location: NewslettersSetup.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// the id of the row will be selected (and show in url) when Edit button is clicked
if (isset($_GET['edit_id'])) {
    $Eid = $_GET['edit_id'];
    $sql = "SELECT * FROM newsletter WHERE id = $Eid";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}


 $sql1="SELECT * from newsletter";
 $result = $conn->query($sql1);

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


    <section>
        <div class="contact-form">
            <h2>Newsletter Set up</h2>
            <form action="#" method="post"  enctype="multipart/form-data">
                <label for="fname">Description:</label>
                <textarea id="message" name="des" rows="4" required></textarea>

                <label for="lname">Image:</label>
                <input type="file" id="lname" name="file" required>


                <!-- <button type="submit" name="btnSubmit">Submit</button> -->
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

        <h2> News Letter Setup </h2>
        <?php 
            if($result->num_rows>0)
            {
        ?>

        
        <table border="2">
            <tr>
                <th>Id</th>
                <th>Description</th>
                <th>Image</th>
                <th>Date</th>
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
                <td><?php echo $row['publishdate']; ?></td>
                <td>
                    <a href="./NewslettersSetup.php?edit_id=<?php echo $row['id']; ?>">
                        <i class="fi fi-rr-edit"></i>
                            &nbsp;Edit | 
                    </a>
                    <a href="./NewslettersSetup.php?delete_id=<?php echo $row['id']; ?>">
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
        <p>You are here: Newsletters Setup</p>
    </footer>
    <?php include("footer.php"); ?>
</body>

</html>