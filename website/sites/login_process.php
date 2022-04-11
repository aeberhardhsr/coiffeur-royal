<?php
session_start();
require_once('db.php');
    if(isset($_POST['Login'])) 
    {
        if(empty($_POST['Uemail']) || empty($_POST['Upassword']))
        {
            header("Location:../index.php?Empty= Bitte Login Daten angeben"); 
        }
        else
        {
            $secure_upass = $_POST['Upassword'];
            $secure_upass = sha1($secure_upass);
            $query = "SELECT * FROM staff_user WHERE staff_user_email ='".$_POST['Uemail']."' AND staff_user_password='$secure_upass'";
            $result = mysqli_query($db_conn, $query);

            if(mysqli_fetch_assoc($result))
            {
                $_SESSION['User']=$_POST['Uemail'];
                header("Location:dashboard.php");
            }
            else 
            {
                header("Location:../index.php?Invalid= Login ungültig");
            }
        }
    }
    else
    {
        echo "Not Working";
    }


?>