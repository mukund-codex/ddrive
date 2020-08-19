<?php 

    include('site-config.php'); 

    session_start();
    if(! $_SESSION['user_id']){
        header('location: login.php');
    }

    $query = "select * from product order by id DESC";
    $results = $func->query($query);

    $user_id = $_SESSION['user_id'];

    $sql1 = "SELECT c.id as cart_id, c.*, p.* FROM cart c JOIN product p ON c.product_id = p.id where c.user_id = $user_id order by c.id DESC";
    $query1 = $func->query($sql1);

    $total = '';

    if(isset($_POST['submit'])){
        $order = $func->orderSubmit($_POST);
        
        ?>
        <script>
            alert('Order has been placed successfully.');
        </script>
        <?php

		header("location: index.php");

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
    <!-- <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div cla$row['name']    <i class="fa fa-bars"></i>
                            <span>All Products</span>
                        </div>
                        <ul>
                        <?php while($row = $func->fetch($results)){ ?>
                            <li><a href="shop-details.php??id=<?php echo $row['id'] ?>"><?php echo $row['name']; ?></a></li>
                        <?php } ?>
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
    </section> -->
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            
            <div class="checkout__form">
                <form method="post" >
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h6>Pay using Google Pay</h6>
                                   <img src="img/gpay.jpeg"/>
                                </div>
                                <div class="col-lg-6">
                                    <h6>Pay using Phonepe</h6>
                                    <img src="img/phonepe.jpeg" style="margin-top:-70px;"/>
                                </div>
                            </div>
                           
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>
                                <?php while($data = $func->fetch($query1)){
                                    if(empty($data['discount'])) {  $total += $data['price']; }else{ $total += $data['discount']; }
                                    
                                ?>
                                    <li><?php echo $data['name']; ?><span><?php if(empty($data['discount'])) { echo "&#8377; ".$data['price']; }else{ echo "&#8377; ".$data['discount']; } ?></span></li>
                                <?php } ?> 
                                </ul>
                                <div class="checkout__order__total">Total <span><?php echo "&#8377; ".$total; ?></span></div>
                               
                                <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id']; ?>" />
                                <input type="submit" name="submit" id="submit" class="site-btn" value="PLACE ORDER" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

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