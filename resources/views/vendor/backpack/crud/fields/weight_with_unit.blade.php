@php
    $field['wrapper'] = $field['wrapper'] ?? [];
    $field['wrapper']['class'] = $field['wrapper']['class'] ?? 'form-group col-md-12';
    $field['attributes']['id'] = $field['attributes']['id'] ?? $field['name'];
    $weightValueId = $field['attributes']['id'];
    $weightUnitName = 'weight_unit';
    $weightValueName = $field['name'];
    $weightUnitValue = old($weightUnitName) ?? ($field['value_' . $weightUnitName] ?? 'kg'); // Get old value or default
    $weightValueValue = old($weightValueName) ?? ($field['value'] ?? '');
@endphp

@include('crud::fields.inc.wrapper_start')
<label>{{ $field['label'] }}

    <div class="form-check form-check-inline" style="margin-bottom: 0px; margin-right: .5rem;margin-left: .5rem;">
        <input type="radio" class="form-check-input" name="{{ $weightUnitName }}_radio" value="kg"
               id="{{ $weightValueId }}_kg" @if ($weightUnitValue == 'kg') checked @endif
               onclick="document.querySelector('input[name=\'{{ $weightUnitName }}\']').value = 'kg';">
        <label class="form-check-label font-weight-normal p-0" for="{{ $weightValueId }}_kg">kg</label>
    </div>
    <div class="form-check form-check-inline" style="margin-bottom: 0px; margin-right: 1rem;">
        <input type="radio" class="form-check-input" name="{{ $weightUnitName }}_radio" value="lbs"
               id="{{ $weightValueId }}_lbs" @if ($weightUnitValue == 'lbs') checked @endif
               onclick="document.querySelector('input[name=\'{{ $weightUnitName }}\']').value = 'lbs';">
        <label class="form-check-label font-weight-normal p-0" for="{{ $weightValueId }}_lbs">lbs</label>
    </div>

</label>
<input type="hidden" name="{{ $weightUnitName }}" value="{{ $weightUnitValue }}">

<div class="d-flex align-items-center">
    <div style="flex-grow: 1;">
        <input type="number" name="{{ $weightValueName }}" value="{{ $weightValueValue }}"
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
{{-- If you'd need to add JS for this field, create a public/js/fields/weight_with_unit.js and include it here: --}}
{{-- @push('crud_fields_scripts') --}}
{{--    <script src="{{ asset('js/fields/weight_with_unit.js') }}"></script> --}}
{{-- @endpush --}}
{{-- ########################################## --}}
