function refreshGreets() {
    const qntFollowers = document.getElementById("qnt-followers");

    $.ajax( //start of jQuery
        {
        url: '../../functions/get_followers/index.php',
        success: function(data) {
            qntFollowers.innerHTML = data;
        }
    }) //end of jQuery
}

document.addEventListener('DOMContentLoaded', refreshGreets);
