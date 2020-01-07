const button = document.getElementById('btn_greet');
const greetInput = document.getElementById('greet_input');
const greet = document.getElementById('text_greet');

function handleGreet() {
    const greetContent = greet.value;

    if (greetContent != '') {
        $.ajax({    //jQuery here
            url: 'functions/send-greet/index.php',
            data: { greet_text: greetContent },
            method: "POST",
            type: "POST",
            success: function(data) {
                let greetText = greetContent;
                greetText = '';
                refreshGreets(); //in js/refresh_greets.js
            }
        })          // end of jQuery
    }
}


button.addEventListener('click', handleGreet);
greetInput.addEventListener('submit', handleGreet);