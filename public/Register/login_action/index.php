<html lang="en">
<head>
<meta charset="UTF-8">
    <base href="/public/Register/login_action/" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="css/main.css">
    <link rel="icon" href="/favicon.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <title>Moji Ciljevi</title>
</head>
<body>

    <h1>Moji ciljevi</h1>
    <form action="/" method="POST">
 
        <div class="inputField">
            <label for="username">Korisničko ime:</label>
            <input type="text" id="username" name="username">
        </div>
        <div class="inputField">
            <label for="password">Šifra:</label>
            <input type="password" id='password' name='password'>
        </div>
        <p id='greska'><?=$error?></p>
        <input type="submit" value="Unesi">
    </form>

    <script src="js/main.js"></script>
</body>
</html>