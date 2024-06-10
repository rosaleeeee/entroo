<x-app-layout>
    
            <!-- Page Content -->

            <main>
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
            <h1>Team Collaboration and SMART Project</h1>
            <p>In this level, you will work with your team to propose and select the best project 
                idea using SMART criteria. Collaborate, brainstorm, and choose the winning project!"</p></br>
            <h3><u>Objectives:</u></h3>
            </br>
           
            <ul>

                <ol>+Apply knowledge of business models in a team context.</ol>
          
                <ol>+Propose project ideas that meet SMART criteria.</ol>
         
                <ol>+Participate in brainstorming sessions and vote to select the best project.</ol>

                <ol>+Develop communication, collaboration, and decision-making skills.</ol>
         
            </ul>
        </div>
        <div id="right">
            <img src="{{ asset('images/Level2.png') }}" alt="Illustration">
        </div>
        
    </div>
    </br>
    <div class="conteneur">
        <button class="start_level_btn" onclick="window.location.href='level2/start-level2'">start</button>
    </div>
    
        
    </body>
</x-app-layout>
