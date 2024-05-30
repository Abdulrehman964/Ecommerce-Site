<?php
if(!isset($_SESSION['buyer']))
{
    
    redirect("login.php",'Login to continue');
}
?>