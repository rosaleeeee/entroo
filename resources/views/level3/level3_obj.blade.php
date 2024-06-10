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
    <h1>Defining Roles and Responsibilities.</h1>
    <p>Now that your team has selected a project, it's time to detail the roles and responsibilities 
        within your startup. You will identify key positions, define their responsibilities. 
        This level will help you understand the organizational structure of a business and the importance 
        of assigning the right roles. </p></br>
    <h3><u>Objectives:</u></h3>
    </br>
   
    <ul>
        <ol>+Identify key positions needed within the company.</ol>
  
        <ol>+Define the responsibilities and tasks associated with each position.</ol>
 
        <ol>+Assign appropriate roles to team members based on their skills and strengths..</ol>

        <ol>+Understand the importance of a clear and effective organizational structure.</ol>
 
    </ul>
</div>
<div id="right">
    <img src="{{ asset('images/Level3.png') }}" alt="Illustration">
</div>

</div>
</br>
<div class="conteneur">
    <button class="start_level_btn" onclick="window.location.href='level3/start-level3'">start</button>
</div>


</body>
</x-app-layout>
