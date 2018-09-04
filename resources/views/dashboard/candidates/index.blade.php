@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#create-candidate-modal">Tambah Kandidat Baru</a>
    </div>

    @include('dashboard.candidates.create')
@endsection
