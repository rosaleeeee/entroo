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
            @endphp

            <div class="quiz-section">
                @foreach ($questionKeys as $question)
                    @php
                        $key = str_replace(' ', '_', strtolower($question));
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
                @endforeach
            </div>

            <button type="submit" class="submit-button">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
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
