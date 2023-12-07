$(document).ready(function () {
    $('.saved_whitlist').on('click', function (e) {
        var btnWhitlist = $(this)
        e.preventDefault();

        var url = $(this).data('href');

        $.ajax({
            url: url,
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    if(response.type == 'add'){
                        btnWhitlist.find('i').addClass('active');
                    }else{
                        btnWhitlist.find('i').removeClass('active');
                    }
                }
            },
            error: function () {
                
            }
        });
    });
});