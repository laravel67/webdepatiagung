@props(['type' => 'text', 'name' => '', 'value' => ''])

<div class="form-group">
    <label for="{{ $name }}">{{ $slot }}</label>
    <input {{ $attributes->merge(['class' => 'form-control ' . ($errors->has($name) ? 'is-invalid' : '')]) }}
    type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}" wire:model="{{ $name }}">
    @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>