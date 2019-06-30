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
        alert("blah");
    }

    document.getElementById("main").appendChild(node);
    //alert(text);
}