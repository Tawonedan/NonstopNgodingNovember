
// let currentValue = localStorage.getItem("currentValue") ? parseInt(localStorage.getItem("currentValue")) : 0;
let currentValue = parseInt(document.getElementById("displayValue").innerText) || 0;

function increaseValue() {
    // currentValue += 100;
    // document.getElementById("displayValue").innerText = currentValue;
    // localStorage.setItem("currentValue", currentValue);

    document.getElementById("add_credit").submit();

}

// function updateCurrency() {
//     fetch('./getCurrency.php')
//     .then(response => response.json())
//     .then(data => {
//         document.getElementById("displayValue").innerText = data.currency;

//         currentValue = parseInt(data.currency) || 0;
//     })
// }

function pullOneTimeMaharani() {
    let confirmText = "Habiskan 100 Bhinneka point untuk satu sprei?";

    if (currentValue >= 100) {
        if (confirm(confirmText)) {     
            
            fetch('pullProcess.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ action: 'oneXMaharani'}),
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        console.log("Proses berhasil! Item: " + Response);
                    } else {
                        ("Proses gagal: " + data.message);
                    }
                })
                .catch((error) => {
                    console.error("Error:", error);
                    alert("Terjadi kesalahan saat menghubungi server.");
                });

        }
    } else {
        alert("Bhinneka point tidak cukup!");
    }
}

function pullTenTimeMaharani() {
    let confirmText = "Habiskan 1000 Bhinneka point untuk sepuluh sprei?"
    if (currentValue >= 1000) {
        if (confirm(confirmText) == true) {                

            fetch('pullProcess.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ action: 'tenXMaharani'}),
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        console.log("Proses berhasil! Item: " + response);
                    } else {
                        ("Proses gagal: " + data.message);
                    }
                })
                .catch((error) => {
                    console.error("Error:", error);
                    alert("Terjadi kesalahan saat menghubungi server.");
                });
        }
    } else {
        alert("Bhinneka point tidak cukup!");
    }
}

document.querySelectorAll('.card').forEach((card, index) => {
    card.style.animationDelay = `${index * 0.2}s`;
});

// setInterval(updateCurrency, 500);