<?php
include('includes/header.php');

?>


<div class="container">
    <div class="row">
        <div class="col-md-12"> 
            <?php
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $product = getbyID("products", $id);
                if (mysqli_num_rows($product) > 0) 
                {
                    $data = mysqli_fetch_assoc($product);
            ?>
            
            <div class="card">
                <div class="card-header">
                <a href="view-category.php" class="btn btn-primary float-end" >
                        BACK
                </a>
                    <h4> EDIT PRODUCT </h4>
                </div>
                <div class="card-body sizer">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">

                            <input type="hidden" name="product_id" value= "<?= $data['id']; ?> " >
                            
                            <div class="col-md-6">
                                <label class="mb-0">Select category</label>
                                <select class="form-select" name="category_id" required>
                                    <option selected>Select Category</option>
                                    <?php
                                    $category = getall("category");
                                    if (mysqli_num_rows($category) > 0) {
                                        foreach ($category as $item) {

                                    ?>

                                    <option value="<?= $item['id']; ?>" <?= $data['category_id'] == $item['id'] ? 'selected' : ''; ?> > <?= $item['category_name'] ?> </option>

                                    <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "No Category Found";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="mb-0">Name</label>
                                <input type="text" name="product_name" class="form-control mb-2"
                                    value = "<?= $data['name']; ?>" placeholder="Enter the product name">
                            </div>

                            <div class="col-md-6">
                                <label class="mb-0">Slug</label>
                                <input type="text" name="slug" class = "form-control mb-2"
                                value = "<?= $data['slug']; ?>" placeholder="Enter the product slug">
                            </div>

                            <div class="col-md-6">
                                <label class="mb-0">Small Description</label>
                                <textarea rows="3" name="small_description"  value = "<?= $data['small_desc']; ?>" placeholder="Enter small description"
                                    class="form-control mb-2"> </textarea>
                            </div>

                            <div class="col-md-12">
                                <label class="mb-0">Description</label>
                                <textarea rows="3" name="description" value = "<?= $data['description']; ?>"placeholder="Enter description"
                                    class="form-control mb-2"></textarea>
                            </div>

                            <div class="col-md-6">
                                <label class="mb-0">Orignal Price</label>
                                <input type="number" name="original_price" class="form-control mb-2"
                                value = "<?= $data['original_price']; ?>" placeholder="Enter the product original price">
                            </div>

                            <div class="col-md-6">
                                <label class="mb-0">Selling Price</label>
                                <input type="number" name="selling_price" class="form-control mb-2"
                                value = "<?= $data['selling_price']; ?>" placeholder="Enter the product selling price">
                            </div>

                            <div class="col-md-12">
                                <label class="mb-0">Upload Image</label>
                                <input type="file" name="image" class="form-control mb-2">
                                <label class="mb-0">Current Image</label>
                                <input type="hidden" name="old_image" value="<?=$data['image'] ?>">
                                <img src="../uploads/<?= $data['image']; ?>" alt="Product Image" height="50px" width="50px" >
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="mb-0">quantity</label>
                                    <input type="number" name="qty" value = "<?= $data['quantity']; ?>" placeholder="Enter Quantity" class="form-control mb-2" >
                                </div>

                                <div class="col-md-3">
                                    <label class="mb-0">Status</label> <br>
                                    <input type="checkbox" name="status" <?= ($data['status'] == 0) ? '':'checked'; ?> >
                                </div>

                                <div class="col-md-3">
                                    <label class="mb-0">Trending</label> <br>
                                    <input type="checkbox" name="trending" <?= ($data['trending'] == 0) ? '':'checked'; ?> > 
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="mb-0">Meta title</label>
                                <input type="text" name="meta_title" value = "<?= $data['meta_title']; ?>" placeholder="Enter meta title" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Meta description</label>
                                <textarea rows="3" name="meta_description" value = "<?= $data['meta_description']; ?>" placeholder="Enter meta description"
                                    class="form-control mb-2"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Meta Keywords</label>
                                <textarea rows="3" name="meta_keyword" value = "<?= $data['meta_description']; ?>" placeholder="Enter meta keywords"
                                    class="form-control"></textarea>
                            </div>

                            <div class="col-md-12">
                                <button type="submit mb-2" class="btn btn-primary" name="update_product_button"> Update </button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
            <?php
            } else 
            {
                    echo "Product not found";
                }
            }
            else
            {
                echo"ID missing from url";
            }
            ?>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>