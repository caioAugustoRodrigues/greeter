const button = document.getElementById('btn_search');
const searchInput = document.getElementById('person');

function handleSearch() {
    const searchUser = searchInput.value;

    if (searchInput.value != '') {
        $.ajax({    //jQuery here
            url: '../../functions/get_person/index.php',
            method: "POST",
            type: "POST",
            data: { person: searchUser },
            success: function(data) {
                alert(data);
            }
        })          // end of jQuery
    }
}


button.addEventListener('click', handleSearch);