<?php
// var_dump($user);
$mode = $_GET['view'];
?>
<style>

</style>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary"> <?php echo $title ?></h6>
            <div><button class="btn btn-primary"><a class="text-light" href="?role=admin&controller=user&action=add&type=<?= $mode ?>">Add <?= $mode ?></a></button></div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th style="width: 400px">Full Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Avatar</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($user as $key => $item) : ?>
                            <tr class="product">
                                <td><?= $key + 1 ?></td>
                                <td><?= $item['full_name'] ?></td>
                                <td><?= $item['username'] ?></td>
                                <td><?= $item['email'] ?></td>
                                <td><?= $item['phone'] ?></td>
                                <td class="<?php echo $item['status'] == 1 ? 'text-success' : 'text-danger' ?>"><?= $item['status'] == 1 ? 'Active' : 'Inactive' ?> </td>
                                <td><?php
                                    echo "<img style='border-radius: 10%;' src='uploads/" . $item['avatar'] . "' width='70px'>";
                                    ?></td>
                                <td class="action-btns d-flex">
                                    <div class="mr-2">
                                        <a href="?role=admin&controller=user&action=edit&type=<?= $mode ?>&id=<?= $item['user_id'] ?>">
                                            <button class="btn btn-info btn-sm">
                                                <i class="fa fa-pencil-alt"></i>
                                            </button>
                                        </a>
                                    </div>
                                    <div class="mr-2">
                                        <a onclick="return confirm('Các danh mục con của danh mục này cũng sẽ bị xoá, bạn có chắc chắn không?')" href="?role=admin&controller=category&action=delete&id=">
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </a>
                                    </div>
                                    <div class="mr-2">
                                        <a href="?role=admin&controller=user&action=show&id=<?= $item['user_id'] ?>">
                                            <button class="btn btn-primary btn-sm">
                                                <i class="fa-solid fa-eye"></i>
                                            </button>
                                        </a>
                                    </div>
                                    <div class="mr-2">
                                        <a href="?role=admin&controller=user&action=changeStatus&type=<?= $mode ?>&id=<?= $item['user_id'] ?>&status=<?= $item['status'] ?>">
                                            <button class="btn btn-secondary btn-sm">
                                                <?php echo $item['status'] == 1 ? 'disable' : 'enable' ?>
                                            </button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div id="pagination" class="d-flex justify-content-end align-items-center"></div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const products = document.querySelectorAll(".product"); // Lấy tất cả sản phẩm
        const itemsPerPage = 2; // Số sản phẩm mỗi trang
        const totalPages = Math.ceil(products.length / itemsPerPage); // Tổng số trang
        const paginationContainer = document.getElementById("pagination");

        function showPage(page) {
            const start = (page - 1) * itemsPerPage;
            const end = start + itemsPerPage;
            products.forEach((product, index) => {
                product.style.display = index >= start && index < end ? "table-row" : "none";
            });
        }

        function renderPagination() {
            for (let i = 1; i <= totalPages; i++) {
                const button = document.createElement("button");
                button.classList.add("btn", "border-primary", "text-primary",'m-1');
                button.textContent = i;
                button.onclick = function() {
                    showPage(i);
                };
                paginationContainer.appendChild(button);
            }
        }
        showPage(1); // Hiển thị trang đầu tiên
        renderPagination(); // Tạo các nút phân trang
    });
</script>