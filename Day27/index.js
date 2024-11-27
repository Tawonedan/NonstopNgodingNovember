let currentSprei = parseInt(document.getElementById("displaySprei").innerText) || 0;
let currentValue = parseInt(document.getElementById("displayValue").innerText) || 0;
let spreiRarity = document.getElementById("displayRarity").innerText;

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

document.getElementById('collect').style.visibility = "hidden";

console.log(spreiRarity);


startBtn.addEventListener('click', function() {
    timer = true;
    stopWatch();
    document.getElementById('start').style.visibility = "hidden";
    console.log("kontol");
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
                clickCountDisplay.innerHTML = "Kamu berhasil klik sebanyak " + total + " kali!";
                document.getElementById('collect').style.visibility = "visible";
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
function collectBPoint() {
    // console.log("total:", total);
    let baseTotal = total * 0.1;

    let rarityMultiplier;
    if (spreiRarity === "Common") {
        rarityMultiplier = 1.2;
    } else if (spreiRarity === "Uncommon") {
        rarityMultiplier = 1.5;
    } else if (spreiRarity === "Rare") {
        rarityMultiplier = 2;
    } else if (spreiRarity === "Epic") {
        rarityMultiplier = 3;
    } else {
        rarityMultiplier = 1;
    }

    let finalTotal = baseTotal * rarityMultiplier;


    fetch('./process.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ inputData: finalTotal })
    });
    console.log(finalTotal);
    location.reload();    
} 


function updateChosen() {
    fetch('./getChosen.php')
    .then(response => response.json())
    .then(data => {
        document.getElementById("displaySprei").innerText = data.chosen;

        currentSprei = parseInt(data.chosen) || 0;
    })
}

function updateCurrency() {
    fetch('./getCurrency.php')
    .then(response => response.json())
    .then(data => {
        document.getElementById("displayValue").innerText = data.currency;

        currentValue = parseInt(data.currency) || 0;
    })
}

setInterval(updateChosen, 500);
setInterval(updateCurrency, 500);