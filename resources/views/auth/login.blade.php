<x-guest-layout>
    <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded shadow">
        <div class="text-center mb-6">
            <img src="{{ asset('images/sharp.jpg') }}" class="w-32 mx-auto" alt="Logo PT. SHARP">
        </div>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full border-gray-300 focus:border-primary focus:ring-primary" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full border-gray-300 focus:border-primary focus:ring-primary" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-primary shadow-sm focus:ring-primary" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-6">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-primary" href="{{ route('password.request') }}">
                        {{ __('Lupa Password?') }}
                    </a>
                @endif

                <x-primary-button class="bg-primary hover:bg-red-900">
                    {{ __('Masuk') }}
                </x-primary-button>
            </div>

            <div class="mt-4 text-center">
    <span class="text-sm text-gray-600">Belum punya akun?</span>
    <a href="{{ route('register') }}" class="text-primary hover:underline font-semibold">
        Daftar di sini
    </a>
</div>

        </form>
    </div>
</x-guest-layout>
