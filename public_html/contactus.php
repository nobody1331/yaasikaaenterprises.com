<?php $pageTitle = "Contact Us"; ?>
<?php
include('functions/userfunction.php');
include('includes/header.php'); ?>

<div class="container-fluid contactussection1 shadow">
    <div class="position-relative">
        <img src="images/contacusimg-min.jpg" class="img-fluid w-100" alt="">
        <div class="position-absolute top-50 start-50 text-white translate-middle w-100" id="contactusid" style="background-color: rgba(0, 0, 0,-0.6)">
            <p>Contact Us</p>
            <a href="index">Home /</a>
            <a href="aboutus">Contact Us</a>
        </div>
    </div>
</div>

<div class="container contactussection2">
    <div class="contactuscontent">
        <h2>Contact Us</h2>
        <p class="fw-bold">Your feedback matters, contact us today</p>
        <div class="stars-container">
            <i class="bi bi-star-fill" style="color:#DAA520;"></i>
            <i class="bi bi-star-fill fs-3 px-2"></i>
            <i class="bi bi-star-fill" style="color:#DAA520	;"></i>
        </div>
    </div>
</div>


<div class="container contactussection3">
    <div class="row">
        <div class="col-lg-4 col-md-6 px-4 mb-4 card1">
            <div class="bg-white rounded shadow p-4 h-100 pop">
                <div class="mb-2 align-items-center">
                    <i class="bi bi-telephone-fill fs-5"></i>
                    <h5 class="card-title">Phone</h5>
                </div>
                <h6 class="card-text">+91 81900 18000</h6>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 px-4 mb-4 card2">
            <div class="bg-white rounded shadow p-4 h-100 pop">
                <div class="mb-2 align-items-center">
                    <i class="bi bi-envelope-fill fs-5"></i>
                    <h5 class="card-title">Email</h5>
                </div>
                <h6 class="card-text">contactus@yaasikaaenterprises.com</h6>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 px-4 mb-4 card3">
            <div class="bg-white rounded shadow p-4 h-100 pop">
                <div class="mb-2 align-items-center">
                    <i class="bi bi-send-fill fs-5"></i>
                    <h5 class="card-title">Address</h5>
                </div>
                <h6 class="card-text">287,288 / W4,BOSE BAZAAR,BODINAYAKANUR,Tamil Nadu-625513</h6>
            </div>
        </div>
    </div>
</div>


<div id="Contact" class="contactsection4">
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3929.0889617131593!2d77.35332271479422!3d10.009510292844633!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTDCsDAwJzM0LjIiTiA3N8KwMjEnMTkuOCJF!5e0!3m2!1sen!2sin!4v1685445385909!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="form">
        <h2>Fill In Your Info</h2>
        <form action="mail.php" method="post">
            <input type="text" class="feild" placeholder="Your Name" name="name" required />
            <input type="email" class="feild" placeholder="Your Email" name="email" required />
            <textarea name="message" class="feild area" placeholder="Message" name="message" rows="5" required></textarea>
            <button type="submit" class="btn">Send Message</button>
        </form>
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