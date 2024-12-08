<style>
    body {
        background-color: #f8f9fa;
    }

    .table-wrapper {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .table-title {
        margin-bottom: 15px;
    }

    .modal-header {
        background-color: #007bff;
        color: #fff;
    }

    .action-btns .btn {
        margin-right: 5px;
    }
</style>
<div class="main-content">
    <div class="content-wrapper">
        <?php
        if (isset($_SESSION['success'])) {
            if ($_SESSION['success']) {
        ?>
                <div class="notification alert px-5" style="box-shadow: 2px 2px green; color: green;border:1px solid green">
                    <i class="fa-solid fa-circle-check"></i><?php echo $_SESSION['message']; ?>
                </div>
            <?php
            } else {
            ?>
                <div class="notification alert px-5" style="box-shadow: 2px 2px red; color: #940000; border:1px solid red">
                    <i class="fa-solid fa-triangle-exclamation"></i><?php echo $_SESSION['message']; ?>
                </div>
        <?php
            }
            unset($_SESSION['success'], $_SESSION['message']);
        }
        ?>

        <div class="container mt-5">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Danh sách banner</h6>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Ảnh</th>
                                    <th>Ngày tạo</th>
                                    <th>Ngày cập nhật</th>
                                    <th>Thứ tự</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($banner as $key => $item) : ?>

                                    <tr class="product">
                                        <td><?= $key + 1 ?> </td>
                                        <td><img src="uploads/<?= $item['banner_link'] ?>" alt="Banner" width="80px"></td>
                                        <td><?= $item['create_at'] ?></td>
                                        <td><?= $item['update_at'] ?></td>
                                        <td><?= $item['count'] ?></td>
                                        <td class="action-btns">
                                            <a href="?role=admin&controller=banner&action=edit&id=<?= $item['banner_id'] ?>">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </button>
                                            </a>
                                            <a onclick="return confirm('Bạn có muốn xóa banner không?')" href="?role=admin&controller=banner&action=delete&id=<?= $item['banner_id'] ?>">
                                                <button class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                        </table>
                        <div id="pagination" class="float-right"></div>
                    </div>

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