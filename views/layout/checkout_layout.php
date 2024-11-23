<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <div class="row">
            <!-- Form bên trái -->
            <div class="col-md-7" style="padding-left: 100px;">
                <h4>Thông tin người nhận</h4>
                <form method="POST" action="?controller=checkout&action=order">
                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Họ và tên</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Nhập họ và tên" required>
                    </div>

                    <!-- Address -->
                    <div class="mb-3">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <div>
                            <select class="form-select form-select-sm mb-3" id="city" aria-label=".form-select-sm">
                                <option value="" selected>Chọn tỉnh thành</option>
                            </select>

                            <select class="form-select form-select-sm mb-3" id="district" aria-label=".form-select-sm">
                                <option value="" selected>Chọn quận/huyện</option>
                            </select>

                            <select class="form-select form-select-sm" id="ward" aria-label=".form-select-sm">
                                <option value="" selected>Chọn phường/xã</option>
                            </select>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="mb-3">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input type="tel" id="phone" name="phone" class="form-control" placeholder="Nhập số điện thoại" required>
                    </div>

                    <!-- Voucher -->
                    <div class="mb-3">
                        <label for="voucher_code" class="form-label">Mã giảm giá</label>
                        <input type="text" id="voucher_code" name="voucher_code" class="form-control" placeholder="Nhập mã giảm giá">
                    </div>

                    <!-- Payment Method -->
                    <div class="mb-3">
                        <label for="payment_method" class="form-label">Phương thức thanh toán</label>
                        <div>
                            <input type="radio" name="payment_method" value="0" checked id=""><span style="margin-right: 20px;"> Tiền mặt</span>
                            <input type="radio" name="payment_method" value="vnpay"  id=""><span style="margin-right: 20px;"> VNPAY</span>
                            <input type="radio" name="payment_method" value="momo"  id=""><span style="margin-right: 20px;"> MOMO</span>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100">Xác nhận đơn hàng</button>
                </form>
            </div>

            <!-- Chi tiết đơn hàng bên phải -->
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Chi tiết đơn hàng</h4>
                        <ul class="list-unstyled">
                            <li class="d-flex justify-content-between">
                                <span>Tạm tính:</span>
                                <strong>700.000 đ</strong>
                            </li>
                            <li class="d-flex justify-content-between">
                                <span>Giảm giá:</span>
                                <strong>-50.000 đ</strong>
                            </li>
                            <li class="d-flex justify-content-between">
                                <span>Phí vận chuyển:</span>
                                <strong>20.000 đ</strong>
                            </li>
                        </ul>
                        <hr>
                        <div class="d-flex justify-content-between fs-5">
                            <strong>Tổng thanh toán:</strong>
                            <strong class="text-danger">670.000 đ</strong>
                        </div>
                        <p class="mt-3 text-center">
                            <a href="#" class="text-primary">Chọn thêm mã giảm giá</a>
                        </p>
                        <div class="text-center">
                            <img src="https://via.placeholder.com/200x50" alt="Payment Options" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
    var citis = document.getElementById("city");
    var districts = document.getElementById("district");
    var wards = document.getElementById("ward");
    var Parameter = {
        url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
        method: "GET",
        responseType: "application/json",
    };
    var promise = axios(Parameter);
    promise.then(function(result) {
        renderCity(result.data);
    });

    function renderCity(data) {
        for (const x of data) {
            citis.options[citis.options.length] = new Option(x.Name, x.Id);
        }
        citis.onchange = function() {
            district.length = 1;
            ward.length = 1;
            if (this.value != "") {
                const result = data.filter(n => n.Id === this.value);

                for (const k of result[0].Districts) {
                    district.options[district.options.length] = new Option(k.Name, k.Id);
                }
            }
        };
        district.onchange = function() {
            ward.length = 1;
            const dataCity = data.filter((n) => n.Id === citis.value);
            if (this.value != "") {
                const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;

                for (const w of dataWards) {
                    wards.options[wards.options.length] = new Option(w.Name, w.Id);
                }
            }
        };
    }
</script>