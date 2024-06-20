<x-app-layout>
    <link href="{{ asset('lv3quiz.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

    <body>
        <div>
            <!-- start navbar -->
            @include('layouts.sidebar')
            <!-- end navbar -->
        </div>

        <section class="content">
            <div class="app">
                <h1>Simple quiz</h1>
                <div class="quiz">
                    <h2 id="question" class="question">Question goes here</h2>
                    <div id="answer-buttons" class="answer-buttons">
                        <!-- Answer buttons will be dynamically added here -->
                    </div>
                    <button id="next-btn">Next</button>
                </div>
            </div>
        </section>

        <script>
            const questions = [
                {
                    question: "What is 10 + 2?",
                    answers: [
                        { text: "12", correct: true },
                        { text: "10", correct: false },
                        { text: "8", correct: false },
                        { text: "14", correct: false },
                    ]
                },
                {
                    question: "What is the capital of France?",
                    answers: [
                        { text: "Berlin", correct: false },
                        { text: "Paris", correct: true },
                        { text: "London", correct: false },
                        { text: "Madrid", correct: false },
                    ]
                },
                // Add more questions here as needed
            ];

            const questionElement = document.getElementById("question");
            const answerButtonsElement = document.getElementById("answer-buttons");
            const nextButton = document.getElementById("next-btn");

            let currentQuestionIndex = 0;
            let score = 0;

            function startQuiz() {
                currentQuestionIndex = 0;
                score = 0;
                nextButton.innerHTML = "Next";
                showQuestion();
            }

            function showQuestion() {
                resetState();
                let currentQuestion = questions[currentQuestionIndex];
                questionElement.innerHTML = `${currentQuestionIndex + 1}. ${currentQuestion.question}`;

                currentQuestion.answers.forEach(answer => {
                    const button = document.createElement("button");
                    button.innerHTML = answer.text;
                    button.classList.add("btn");
                    if (answer.correct) {
                        button.dataset.correct = answer.correct;
                    }
                    button.addEventListener("click", selectAnswer);
                    answerButtonsElement.appendChild(button);
                });
            }

            function resetState() {
                nextButton.style.display = "none";
                while (answerButtonsElement.firstChild) {
                    answerButtonsElement.removeChild(answerButtonsElement.firstChild);
                }
            }

            function selectAnswer(e) {
                const selectedBtn = e.target;
                const isCorrect = selectedBtn.dataset.correct === "true";

                if (isCorrect) {
                    selectedBtn.classList.add("correct");
                    score++;
                } else {
                    selectedBtn.classList.add("incorrect");
                }

                Array.from(answerButtonsElement.children).forEach(button => {
                    if (button.dataset.correct === "true") {
                        button.classList.add("correct");
                    }
                    button.disabled = true;
                });

                nextButton.style.display = "block";
            }

            function showScore() {
                resetState();
                questionElement.innerHTML = `You scored ${score} out of ${questions.length}`;
                nextButton.innerHTML = "Play Again";
                nextButton.style.display = "block";
            }

            function handleNextButton() {
                currentQuestionIndex++;
                if (currentQuestionIndex < questions.length) {
                    showQuestion();
                } else {
                    showScore();
                }
            }

            nextButton.addEventListener("click", handleNextButton);

            startQuiz();
        </script>
    </body>
</x-app-layout>
