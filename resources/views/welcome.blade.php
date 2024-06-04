<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        #menu {
            background-color: #5398D4;
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        #menu img {
            width: 150px;
            height: auto;
        }
        #menu .buttons button {
            color: black;
            text-decoration: none;
            padding: 8px 20px;
            margin: 10px;
            border-radius: 5px;
            background-color: #FED101;
        }


        #content {
            display: flex;
            padding: 20px;
        }
        #left {
            flex: 1;
            padding-right: 20px;
            margin : 10%;
            margin-right : 10px;
            max-width: 50%;
        }
        #left h1 {
            color: black;
            font-size: 60px;
        }
        #left h3 {
            color:#13538A;
            font-size: 20px; 

        }
        #right img {
            max-width: 100%;
            height: auto;
            margin-right : 100px;
        }
    </style>
</head>
<body>
    <div id="menu">
<<<<<<< HEAD
        <img src="{{ asset('images/Logo1.png') }}" alt="Logo">
=======
        <img src="{{ asset('images/Logoo.png') }}" alt="Logo">
>>>>>>> 44eefd53ef30705f0d39b0ace24888f4a839c42a
        <div class="buttons">
            <button><a href="{{ route('login') }}">Log In</a></button>
            <button><a href="{{ route('register') }}">Register</a></button>
        </div>

        </div>
    </div>
    <div id="content">
        <div id="left">
            <h1>EntroSkills</h1>
            <h3>Ignite innovation, elevate entrepreneurship.</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div id="right">
            <img src="{{ asset('images/Home.png') }}" alt="Illustration">
        </div>
    </div>
</body>
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> 44eefd53ef30705f0d39b0ace24888f4a839c42a
