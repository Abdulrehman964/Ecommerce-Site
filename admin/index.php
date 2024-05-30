<?php
include('includes/header.php');

$a = $_SESSION['buyer_user']['user_id'];
$sql = "select * from buyers where id='$a';";
$result = mysqli_query($con, $sql);



$row = mysqli_fetch_assoc($result);
?>

  <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h1> My Profile </h1>
 <div class="card">
    <div class="box box-solid">
	        			<div class="box-body">
	        				<div class="col-sm-9">
	        					<div class="row">
	        						<div class="col-sm-3">
										<h6>Username</h6>
	        							<h6>Name:</h6>
	        							<h6>Email:</h6>
	        							<h6>Contact Info:</h6>
	        							<h6>Address:</h6>
	        							<h6>Member Since:</h6>

                                        
	        						</div>
	        						<div class="col-sm-9 mt-2">
										<h6><?php echo $row['username'] ; ?>
								
									</h6>
	        							<h6><?php echo $row['fname'].' '.$row['lname']; ?>
	        								
	        							</h6>
	        							<h6><?php echo $row['email']; ?></h6>
	        							<h6><?php echo (!empty($row['phone'])) ? $row['phone'] : 'Not Given'; ?></h6>
	        							<h6><?php echo (!empty($row['address'])) ? $row['address'] : 'Not Given'; ?></h6>
	        							<h6><?php echo date('d-M-Y', strtotime($row['created_at'])); ?></h6>
                                        
	        						</div>
	        					</div>
	        				</div>
	        			</div>
	        		</div>
</div>
            </div>
        </div>

    </div>
  <?php include('includes/footer.php'); ?>