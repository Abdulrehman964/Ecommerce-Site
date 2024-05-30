<?php


//include('../middleware/adminmiddleware.php');
//include('../functions/myfunctions.php');
include('includes/header.php');

 
 if(isset($_GET['t']))
 {
    $tracking_no = $_GET['t'];
    
    $orderData = checkTrackingNoValid($tracking_no);
    if(mysqli_num_rows($orderData) < 0)
    {
        ?>
        <h4>Something went wrong</h4>
        <?php
        die();
    }
 }
 else
 {
    ?>
        <h4>Something went wrong</h4>
        <?php
        die();
 }

 $data = mysqli_fetch_array($orderData);
 ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                    <div class="card-header fw-bold bg-primary">
                       <span class="text-white fs-4"> View Order</span> 
                        <a href="orders.php" class="btn btn-warning float-end"><i class="fa fa-reply">Back</i></a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Delivery Details</h4>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <label class="fw-bold">Name</label>
                                        <div class="border p-1">
                                            <?= $data['name']; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label class="fw-bold">Email</label>
                                        <div class="border p-1">
                                            <?= $data['email']; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label class="fw-bold">phone</label>
                                        <div class="border p-1">
                                            <?= $data['phone']; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label class="fw-bold">tracking_no</label>
                                        <div class="border p-1">
                                            <?= $data['tracking_no']; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label class="fw-bold">address</label>
                                        <div class="border p-1">
                                            <?= $data['address']; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label class="fw-bold">pin code</label>
                                        <div class="border p-1">
                                            <?= $data['pincode']; ?>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="col-md-6">
                             
                                <hr>
                                <table class="table">

                                    <tbody>
                                        
                                    
                                       
                                    </tbody>
                                </table>

                                <hr>
                                <h4>Total Price: <span class="float-end fw-bold"><?= $data['total_price']; ?> </span></h4>
                                <hr>
                                <label class="fw-bold">Payment Mode</label>
                                <div class=" mb-3">
                                    
                                    <?= $data['payment_mode'] ?>

                                </div>
                                
                                <label class="fw-bold">Status</label>
                                <div class="border p-1 mb-3">
                                    <form action="code.php" method='POST'>
                                        <input type="hidden" name="tracking_no" value="<?= $data['tracking_no'] ?>">
                                        <select name="order_status"  class="form-select">
                                            <option value="0" <?= $data['status']==0? " selected":"" ?>> Under Process</option>
                                            <option value="1" <?= $data['status']==1?" selected":"" ?>> Completed</option>
                                            <option value="2" <?= $data['status']==2?" selected":"" ?>>Cancelled</option>
                                        </select>
                                        <button type="submit" name="update_order_btn" class="btn btn-primary mt-3">Update Status</button>
                                    </form>           
                                    
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>