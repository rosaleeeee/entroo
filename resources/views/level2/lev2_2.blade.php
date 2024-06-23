<x-app-layout>
    <link href="{{ asset('level2_2.css') }}" rel="stylesheet">
    @include('layouts.sidebar')
    
    <div class="container">
        <div class="centered-container">
            <div class="idea-details">
                <img class="img_mo" src="{{ asset('images_mbti/motivation.png') }}" alt="Like">
                <h1>The Winning Idea</h1>
                <h3>{{ $winningIdea->title }}</h3>
                <p>{{ $winningIdea->description }}</p>
                <p class="submitted-by">Submitted by: {{ $winningIdea->user->name }}</p>

                <button class="comment-button" onclick="window.location.href='business-model/create'">Start making the business model</button>
            </div>
        </div>
    </div>
</x-app-layout>
