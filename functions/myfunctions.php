<?php
//session_start();
include('../config/dbcon.php');

function getall($table)
{
    global $con;
    $sql = "SELECT * from $table";
    return mysqli_query($con, $sql);
}

function getbyID($table,$id)
{
    global $con;
    $sql = "SELECT * from $table where id='$id';";
    return mysqli_query($con, $sql);
}

function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location: ' .$url);
    exit();
}

function getALLOrders()
{
  
    global $con;
    $query = "SELECT * from orders where status= '0' ";
    return $query_run = mysqli_query($con, $query);
}

function checkTrackingNoValid($trackingNo)
{
    global $con;

    $query = "SELECT * FROM orders WHERE tracking_no='$trackingNo'  ";
    return $query_run = mysqli_query($con,$query);
}

?>