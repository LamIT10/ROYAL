<?php
// var_dump($voucherUsed);
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-3 p-3 rounded" style="background-color: #FFF;border:3px solid orangered">
            <p style="border: 2px dashed #FF4E00;color:white" class="bg-danger p-3 rounded fs-5">Voucher bạn đã sử dụng</p>
            <?php
            foreach ($voucherUsed as $key => $value) {
            ?>
                <p style="border: 2px dashed #FF4E00;font-size: 1.7rem; font-weight: bold; color: #FF4E00;" class="bg-white p-2"><?= $value['voucher_code'] ?></p>
            <?php
            }
            ?>
        </div>
        <div class=" col-9 d-flex justify-content-center gap-3" style="flex-wrap: wrap;">
            <?php
            foreach ($listVoucher as $key => $value) {
            ?>
                <div class="d-flex mb-2 align-items-center border border-danger p-2" style="background-color: #FF4E00; color: white; width: 380px; font-family: Arial, sans-serif;">
                    <div class="text-center" style="flex: 1; font-weight: bold;">
                        <div class="px-2">MÃ GIẢM GIÁ</div>
                        <div style="font-size: 1.7rem;"><?= number_format($value['discount']) . "đ" ?></div>
                    </div>
                    <div class="bg-white text-dark p-2" style="flex: 1.5; border-left: 2px dashed #FF4E00;">
                        <div class=""><?= $value['description'] ?></div>
                        <div class="mt-1">
                            <span class="fw-bold" style="font-size: 0.9rem;">Mã</span>
                            <div style="font-size: 1.2rem; font-weight: bold; color: #FF4E00;"><?= $value['voucher_code'] ?></div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>