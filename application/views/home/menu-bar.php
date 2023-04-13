    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">


            <a href="#hero" class="logo"><img src="assets/img/logo-hb.png" alt=""></a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#program">Program</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#testimonials">Testimonials</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <div>
                <a href="<?= base_url('auth/login'); ?>" style="width:auto;" class="btn btn-outline-success"><i class='bx bxs-log-in'></i> Login</a>
                <a href="<?= base_url('auth/register'); ?>" class="btn btn-outline-primary"><i class='bx bxs-user-plus'></i> Register</a>
            </div>
        </div>
    </header><!-- End Header -->