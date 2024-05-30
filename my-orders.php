<?php

include('functions/userfunctions.php'); 
 include('includes/header.php'); 
 include('authenticate.php'); 
 ?>

<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a href="index.php" class="text-white">
                Home /
            </a>
            <a href="my-orders.php" class="text-white">
                My Orders
            </a>
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <!-- <div class="card card-body shadow">
        </div> -->
        <div id="myorder">
        <div class="row">
            <div class="col-md-18">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tracking No</th>
                            <th>Price</th>
                            <th>Date</th>
                            <th>view</th>
                        </tr>
                    </thead>
                    <tbody>
                        <div id="myorder">
                        <?php
                            $orders = getOrders();

                            if(mysqli_num_rows($orders) > 0)
                            {
                                foreach ($orders as $items) 
                                {
                                ?>

                                    <tr>
                                        <td> <?= $items['id']; ?> </td>
                                        <td> <?= $items['tracking_no']; ?> </td>
                                        <td> <?= $items['total_price']; ?> </td>
                                        <td> <?= $items['created_at']; ?> </td>
                                        <td> 
                                            <?php 
                                            if($items['status']==0)
                                            {
                                                echo "Delivery is in process";
                                            }
                                            else if($items['status']==1)
                                            {
                                                echo "Completed";
                                            }
                                            else if($items['status']==2)
                                            {
                                                echo"Cancelled by Admin";
                                            }
                                            
                                            
                                            ?> 
                                        
                                        </td>
                                        <td>
                                            <a href="view-order.php?t=<?= $items['tracking_no']; ?>" class="btn btn-primary">View details</a>
                                        </td>
                                        <td>
                                            <?php
                                            if($items['status']==0)
                                            {

                                            ?>
                                        <div class="col-md-2">
                                                    <button class="btn btn-danger cancelorder" value="<?= $items['id']?>">Cancel Order</button>
                                                </div>
                                        </td>
                                        <?php
                                            }
                                            ?>
                                    </tr>

                                <?php
                                }
                            }
                            else
                            {
                                ?>

                                    <tr>
                                        
                                        <td colspan="5">no orders yet</td>
                                    </tr>

                                <?php
                            }
                        ?>
                        
                    </tbody>
                </table>
                        </div>
                
            </div>
        </div>
                        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>