<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <!-- Favicons -->
    <link href="../assets/img/logo-hb.png" rel="icon">
    <title>Login Page</title>


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />

    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- MDB -->
    <link rel="stylesheet" href="../assets/css/mdb.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="../assets/css/style.css" />
</head>

<body>
    <!--Main Navigation-->
    <header>
        <style>
            #intro {
                background-image: url('../assets/img/bg-login.jpg');
                height: 100vh;
            }

            /* Height for devices larger than 576px */
            @media (min-width: 992px) {
                #intro {
                    margin-top: -58.59px;
                }
            }

            .navbar .nav-link {
                color: #fff !important;
            }

            .notValid {
                outline-style: solid;
                outline-color: red;
            }
        </style>


        <!-- Background image -->
        <div id="intro" class="bg-image shadow-2-strong">
            <div class="mask d-flex align-items-center h-100">
                <div class="container">
                    <div class="row justify-content-center">

                        <div class="col-xl-5 col-md-8" id="formRegis" style="margin-top:40px">
                            <form class="bg-white rounded shadow-5-strong p-5" id="formRegister" method="POST">
                                <!-- Logo -->
                                <div style="margin-bottom:5px;margin-left:15px">
                                    <img src="../assets/img/logo-hb.png" alt="">
                                </div>

                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="email" name="email" id="form1Example1" class="form-control" />
                                    <label class="form-label" for="form1Example1">Email</label>
                                    <span id="checkEmail" style="display: none;">0</span>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" name="password" id="form1Example2" class="form-control" />
                                    <label class="form-label" for="form1Example2">Password</label>
                                    <span id="checkPassword" style="display: none;">0</span>
                                </div>

                                <!-- 2 column grid layout for inline styling -->
                                <div class="row mb-4">


                                    <div class="col text-center">
                                        <!-- Simple link -->
                                        <a href="#!">Lupa Password?</a>
                                        <br><br>
                                        Belum punya akun?
                                        <a href="<?= base_url('auth/register'); ?>">Ayo daftar disini</a>
                                    </div>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" id="btnSubmit" class="btn btn-primary btn-block">Login</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Background image -->
    </header>
    <!--Main Navigation-->

    <!--Footer-->
    <footer class="bg-light text-lg-start">

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: #bedaff">
            © Copyright
            <span class="text-dark">Halo Belajar</span> 2023
        </div>
        <!-- Copyright -->
    </footer>
    <!--Footer-->
    <!-- MDB -->
    <script type="text/javascript" src="../assets/js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="../assets/js/script.js"></script>

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <script>
        // validasi email
        $inputemail = $('input[name="email"]');
        $inputemail.on('change', function(e) {
            let email = $(this).val()
            let emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            if (email.length == 0) {
                $(this).addClass("notValid");
                Swal.fire({
                    title: 'Email Kosong!',
                    text: 'Masukkan Email Kamu',
                    icon: 'warning',
                    confirmButtonText: 'Oke'
                })
                $('#checkEmail').text(0);
            } else if (!emailReg.test(email)) {
                $(this).addClass("notValid");
                Swal.fire({
                    title: 'Email Tidak Valid!',
                    text: 'example@domain.com',
                    icon: 'warning',
                    confirmButtonText: 'Oke'
                })
                $('#checkEmail').text(0);
            } else {
                $(this).removeClass("notValid");
                $('#checkEmail').text(1);
            }
        })

        // validasi password
        $inputpassword = $('input[name="password"]');
        $inputpassword.on('change', function(e) {
            let password = $(this).val()
            if (password.length < 8) {
                $(this).addClass("notValid");
                Swal.fire({
                    title: 'Password Kosong!',
                    text: 'Password Minimal 8 Huruf',
                    icon: 'warning',
                    confirmButtonText: 'Oke'
                })
                $('#checkPassword').text(0);
            } else {
                $(this).removeClass("notValid");
                $('#checkPassword').text(1);
            }
        })


        $('#formRegister').submit(function() {

            $checkEmail = $('#checkEmail').text()
            $valEmail = $('input[name="email"]').val();

            $checkPassword = $('#checkPassword').text()
            $valPassword = $('input[name="password"]').val();


            if ($checkEmail == 0 || $checkPassword == 0) {
                Swal.fire({
                    title: 'Ayo Lengkapi Data!',
                    icon: 'warning',
                    confirmButtonText: 'Oke'
                })
                return false;
            } else {
                Swal.showLoading(Swal.getDenyButton())
                $.post("<?= base_url('auth/login_action') ?>", {
                        email: $valEmail,
                        password: $valPassword
                    },
                    function(data) {
                        var objResult = JSON.parse(data);
                        if ((objResult.info == 'loggedin')) {
                            setTimeout(function() {
                                swal.fire({
                                    title: 'Berhasil Login',
                                    text: 'Redirecting...',
                                    icon: 'success',
                                    timer: 3000,
                                    showConfirmButton: false
                                });
                            }, 10);
                            window.setTimeout(function() {
                                window.location.replace('<?= base_url('dashboard') ?>');
                            }, 2000);

                        } else if ((objResult.info == 'notactive')) {
                            setTimeout(function() {
                                swal.fire({
                                    title: 'Berhasil Login',
                                    text: 'Redirecting...',
                                    icon: 'success',
                                    timer: 3000,
                                    showConfirmButton: false
                                });
                            }, 10);
                            window.setTimeout(function() {
                                window.location.replace('<?= base_url('auth/activatedAccount/_?profile=') ?>' + objResult.uid);
                            }, 2000);

                        } else {
                            setTimeout(function() {
                                swal.fire({
                                    title: 'Login gagal!',
                                    text: objResult.text,
                                    icon: 'error',
                                    timer: 3000,
                                    showConfirmButton: false
                                });
                            }, 10);
                        }

                        swal.close()

                        return false;
                    });
            }
            return false;
        })
    </script>
</body>

</html>