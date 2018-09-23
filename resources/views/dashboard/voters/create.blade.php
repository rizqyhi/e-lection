<div class="modal fade" id="create-voter-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="{{ route('dashboard.voters') }}">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Pemilih</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="id" class="col-md-2 col-form-label">NIS</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="id">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">Nama</label>
                        <div class="col">
                            <input type="text" class="form-control" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="classroom_id" class="col-md-2 col-form-label">Kelas</label>
                        <div class="col">
                            <select name="classroom_id" class="form-control">
                                <option value="">--- Pilih kelas ---</option>
                                @foreach ($classrooms as $classroom)
                                    <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="access_code" class="col-md-2 col-form-label">Kode Akses</label>
                        <div class="col">
                            <input type="text" class="form-control col-md-4 text-monospace" name="access_code">
                            <small class="form-text text-muted">Biarkan kosong jika ingin sistem membuatkan kode akses dengan karakter acak.</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="ion-md-save"></i> Simpan Pemilih</button>
                </div>
            </form>
        </div>
    </div>
</div>
