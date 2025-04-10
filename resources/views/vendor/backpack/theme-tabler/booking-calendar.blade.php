@extends(backpack_view('blank'))

@php
    $defaultBreadcrumbs = [
        trans('backpack::crud.admin') => url(config('backpack.base.route_prefix'), 'dashboard'),
        $crud->entity_name_plural => url($crud->route),
        trans('backpack::crud.list') => false,
    ];

    // if breadcrumbs aren't defined in the CrudController, use the default breadcrumbs
    $breadcrumbs = $breadcrumbs ?? $defaultBreadcrumbs;
@endphp

@section('header')
    <section class="header-operation container-fluid animated fadeIn d-flex mb-2 align-items-baseline d-print-none"
        bp-section="page-header">
        <h1 class="text-capitalize mb-0" bp-section="page-heading">{!! $crud->getHeading() ?? $crud->entity_name_plural !!}</h1>
        <p class="ms-2 ml-2 mb-0" id="datatable_info_stack" bp-section="page-subheading">{!! $crud->getSubheading() ?? '' !!}</p>
    </section>
@endsection

@section('content')
    <div class="row">
        @if ($events)
            <div class="col-12">
                <div class="alert alert-info">
                    <strong>Info:</strong> You can click on the events to see more details.
                </div>
            </div>
            <div class="col-12">
                <div id="calendar"></div>
            </div>
        @else
            <div>
                There
            </div>
        @endif
    </div>
@endsection

@section('after_scripts')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/index.global.min.js'></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: @json($events),
                headerToolbar: {
                    left: 'title',

                    right: 'today prev,next'
                },
                timeZone: 'UTC',
                aspectRatio: 2,
                contentHeight: '70vh',
                eventClick: function(events) {
                    window.location.href = events.url;
                },
                eventRender: function(events, element) {
                    // Access the color from the event object's backgroundColor property
                    var color = events.backgroundColor;

                    // Set event color based on the retrieved value
                    if (color) {
                        element.css('border-color', 'none');
                        element.css('border', 'none');
                        element.css('background-color', color);
                    }
                },

            });
            calendar.render();
        });
    </script>
@endsection
