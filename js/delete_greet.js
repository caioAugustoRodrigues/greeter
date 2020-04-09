const deleteButton = document.getElementById('btn-delete');

function handleDelete() {
    const searchedGreet = $('#btn-delete').data('greet');
    

    $.ajax({    //jQuery here
        url: './../../functions/delete_greet/index.php',
        data: { greet_id: searchedGreet },
        method: "POST",
        type: "POST",
        success: function(data) {

            refreshNumber(); //in js/refresh_greet_numbers
            refreshGreets(); //in js/refresh_greets.js
        }
    })          // end of jQuery
}