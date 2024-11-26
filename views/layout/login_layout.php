<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        /* Custom CSS */
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #ff9a9e, #fad0c4);
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        .login-container h3 {
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        .form-control {
            border-radius: 10px;
        }

        .btn-custom {
            background: #333;
            color: white;
            border-radius: 10px;
        }

        .btn-custom:hover {
            background: #555;
        }

        .link-custom {
            color: #666;
            text-decoration: none;
            font-size: 14px;
        }

        .link-custom:hover {
            text-decoration: underline;
        }

        .toas {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 20px;
            z-index: 1000;
            background-color: #ffffff;
            overflow: hidden;
            animation: slideInOut 7s ease-out forwards;
            border-radius: 0px;
            min-width: 300px;
        }

        @keyframes slideInOut {
            0% {
                opacity: 1;
                transform: translateX(100%);
            }

            5% {
                opacity: 1;
                transform: translateX(0);
            }

            70% {
                opacity: 1;
                transform: translateX(0);
            }

            100% {
                opacity: 0;
                transform: translateX(100%);
            }
        }

        .fa-circle-check,
        .fa-triangle-exclamation {
            margin-right: 15px;
            font-size: 25px;
            border-radius: 4px;
            padding: 5px 7px;
        }

        .fa-circle-check {
            color: green;
            background-color: white;

        }

        .fa-triangle-exclamation {
            color: red;
            background-color: white;
        }
    </style>
</head>

<body>
    <?= getToast() ?>
    <div class="login-container">
        <h3>Welcome Back</h3>
        <form action="?controller=login&action=checkLogin" method="POST">
            <!-- Email Field -->
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" <?= getData('email') ?> id="email" name="email" placeholder="Enter your email">
            </div>
            <!-- Password Field -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
            </div>
            <!-- Login Button -->
            <button type="submit" class="btn btn-custom w-100">Login</button>
            <!-- Forgot Password and Signup Links -->
            <div class="text-center mt-3">
                <a href="/forgot-password" class="link-custom">Forgot Password?</a>
                <span> | </span>
                <a href="/register" class="link-custom">Sign Up</a>
            </div>
        </form>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>