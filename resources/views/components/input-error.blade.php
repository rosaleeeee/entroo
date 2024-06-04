@props(['messages'])

@if ($messages)
    <ul class="liste_element">
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
