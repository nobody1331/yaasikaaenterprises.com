<?php $pageTitle = "View-Order"; ?>

<?php
include('functions/userfunction.php');
include('includes/header.php');
include("authenticate.php");

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

<div class="vo1">
    <div class="container">
        <h6 class="text-white">
            <a class="text-white" href="index.php">Home /</a>
            <a class="text-white" href="categories.php">Store /</a>
            <a class="text-white" href="my-orders.php">My Orders /</a>
            <a class="text-white" href="#">My Orders Details /</a>
        </h6>
    </div>
</div>

<div class="vo2">
    <div class="container">
        <div class="card card-body shadow">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-success">
                            <span class="fw-bold fs-4 text-white">View Order</span>
                            <a href="my-orders.php" class="btn btn-warning float-end"><i class="fa fa-reply"></i> Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Delivery Details</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Name</label>
                                            <div class="border p-1">
                                                <?= $data['name']; ?>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Email</label>
                                            <div class="border p-1">
                                                <?= $data['email']; ?>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Phone</label>
                                            <div class="border p-1">
                                                <?= $data['phone']; ?>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Tracking No. </label>
                                            <div class="border p-1">
                                                <?= $data['tracking_no']; ?>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Address</label>
                                            <div class="border p-1">
                                                <?= $data['address']; ?>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Pincode</label>
                                            <div class="border p-1">
                                                <?= $data['pincode']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <h4>Order Details</h4>
                                    <hr>

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $userId = $_SESSION['auth_user']['user_id'];


                                            $order_query = "SELECT o.id as oid,o.tracking_no,o.user_id,oi.*,oi.qty as orderqty,p.* FROM orders o,order_items oi,
                                            products p WHERE o.user_id='$userId' AND oi.order_id=o.id AND p.id=oi.prod_id AND o.tracking_no='$tracking_no'";

                                            $order_query_run = mysqli_query($con, $order_query);

                                            if (mysqli_num_rows($order_query_run) > 0) {
                                                foreach ($order_query_run as $item) {
                                            ?>
                                                    <tr>
                                                        <td class="align-middle"><img src="uploads/<?= $item['image']; ?>" width="50px" height="50px">
                                                            <?= $item['name']; ?>
                                                        </td>
                                                        <td class="align-middle">
                                                            <?= $item['price']; ?>
                                                        </td>
                                                        <td class="align-middle">
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

                                    <hr>

                                    <div class="border p-1 mb-3">
                                        <label class="fw-bold">Payment Mode</label>
                                        <div class="border p-1">
                                            <?= $data['payment_mode']; ?>
                                        </div>
                                    </div>

                                    <div class="border p-1 mb-3">
                                        <label class="fw-bold">Order Status</label>
                                        <div class="border p-1">
                                            <?php
                                            if ($data['status'] == 0) {
                                                echo "Under Process";
                                            } else if ($data['status'] == 3) {
                                                echo "Out for Delivery";
                                            } else if ($data['status'] == 1) {
                                                echo "Completed";
                                            } else if ($data['status'] == 2) {
                                                echo "Cancelled";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    
                                       <div class="border p-1 mb-3">
                                        <label class="fw-bold">Payment Details</label>
                                        <div class="border p-1 mb-2">
                                            Payment Status: <?= $data['payment_status']; ?>
                                        </div>
                                        <div class="border p-1">
                                            Payment Reference No.: <?= $data['payment_ref_no']; ?>
                                        </div>
                                    </div>

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

<div class="container-fluid footer">
    <div class="row justify-content-center footersection1 ">
        <div class="col-lg-4 p-4 company">
            <h6 class="fs-4">Yaasikaa Enterprises</h6>
            <p class="">Yaasikaa Enterprises is one of the leading wholesalers and retailers from the cardamom birthplace of Bodinayakanur. The Tamil sentence is perfectly matched for Bodi as follows by "ஏலம் மணக்கும் போடி".
                Now Yassikaa Enterprises step in to the Digital world to spread the cardamom smell to every home by through digital portal.</p>
        </div>
        <div class="col-lg-2 p-4 links">
            <h6 class="fs-4">Company</h6>
            <a href="store" class="d-inline-block mb-2 text-white text-decoration-none">STORE</a><br>
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
                    <a href="https://www.facebook.com/profile.php?id=100093524080482" target="_blank" class="d-inline-block mb-2 text-white text-decoration-none"><i class="bi bi-facebook fs-5"></i> Facebook</a><br>
            <a href="https://www.instagram.com/yaasikaaykenterprises/" target="_blank" class="d-inline-block mb-2 text-white text-decoration-none"><i class="bi bi-instagram"></i> Instagram</a><br>
            <a href="https://api.whatsapp.com/send?phone=+918190018000&text=Hi Yaasikaa Enterprises" target="_blank" class="d-inline-block mb-2 text-white text-decoration-none"><i class="bi bi-whatsapp"></i> Whatsapp</a>
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