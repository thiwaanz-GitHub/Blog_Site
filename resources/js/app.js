import './bootstrap';
import 'laravel-datatables-vite';


$(document).ready(function () {
    $('#search').on('keyup', function () {
        var search = $(this).val();

        $.ajax({
            url: '/search',
            type: 'GET',
            data: {
                search: search
            },
            success: function (response) {
                var results = response.data;
                var searchResults = $('#search-results');
                searchResults.empty();

                if (results.length > 0) {
                    results.forEach(function (result) {
                        var li = $('<li>').text(result.title);
                        searchResults.append(li);
                    });
                } else {
                    var li = $('<li>').text('No results found.');
                    searchResults.append(li);
                }
            }
        });
    });
});
