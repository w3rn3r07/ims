<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Details') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- User details content goes here -->
                <h3 class="font-semibold text-lg">{{ __('Personal Information') }}</h3>
                <ul class="mt-4">
                    <li><strong>First Name:</strong> {{ $staff->fname }}</li>
                    <li><strong>Last Name:</strong> {{ $staff->lname }}</li>
                    <li><strong>Staff Role:</strong> {{ $staff->role->role_title }}</li>
                    <li><strong>Email:</strong> {{ $staff->email }}</li>
                    <li><strong>Phone Number:</strong> {{ $staff->phone_no }}</li>
                    <li><strong>Bookstore:</strong> {{ $bookstore->name }}</li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>