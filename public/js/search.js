$('.occupation').autocomplete({
    autoFocus: true,
    minLength: 0,
    source: function (request, response) {
        $.ajax({
            url: '/api/occupations/search',
            dataType: "json",
            contentType: 'application/json',
            type: 'get',
            data: {
                term: request.term,
            },
            success: function( res ) {
                response( $.map(res.data, function (item) {

                    return {
                        label: item.name,
                        value: item.name,
                        code: item.code
                    };
                }));
            }
        });
    },
    select: function( event , ui ) {
        let input = $(this).data('code');
        if ($(input)) $(input).val(ui.item.code);
    }
});

$('.sgsss').autocomplete({
    autoFocus: true,
    minLength: 0,
    source: function (request, response) {
        $.ajax({
            url: '/api/sgsss/search',
            dataType: "json",
            contentType: 'application/json',
            type: 'get',
            data: {
                term: request.term,
            },
            success: function( res ) {
                response( $.map(res.data, function (item) {

                    return {
                        label: item.name,
                        value: item.name,
                        code: item.code
                    };
                }));
            }
        });
    },
    select: function( event , ui ) {
        let input = $(this).data('code');
        if ($(input)) $(input).val(ui.item.code);
    }
});
