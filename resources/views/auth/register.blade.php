<x-layouts.auth>
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="p-6">
            <div class="mb-3">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">
                    {{ __('Register an account') }}
                </h1>
            </div>

            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            <form method="POST" action="{{ route('register') }}" class="space-y-3">
                @csrf

                <!-- First name -->
                <x-forms.input
                    label="First name"
                    name="firstname"
                    type="text"
                    placeholder="First name"
                    autofocus
                />

                <!-- Last name -->
                <x-forms.input
                    label="Last name"
                    name="lastname"
                    type="text"
                    placeholder="Last name"
                />

                <!-- Email -->
                <x-forms.input
                    label="Email"
                    name="email"
                    type="email"
                    placeholder="your@email.com"
                />

                <!-- Phone number -->
                <x-forms.input
                    label="Phone number"
                    name="phonenumber"
                    type="text"
                    placeholder="0123456789"
                />

                <!-- Address -->
                <x-forms.input
                    label="Address"
                    name="adress"
                    type="text"
                    placeholder="Street + number"
                />

                <!-- Zip code -->
                <x-forms.input
                    label="Zip code"
                    name="zip_code"
                    type="text"
                    placeholder="1234 AB"
                />

                <!-- City -->
                <x-forms.input
                    label="City"
                    name="city"
                    type="text"
                    placeholder="City"
                />

                <!-- Password -->
                <x-forms.input
                    label="Password"
                    name="password"
                    type="password"
                    placeholder="••••••••"
                />

                <!-- Confirm password -->
                <x-forms.input
                    label="Confirm password"
                    name="password_confirmation"
                    type="password"
                    placeholder="••••••••"
                />

                <!-- Submit -->
                <x-button type="primary" class="w-full">
                    {{ __('Create Account') }}
                </x-button>
            </form>

            <div class="text-center mt-6">
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Already have an account?
                    <a href="{{ route('login') }}"
                       class="text-blue-600 dark:text-blue-400 hover:underline font-medium">
                        {{ __('Sign in') }}
                    </a>
                </p>
            </div>
        </div>
    </div>
</x-layouts.auth>
