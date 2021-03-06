function add_goal() {

    let text = document.getElementById("goalText").value;
    let textToSend = text.replace(/\s/g, '_');
    document.getElementById("goalText").innerHTML = "";
    if (text === "") {
        alert("Ne možete unijeti prazan text");
        return;
    }

    text = text.normalize('NFD').replace(/[\u0300-\u036f]/g, "");
    textToSend = textToSend.normalize('NFD').replace(/[\u0300-\u036f]/g, "");

    let ajaxAdd = new XMLHttpRequest();


    ajaxAdd.onreadystatechange = () => {
        if (ajaxAdd.readyState == 4) {
            if (ajaxAdd.status === 200) {
                if (ajaxAdd.responseText == "NIJE USPJELO"){
                    alert("Greška na serveru. Pokušajte kasnije");
                    return;
                }
                let node = document.createElement("div");
    
                node.className = "lifeGoal ";
                node.innerHTML = text; 

                document.getElementById("main").appendChild(node);
                document.getElementById("goalText").value = "";

                node.onclick = function() {
                    remove_goal(node);
                }
            }
            else {
                alert("Greška na serveru. Pokušajte kasnije");
            }
        }
    }

    
    ajaxAdd.open("POST", "/LifeGoals/add_goal/"+textToSend);
    ajaxAdd.send();
}

function remove_goal(item) {
    let ajaxRemove = new XMLHttpRequest;

    let text = item.innerHTML;
    let textToSend = text.replace(/\s/g, '_');

    ajaxRemove.onreadystatechange = () => {
        if (ajaxRemove.readyState == 4) {
            if (ajaxRemove.status === 200) {
                if (ajaxRemove.responseText == "NIJE USPJELO"){
                    alert("Greška na serveru. Pokušajte kasnije");
                    return;
                }

                item.className += "lifeGoalDone ";
                
                item.remove();
            }
            else {
                alert("Greška na serveru. Pokušajte kasnije");
            }
        }
    }



    ajaxRemove.open("DELETE", "/LifeGoals/remove_goal/"+textToSend);
    ajaxRemove.send();
    
}