<?php
include('../middleware/adminMiddleware.php');
include('includes/header.php');

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h4>Orders
                        <a href="order-history.php" class="btn btn-sm btn-primary float-end">Order History</a>
                    </h4>
                </div>
                <div class="card card-body shadow">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr style="text-align: center;">
                                        <!--<th>ID</th>-->
                                        <th>Username</th>
                                        <th>Tracking No</th>
                                        <th>Price</th>
                                        <th>Order Status</th>
                                        <!--<th>Ordered Date</th>-->
                                        <th>Payment Date</th>
                                        <th>Invoice</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $orders = getAllOrders();

                                    if (mysqli_num_rows($orders) > 0) {
                                        foreach ($orders as $item) {
                                    ?>
                                            <tr>
                                                <!--<td><?= $item['id']; ?></td>-->
                                                <td style="text-align: center;"><?= $item['name']; ?></td>
                                                <td><?= $item['tracking_no']; ?></td>
                                                <td style="text-align: right;"><?= $item['total_price']; ?>.00</td>
                                                <td style="text-align: center;"> <?php
                                                        if ($item['status'] == 0) {
                                                            echo "Under Process";
                                                        } else if ($item['status'] == 3) {
                                                            echo "Out for Delivery";
                                                        } else if ($item['status'] == 1) {
                                                            echo "Completed";
                                                        } else if ($item['status'] == 2) {
                                                            echo "Cancelled";
                                                        }
                                                        ?></td>
                                                <!--<td><?= $item['created_at']; ?></td>-->
                                                <td><?= $item['payment_date']; ?></td>
                                                <td>
                                                    <a href="generate-pdf.php?t=<?= $item['tracking_no']; ?>" class="btn btn-danger btn-sm">
                                                        Download Invoice
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="view-order.php?t=<?= $item['tracking_no']; ?>" class="btn btn-primary btn-sm">View Details</a>
                                                </td>
                                            </tr>

                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="7">No Orders Yet!!</td>
                                        </tr>

                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php'); ?>