<section class="profile_section">
    <header class="profile_header">
        <h2 class="profile_title">
            {{ __('Delete Account') }}
        </h2>

        <p class="profile_description">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>
    <div class="profile_form_actions">
    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="profile_button"
    >{{ __('Delete Account') }}</x-danger-button></div>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="profile_form">
            @csrf
            @method('delete')

            <h2 class="profile_title1">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="profile_description">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="profile_form_group">
                <x-input-label for="password" :value="__('Password')" class="profile_label" />

                
                @props(['disabled' => false])

                <input class="text_input" {{ $disabled ? 'disabled' : '' }} id="password"
                name="password"
                type="password"
                placeholder="{{ __('Password') }}"
                class="profile_input">
                <x-input-error :messages="$errors->userDeletion->get('password')" class="profile_error" />
            </div>

            <div class="profile_form_actions">
                <x-secondary-button x-on:click="$dispatch('close')" class="profile_button">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="profile_button">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
