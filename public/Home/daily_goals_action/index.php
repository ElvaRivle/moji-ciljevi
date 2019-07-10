<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="/moji-ciljevi/public/Home/daily_goals_action/" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="css/main.css">
    <link rel="icon" href="/moji-ciljevi/favicon.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <title>Moji Ciljevi</title>
</head>
<body>

<div id="session" style="display:hidden; position:absolute; top:0; left:0; color: transparent;"><?=$_SESSION['uname']?></div>

<i class="material-icons  large switch" onclick="location.href = '/moji-ciljevi/Home/life_goals'">apps</i>
<i class="material-icons  large switch-right" onclick="refresh_goals()">autorenew</i>

<div id="main">
    <h2 id="mainHeading">Moji dnevni ciljevi</h2>
    <div id="addNewGoal">
        <input type="text" placeholder="Unesite cilj i pritisnite +" id="goalText">
        <!--<button id="addBtn" onclick="add_goal()">+</button>-->
        <i class="material-icons" id="addBtn" onclick="add_goal()">add_circle</i>
    </div>
    <?=$this->_goals;?>
</div>


<script src="js/main.js"></script>
</body>
</html>
