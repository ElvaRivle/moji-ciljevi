function add_goal() {
    //git checkout -f to drop all LOCAL changes (COMMIT BEFORE)
    //add it to database via ajax
    
    document.getElementById("goalText").innerHTML = "";

    let text = document.getElementById("goalText").value;
    if (text === "") {
        alert("Ne možete unijeti prazan text");
        return;
    }

    let node = document.createElement("div");
    
    node.className = "dailyGoal";
    node.innerHTML = text;  

    node.onclick = function() {
        //text-decoration: line-through;
        node.style.textDecoration = "line-through";
        node.style.color = "olive";

        setTimeout(function() {
            node.remove();
            //add deletition from database as well
        }, 300);
    }

    document.getElementById("main").appendChild(node);
    document.getElementById("goalText").value = "";
    //alert(text);
}