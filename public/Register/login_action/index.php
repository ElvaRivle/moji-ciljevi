<html lang="en">
<head>
<meta charset="UTF-8">
    <base href="/moji-ciljevi/public/Register/login_action/" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="css/main.css">
    <link rel="icon" href="/moji-ciljevi/favicon.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <title>Moji Ciljevi</title>
</head>
<body>

    <h1>Moji ciljevi</h1>
    <form action="/moji-ciljevi/index.php" method="POST">
 
        <label for="uname">Unesite vaše korisničko ime:</label>
        <input type="text" id="uname" name="uname">
        <div id="error-handle"></div>
        <input type="submit" value="Unesi">
    </form>


</body>
</html>