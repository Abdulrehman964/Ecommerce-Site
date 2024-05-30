<?php
include('includes/header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> ADD CATEGORY </h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">

                            <div class="col-md-6">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter category name ">
                            </div>

                            <div class="col-md-6">
                                <label for="">Slug</label>
                                <input type="text" name="slug" class="form-control" placeholder="Enter category slug">
                            </div>
                            <div class="col-md-12">
                                <label for="">Description</label>
                                <textarea rows="3" name="description" placeholder="Enter description" class="form-control"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="">Upload Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">Meta title</label>
                            <input type="text" name="meta_title" placeholder="Enter meta title" class="form-control" >
                        </div>
                        <div class="col-md-12">
                            <label for="">Meta description</label>
                            <textarea rows="3" name="meta_description" placeholder="Enter meta description" class="form-control" ></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="">Meta Keywords</label>
                            <textarea rows="3" name="meta_keyword" placeholder="Enter meta keywords" class="form-control" ></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="">Status</label>
                            <input type="checkbox" name="status" >
                        </div>
                        <div class="col-md-6">
                            <label for="">Popular</label>
                            <input type="checkbox" name="popular" >
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary" name="category_button"> SAVE </button>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>