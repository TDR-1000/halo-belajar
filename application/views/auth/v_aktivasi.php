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
</head>

<body>


    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <a href="#hero" class="logo"><img src="../../assets/img/logo-hb.png" alt=""></a>
        </div>
    </header><!-- End Header -->

    <?php if (!empty($this->session->flashdata('accountActived'))) {
        $title = "Aktivasi berhasil";
        $text = ($this->session->flashdata('accountActived'));
        $button = base_url('auth/login');
        $txtButton = "Lanjutkan login";
        $icon = "fas fa-check-circle";
    } elseif (!empty($this->session->flashdata('successActived'))) {
        $title = "Aktivasi berhasil";
        $text = ($this->session->flashdata('successActived'));
        $button = base_url('auth/login');
        $txtButton = "Lanjutkan login";
        $icon = "fas fa-check-circle";
    } elseif (!empty($this->session->flashdata('failedActived'))) {
        $title = "Aktivasi gagal!";
        $text = ($this->session->flashdata('failedActived'));
        $button = base_url('auth/emailSend');
        $txtButton = "Kirim Ulang Token";
        $icon = "fas fa-circle-exclamation";
    } elseif (!empty($this->session->flashdata('tokenNotFound'))) {
        $title = "Belum Aktivasi!";
        $text = ($this->session->flashdata('tokenNotFound'));
        $button = base_url('auth/emailSend/_?profile=' . $uid);
        $txtButton = "Kirim ulang Token";
        $icon = "fas fa-circle-exclamination";
    } elseif (!empty($this->session->flashdata('tokenDifferent'))) {
        $title = "Aktivasi gagal!";
        $text = ($this->session->flashdata('tokenDifferent'));
        $button = base_url('auth/emailSend/_?profile=' . $uid);
        $txtButton = "Kirim ulang Token";
        $icon = "fas fa-circle-exclamination";
    }
    ?>




    <div style="margin-top: 10px;">
        <div id='cardActivated' class="animated fadeIn">
            <div id='upper-side'>
                <i class="<?= $icon; ?>"></i>
                <h3 id='status'> <?= $title; ?> </h3>
            </div>
            <div id='lower-side'>
                <p id='message'>
                    <?= $text; ?>
                </p>
                <a href="<?= $button; ?>" id="contBtn"> <?= $txtButton; ?></a>
            </div>
        </div>
    </div>


    <div class="footer">
        <p>&copy; Copyright <strong><span>Halo Belajar</span></strong> 2023</p>
    </div>

</html>