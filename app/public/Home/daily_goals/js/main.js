function add_goal() {

    let text = document.getElementById("goalText").value;
    let textToSend = text.replace(/\s/g, '_');
    document.getElementById("goalText").innerHTML = "";
    if (text === "") {
        alert("Ne možete unijeti prazan text");
        return;
    }

    let ajaxAdd = new XMLHttpRequest();

    text = text.normalize('NFD').replace(/[\u0300-\u036f]/g, "");
    textToSend = textToSend.normalize('NFD').replace(/[\u0300-\u036f]/g, "");


    ajaxAdd.onreadystatechange = () => {
        if (ajaxAdd.readyState == 4) {
            if (ajaxAdd.status === 200) {
                if (ajaxAdd.responseText != "USPJELO"){
                    alert("Greška na serveru. Pokušajte kasnije");
                    return;
                }
                let node = document.createElement("div");
    
                node.className = "dailyGoal ";
                node.innerHTML = text; 
                
                node.dataset.clickCnt = 0;

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

    ajaxAdd.open("POST", "/DailyGoals/add_goal/"+textToSend);
    ajaxAdd.send();
}

function remove_goal(item) {
    let ajaxRemove = new XMLHttpRequest;
    
    item.dataset.clickCnt++;

    if(isNaN(item.dataset.clickCnt)) item.dataset.clickCnt = 1;

    let text = item.innerHTML;
    let textToSend = text.replace(/\s/g, '_');

    ajaxRemove.onreadystatechange = () => {
        if (ajaxRemove.readyState == 4) {
            if (ajaxRemove.status === 200) {
                if (ajaxRemove.responseText != "USPJELO"){
                    alert("Greška na serveru. Pokušajte kasnije");
                    return;
                }

                item.className += "dailyGoalDone ";
                
                if (item.dataset.clickCnt == 3) item.remove();
            }
            else {
                alert("Greška na serveru. Pokušajte kasnije");
            }
        }
    }



    if (item.dataset.clickCnt == 1) {
        ajaxRemove.open("DELETE", "/DailyGoals/mark_goal_done/"+textToSend);
        ajaxRemove.send();
    }
    else if (item.dataset.clickCnt == 3) {
        ajaxRemove.open("DELETE", "/DailyGoals/remove_goal/"+textToSend);
        ajaxRemove.send();
    }
}

function refresh_goals() {

    let ajaxAdd = new XMLHttpRequest();


    ajaxAdd.onreadystatechange = () => {
        if (ajaxAdd.readyState == 4) {
            if (ajaxAdd.status === 200) {
                if (ajaxAdd.responseText != "USPJELO"){
                    alert("Greška na serveru. Pokušajte kasnije");
                    return;
                }
                location.reload();
            }
            else {
                alert("Greška na serveru. Pokušajte kasnije");
            }
        }
    }


    ajaxAdd.open("UPDATE", "/DailyGoals/refresh_goals");
    ajaxAdd.send();
}