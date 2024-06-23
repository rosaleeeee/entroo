<x-app-layout>
    <link href="{{ asset('level2.css') }}" rel="stylesheet">
    @include('layouts.sidebar')
    <div class="containe_r">
        <div class="content-containe_r">
            <div class="smart-containe_r">
                <img class="job_image" src="{{ asset('images_mbti/idea.png')}}" alt="image">
                <h2>Propose a SMART Project Idea :</h2>
                <p>Now, it's time for each team member to propose a project idea. Your idea should follow the SMART criteria:</p>
                <div class="smart-item">
                    <div class="smart-letter">S</div>
                    <div class="smart-content">
                        <h3>Specific</h3>
                        <p>Make your goal specific and narrow for more effective planning.</p>
                        <button class="learn-more-button" data-modal="modalSpecific">Learn More</button>
                    </div>
                </div>
                <div class="smart-item">
                    <div class="smart-letter">M</div>
                    <div class="smart-content">
                        <h3>Measurable</h3>
                        <p>Make sure your goal and progress are measurable.</p>
                        <button class="learn-more-button" data-modal="modalMeasurable">Learn More</button>
                    </div>
                </div>
                <div class="smart-item">
                    <div class="smart-letter">A</div>
                    <div class="smart-content">
                        <h3>Achievable</h3>
                        <p> Set goals that are realistic and attainable within given resources.</p>
                        <button class="learn-more-button" data-modal="modalAchievable">Learn More</button>
                    </div>
                </div>
                <div class="smart-item">
                    <div class="smart-letter">R</div>
                    <div class="smart-content">
                        <h3>Relevant</h3>
                        <p>Your goal should align with your values and long-term objectives.</p>
                        <button class="learn-more-button" data-modal="modalRelevant">Learn More</button>
                    </div>
                </div>
                <div class="smart-item">
                    <div class="smart-letter">T</div>
                    <div class="smart-content">
                        <h3>Time-based</h3>
                        <p>Establish a deadline to focus efforts and ensure timely completion.</p>
                        <button class="learn-more-button" data-modal="modalTimeBased">Learn More</button>
                    </div>
                </div>
            </div>
        
            <div class="form-containe_r">
                <h2>Submit Your Idea</h2>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('ideas.store') }}" method="POST">
                    @csrf
                    <div>
                        <input type="text" id="title" name="title" placeholder="PROJECT TITLE:" required>
                    </div>
                    <div>
                        <textarea id="description" name="description" placeholder="PROJECT DESCRIPTION:" required></textarea>
                    </div>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modals for SMART Box Details -->
    <div id="modalSpecific" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3>Specific</h3>
            <p> To be effective, a goal must be specific. This means it should be clearly defined and unambiguous. A specific goal answers questions like: What needs to be accomplished? Why is this goal important? Who is involved? Where is it located? Which resources or constraints are involved? By narrowing down the focus, you eliminate confusion and set a clear path towards achieving the goal.</p>
        </div>
    </div>

    <div id="modalMeasurable" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3>Measurable</h3>
            <p>A measurable goal allows for tracking progress and assessing when the goal has been achieved. This involves setting criteria or milestones that can be quantified or assessed. It answers questions such as: How much? How many? How will I know when it is accomplished? By having measurable elements, you can stay on track, meet deadlines, and experience the satisfaction of reaching your targets.</p>
        </div>
    </div>

    <div id="modalAchievable" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3>Achievable</h3>
            <p>Goals need to be realistic and attainable to be successful. While it’s important to set ambitious goals, they must also be possible given the available resources, knowledge, and time. An achievable goal will usually answer questions such as: How can I accomplish this goal? How realistic is the goal based on other constraints? Setting achievable goals keeps motivation high and ensures steady progress.</p>
        </div>
    </div>

    <div id="modalRelevant" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3>Relevant</h3>
            <p> A goal must matter to you and align with other relevant goals. This step ensures that the goal is worthwhile and that it aligns with other objectives. A relevant goal can answer yes to these questions: Does this seem worthwhile? Is this the right time? Does this match our other efforts/needs? Is this applicable in the current socio-economic environment? Relevant goals drive you forward and help you stay focused on what truly matters.</p>
        </div>
    </div>

    <div id="modalTimeBased" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3>Time-based</h3>
            <p>Every goal needs a target date, so you have a deadline to focus on and something to work towards. This part of the SMART goal criteria helps to prevent everyday tasks from taking priority over your longer-term goals. A time-based goal will usually answer questions like: When? What can I do six months from now? What can I do six weeks from now? What can I do today? Setting a deadline creates a sense of urgency and helps in managing time effectively to achieve the goal.</p>
        </div>
    </div>

    <script>
        // Script pour ouvrir les modales SMART Box Details
        document.querySelectorAll('.learn-more-button').forEach(function(button) {
            button.addEventListener('click', function() {
                var modalId = this.getAttribute('data-modal');
                document.getElementById(modalId).style.display = 'block';
            });
        });

        // Script pour fermer les modales lorsqu'on clique sur le bouton de fermeture
        document.querySelectorAll('.close').forEach(function(element) {
            element.addEventListener('click', function() {
                this.closest('.modal').style.display = 'none';
            });
        });

        // Script pour fermer les modales lorsqu'on clique à l'extérieur de la modal
        window.addEventListener('click', function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = 'none';
            }
        });
    </script>
</x-app-layout>
