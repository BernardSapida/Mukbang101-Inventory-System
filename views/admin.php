<?php require_once "../includes/admin-view-restriction.inc.php"; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Kathline Araya Talavera, Arigadas Kimmy, Sheanne Samali">
    <meta name="description" content="">
    <?php include_once "../includes/admin-header.inc.php" ?>    
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
                <li><a class="<?php echo strcmp($current_page, "admin-dashboard") && !empty($current_page) ? "" : "active"; ?>" href="admin.php?page=admin-dashboard" aria-label="dashboard-link"><i class="fa-solid fa-gauge-high"></i> Dashboard</a></li>
                <li><a class="<?php echo strcmp($current_page, "admin-product") ? "" : "active"; ?>" href="admin.php?page=admin-product" aria-label="product-link"><i class="fa-brands fa-product-hunt"></i> Product</a></li>
                <li><a class="<?php echo strcmp($current_page, "admin-sales_invoice") ? "" : "active"; ?>" href="admin.php?page=admin-sales_invoice" aria-label="sales-link"><i class="fa-solid fa-file-circle-check"></i> Sales Report</a></li>
                <li><a class="<?php echo strcmp($current_page, "admin-transaction") ? "" : "active"; ?>" href="admin.php?page=admin-transaction" aria-label="transaction-link"><i class="fa-solid fa-peso-sign"></i> Transaction</a></li>
                <li><a class="<?php echo strcmp($current_page, "admin-supplier") ? "" : "active"; ?>" href="admin.php?page=admin-supplier" aria-label="supplier-link"><i class="fa-solid fa-truck-ramp-box"></i> Supplier</a></li>
                <li><a class="<?php echo strcmp($current_page, "admin-tracking_orders") ? "" : "active"; ?>" href="admin.php?page=admin-tracking_orders" aria-label="tracking-link"><i class="fa-solid fa-truck-field"></i> Tracking Order</a></li>
                <li><a class="<?php echo strcmp($current_page, "admin-account") ? "" : "active"; ?>" href="admin.php?page=admin-account" aria-label="account-link"><i class="fa-solid fa-user-gear"></i> Account</a></li>
            </ul>
        </div>
      </nav>
    </section>
    <section class="section_main">
        <header>
            <div class="container-profile">
                <img src="../images/admin.jpg" alt="admin profile">
                <div class="container-label">
                    <p>Administrator</p>
                    <p><span></span> Online</p>
                </div>
                <i class="fa-solid fa-caret-down"></i>
            </div>
        </header>
        <main>
            <?php include_once "../includes/admin-contents.inc.php" ?>    
        </main>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="../js/navigation.js"></script>
  </body>
</html>