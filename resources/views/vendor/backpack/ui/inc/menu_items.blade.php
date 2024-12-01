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

<x-backpack::menu-dropdown title="Manage Users" icon="la la-user">
    <x-backpack::menu-dropdown-item title="Client Details" icon="la la-user" :link="backpack_url('membership-detail')" />
    <x-backpack::menu-dropdown-item title="Trainer Details" icon="la la-user" :link="backpack_url('trainer-detail')" />
    <x-backpack::menu-dropdown-item title="Add Client Details" icon="la la-user-plus" :link="backpack_url('membership-detail/create')" />
    <x-backpack::menu-dropdown-item title="Add Trainer Details" icon="la la-user-plus" :link="backpack_url('trainer-detail/create')" />
</x-backpack::menu-dropdown>

<x-backpack::menu-item title="Bookings" icon="la la-book" :link="backpack_url('reservation')" />

<x-backpack::menu-dropdown title="Payments" icon="la la-wallet">
    <x-backpack::menu-dropdown-item title='Payments' icon='la la-money-bill' :link="backpack_url('payment')" />
    <x-backpack::menu-dropdown-item title='Payment Methods' icon='la la-credit-card' :link="backpack_url('payment-method')" />
</x-backpack::menu-dropdown>

<x-backpack::menu-dropdown title="Manage GYM" icon="la la-dumbbell">
    <x-backpack::menu-dropdown-header title="Services" />
    <x-backpack::menu-dropdown-item title="Service" icon="la la-hard-hat" :link="backpack_url('service')" />
    <x-backpack::menu-dropdown-item title="Service Categories" icon="la la-clipboard-list" :link="backpack_url('service-category')" />
    <x-backpack::menu-dropdown-header title="Inventories" />
    <x-backpack::menu-dropdown-item title='Inventory' icon='la la-boxes' :link="backpack_url('inventory')" />
    <x-backpack::menu-dropdown-item title="Equipment" icon="la la-box" :link="backpack_url('equipment-inventory')" />
</x-backpack::menu-dropdown>

<x-backpack::menu-item title="Contact Us Inbox" icon="la la-inbox" :link="backpack_url('contactus-inbox')" />

{{-- <x-backpack::menu-item title="Payments" icon="la la-question" :link="backpack_url('payment')" /> --}}
