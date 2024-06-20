<x-app-layout>
    <link href="{{ asset('card.css') }}" rel="stylesheet">
    <!-- Page Content -->
    <main>
        <div style="display: flex; height: 85vh;">
            <div style="width: 100px; color: black; padding: 20px;">
                <!-- start navbar --> 
                @include('layouts.sidebar')    
                <!-- end navbar -->
            </div>
            <section class="container">
                <div class="cards grid">
                    <div class="card">
                        <div class="img-box">
                           <img src="{{asset ('images/cm.png')}}" alt="csm"> 
                        </div>
                        <div class="card-content">
                        <h1 class="card-heading">Community manager</h1>
                        <p class="card-text">
                            hhhhhhhhhhhhhhh
                        </p>
                    </div>
                    </div>
                    <div class="card">
                        <div class="img-box">
                           <img src="{{asset ('images/sm.png')}}" alt="csm"> 
                        </div>
                        <div class="card-content">
                        <h1 class="card-heading">Sales manager</h1>
                        <p class="card-text">
                            hhhhhhhhhhhhhhh
                        </p>
                    </div>
                    </div>
                    <div class="card">
                        <div class="img-box">
                           <img src="{{asset ('images/ps.png')}}" alt="csm"> 
                        </div>
                        <div class="card-content">
                        <h1 class="card-heading">Partnership manager</h1>
                        <p class="card-text">
                            hhhhhhhhhhhhhhh
                        </p>
                    </div>
                    </div>
                    <div class="card">
                        <div class="img-box">
                           <img src="{{asset ('images/csm.png')}}" alt="csm"> 
                        </div>
                        <div class="card-content">
                        <h1 class="card-heading">Customer Service Manager</h1>
                        <p class="card-text">
                            hhhhhhhhhhhhhhh
                        </p>
                    </div>
                    </div>
                    <div class="card">
                        <div class="img-box">
                           <img src="{{asset ('images/mm.png')}}" alt="csm"> 
                        </div>
                        <div class="card-content">
                        <h1 class="card-heading">Marketing manager</h1>
                        <p class="card-text">
                            hhhhhhhhhhhhhhh
                        </p>
                    </div>
                    </div>
                    <div class="card">
                        <div class="img-box">
                           <img src="{{asset ('images/csm.png')}}" alt="csm"> 
                        </div>
                        <div class="card-content">
                        <h1 class="card-heading">heading</h1>
                        <p class="card-text">
                            hhhhhhhhhhhhhhh
                        </p>
                    </div>
                    </div>
                    <div class="card">
                        <div class="img-box">
                           <img src="{{asset ('images/csm.png')}}" alt="csm"> 
                        </div>
                        <div class="card-content">
                        <h1 class="card-heading">heading</h1>
                        <p class="card-text">
                            hhhhhhhhhhhhhhh
                        </p>
                    </div>
                    </div>
                    <div class="card">
                        <div class="img-box">
                           <img src="{{asset ('images/csm.png')}}" alt="csm"> 
                        </div>
                        <div class="card-content">
                        <h1 class="card-heading">heading</h1>
                        <p class="card-text">
                            hhhhhhhhhhhhhhh
                        </p>
                    </div>
                    </div>
                    <div class="card">
                        <div class="img-box">
                           <img src="{{asset ('images/csm.png')}}" alt="csm"> 
                        </div>
                        <div class="card-content">
                        <h1 class="card-heading">heading</h1>
                        <p class="card-text">
                            hhhhhhhhhhhhhhh
                        </p>
                    </div>
                    </div>
                </div>

            </section>
            <button class="bottom-right-button" onclick="window.location.href='howtoplay'">DONE</button>

    </main>

</x-app-layout> 