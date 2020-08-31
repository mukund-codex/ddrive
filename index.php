<?php 

    include('site-config.php'); 

    session_start();
    if(! $_SESSION['user_id']){
        header('location: login.php');
    }
  
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
    <section class="hero">
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
                <div class="col-lg-9">
                    <div>
                                <img src="img/hero/banner.jpg">
                        <!-- <div class="hero__text">
                            <span>Online grocery</span>
                            <h2>Online grocery <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
    <!-- Categories Section Begin -->
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                                     
                    <div class="row">
                        <?php
                        $query = "select * from product order by id DESC";
                        $results = $func->query($query);
                        while($rows1 = $func->fetch($results)){ ?>

                            <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="images/product/.<?php echo $rows1['image']; ?>">
                                    <!-- <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul> -->
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="shop-details.php?id=<?php echo $rows1['id']; ?>"><?php echo $rows1['name']; ?></a></h6>
                                    <h5><?php if(!empty($rows1['discount'])) { echo $rows1['discount']; }else{ echo $rows1['price']; }  ?></h5>
                                    <h6><a href="shop-details.php?id=<?php echo $rows1['id']; ?>" style="color:blue;">View Details</a></h6>
                                </div>
                            </div>
                        </div>

                        <?php } ?>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

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