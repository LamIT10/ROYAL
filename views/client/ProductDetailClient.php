<div class="d-flex m-5 gap-5">
    <div>
        <div>
            <?php
            foreach ($productDetail['image'] as $key => $value) {
            ?>
                <img width="100" src="uploads/<?php echo $value['image_link'] ?>" alt="">
            <?php
            }
            ?>
        </div>
        <?php
        foreach ($productDetail['color'] as $key => $value) {
        ?>
            <span><a href="?controller=productdetail&id=<?= $_GET['id'] ?>&colorId=<?= $value['color_id'] ?>&sizeId=<?= $_GET['sizeId'] ?>"><?php echo $value['color_name'] ?></a></span>
        <?php
        }
        ?>
        <?php
        foreach ($productDetail['size'] as $key => $value) {
        ?>
            <p><a href="?controller=productdetail&id=<?= $value['product_id'] ?>&colorId=<?= $value['color_id'] ?>&sizeId=<?= $value['size_id'] ?>"><?php echo $value['size_name'] ?></a></p>
        <?php
        }
        ?>
    </div>
    <div>
        <?php
        foreach ($productDetail['product'] as $key => $value) {
        ?>
            <p><?= $value['product_name'] ?></p>
            <p><?= $value['base_price'] ?></p>
            <p><?= $value['sale_price'] ?></p>
            <p><?= $value['color_name'] ?></p>
            <p><?= $value['size_name'] ?></p>
            <p><?= $value['quantity'] ?></p>
            <p><?= $value['description'] ?></p>
        <?php
        }
        ?>
    </div>

</div>