<style>
    #btn-avt {
        margin-top: 10px;
        animation: show 0.3s ease-in-out forwards;
    }

    @keyframes show {
        0% {
            scale: 0.1;
        }

        50% {
            scale: 1.2;
        }

        100% {
            scale: 1;
        }
    }
</style>

<div class="container py-4">
    <div class="d-flex justify-content-between gap-4">
        <form action="?controller=account&action=updateAvatar&id=<?= $account['user_id'] ?>" method="post" enctype="multipart/form-data" class="col-md-4 text-center border-end p-4 shadow-sm rounded" style="background-color: #fff;">
            <div class="mb-3">
                <div class="rounded-circle bg-primary text-white d-inline-flex justify-content-center align-items-center overflow-hidden" style="width: 150px; height: 150px; font-size: 2rem; border:5px solid #fff;box-shadow: 0 0 5px rgba(0, 0, 0, 0.5)"><img width="100%" src="uploads/<?= $account['avatar'] ?>" alt=""></div>
            </div>
            <h5 class="mb-1"><?= $account['full_name'] ?></h5>
            <label for="avatar">
                <i class="bi bi-pencil text-primary"></i>
                <input id="avatar" type="file" name="avatar" id="avatar" class="d-none">
            </label>
            <br>
            <button id="btn-avt" class="btn btn-primary w-50 me-auto d-none" type="submit">Cập nhật</button>
            <a href="?controller=account&action=changePass" class="btn btn-primary d-block mt-3">Đổi mật khẩu</a>
        </form>


        <!-- Phần form thông tin bên phải -->
        <div class="col-md-8 p-4 shadow-sm rounded" style="background-color: #fff;">

            <?php
            if (isset($_GET['action']) && $_GET['action'] == 'changePass') {
            ?>
                <form method="POST" action="?controller=account&action=changePassword&id=<?= $account['user_id'] ?>">
                    <h4 class="mb-4">Đổi mật khẩu</h4>

                    <div class="mb-3">
                        <label for="currentPassword" class="form-label">Mật khẩu cũ</label>
                        <input type="password" class="form-control" id="currentPassword" name="currentPassword" placeholder="Nhập mật khẩu cũ">
                    </div>

                    <div class="mb-3">
                        <label for="newPassword" class="form-label">Mật khẩu mới</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Nhập mật khẩu mới">
                    </div>

                    <div class="mb-3">
                        <label for="confirmNewPassword" class="form-label">Nhập lại mật khẩu mới</label>
                        <input type="password" class="form-control" id="confirmNewPassword" name="confirmNewPassword" placeholder="Nhập lại mật khẩu mới">
                    </div>
                    <div class="d-flex gap-4 justify-content-end">
                        <a class="btn btn-outline-primary" href="?controller=account">Về trang thông tin</a>
                        <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                    </div>

                </form>
            <?php
            } else {
            ?>
                <h4 class="fw-bold text-primary">Thông tin tài khoản</h4>
                <form action="?controller=account&action=update&id=<?= $account['user_id'] ?>" method="post">
                    <div class="mb-3">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Họ tên</label>
                        <input type="text" class="form-control" name="full_name" id="name" value="<?= $account['full_name'] ?>">
                        <?php getErorr("full_name") ?>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Tên đăng nhập</label>
                        <input type="text" class="form-control" name="username" id="username" value="<?= $account['username'] ?>">
                        <?php getErorr("username") ?>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="<?= $account['phone'] ?>">
                        <?php getErorr("phone") ?>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?= $account['email'] ?>">
                        <?php getErorr("email") ?>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control" name="address" id="address" value="<?= $account['address'] ?>">
                        <?php getErorr("address") ?>
                    </div>
                    <div class="mb-3">
                        <label for="date_of_birth" class="form-label">Ngày sinh</label>
                        <input type="text" class="form-control" name="date_of_birth" id="address" value="<?= $account['date_of_birth'] ?>">
                        <?php getErorr("date_of_birth") ?>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Lưu thông tin</button>
                </form>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<script>
    document.getElementById("avatar").addEventListener("change", function() {
        document.getElementById("btn-avt").classList.remove("d-none");
    });
</script>