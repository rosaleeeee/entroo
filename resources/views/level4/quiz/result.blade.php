<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('result_mbti.css') }}" rel="stylesheet">
    <link href="{{ asset('nav.css') }}" rel="stylesheet">
    <title>Result</title>
</head>
<body>
    
    @include('layouts.sidebar')
    <div class="container_result">
    <h1>Your MBTI Type is: {{ $mbti_type }}</h1>
    <div class="pie" style="--p:70"> 20%</div>
    <div class="pie" style="--p:40;--c:darkblue;--b:10px"> 40%</div>
    <div class="pie no-round" style="--p:60;--c:purple;--b:15px"> 60%</div>
    <div class="pie animate no-round" style="--p:80;--c:orange;"> 80%</div>
    <div class="pie animate" style="--p:90;--c:lightgreen"> 90%</div>
    <h1>Quiz Results</h1>
    <p>E: {{ $results_E }}</p>
    <p>I: {{ $results_I }}</p>
    <p>S: {{ $results_S }}</p>
    <p>N: {{ $results_N }}</p>
    <p>T: {{ $results_T }}</p>
    <p>F: {{ $results_F }}</p>
    <p>J: {{ $results_J }}</p>
    <p>P: {{ $results_P }}</p>    
    <h2>Your MBTI Type is: {{ $mbti_type }}</h2>
    </div>
</body>
</html>
