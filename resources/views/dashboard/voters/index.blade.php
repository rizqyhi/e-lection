@extends('layouts.dashboard')

@section('sidebar')
    <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#create-voter-modal"><i class="ion-md-person-add"></i> Tambah Pemilih Baru</a>
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
                        <th>Kode Akses</th>
                        {{-- <th>&nbsp;</th> --}}
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    @include('dashboard.voters.create')
@endsection

@push('scripts')
<script>
    window.votersDatatablesUrl = "{{ route('dashboard.voters.data') }}";
</script>
@endpush
