<?php 
include('../middleware/adminMiddleware.php');
include('includes/header.php');



?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Staff</h4>
                </div>
                <div class="card-body" id="users_table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                              $query = "SELECT * FROM users WHERE role_as='1'";
                              $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $users) {
                            ?>
                                    <tr>
                                        <td><?= $users['name']; ?></td>
                                        <td><?= $users['email']; ?></td>
                                        <td>
                                            <a href="edit-staff.php?id=<?= $users['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-danger delete_staff_btn" value="<?= $users['id']; ?>">Delete</button>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "No records found";
                            }
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>





<?php include('includes/footer.php'); ?>