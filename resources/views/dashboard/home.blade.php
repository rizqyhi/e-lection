@extends('layouts.dashboard')

@section('sidebar')
<div class="card">
    <div class="card-header">Statistik</div>

    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <div class="d-flex w-100 justify-content-between">
                <span>Kandidat</span>
                <strong>{{ $stats['candidates'] }}</strong>
            </div>
        </li>
        <li class="list-group-item">
            <div class="d-flex w-100 justify-content-between">
                <span>Kelas</span>
                <strong>{{ $stats['classrooms'] }}</strong>
            </div>
        </li>
        <li class="list-group-item">
            <div class="d-flex w-100 justify-content-between">
                <span>Pemilih</span>
                <strong>{{ $stats['voters'] }}</strong>
            </div>
        </li>
    </ul>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-header">Perolehan Suara</div>

    <ul class="list-group list-group-flush">
        @foreach ($candidates as $candidate)
            <li class="list-group-item">
                <div class="d-flex w-100 align-items-center">
                    <span class="badge badge-primary badge-pill">{{ $candidate->no }}</span>
                    <img src="{{ $candidate->photo_url }}" alt="" width="48" height="48" class="rounded-circle ml-3">
                    <span class="ml-3">{{ $candidate->name }}</span>
                    <strong class="ml-auto">{{ $candidate->votes_count }}</strong>
                    <span class="mx-2">/</span>
                    <strong>{{ number_format($candidate->votes_count / $stats['voters'] * 100, 2, ',', '.') }}%</strong>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection
