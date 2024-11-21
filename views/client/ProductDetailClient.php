<?php

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
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $productDetail['product'][0]['product_id'] ?>">
                    <input type="hidden" name="colorId" value="<?= $productDetail['product'][0]['color_id'] ?>">
                    <input type="hidden" name="sizeId" value="<?= $productDetail['product'][0]['size_id'] ?>">
                    <input type="number" name="quantity" value="1">
                    <button type="submit" name="addCart" class="btn btn-primary">Them vao gio hang</button>
                </form>
            <?php
            } else {
                echo "Chọn size đi để mua";
                echo "<br>";
            }
            ?>
            <img width="100px" src="uploads/<?= $productDetail['product'][0]['image_main'] ?>" alt="">

        </div>
    </div>
</div>