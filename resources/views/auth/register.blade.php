<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Speaker's Name -->
        <div class="mt-4">
            <x-input-label for="speaker_name" :value="__('Speaker Name')" />
            <x-text-input id="speaker_name" class="block w-full mt-1" type="text" name="speaker_name" :value="old('speaker_name')" required />
            <x-input-error :messages="$errors->get('speaker_name')" class="mt-2" />
        </div>

        <!-- Speaker's Phone Number -->
        <div class="mt-4">
            <x-input-label for="speaker_phone_number" :value="__('Speaker Phone Number')" />
            <x-text-input id="speaker_phone_number" class="block w-full mt-1" type="text" name="speaker_phone_number" :value="old('speaker_phone_number')" required />
            <x-input-error :messages="$errors->get('speaker_phone_number')" class="mt-2" />
        </div>

        <!-- Speaker's Bio -->
        <div class="mt-4">
            <x-input-label for="speaker_bio" :value="__('Speaker Bio')" />
            <x-text-input id="speaker_bio" class="block w-full mt-1" type="text" name="speaker_bio" :value="old('speaker_bio')" />
            <x-input-error :messages="$errors->get('speaker_bio')" class="mt-2" />
        </div>

        <!-- Speaker's Twitter Handle -->
        <div class="mt-4">
            <x-input-label for="speaker_twitter_handle" :value="__('Speaker Twitter Handle')" />
            <x-text-input id="speaker_twitter_handle" class="block w-full mt-1" type="text" name="speaker_twitter_handle" :value="old('speaker_twitter_handle')" />
            <x-input-error :messages="$errors->get('speaker_twitter_handle')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
