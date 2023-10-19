<?php
include('../middleware/adminMiddleware.php');
include('includes/header.php');



?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
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
                                    <div class="card-header bg-secondary">
                                        <h4 class="text-white">Register Form</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="../functions/userauthcode.php" method="POST">
                                            <div class="mb-3">
                                                <label class="form-label">Name</label>
                                                <input type="text" name="name" class="form-control" placeholder="Enter Your Name" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Phone</label>
                                                <input type="number" name="phone" class="form-control" placeholder="Enter Your Phone Number" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control" placeholder="Enter Your Email" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Password</label>
                                                <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Confirm Password</label>
                                                <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="mb-0" for="">Admin Status</label>
                                                <select name="role_as" class="form-select mb-2" required>
                                                    <option selected>Select Status</option>
                                                    <option value="admin">Active</option>
                                                </select>
                                            </div>
                                            <button type="submit" name="register_btn" class="btn btn-primary">Submit</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>