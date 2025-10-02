<?php
    session_start();
    include("dbconnect.php")  ;  
    $email= $_POST['username'];
    $password= $_POST['password'];
    $admin=0;
    $user=1;

    $sql = "SELECT * FROM member WHERE email='".$email."' AND password='".$password."' AND usertype='".$admin."'";
    $output = $conn->query($sql);

    if ($output->num_rows>0)
    {
        $_SESSION['email'] =$email;
        header ('Location:AdminHome.php');
    }
    elseif(!isset($_SESSION['email']))
    {
        $sql = "SELECT * FROM member WHERE email='".$email."' AND password='".$password."' AND usertype='".$user."'";
        $output = $conn->query($sql);

        if ($output->num_rows>0)
        {
            $_SESSION['email'] =$email;
            header ('Location:index.php');
        }

        else{
 
            if(!isset($_SESSION['attempt'])){
                $_SESSION['attempt'] = 0;
            }
            
            $_SESSION['attempt'] += 1;
            
            if($_SESSION['attempt'] === 3){
                $_SESSION['msg'] = "3 Times Login Failed! And Your Login is disabled. Please wait 10 minutes.";
                $_SESSION['check'] = 1;
                $_SESSION['attempt_again'] = time() + (1*60); //1*60 = 1mins, 10*60 = 10mins
            }
            else{
                $_SESSION['msg'] = "Invalid Username and Password!";
              
            }
         
            header('location:login.php');
        }
    }
    
   
?>