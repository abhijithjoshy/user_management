<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="flex items-center gap-4 mb-4">
            <img src="{{ $user->avatar }}" alt="Avatar" class="w-16 h-16 rounded-full object-cover border">

            <div>
                <label for="photo" class="block text-sm font-medium text-gray-700">{{ __('Change Photo') }}</label>
                <input id="photo" name="photo" type="file" class="form-control mt-1 block w-full" accept="image/*">
                <x-input-error class="mt-2" :messages="$errors->get('photo')" />
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-3">
                <x-input-label for="prefixname" :value="__('Prefix Name')" />
                <select id="prefixname" name="prefixname" class="form-control mt-1 block w-full">
                    <option value="">--</option>
                    <option value="Mr" @selected(old('prefixname', $user->prefixname) == 'Mr')>Mr</option>
                    <option value="Mrs" @selected(old('prefixname', $user->prefixname) == 'Mrs')>Mrs</option>
                    <option value="Ms" @selected(old('prefixname', $user->prefixname) == 'Ms')>Ms</option>
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('prefixname')" />
            </div>

            <div class="col-md-3">
                <x-input-label for="firstname" :value="__('First Name')" />
                <x-text-input id="firstname" name="firstname" type="text" class="mt-1 block w-full" :value="old('firstname', $user->firstname)" required autofocus autocomplete="given-name" />
                <x-input-error class="mt-2" :messages="$errors->get('firstname')" />
            </div>

            <div class="col-md-3">
                <x-input-label for="middlename" :value="__('Middle Name')" />
                <x-text-input id="middlename" name="middlename" type="text" class="mt-1 block w-full" :value="old('middlename', $user->middlename)" autocomplete="additional-name" />
                <x-input-error class="mt-2" :messages="$errors->get('middlename')" />
            </div>

            <div class="col-md-3">
                <x-input-label for="lastname" :value="__('Last Name')" />
                <x-text-input id="lastname" name="lastname" type="text" class="mt-1 block w-full" :value="old('lastname', $user->lastname)" required autocomplete="family-name" />
                <x-input-error class="mt-2" :messages="$errors->get('lastname')" />
            </div>

            <div class="col-md-6">
                <x-input-label for="suffixname" :value="__('Suffix Name')" />
                <x-text-input id="suffixname" name="suffixname" type="text" class="mt-1 block w-full" :value="old('suffixname', $user->suffixname)" autocomplete="honorific-suffix" />
                <x-input-error class="mt-2" :messages="$errors->get('suffixname')" />
            </div>

            <div class="col-md-6">
                <x-input-label for="username" :value="__('Username')" />
                <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" :value="old('username', $user->username)" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('username')" />
            </div>

            <div class="col-md-12">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800">
                            {{ __('Your email address is unverified.') }}

                            <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
