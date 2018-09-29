@extends('layouts.dashboard')

@section('sidebar')
    <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#create-voter-modal"><i class="ion-md-person-add"></i> Tambah Pemilih Baru</a>
    <a href="" class="btn btn-outline-secondary btn-block" data-toggle="modal" data-target="#import-voters-modal"><i class="ion-md-cloud-upload"></i> Impor Data Pemilih</a>
    <a href="{{ route('dashboard.voters.export') }}" class="btn btn-outline-secondary btn-block"><i class="ion-md-cloud-download"></i> Ekspor Data Pemilih</a>
    <a href="{{ route('dashboard.voters.print') }}" class="btn btn-outline-secondary btn-block"><i class="ion-md-print"></i> Cetak Data Pemilih</a>

    <h5 class="mt-4 mb-2">Filter Kelas</h5>
    <select class="form-control filter-classroom">
        <option value="all">Semua kelas</option>
        @foreach ($classrooms as $classroom)
            <option value="{{ $classroom->name }}">{{ $classroom->name }}</option>
        @endforeach
    </select>
@endsection

@section('content')
    <div class="page-content">
        <div class="table-responsive">
            <table class="table table-hover" id="voters-table">
                <thead>
                    <tr>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th width="15%">Kode Akses</th>
                        <th width="10%">&nbsp;</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    @include('dashboard.voters.create')
    @include('dashboard.voters.edit')
    @include('dashboard.voters.import')
@endsection

@push('scripts')
<script>
    window.votersDatatablesUrl = "{{ route('dashboard.voters.data') }}";
</script>
@endpush
