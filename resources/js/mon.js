
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

    // Appeler la fonction de vérification
    checkAllUsersCompleted();
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
            console.log(response);
        },
        error: function(xhr, status, error) {
            alert('Erreur lors de la mise à jour des affectations temporaires');
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

setInterval(checkAllUsersCompleted, 60000); // Vérifie toutes les 60 secondes


