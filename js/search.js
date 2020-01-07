const button = document.getElementById('btn_search');
const searchInput = document.getElementById('person_name');

function handleSearch() {
    const searchContent = greet.value;

    if (searchContent != '') {
        $.ajax({    //jQuery here
            url: 'pages/send-greet/index.php',
            data: { search_text: searchContent },
            method: "POST",
            type: "POST",
            success: function(data) {
                let search_text = searchContent;
                searchContent = '';
            }
        })          // end of jQuery
    }
}


button.addEventListener('click', handleSearch);