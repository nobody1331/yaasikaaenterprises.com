
<?php 
$pageTitle = "Payment Success";
date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
include('functions/userfunction.php');
include('includes/header.php');
?>

<?php 
require 'config/dbconfig.php';
if ($_POST['code'] == 'PAYMENT_SUCCESS') {
    $textsuccess = "text-success";
    $mess = "Successful";
    $providerReferenceId = $_POST['providerReferenceId'];
    $transactionId = $_POST['transactionId'];
    // Sanitize and validate the input data before using it in the query
    $providerReferenceId = mysqli_real_escape_string($con, $providerReferenceId);
    $transactionId = mysqli_real_escape_string($con, $transactionId);
    $paymentDate = date('Y-m-d H:i:s');
    // Prepare the update query using a prepared statement
    $updateQty_query = "UPDATE orders SET payment_status='Paid', payment_ref_no='$providerReferenceId', payment_date='$paymentDate' WHERE payment_id='$transactionId'";
    $updateQty_query_run = mysqli_query($con, $updateQty_query);

    if ($updateQty_query_run) {
        echo "Update successful!";
    } else {
        echo "Update failed: " . mysqli_error($con);
    }
}else{
    $transactionId = "NA";
    $textsuccess = "text-danger";
    $mess = "UnSuccessful";
}

?>

<div class="container" style="margin-top: 244px;margin-bottom: 180px;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center <?php echo  $textsuccess ?>" >Payment <?php echo $mess ?></h2>
                    <p class="card-text text-center">Your order has been placed <?php echo $mess ?>.</p>
                    <p class="card-text text-center">Payment ID: <span id="PaymentReferenceNumber"><?php echo $transactionId; ?></span></p>
                    <!-- <p class="card-text text-center">Tracking No: <span id="PaymentReferenceNumber">123456789</span></p> -->
                    <div class="text-center">
                        <a href="index" class="btn btn-primary">Kindly Re-login & Continue Shopping</a>
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

