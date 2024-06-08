<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
</head>
<body>
    <form action="{{ route('quiz.submit') }}" method="POST">
        @csrf
        @foreach($questions as $question => $answers)
            <div>
                <p>{{ $question }}</p>
                @foreach($answers as $answer => $value)
                    <label>
                        <input type="radio" name="{{ $loop->parent->index }}" value="{{ $value }}">
                        {{ $answer }}
                    </label><br>
                @endforeach
            </div>
        @endforeach
        <button type="submit">Submit</button>
    </form>
</body>
</html>
