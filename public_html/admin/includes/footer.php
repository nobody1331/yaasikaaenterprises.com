<footer class="footer pt-5">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-12">
                <ul class="nav nav-footer  justify-content-center text-center">
                    <li class="nav-item">
                        <p class="fw-bold text-black">Copyright © 2013-2023.Yaasikaa Enterprises. All Rights Reserved.</p>
                        <a href="https://18stepstechnologies.com/" class="fw-bold text-black" target="_blank">Design By:18Steps Technologies</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
</main>


<script src="assets/js/jquery-3.6.4.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/perfect-scrollbar.min.js"></script>
<script src="assets/js/smooth-scrollbar.min.js"></script>




<!-- sweet alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="assets/js/custom.js"></script>




<!--Alertify  JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
    <?php if(isset($_SESSION['message'])){ ?>
    alertify.set('notifier', 'position', 'top-right');
    alertify.success('<?= $_SESSION['message'] ?>');
    <?php
      unset($_SESSION['message']);
     } 
     ?>
</script>


</body>

</html>