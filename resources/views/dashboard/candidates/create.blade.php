<div class="modal fade" id="create-candidate-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kandidat Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dashboard.candidates') }}" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="no" class="col-sm-3 col-form-label">No. Urut</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" id="no" name="no">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="color" class="col-sm-3 col-form-label">Label Warna</label>
                        <div class="col-sm-9">
                            <input type="color" class="form-control" id="color" name="color">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="photo" class="col-sm-3 col-form-label">Foto</label>
                        <div class="col-sm-9">
                            <input type="file" accept="image/jpeg" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
