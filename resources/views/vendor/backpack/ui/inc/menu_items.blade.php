{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item">
    <a class="nav-link" href="{{ backpack_url('dashboard') }}">
        <i class="la la-home nav-icon"></i>
        {{ trans('backpack::base.dashboard') }}
    </a>
</li>

{{-- Notification ToDo --}}
{{-- <x-backpack::menu-item title='Notifications' icon='la la-exclamation-triangle' :link="backpack_url('')" /> --}}
{{-- End Notification --}}

@can('manage-users')
    <x-backpack::menu-dropdown title="Manage Users" icon="la la-user">
        @can('manage-clients')
            <x-backpack::menu-dropdown-header title="Client" />
            <x-backpack::menu-dropdown-item title="Client Details" icon="la la-user" :link="backpack_url('membership-detail')" />
            <x-backpack::menu-dropdown-item title="Client Progress" icon="la la-chart-bar" :link="backpack_url('gym-progress')" />
            <x-backpack::menu-dropdown-item title="Add Client Details" icon="la la-user-plus" :link="backpack_url('membership-detail/create')" />
        @endcan
        @can('manage-trainers')
            <x-backpack::menu-dropdown-header title="Trainer" />
            <x-backpack::menu-dropdown-item title="Trainer Details" icon="la la-user" :link="backpack_url('trainer-detail')" />
            <x-backpack::menu-dropdown-item title="Add Trainer Details" icon="la la-user-plus" :link="backpack_url('trainer-detail/create')" />
        @endcan
    </x-backpack::menu-dropdown>
@endcan

@can('manage-bookings')
    <x-backpack::menu-item title="Bookings" icon="la la-book" :link="backpack_url('reservation')" />
@endcan

@can('manage-payments')
    <x-backpack::menu-dropdown title="Payments" icon="la la-wallet">
        <x-backpack::menu-dropdown-item title='Payments' icon='la la-money-bill' :link="backpack_url('payment')" />
        @can('manage-payment-methods')
            <x-backpack::menu-dropdown-item title='Payment Methods' icon='la la-credit-card' :link="backpack_url('payment-method')" />
        @endcan
    </x-backpack::menu-dropdown>
@endcan

@can('manage-gym')
    <x-backpack::menu-dropdown title="Manage GYM" icon="la la-dumbbell">
        @can('manage-gym-workouts')
            <x-backpack::menu-dropdown-header title="Workouts" />
            <x-backpack::menu-dropdown-item title="Workouts" icon="la la-dumbbell" :link="backpack_url('workout')" />
        @endcan
        @can('manage-gym-services')
            <x-backpack::menu-dropdown-header title="Services" />
            <x-backpack::menu-dropdown-item title="Service" icon="la la-hard-hat" :link="backpack_url('service')" />
            {{-- <x-backpack::menu-dropdown-item title="Service Categories" icon="la la-clipboard-list" :link="backpack_url('service-category')" /> --}}
            <x-backpack::menu-dropdown-item title="Service Amenities" icon="la la-puzzle-piece" :link="backpack_url('amenity')" />
        @endcan
        @can('manage-gym-inventory')
            <x-backpack::menu-dropdown-header title="Inventories" />
            {{-- <x-backpack::menu-dropdown-item title='Inventory' icon='la la-boxes' :link="backpack_url('inventory')" /> --}}
            <x-backpack::menu-dropdown-item title="Equipment" icon="la la-box" :link="backpack_url('equipment-inventory')" />
        @endcan

    </x-backpack::menu-dropdown>
@endcan

@can('manage-contact-inbox')
    <x-backpack::menu-item title="Contact Us Inbox" icon="la la-inbox" :link="backpack_url('contactus-inbox')" />
@endcan
