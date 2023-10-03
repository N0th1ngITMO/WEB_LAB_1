const method = "GET";
const server_path = "Server.php";
let URL;
let y;
let x;
let r;
function onLoad() {
    const request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        const table = document.querySelector('.resultsTable').querySelector('tbody');
        table.innerHTML = request.responseText;
        console.log(request.responseText);
    }

    request.onerror = function () {
        console.log(`Server error: ${request.status}`);
    }
    request.open(method, 'php/LoadSession.php', false);
    request.send();
}

function sendRequest(URL) {
    const request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        const table = document.querySelector('.resultsTable').querySelector('tbody');
        table.innerHTML = request.responseText;
        console.log(request.responseText);
    }

    request.onerror = function () {
        console.log(`Server error: ${request.status}`);
    }
    request.open(method, URL, false);
    request.send();
}

function onSubmitButtonPressed(event) {
    event.preventDefault();
    console.log('Validation status: OK')
    y = document.querySelector("#text_place").value.replace(',', '.');
    console.log(y.length);
    document.querySelectorAll('.checkbox_but').forEach(function(checkbox){
        if(checkbox.checked){
            x = checkbox.getAttribute("name");
        }
    })
    if(x != null && !isNaN(y) && y.length <= 15 && y<5 && -5<y && r != null){
      URL = "php/Server.php?y=" + y + "&x=" + x + "&r=" + r + `&timezone=${new Date().toLocaleTimeString()}`;
    console.log(URL);
    sendRequest(URL);  
    }else{
        window.alert("Праверьте правильность введенных данных")
    }
    }

    function onClearButtonClicked(){
        const request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            const table = document.querySelector('.resultsTable').querySelector('tbody');
            table.innerHTML = request.responseText;
            console.log(request.responseText);
        }
    
        request.onerror = function () {
            console.log(`Server error: ${request.status}`);
        }
        request.open(method, 'php/ClearSession.php', false);
        request.send();
    }

document.addEventListener('DOMContentLoaded', ()=>{
    const form = document.getElementById("form_place");
    form.addEventListener("submit", e => onSubmitButtonPressed(e));


    const buttons = document.querySelectorAll(".solo_butten");
    buttons.forEach(function(button_arg){
        let originalColors = {};
        buttons.forEach(function(button) {
            originalColors[button] = button.style.backgroundColor;
            button.addEventListener("click", function() {
                this.style.backgroundColor = 'green';
                r = this.textContent;
                buttons.forEach(function(otherButton) {
                    if (otherButton !== button) {
                        otherButton.style.backgroundColor = originalColors[otherButton];
                    }
                });
            });
        });
    });

    const checkboxButtons = document.querySelectorAll('.checkbox_but');
    checkboxButtons.forEach(function(checkbox) {
        checkbox.addEventListener("change", function() {
            if (this.checked) {
                checkboxButtons.forEach(function(otherCheckbox) {
                    if (otherCheckbox !== checkbox) {
                        otherCheckbox.checked = false;
                    }
                });
            }
        });
    });
});
    