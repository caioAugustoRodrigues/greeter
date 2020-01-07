function refreshGreets() {
    const greets = document.getElementById("greets");

    $.ajax( //start of jQuery
        {
        url: 'functions/get_greet/index.php',
        success: function(data) {
            greets.innerHTML = data;
        }
    }) //end of jQuery
}

document.addEventListener('DOMContentLoaded', refreshGreets);
