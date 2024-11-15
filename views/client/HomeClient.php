     <div id="carouselExampleIndicators" class="carousel slide mb-3" data-bs-ride="carousel">
         <div class="carousel-indicators">
             <?php
                for ($i = 0; $i < count($listBanners); $i++) {
                ?>
                 <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $i ?>" <?php echo $i == 0 ? "class='active' aria-current='true'"  : "" ?> aria-label="Slide <?= $i + 1 ?>"></button>
             <?php
                }
                ?>
         </div>
         <div class="carousel-inner">
             <?php
                foreach ($listBanners as $key => $value):
                ?>
                 <div class="carousel-item active">
                     <img src="uploads/<?= $value['banner_link'] ?>" class="d-block w-100" alt="">
                 </div>
             <?php
                endforeach;
                ?>
         </div>
         <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
             <span class="carousel-control-prev-icon" aria-hidden="true"></span>
             <span class="visually-hidden">Previous</span>
         </button>
         <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
             <span class="carousel-control-next-icon" aria-hidden="true"></span>
             <span class="visually-hidden">Next</span>
         </button>
     </div>
     <div class="container">
         <?php
            foreach ($listProduct as $key => $value):
                echo $value['color_id'];
            ?>
             <div class="" style="width: 16rem">
                 <a href="?controller=productdetail&id=<?= $value["product_id"] ?>&colorId=<?= $value["color_id"] ?>&sizeId=<?= $value["size_id"] ?>">
                     <img src="uploads/<?= $value['image_link'] ?>" class="card-img-top" alt="...">
                     <div class="">
                         <div class="card-text"><?= $value['product_name'] ?></div>
                         <div class="card-text fw-bold"><?= number_format($value['base_price']) ?> VNĐ</div>
                         <div class="decoration-line"><?= number_format($value['sale_price']) ?> VNĐ</div>
                     </div>
                 </a>
             </div>
         <?php
            endforeach;
            ?>
     </div>
     <style>
         .decoration-line {
             text-decoration: line-through;
             font-size: 13px;
         }

         .card-text {
             margin: 8px 0;
         }
     </style>