<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="public/assets/css/style.css">

    <!-- Bootstrap 4.6 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Register</h2>
                        <form method="POST" action="/xl-register" class="register-form" id="register-form" enctype="multipart/form-data" autocomplete="on" onsubmit="return validateForm()" novalidate>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" placeholder="Your User Name" oninput="validateUsername()" required />
                            </div>
                            <div id="usernameError"></div>

                            <div class="form-group">
                                <label for="lastname"><i class="zmdi zmdi-account"></i></label>
                                <input type="text" name="lastname" id="lastname" placeholder="Your Last Name" oninput="validateLastname()" required />
                            </div>
                            <div id="lastnameError"></div>

                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" oninput="validateEmail()" required />
                            </div>
                            <div id="emailError"></div>

                            <div class="form-group">
                                <label for="phone"><i class="zmdi zmdi-phone"></i></label>
                                <input type="phone" name="phone" id="phone" placeholder="Your Phone" oninput="validatePhone()" required />
                            </div>
                            <div id="phoneError"></div>

                            <div class="form-group">
                                <label for="address"><i class="zmdi zmdi-pin"></i></label>
                                <input type="text" name="address" id="address" placeholder="Your Address" oninput="validateAddress()" required />
                            </div>
                            <div id="addressError"></div>

                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" oninput="validatePassword()" required />
                            </div>
                            <div id="passwordError"></div>

                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="confirmPassword" placeholder="Repeat your password" oninput="validateConfirmPassword()" required />
                            </div>
                            <div id="confirmPasswordError"></div>

                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" required />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all
                                    statements in <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="btn-register" id="submitButton" class="form-submit" value="Register" disabled />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="public/assets/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="/login" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- JS -->
    <script src="public/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="public/js/check-form.js"></script>
    <script>
        function displayImage(input) {
            var imgPreview = document.getElementById('imgPreview');
            var imgError = document.getElementById('imgError');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    imgPreview.src = e.target.result;
                    imgPreview.style.display = 'block';
                    imgError.innerHTML = ''; // Xóa thông báo lỗi nếu có
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                imgPreview.style.display = 'none';
                imgError.innerHTML = 'Please select an image.'; // Thông báo lỗi nếu không có hình ảnh
            }
        }
    </script>
</body>

</html>