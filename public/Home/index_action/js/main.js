function add_goal() {

    let text = document.getElementById("goalText").value;
    document.getElementById("goalText").innerHTML = "";
    if (text === "") {
        alert("Ne možete unijeti prazan text");
        return;
    }

    let ajaxAdd = new XMLHttpRequest();


    ajaxAdd.onreadystatechange = () => {
        console.log(ajaxAdd.readyState);

        if (ajaxAdd.readyState == 4) {
            if (ajaxAdd.status === 200) {
                if (ajaxAdd.responseText == "NIJE USPJELO"){
                    alert("Greška na serveru. Pokušajte kasnije");
                    return;
                }
                let node = document.createElement("div");
    
                node.className = "dailyGoal";
                node.innerHTML = text;  

                document.getElementById("main").appendChild(node);
                document.getElementById("goalText").value = "";

                node.onclick = remove_goal;
            }
            else {
                alert("Greška na serveru. Pokušajte kasnije");
            }
        }
    }

    //SEND USER ENETERED TEXT AND FORMAT SEND/RECIEVE!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!1
    //SEND LOGGED IN UNAME (LATER IN PROJECT)
    ajaxAdd.open("POST", "/moji-ciljevi/Home/add_goal/rusko/Kupiti_auto/daily");
    ajaxAdd.send();
}

function remove_goal() {
    let ajaxRemove = new XMLHttpRequest;

    ajaxRemove.onreadystatechange = () => {
        console.log(ajaxRemove.readyState);

        if (ajaxRemove.readyState == 4) {
            if (ajaxRemove.status === 200) {
                if (ajaxRemove.responseText == "NIJE USPJELO"){
                    alert("Greška na serveru. Pokušajte kasnije");
                    return;
                }

                this.style.textDecoration = "line-through";
                this.style.color = "olive";
            }
            else {
                alert("Greška na serveru. Pokušajte kasnije");
            }
        }
    }

    


    ajaxRemove.open("DELETE", "/moji-ciljevi/Home/mark_daily_goal_done/rusko/Kupiti_auto/daily");
    ajaxRemove.send();
}