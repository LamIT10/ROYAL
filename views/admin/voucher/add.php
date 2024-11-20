<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card shadow-sm">
                <div class="card-header text-center">
                    <h5 class="font-weight-bold text-primary">Add Voucher</h5>
                </div>
                <div class="card-body">
                    <form action="?role=admin&controller=voucher&action=store" method="POST">
                        <div class="row mb-3">
                            <!-- Code -->
                            <div class="col-md-6">
                                <label for="code" class="form-label">Code</label>
                                <input type="text" class="form-control" id="code" <?= getData('voucher_code') ?> name="voucher_code" placeholder="Enter voucher code">
                                <?php getErorr('voucher_code') ?>
                            </div>
                            <!-- Discount -->
                            <div class="col-md-6">
                                <label for="discount" class="form-label">Discount</label>
                                <input type="number" class="form-control" id="discount" <?= getData('discount') ?> name="discount" placeholder="Enter discount percentage">
                                <?php getErorr('discount') ?>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <!-- Quantity -->
                            <div class="col-md-6">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="quantity" <?= getData('quantity') ?> name="quantity" placeholder="Enter available quantity">
                                <?php getErorr('quantity') ?>
                            </div>

                            <!-- Min Price -->
                            <div class="col-md-6">
                                <label for="min_price" class="form-label">Min Price</label>
                                <input type="number" class="form-control" id="min_price" <?= getData('min_price') ?> name="min_price" placeholder="Enter minimum price">
                                <?php getErorr('min_price') ?>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <!-- Description -->
                            <div class="col-md-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" <?= getData('description') ?> name="description" rows="4" placeholder="Enter description"></textarea>
                            </div>
                            <?php getErorr('description') ?>
                        </div>
                        <!-- Buttons -->
                        <div class="d-flex justify-content-between">
                            <a href="?role=admin&controller=voucher" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-primary">Save Voucher</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>