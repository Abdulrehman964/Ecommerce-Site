
<?php

include('includes/header.php');

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Products</h4>
                </div>
                <div class="card-body " id="products_table">
                    <table class="table table-bordered">
                        <thread>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Tools</th>
                            </tr>
                        </thread>
                        <tbody>
                            <?php
                        $product = getall("products");
                        if(mysqli_num_rows($product) > 0)
                        {
                            foreach($product as $item)
                            {
                                ?>
                            <tr>
                                <td><?= $item['id']; ?> </td>
                                <td> <?= $item['name']; ?> </td>
                                <td>
                                    <img src="../uploads/<?= $item['image']; ?>" width="50px" height="50px"
                                        alt="<?=$item['name']; ?>">
                                </td>
                                <td>
                                    <?= $item['status']=='0'? "Visible":"hidden" ?>
                                </td>
                                <td>
                                    <a href="edit-product.php?id=<?= $item['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                                    <div class="inline">                                
                                    <button type="button" class="btn btn-sm btn-danger delete_product" value="<?= $item['id']; ?>" >Delete</button>
                            </div>
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

    <?php include('includes/footer.php'); ?>