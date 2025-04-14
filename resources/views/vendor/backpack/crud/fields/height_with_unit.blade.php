@php
    $field['wrapper'] = $field['wrapper'] ?? [];
    $field['wrapper']['class'] = $field['wrapper']['class'] ?? 'form-group col-md-12';
    $field['attributes']['id'] = $field['attributes']['id'] ?? $field['name'];
    $heightValueId = $field['attributes']['id'];
    $heightUnitName = 'height_unit';
    $heightValueName = $field['name'];
    $heightUnitValue = old($heightUnitName) ?? ($field['value_' . $heightUnitName] ?? 'cm'); // Get old value or default
    $heightValueValue = old($heightValueName) ?? ($field['value'] ?? '');
@endphp

@include('crud::fields.inc.wrapper_start')
<label>{{ $field['label'] }}

    <div class="form-check form-check-inline" style="margin-bottom: 0px; margin-right: .5rem;margin-left: .5rem;">
        <input type="radio" class="form-check-input" name="{{ $heightUnitName }}_radio" value="cm"
            id="{{ $heightValueId }}_cm" @if ($heightUnitValue == 'cm') checked @endif
            onclick="document.querySelector('input[name=\'{{ $heightUnitName }}\']').value = 'cm';">
        <label class="form-check-label font-weight-normal p-0" for="{{ $heightValueId }}_cm">cm</label>
    </div>
    <div class="form-check form-check-inline" style="margin-bottom: 0px; margin-right: 1rem;">
        <input type="radio" class="form-check-input" name="{{ $heightUnitName }}_radio" value="ft"
            id="{{ $heightValueId }}_ft" @if ($heightUnitValue == 'ft') checked @endif
            onclick="document.querySelector('input[name=\'{{ $heightUnitName }}\']').value = 'ft';">
        <label class="form-check-label font-weight-normal p-0" for="{{ $heightValueId }}_ft">ft (eg. 5.8)</label>
    </div>

</label>
<input type="hidden" name="{{ $heightUnitName }}" value="{{ $heightUnitValue }}">

<div class="d-flex align-items-center">
    <div style="flex-grow: 1;">
        <input type="number" name="{{ $heightValueName }}" value="{{ $heightValueValue }}"
            @include('crud::fields.inc.attributes')>
    </div>
</div>

{{-- HINT --}}
@if (isset($field['hint']))
    <p class="help-block">{!! $field['hint'] !!}</p>
@endif
@include('crud::fields.inc.wrapper_end')

{{-- ########################################## --}}
{{-- Extra CSS and JS for this field type : --}}
{{-- If you'd need to add JS for this field, create a public/js/fields/height_with_unit.js and include it here: --}}
{{-- @push('crud_fields_scripts') --}}
{{--    <script src="{{ asset('js/fields/height_with_unit.js') }}"></script> --}}
{{-- @endpush --}}
{{-- ########################################## --}}
