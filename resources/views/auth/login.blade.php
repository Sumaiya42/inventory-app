<!-- resources/views/auth/login.blade.php -->

<x-app-layout>
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">{{ __('Login to Inventory App') }}</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="mb-4 flex items-center">
            <input id="remember_me" type="checkbox" name="remember" class="mr-2">
            <label for="remember_me" class="text-sm text-gray-700">{{ __('Remember me') }}</label>
        </div>

        <x-primary-button class="bg-blue-600 hover:bg-blue-700 w-full">
            {{ __('Log in') }}
        </x-primary-button>

        <div class="mt-4 text-center">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-blue-600 hover:underline text-sm">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <div class="mt-4 text-center text-sm text-gray-600">
            {{ __("Don't have an account?") }}
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline">{{ __('Register') }}</a>
        </div>
    </form>
</x-app-layout>
