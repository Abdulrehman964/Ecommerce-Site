<?php

session_start();
include('../config/dbcon.php');
include('myfunctions.php');

if(isset($_POST['register_btn']))
{
    $username = $_POST['username'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    
    $_SESSION['username']=$username;
    $_SESSION['fname']=$fname;
    $_SESSION['lname']=$lname;
    $_SESSION['address']=$address;
    $_SESSION['phoneno']=$phone;
    $_SESSION['email']=$email;

    $sql = "SELECT email FROM buyers WHERE email='$email' ;";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result)>0)
    {
        unset($_SESSION['email']);
        $_SESSION['message'] = "Email already registered";
            header('Location: ../register.php');
    }
    else
    {
        $sql="SELECT username from buyers where username='$username';";
        $result=mysqli_query($con,$sql);

        if(mysqli_num_rows($result)>0)
        {
            unset($_SESSION['username']);
            $_SESSION['message']="Username already taken";
            header('location : ../register.php');
        }
        else
        {
            if($password == $cpassword)
            {
            $insert_query =  "INSERT INTO buyers(username,fname,lname,address,email,phone,password,role_as) VALUES ('$username','$fname','$lname','$address','$email','$phone','$password',0)";
            $insert_query_run = mysqli_query($con, $insert_query);

                if($insert_query_run)
                {
                    session_unset();
                    $_SESSION['message'] = "Registration Successfull";
                    header('Location: ../login.php');
                }
                else
                {
                    $_SESSION['message'] = "Registration UnSuccessfull try again";
                    header('Location: ../Register.php');
                }
            }
            else
            {
                $_SESSION['message'] = "Password unmatched";
                header('Location: ../register.php');
            }
        }
    }
}
else if(isset($_POST['login_btn']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];

    $sql="select * from buyers where password = '$password' and (username='$email' or email='$email');";
    $result=mysqli_query($con,$sql);
                                        
    if(mysqli_num_rows($result) > 0)
    {
        $_SESSION['buyer']=true;
        $userdata= mysqli_fetch_assoc($result);
        $userid=$userdata['id'];
        $username=$userdata['username'];
        $useremail=$userdata['email'];
        $role_as=$userdata['role_as'];

        $_SESSION['buyer_user']=[
            'user_id'=>$userid,
            'name'=>$username,
            'email'=>$useremail
        ];

        $_SESSION['role_as']=$role_as;
        if($role_as == 0 )
        {
            redirect("../index.php","Logged in Successfully");
        }
        else
        {
            redirect("../admin/index.php","Welcome to Dashboard");
        }
    }
    else
    {
        redirect("../login.php","Invalid Login Credentials");
    }
}
else if(isset($_POST['register_seller_btn']))
{
    $username = $_POST['username'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $shopaddress = $_POST['shop_address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    
    $_SESSION['username']=$username;
    $_SESSION['fname']=$fname;
    $_SESSION['lname']=$lname;
    $_SESSION['shop_address']=$shopaddress;
    $_SESSION['phoneno']=$phone;
    $_SESSION['email']=$email;

    $sql = "SELECT email FROM seller WHERE email='$email' ;";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result)>0)
    {
        unset($_SESSION['email']);
        $_SESSION['message'] = "Email already registered";
            header('Location: ../register.php');
    }
    else
    {
        $sql="SELECT username from seller where username='$username';";
        $result=mysqli_query($con,$sql);

        if(mysqli_num_rows($result)>0)
        {
            unset($_SESSION['username']);
            $_SESSION['message']="Username already taken";
            header('location : ../register.php');
        }
        else
        {
            if($password == $cpassword)
            {
            $insert_query =  "INSERT INTO seller(username,fname,lname,shop_address,email,phone,password,role_as) VALUES ('$username','$fname','$lname','$shopaddress','$email','$phone','$password',0)";
            $insert_query_run = mysqli_query($con, $insert_query);

                if($insert_query_run)
                {
                    session_unset();
                    $_SESSION['message'] = "Registration Successfull";
                    header('Location: ../login_seller.php');
                }
                else
                {
                    $_SESSION['message'] = "Registration UnSuccessfull try again";
                    header('Location: ../Register_seller.php');
                }
            }
            else
            {
                $_SESSION['message'] = "Password unmatched";
                header('Location: ../register_seller.php');
            }
        }
    }
}
else if(isset($_POST['login_seller_btn']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];

    $sql="select * from buyers where password = '$password' and (username='$email' or email='$email');";
    $result=mysqli_query($con,$sql);
                                        
    if(mysqli_num_rows($result) > 0)
    {
        $_SESSION['seller']=true;
        $userdata= mysqli_fetch_assoc($result);
        $userid=$userdata['id'];
        $username=$userdata['username'];
        $useremail=$userdata['email'];
        $role_as=$userdata['role_as'];

        $_SESSION['seller_user']=[
            'user_id'=>$userid,
            'name'=>$username,
            'email'=>$useremail
        ];

        $_SESSION['role_as']=$role_as;
        if($role_as == 0 )
        {
            redirect("../sellers/index.php","Logged in Successfully");
        }
        else
        {
            redirect("../admin/index.php","Welcome to Dashboard");
        }
    }
    else
    {
        redirect("../login.php","Invalid Login Credentials");
    }
}
?>