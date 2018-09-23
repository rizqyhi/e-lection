@if ($message = session('success'))
    <div class="alert alert-success">
        <i class="ion-md-checkmark-circle"></i> {!! $message !!}
    </div>
@endif

@if ($message = session('failed'))
    <div class="alert alert-danger">
        <i class="ion-md-alert"></i> {!! $message !!}
    </div>
@endif

@if ($errors->count() > 0)
    <div class="alert alert-danger">
        @foreach ($errors->all() as $item)
            <p>{{ $item }}</p>
        @endforeach
    </div>
@endif
