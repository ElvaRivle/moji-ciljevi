<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="/public/Home/life_goals/" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="css/main.css">
    <link rel="icon" href="/favicon.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <title>Moji Ciljevi</title>
</head>
<body>
<i class="material-icons  large switch" onclick="location.href = '/DailyGoals/index'">apps</i>

<div id="main">
    <h2 id="mainHeading">Moji životni ciljevi</h2>
    <div id="addNewGoal">
        <input type="text" placeholder="Unesite cilj i pritisnite +" id="goalText">
        <!--<button id="addBtn" onclick="add_goal()">+</button>-->
        <i class="material-icons" id="addBtn" onclick="add_goal()">add_circle</i>
    </div>
    <?
        foreach ($params['goals'] as $goal) {
            echo '<div class=\'lifeGoal ';
            /*if ($goal['completed'] == 1) {
                echo 'lifeGoaldone\'';
            }
            */
            echo '\' onclick=\'remove_goal(this)\'>';
            echo "{$goal['description']}</div>";
        }
    ?>  
</div>


<script src="js/main.js"></script>
</body>
</html>
