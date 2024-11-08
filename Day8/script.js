let startBtn = document.getElementById('start');
let minDisplay = document.getElementById('min');
let secDisplay = document.getElementById('sec');
let countDisplay = document.getElementById('count');
let clickCountDisplay = document.getElementById('click-count');


let count = 0;
let second = 0;
let minute = 0;
let total = 0;
let isKeyPressed = false;

startBtn.addEventListener('click', function() {
    timer = true;
    stopWatch();
    document.getElementById('start').style.visibility = "hidden";
    
});

window.addEventListener('keydown', e => {
    if (timer && !isKeyPressed) {
        total++;
        isKeyPressed = true;
        clickCountDisplay.innerHTML = total + " kali diklik";
    }
})

window.addEventListener('keyup', e => {
    isKeyPressed = false
})

function stopWatch() {
    if (timer) {
        count++;


        if (count == 100) {
            second++;
            count = 0
        }

        // if (second == 60) {
        //     minute++;
        //     second = 0;
        // }

        if (second == 24) {
            timer = false;
            clickCountDisplay.innerHTML = "Kamu berhasil klik sebanyak " + total + " kali!"; // Tampilkan hasil akhir klik
        }

        // if (minute == 1) {
        //     timer = false;
        // }
        
        let secString = second;
        let countString = count;

        if (second < 10) {
            secString = "0" + secString;
        }
        if (count < 10) {
            countString = "0" + countString;
        }

        minDisplay.innerHTML = minute < 10 ? "0" + minute : minute;
        secDisplay.innerHTML = second < 10 ? "0" + second : second;
        countDisplay.innerHTML = count < 10 ? "0" + count : count;
        setTimeout(stopWatch, 10);

    }





    // console.log("count:", count, "second:", second, "minute:", minute);
    console.log(":", total);
}