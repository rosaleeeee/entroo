<x-app-layout>
    
            <!-- Page Content -->

            <main>
            <div style="display: flex; height: 85vh;">
    <div style="width: 100px; ; color: black; padding: 20px;">
        <!-- start navbar --> 
    @include('layouts.sidebar')

<!-- end navbar -->   
</div>
<link href="{{ asset('level-obj.css') }}" rel="stylesheet">

</head>
<body>
    <div id="content">
        <div id="left">
            <h1>Understanding the Business Model</h1>
            <p>A business model explains how a company creates, delivers, and captures value. 
                It serves as a blueprint for your business strategy, detailing how you plan to 
                achieve your goals and generate revenue. 
                In this level, you will learn the fundamental components of a business model and 
                understand how they fit together to create a successful business strategy. 
                Let's get started with an interactive exercise!</p></br>
            <h3><u>Objectives:</u></h3>
            </br>
           
            <ul>
                <ol>+Understand the key components of a business model.</ol>
          
                <ol>+Learn how each component contributes to creating, delivering, and capturing value.</ol>
         
                <ol>+Reinforce understanding through an interactive and engaging exercise.</ol>
         
            </ul>
        </div>
        <div id="right">
            <img src="{{ asset('images/Level1.png') }}" alt="Illustration">
        </div>
        
    </div>
    </br>
    <div class="buttons">
    <button>start</button>
    </div>
    
        
    </body>
</x-app-layout>
