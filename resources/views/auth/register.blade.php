<x-guest-layout>
    <x-auth-card>


        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required />
            </div>

            {{-- Is Admin --}}
            <div class="mt-4">
                <x-label for="is_admin" :value="__('Is Admin')" />

                <x-input id="is_admin" class="block mt-1 w-full" type="number" min="0" max="1" name="is_admin"
                    required />
            </div>
            <div class="d-flex flex-column aling-items-center justify-content-start mt-4">

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
                <a class="my-2 text-center text-dark" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
