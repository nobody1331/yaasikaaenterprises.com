<?php $pageTitle = "Categories"; ?>

<?php
include('functions/userfunction.php');
include('includes/header.php');

$id=$_GET['id'];
if(empty($id)){
    header("location:index.php");
}


$sql = "SELECT * FROM categories
INNER JOIN  products  ON categories.id=products.category_id
WHERE categories.id='$id'";

$run = mysqli_query($con, $sql);
$rows = mysqli_num_rows($run);
?>

<div class="container-fluid storesection1 shadow">
    <div class="position-relative">
        <img src="images/store1-min.jpg" class="img-fluid w-100" alt="">
        <div class="position-absolute start-50 translate-middle w-100" id="storeid" style="background-color: rgba(0, 0, 0, -0.10)">
            <p>Store</p>
            <a href="index">Home /</a>
            <a href="store">Store</a>
        </div>
    </div>
</div>

<div class="container-fluid storesection2">
    <div class="row">
        <div class="col-lg-1">
        </div>
        <?php include "sidebar.php" ?>
        <div class="col-lg-7 py-4">
            <div class="row">
                <?php
                if ($rows) {
                    while ($result = mysqli_fetch_assoc($run)) {
                ?>
                        <div class="col-md-3  mb-2">
                            <a href="product-view.php?product=<?= $result['slug']; ?>">
                                <div class="card-body p-1 shadow">
                                    <img src="uploads/<?= $result['image']; ?>" class="w-100 mb-2 h-50 img-fluid">
                                    <h5 class="text-center fw-bold"><?= $result['name']; ?></h5>
                                    <p class="text-center fw-bold">Rs <?= $result['selling_price']; ?> /-</p>
                                </div>
                            </a>
                        </div>
                <?php }
                } ?>
                
            </div>

        </div>
        <div class="col-lg-1">
        </div>
    </div>
</div>



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



<?php include('includes/footer.php'); ?>