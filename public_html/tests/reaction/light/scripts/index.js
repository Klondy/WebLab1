const time = document.querySelector('div.results p');
let started = false;
let coloredTime = 0;
let timeout;
let interval;

function formatTime(time) {
    time = Math.round(time);
    let outputTime = time / 1000;
    if (time < 10000) {
        outputTime = '0' + outputTime;
    }
    while (outputTime.length < 6) {
        outputTime += '0';
    }
    return outputTime;
}

function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

function click(event){
    let timeStamp = performance.now();
    if (started){
        end(timeStamp);
        started = false;
    } else {
        start();
        started = true;
    }
}

function start(){
    let min = 1,
        max = 4;
    let rand = Math.floor(Math.random() * (max - min + 1) + min);
    time.textContent = '00.000';

    $(this).css('cursor', 'default');
    timeout = setTimeout(() => {
        $('body').css("background-color", getRandomColor());
        coloredTime = performance.now();
        interval = setInterval(() => {
            time.textContent = formatTime(performance.now() - coloredTime);
        }, 1);
    }, rand * 1000);
}

function end(timeStamp){
    clearInterval(interval);
    if(!coloredTime){
        time.textContent = "Слишком быстро!";
        clearTimeout(timeout);
    } else {
        const currentTime = timeStamp - coloredTime;
        coloredTime = 0;
        time.textContent = formatTime(currentTime);
        $('body').css("background-color", "unset");
    }
}

document.querySelector('div.main').addEventListener("click", evt => {
    click(evt);
}, {passive: false});