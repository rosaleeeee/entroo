<!-- mbti_quiz.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MBTI Quiz</title>
    <link href="{{ asset('nav.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('mbti_quiz.css') }}">
</head>
<body>
    @include('layouts.sidebar')
    <div class="quiz-container">
        <h1>MBTI Quiz</h1>

        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('quiz.submit') }}" method="POST" id="quizForm">
            @csrf
            @php
                $questionKeys = array_keys($questions);
                $totalQuestions = count($questionKeys);
                $questionsPerPage = 10;
            @endphp

            @for ($i = 0; $i < $totalQuestions; $i += $questionsPerPage)
            <p>La valeur de $i est : {{ $i }}</p>

            @if ($i === 0)
            <p>La valeur de $i est : {{ $i }}</p>

            <style>
              .btn-prev {
                visibility: hidden;
              }
              .btn-next {
                margin: auto;

              }
            </style>
            @endif
            @if ($i !== 0)
            <p>La valeur de $i est : {{ $i }}</p>

            <style>
              .btn-prev {
                visibility: visible;
              }
              .btn-next {
                margin: auto;

              }
            </style>
          @endif
                <div class="quiz-section" data-start-index="{{ $i }}">
                    @for ($j = $i; $j < min($i + $questionsPerPage, $totalQuestions); $j++)
                        @php
                            $question = $questionKeys[$j];
                            $key = $formatQuestionKey($question);
                        @endphp
                        <div class="question">
                            <p>{{ $question }}</p>
                            <div class="answers">
                                @foreach($questions[$question] as $answer => $type)
                                    <button type="button" class="answer-button" data-question="{{ $key }}" data-answer="{{ $type }}">{{ $answer }}</button>
                                @endforeach
                                <input type="hidden" name="{{ $key }}" value="">
                            </div>
                        </div>
                    @endfor
                </div>
            @endfor

            <div class="pagination">
                <button type="button" class="btn-prev">Previous</button>
                <button type="button" class="btn-next">Next</button>
            </div>

            <button type="submit" class="submit-button">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialiser les boutons et sections de question
            $('.quiz-section').hide();
            $('.quiz-section:first').show();

            $('.btn-next').click(function() {
                var currentSection = $('.quiz-section:visible');
                var nextSection = currentSection.next('.quiz-section');
                currentSection.hide();
                nextSection.show();
            });

            $('.btn-prev').click(function() {
                var currentSection = $('.quiz-section:visible');
                var prevSection = currentSection.prev('.quiz-section');
                currentSection.hide();
                prevSection.show();
            });

            $('.answer-button').click(function() {
                var questionKey = $(this).data('question');
                var answerValue = $(this).data('answer');

                // Désélectionner tous les autres boutons de cette question
                $('[data-question="' + questionKey + '"]').removeClass('selected');

                // Sélectionner le bouton cliqué
                $(this).addClass('selected');

                // Mettre à jour le champ de réponse caché
                $('input[name="' + questionKey + '"]').val(answerValue);
            });
        });
    </script>
</body>
</html>
