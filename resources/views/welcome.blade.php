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
        #menu a{
            text-decoration:none;   
            color: black;
        }
        #menu .buttons button {
            color: black;
            text-decoration:none;
            width: 120px;
            height: 50px;
            margin: 10px;
            background-color: #ffd700;
            border-radius:  30px;
            align-items: center;
            cursor: pointer;
            font-weight: bold;
            border: 1px;
            font-size: 15px;
        }
        
        #menu .buttons button:hover {
            background-color: #ffcc00;
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
            font-size: 70px;
            margin-bottom: 10px;
            font-weight: bold;
        }
        #left h3 {
            color:#13538A;
            font-size: 30px; 
            font-weight: bold;

        }
        .typewriter h3 {
            overflow: hidden; /* Ensures the content is not revealed until the animation */
            border-right: .15em solid orange; /* The typwriter cursor */
            white-space: nowrap; /* Keeps the content on a single line */
            margin: 0 auto; /* Gives that scrolling effect as the typing happens */
            letter-spacing: .10em; /* Adjust as needed */
            animation: 
                typing 2.5s steps(40, end),
                blink-caret .75s step-end infinite;
            }

            /* The typing effect */
            @keyframes typing {
            from { width: 0 }
            to { width: 100% }
            }

            /* The typewriter cursor effect */
            @keyframes blink-caret {
            from, to { border-color: transparent }
            50% { border-color: #13538A; }
            }
        #left p {
            color:black;
            font-size: 22px; 
            text-align: justify;

        }
        
        #right img {
            max-width: 100%;
            width: 650px;
            height: auto;
            margin: 100px;
            margin-right : 100px;
        }

    </style>
</head>
<body>
    <div id="menu">
        <img src="{{ asset('images/Logo1.png') }}" alt="Logo">
        <div class="buttons">
            <button><a href="{{ route('login') }}">Log In</a></button>
            <button><a href="{{ route('register') }}">Register</a></button>
        </div>

        </div>
    </div>
    <div id="content">
        <div id="left">
            <h1>EntroSkills</h1>
            <div class="typewriter">
            <h3>Empower Your Entrepreneurial Journey</h3>
             </div>
            <p >Unlock your entrepreneurial potential! Start an exciting journey 
                to build and refine your business skills. Through fun exercises 
                and expert tips, you'll learn to create successful business models 
                and bring your ideas to life. Begin your path to success today!</p>
           
        </div>
        <div id="right">
            <img src="{{ asset('images/Home.png') }}" alt="Illustration">
        </div>
    </div>
</body>
</html>