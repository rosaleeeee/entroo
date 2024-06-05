@props(['status'])

@if ($status)
    <div class="status">
        {{ $status }}
    </div>
@endif
