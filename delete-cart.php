<?php

    include('site-config.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "DELETE FROM cart where id = $id";
        $results = $func->query($sql);

        header('location: shoping-cart.php');
    }else{
        header('location: shoping-cart.php');
    }

?>