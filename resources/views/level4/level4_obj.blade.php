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
            <h1>Personal Assessment and Role Assignment</h1>
            <p>In this final level, you will take an MBTI personality test to assess your strengths. 
                Based on the results, the system will suggest suitable roles in various departments. 
                You will discuss these with your team and finalize the assignments, aligning your strengths 
                with the business needs for a productive and satisfying work environment.</p></br>
            <h3><u>Objectives:</u></h3>
            </br>
           
            <ul>
                <ol>+Assess personal strengths and preferences through a MBTI personality test..</ol>
          
                <ol>+Suggest suitable roles in various departments based on test results.</ol>
         
                <ol>+Discuss role suggestions and finalize assignments with the team.</ol>
                <ol>+Align personal strengths with the needs of the business to ensure a productive and satisfying work environment.</ol>
         
            </ul>
        </div>
        <div id="right">
            <img src="{{ asset('images/Level4.png') }}" alt="Illustration">
        </div>
        
    </div>
    </br>
    <div class="conteneur">
        <button class="start_level_btn" onclick="window.location.href='level4/start-level4'">start</button>
    </div>
    
        
    </body>
</x-app-layout>
