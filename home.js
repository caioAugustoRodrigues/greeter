const button = document.getElementById('btn_greet');
const greet = document.getElementById('text_greet');

function handleGreet() {
    const greetContent = greet.value;

    if (greetContent != '') {
        $.ajax({    //jQuery here
            url: 'pages/send-greet/index.php',
            data: { greet_text: greetContent },
            method: "POST",
            type: "POST",
            success: function(data) {
                let greetText = greetContent;
                greetText = '';
                alert('foi')
            }
        })          // end of jQuery
    }
}

button.addEventListener('click', handleGreet);