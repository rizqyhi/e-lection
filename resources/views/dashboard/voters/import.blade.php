<div class="modal fade" id="import-voters-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="{{ route('dashboard.voters.import') }}" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title">Impor Data Pemilih</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger">
                        Seluruh data yang ada kan ditimpa dengan data yang baru
                    </div>
                    <div class="alert alert-info">
                        <ol class="m-0 px-3">
                            <li>Unduh file template untuk melakukan impor data</li>
                            <li>Edit data sesuai dengan file template</li>
                            <li>Satu sheet per kelas</li>
                            <li>Nama kelas diambil dari nama sheet</li>
                        </ol>
                    </div>
                    <div class="form-group row">
                        <label for="classroom_id" class="col-md-3 col-form-label">Unduh Template</label>
                        <div class="col">
                            <a href="{{ route('dashboard.voters.import-template') }}" class="btn btn-outline-primary">Unduh File Template (<code>.xlsx</code>)</a>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="classroom_id" class="col-md-3 col-form-label">Pilih File</label>
                        <div class="col">
                            <input type="file" class="form-control" name="excel_file">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="ion-md-save"></i> Impor Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
