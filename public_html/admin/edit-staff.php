<?php
include('../middleware/adminMiddleware.php');
include('includes/header.php');


?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $user = getByID("users", $id);

                if (mysqli_num_rows($user) > 0) {
                    $data = mysqli_fetch_array($user);
            ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Staff
                                <a href="staff" class="btn btn-primary float-end">Back</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" name="user_id" value="<?= $data['id'] ?>">
                                        <label class="mb-0" for="">Name</label>
                                        <input type="text" name="name" value="<?= $data['name'] ?>" placeholder="Enter Staff Name" class="form-control mb-2">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Phone</label>
                                        <input type="number" name="phone" value="<?= $data['phone'] ?>" class="form-control" placeholder="Enter Your Phone Number" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" value="<?= $data['email'] ?>" class="form-control" placeholder="Enter Your Email" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" value="<?= $data['password'] ?>" class="form-control" placeholder="Enter Password" required>
                                    </div>
                                  
                                    <div class="col-md-12 mt-3">
                                        <button type="submit" class="btn btn-primary" name="update_staff_btn">Update</button>
                                    </div>
                                </div>
                        </div>
                    </div>
            <?php
                } else {
                    echo "Staff Not Found for given id";
                }
            } else {
                echo "Id missing from url";
            }
            ?>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>