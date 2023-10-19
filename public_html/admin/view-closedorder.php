<?php
include('../middleware/adminMiddleware.php');
include('includes/header.php');

if (isset($_GET['t'])) {
    $tracking_no = $_GET['t'];

    $orderData = checkTrackingNoValid($tracking_no);

    if (mysqli_num_rows($orderData) < 0) {
?>
        <h4>Something Went Wrong</h4>
    <?php
        die();
    }
} else {
    ?>
    <h4>Something Went Wrong</h4>
<?php
    die();
}

$data = mysqli_fetch_array($orderData);
?>


<div class="py-5">
    <div class="container">
        <div class="card card-body shadow">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <span class="fw-bold fs-4 text-white">View Product Details</span>
                            <a href="salesreport.php" class="btn btn-success float-end"><i class="fa fa-reply"></i> Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Order Details</h4>
                                    <hr>

                                    <table class="table">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $order_query = "SELECT o.id as oid,o.tracking_no,o.user_id,oi.*,oi.qty as orderqty,p.* FROM orders o,order_items oi,
                                            products p WHERE  oi.order_id=o.id AND p.id=oi.prod_id AND o.tracking_no='$tracking_no'";

                                            $order_query_run = mysqli_query($con, $order_query);

                                            if (mysqli_num_rows($order_query_run) > 0) {
                                                foreach ($order_query_run as $item) {
                                            ?>
                                                    <tr>
                                                        <td class="align-middle"><img src="../uploads/<?= $item['image']; ?>" width="50px" height="50px">
                                                            <?= $item['name']; ?>
                                                        </td>
                                                        <td class="align-middle" style="text-align: right;">
                                                            <?= $item['price']; ?>.00
                                                        </td>
                                                        <td class="align-middle" style="text-align: center;">
                                                            x <?= $item['orderqty']; ?>
                                                        </td>
                                                    </tr>

                                            <?php
                                                }
                                            }

                                            ?>
                                        </tbody>
                                    </table>

                                    <hr>
                                    <h5>Total Price : <span class="float-end fw-bold"><?= $data['total_price'] ?></span></h5>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php'); ?>