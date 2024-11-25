let currentSprei = parseInt(document.getElementById("displaySprei").innerText) || 0;


function updateChosen() {
    fetch('./getChosen.php')
    .then(response => response.json())
    .then(data => {
        document.getElementById("displaySprei").innerText = data.chosen;

        currentSprei = parseInt(data.chosen) || 0;
    })
}


setInterval(updateChosen, 500);