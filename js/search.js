const button = document.getElementById('btn_search');
const searchInput = document.getElementById('person');
const searchResults = document.getElementById('search_results');
const searchForm = document.getElementById('search_form');

function handleSearch() {
    const searchUser = searchInput.value;
    
    if (searchInput.value != '') {
        $.ajax({    //jQuery here
            url: '../../functions/get_person/index.php',
            data: { person: searchUser },
            method: "POST",
            type: "POST",
            success: function(data) {
                searchResults.innerHTML = data;
                
                $('.btn_follow').click( function() {
                    const searchedId = $(this).data('searched_id');

                    
                    $.ajax({
                        url: '../../functions/follow/index.php',
                        data: { user_to_follow_id: searchedId },
                        method: 'POST',
                        success: function(data) {
                            $('#btn_follow' + searchedId).hide();
                            $('#btn_unfollow' + searchedId).show();
                        }
                    })
                })
                
                $('.btn_unfollow').click( function() {
                    const searchedId = $(this).data('searched_id');
                    
                    $.ajax({
                        url: '../../functions/unfollow/index.php',
                        data: { user_to_unfollow_id: searchedId },
                        method: 'POST',
                        success: function(data) {
                            $('#btn_follow' + searchedId).show();
                            $('#btn_unfollow' + searchedId).hide();
                        }
                    })
                })
            }
        })          // end of jQuery
    }
}

searchForm.addEventListener('submit', handleSearch);
button.addEventListener('click', handleSearch);