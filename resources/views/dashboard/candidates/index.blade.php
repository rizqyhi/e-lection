@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h3 class="float-left">Kandidat</h3>
                <a href="{{ route('dashboard.candidates.create') }}" class="btn btn-primary float-right"><i class="ion-md-contact"></i> Tambah Kandidat Baru &rarr;</a>
            </div>
        </div>

        @include('partials.notifications')

        <div class="row">
            <div class="col">
                <div class="row">
                    @foreach($candidates as $candidate)
                        <div class="col-md-4">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <img src="{{ asset('storage/candidates/'.$candidate->photo) }}" alt="{{ $candidate->name }}" class="rounded-circle float-left mr-3" width="64">
                                    <div>
                                        <span class="badge badge-pill badge-secondary">{{ $candidate->no }}</span><br>
                                        <strong>{{ $candidate->name }}</strong>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('dashboard.candidates.edit', ['id' => $candidate->id]) }}" class="btn btn-primary btn-sm"><i class="ion-md-create"></i> Edit</a>
                                    <a href="{{ route('dashboard.candidates.edit', ['id' => $candidate->id]) }}" class="btn btn-link text-danger"><i class="ion-md-trash"></i> Hapus</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
