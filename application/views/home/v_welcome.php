<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Halo Belajar</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <?php include('head.php'); ?>
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <div id="contact-email">
                    <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:halobelajar1@gmail.com">halobelajar1@gmail.com</a></i>
                </div>
                <i class="bi bi-whatsapp d-flex align-items-center ms-4"><a href="https://api.whatsapp.com/send?phone=6285774755669" target="_blank"><span>+62 857 747 556 69</span></a></i>
                <i class="bi bi-instagram d-flex align-items-center ms-4"><a href="https://www.instagram.com/halo.belajar/" target="_blank">@halo.belajar</a></i>
            </div>
        </div>
    </section>

    <a href="<?= base_url('auth/sendMail'); ?>">Kirim Email</a>

    <!-- ======= Menu Bar ======= -->
    <?php include('menu-bar.php'); ?>

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1><span>HALO BELAJAR</span></h1>
            <h2>
                Kami adalah bimbel berkualitas mengutamakan kualitas dari para tutor.
                <br> Terbuka untuk Pelajar SD, SMP, SMA dan Mahasiswa
            </h2>
            <div class="d-flex">
                <a href="#program" class="btn btn-success scrollto">Ayo lihat <i class="fa-solid fa-circle-arrow-right"></i></i></a>
                <!-- <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> -->
            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">
        <section id="program" class="program">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Program</h2>
                    <h3>Ayo Lihat <span>Program Privat</span> Kami</h3>
                    <p>Pilihlah program sesuai kebutuhanmu</p>
                </div>

                <div class="row d-flex justify-content-around">
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card">
                            <img src="assets/img/products/gambar-regular-packet.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Regular</h5>
                                <p class="card-text">
                                    Les Privat Regular adalah les privat untuk tingkat SD, SMP, SMA dan Mahasiswa.
                                    <br> <br>
                                </p>
                                <button type="button" class="btn btn-success" onclick="programDetail('regular')">
                                    Lihat Detail &#187;
                                </button>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card">
                            <img src="assets/img/products/gambar-UTBK-packet.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Intensif UTBK-SNBT</h5>
                                <p class="card-text">
                                    Les Privat Intensif UTBK adalah les privat untuk tingkat SMA untuk persiapan Ujian Masuk Perguruan Tinggi Negeri.
                                </p>
                                <button type="button" class="btn btn-success" onclick="programDetail('UTBK')">
                                    Lihat Detail &#187;
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card">
                            <img src="assets/img/products/gambar-bahasa-packet.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Bahasa</h5>
                                <p class="card-text">
                                    Les Privat Regular adalah les privat untuk tingkat SD, SMP, SMA, Mahasiswa dan Umum.
                                </p>
                                <button type="button" class="btn btn-success" onclick="programDetail('bahasa')">
                                    Lihat Detail &#187;
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ======= About Section ======= -->
        <section id="about" class="about section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>About</h2>
                    <h3>Ayo Ketahui <span>Tentang</span> Kami</h3>
                </div>

                <div class="row">
                    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                        <img src="assets/img/tutorial.jpg" style="margin-top: 40px;" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                        <h3>Halo belajar adalah sebuah tempat khursus dan juga untuk belajar melatih kemampuan kalian untuk mempersiapkan diri masuk ke universitas impian.</h3>
                        <ul>
                            <li>
                                <i class="fa-solid fa-laptop-file"></i>
                                <div>
                                    <p style="margin-top:20px;">Tersedia Online Maupun Offline</p>
                                </div>
                            </li>
                            <li>
                                <i class="fa-solid fa-chalkboard-user"></i>
                                <div>
                                    <p style="margin-top:15px;">Tutor yang sudah berpengalaman di lapangan / tempat kerja khusus dibidangnya</p>
                                </div>
                            </li>
                        </ul>
                        <p>
                            Kami memastikan anda memilih kami dengan tepat, karena kami adalah salah satu bimbel terbaik di Indonesia.
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <?php include('testimoni.php'); ?>


        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Contact</h2>
                    <h3>Ayo Hubungi Kami Untuk <span>Melatih Kemampuanmu</span></h3>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-3 col-md-6">
                        <div class="info-box mb-4">
                            <i class="fa-solid fa-map-location-dot"></i>
                            <h3>Alamat Kami</h3>
                            <p><a href="https://maps.app.goo.gl/pKtT59PamaN7PtL6A" target="_blank">Perumahan Bumi Cimanggis Indah 2 Blok Q6, Tapos, Depok</a></p>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="info-box  mb-4">
                            <i class="fa-solid fa-envelope-circle-check"></i>
                            <h3>Email Kami</h3>
                            <p><a href="mailto:halobelajar1@gmail.com">halobelajar1@gmail.com</a></p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="info-box  mb-4">
                            <i class="bx bxl-instagram"></i>
                            <h3>Instagram Kami</h3>
                            <p><a href="https://www.instagram.com/halo.belajar/" target="_blank">@halo.belajar</a></p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="info-box  mb-4">
                            <i class="bx bxl-whatsapp"></i>
                            <h3>Whatsapp kami</h3>
                            <p><a href="https://api.whatsapp.com/send?phone=6285774755669" target="_blank"><span>+62 857 747 556 69</span></a></p>

                        </div>
                    </div>

                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">

                    <div class="col-lg-12 ">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.954531297734!2d106.89646979999999!3d-6.3998607000000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ebddd227c2e7%3A0x8483dbac221593b7!2sBumi%20cimanggis%20indah%202%20Blok%20Q6!5e0!3m2!1sid!2sid!4v1679365953251!5m2!1sid!2sid" width="100%" height="auto" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                    <!-- <div class="col-lg-6">
                        <form action="assets/forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                                </div>
                                <div class="col form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div> -->

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <?php
    include('modals.php');
    include('footer.php');
    ?>

</html>