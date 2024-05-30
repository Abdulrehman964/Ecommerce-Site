    <footer class="footer pt-5">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                </div>
                <div class="col-lg-6">
                    <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                        <li class="nav-item">
                            <a href="#" class="nav-link text-muted" target="_blank">About</a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link text-muted" target="_blank">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-muted" target="_blank">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-muted" target="_blank">About</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    </main>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/perfect-scrollbar.min.js"></script>
    <script src="assets/js/smooth-scrollbar.min.js"></script>





<script>

$(document).ready(function() 
{

  $(document).on('click','.delete_product', function (e) {
        e.preventDefault();

        var id = $(this).val();

        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({

                        type: "POST",
                        url: "code.php",
                        data: {
                            'product_id': id,
                            'delete_product': true
                        },
                        success: function(response) {
                            if (response == 200) {
                                swal("Success!", "Product Deleted Successfully",
                                    "success");
                                $('#products_table').load(location.href +
                                    " #products_table");
                            } else if (response == 500) {
                                swal("Error!", "Something Went wrong", "error");
                            }
                        }
                    });
                } else {
                    swal("Your Product is not deleted!");
                }
            });
    });

    $(document).on('click','.delete_category', function (e) {

        e.preventDefault();

        var id = $(this).val();

        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({

                        type: "POST",
                        url: "code.php",
                        data: {
                            'id': id,
                            'delete_category': true
                        },
                        success: function(response) {
                            if (response == 200) {
                                swal("Success!", "Category Deleted Successfully",
                                    "success");
                                $('#category_table').load(location.href +
                                    " #category_table");
                            } else if (response == 500) 
                            {
                                swal("Error!", "Something Went wrong", "error");
                            }
                        }
                    });
                } else {
                    swal("Your Category is not deleted!");
                }
            });
    });
});
    </script>


<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script>
<?php
      if(isset($_SESSION['message'])) {
      ?>
alertify.set('notifier', 'position', 'top-right');
alertify.success("<?= $_SESSION['message'] ?>");
<?php
      unset($_SESSION['message']);
    }
    ?>
</script>


    </body>

    </html>