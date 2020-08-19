<?php 

    include('site-config.php'); 

    session_start();
    if(! $_SESSION['user_id']){
        header('location: login.php');
    }
        
    $user_id = $_SESSION['user_id'];

    $sql1 = "SELECT c.id as cart_id, c.*, p.* FROM cart c JOIN product p ON c.product_id = p.id where c.user_id = $user_id order by c.id DESC";
    $query1 = $func->query($sql1);
    
    
    $total = "";
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LockdownStore | DDiversion</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <?php include('header.php'); ?>

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All Products</span>
                        </div>
                        <ul>
                        <?php
                            $query = "select * from product order by id DESC";
                            $results = $func->query($query);
                            while($rows = $func->fetch($results)){  ?>
                            <li><a href="shop-details.php?id=<?php echo $rows['id'] ?>"><?php echo $rows['name']; ?></a></li>
                        <?php } ?>
                        </ul>
                    </div>
                </div>
                <!-- <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="index.php">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($data = $func->fetch($query1)){
                                    if(empty($data['discount'])) {  $total += $data['price']; }else{ $total += $data['discount']; }
                                    
                                ?>
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="images/product/<?php echo $data['image']; ?>" alt="">
                                        <h5><?php echo $data['name']; ?></h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        <?php if(empty($data['discount'])) { echo "&#8377; ".$data['price']; }else{ echo "&#8377; ".$data['discount']; } ?>
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="">
                                            <div class="">
                                                <input type="text" value="1" disabled>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        <?php if(empty($data['discount'])) { echo "&#8377; ".$data['price']; }else{ echo "&#8377; ".$data['discount']; } ?>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a href="delete-cart.php?id=<?php echo $data['cart_id']; ?>"><span class="icon_close"></span></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="shoping__cart__btns">
                        <a href="index.php" class="primary-btn cart-btn">CONTINUE SHOPPING</a>                        
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout" style="margin-top:0px;">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Total <span>&#8377; <?php echo $total; ?></span></li>
                        </ul>
                        <a href="checkout.php" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>                
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

    <?php include('footer.php'); ?>

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>


</body>

</html>