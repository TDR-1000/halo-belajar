<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="container">

        <div class="copyright">
            &copy; Copyright <strong><span>Halo Belajar</span></strong> 2023
        </div>
</footer><!-- End Footer -->

<div id="preloader"></div>

<a href="https://api.whatsapp.com/send?phone=6285774755669" class="wg" target="_blank">
    <div class="iconwg">
        <i class="bx bxl-whatsapp"></i>
    </div>
    <div class="panelwg">
        <span>Ayo chat kami</span>
    </div>
</a>
<!-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> -->

<!-- Vendor JS Files -->
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>


<script>
    $(document).ready(function() {
        $('#err_login').hide()
        $('#suc_login').hide()
    })
</script>

<!-- detail Program -->
<script>
    function programDetail(program) {
        $('.textDetail').hide()
        $('#detailProgram').modal('show')
        let title = ''
        switch (program) {
            case 'regular':
                title = 'Regular'
                text = $('#detailRegular')
                break;
            case 'UTBK':
                title = 'Intensif UTBK'
                text = $('#detailUTBK')
                break;
            case 'bahasa':
                title = 'Bahasa'
                text = $('#detailBahasa')
                break;
            default:
                break;
        }
        $('#judulProgram').text(title)
        text.show()
    }
</script>

<!-- Login/register Modal -->
<script>
    function modalPage(page) {
        // Get the modal
        switch (page) {
            case 'login':
                document.getElementById('id02').style.display = 'none'
                var modal = document.getElementById('id01');
                modal.style.display = 'block'
                break;

            case 'register':
                document.getElementById('id01').style.display = 'none'
                var modal = document.getElementById('id02');
                modal.style.display = 'block'
                break;

            default:
                break;
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    }
</script>

<!-- Login action -->
<script>
    $('#btn-login').click(function() {
        let emailLogin = $('#emLogin').val()
        let passLogin = $('#pwLogin').val()

        if (emailLogin.length == 0) {
            $('#emLogin').css('border', 'solid 2px red')
            Swal.fire({
                title: 'Email Kosong!',
                text: 'Masukkan Email Kamu',
                icon: 'warning',
                confirmButtonText: 'Oke'
            })
            return false
        } else {
            $('#emLogin').css('border', 'solid 2px green')
        }


        if (passLogin.length == 0) {
            $('#pwLogin').css('border', 'solid 2px red')
            Swal.fire({
                title: 'Password Kosong!',
                text: 'Masukkan Password Kamu',
                icon: 'warning',
                confirmButtonText: 'Oke'
            })
            return false
        } else {
            $('#pwLogin').css('border', 'solid 2px green')
        }


        Swal.showLoading(Swal.getDenyButton())

        $.post("<?= base_url('auth/login_action') ?>", {
                email: emailLogin,
                password: passLogin
            },
            function(data) {
                var objResult = JSON.parse(data);
                if ((objResult.info == true)) {
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
                        window.location.replace('<?= base_url('main') ?>');
                    }, 2000);

                } else {
                    $('#flash').text(objResult.flash)
                    $('#err_login').show()
                }

                swal.close()

                return false;
            });
        return false;
    })
</script>

<script>
    $(".wg").hover(function() {
        $('.iconwg').css({
            'right': '126px'
        });
        $('.panelwg').css({
            'visibility': 'visible'
        });
    }, function() {
        $('.iconwg').css({
            'right': '15px'
        });
        $('.panelwg').css({
            'visibility': 'hidden'
        });
    });
</script>