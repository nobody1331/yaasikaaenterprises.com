<?php
include('../middleware/adminMiddleware.php');
include('includes/header.php');



?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Product</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="mb-0" for="">Select Category</label>
                                <select name="category_id" class="form-select mb-2">
                                    <option selected>Select Category</option>
                                    <?php
                                    $categories = getAll("categories");
                                    if (mysqli_num_rows($categories)) {
                                        foreach ($categories as $item) {
                                    ?>
                                            <option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
                                    <?php
                                        }
                                    } else {
                                        echo "No category available";
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0" for="">Name</label>
                                <input type="text" name="name" placeholder="Enter Category Name" class="form-control mb-2" required>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0" for="">Slug</label>
                                <input type="text" name="slug" placeholder="Enter Slug" class="form-control mb-2" required>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Small Description</label>
                                <textarea rows="3" name="small_description" placeholder="Enter Small Description" class="form-control mb-2" required></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Description</label>
                                <textarea rows="3" name="description" placeholder="Enter Description" class="form-control mb-2" required></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0" for="">Original Price</label>
                                <input type="text" name="original_price" placeholder="Enter Original Price" class="form-control mb-2" required>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0" for="">Selling Price</label>
                                <input type="text" name="selling_price" placeholder="Enter Selling Price" class="form-control mb-2" required>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Upload Image (Size 1024px W * 1024px H)</label>
                                <input type="file" name="image" class="form-control mb-2" required>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="mb-0" for="">Quantity</label>
                                    <input type="number" name="qty" placeholder="Enter Quantity" class="form-control mb-2" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="mb-0" for="">Status</label> <br>
                                    <input type="checkbox" name="status">
                                    <p class="text-danger fw-bold">To inactive any product enable checkbox</p>
                                </div>

                                <div class="col-md-4">
                                    <label class="mb-0" for="">Trending</label> <br>
                                    <input type="checkbox" name="trending">
                                    <p class="text-danger fw-bold">To make any product trending enable checkbox</p>
                                </div>
                            </div>

                            <!-- <div class="col-md-12">
                                <label class="mb-0" for="">Meta Title</label>
                                <input type="text" name="meta_title" placeholder="Enter Meta Title" class="form-control mb-2" required>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Meta Keywords</label>
                                <textarea rows="3" name="meta_keywords" placeholder="Enter Meta Keywords" class="form-control mb-2" required></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="">Meta Description</label>
                                <textarea rows="3" name="meta_description" placeholder="Enter Meta Description" class="form-control mb-2" required></textarea>
                            </div> -->
                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-primary" name="add_product_btn">Save</button>
                            </div>


                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>