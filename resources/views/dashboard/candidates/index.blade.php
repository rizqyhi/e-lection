@extends('layouts.dashboard')

@section('sidebar')
    <h3 class="page-title"><i class="ion-md-contacts"></i> Kandidat</h3>
    <a href="{{ route('dashboard.candidates.create') }}" class="btn btn-primary btn-block"><i class="ion-md-person-add"></i> Tambah Kandidat Baru</a>
@endsection

@section('content')
    @include('partials.notifications')

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
                        <a href="{{ route('dashboard.candidates.edit', ['id' => $candidate->id]) }}" class="btn btn-outline-primary btn-sm"><i class="ion-md-create"></i> Edit</a>

                        <form action="{{ route('dashboard.candidates.edit', ['id' => $candidate->id]) }}" method="post" class="d-inline delete-candidate-form" onsubmit="return confirm(`Apakah kamu yakin untuk menghapus kandidat: {{ $candidate->name }}?`)">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-link text-danger"><i class="ion-md-trash"></i> Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
