@extends('layouts.dashboard')

@section('sidebar')
    <a href="{{ route('dashboard.candidates') }}">&Larr; Kembali</a>
    <h3><i class="ion-md-create"></i> Edit Kandidat</h3>
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('dashboard.candidates.edit', ['id' => $candidate->id]) }}" method="post" enctype="multipart/form-data" novalidate>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group row">
                    <label for="no" class="col-sm-2 col-form-label">No. Urut</label>
                    <div class="col-sm-2">
                        <input type="number" class="form-control {{ $errors->has('no') ? 'is-invalid' : '' }}" id="no" name="no" value="{{ $candidate->no }}">
                        @if($errors->has('no'))
                            <div class="invalid-feedback">{{ $errors->first('no') }}</div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" value="{{ $candidate->name }}">
                        @if($errors->has('name'))
                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="color" class="col-sm-2 col-form-label">Label Warna</label>
                    <div class="col-sm-2">
                        <input type="color" class="form-control {{ $errors->has('color') ? 'is-invalid' : '' }}" id="color" name="color" value="{{ $candidate->color }}">
                        @if($errors->has('color'))
                            <div class="invalid-feedback">{{ $errors->first('color') }}</div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="photo" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-5">
                        <img src="{{ $candidate->photo_url }}" alt="{{ $candidate->name }}" width="100" class="img-thumbnail candidate-photo">
                        <button type="button" class="btn btn-outline-danger btn-remove-photo">&times;</button>
                        <input type="file" accept="image/jpeg" name="photo" class="form-control d-none {{ $errors->has('photo') ? 'is-invalid' : '' }}">
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

@push('scripts')
    <script>
        (function($){
            $('.btn-remove-photo').click(function(e) {
                $('.candidate-photo').hide();
                $('input[name=photo]').removeClass('d-none');
                $(this).hide();
            });
        })(jQuery);
    </script>
@endpush
