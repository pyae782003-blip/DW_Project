<?php
$conn=new mysqli("localhost","root","","smc1");
if($conn->connect_error)
{
    die("Connection Failed".$conn->connect_error);
}
// else{
//     echo "Connection Successful";
// }

?>

