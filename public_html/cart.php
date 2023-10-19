<?php $pageTitle = "Cart"; ?>

<?php
ob_start();
include('functions/userfunction.php');

include('includes/header.php');
include("authenticate.php");
?>


<div class="cp1">
    <div class="container">
        <h6 class="text-white">
            <a class="text-white" href="index.php">Home /</a>
            <a class="text-white" href="categories.php">Store /</a>
            <a class="text-white" href="cart.php">Cart /</a>
        </h6>
    </div>
</div>

<div class="bg-white cp2">
    <div class="container">
        <div class="card card-body shadow">
            <div class="row">
                <div class="col-md-12">
                    <h3>My Cart <i class="fa fa-shopping-cart"></i></h3>
                    <hr>

                    <div id="mycart">

                        <?php
                        $items = getCartItems();

                        if (mysqli_num_rows($items) > 0) {
                        ?>
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <h6>Product</h6>
                                </div>
                                <div class="col-md-3">
                                    <h6>Price</h6>
                                </div>
                                <div class="col-md-2">
                                    <h6>Quantity</h6>
                                </div>
                                <div class="col-md-2">
                                    <h6>Action</h6>
                                </div>
                            </div>
                            <div id="">
                                <?php
                                foreach ($items as $citem) {
                                ?>
                                    <div class="card product_data shadow-sm mb-3 p-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-2">
                                                <img src="uploads/<?= $citem['image'] ?>" width="80px">
                                            </div>
                                            <div class="col-md-3">
                                                <h6><?= $citem['name'] ?></h6>
                                            </div>
                                            <div class="col-md-3">
                                                <h6>Rs <?= $citem['selling_price'] ?></h6>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="hidden" class="prodId" value="<?= $citem['prod_id'] ?>">
                                                <div class="input-group mb-3" style="width:120px">
                                                    <button class="input-group-text decrement-btn updateQty">-</button>
                                                    <input type="text" class="form-control bg-white input-qty text-center" value="<?= $citem['prod_qty'] ?>" disabled>
                                                    <button class="input-group-text increment-btn updateQty">+</button>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-sm btn-danger deleteItem" value="<?= $citem['cid'] ?>">
                                                    <i class="fa fa-trash me-2"></i> Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }

                                ?>
                            </div>
                            <div class="float-end">
                                <a href="checkout.php" class="btn btn-success">Proceed To Checkout</a>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="card card-body text-center shadow">
                                <h4 class="py-2 text-danger fw-bold">Your Cart is empty</h4>
                            </div>
                        <?php
                        }
                        ?>

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