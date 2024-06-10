<x-app-layout>
    
            <!-- Page Content -->

            <main>
            <div style="display: flex; height: 85vh;">
    <div style="width: 100px; ; color: black; padding: 20px;">
        <!-- start navbar --> 
    @include('layouts.sidebar')

<!-- end navbar -->   
</div>
<link href="{{ asset('Start-level.css') }}" rel="stylesheet">


<body>
    <div class="container">
        <div class="icon">
            <img src="{{ asset('images/Level4.png') }}" alt="Business Model Icon">
        </div>
        <h1>PROFILE</h1>
        <button class="start-button" onclick="window.location.href='quiz/show'">start</button>
    </div>
</body>


</x-app-layout>
