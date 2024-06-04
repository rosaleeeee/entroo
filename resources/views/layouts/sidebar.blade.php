<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre titre</title>

    <!-- Import Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link href="{{}a}"
    <!-- Styles -->
    <style>
        * {
            margin: 0;
            padding: 0;
            outline: none;
            border: none;
            text-decoration: none;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

       

        .nav1 {
            
            position:absolute;
            top:0;
            background-color: red;
            bottom: 0;
            height:100%;
            left:0;
            background: #fff;
            width: 90px;
            overflow: hidden;
            transition: width 0.2s linear;
            box-shadow:0 20px 35px rgba(0,0,0,0.1);
        }
        .logo{
            text-align:-50px;
            display: flex;
            transition: all 0.5s ease;
            margin: 80px  0 0 5px;
            
    

        }
        .logo img{
            width: 5; 
            height: 5; 
            border-radius: 50%;

        }
        .logo span{
            font-weight: bold;
            padding-left:15px ;
            font-size: 18px;
            text-transform: uppercase;

        }
        a{
            position: relative;
            color:rgb(85,83,83);
            font-size: 14px;
            display: table;
            width: 300px;
            padding: 10px;
        }
        .fas{
            position: relative;
            width:70px;
            height: 40px;
            top: 14px;
            font-size: 20px;
            text-align:center ;
        }
        .nav-item{
            position: relative;
            top: 12px;
            margin-left: 10px;
        }
        a:hover{
            background: #eee;
        }
        
    </style>
</head>
<body>
    <nav class="nav1">
        <ul >
        <li class="logo">
                <a href="#">
                    <img src="Images/Logo1.png" alt="logo">

                </a>
            <li>
                <a href="http://127.0.0.1:8000/profile">
                    <i class="fas fa-user"></i>
                    <span class="nav-item">Profile</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-home"></i>
                    <span class="nav-item">Home</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-users"></i>
                    <span class="nav-item">Team</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-ellipsis-h"></i>
                    <span class="nav-item">More</span>
                </a>
            </li>
        </ul>
    </nav>
</body>
</html>
