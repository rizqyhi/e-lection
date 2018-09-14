@extends('layouts.dashboard')

@section('sidebar')
    <a href="{{ route('dashboard.candidates') }}">&Larr; Kembali</a>
    <h3><i class="ion-md-person-add"></i> Tambah Kandidat Baru</h3>
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('dashboard.candidates') }}" method="post" enctype="multipart/form-data" novalidate>
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="no" class="col-sm-2 col-form-label">No. Urut</label>
                    <div class="col-sm-2">
                        <input type="number" class="form-control {{ $errors->has('no') ? 'is-invalid' : '' }}" id="no" name="no" value="{{ old('no') }}">
                        @if($errors->has('no'))
                            <div class="invalid-feedback">{{ $errors->first('no') }}</div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" value="{{ old('name') }}">
                        @if($errors->has('name'))
                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="color" class="col-sm-2 col-form-label">Label Warna</label>
                    <div class="col-sm-2">
                        <input type="color" class="form-control {{ $errors->has('color') ? 'is-invalid' : '' }}" id="color" name="color" value="{{ old('color') }}">
                        @if($errors->has('color'))
                            <div class="invalid-feedback">{{ $errors->first('color') }}</div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="photo" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-5">
                        <input type="file" accept="image/jpeg" name="photo" class="form-control {{ $errors->has('photo') ? 'is-invalid' : '' }}">
                        @if($errors->has('photo'))
                            <div class="invalid-feedback">{{ $errors->first('photo') }}</div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 offset-md-2">
                        <button type="submit" class="btn btn-primary">Simpan Kandidat</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
