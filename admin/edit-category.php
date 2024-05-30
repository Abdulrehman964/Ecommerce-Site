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
                $category = getbyID("category", $id);
                if (mysqli_num_rows($category) > 0) 
                {
                    $data = mysqli_fetch_assoc($category);
            ?>
            
            <div class="card">
                <div class="card-header">
                    
                    <a href="view-category.php" class="btn btn-primary float-end" >
                        BACK
                </a>
                <h4 class="mb-0"> EDIT CATEGORY </h4>
                </div>
                <div class="card-body sizer">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                        <input type="hidden" name="id" value=" <?= $data['id'] ?>" > 
                            <div class="col-md-6">
                                <label for="">Name</label>
                                <input type="text" name="name" value=" <?= $data['category_name'] ?> " class="form-control" placeholder="Enter category name ">
                            </div>

                            <div class="col-md-6">
                                <label for="">Slug</label>
                                <input type="text" name="slug" class="form-control"  value=" <?= $data['slug'] ?> "placeholder="Enter category slug">
                            </div>
                            <div class="col-md-12">
                                <label for="">Description</label>
                                <textarea rows="3" name="description" placeholder="Enter description" class="form-control"> <?= $data['description'] ?> "
                                </textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="">Upload Image</label>
                            <input type="file" name="image" class="form-control">
                            <label for="">Current Image</label>
                            <input type="hidden" name="old_image" value="<?=$data['image'] ?>">
                            <img src="../uploads/<?=$data['image'] ?>" width="50px" height="50px" alt="<?=$data['category_name']; ?>">
                        </div>
                        <div class="col-md-12">
                            <label for="">Meta title</label>
                            <input type="text" name="meta_title" value=" <?= $data['meta_title'] ?> " placeholder="Enter meta title" class="form-control" >
                        </div>
                        <div class="col-md-12">
                            <label for="">Meta description</label>
                            <textarea rows="3" name="meta_description" placeholder="Enter meta description" class="form-control" ><?= $data['category_name'] ?> "
                            </textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="">Meta Keywords</label>
                            <textarea rows="3" name="meta_keyword" placeholder="Enter meta keywords" class="form-control" ><?= $data['category_name'] ?> "
                            </textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="">Status</label>
                            <input type="checkbox" <?= $data['status'] ? "checked":"" ?>  name="status" >
                        </div>
                        <div class="col-md-6">
                            <label for="">Popular</label>
                            <input type="checkbox" <?= $data['popular'] ? "checked":"" ?> name="popular" >
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary" name="update_category_button">UPDATE</button>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
            <?php
                }
                else
                {
                    echo "Category not found";
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