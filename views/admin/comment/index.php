<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Quản lý bình luận</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered align-middle" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Tổng số bình luận</th>
                            <th scope="col">Bình luận mới nhất</th>
                            <th scope="col">Bình luận cũ nhất</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($list as $key => $value) {
                        ?>
                            <tr class="product">
                                <th scope="row"><?= $key + 1 ?></th>
                                <td><?= $value['product_name'] ?></td>
                                <td><img src="uploads/<?= $value['image'] ?>" alt="" style="width: 80px" class="img-thumbnail"></td>
                                <td><?= $value['total'] ?> bình luận</td>
                                <td><?= $value['newest'] ?></td>
                                <td><?= $value['oldest'] ?></td>
                                <td><a href="?role=admin&controller=comment&action=detail&id=<?= $value['product_id'] ?>" class="btn btn-info btn-icon-split p-2">
                                        <span><i class="fa-solid fa-circle-info"></i> Chi tiết</span>
                                    </a></td>
                            <?php
                        }
                            ?>
                    </tbody>
                </table>
                <div id="pagination" class="float-right"></div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const products = document.querySelectorAll(".product");
        const itemsPerPage = 5;
        const totalPages = Math.ceil(products.length / itemsPerPage);
        const paginationContainer = document.getElementById("pagination");
        let currentPage = 1;

        function showPage(page) {
            const start = (page - 1) * itemsPerPage;
            const end = start + itemsPerPage;
            products.forEach((product, index) => {
                product.style.display = index >= start && index < end ? "table-row" : "none";
            });
        }

        function renderPagination() {
            paginationContainer.innerHTML = "";
            if (currentPage > 1) {
                const prevButton = document.createElement("button");
                prevButton.classList.add("btn", "border-primary", "text-primary", "m-1");
                prevButton.textContent = "←";
                prevButton.onclick = function() {
                    currentPage--;
                    updatePagination();
                };
                paginationContainer.appendChild(prevButton);
            }
            const currentButton = document.createElement("button");
            currentButton.classList.add("btn", "btn-primary", "m-1");
            currentButton.textContent = currentPage;
            currentButton.disabled = true;
            paginationContainer.appendChild(currentButton);

            if (currentPage < totalPages) {
                const nextButton = document.createElement("button");
                nextButton.classList.add("btn", "border-primary", "text-primary", "m-1");
                nextButton.textContent = "→";
                nextButton.onclick = function() {
                    currentPage++;
                    updatePagination();
                };
                paginationContainer.appendChild(nextButton);
            }
        }

        function updatePagination() {
            showPage(currentPage);
            renderPagination();
        }

        updatePagination();
    });
</script>