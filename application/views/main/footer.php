</div>

<!-- Modal Logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to logout?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                <a href="<?= base_url('auth/logout'); ?>" class="btn btn-primary">Logout</a>
            </div>
        </div>
    </div>
</div>


<!-- Footer -->
<footer class="sticky-footer bg-blue">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>&copy; Copyright <b>Halo Belajar</b>
                <script>
                    document.write(new Date().getFullYear());
                </script>
            </span>
        </div>
    </div>
</footer>
<!-- Footer -->
</div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<script src="<?= base_url() ?>/assets/main/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>/assets/main/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>/assets/main/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url() ?>/assets/main/js/ruang-admin.min.js"></script>
<script src="<?= base_url() ?>/assets/main/vendor/chart.js/Chart.min.js"></script>
<script src="<?= base_url() ?>/assets/main/js/demo/chart-area-demo.js"></script>
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<!-- Count data user dashboard -->
<script>
    $.get("<?= base_url('dashboard/countUser') ?>",
        function(data) {
            let objResult = JSON.parse(data);
            $('#dataUser').text(objResult.rowsUser)
        });
</script>

<!-- data User -->
<script>
    $(document).ready(function() {
        $('#tableUsers').dataTable({
            "ajax": "<?= base_url('users/getData'); ?>",
            'order': [],
        });
    });
</script>

<!-- Data Package -->
<script>
    $(document).ready(function() {
        $('#tablePackage').dataTable({
            "ajax": "<?= base_url('package/getData'); ?>",
            'order': [],
        });
    });

    function infoPackage(id) {
        $('#txt_deskripsi').text('loading...')
        $('#detailPackage').modal('show')
        $.post("<?= base_url('package/description') ?>", {
                id: id
            },
            function(data) {
                let objResult = JSON.parse(data);
                $('#txt_deskripsi').text(objResult.description)
            });
    }

    $('#createPackage').submit(function() {
        $valName = $('#namePackage').val();
        $valDesc = $('#descPackage').val();

        Swal.showLoading(Swal.getDenyButton())
        $.post("<?= base_url('package/insertData') ?>", {
                name: $valName,
                desc: $valDesc
            },
            function(data) {
                var objResult = JSON.parse(data);
                if ((objResult.info == 'success')) {
                    setTimeout(function() {
                        swal.fire({
                            title: 'Berhasil Simpan Data',
                            text: 'Redirecting...',
                            icon: 'success',
                            timer: 3000,
                            showConfirmButton: false
                        });
                    }, 10);
                    window.setTimeout(function() {
                        window.location.replace('<?= base_url('package') ?>');
                    }, 2000);

                } else {
                    setTimeout(function() {
                        swal.fire({
                            title: 'Simpan Data gagal!',
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

        return false;
    })
</script>
</body>

</html>