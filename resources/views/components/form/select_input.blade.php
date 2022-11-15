<div class="inputArea">
    <label for="{{ $name }}">
        {{ $label ?? '' }}
    </label>
    <select name="{{ $name }}" id="{{ $name }}" {{ empty($required) ? '' : 'required' }}>
        <option value="" selected disabled>Selecione uma categoria</option>
        {{ $slot }}
    </select>
</div>
