<div class="container py-4">
    <h3 class="mb-4">User Details</h3>
    <div class="row g-4  bg-light p-4 rounded shadow">
        <!-- Avatar -->
        <div class="col-md-3 text-center">
            <img src="uploads/<?= $user['avatar'] ?>" alt="User Avatar" class="rounded-circle img-fluid border border-secondary" style="max-width: 150px;">
        </div>
        <!-- User Information -->
        <div class="col-md-9">
            <div class="row mb-3">
                <div class="col-sm-4"><strong>User ID:</strong></div>
                <div class="col-sm-8"><?= $user['user_id'] ?></div>
            </div>
            <hr>
            <div class="row mb-3">
                <div class="col-sm-4"><strong>Username:</strong></div>
                <div class="col-sm-8"><?= $user['username'] ?></div>
            </div>
            <hr>
            <div class="row mb-3">
                <div class="col-sm-4"><strong>Full Name:</strong></div>
                <div class="col-sm-8"><?= $user['full_name'] ?></div>
            </div>
            <hr>
            <div class="row mb-3">
                <div class="col-sm-4"><strong>Role:</strong></div>
                <div class="col-sm-8"><?= $user['role_id'] ?></div>
            </div>
            <hr>
            <div class="row mb-3">
                <div class="col-sm-4"><strong>Email:</strong></div>
                <div class="col-sm-8"><?= $user['email'] ?></div>
            </div>
            <hr>
            <div class="row mb-3">
                <div class="col-sm-4"><strong>Phone:</strong></div>
                <div class="col-sm-8"><?= $user['phone'] ?></div>
            </div>
            <hr>
            <div class="row mb-3">
                <div class="col-sm-4"><strong>Address:</strong></div>
                <div class="col-sm-8"><?= $user['address'] ?></div>
            </div>
            <hr>
            <div class="row mb-3">
                <div class="col-sm-4"><strong>Date of Birth:</strong></div>
                <div class="col-sm-8"><?= $user['date_of_birth'] ?></div>
            </div>
            <hr>
            <div class="row mb-3">
                <div class="col-sm-4"><strong>Status:</strong></div>
                <div class="col-sm-8"><span class="badge bg-success"><?= $user['status'] ?></span></div>
            </div>
            <hr>
            <div class="row mb-3">
                <div class="col-sm-4"><strong>Created At:</strong></div>
                <div class="col-sm-8"><?= $user['create_at'] ?></div>
            </div>
            <hr>
            <div class="row mb-3">
                <div class="col-sm-4"><strong>Updated At:</strong></div>
                <div class="col-sm-8"><?= $user['update_at'] ?></div>
            </div>
         </div>
    </div>
</div>