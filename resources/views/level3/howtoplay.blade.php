<x-app-layout>
    <link href="{{ asset('howtoplay.css') }}" rel="stylesheet">
    <!-- Page Content -->
    <main>
        <div style="display: flex; height: 85vh;">
            <div style="width: 100px; color: black; padding: 20px;">
                <!-- start navbar --> 
                @include('layouts.sidebar')    
                <!-- end navbar -->
            </div>
            <section class="container">
            <div class="photo-container">
            <div class="photo">
                <img src="{{ asset('images/quiz.png') }}" alt="Photo 1">
                
            </div>

        </div>
            

            </section>  
                      <button class="bottom-right-button" onclick="window.location.href='quiz'">I AM READY</button>

    </main>

</x-app-layout> 