<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<script src="assets/js/jquery-3.6.4.min.js"></script>

<script src="assets/js/custom.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>

<!--Video Js-->
<script src="https://vjs.zencdn.net/7.19.2/video.min.js"></script>

<!--Alertify  JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
   alertify.set('notifier', 'position', 'top-center');
   <?php
   if (isset($_SESSION['message'])) {
   ?>
      alertify.success('<?= $_SESSION['message'] ?>');
   <?php
      unset($_SESSION['message']);
   }
   ?>
</script>

</body>

</html>