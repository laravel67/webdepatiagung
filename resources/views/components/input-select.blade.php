@props(['name', 'options' => [], 'selected' => null, 'defaultOptions' => []])

<div class="form-group">
    <label for="{{ $name }}">{{ $slot }}</label>
    <select {{ $attributes->merge(['class' => 'form-control ' . ($errors->has($name) ? 'is-invalid' : '')]) }}
        name="{{ $name }}" id="{{ $name }}" wire:model={{ $name }}>
        <option value="">-- Pilih {{ $slot }} --</option>
        @foreach ($options as $option)
        <option value="{{ $option->id }}" {{ $selected==$option->id ? 'selected' : '' }}>
            {{ $option->name }}
        </option>
        @endforeach
        @foreach ($defaultOptions as $option)
        <option value="{{ $option['value'] }}" {{ $selected==$option['value'] ? 'selected' : '' }}>
            {{ $option['label'] }}
        </option>
        @endforeach
    </select>
    @error($name)
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>