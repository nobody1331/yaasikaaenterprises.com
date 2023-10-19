<?php
include('../middleware/adminMiddleware.php');
include('includes/header.php');



?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h4>Order History
                        <a href="orders.php" class="btn btn-sm btn-warning float-end">Back</a>
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
                                        <th>Payment Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $orders = getOrderHistory();

                                    if (mysqli_num_rows($orders) > 0) {
                                        foreach ($orders as $item) {
                                    ?>
                                            <tr>
                                                <!--<td><?= $item['id']; ?></td>-->
                                                <td style="text-align: center;"><?= $item['name']; ?></td>
                                                <td style="text-align: center;"><?= $item['tracking_no']; ?></td>
                                                <td style="text-align: right;"><?= $item['total_price']; ?>.00</td>
                                                <td style="text-align: center;"><?= $item['payment_date']; ?></td>
                                                <td style="text-align: center;">
                                                    <a href="view-order.php?t=<?= $item['tracking_no']; ?>" class="btn btn-primary">View Details</a>
                                                </td>
                                            </tr>

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