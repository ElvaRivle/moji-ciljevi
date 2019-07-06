function add_goal() {

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

    //SEND LOGGED IN UNAME (LATER IN PROJECT)
    ajaxAdd.open("POST", "/moji-ciljevi/Home/add_goal/rusko/"+textToSend+"/daily");
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
                if (ajaxRemove.responseText == "NIJE USPJELO"){
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
        ajaxRemove.open("DELETE", "/moji-ciljevi/Home/mark_daily_goal_done/rusko/"+textToSend+"/daily");
        ajaxRemove.send();
    }
    else if (item.dataset.clickCnt == 3) {
        ajaxRemove.open("DELETE", "/moji-ciljevi/Home/remove_daily_goal/rusko/"+textToSend+"/daily");
        ajaxRemove.send();
    }
}