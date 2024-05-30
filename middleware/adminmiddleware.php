<?php

session_start();
include('../functions/myfunctions.php');
if(isset($_SESSION['buyer']))
{
    if($_SESSION['role_as'] != 1)
    {
        redirect("../index.php", "You are to not authorized to access");
    }
}
else if(isset($_SESSION['seller']))
{
    if($_SESSION['role_as']!=0)
    {
        redirect("../index.php", "Go to Admin Dashboard");
    }
}
else
{
    redirect("../login.php", "login to continue");
    
}
?>