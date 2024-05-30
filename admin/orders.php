
<?php
//include('../middleware/adminmiddleware.php');
//include('../functions/myfunctions.php');
include('includes/header.php');

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Orders</h4>
                </div>
                <div class="card-body" id="">
                    <table class="table table-bordered table-striped">
                        <thread>
                            <tr>
                                <th>ID</th>
                                <th>Users</th>
                                <th>Tracking No</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>View</th>
                            </tr>
                        </thread>
                        <tbody>
                            <?php
                        $orders = getALLOrders();
                        if(mysqli_num_rows($orders) > 0)
                        {
                            foreach ($orders as $items) 
                                {
                                ?>

                                    <tr>
                                        <td> <?= $items['id']; ?> </td>
                                        <td> <?= $items['name']; ?> </td>
                                        <td> <?= $items['tracking_no']; ?> </td>
                                        <td> <?= $items['total_price']; ?> </td>
                                        <td> <?= $items['created_at']; ?> </td>
                                        <td>
                                            <a href="view-order.php?t=<?= $items['tracking_no']; ?>" class="btn btn-primary">View details</a>
                                        </td>
                                    </tr>

                                <?php
                            }
                        }
                        else
                        {  
                            echo "No records found";
                        }
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php include('includes/footer.php'); ?>