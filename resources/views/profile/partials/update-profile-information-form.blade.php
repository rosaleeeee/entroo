<section class="profile-section">
    <header class="profile-header">
        <h2 class="profile_title">
            {{ __('Profile Information') }}
        </h2>

        <p class="profile-header-description">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}" class="profile-send-verification">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="profile-update-form">
        @csrf
        @method('patch')

        <div class="profile-form-group">
            <label for="name" class="profile-label">{{ __('Name') }}</label>
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" class="profile-input" />
            @error('name')
                <p class="profile-error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="profile-form-group">
            <label for="email" class="profile-label">{{ __('Email') }}</label>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required autocomplete="username" class="profile-input" />
            @error('email')
                <p class="profile-error-message">{{ $message }}</p>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="profile-email-unverified">
                    <p>
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="profile-verification-button">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="profile-verification-link-sent">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="profile-form-actions">
            <button type="submit" class="profile-save-button">{{ __('Save') }}</button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="profile-saved-message"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
