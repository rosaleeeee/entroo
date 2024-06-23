<x-app-layout>
    <link href="{{ asset('level2_1.css') }}" rel="stylesheet">
    @include('layouts.sidebar')

    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Entrepreneurs' Ideas and Voting </h1>
            <img class="img_vote" src="{{ asset('images_mbti/vote.png') }}" alt="Like">
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div id="voteErrorModal" class="modal error-modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <p>{{ session('error') }}</p>
                </div>
            </div>
        @endif

        <div class="bnm">
            <div class="row">
                @foreach($ideas as $idea)
                <div class="card">
                    <div>
                        <h3>{{ $idea->title }}</h3>
                        <p>{{ $idea->description }}</p>
                        <div class="idea-info">
                            <p class="submitted-by">Submitted by: {{ $idea->user->name }}</p>
                            <p class="votes">Votes: {{ $idea->votes_count }}</p>
                            <form action="/vote/{{ $idea->id }}" method="POST" class="vote-form">
                                @csrf
                                <button type="submit" class="img-like-button"><img class="img_like" src="{{ asset('images_mbti/like2.png') }}" alt="Like"></button>
                            </form>
                        </div>
                    </div>        
                </div>
                @endforeach
            </div>
        </div>

        <div class="see-results-container">
            <button id="seeResults" class="vote-button">See Results</button>
        </div>
    </div>

    <!-- Modal for "When all the entrepreneurs finish the vote" message -->
    <div id="messageModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>When all the entrepreneurs finish the vote, you will be able to see the results.</p>
        </div>
    </div>

    <script>
        document.getElementById('seeResults').addEventListener('click', function(event) {
            @if (!$atLeastNineUsersVoted)
                event.preventDefault();
                document.getElementById('messageModal').style.display = 'block';
            @else
                window.location.href = '/winning-idea';
            @endif
        });

        // Close modal when the close button is clicked
        document.querySelectorAll('.close').forEach(function(element) {
            element.addEventListener('click', function() {
                this.closest('.modal').style.display = 'none';
            });
        });

        // Close modal when clicking outside the modal content
        window.addEventListener('click', function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = 'none';
            }
        });

        // Display the vote error modal if there is an error
        @if (session('error'))
            document.getElementById('voteErrorModal').style.display = 'block';
        @endif
    </script>
</x-app-layout>



