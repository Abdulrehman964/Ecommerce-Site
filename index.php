<?php
 include('includes/header.php');
 include('includes/slider.php');
include('functions/userfunctions.php');
 ?>

<div class="py-5">
    <div class="container">
        <div class="row">
                <div class="col-md-12">
                <h4> Trending Products </h4>
                <hr class="mb-2">
                    <div class="owl-carousel">
                <?php
                $result = getalltrending();
                if(mysqli_num_rows($result) > 0)
                {
                    foreach($result as $item)
                    {
                        ?>
                                            <div class="mb-2 item">
                                                <a href="product_view.php?products=<?=$item['slug']; ?>">
                                                    <div class="card shadow">
                                                        <div class="card-body">
                                                        <img src="uploads/<?= $item['image']; ?>"   alt="Product Image" class="w-100">
                                                            <h6 class="text-center"><?= $item['name']; ?></h6>

                                                        </div>
                                                    </div>
                                                </a>

                                            </div>
                                            
                                        <?php   
                    }
                }
                ?>
                </div>
                </div>
            </div>            
        </div>
    </div>
</div>    

    </style>

<div class="py-5 back">
    <div class="container">
        <div class="row">
                <div class="col-md-12">
                <h4> About Us </h4>
                <span class="underline mb-2"></span>
                <p> This is our Ecommerce Website</p>
            </div>            
        </div>
    </div>
</div>    

<div class="py-5 bg-dark">
    <div class="container">
        <div class="row">
                <div class="col-md-3">
                <h4 class="text-white"> Ecommerce Site </h4>
                <span class="underline mb-2"></span>
                <a href="index.php" class="text-white decorator"> <i class="fa fa-angle-right"></i> Home</a><br>
                <a href="categories.php" class="text-white decorator"> <i class="fa fa-angle-right"></i>Categories</a>
            </div>         
            <div class="col-md-3">
                <h4 class="text-white"> Address</h4>
                <p class="text-white">
                    Gulshan-e-iqbal karachi
            </p>

            <a href="tel:+912345" class="text-white" ><i class="fa fa-phone"></i> +92345 </a>
            </div>   
        </div>
    </div>
</div> 

<div class="py-2 bg-danger">
    <div class="text-center">
        <p class="mb-0 text-white"> All Rights Resereved Copyright @ Database -<?= date('Y') ?> </p>
    </div>
</div>

<?php include('includes/footer.php'); ?>
<script>
    $(document).ready(function () {
        

$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
});
</script>