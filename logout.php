<?php
session_start();
if(isset($_SESSION['buyer']))
{
    unset($_SESSION['buyer']);
    unset($_SESSION['buyer_user']);
    
    $_SESSION['message'] = "Logged out successfully";
}

else if(isset($_SESSION['seller']))
{
    unset($_SESSION['seller']);
    unset($_SESSION['seller_user']);
    
    $_SESSION['message'] = "Logged out successfully";
}
header('Location: index.php');
?>