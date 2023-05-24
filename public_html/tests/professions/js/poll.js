function displayValue(sender) {
    let slider = sender;
    let output = sender.nextElementSibling;
    output.innerHTML = slider.value;

    slider.oninput = function() {
        output.innerHTML = this.value;
    }
}
function displayOptions(count) {
    //document.getElementById("countPVK").hidden = true;
    //let frag = document.createDocumentFragment();

    //alert(document.getElementById("poll").firstElementChild.nodeName)
    let temp = document.createTextNode("Выберите " + count + " ПВК для этой профессии:");
    document.getElementById("poll").firstElementChild.appendChild(temp);


    for (let i=1; i<count; i++){
        let template = document.getElementById("poll").querySelector("label").cloneNode(true);
        document.getElementById("poll").querySelector("label").after(template);
    }
    //document.getElementById("poll").insertBefore(frag, document.getElementById("poll"));
    document.getElementById("poll").hidden = false;
}




