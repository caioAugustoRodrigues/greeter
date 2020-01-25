const btnDelete = document.getElementById('btn-delete');


function handleGreet() {

    if (greetContent != '') {
        $.ajax({    //jQuery here
            url: './../../functions/delete-greet/index.php',
            data: { greet_text: greetContent },
            method: "POST",
            type: "POST",
            success: function(data) {
                refreshGreets(); //in js/refresh_greets.js
            }
        })          // end of jQuery
    }
}

btnDelete.addEventListener('click', handleGreet);