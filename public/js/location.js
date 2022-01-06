$('.country').autocomplete({
    autoFocus: true,
    minLength: 0,
    source: function (request, response) {
        $.ajax({
            url: '/api/countries/search',
            dataType: "json",
            contentType: 'application/json',
            type: 'get',
            data: {
                term: request.term
            },
            success: function( res ) {
                response( $.map(res.data, function (item) {
                    return {
                        label: item.name,
                        value: item.name
                    };
                }));
            }
        });
    }
});

$('.department').autocomplete({
    autoFocus: true,
    minLength: 0,
    source: function (request, response) {
        let data = $(this.element);
        let country = (data.data('search')) ? $(data.data('search')):$('.country');
        $.ajax({
            url: '/api/departments/search',
            dataType: "json",
            contentType: 'application/json',
            type: 'get',
            data: {
                country: country.val(),
                term: request.term,
            },
            success: function( res ) {
                response( $.map(res.data, function (item) {

                    return {
                        label: item.name,
                        value: item.name
                    };
                }));
            }
        });
    }
});
$('.city').autocomplete({
    autoFocus: true,
    minLength: 0,
    source: function (request, response) {
        let data = $(this.element);
        let department = (data.data('search')) ? $(data.data('search')):$('.department');
        $.ajax({
            url: '/api/cities/search',
            dataType: "json",
            contentType: 'application/json',
            type: 'get',
            data: {
                department: department.val(),
                term: request.term,
            },
            success: function( res ) {
                response( $.map(res.data, function (item) {

                    return {
                        label: item.name,
                        value: item.name
                    };
                }));
            }
        });
    }
});
