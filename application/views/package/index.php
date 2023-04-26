<title>Package</title>
</head>
<!-- Page content-->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Package</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Package</li>
        </ol>
    </div>
    <a href='<?= base_url('package/create'); ?>'><button class='btn btn-primary' data-toggle='tooltip' title='Edit'><i class="fas fa-plus-circle"></i> Tambah Data</button></a>
    <hr>
    <div style="overflow: auto;">
        <table id="tablePackage" class="table table_data">
            <thead class="alert alert-danger">
                <tr>
                    <th>No</th>
                    <th>Nama Package</th>
                    <th>Deskripsi Package</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="detailPackage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deskripsi Package</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <pre id="txt_deskripsi"></pre>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>