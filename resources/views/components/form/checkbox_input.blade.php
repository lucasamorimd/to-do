<div class="inputArea checkboxArea">
    <input class="is_done" name="{{ $name }}" value="1" type="checkbox"
        @if (!empty($isChecked)) checked @endif>
    <span> {{ $label ?? '' }} </span>
</div>
