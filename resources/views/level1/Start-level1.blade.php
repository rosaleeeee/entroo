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
            <img src="{{ asset('images/BM.png') }}" alt="Business Model Icon">
        </div>
        <h1>BUSINESS MODEL</h1>
        <button class="start-button">start</button>
    </div>
</body>


</x-app-layout>
