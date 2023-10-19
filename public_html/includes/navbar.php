
 <!-- navbar -->
 <nav class="navbar navbar-expand-lg  fixed-top py-0 shadow">
        <div class="container-fluid">
            <a class="navbar-brand d-flex flex-column justify-content-center py-0" href="index">
                <img src="images/yklogodesign1.jpg" alt="yklogo" width="120px" height="120px">
            </a>
            <!-- toggler -->
            <button class="navbar-toggler shadow-none" style="background-color:burlywood;font-size:medium;border:none;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Sidebar -->
            <div class="sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title h-font" id="offcanvasNavbarLabel">Yaasikaa Enterprises</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 py-0 pe-3">
                        <li class="nav-item">
                            <a class="nav-link text-black" href="index">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="store">Store</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link text-black" href="">Daily Price</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link text-black" href="aboutus">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="contactus">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="cart"><i class="bi bi-cart-fill"></i> Cart</a>
                        </li>
                        <?php

                        if (isset($_SESSION['auth'])) {

                        ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-black" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?= $_SESSION['auth_user']['name']; ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item" href="my-orders">My Orders</a></li>
                                    <li><a class="dropdown-item" href="logout">Logout</a></li>
                                </ul>
                            </li>
                        <?php
                        } else {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link text-black" href="register">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-black" href="login">Login</a>
                            </li>
                        <?php
                        }
                        ?>

                    

                    </ul>

                </div>
            </div>
        </div>
    </nav>
