@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h3 class="float-left">Kandidat</h3>
                <a href="{{ route('dashboard.candidates.create') }}" class="btn btn-primary btn-sm float-right">Tambah Kandidat Baru &rarr;</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="row">
                    @foreach($candidates as $candidate)
                        <div class="col-md-4">
                            <a href="{{ route('dashboard.candidates.edit', ['id' => $candidate->id]) }}" class="card mb-3">
                                <div class="card-body">
                                    <img src="{{ asset('storage/candidates/'.$candidate->photo) }}" alt="{{ $candidate->name }}" class="rounded-circle float-left mr-3" width="64">
                                    <div>
                                        <span class="badge badge-pill badge-secondary">{{ $candidate->no }}</span><br>
                                        <strong>{{ $candidate->name }}</strong>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
