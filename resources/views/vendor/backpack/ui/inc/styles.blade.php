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
    transition: background-color 0.3s ease, color 0.3s ease !important; /* Smooth transition */
}

.nav-item .nav-link:hover {
    background-color: rgba(255, 255, 255, 0.9) !important; /* Light background on hover */
    color: rgba(var(--tblr-red-rgb)) !important; /* Change text color on hover */
}

.nav-item .nav-link.active {
    background-color: rgba(var(--tblr-red-rgb)) !important; /* Active tab background color */
    color: rgba(255, 255, 255, 0.9); /* Active tab text color */
}

.nav-item .nav-link.active:hover {
    background-color: rgba(255, 255, 255, 0.9) !important;
    color: rgba(var(--tblr-red-rgb)); /* Darker background on hover for active tab */
}

/* For dropdown items */
.nav-item .dropdown-menu .dropdown-item {
    transition: background-color 0.3s ease, color 0.3s ease !important;
}

.nav-item .dropdown-menu .dropdown-item:hover {
    background-color: rgba(248, 244, 244, 0.9) !important;
    color: rgba(var(--tblr-red-rgb)) !important;
}
</style>

@endpush

