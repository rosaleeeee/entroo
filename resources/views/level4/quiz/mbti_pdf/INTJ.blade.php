<!-- resources/views/mbti/INTJ.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Profil MBTI de {{ $user->name }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h1 { color: #333; }
        .content { margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Profil MBTI de {{ $user->name }}</h1>
    <div class="content">
        <p><strong>Type MBTI :</strong> {{ $user->mbti }}</p>
        <p><strong>Description :</strong> Les INTJ sont des planificateurs stratégiques...</p>
    </div>
</body>
</html>
