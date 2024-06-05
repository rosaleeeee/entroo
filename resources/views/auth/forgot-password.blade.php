<x-guest-layout>
    <div class="mb-4">
        <p>{{ __('Forgot your password? No problem.') }}</p>
        <p>{{ __('Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <br>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email"  type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')"  />
        </div>
        <br>
        <div>
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
