<?php
	$basename = basename($_SERVER['REQUEST_URI']);
	$currentPage = pathinfo($_SERVER['PHP_SELF'], PATHINFO_BASENAME);
?>
<!-- Sidebar -->
<div class="sidebar collapse">
    <div class="sidebar-content">
		<!-- Main navigation -->
		<ul class="navigation">
			
			<li <?php if($currentPage=='product-master.php') { echo 'class="active"'; }?>><a href="product-master.php"><span>Product Master</span> <i class="icon-diamond"></i></a></li>
			<li <?php if($currentPage=='order-master.php') { echo 'class="active"'; }?>><a href="order-master.php"><span>Order List</span> <i class="icon-diamond"></i></a></li>
		</ul>
      <!-- /main navigation -->
	</div>
</div>
<!-- /sidebar -->
