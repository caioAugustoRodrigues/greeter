const greetButton = document.getElementById('btn_greet');
const greetForm = document.getElementById('greet_input');

function refreshGreets() {
    const greets = document.getElementById("greets");

    $.ajax( //start of jQuery
        {
        url: '../../functions/get_greet/',
        success: function(data) {
            greets.innerHTML = data;
        }
    }) //end of jQuery
}

refreshGreets();
greetButton.addEventListener('click', refreshGreets);
greetForm.addEventListener('submit', refreshGreets);


