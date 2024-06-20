<!-- resources/views/affect-mbti/index.blade.php -->
<x-app-layout>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Drag and Drop pour Affecter des Utilisateurs</title>
        <link rel="stylesheet" href="{{ asset('affect_mbti.css') }}">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    </head>
    <body>
        @include('layouts.sidebar')
        @php
           $jobs = [
    'Product Manager' => 'product_manager.png',
    'Marketing Manager' => 'marketing_manager.png',
    'Sales Manager' => 'sales_manager.png',
    'Customer Service Manager' => 'customer_service_manager.png',
    'Chief Financial Officer (CFO)' => 'cfo.png',
    'Chief Operating Officer (COO)' => 'coo.png',
    'Project Manager' => 'project_manager.png',
    'Partnerships Manager' => 'partnerships_manager.png',
    'Accountant' => 'accountant.png',
    ];

        @endphp
        <div class="big">
            <h1 class="titre" > Choose your team's roles </h1><br>
            <div class="users-container">
                <div id="users">
                    @foreach($users as $user)
                        <div class="user" draggable="true" id="user-{{ $user->id }}">{{ $user->name }} -{{$user->mbti_type}}</div>
                    @endforeach
                </div>
            </div>
            <br>
            <div class="positions-container">
                <div id="positions">
                    @foreach($positions as $key => $position)
                        <div class="position" id="position-{{ $key + 1 }}">
                           <div class="xx" > <img class="job_image" src="{{ asset('images_mbti/' . $jobs[$position]) }}" alt="image"></div>
                            <h3 class="pos">{{ $position }}</h3>
                            <div class="xx" ><div class="droppable-area" ondrop="drop(event)" ondragover="allowDrop(event)"></div></div>
                        </div>
                    @endforeach
                </div>
            </div>
    
            <button id="showResults" disabled>Valider</button>
    
            <!-- Fenêtre modale -->
            <div id="confirmationModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <p>Après que tous les entrepreneurs auront complété cette étape, vous pourrez voir les résultats.</p>
                </div>
            </div>
        </div>
       
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const users = document.querySelectorAll(".user");
                const droppableAreas = document.querySelectorAll(".droppable-area");
                const showResultsButton = document.getElementById("showResults");
                const modal = document.getElementById("confirmationModal");
                const span = document.getElementsByClassName("close")[0];
            
                users.forEach(user => {
                    user.addEventListener("dragstart", dragStart);
                });
            
                droppableAreas.forEach(area => {
                    area.addEventListener("dragover", allowDrop);
                    area.addEventListener("drop", drop);
                });
            
                function dragStart(event) {
                    event.dataTransfer.setData("text", event.target.id);
                }
            
                function allowDrop(event) {
                    event.preventDefault();
                }
            
                function drop(event) {
                    event.preventDefault();
                    const userId = event.dataTransfer.getData("text");
                    const user = document.getElementById(userId);
                    const targetArea = event.target.closest(".droppable-area");
            
                    // Empêcher de déposer dans une boîte pleine
                    if (targetArea && targetArea.children.length === 0) {
                        targetArea.appendChild(user);
                        checkAllAssigned();
                    }
                }
            
                function checkAllAssigned() {
                    let allAssigned = true;
                    droppableAreas.forEach(area => {
                        if (area.children.length === 0) {
                            allAssigned = false;
                        }
                    });
                    showResultsButton.disabled = !allAssigned;
                }
            
                showResultsButton.addEventListener("click", () => {
                    // Désactiver le drag and drop après validation
                    users.forEach(user => {
                        user.setAttribute('draggable', 'false');
                    });
            
                    droppableAreas.forEach(area => {
                        area.removeEventListener("dragover", allowDrop);
                        area.removeEventListener("drop", drop);
                    });
            
                    modal.style.display = "block";
            
                    // Appeler la fonction de mise à jour temporaire des postes
                    updateTemporaryJobs();
                });
            
                span.onclick = function() {
                    modal.style.display = "none";
                }
            
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
            
                function updateTemporaryJobs() {
                    const positionsData = [];
            
                    droppableAreas.forEach(area => {
                        const user = area.querySelector(".user");
                        if (user) {
                            positionsData.push({
                                userId: user.id.split('-')[1],
                                job: area.previousElementSibling.textContent.trim()
                            });
                        }
                    });
            
                    $.ajax({
                        url: '/update-temporary-jobs',
                        method: 'POST',
                        data: {
                            positions: positionsData,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            alert('Les affectations temporaires ont été mises à jour avec succès');
                        },
                        error: function(xhr, status, error) {
                            alert('Erreur lors de la mise à jour des affectations temporaires');
                            console.error(error);
                        }
                    });
                }
            
                function checkAllUsersCompleted() {
                    $.ajax({
                        url: '/check-all-users-completed',
                        method: 'GET',
                        success: function(response) {
                            if (response.allCompleted) {
                                finalizeJobs();
                            } else {
                                alert('Tous les utilisateurs n\'ont pas encore complété leurs affectations');
                            }
                        },
                        error: function(xhr, status, error) {
                            alert('Erreur lors de la vérification de l\'état de complétion');
                            console.error(error);
                        }
                    });
                }
            
                function finalizeJobs() {
                    const positionsData = [];
            
                    droppableAreas.forEach(area => {
                        const user = area.querySelector(".user");
                        if (user) {
                            positionsData.push({
                                userId: user.id.split('-')[1],
                                job: area.previousElementSibling.textContent.trim()
                            });
                        }
                    });
            
                    $.ajax({
                        url: '/finalize-jobs',
                        method: 'POST',
                        data: {
                            positions: positionsData,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            alert('Les jobs ont été finalisés et mis à jour avec succès');
                        },
                        error: function(xhr, status, error) {
                            alert('Erreur lors de la finalisation des jobs');
                            console.error(error);
                        }
                    });
                }
            
                setInterval(checkAllUsersCompleted, 600000); // Vérifie toutes les 60 secondes
            });
        </script>    
    </body>
    </html>
</x-app-layout>
