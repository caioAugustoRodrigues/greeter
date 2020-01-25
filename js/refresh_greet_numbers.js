const greetBtn = document.getElementById('btn_greet');

function refreshNumber() {
    const qntGreets = document.getElementById("qnt-greets");
    

    $.ajax( //start of jQuery
        {
        url: './../../functions/get_greet_numbers/index.php',
        success: function(data) {
            qntGreets.innerHTML = data;
        }
    }) //end of jQuery
}

document.addEventListener('DOMContentLoaded', refreshNumber);
greetBtn.addEventListener('click', refreshNumber)
