<?php
include('../middleware/adminMiddleware.php');
include('includes/header.php');
?>

<div class="container">
    <h4>Dashboard</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="row mt-4">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">category</i>
                            </div>
                            <div class="text-end pt-1">
                                <?php
                                $query = "SELECT COUNT(*) as total_categories FROM categories WHERE status='0'";
                                $query_run = mysqli_query($con, $query);
                                $total_categories = mysqli_fetch_assoc($query_run)['total_categories'];

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $item) {
                                ?>
                                        <a href="category.php">
                                            <p class="text-sm mb-0 text-capitalize">Total Categories</p>
                                            <h4 class="mb-0"><?= $total_categories  ?></h4>
                                        </a>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="5">No categories Yet!!</td>
                                    </tr>

                                <?php
                                }
                                ?>
                            </div>
                        </div>

                        <!-- <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last week</p>
                        </div> -->
                    </div>

                </div>

                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary shadow text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">weekend</i>
                            </div>
                            <div class="text-end pt-1">
                                <?php
                                $query = "SELECT COUNT(*) as total_products FROM products WHERE status='0'";
                                $query_run = mysqli_query($con, $query);
                                $total_products = mysqli_fetch_assoc($query_run)['total_products'];

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $item) {
                                ?>
                                        <a href="products.php">
                                            <p class="text-sm mb-0 text-capitalize">Total Products</p>
                                            <h4 class="mb-0"><?= $total_products  ?></h4>
                                        </a>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="5">No products Yet!!</td>
                                    </tr>

                                <?php
                                }
                                ?>
                            </div>
                        </div>

                        <!-- <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last week</p>
                        </div> -->
                    </div>

                </div>



                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">inventory</i>
                            </div>
                            <div class="text-end pt-1">
                                <?php
                                $query = "SELECT SUM(qty) as total_qty FROM products";
                                $query_run = mysqli_query($con, $query);
                                $total_qty = mysqli_fetch_assoc($query_run)['total_qty'];

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $item) {
                                ?>
                                        <a href="stocks.php">
                                            <p class="text-sm mb-0 text-capitalize">Total Available Stock</p>
                                            <h4 class="mb-0"><?= $total_qty  ?></h4>
                                        </a>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="5">No Stocks Yet!!</td>
                                    </tr>

                                <?php
                                }
                                ?>
                            </div>
                        </div>

                        <!-- <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last week</p>
                        </div> -->
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<div class="container mt-4">
    <h4>Order Details</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="row mt-4">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">shopping_cart</i>
                            </div>
                            <div class="text-end pt-1">
                                <?php
                                $query = "SELECT COUNT(*) as count FROM orders WHERE status='0' ";
                                $query_run = mysqli_query($con, $query);
                                $count = mysqli_fetch_assoc($query_run)['count'];

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $item) {
                                ?>
                                        <a href="orders.php">
                                            <p class="text-sm mb-0 text-capitalize">Total Orders Under Process</p>
                                            <h4 class="mb-0"><?= $count ?></h4>
                                        </a>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="5">No Orders Yet!!</td>
                                    </tr>

                                <?php
                                }
                                ?>
                            </div>
                        </div>

                        <!-- <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last week</p>
                        </div> -->
                    </div>

                </div>

                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">local_shipping</i>
                            </div>
                            <div class="text-end pt-1">
                                <?php
                                $query = "SELECT COUNT(*) as count FROM orders WHERE status='3' ";
                                $query_run = mysqli_query($con, $query);
                                $count = mysqli_fetch_assoc($query_run)['count'];

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $item) {
                                ?>
                                        <a href="orders.php">
                                            <p class="text-sm mb-0 text-capitalize">Total Orders Out for Delivery</p>
                                            <h4 class="mb-0"><?= $count ?></h4>
                                        </a>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="5">No Orders Yet!!</td>
                                    </tr>

                                <?php
                                }
                                ?>
                            </div>
                        </div>

                        <!-- <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last week</p>
                        </div> -->
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <h4>Accounts</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="row mt-4">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">leaderboard</i>
                            </div>
                            <div class="text-end pt-1">
                                <?php
                                $query = "SELECT SUM(total_price) as total_price FROM orders WHERE status='1'";
                                $query_run = mysqli_query($con, $query);
                                $total_price = mysqli_fetch_assoc($query_run)['total_price'];

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $item) {
                                ?>
                                        <a href="salesreport">
                                            <p class="text-sm mb-0 text-capitalize">Total Sales</p>
                                            <h5 class="mb-0">INR <?= $total_price  ?></h5>
                                        </a>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="5">No Stocks Yet!!</td>
                                    </tr>

                                <?php
                                }
                                ?>
                            </div>
                        </div>

                        <!-- <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last week</p>
                        </div> -->
                    </div>

                </div>


            </div>
        </div>
    </div>



    <?php include('includes/footer.php'); ?>