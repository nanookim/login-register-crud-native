<!-- <?php

        require_once("config.php");

        if (isset($_POST['submit'])) {

            $nama = filter_input(INPUT_POST, 'nama');
            $username = filter_input(INPUT_POST, 'username');
            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

            $sql = "INSERT INTO tb_user(nama,email,username,password) 
            VALUES ($nama, $email,$username, $password)";
            $stmt = $db->prepare($sql);
            $params = array(
                "nama" => $nama,
                "username" => $username,
                "password" => $password,
                "email" => $email
            );

            $saved = $stmt->execute($params);
            if ($saved)
                header("Location: login.php");
        }

        ?> -->



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="assets/login-register/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="assets/login-register/css/style.css">
</head>

<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <a href="index.php" class="form-title">Home</a>/ Sign Up
                        <h2 class="form-title">Sign up </h2>
                        <form method="POST" class="register-form" action="proses-register.php" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Lengkap" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Masukkan Email" />
                            </div>
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account-box"></i></label>
                                <input type="text" name="username" id="username" placeholder="Masukkan Username" />
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Masukan Password" />
                            </div>
                            <!-- <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="konfirmasi_pass" id="konfirmasi_pass" placeholder="Masukan Konfirmasi Password" />
                            </div> -->
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" required />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="submit" class="form-submit" value="Register" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="assets/login-register/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">I am already account</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- JS -->
    <script src="assets/login-register/vendor/jquery/jquery.min.js"></script>
    <script src="assets/login-register/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>