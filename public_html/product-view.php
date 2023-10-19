<?php $pageTitle = "Product-View"; ?>

<?php
include('functions/userfunction.php');
include('includes/header.php');

if (isset($_GET['product'])) {
    $product_slug = $_GET['product'];
    $product_data = getSlugActive("products", $product_slug);
    $product = mysqli_fetch_array($product_data);

    if ($product) {
?>

        <div class="pv1">
            <div class="container">
                <h6 class="text-white">
                    <a class="text-white" href="index.php">Home /</a>
                    <a class="text-white" href="store.php">Store /</a>
                    <a href="" class="text-white"><?= $product['name']; ?></a>
                </h6>
            </div>
        </div>

        <div class="bg-light pv2">
            <div class="container product_data mt-3">
                <div class="row">
                    <div class="col-md-4">
                        <div class="shadow">
                            <img src="uploads/<?= $product['image']; ?>" class="w-100">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h4 class=""><?= $product['name']; ?></h4>
                        <h6><span class="badge rounded-pill bg-danger float-end"><?php if ($product['trending']) {
                                                                                        echo "Trending";
                                                                                    } ?></span></h6>
                        <hr>
                        <p><?= $product['small_description']; ?></p>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Rs <s class="text-danger fw-bold"><?= $product['original_price']; ?></s></h5>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-success fw-bold"> Rs <?= $product['selling_price']; ?></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group mb-3" style="width:120px">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" class="form-control bg-white input-qty text-center" value="1" disabled>
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <h6 class="fw-bold text-danger"> Available Stock :<?= $product['qty']; ?></h6>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <button id="add-to-cart-button" class="btn btn-sm btn-primary px-4 addToCartBtn" value="<?= $product['id']; ?>"><i class="fa fa-shopping-cart me-2"></i>Add to Cart</button>
                            </div>
                            <!-- <div class="col-md-6">
                                <button class="btn btn-sm btn-danger px-4"><i class="fa fa-heart me-2"></i>Add to Wishlist</button>
                            </div> -->
                        </div>

                        <hr>

                        <h6 class="fw-bold">Product Description:</h6>
                        <p><?= $product['description']; ?></p>
                    </div>
                </div>
            </div>
        </div>

<?php



    } else {
        echo "Product Not Found";
    }
} else {
    echo "Something Went Wrong";
}


include('includes/footer.php');

?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get the quantity value
        var qty = <?= $product['qty'] ?>; // Replace with the appropriate way to get the quantity value

        // Disable the "Add to Cart" button if qty is less than or equal to 0
        if (qty <= 0) {
            document.getElementById("add-to-cart-button").disabled = true;
        }
    });
</script>


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