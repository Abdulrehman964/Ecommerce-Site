<?php
include('includes/header.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> ADD PRODUCTS </h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">

                            <div class="col-md-6">
                                <label class="mb-0">Select category</label>
                                <select class="form-select" name="category_id" required>
                                    <option selected>Select Category</option>
                                    <?php
                                    $category = getall("category");
                                    if (mysqli_num_rows($category) > 0) {
                                        foreach ($category as $item) {

                                    ?>

                                    <option value="<?= $item['id'];?>" name="category_id" > <?= $item['category_name'] ?> </option>

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
                                    placeholder="Enter the product name">
                            </div>

                            <div class="col-md-6">
                                <label class="mb-0">Slug</label>
                                <input type="text" name="slug" class = "form-control mb-2"
                                    placeholder="Enter the product slug">
                            </div>

                            <div class="col-md-6">
                                <label class="mb-0">Small Description</label>
                                <textarea rows="3" name="small_description" placeholder="Enter small description"
                                    class="form-control mb-2"> </textarea>
                            </div>

                            <div class="col-md-12">
                                <label class="mb-0">Description</label>
                                <textarea rows="3" name="description" placeholder="Enter description"
                                    class="form-control mb-2"></textarea>
                            </div>

                            <div class="col-md-6">
                                <label class="mb-0">Orignal Price</label>
                                <input type="number" name="original_price" class="form-control mb-2"
                                    placeholder="Enter the product original price">
                            </div>

                            <div class="col-md-6">
                                <label class="mb-0">Selling Price</label>
                                <input type="number" name="selling_price" class="form-control mb-2"
                                    placeholder="Enter the product selling price">
                            </div>

                            <div class="col-md-12">
                                <label class="mb-0">Upload Image</label>
                                <input type="file" name="image" class="form-control mb-2">
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="mb-0">quantity</label>
                                    <input type="number" name="qty" placeholder="Enter Quantity" class="form-control mb-2" >
                                </div>

                                <div class="col-md-3">
                                    <label class="mb-0">Status</label> <br>
                                    <input type="checkbox" name="status" >
                                </div>

                                <div class="col-md-3">
                                    <label class="mb-0">Trending</label> <br>
                                    <input type="checkbox" name="trending" > 
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="mb-0">Meta title</label>
                                <input type="text" name="meta_title" placeholder="Enter meta title" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Meta description</label>
                                <textarea rows="3" name="meta_description" placeholder="Enter meta description"
                                    class="form-control mb-2"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Meta Keywords</label>
                                <textarea rows="3" name="meta_keyword" placeholder="Enter meta keywords"
                                    class="form-control"></textarea>
                            </div>

                            <div class="col-md-12">
                                <button type="submit mb-2" class="btn btn-primary " name="add_product_button"> SAVE </button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>