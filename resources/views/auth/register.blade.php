<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Prefix Name -->
        <div class="mt-4">
            <x-input-label for="prefixname" :value="__('Prefix Name')" />
            <select id="prefixname" name="prefixname" class="block mt-1 w-full">
                <option value="">
                <option value="Mr" @selected(old('prefixname') == 'Mr')>Mr</option>
                <option value="Mrs" @selected(old('prefixname') == 'Mrs')>Mrs</option>
                <option value="Ms" @selected(old('prefixname') == 'Ms')>Ms</option>
            </select>
            <x-input-error :messages="$errors->get('prefixname')" class="mt-2" />
        </div>

        <!-- First Name -->
        <div class="mt-4">
            <x-input-label for="firstname" :value="__('First Name')" />
            <x-text-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')" required autocomplete="given-name" />
            <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
        </div>

        <!-- Middle Name -->
        <div class="mt-4">
            <x-input-label for="middlename" :value="__('Middle Name')" />
            <x-text-input id="middlename" class="block mt-1 w-full" type="text" name="middlename" :value="old('middlename')" autocomplete="additional-name" />
            <x-input-error :messages="$errors->get('middlename')" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div class="mt-4">
            <x-input-label for="lastname" :value="__('Last Name')" />
            <x-text-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')" required autocomplete="family-name" />
            <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
        </div>

        <!-- Suffix Name -->
        <div class="mt-4">
            <x-input-label for="suffixname" :value="__('Suffix Name')" />
            <x-text-input id="suffixname" class="block mt-1 w-full" type="text" name="suffixname" :value="old('suffixname')" autocomplete="honorific-suffix" />
            <x-input-error :messages="$errors->get('suffixname')" class="mt-2" />
        </div>

        <!-- Username -->
        <div class="mt-4">
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Photo (File Upload) -->
        <div class="mt-4">
            <x-input-label for="photo" :value="__('Photo')" />
            <input id="photo" class="block mt-1 w-full" type="file" name="photo" accept="image/*" />
            <x-input-error :messages="$errors->get('photo')" class="mt-2" />
        </div>

        <!-- Type -->
        <div class="mt-4">
            <x-input-label for="type" :value="__('Type')" />
            <select id="type" name="type" class="block mt-1 w-full">
                <option value="user" @selected(old('type', 'user') == 'user')>User</option>
                <option value="admin" @selected(old('type') == 'admin')>Admin</option>
            </select>
            <x-input-error :messages="$errors->get('type')" class="mt-2" />
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

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
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
