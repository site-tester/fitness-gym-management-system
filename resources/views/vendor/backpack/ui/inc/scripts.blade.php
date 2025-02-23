@basset('https://unpkg.com/jquery@3.6.1/dist/jquery.min.js')
@basset('https://unpkg.com/@popperjs/core@2.11.6/dist/umd/popper.min.js')
@basset('https://unpkg.com/noty@3.2.0-beta-deprecated/lib/noty.min.js')
@basset('https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js')
@basset("https://unpkg.com/summernote@0.8.20/dist/summernote-lite.min.js")

@if (backpack_theme_config('scripts') && count(backpack_theme_config('scripts')))
    @foreach (backpack_theme_config('scripts') as $path)
        @if (is_array($path))
            @basset(...$path)
        @else
            @basset($path)
        @endif
    @endforeach
@endif

@if (backpack_theme_config('mix_scripts') && count(backpack_theme_config('mix_scripts')))
    @foreach (backpack_theme_config('mix_scripts') as $path => $manifest)
        <script type="text/javascript" src="{{ mix($path, $manifest) }}"></script>
    @endforeach
@endif

@if (backpack_theme_config('vite_scripts') && count(backpack_theme_config('vite_scripts')))
    @vite(backpack_theme_config('vite_scripts'))
@endif

@include(backpack_view('inc.alerts'))

@if (config('app.debug'))
    @include('crud::inc.ajax_error_frame')
@endif

@push('after_scripts')
    @basset(base_path('vendor/backpack/crud/src/resources/assets/js/common.js'))

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            var $selectMultiple = $('#amenities_select_multiple'); // Select the select_multiple field by ID
            var $label = $selectMultiple.closest('.form-group').find('label'); // Find the label for the field
            var $deselectButton = $('<button type="button" class="btn btn-link">Deselect All</button>');

            $('#service_category_id').on('change', function() {
                var categoryId = $(this).val();
                var serviceDropdown = $('#service_name_id');

                // Clear current options
                serviceDropdown.html('<option value="">Select Service</option>');

                if (categoryId) {
                    $.ajax({
                        url: '/services/' + categoryId, // Call the Laravel controller
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            // Populate the service dropdown
                            $.each(data, function(key, service) {
                                serviceDropdown.append('<option value="' + service.id +
                                    '">' + service.name + '</option>');
                            });
                        },
                        error: function(data) {
                            alert('Error fetching services. Please try again. '.data);
                        }
                    });
                }
            });

            $label.append($deselectButton);

            // When the Deselect All button is clicked, deselect all options
            $deselectButton.on('click', function() {
                $selectMultiple.val([]).trigger('change'); // Deselect all options in the select field
            });
        });
    </script>
@endpush
