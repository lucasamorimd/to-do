<div class="inputArea">
    <label for="{{ $name }}">
        {{ $label ?? '' }}
    </label>
    <input type="{{ empty($type) ? 'text' : $type }}" id="{{ $name }}" name="{{ $name }}" type="text"
        placeholder="{{ $placeholder ?? '' }}" {{ empty($required) ? '' : 'required' }} value="{{ $value ?? '' }}" />
</div>
