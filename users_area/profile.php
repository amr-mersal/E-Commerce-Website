<?php
include('../includes/connect.php');
include('../functions/common_Function.php');
session_start();




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['username']; ?></title>
    <!--bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--font awsome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
    <style>
        body {
            overflow-x: hidden;

        }

        .profile_img {
            width: 90%;
            margin: auto;
            display: block;
            
            object-fit: contain;
        }
        .edit_img{
            width: 100px;
            height: 100px;
            object-fit: contain;

        }
    </style>
</head>


<body>
    <!--navbar-->
    <div class="container-fluid p-0">
        <!--first child-->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/shopping-cart.png" alt="" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">My account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price:<?php total_cart_price(); ?>/-</a>
                        </li>

                    </ul>
                    <form class="d-flex" action="../search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <!-- <button class="btn btn-outline-light" type="submit">Search</button>-->
                        <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>
        <!--calling  cart-->
        <?php
        cart();

        ?>


        <!--second child-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">

                <?php
                if (!isset($_SESSION['username'])) {
                    echo " <li class='nav-item'>
                    <a class='nav-link' href='#'>Welcome Guest</a>
                </li>";
                } else {
                    echo " <li class='nav-item'>
                    <a class='nav-link' href='profile.php'>Welcome " . $_SESSION['username'] . "</a>
                        </li>";
                }
                if (!isset($_SESSION['username'])) {
                    echo " <li class='nav-item'>
                    <a class='nav-link' href='./users_area/user_login.php'>Login</a>
                </li>";
                } else {
                    echo " <li class='nav-item'>
                    <a class='nav-link' href='./users_area/logout.php'>logout</a>
                </li>";
                }




                ?>









            </ul>
        </nav>
        <!--third child-->
        <div class="bg-light">
            <h3 class="text-center">Hidden Story</h3>
            <p class="text-center">Communications is at heart of e-commerce and community</p>
        </div>
        <!--forth child-->
        <div class="row">
            <div class="col-md-2 ">
                <ul class="navbar-nav bg-secondary text-center" style="height: 100vh;">
                    <li class="nav-item bg-info">
                        <a class="nav-link text-light" href="#">
                            <h4>Your Profile</h4>
                        </a>
                    </li>
                    <?php  
                    $username=$_SESSION['username'];
                    $user_image="Select * from `user_table` where username='$username'";
                    $result_image=mysqli_query($con,$user_image);
                    $row_image=mysqli_fetch_array($result_image);
                    $user_image=$row_image['user_image'];
                    echo "<li class='nav-item '>
                        <img src='./user_images/$user_image' class='profile_img my-4'>
                    </li>";



                    


                    ?>

                    <li class="nav-item ">
                        <a class="nav-link text-light" href="profile.php">
                            Pending orders
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-light" href="profile.php?edit_account">
                            edit account
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-light" href="profile.php?my_orders">
                            My orders
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-light" href="profile.php?delete_account">
                            Delete Account
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-light" href="logout.php">
                            Logout
                        </a>
                    </li>
                </ul>

            </div>
            <div class="col-md-10 text-center">
                <?php get_user_order_detalis();
                if(isset($_GET['edit_account'])){
                    include('edit_account.php');

                }
                if(isset($_GET['my_orders'])){
                    include('my_orders.php');

                }
                if(isset($_GET['delete_account'])){
                    include('delete_account.php');

                }
                ?>

            </div>
        </div>







        <!-- last child-->
        <?php
        include("../includes/footer.php")


        ?>

    </div>

        <!--bootstrap js-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>