<style>
    .product-images img {
        width: 100%;
        cursor: pointer;
    }

    .thumbnail {
        width: 100px;
        height: 100px;
        object-fit: cover;
        cursor: pointer;
    }

    .thumbnail-container {
        display: flex;
        gap: 10px;
    }

    .product-info {
        padding-left: 30px;
    }

    .btn-orange {
        background-color: #ff9900;
        color: white;
    }

    .btn-orange:hover {
        background-color: #ff6600;
    }

    .product-title {
        font-size: 1.5rem;
        font-weight: bold;
    }

    .price {
        font-size: 1.2rem;
        color: #e53935;
    }
</style>
<?php
$product = $productDetail['product'][0];
?>
<div class="p-5">
    <div class="row">

        <div class="col-6">
            <?php
            foreach ($productDetail['color'] as $key => $value) {
            ?>
                <a href="?controller=productdetail&id=<?= $_GET['id'] ?>&colorId=<?= $value['color_id'] ?>&sizeId=<?= $_GET['sizeId'] ?>"><?= $value['color_name'] ?></a>
            <?php
            }
            echo "<br>";
            foreach ($productDetail['size'] as $key => $value) {
            ?>
                <a href="?controller=productdetail&id=<?= $_GET['id'] ?>&colorId=<?= $_GET['colorId'] ?>&sizeId=<?= $value['size_id'] ?>"><?= $value['size_name'] ?></a>
            <?php
            }

            echo "<br>";
            foreach ($productDetail['image'] as $key => $value) {
            ?>
                <img width="100px" src="uploads/<?= $value['image_link'] ?>" alt="">
            <?php
            }
            ?>
        </div>
        <div class="col-6">
            <?php
            foreach ($productDetail['product'] as $key => $value) {
                echo $value['product_name'];
                echo "<br>";
                echo $value['base_price'];
                echo "<br>";
                echo $value['sale_price'];
                echo "<br>";
                echo $value['description'];
                echo "<br>";
                echo $value['color_name'];
                echo "<br>";
                echo $value['size_name'];
                echo "<br>";
                if ($productDetail['addToCart']) {
                    echo "$value[quantity]";
                }
                echo "<br>";
            }
            if ($productDetail['addToCart']) {
            ?>
                <form action="?controller=cart&action=store" method="post">
                    <input type="hidden" name="variant_id" value="<?= $product['variant_id'] ?>">
                    <input type="number" name="quantity_cart">
                    <button type="submit" name="addCart" class="btn btn-primary">Add to cart</button>
                </form>
            <?php
            } else {
                echo "Chọn size đi để mua";
                echo "<br>";
            }
            ?>
            <img width="100px" src="uploads/<?= $product['image_main'] ?>" alt="">
            <?= $product['variant_id'] ?>
        </div>
    </div>
</div>


<div class="container mt-5">
    <div class="row">
        <!-- Ảnh to và Ảnh nhỏ -->
        <div class="col-lg-6">
            <div class="d-flex justify-content-center gap-2">
                <div class="col-2 d-flex flex-column gap-2">
                    <img src="uploads/<?= $product['image_main'] ?>" alt="Thumbnail 1" class="">
                    <?php foreach ($productDetail['image'] as $key => $value) {
                    ?>
                        <img src="uploads/<?= $value['image_link'] ?>" alt="Thumbnail" class="">
                    <?php
                    }
                    ?>
                </div>
                <!-- Ảnh lớn -->
                <div class="col-9">
                    <div class="product-images">
                        <img src="uploads/<?= $product['image_main'] ?>" alt="Product Image" class="img-fluid">
                    </div>
                </div>
                <!-- Ảnh nhỏ -->
            </div>
        </div>
        <!-- Thông tin sản phẩm -->
        <div class="col-lg-6 product-info">
            <div class="product-title"><?= $product['product_name'] ?></div>
            <div class="rating mt-2">
                <span>⭐⭐⭐⭐☆</span> 120 Đánh giá
            </div>
            <div class="price mt-3 fw-bold"><?= number_format($product['sale_price']) ?> VNĐ</div>
            <div class="fs-6 price mt-2 text-decoration-line-through text-secondary"><?= number_format($product['base_price']) ?> VNĐ</div>

            <!-- Màu sắc -->
            <div class="mt-3">
                <label class="mb-2" for="color">Màu sắc:</label><br>
                <?php
                foreach ($productDetail['color'] as $key => $value) {
                ?>
                    <a class="me-1" style="display:inline-block;width:30px;height:30px;background-color: <?= $value['color_code'] ?>;border-radius:50%;" href="?controller=productdetail&id=<?= $_GET['id'] ?>&colorId=<?= $value['color_id'] ?>&sizeId=<?= $_GET['sizeId'] ?>"></a>
                <?php
                }
                ?>
            </div>

            <!-- Kích thước -->
            <div class="mt-3">
                <label class="mb-2" for="size">Kích thước:</label><br>
                <?php
                foreach ($productDetail['size'] as $key => $value) {
                ?>
                    <a class="btn btn-outline-dark" href="?controller=productdetail&id=<?= $_GET['id'] ?>&colorId=<?= $_GET['colorId'] ?>&sizeId=<?= $value['size_id'] ?>"><?= $value['size_name'] ?></a>
                <?php
                }
                ?>
            </div>

            <!-- Số lượng -->
            <div class="mt-3">
                <label for="quantity">Số lượng:</label><br>
                <input type="number" value="1" min="1" class="form-control w-25 d-inline" id="quantity">
            </div>

            <!-- Nút thêm vào giỏ hoặc mua ngay -->
            <div class="mt-4">
                <button class="btn btn-orange w-100">Thêm vào giỏ</button>
                <button class="btn btn-orange w-100 mt-2">Mua ngay</button>
            </div>
        </div>
    </div>
</div>