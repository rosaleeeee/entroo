<x-app-layout>
    <link href="{{ asset('profile.css') }}" rel="stylesheet">

    <x-slot name="header">
        <h2 class="profile-header-title">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    <br><br><br><br>
    <div class="profile-content-wrapper">
        <div class="profile-content-container">
            <div class="profile-card">
                <div class="profile-card-content">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
            <br><br><br><br><br>

            <div class="profile-card">
                <div class="profile-card-content">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
            <br><br><br><br><br>
            <div class="profile-card">
                <div class="profile-card-content">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
            <br><br><br><br><br>
        </div>
    </div>
</x-app-layout>
