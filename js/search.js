const button = document.getElementById('btn_search');
const searchInput = document.getElementById('person_name');
const searchForm = document.getElementById('search_people');

function handleSearch() {
    const searchContent = searchInput.value;

    if (searchContent != '') {
        $.ajax({    //jQuery here
            url: '../../functions/get_person/index.php',
            method: "POST",
            type: "POST",
            data: { search_text: searchContent },
            success: function(data) {
                alert(data);
            }
        })          // end of jQuery
    }
}


button.addEventListener('click', handleSearch);