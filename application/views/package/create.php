<title>Create Package</title>
</head>

<!-- Page content-->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Package</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="./">Package</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </div>
    <form action="" method="post" id="createPackage">
        <div class="form-group">
            <label for="namePackage">Nama Package</label>
            <input type="text" class="form-control" name="namePackage" id="namePackage" placeholder="nama package..." required>
        </div>
        <div class="form-group">
            <label for="descPackage">Deskripsi Package</label>
            <textarea class="form-control" name="descPakcage" id="descPackage" rows="3" placeholder="deskripsi package..." required></textarea>
        </div>

        <button type="submit" class="btn btn-primary btn_submit">Simpan</button>
    </form>
</div>