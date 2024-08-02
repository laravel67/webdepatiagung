@props(['name' => '', 'value' => ''])

<div class="form-group">
    <label for="{{ $name }}">{{ $slot }}</label>
    <input id="{{ $name }}" type="hidden" name="{{ $name }}" value="{{ old($name, $value) }}"
        class="{{ $errors->has($name) ? 'is-invalid' : '' }}">
    <trix-editor input="{{ $name }}"></trix-editor>
    @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>