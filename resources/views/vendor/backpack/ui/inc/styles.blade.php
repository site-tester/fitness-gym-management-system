@basset('https://unpkg.com/animate.css@4.1.1/animate.compat.css')
@basset('https://unpkg.com/noty@3.2.0-beta-deprecated/lib/noty.css')

@basset('https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css')
@basset('https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/fonts/la-regular-400.woff2')
@basset('https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/fonts/la-solid-900.woff2')
@basset('https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/fonts/la-brands-400.woff2')
@basset('https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/fonts/la-regular-400.woff')
@basset('https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/fonts/la-solid-900.woff')
@basset('https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/fonts/la-brands-400.woff')
@basset('https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/fonts/la-regular-400.ttf')
@basset('https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/fonts/la-solid-900.ttf')
@basset('https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/fonts/la-brands-400.ttf')

@basset(base_path('vendor/backpack/crud/src/resources/assets/css/common.css'))

@if (backpack_theme_config('styles') && count(backpack_theme_config('styles')))
    @foreach (backpack_theme_config('styles') as $path)
        @if(is_array($path))
            @basset(...$path)
        @else
            @basset($path)
        @endif
    @endforeach
@endif

@if (backpack_theme_config('mix_styles') && count(backpack_theme_config('mix_styles')))
    @foreach (backpack_theme_config('mix_styles') as $path => $manifest)
        <link rel="stylesheet" type="text/css" href="{{ mix($path, $manifest) }}">
    @endforeach
@endif

@if (backpack_theme_config('vite_styles') && count(backpack_theme_config('vite_styles')))
    @vite(backpack_theme_config('vite_styles'))
@endif

@push('after_styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
<style>
    .nav-item .nav-link {
    transition: background-color 0.3s ease, color 0.3s ease; /* Smooth transition */
}

.nav-item .nav-link:hover {
    background-color: rgba(0, 0, 0, 0.1); /* Light background on hover */
    color: #007bff; /* Change text color on hover */
}

.nav-item .nav-link.active {
    background-color: #007bff; /* Active tab background color */
    color: #fff; /* Active tab text color */
}

.nav-item .nav-link.active:hover {
    background-color: #0056b3; /* Darker background on hover for active tab */
}

/* For dropdown items */
.nav-item .dropdown-menu .dropdown-item {
    transition: background-color 0.3s ease, color 0.3s ease;
}

.nav-item .dropdown-menu .dropdown-item:hover {
    background-color: rgba(0, 0, 0, 0.1);
    color: #007bff;
}
</style>

@endpush

