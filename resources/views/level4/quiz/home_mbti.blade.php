<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('home_mbti.css') }}">
    <title>Laravel Chat</title>
</head>
<body>
    @include('layouts.sidebar')
    <div class="ccc4">
    <h1 class="titre" > Chat for choosing jobs </h1>    </div>
    <div class="container_c">
        <div id="main" data-user="{{ json_encode($user) }}"></div>
    </div>
    <div class="ccc4">    <a href="{{ route('affect_mbti') }}" class="btnnext">Start choosing</a>
    </div>
</body>
</html>
</x-app-layout>



    
