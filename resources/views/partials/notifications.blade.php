@if ($message = session('success'))
    <div class="alert alert-success">
        {!! $message !!}
    </div>
@endif
