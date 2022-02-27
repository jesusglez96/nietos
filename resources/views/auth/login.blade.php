<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img class="img-fluid d-block" src="img/7.jpg" alt="">
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="d-block mt-1 w-100" type="email" name="email" :value="old('email')" required
                    autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="d-block mt-1 w-100" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="d-block mt-4">
                <label for="remember_me" class="form-label">
                    <input id="remember_me" type="checkbox" class="rounded form-control-checkbox" name="remember">
                    <span class="ml-2 text-center text-dark">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="d-flex flex-column aling-items-center justify-content-start mt-4">
                <x-button>
                    {{ __('Log in') }}
                </x-button>
                @if (Route::has('password.request'))
                    <a class="text-center text-primary" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
