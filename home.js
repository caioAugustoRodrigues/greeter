const button = document.getElementById('btn_greet');
const greet = document.getElementById('text_greet');

function handleGreet() {
    const greetContent = greet.value;

    if (greetContent != '') {
        $.ajax({    //jQuery here
            url: 'pages/send-greet/index.php',
            method: 'post',
            data: { greet_text: greetContent },
            success: function(data) {
                alert('Greet');
            }
        })          // end of jQuery
    }
}

button.addEventListener('click', handleGreet);