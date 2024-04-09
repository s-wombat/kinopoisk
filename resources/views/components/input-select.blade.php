@props([
    'options' => [],
    'selectedOptions' => false,
    'disabled' => false
    ])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
    @foreach ($options as $key => $value)
        <option value="{{ $key }}" {{ $key===$selectedOptions ? 'selected="selected"' : "" }}>{{ $value }}</option>
    @endforeach
</select>