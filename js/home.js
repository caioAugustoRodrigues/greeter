const button = document.getElementById('btn_greet');
const greetInput = document.getElementById('greet_input');
const greet = document.getElementById('text_greet');

function handleGreet() {
    let greetContent = greet.value;

    if (greetContent != '') {
        $.ajax({    //jQuery here
            url: './../../functions/send-greet/index.php',
            data: { greet_text: greetContent },
            method: "POST",
            type: "POST",
            success: function(data) {
                greetContent = null;
                refreshGreets(); //in js/refresh_greets.js
            }
        })          // end of jQuery
    }
}

function handleField() {
    greet.value = '';
}


button.addEventListener('click', handleGreet);
button.addEventListener('click', handleField);
greetInput.addEventListener('submit', handleGreet);