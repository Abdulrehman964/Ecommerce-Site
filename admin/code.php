<?php
session_start();
include('../config/dbcon.php');
include('../functions/myfunctions.php');

if(isset($_POST['category_button']))
{
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keyword'];
    $status = isset($_POST['status']) ? '1':'0';
    $popular = isset($_POST['popular']) ? '1' : '0' ;

    $image = $_FILES['image']['name'];

    $path = "../uploads";
    $image_ext = pathinfo($image,PATHINFO_EXTENSION);

    $filename = time() . '.' . $image_ext;

    $sql = "insert into category 
    (category_name,slug,description,status,popular,image,meta_title,meta_description,meta_keyword)
    values('$name','$slug','$description','$status','$popular','$filename','$meta_title','$meta_description','$meta_keywords') ;";

    $result = mysqli_query($con, $sql);

    if($result)
    {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
        redirect("add-category.php", "Category Added Successfully");
    } 
    else {
        redirect("add-category.php", "Something went wrong");
    }

}
else if(isset($_POST['update_category_button']))
{
    $category_id=$_POST['id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keyword'];
    $status = isset($_POST['status']) ? '1':'0';
    $popular = isset($_POST['popular']) ? '1' : '0' ;

    $new_image = $_FILES['image']['name'];

    $old_image = $_POST['old_image'];

    if($new_image !="")
    {
        $image_ext = pathinfo($new_image,PATHINFO_EXTENSION);
        $update_filename = time() . '.' . $image_ext;
    } 
    else {
        $update_filename = $old_image;
    }

    $path = "../uploads";

    $sql = "update category set category_name='$name',slug='$slug',description='$description',meta_title='$meta_title',
    meta_description='$meta_description',meta_keyword='$meta_keywords',status='$status',popular='$popular',image='$update_filename' WHERE id='$category_id' ";

    $result = mysqli_query($con, $sql);

    if($result)
    {
        if($_FILES['image']['name']!="")
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $update_filename);
            if(file_exists("../uploads/".$old_image))
            {
                unlink("../uploads/" . $old_image);
            }
        }
        redirect("view-category.php", "Category Updated Successfully");
    }
    else
    {
        redirect("edit-category.php?id=$category_id", "Something went wrong");   
    }
}

else if(isset($_POST['delete_category']))
{
    $category_id = $_POST['id'];

    $sql = "select image from category where id='$category_id';";
    $result = mysqli_query($con, $sql);

    if($result)
    {
        $row = mysqli_fetch_assoc($result);
        $old_image = $row['image'];
    }
    else
    {
        redirect("view-category.php", "Something went wrong");
    }

    $sql = "delete from category where id = '$category_id' ; ";
    $result = mysqli_query($con, $sql);

    if($result)
    {
        if(file_exists("../uploads/".$old_image))
            {
                unlink("../uploads/" . $old_image);
            }
        //redirect("view-category.php", "Category Deleted Successfully");
        echo 200;
    }
    else
    {
        //redirect("view-category.php", "Something went wrong");
        echo 500;
    }


}

else if(isset($_POST['add_product_button']))
{
    $category_id=$_POST['category_id'];

    $name = $_POST['product_name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $quantity = $_POST['qty'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keyword'];
    $status = isset($_POST['status']) ? '1':'0';
    $trending = isset($_POST['trending']) ? '1' : '0' ;

    $image = $_FILES['image']['name'];

    $path = "../uploads";
    $image_ext = pathinfo($image,PATHINFO_EXTENSION);

    $filename = time() . '.' . $image_ext;

    $sql = "INSERT into products
    (category_id,name,slug,small_desc,description,original_price,selling_price,image,quantity,status,trending,meta_title,meta_keywords,meta_description)
    values('$category_id','$name','$slug','$small_description','$description','$original_price','$selling_price','$filename','$quantity','$status','$trending','$meta_title','$meta_description','$meta_keywords');
    ";

        $result = mysqli_query($con, $sql);

        if ($result) {
            move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename);
            redirect("view-products.php", "Product Added Successfully");
        } else {
            redirect("add-products.php", "Something went wrong");
        }
}

else if(isset($_POST['update_product_button']))
{
    $product_id = $_POST['product_id'];
    $category_id=$_POST['category_id'];
    $name = $_POST['product_name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $quantity = $_POST['qty'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keyword'];
    $status = isset($_POST['status']) ? '1':'0';
    $trending = isset($_POST['trending']) ? '1' : '0' ;

    $new_image = $_FILES['image']['name'];
    
    $old_image = $_POST['old_image'];

    if($new_image !="")
    {
        $image_ext = pathinfo($new_image,PATHINFO_EXTENSION);
        $update_filename = time() . '.' . $image_ext;
    } 
    else 
    {
        $update_filename = $old_image;
    }

    $path = "../uploads";

    $sql = "update products set category_id='$category_id',name='$name',slug='$slug',small_desc='$small_description',description='$description',original_price='$original_price',selling_price='$selling_price',meta_title='$meta_title',
    meta_description='$meta_description',meta_keywords='$meta_keywords',status='$status',trending='$trending',image='$update_filename',quantity='$quantity' WHERE id='$product_id' ;";


    $result = mysqli_query($con, $sql);

    if($result)
    {
        if($_FILES['image']['name']!="")
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $update_filename);
            if(file_exists("../uploads/".$old_image))
            {
                unlink("../uploads/" . $old_image);
            }
        }
        redirect("view-products.php", "Product Updated Successfully");
    }
    else
    {
        redirect("edit-product.php ? id=$product_id", "Something went wrong");   
    }
}

else if(isset($_POST['delete_product']))
{
    $product_id = $_POST['product_id'];

    $sql = "select image from products where id='$product_id';";
    $result = mysqli_query($con, $sql);

    if($result)
    {
        $row = mysqli_fetch_assoc($result);
        $old_image = $row['image'];
    }
    else
    {
        redirect("view-product.php", "Something went wrong");
    }

    $sql = "delete from products where id = '$product_id' ; ";
    $result = mysqli_query($con, $sql);

    if($result)
    {
        if(file_exists("../uploads/".$old_image))
            {
                unlink("../uploads/" . $old_image);
            }
        //redirect("view-products.php", "Product Deleted Successfully");

        echo 200;
    }
    else
    {
        //redirect("view-products.php", "Something went wrong");
        echo 500;
    }
}
else if(isset($_POST['update_order_btn'])){
    
    
    $track_no = $_POST['tracking_no'];
    $order_status = $_POST['order_status'];
    
    $sql = "UPDATE orders SET status='$order_status' WHERE tracking_no='$track_no'; ";
    if(mysqli_query($con,$sql))
    {
    redirect("orders.php", "Order status updated successfully");
    }
    else
    {
        redirect("view-order.php?t=$track_no", "Something went wrong");
    }
}
else
{
    header('Location : ../index.php');
}
?>
