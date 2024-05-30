<?php 

include('includes/header.php');
if(isset($_SESSION['buyer']))
{
    $_SESSION['message'] = "You are already logged in";
    header('Location: index.php');
    exit();
} 
?>
    <div class="ph-5">
    
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <?php
                    if(isset($_SESSION['message']))  
                    { 
                        ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hey!</strong> <?= $_SESSION['message']; ?>.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                        unset($_SESSION['message']);
                    }
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Register as a buyer</h4>
                        </div>
                        <div class="card-body">
                            <form action="functions/authcode.php" method="POST">
                                <div class="mb-3">
                                    <label class="form-label">Userame</label>
                                    <input type="text" name="username" class="form-control" placeholder="Enter your name" value = "<?php echo (isset($_SESSION['username'])) ? $_SESSION['username'] : '' ?>"required>
                                    
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text" name="fname" class="form-control" placeholder="Enter your first name" value = "<?php echo (isset($_SESSION['fname'])) ? $_SESSION['fname'] : '' ?>" required>
                                    
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" name="lname" class="form-control" placeholder="Enter your Last name" value = "<?php echo (isset($_SESSION['lname'])) ? $_SESSION['lname'] : '' ?>" required>
                                    
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Phone No</label>
                                    <input type="number" name="phone" class="form-control" placeholder="Enter your phone number" value = "<?php echo (isset($_SESSION['phoneno'])) ? $_SESSION['phoneno'] : '' ?>">
                                    
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter your email address" id="exampleInputEmail1" aria-describedby="emailHelp" value = "<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" required>    
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control" placeholder="Enter your address" id="exampleInputEmail1"  value = "<?php echo (isset($_SESSION['address'])) ? $_SESSION['address'] : '' ?>" aria-describedby="emailHelp">
                                    
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Enter your password" id="exampleInputPassword1" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" name="cpassword" class="form-control" placeholder="Confirm password" required>
                                </div>
                
                                <button type="submit" name="register_btn" class="btn btn-primary">Submit</button>
                                <div class="seller">
                                
                                </div>
                                
                            </form>
                        </div>
                    </div>    
                    
                <div>
            <div>
        <div>
    </div>    

    
    
<?php include('includes/footer.php'); ?>