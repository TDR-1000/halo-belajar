<!-- Modal -->
<div class="modal fade" id="detailProgram" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel"><span id="judulProgram"></span></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="textDetail" id="detailRegular">
                    Les Privat Regular adalah les privat untuk tingkat SD, SMP, SMA dan Mahasiswa.<br><br>
                    Bertujuan untuk menunjang belajar siswa dalam pelajaran sehari-hari di sekolah.
                </div>
                <div class="textDetail" id="detailUTBK">
                    Les Privat Intensif UTBK adalah les privat untuk tingkat SMA untuk persiapan Ujian Masuk Perguruan Tinggi Negeri.<br><br>
                    <span>1. Tutor merupakan lulusan PTN</span><br>
                    <span>2. Materi tips dan trick menjawab soal SNBT dengan cepat dan tepat</span><br>
                    <span>3. Tryout sebanyak 5x</span><br>
                    <span>4. Kupas tuntas bahas soal</span><br>
                    <span>5. Tes Minat Bakat </span><br>
                    <span>6. FREE konsultasi seputar SNBT</span><br>
                </div>
                <div class="textDetail" id="detailBahasa">
                    Les Privat Regular adalah les privat untuk tingkat SD, SMP, SMA, Mahasiswa dan Umum.<br><br>
                    Pada program ini dimaksudkan untuk mempelajari Bahasa Asing seperti :<br>
                    <span>- Bahasa Inggris</span><br>
                    <span>- Bahasa Mandarin</span><br>
                    <span>- Bahasa Jepang</span><br>
                    <span>- Bahasa Korea</span><br>
                    <span>- Bahasa Arab </span><br>
                    <span>- Bahasa Jerman</span><br>
                    <span>- Bahasa Belanda </span><br>
                    <span>- Bahasa Prancis</span><br>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Login -->
<div id="id01" class="modal">
    <div class="modal-content animate">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <h2>Login Halo Belajar</h2>
        </div>
        <div class="container">
            <div class="alert alert-danger" id="err_login" role="alert">
                <span id="flash"></span><button onclick="document.getElementById('err_login').style.display='none'" style="float:right;border:none">X</button>
            </div>
            <div class="alert alert-success" id="suc_login" role="alert">
                Berhasil Login
            </div>
            <form action="" method="post">
                <label for="uname"><b>Email</b></label>
                <input type="text" placeholder="Masukkan email kamu..." id="emLogin" name="email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Masukkan Password kamu..." id="pwLogin" name="password" required>

                <button id="btn-login" style="width:100%" class="btn btn-success">Login</button>
                <!-- <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label> -->
            </form>
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="btn btn-danger">Cancel</button>
            <span class="psw">Belum Punya Akun? <button type="button" onclick="modalPage('register')" style="text-decoration: underline; border: none;color:cornflowerblue">Register</button></span>

        </div>
    </div>
</div>


<!-- Register -->
<div id="id02" class="modal">

    <form class="modal-content animate" action="<?= base_url('auth/register'); ?>" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
            <h2>Register Halo Belajar</h2>
        </div>

        <div class="container">
            <label for="uname"><b>Nama Kamu</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>
            <label for="uname"><b>Email Kamu</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>
            <label for="psw"><b>Password Kamu</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>
            <button type="submit" style="width:100%" class="btn btn-primary">Register</button>
            <!-- <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label> -->
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id02').style.display='none'" class="btn btn-danger">Cancel</button>
            <span class="psw">Sudah Punya Akun? <button type="button" onclick="modalPage('login')" style="text-decoration: underline; border: none;color:cornflowerblue">Login</button></span>
        </div>
    </form>
</div>