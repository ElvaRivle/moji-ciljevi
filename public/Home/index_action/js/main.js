function add_goal() {
    
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
    }

    document.getElementById("main").appendChild(node);
    document.getElementById("goalText").value = "";
    //alert(text);
}