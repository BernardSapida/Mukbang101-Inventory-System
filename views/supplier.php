<?php 
  require_once "../includes/supplier-view-restriction.inc.php";

  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Kathline Araya Talavera, Arigadas Kimmy, Sheanne Samali">
    <meta name="description" content="">
    <?php include_once "../includes/supplier-header.inc.php" ?>    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <title>Inventory System</title>
  </head>
  <body>
    <section class="section_navigation">
      <nav class="nav_main-navigation">
        <div class="container_banner">
            <img src="../images/banner1.jpg" alt="mukbang101 image banner">
        </div>
        <div class="container_navigation">
            <p>MAIN NAVIGATION</p>
            <ul>
                <li><a class="<?php echo strcmp($current_page, "supplier-dashboard") && !empty($current_page) ? "" : "active"; ?>" href="supplier.php?page=supplier-dashboard" aria-label="dashboard-link"><i class="fa-solid fa-gauge-high"></i> Dashboard</a></li>
                <li><a class="<?php echo strcmp($current_page, "supplier-product") ? "" : "active"; ?>" href="supplier.php?page=supplier-product" aria-label="product-link"><i class="fa-brands fa-product-hunt"></i> Product</a></li>
                <li><a class="<?php echo strcmp($current_page, "supplier-transaction") ? "" : "active"; ?>" href="supplier.php?page=supplier-transaction" aria-label="transaction-link"><i class="fa-solid fa-peso-sign"></i> Transaction</a></li>
                <li><a class="<?php echo strcmp($current_page, "supplier-order_status") ? "" : "active"; ?>" href="supplier.php?page=supplier-order_status" aria-label="tracking-link"><i class="fa-solid fa-truck-field"></i> Customer Orders</a></li>
                <li><a class="<?php echo strcmp($current_page, "supplier-account") ? "" : "active"; ?>" href="supplier.php?page=supplier-account" aria-label="account-link"><i class="fa-solid fa-user-gear"></i> Account</a></li>
            </ul>
        </div>
      </nav>
    </section>
    <section class="section_main">
        <header>
            <div class="container-profile">
                <img src="../profile/<?php echo $_SESSION['image']; ?>" id="profile" alt="supplier profile">
                <div class="container-label">
                    <p><?php echo $_SESSION["supplier store name"]; ?></p>
                    <p><span></span> Online</p>
                </div>
                <i class="fa-solid fa-caret-down"></i>
            </div>
        </header>
        <main>
            <?php include_once "../includes/supplier-contents.inc.php" ?>    
        </main>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="../js/navigation.js"></script>
  </body>
</html>