function checkNumber(sender) {
    let min = sender.min;
    let max = sender.max;
    let value = parseInt(sender.value);
    if (value > max){
        sender.value = max;
    } else if(value < min){
        sender.value = min;
    }
}
function displayOptions(count) {
    document.getElementById("countPVK").hidden = true;
    //let frag = document.createDocumentFragment();

    alert(document.getElementById("poll").firstElementChild.nodeName)
    let temp = document.createTextNode("Выберите " + count + " ПВК для этой профессии:");
    document.getElementById("poll").firstElementChild.appendChild(temp);


    for (let i=1; i<count; i++){
        let template = document.getElementById("poll").querySelector("label").cloneNode(true);
        document.getElementById("poll").querySelector("label").after(template);
    }
    //document.getElementById("poll").insertBefore(frag, document.getElementById("poll"));
    document.getElementById("poll").hidden = false;
}

function sendAnswers() {
    //alert("yes")
    let labels = document.getElementById("poll").querySelectorAll("label");
    let select, points;
    labels.forEach(function (label){
        select = label.querySelector("select").options[label.querySelector("select").selectedIndex].value;
        points = label.querySelector("input").value;
        //alert(select + " " + points);
    });
}

function checkCode(exists){
    if(exists){
        document.getElementById('continueButton').removeAttribute('disabled');
    } else {
        alert('Такого кода не существует.');
    }
}
