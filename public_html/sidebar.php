
<div class="col-lg-3 py-4 catdesign">
    <div class="card shadow">
        <div class="card-body">
            <h4 class="bg-light">Categories</h4>
            <?php
            $categories = getAllActive("categories");

            if (mysqli_num_rows($categories) > 0) {
                foreach ($categories as $item) {
            ?>
                    <a class="fw-bold" href="categories.php?id=<?= $item['id'] ?>">
                        <ul>
                            <li>
                                <?= $item['name'] ?>
                            </li>
                        </ul>
                    </a>
            <?php
                }
            } else {
                echo "No data available";
            }

            ?>
        </div>
    </div>
</div>

