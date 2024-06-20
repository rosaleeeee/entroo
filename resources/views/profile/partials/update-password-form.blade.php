<section class="profile_section">
    <header class="profile_header">
        <h2 class="profile_title">
            {{ __('Update Password') }}
        </h2>

        <p class="profile_description">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="profile_form">
        @csrf
        @method('put')

        <div class="profile_form_group">
            <strong><x-input-label for="update_password_current_password" :value="__('Current Password')"  /></strong>
            <x-text-input id="update_password_current_password" name="current_password" type="password"  autocomplete="current-password" class="profile_input" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="profile_error" />
        </div>

        <div class="profile_form_group">
        <strong><x-input-label for="update_password_password" :value="__('New Password')" class="profile_label" /></strong>
            <x-text-input id="update_password_password" name="password" type="password"  autocomplete="new-password" class="profile_input" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="profile_error" />
        </div>

        <div class="profile_form_group">
            <strong><x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" class="profile_label" /></strong>
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password"  autocomplete="new-password" class="profile_input" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="profile_error" />
        </div>

        <div class="profile_form_actions">
            <button class="profile_button" type="submit">
                Save
            </button>

            @if (session('status') === 'password-updated')
                <p class="profile_success_message"
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
