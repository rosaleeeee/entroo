@props(['value'])
<div class="input_label" >
<label>
    {{ $value ?? $slot }}
</label>
</div>
