let currentValue = localStorage.getItem("currentValue") ? parseInt(localStorage.getItem("currentValue")) : 0;
document.getElementById("displayValue").innerText = currentValue;

function increaseValue() {
    currentValue += 100;
    document.getElementById("displayValue").innerText = currentValue;
    localStorage.setItem("currentValue", currentValue);

}
function submitForm() {
    let confirmText = "Habiskan 1000 Bhinneka point untuk 10 sprei?"
    if (currentValue >= 1000) {
        if (confirm(confirmText) == true) {                
            currentValue -= 1000;
            document.getElementById("displayValue").innerText = currentValue;
            localStorage.setItem("currentValue", currentValue);
            
            document.getElementById("form").submit();
        }
    } else {
        alert("Bhinneka point tidak cukup!");
    }
}

document.querySelectorAll('.card').forEach((card, index) => {
    card.style.animationDelay = `${index * 0.2}s`;
});