<?php
include('../includes/connect.php');
include('../functions/common_Function.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin dashboard</title>
    <!--bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--font awsome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="../style.css">
    <style>
        body {
            overflow-x: hidden;
        }

        .footer {
            position: absolute;
            bottom: 0;
        }
        .product_image{
            width: 100px;
            object-fit: contain;
        }
    </style>
</head>

<body>
    <!--navbar -->
    <div class="container-fluid p-0">
        <!--first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/shopping-cart.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome Guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
        <!--second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>
        <!--third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-3">
                    <a href="#"><img src="../images/juice.jpg" alt="" class="admin-image"></a>
                    <p class="text-light text-center">admin Name</p>
                </div>
                <div class="button text-center">
                    <button class="my-3">
                        <a href="insert_prodect.php" class="nav-link text-light bg-info my-1">Insert Product</a>
                    </button>

                    <button class="my-3">
                        <a href="index.php?view_products" class="nav-link text-light bg-info my-1">View Product</a>
                    </button>

                    <button class="my-3">
                        <a href="index.php?Insert_categories" class="nav-link text-light bg-info my-1">Insert categories</a>
                    </button>

                    <button class="my-3">
                        <a href="" class="nav-link text-light bg-info my-1">View categories</a>
                    </button>

                    <button>
                        <a href="index.php?Insert_brands" class="nav-link text-light bg-info my-1">Insert brands</a>
                    </button class="my-3">

                    <button class="my-3">
                        <a href="" class="nav-link text-light bg-info my-1">View brands</a>
                    </button>

                    <button class="my-3">
                        <a href="" class="nav-link text-light bg-info my-1">All orders</a>
                    </button>

                    <button class="my-3">
                        <a href="" class="nav-link text-light bg-info my-1">All payments</a>
                    </button>

                    <button class="my-3">
                        <a href="" class="nav-link text-light bg-info my-1">List users</a>
                    </button>

                    <button class="my-3">
                        <a href="" class="nav-link text-light bg-info my-1">Logout</a>
                    </button>
                </div>
            </div>
        </div>
        <!--fourth child-->
        <div class="container my-3">
            <?php
            if (isset($_GET['Insert_categories'])) {
                include('Insert-categories.php');
            }
            if (isset($_GET['Insert_brands'])) {

                include('Insert-brands.php');
            }
            if (isset($_GET['view_products'])) {

                include('view_products.php');
            }
            if (isset($_GET['edit_product'])) {

                include('edit_product.php');
            }
            if (isset($_GET['delete_product'])) {

                include('delete_product.php');
            }


            ?>
        </div>





        <?php
        include("../includes/footer.php")


        ?>

    </div>









    <!--bootstrap js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>