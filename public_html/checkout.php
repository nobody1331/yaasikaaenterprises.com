<?php $pageTitle = "Checkout"; ?>

<?php
include('functions/userfunction.php');
include('includes/header.php');
include("authenticate.php");
?>

<div class="co1">
    <div class="container">
        <h6 class="text-white">
            <a class="text-white" href="index.php">Home /</a>
            <a class="text-white" href="categories.php">Store /</a>
            <a class="text-white" href="checkout.php">Checkout /</a>
        </h6>
    </div>
</div>

<div class="co2">
    <div class="container">
        <div class="card card-body shadow">
            <form action="paysuccess.php" method="POST" id="paymentForm">
                <div class="row">
                    <div class="col-md-7">
                        <h4>Basic Details</h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Name</label>
                                <input type="text" required name="name" id="name" placeholder="Enter your full name" class="form-control">
                                <small class="text-danger name"></small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Email</label>
                                <input type="email" required name="email" id="email" placeholder="Enter your email" class="form-control">
                                <small class="text-danger email"></small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Phone</label>
                                <input type="text" required name="phone" id="phone" placeholder="Enter your phone number" class="form-control">
                                <small class="text-danger phone"></small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Pincode</label>
                                <input type="text" required name="pincode" id="pincode" placeholder="Enter your pincode" class="form-control">
                                <small class="text-danger pincode"></small>
                            </div>
                            <div class="col-md-12">
                                <label class="fw-bold">Address</label>
                                <textarea name="address" class="form-control" id="address" rows="5" required></textarea>
                                <small class="text-danger address"></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <h4>Order Details</h4>
                        <hr>
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

                        </div>


                        <?php
                        $items = getCartItems();
                        $totalPrice = 0;

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
                                        <h6><?= $citem['selling_price'] ?></h6>
                                    </div>
                                    <div class="col-md-3">
                                        <h6>x <?= $citem['prod_qty'] ?></h6>
                                    </div>
                                </div>
                            </div>
                        <?php
                            $totalPrice += $citem['selling_price'] * $citem['prod_qty'];
                        }
                        ?>
                        <hr>
                        <h5 class="fw-bold" id="totalPrice">Total Price : <span class="float-end fw-bold"><?= $totalPrice ?></span></h5>
                        <hr>


                        <div>
                            <!-- Button to initiate PhonePe payment -->
                            
                            <button type="button" id="phonepe-button" class="btn btn-sm btn-success fw-bold w-100 d-flex align-items-center justify-content-center">
                                <img width="48" height="48" src="https://img.icons8.com/color/40/phone-pe.png" alt="phone-pe" />
                                Pay with PhonePe
                            </button>

                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php include('includes/footer.php'); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // When the user clicks the PhonePe button
        $("#phonepe-button").click(function() {
            var name = $('#name').val().trim();
            var email = $('#email').val().trim();
            var phone = $('#phone').val().trim();
            var pincode = $('#pincode').val().trim();
            var address = $('#address').val().trim();
            var isValid = true;

            if (name.length === 0) {
                $('.name').text("*This field is required");
                isValid = false;
            } else {
                $('.name').text("");
            }

            if (email.length === 0) {
                $('.email').text("*This field is required");
                isValid = false;
            } else {
                $('.email').text("");
            }

            if (phone.length === 0) {
                $('.phone').text("*This field is required");
                isValid = false;
            } else {
                $('.phone').text("");
            }

            if (pincode.length === 0) {
                $('.pincode').text("*This field is required");
                isValid = false;
            } else {
                $('.pincode').text("");
            }

            if (address.length === 0) {
                $('.address').text("*This field is required");
                isValid = false;
            } else {
                $('.address').text("");
            }

            // If any of the required fields are empty, stop the payment process
            if (!isValid) {
                return;
            }

            if (isValid) {
                var formData = {
                    name: name,
                    email: email,
                    phone: phone,
                    pincode: pincode,
                    address: address,
                    total_price: <?= $totalPrice ?>,
                    payment_mode: "PhonePe",
                    payment_id: "", // Leave it blank for now, it will be filled after payment is completed
                };

                $.ajax({
                    url: "initiate_phonepe_payment.php", // Create a new PHP file for initiating the payment
                    type: "POST",
                    data: formData,
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        // Check the response and handle success or failure
                        if (response != false) {
                            // Payment initiated successfully, redirect to PhonePe payment page
                            window.location.href = response;
                        } else {
                            // Failed to initiate payment, handle the error
                            alert("Failed to initiate PhonePe payment.");
                        }
                    }
                });
            }
        });
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
