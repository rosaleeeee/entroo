<x-app-layout>
    <link href="{{ asset('use_case1.css') }}" rel="stylesheet">
    @include('layouts.sidebar')
    <div class="bdiv">
        <div class="container">
            <img class="job_image" src="{{ asset('all_mbti/wait.png')}}" alt="image">
            <h1 class="page-title">Please Wait</h1><br><br>
            <p>Waiting for all entrepreneurs to complete the Business Model Canvas...</p><br><br>
            <a id="view-results-btn" class="custom-button disabled" disabled>See results</a>
        </div>
    </div>
    <script>
        // Faire une requête Ajax pour vérifier si tous les utilisateurs ont terminé
        fetch('{{ route("business_model.checkCompletion") }}')
            .then(response => response.json())
            .then(data => {
                if (data.allCompleted) {
                    // Activer le bouton "Voir les Résultats"
                    document.getElementById('view-results-btn').classList.remove('disabled');
                    document.getElementById('view-results-btn').removeAttribute('disabled');
                    document.getElementById('view-results-btn').addEventListener('click', function() {
                        window.location.href = '{{ route("business_model.result") }}';
                    });
                }
            });
    </script>
</x-app-layout>
