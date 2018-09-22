@if ($message = session('success'))
    <div class="alert alert-success">
        <i class="ion-md-checkmark-circle"></i> {!! $message !!}
    </div>
@endif
