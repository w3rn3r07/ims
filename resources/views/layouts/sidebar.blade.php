@php
use App\Models\Staff;
@endphp

<!-- Sidebar -->
<div class="w-64 bg-gray-400 min-h-screen border-r border-gray-600">
    <nav class=" mt-5">
        <a href="{{ route('dashboard') }}" class="flex items-center py-2 px-4 text-gray-100 hover:bg-gray-700 {{ request()->routeIs('dashboard') ? 'bg-gray-700' : '' }}">
            <span class="mr-2">
                <i class="bi bi-house"></i>
            </span>
            {{ __('Dashboard') }}
        </a>
        <a href="{{ route('userDetails') }}" class="flex items-center py-2 px-4 text-gray-100 hover:bg-gray-700 {{ request()->routeIs('userDetails') ? 'bg-gray-700' : '' }}">
            <span class="mr-2">
                <i class="bi bi-person"></i>
            </span>
            {{ __('User Details') }}
        </a>
        <a href="{{ route('dashboard.storestock', ['id' => auth('staff')->user()->bookstore_id]) }}" class="flex items-center py-2 px-4 text-gray-100 hover:bg-gray-700 {{ request()->routeIs('dashboard.storestock') ? 'bg-gray-700' : '' }}"> <span class="mr-2">
                <i class="bi bi-graph-up"></i>
            </span>
            {{ __('Store Stock') }}
        </a>
        <a href="{{ route('userDetails') }}" class="flex items-center py-2 px-4 text-gray-100 hover:bg-gray-700 {{ request()->routeIs('userDetails') ? 'bg-gray-700' : '' }}">
            <span class="mr-2">
                <i class="bi bi-list-ul"></i>
            </span>
            Placed Orders
        </a>
        <a href="#" class="flex items-center py-2 px-4 text-gray-100 hover:bg-gray-700">
            <span class="mr-2">
                <i class="bi bi-cart"></i>
            </span>
            Order Menu
        </a>
    </nav>
</div>