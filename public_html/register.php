<?php $pageTitle = "Register"; ?>
<?php $bodyClass = "regformbg"; ?>

<?php

session_start();

if (isset($_SESSION['auth'])) {
   $_SESSION['message'] = "You are already logged in";
   header('location: index.php');
   exit();
}

include('includes/header.php'); ?>


<div class="py-5 registerform">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-4">
            <?php
            if (isset($_SESSION['message'])) {
            ?>
               <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Holy!</strong> <?= $_SESSION['message']; ?>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
            <?php
               unset($_SESSION['message']);
            }
            ?>
            <div class="card">
               <div class="card-header">
                  <h2 class="text-white">Register Form</h2>
               </div>
               <div class="card-body">
                  <form action="functions/authcode.php" method="POST">
                     <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control shadow-none" placeholder="Enter Your Name" required>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="number" name="phone" class="form-control shadow-none" placeholder="Enter Your Phone Number" required>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control shadow-none" placeholder="Enter Your Email" required>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control shadow-none" placeholder="Enter Password" required>
                     </div>
                     <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="cpassword" class="form-control shadow-none" placeholder="Confirm Password" required>
                     </div>
                     <button type="submit" name="register_btn" class="btn text-white fw-bold" style="background-color: #9f4103;">Submit</button>
                  </form>
               </div>
            </div>
         </div>
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