@extends('layouts.dashboard')

@section('sidebar')
    <a href="{{ url('/') }}" class="btn btn-primary btn-block"><i class="ion-md-person-add"></i> Tambah Pemilih Baru</a>
@endsection

@section('content')
    <div class="page-content">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kode Akses</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($voters as $voter)
                        <tr>
                            <td>{{ $voter->id }}</td>
                            <td>
                                <strong>{{ $voter->name }}</strong><br>
                                <em>{{ $voter->classroom->name }}</em>
                            </td>
                            <td><code>{{ $voter->access_code }}</code></td>
                            <td></td>
                        </tr>
                    @empty
                        <tr class="table-info">
                            <td colspan="5">Belum ada data pemilih</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
