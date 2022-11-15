<div class="inputArea">
    <label for="{{ $name }}">
        {{ $label ?? '' }}
    </label>
    <textarea id="{{ $name }}" name="{{ $name }}" placeholder="{{ $placeholder ?? '' }}">{{ $value ?? '' }}</textarea>
</div>
