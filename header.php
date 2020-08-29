
<?php 
if(! $_SESSION['user_id']){
    header('location: login.php');
}

    if(isset($_POST['logout']) || isset($_POST['logout1'])){
        $func->logoutFunction();
        //session_destroy();
    }

?>

<!-- Page Preloder -->
<div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="index.php"><img src="" alt=""><h3>LockdownStore</h3></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <?php $user_id = $_SESSION['user_id'];
                 $sql = "SELECT count(id) as total from cart where user_id=$user_id";
                 $results = $func->query($sql);
                 $data = $func->fetch($results);
                 ?>
                <li><a href="shoping-cart.php"><i class="fa fa-shopping-bag"></i> <span><?php if(empty($data['total'])){ echo '0'; }else { echo $data['total']; } ?></span></a></li>
            </ul>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__auth">
                <?php if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){ ?>
                    <li><i class="fa fa-user"></i> <?php echo $_SESSION['user_name']; ?></li>    
                    <li><form method="post">
                   <input type="submit" name="logout" id="logout" value="Logout" />
                </form></li>
                <?php }else{ ?>
                    <li><a href="login.php"><i class="fa fa-user"></i> Login</a></li>
                <?php } ?>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="shoping-cart.php">Shoping Cart</a></li>
                 <li><a href="about-us.php">About Us</a></li>
                <!-- <li><a href="checkout.php">Check Out</a></li> -->
                <!--<li><a href="contact.php">Contact</a></li>-->
                <?php if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){ ?>
                    <li><i class="fa fa-user"></i> <?php echo $_SESSION['user_name']; ?></li>    
                    <li><form method="post">
                   <input type="submit" name="logout" id="logout" value="Logout" />
                </form></li>
                <?php }else{ ?>
                    <li><a href="login.php"><i class="fa fa-user"></i> Login</a></li>
                <?php } ?>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <!--<div class="header__top__right__social">-->
        <!--    <a href="#"><i class="fa fa-facebook"></i></a>-->
        <!--    <a href="#"><i class="fa fa-twitter"></i></a>-->
        <!--    <a href="#"><i class="fa fa-linkedin"></i></a>-->
        <!--    <a href="#"><i class="fa fa-pinterest-p"></i></a>-->
        <!--</div>-->
        <!--<div class="humberger__menu__contact">-->
        <!--    <ul>-->
        <!--        <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>-->
        <!--        <li>Free Shipping for all Order of $99</li>-->
        <!--    </ul>-->
        <!--</div>-->
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="index.php"><img src="" alt=""><h2>LockdownStore</h2></a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="index.php">Home</a></li>
                            <li><a href="shoping-cart.php">Shoping Cart</a></li>
                            <li><a href="about-us.php">About Us</a></li>
                            <li><a href="contact.php">Contact Us</a></li>
                            <!-- <li><a href="checkout.php">Check Out</a></li> -->
                            <!--<li><a href="contact.php">Contact</a></li>-->
                            <?php if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){ ?>
                                <li><i class="fa fa-user"></i> <?php echo $_SESSION['user_name']; ?></li>    
                                <li><form method="post">
                               <input type="submit" name="logout" id="logout" value="Logout" />
                            </form></li>
                            <?php }else{ ?>
                                <li><a href="login.php"><i class="fa fa-user"></i> Login</a></li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-1">
                    <div class="header__cart">
                        <ul>                            
                        <?php $user_id = $_SESSION['user_id'];
                         $sql = "SELECT count(id) as total from cart where user_id=$user_id";
                         $results = $func->query($sql);
                         $data = $func->fetch($results);
                         ?>
                            <li><a href="shoping-cart.php"><i class="fa fa-shopping-bag"></i> <span><?php if(empty($data['total'])){ echo '0'; }else { echo $data['total']; } ?></span></a></li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->