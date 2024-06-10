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
                $questionsPerPage =4;
            @endphp

            @for ($i = 0; $i < $totalQuestions; $i += $questionsPerPage)
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
                <button type="button" class="btn-next">Next</button>
            </div>

            <button type="submit" class="submit-button" style="display:none;">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            const totalSections = $('.quiz-section').length;
            let currentSectionIndex = 0;

            $('.quiz-section').hide();
            $('.quiz-section:first').show();

            $('.btn-next').click(function() {
                const currentSection = $('.quiz-section:visible');
                const nextSection = currentSection.next('.quiz-section');
                currentSection.hide();
                nextSection.show();
                currentSectionIndex++;

                if (currentSectionIndex === totalSections - 1) {
                    $('.btn-next').hide();
                    $('.submit-button').show();
                }
            });

            $('.answer-button').click(function() {
                const questionKey = $(this).data('question');
                const answerValue = $(this).data('answer');

                $('[data-question="' + questionKey + '"]').removeClass('selected');
                $(this).addClass('selected');
                $('input[name="' + questionKey + '"]').val(answerValue);
            });
        });
    </script>
</body>
</html>
