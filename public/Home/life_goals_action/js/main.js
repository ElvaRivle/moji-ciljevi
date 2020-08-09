function add_goal() {
    const user = document.getElementById("session").innerHTML;

    let text = document.getElementById("goalText").value;
    let textToSend = text.replace(/\s/g, '_');
    document.getElementById("goalText").innerHTML = "";
    if (text === "") {
        alert("Ne možete unijeti prazan text");
        return;
    }

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

    //SEND LOGGED IN UNAME (LATER IN PROJECT)
    ajaxAdd.open("POST", "/Home/add_goal/"+user+"/"+textToSend+"/life");
    ajaxAdd.send();
}

function remove_goal(item) {
    const user = document.getElementById("session").innerHTML;
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



    ajaxRemove.open("DELETE", "/Home/remove_life_goal/"+user+"/"+textToSend+"/life");
    ajaxRemove.send();
    
}