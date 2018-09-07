@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-4">
            <p><strong>Tambah Kandidat Baru</strong></p>
            @include('dashboard.candidates.create')
        </div>
    </div>

@endsection
