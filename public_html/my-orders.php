<?php $pageTitle = "My-Orders"; ?>

<?php
include('functions/userfunction.php');
include('includes/header.php');
include("authenticate.php");
?>

<div class="mo1">
    <div class="container">
        <h6 class="text-white">
            <a class="text-white" href="index.php">Home /</a>
            <a class="text-white" href="categories.php">Store /</a>
            <a class="text-white" href="my-orders.php">My Orders /</a>
        </h6>
    </div>
</div>

<div class="mo2">
    <div class="container">
        <div class="card card-body shadow">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr style="text-align: center;">
                                    <!--<th>ID</th>-->
                                    <th>Tracking No</th>
                                    <th>Price</th>
                                    <!--<th>Ordered Date</th>-->
                                    <th>Payment Date</th>
                                    <th>Action</th>
                                    <th>Invoice</th>
                                    <th>Order Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $orders = getOrders();

                                if (mysqli_num_rows($orders) > 0) {
                                    foreach ($orders as $item) {
                                ?>
                                        <tr>
                                            <!--<td style="text-align: center;"><?= $item['id']; ?></td>-->
                                            <td style="text-align: center;"><?= $item['tracking_no']; ?></td>
                                            <td style="text-align: right;"><?= $item['total_price']; ?>.00</td>
                                            <!--<td style="text-align: right;"><?= $item['created_at']; ?></td>-->
                                              <td style="text-align: center;"><?= $item['payment_date']; ?></td>
                                            <td style="text-align: center;">
                                                <a href="view-order.php?t=<?= $item['tracking_no']; ?>" class="btn btn-primary btn-sm">View Details</a>
                                            </td>
                                            <td style="text-align: center;">
                                                <a href="generate-pdf.php?t=<?= $item['tracking_no']; ?>" class="btn btn-danger btn-sm"><i class="bi bi-filetype-pdf"></i></a>
                                            </td>
                                            <td> <button class="btn btn-sm btn-success w-100 text-white">
                                                    <?php
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
                                            </button>
                                        </tr>

                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="6">No Orders Yet!!</td>
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


<?php include('includes/footer.php'); ?>

<div class="container-fluid footer">
    <div class="row justify-content-center footersection1 ">
        <div class="col-lg-4 p-4 company">
            <h6 class="fs-4">Yaasikaa Enterprises</h6>
            <p class="">Yaasikaa Enterprises is one of the leading wholesalers and retailers from the cardamom birthplace of Bodinayakanur. The Tamil sentence is perfectly matched for Bodi as follows by "ஏலம் மணக்கும் போடி".
                Now Yassikaa Enterprises step in to the Digital world to spread the cardamom smell to every home by through digital portal.</p>
        </div>
        <div class="col-lg-2 p-4 links">
            <h6 class="fs-4">Company</h6>
            <a href="" class="d-inline-block mb-2 text-white text-decoration-none">STORE</a><br>
            <a href="" class="d-inline-block mb-2 text-white text-decoration-none">DAILY PRICE</a><br>
            <a href="aboutus" class="d-inline-block mb-2 text-white text-decoration-none">ABOUT US</a><br>
            <a href="contactus" class="d-inline-block mb-2 text-white text-decoration-none">CONTACT US</a><br>
        </div>
        <div class="col-lg-2 p-4 policy">
            <h6 class="fs-4">Policies</h6>
            <a href="privacypolicy" class="d-inline-block mb-2 text-white text-decoration-none">Privacy Policy</a><br>
            <a href="refundpolicy" class="d-inline-block mb-2 text-white text-decoration-none">Refund Policy</a><br>
            <a href="shippingpolicy" class="d-inline-block mb-2 text-white text-decoration-none">Shipping Policy</a><br>
            <a href="termsofservice" class="d-inline-block mb-2 text-white text-decoration-none">Terms of Service</a><br>
        </div>
        <div class="col-lg-2 p-4 online">
            <h6 class="fs-4">Find Us Online</h6>
            <a href="" class="d-inline-block mb-2 text-white text-decoration-none"><i class="bi bi-facebook fs-5"></i> Facebook</a><br>
            <a href="" class="d-inline-block mb-2 text-white text-decoration-none"><i class="bi bi-instagram"></i> Instagram</a><br>
            <a href="" class="d-inline-block mb-2 text-white text-decoration-none"><i class="bi bi-whatsapp"></i> Whatsapp</a>
        </div>

        <div class="col-lg-2 p-4 hours">
            <h6 class="fs-4">Serviceable Time</h6>
            <p>Monday-Saturday</p>
            <p>09:30 AM-06:00 PM</p>
            <p>Sunday:Closed</p>
        </div>
    </div>
</div>

<div class="copy">
    <h3>
        Copyright &copy; 2013-<script>
            document.write(new Date().getFullYear());
        </script>.Yaasikaa Enterprises. All Rights Reserved.<br />
        Design By:<img src="images/18My project.png" alt="18logo" width="20px" height="20px">
        <a href="https://18stepstechnologies.com/" target="_blank">18Steps Technologies</a>
    </h3>
</div>