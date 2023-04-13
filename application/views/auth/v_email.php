<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Aktivasi Akun</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="../../assets/img/logo-hb.png" rel="icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="../../assets/css/style.css" rel="stylesheet">
    <link href="../../assets/css/styles-auth-page.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>


    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <a href="#hero" class="logo"><img src="../../assets/img/logo-hb.png" alt=""></a>
        </div>
    </header><!-- End Header -->

    <div style="margin-top: 10px;">
        <div id='cardActivated' class="animated fadeIn">
            <div id="cardsent" class="cardMail">
                <div id='upper-side'>
                    <i></i>
                    <h3 id='status'></h3>
                </div>
                <div id='lower-side'>
                    <p id='message'><span id="link">info@halobelajar.com</span></p>
                </div>
            </div>
        </div>
    </div>


    <div class="footer">
        <p>&copy; Copyright <strong><span>Halo Belajar</span></strong> 2023</p>
    </div>


    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <!-- Loading -->
    <script>
        let showLoading = function() {
            Swal.fire({
                title: 'Mohon Tunggu!',
                html: 'Sedang mengirim email.....', // add html attribute if you want or remove
                allowOutsideClick: false,
                showConfirmButton: false,
                willOpen: () => {
                    Swal.showLoading()
                },
            });
        }
    </script>

    <script>
        $('#cardActivated').hide()
        showLoading();
        $.ajax({
            url: "<?= base_url('auth/getEmail') ?>",
            method: "GET",
            data: {
                uid: '<?= $uid; ?>'
            },
            success: function(data) {
                var objResult = JSON.parse(data);
                console.log(objResult.message);
                $('#cardActivated').show()
                if (objResult.message == true) {
                    $('i').addClass('fas fa-check-circle');
                    $('#status').text('Email Terkirim');
                    $('#message').text('Email telah dikirmkan pada ' + objResult.mailUser + ', Ayo cek email kamu dan aktivasi sekarang juga!')
                } else if (objResult.message == false) {
                    $('i').addClass('fas fa-circle-exclamation');
                    $('#status').text('Email Gagal Terkirim!');
                    $('#message').text('Email gagal terkirim silahkan refresh halaman ini atau dapat menghubungi email kami info@halobelajar.com');
                }

                swal.close();
            }
        });
    </script>

</html>