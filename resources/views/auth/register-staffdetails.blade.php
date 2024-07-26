<x-guest-layout>
    <form method="POST" action="{{ route('register-staff.store') }}">
        @csrf

        <!-- First Name -->
        <div>
            <x-input-label for="fname" :value="__('First Name')" />
            <x-text-input id="fname" class="block mt-1 w-full" type="text" name="fname" :value="old('fname')" required autofocus autocomplete="fname" />
            <x-input-error :messages="$errors->get('fname')" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div class="mt-4">
            <x-input-label for="lname" :value="__('Last Name')" />
            <x-text-input id="lname" class="block mt-1 w-full" type="text" name="lname" :value="old('lname')" required autofocus autocomplete="lname" />
            <x-input-error :messages="$errors->get('lname')" class="mt-2" />
        </div>

        <!-- Username -->
        <div class="mt-4">
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Additional Staff Fields -->
        <div class="mt-4">
            <x-input-label for="phone_no" :value="__('Phone Number')" />
            <x-text-input id="phone_no" class="block mt-1 w-full" type="text" name="phone_no" :value="old('phone_no')" required />
            <x-input-error :messages="$errors->get('phone_no')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="emergency_no" :value="__('Emergency Number')" />
            <x-text-input id="emergency_no" class="block mt-1 w-full" type="text" name="emergency_no" :value="old('emergency_no')" required />
            <x-input-error :messages="$errors->get('emergency_no')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="city" :value="__('City')" />
            <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required />
            <x-input-error :messages="$errors->get('city')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="street_name" :value="__('Street Name')" />
            <x-text-input id="street_name" class="block mt-1 w-full" type="text" name="street_name" :value="old('street_name')" required />
            <x-input-error :messages="$errors->get('street_name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="postcode" :value="__('Postcode')" />
            <x-text-input id="postcode" class="block mt-1 w-full" type="text" name="postcode" :value="old('postcode')" required />
            <x-input-error :messages="$errors->get('postcode')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="bookstore_id" :value="__('Bookstore')" />
            <select id="bookstore_id" name="bookstore_id" class="block mt-1 w-full" required>
                <option value="" disabled selected>Select a bookstore</option>
                @foreach ($bookstores as $bookstore)
                <option value="{{ $bookstore->bookstore_id }}">{{ $bookstore->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('bookstore_id')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="role_id" :value="__('Role')" />
            <select id="role_id" name="role_id" class="block mt-1 w-full" required>
                <option value="" disabled selected>Select a role</option>
                @foreach ($roles as $role)
                <option value="{{ $role->role_id }}">{{ $role->role_title }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('role_id')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>