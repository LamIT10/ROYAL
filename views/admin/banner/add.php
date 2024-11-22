<style>
    body {
        background-color: #f8f9fa;
    }

    .form-wrapper {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 500px;
        margin: 50px auto;
    }

    .form-header {
        background-color: #007bff;
        color: #fff;
        padding: 10px;
        border-radius: 8px 8px 0 0;
        text-align: center;
    }

    .form-preview img {
        max-width: 100%;
        height: auto;
        border: 1px solid #ddd;
        border-radius: 8px;
        margin-bottom: 15px;
    }
</style>

<?php
if (isset($_SESSION['success'])) {
    if ($_SESSION['success']) {
?>
        <div class="notification alert px-5" style="box-shadow: 2px 2px green; color: green; border:1px solid green">
            <i class="fa-solid fa-circle-check"></i><?php echo $_SESSION['message']; ?>
        </div>
    <?php
    } else {
    ?>
        <div class="notification alert px-5" style="box-shadow: 2px 2px red; color: #940000; border:1px solid red">
            <i class="fa-solid fa-triangle-exclamation"></i><?php echo $_SESSION['error']; ?>
        </div>
<?php
    }
    unset($_SESSION['success'], $_SESSION['error']);
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container d-flex justify-content-center align-items-center mt-5">
    <div class="card p-4 shadow" style="width: 400px;">
        <h5 class="text-center mb-4 text-primary">Add Banner</h5>
        <form action="?role=admin&controller=banner&action=store" method="POST" enctype="multipart/form-data">
            <!-- Banner File Input -->
            <div class="mb-3">
                <label for="banner_link" class="form-label">Upload Banner</label>
                <input type="file" class="form-control" id="banner_link" name="banner_link">
            </div>
            <!-- Submit Button -->
            <div class="d-flex justify-content-between">
                <button class="btn btn-secondary"><a class="text-light" href="?role=admin&controller=banner">Back</a></button>
                <button type="submit" class="btn btn-primary">Add Banner</button>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>