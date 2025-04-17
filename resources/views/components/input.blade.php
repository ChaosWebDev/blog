<label for="{{ $id }}">{{ $label }}</label>
<input type="{{ $type }}" wire:model="{{ $model }}" name="{{ $name }}" id="{{ $id }}"
    {{ $attributes }}>
@error($name)
    <div class="error">{{ $message }}</div>
@enderror
