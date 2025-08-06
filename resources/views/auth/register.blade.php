<x-guest-layout>
    <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded shadow">
        <div class="text-center mb-6">
            <img src="{{ asset('images/sharp.jpg') }}" class="w-32 mx-auto" alt="Logo PT. SHARP">
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full border-gray-300 focus:border-primary focus:ring-primary" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full border-gray-300 focus:border-primary focus:ring-primary" type="email" name="email" :value="old('email')" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full border-gray-300 focus:border-primary focus:ring-primary" type="password" name="password" required />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full border-gray-300 focus:border-primary focus:ring-primary" type="password" name="password_confirmation" required />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between mt-6">
                <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-primary">
                    {{ __('Sudah punya akun?') }}
                </a>

                <x-primary-button class="bg-primary hover:bg-red-900">
                    {{ __('Daftar') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
