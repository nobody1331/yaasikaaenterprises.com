<?php
include('../middleware/adminMiddleware.php');
include('includes/header.php');



?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Stock Report
                        <a href="excel.php" class="btn btn-sm btn-success float-end"> Download Excel</a>
                    </h4>
                </div>
                <div class="card-body" id="products_table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Available Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $products = getAll("products");

                            if (mysqli_num_rows($products) > 0) {
                                foreach ($products as $item) {
                            ?>
                                    <tr>
                                        <td><?= $item['id']; ?></td>
                                        <td><?= $item['name']; ?></td>
                                        <td><?= $item['qty']; ?></td>

                                    </tr>
                            <?php
                                }
                            } else {
                                echo "No records found";
                            }
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>





<?php include('includes/footer.php'); ?>